<?php

class TweetView
{
	public function returnPasswordForm()
	{
		return "
			<form method='post'>
				<input type='password' name='adminPass' id='adminPass' />
				<input type='submit' name='adminPassSubmit' value='skicka' />
			</form>
		";
	}
	
	public function GenerateAddVideoForm() {
		return "
			<form method='post'>
				<label for='id'>Tweet ID</label>
				<input type='text' name='id' id='id' />
				<label for='videoUrl'>Video Url</label>
				<input type='text' name='videoUrl' id='videoUrl' />
				<input type='submit' name='generateTweet' value='Generera HTML' />
			<form>
		";
	}
	
	public function PasswordFormSubmit() {
		return isset($_POST['adminPassSubmit']);
	}
	
	public function GenerateHTMLSubmit() {
		return isset($_POST['generateTweet']);
	}
	
	public function CheckPassword($password) {
		return ($password == $_POST['adminPass']) ? true : false;
	}
	
	public function SetSession() {
		$_SESSION['isAdmin'] = "isTrue";
	}
	
	public function CheckSession() {
		return ($_SESSION['isAdmin'] == "isTrue") ? true : false;
	}
	
	public function DestroySession() {
		session_destroy();
	}
	
	public function GetTweetInformation($id) {
		$hashtag = "ProgrammingForLife";
		
		$tweetInformation = file_get_contents("http://search.twitter.com/search.json?q=%23".$hashtag."&rpp=100&result_type=recent");
		$tweetJson = json_decode($tweetInformation);
		foreach ($tweetJson->results as $tweet) {
			if($tweet->id == $id) {
				$retTweet['id'] = $id;
				$retTweet['author'] = $tweet->from_user;
				$retTweet['authorName'] = $tweet->from_user_name;
				$retTweet['text'] = $tweet->text;
				$retTweet['image'] = $tweet->profile_image_url;
			}
		}
		if(isset($retTweet))
			return $retTweet;
		else {
			throw new Exception("No tweet found");
		}
	}
	
	public static function GenerateHTMLVideo($tweet, $videoUrl, $id) {
		
		$htmlTweet .= "<div class='one-third column tweet'>";
			$htmlTweet .= "<div class='video'>";
				$htmlTweet .= "<video loop id='video".$id."' class='video-js vjs-default-skin' data-setup='{'example_option':true}'>";
					$htmlTweet .= "<source src='".$videoUrl."' type='video/mp4' />";
				$htmlTweet .= "</video>";
				$htmlTweet .= "<button class='muteButton' id='".$id."'>Ljud AV/PÅ</button>";
			$htmlTweet .= "</div>";
			$htmlTweet .= "<ul class='icons'>";
				$htmlTweet .= "<li><a href='https://twitter.com/intent/tweet?in_reply_to=".$tweet['id']."'><i class='icon-comment'></i></a></li>";
				$htmlTweet .= "<li><a href='https://twitter.com/intent/favorite?tweet_id=".$tweet['id']."'><i class='icon-star'></i></a></li>";
				$htmlTweet .= "<li><a href='https://twitter.com/intent/retweet?tweet_id=".$tweet['id']."'><i class='icon-retweet'></i></a></li>";
			$htmlTweet .= "</ul>";
			$htmlTweet .= "<div class='account'>";
				$htmlTweet .= "<img class='profilePic' src='".$tweet['image']."' width='48' height='48' alt='twitter user ".$tweet['author']." profile pic' />";
				$htmlTweet .= "<span class='author'>".$tweet['authorName']."</span>";
				$htmlTweet .= "<span class='authorLink'><a href='https://twitter.com/".$tweet['author']."/'>@".$tweet['author']."</a></span>";
				$htmlTweet .= "<a href='https://twitter.com/".$tweet['author']."' class='twitter-follow-button followButton' data-show-count='false' data-lang='en' data-show-screen-name='false'>Follow</a>";
			$htmlTweet .= "</div>";
			$htmlTweet .= "<p class='text'>".$tweet['text']."</p>";
		$htmlTweet .= "</div>";
		
		return $htmlTweet;
	}
}
