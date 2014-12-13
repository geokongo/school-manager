<?php 

class Twitter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	
	}
	
	public function index()
	{
		if (CONSUMER_KEY === '' || CONSUMER_SECRET === '' || CONSUMER_KEY === 'CONSUMER_KEY_HERE' || CONSUMER_SECRET === 'CONSUMER_SECRET_HERE') 
		{
			echo 'You need a consumer key and secret to test the sample code. Get one from <a href="https://dev.twitter.com/apps">dev.twitter.com/apps</a>';
		
		}
		else
		{
		
			require_once(APPPATH.'libraries/twitter/twitteroauth.php');
			
			/* Build TwitterOAuth object with client credentials. */
			$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
			
			/* Get temporary credentials. */
			$request_token = $connection->getRequestToken(OAUTH_CALLBACK);
			
			/* Save temporary credentials to session. */
			$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
			$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	 
			/* Build authorize URL and redirect user to Twitter. */
			$url = $connection->getAuthorizeURL($token);
			header('Location: ' . $url); 
		
		}

	
	}
	
}