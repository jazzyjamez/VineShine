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

<!-- header -->
<div class="topbottom_wrapper">
	<div class="container">
		<div class="sixteen columns">
			
			<div class="logo_content">
				<h1><a href="http://www.drombyran.se"><img class="logo" src="images/logo.png" alt="Logo" style="border-style: none" align="center" /></h1></a>
			</div>
		</div>
		<div class="eight columns offset-by-four">
			<h3>Hej</h3>
			<p class="textcolumn">Vi ska snart ut på arbetsmarknaden. Och innan vi komprimerar vår kreativitet och kunskap till ett möte och en mapp, vill vi veta vem vi gör det för. Få en glimt av vem vi ska dricka kaffe med, ana de vi kan kreera stordåd hos och skapa en överblick av byråvärlden. Få en skymt av ställen som inte alltid syns och minimera risken att råka gå fel. För oss, en grupp studenter från Berghs, och alla andra där ute som drömmer om att hitta rätt.  </p>
		</div>
		</div><!-- container -->
</div><!-- topbottom_wrapper -->

<!-- Slut header -->

<!-- Container -->
<div class="container_wrapper">
	
	<div class="container wrappervideos">
		<div class="one-third column tweet">
		
			<div class="video"><div id="video" class="video-js vjs-default-skin vjs-playing" width="300" height="150" style="width: 300px; height: 300px;"><video id="" loop autoplay muted src="https://vines.s3.amazonaws.com/videos/453EA018-1887-4AED-A3F0-B350C112282E-1678-0000015D08BBF234_1.0.5.mp4?versionId=v1wtn6P0xlLi4rOGiQo8xX.6Z_gg3B.i"></video></div></div>

<div class="account"><img class="profilePic" src="https://si0.twimg.com/profile_images/1226613632/lala_normal.png" width="48" height="48" alt="twitter user kimcarlosrehn profile pic"><span class="author">Kim Carlos Rehn</span><span class="authorLink"><a href="https://twitter.com/kimcarlosrehn/">@kimcarlosrehn</a></span><iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/follow_button.1360366574.html#_=1360783003352&amp;id=twitter-widget-2&amp;lang=en&amp;screen_name=kimcarlosrehn&amp;show_count=false&amp;show_screen_name=false&amp;size=m" class="twitter-follow-button followButton twitter-follow-button" style="width: 60px; height: 20px; " title="Twitter Follow Button" data-twttr-rendered="true"></iframe></div>
<p class="text">Grafisk Design på Berghs - appearance.se</p>

			</div>


		</div>		
	</div>
</div><!-- container_wrapper -->
	
		
		
		
	
	

<!-- Slut Container -->


<!-- Footer -->
<div class="topbottom_wrapper">
	<div class="container">
		<div class="sixteen columns">
			<div class="nav">
				<ul class="ulmenu">
					<li class="limenu"><a href="index.php"><h3>Hem</h3></a></li>
					
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
	});
	
muted: true,
        volume: 0,
        volumechange: function(event) {
            // If unmute was clicked

            if(!event.jPlayer.options.muted && !event.jPlayer.options.volume) {
                $(this).jPlayer("option", "volume", 0.8);
            }
        },
        play: function(event) {
            if(event.jPlayer.options.muted) {
                // Toggle muted to fix chrome.
                $(this).jPlayer("option", "muted", false);
                $(this).jPlayer("option", "muted", true);
            }
        }	
</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</body>
</html>
