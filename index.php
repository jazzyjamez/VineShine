<?php 

require_once('Tweet.php');

$hashTag = "ProgrammingForLife";

if(isset($_POST['generateTweet']))
{
	try {
		$tweetInfo = Tweet::GetTweetInformation($hashTag, $_POST['id']);
		$tweet = Tweet::GenerateTweet($tweetInfo, $_POST['videoUrl']);
		$htmlTweet = Tweet::GenerateHTML($tweetInfo, $_POST['videoUrl']);
	}
	catch (Exception $e)
	{
		$tweet = $e->getMessage();
	}
}

if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone'))
	$iPhone = "
	<div class='alert'>
		Sidan fungerar inte riktigt som den ska i mobilen om du använder Safari, testa köra sidan i datorn<br />
		Du kan också välja att <a href='https://itunes.apple.com/us/app/chrome/id535886823?mt=8'>Ladda hem Chrome</a> till mobilen.
	</div>";


$generateTweetForm = Tweet::DoTweetForm();

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
	<title>Vine and Shine</title>
	<meta name="description" content="">
	<meta name="author" content="">

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
	<script src="scripts/scrollpagination.js"></script>

	
	
</head>
	
<body>


	<!-- Primary Page Layout
	================================================== -->
<div class="topbottom_wrapper">
	<div class="container">
		<div class="sixteen columns">
			<div class="nav">
				<ul class="ulmenu">
					<li class="limenu">Om oss</li>
					<li class="limenu"><a href="mailto:info@vineandshine.se">info@vineandshine.se</a></li>
				</ul>
			</div>
			<div class="logo">
				<h1><img class="" src="images/apple-touch-icon-114x114.png" alt="Logo" style="border-style: none" align="center" /></h1>
			</div>
		</div>
		<div class="eight columns">
			<h3>Bästa byråer</h3>
			<p>
				Vi vet vad ni gör.
				Vi vet också hur bra ni gör det. 
				Men vi vet ännu inte vilka ni är. 
				
				Så vi ber er om <i>sex sekunder</i>. 
				Där vi får skymta en bit av den helhet,
				vi drömmer om att bli en del av. 
				
				En bild är aldrig rätt, flera är aldrig fel.
			</p>
		</div>
		<div class="four columns">
			<h3>Gör såhär</h3>
			<ul class="howlist">
				<li>Ladda ner Vine <a href="http://www.vine.co" target="_blank">här</a> på din iPhone eller iPad.</li>
				<li>Koppla Vine till ditt Twitterkonto.</li>
				<li>Spela in din film.</li> 
				<li>Hashtagga "#vineandshine".</li> 
				<li>Dela på Twitter.</li>
				<li>Posta din film.</li>
			</ul>
		</div>
	</div><!-- container -->
</div><!-- topbottom_wrapper -->



