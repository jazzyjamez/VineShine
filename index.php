<?php

require_once "database.php";
require_once "DBconfig.php";
require_once "TweetModel.php";
require_once "TweetView.php";
require_once "Tweet.php";

session_start();

class Master
{
	public static function Index()
	{
		//Skapar en instanser av klassen database och db_config, kopplar upp mot databasen.
		try
		{
			
			$dbconfig = new DBconfig();
			
			$database = new Database();
			$database->Connect($dbconfig);	
			$tweetModel = new TweetModel($database);
			
			if($_GET['admin'] == "1") {
				$tweetView = new TweetView();
				if($tweetView->PasswordFormSubmit()) {
					if($tweetView->CheckPassword($dbconfig->password)) {
						$tweetView->SetSession();
					}
					else {
						$ret['html'] = $tweetView->returnPasswordForm();
					}
				}
				else {
					$ret['html'] = $tweetView->returnPasswordForm();
				}
				
				if($tweetView->CheckSession()) {
					if($tweetView->GenerateHTMLSubmit()) {
						$tweet = $tweetView->GetTweetInformation($_POST['id']);
						$videoURL = $_POST['videoUrl'];
						
						$id = count($tweetModel->getAllTweets());
						
						if(!$tweetModel->getAllTweets())
							$id = 0;
						
						$tweetDiv = $tweetView->GenerateHTMLVideo($tweet, $videoURL, $id);
						$tweetModel->createTweet($tweetDiv);				
					}
					else {
						$ret['html'] = $tweetView->GenerateAddVideoForm();
					}
				}
			}
			else if (isset($_GET['page'])) {
				$tweets = $tweetModel->getNineTweets($_GET['page']);
				foreach ($tweets as $tweet) {
					$ret['html'] .= $tweet->getTweetID();	
				}
			}
			else {
				$tweets = $tweetModel->getNineTweets();
				foreach ($tweets as $tweet) {
					$ret['html'] .= $tweet->getTweetID();	
				}
			}
			$ret['amountTweets'] = count($tweetModel->getAllTweets());
			//Stänger databasen
	        $database->Close();
		}
		catch(Exception $x)
		{
			echo $x->getMessage();
		}
		
		return $ret;
	}
}

$body = Master::Index();

$nextLink = isset($_GET['page']) ? $_GET['page'] + 1 : 2;
$previousLink = isset($_GET['page']) ? $_GET['page'] - 1 : false;

$showNext = true;

if(isset($_GET['page']))
{
	if($_GET['page'] != 1)
		$showPrevious = true;
	if($_GET['page'] == (int)($body['amountTweets']/9)+1)
		$showNext = false;
}
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Drömbyrån</title>
	<meta name="description" content="Byråer, vilka är ni? Vi vet vad ni gör. Vi vet också hur bra ni gör det. Men vi vet ännu inte vilka ni är. Så vi ber er om sex sekunder där vi kan få skymta en bit av den helhet vi drömmer om att bli en del av.">
	<meta name="author" content="Drömbyrån">
	<meta property=og:image content="http://drombyran.se/images/logo.png">


	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="stylesheets/base.css">
	<link rel="stylesheet" href="stylesheets/skeleton.css">
	<link rel="stylesheet" href="stylesheets/layout.css">
	<link rel="stylesheet" href="stylesheets/bootstrap.css">
	<link href="http://vjs.zencdn.net/c/video-js.css" rel="stylesheet" type="text/css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	
	<!-- Scripts -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="http://vjs.zencdn.net/c/video.js"></script>	
	
</head>
	
<body>


		<!-- Primary Page Layout
	================================================== -->

<!-- header -->
<div class="topbottom_wrapper">
	<div class="container">
		<div class="sixteen columns">
			
			<div class="logo_content">
				<h1><a href="http://www.drombyran.se"><img class="logo" src="images/logo.png" alt="Drömbyrån" style="border-style: none" align="center" /></h1></a>
			</div>
		</div>
		<div class="seven columns">
			<h3>Byråer, vilka är ni? </h3>
			<p class="textcolumn">Vi vet vad ni gör. 
Vi vet också hur bra ni gör det. Men vi vet ännu inte vilka ni är. Så vi ber er om sex sekunder 
där vi kan få skymta en bit av den helhet
vi drömmer om att bli en del av.</p>
<p class="textcolumn">
En bild är aldrig rätt, flera är aldrig fel.
Visa oss hur det egentligen är på jobbet,
så kommer vi utse drömbyrån. </p>
		</div>
		

		<div class="seven columns offset-by-two">
			<h3>Hur gör ni?</h3>
			<ul class="textcolumn">
				<li>Ladda ner Vine <a href="http://www.vine.co" target="_blank">här</a> på din iPhone eller iPad och koppla till ditt twitterkonto.</li>
				<li>Spela in din film och skriv valfritt meddelande innehållande hashtaggen "#drombyran". </li> 
				<li>Posta filmen och dela den sedan på Twitter.</li>
				<p class="textcolumn">Vinnande byrå utses i början av mars och tilldelas därefter titeln personligen.</p>
			</ul>
		</div>
				
	</div><!-- container -->
</div><!-- topbottom_wrapper -->
<div class="sixteen columns bg_bottom">
</div>

<!-- Slut header -->


<!-- Container -->
<div class="container_wrapper">
	
	<div class="container wrappervideos">
		<?php echo $body['html']; ?>
	</div>
	
	
	<div class="sixteen columns arrow">
		<?php if($showPrevious) { ?>
		<a href="<?php echo "?page=".$previousLink; ?>"><img src="images/arrow_left.png"></a>
		<?php } ?>
		<?php if($showNext) { ?>
		<a href="<?php echo "?page=".$nextLink; ?>"><img src="images/arrow_right.png"></a>
		<?php } ?>
	</div>
	
</div><!-- container_wrapper -->


<!-- Footer -->
<div class="topbottom_wrapper">
	<div class="container">
		
		<div class="sixteen columns">
			<div class="nav">
				<ul class="ulmenu">
					<li class="limenu"><a href="about.php"><h3>Vilka är vi?</h3></a></li>
					
				</ul>
			</div>
			
		</div>

		
	</div><!-- container -->
</div><!-- topbottom_wrapper -->


<!-- slut footer -->
<script>
	$(function(){
		var volume = false;
		var playerArray = new Array();
		var videoArray = new Array();
		
		$('video').each(function(){
			videoArray.push($(this).attr('id'));
		});

		for(var i = 0; i < videoArray.length; i++) {
			_V_(videoArray[i], {}, function(){
				var buttonID = $(this).attr('id').replace('video', '');
				playerArray[buttonID] = this;
				this.height($('.one-third').width());
				this.width($('.one-third').width());
				this.volume(0);
				this.play();
			});
		}
		
		$('button.muteButton').on('click', function(e){
			e.preventDefault();
			if(volume) {
				playerArray[this.id].volume(0);
				volume = false;
			} else {
				playerArray[this.id].volume(1);
				volume = true;
			}
		});
        
	});
</script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</body>
</html>

                                                                                                                      