<div class="container_wrapper">
	<div class="container wrappervideos">
		<div class="one-third column tweet">
			<?php if(isset($tweet)) echo $htmlTweet; else echo $generateTweetForm; ?>
		</div>		
		
		<!-- VIDEOS GOES HERE -->
		<ul id="content">
			<li>				
				<div class="one-third column tweet">
					<div class='video'>
						<video loop id='video1' class='video-js vjs-default-skin' data-setup='{'example_option':true}'>
							<source src='https://vines.s3.amazonaws.com/videos/E87BDB36-92C5-4EE6-855D-2E929FC4C5DC-4601-000001D78A4F893E_1.0.4.mp4?versionId=FOPD6D31nCLSo6XXIVjE9A_AC_tQh7HY' type='video/mp4' />
						</video>
						<button class='muteButton' id='1'>
							Ljud AV/PÅ
						</button>
					</div>
					<ul class='icons'>
						<li>
							<a href='https://twitter.com/intent/tweet?in_reply_to=298103515635654658'><i class='icon-comment'></i></a>
						</li>
						<li>
							<a href='https://twitter.com/intent/favorite?tweet_id=298103515635654658'><i class='icon-star'></i></a>
						</li>
						<li>
							<a href='https://twitter.com/intent/retweet?tweet_id=298103515635654658'><i class='icon-retweet'></i></a>
						</li>
					</ul>
					<div class='account'>
						<img class='profilePic' src='http://a0.twimg.com/profile_images/1453328621/lillkort_normal.jpg' width='48' height='48' alt='twitter user eukaryoter profile pic' /><span class='author'>Christoffer Rydberg</span><span class='authorLink'><a href='https://twitter.com/eukaryoter/'>@eukaryoter</a></span><a href='https://twitter.com/eukaryoter' class='twitter-follow-button followButton' data-show-count='false' data-lang='en' data-show-screen-name='false'>Follow</a>
					</div>
					<p class='text'>
						Playing around with code for a new Twitter application, big test tweet #ProgrammingForLife
					</p>
				</div>
				
				<div class="one-third column tweet">
					<div class='video'>
						<video loop id='video2' class='video-js vjs-default-skin' data-setup='{'example_option':true}'>
							<source src='https://vines.s3.amazonaws.com/videos/DF50C586-E1EE-4AEE-819C-76B1138AF9F7-7292-000005D821C0FA8E_1.0.4.mp4?versionId=yRgwuC6TtLdjmmqMfpczqR8eokDjWg97' type='video/mp4' />
						</video>
						<button class='muteButton' id='2'>
							Ljud AV/PÅ
						</button>
					</div>
					<ul class='icons'>
						<li>
							<a href='https://twitter.com/intent/tweet?in_reply_to=298103515635654658'><i class='icon-comment'></i></a>
						</li>
						<li>
							<a href='https://twitter.com/intent/favorite?tweet_id=298103515635654658'><i class='icon-star'></i></a>
						</li>
						<li>
							<a href='https://twitter.com/intent/retweet?tweet_id=298103515635654658'><i class='icon-retweet'></i></a>
						</li>
					</ul>
					<div class='account'><img class='profilePic' src='http://a0.twimg.com/profile_images/1453328621/lillkort_normal.jpg' width='48' height='48' alt='twitter user eukaryoter profile pic' /><span class='author'>Christoffer Rydberg</span><span class='authorLink'><a href='https://twitter.com/eukaryoter/'>@eukaryoter</a></span><a href='https://twitter.com/eukaryoter' class='twitter-follow-button followButton' data-show-count='false' data-lang='en' data-show-screen-name='false'>Follow</a>
					</div>
					<p class='text'>
						Playing around with code for a new Twitter application, big test tweet #ProgrammingForLife
					</p>
				</div>
			</li>
			<li>
				<div class="one-third column tweet">
					<div class='video'>
						<video loop id='video3' class='video-js vjs-default-skin' data-setup='{'example_option':true}'>
							<source src='https://vines.s3.amazonaws.com/videos/DF50C586-E1EE-4AEE-819C-76B1138AF9F7-7292-000005D821C0FA8E_1.0.4.mp4?versionId=yRgwuC6TtLdjmmqMfpczqR8eokDjWg97' type='video/mp4' />
						</video>
						<button class='muteButton' id='3'>
							Ljud AV/PÅ
						</button>
					</div>
					<ul class='icons'>
						<li>
							<a href='https://twitter.com/intent/tweet?in_reply_to=298103515635654658'><i class='icon-comment'></i></a>
						</li>
						<li>
							<a href='https://twitter.com/intent/favorite?tweet_id=298103515635654658'><i class='icon-star'></i></a>
						</li>
						<li>
							<a href='https://twitter.com/intent/retweet?tweet_id=298103515635654658'><i class='icon-retweet'></i></a>
						</li>
					</ul>
					<div class='account'><img class='profilePic' src='http://a0.twimg.com/profile_images/1453328621/lillkort_normal.jpg' width='48' height='48' alt='twitter user eukaryoter profile pic' /><span class='author'>Christoffer Rydberg</span><span class='authorLink'><a href='https://twitter.com/eukaryoter/'>@eukaryoter</a></span><a href='https://twitter.com/eukaryoter' class='twitter-follow-button followButton' data-show-count='false' data-lang='en' data-show-screen-name='false'>Follow</a>
					</div>
					<p class='text'>
						Playing around with code for a new Twitter application, big test tweet #ProgrammingForLife
					</p>
				</div>
				
				<div class="one-third column tweet">
					<div class='video'>
						<video loop id='video4' class='video-js vjs-default-skin' data-setup='{'example_option':true}'>
							<source src='https://vines.s3.amazonaws.com/videos/AC5539AF-9251-4363-A641-E7F01C4E6239-141-0000012CB4E3656E_1.0.mp4?versionId=Q0QHyWA26NHRr6VPBEiybfpydQXBXD2V' type='video/mp4' />
						</video>
						<button class='muteButton' id='4'>
							Ljud AV/PÅ
						</button>
					</div>
					<ul class='icons'>
						<li>
							<a href='https://twitter.com/intent/tweet?in_reply_to=298103515635654658'><i class='icon-comment'></i></a>
						</li>
						<li>
							<a href='https://twitter.com/intent/favorite?tweet_id=298103515635654658'><i class='icon-star'></i></a>
						</li>
						<li>
							<a href='https://twitter.com/intent/retweet?tweet_id=298103515635654658'><i class='icon-retweet'></i></a>
						</li>
					</ul>
					<div class='account'><img class='profilePic' src='http://a0.twimg.com/profile_images/1453328621/lillkort_normal.jpg' width='48' height='48' alt='twitter user eukaryoter profile pic' /><span class='author'>Christoffer Rydberg</span><span class='authorLink'><a href='https://twitter.com/eukaryoter/'>@eukaryoter</a></span><a href='https://twitter.com/eukaryoter' class='twitter-follow-button followButton' data-show-count='false' data-lang='en' data-show-screen-name='false'>Follow</a>
					</div>
					<p class='text'>
						Playing around with code for a new Twitter application, big test tweet #ProgrammingForLife
					</p>
				</div>
				
				<div class="one-third column tweet">
					<div class='video'>
						<video loop id='video5' class='video-js vjs-default-skin' data-setup='{'example_option':true}'>
							<source src='https://vines.s3.amazonaws.com/videos/AC5539AF-9251-4363-A641-E7F01C4E6239-141-0000012CB4E3656E_1.0.mp4?versionId=Q0QHyWA26NHRr6VPBEiybfpydQXBXD2V' type='video/mp4' />
						</video>
						<button class='muteButton' id='5'>
							Ljud AV/PÅ
						</button>
					</div>
					<ul class='icons'>
						<li>
							<a href='https://twitter.com/intent/tweet?in_reply_to=298103515635654658'><i class='icon-comment'></i></a>
						</li>
						<li>
							<a href='https://twitter.com/intent/favorite?tweet_id=298103515635654658'><i class='icon-star'></i></a>
						</li>
						<li>
							<a href='https://twitter.com/intent/retweet?tweet_id=298103515635654658'><i class='icon-retweet'></i></a>
						</li>
					</ul>
					<div class='account'><img class='profilePic' src='http://a0.twimg.com/profile_images/1453328621/lillkort_normal.jpg' width='48' height='48' alt='twitter user eukaryoter profile pic' /><span class='author'>Christoffer Rydberg</span><span class='authorLink'><a href='https://twitter.com/eukaryoter/'>@eukaryoter</a></span><a href='https://twitter.com/eukaryoter' class='twitter-follow-button followButton' data-show-count='false' data-lang='en' data-show-screen-name='false'>Follow</a>
					</div>
					<p class='text'>
						Playing around with code for a new Twitter application, big test tweet #ProgrammingForLife
					</p>
				</div>
			</li>
		</ul>
		
		
		<!-- NO MORE VIDEOS -->
		
	</div>
	<?php echo $iPhone; ?>
</div><!-- topbottom_wrapper -->

<script>
	$(function(){
		var volume = false;
		var playerArray = new Array();
		var videoArray = new Array();
		var buttonArray = new Array();
		
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

		$('#content').scrollPagination({
            'contentPage': 'democontent.php', // the url you are fetching the results
            'contentData': { childs: $('#content').children().size() }, // these are the variables you can pass to the request, for example: children().size() to know which page you are
            'scrollTarget': $(window), // who gonna scroll? in this example, the full window
            'heightOffset': 10, // it gonna request when scroll is 10 pixels before the page ends
            'beforeLoad': function(){ // before load function, you can display a preloader div
            	this.contentData = { childs: $('#content').children().size() };
            },
            'afterLoad': function(elementsLoaded){ // after loading content, you can use this function to animate your new elements            				    
                 var i = 0;
                 $(elementsLoaded).fadeInWithDelay();
                 if ($('#content').children().size() > 100){ // if more than 100 results already loaded, then stop pagination (only for testing)
                    $('#content').stopScrollPagination();
                 }
                 
                 newVideoArray = new Array();
                 var newPlayerArray = new Array();
                 
                 $('.video').each(function(){
                 	var id = $(this).children().attr('id');
                 	if(id.replace("video", "") > 5)
                 		newVideoArray.push($(this).children().attr('id'));
                 });
                 
                 for(var i = 0; i < newVideoArray.length; i++) {
					_V_(newVideoArray[i], {}, function(){
						var buttonID = $(this).attr('id').replace('video', ''); 
						newPlayerArray[buttonID] = this;
						this.height($('.one-third').width());
						this.width($('.one-third').width());
						this.volume(0);
						this.play();
					});
				}
				
				$('button.muteButton').on('click', function(e){
					e.preventDefault();
					if(volume) {
						newPlayerArray[this.id].volume(0);
						volume = false;
					} else {
						newPlayerArray[this.id].volume(1);
						volume = true;
					}
				});
            }
        });
		
        // code for fade in element by element
        $.fn.fadeInWithDelay = function(){
            var delay = 0;
            return this.each(function(){
                $(this).delay(delay).animate({opacity:1}, 100);
                delay += 100;
            });
        };
        
	});
</script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</body>
</html>

