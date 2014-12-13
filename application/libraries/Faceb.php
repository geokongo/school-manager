<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
if ( session_status() == PHP_SESSION_NONE ) {
session_start();
}
 
// Autoload the required files
require_once( APPPATH . 'libraries/facebook/autoload.php' );
 
use Facebook\FacebookClient;
use Facebook\Helpers\FacebookRedirectLoginHelper;
use Facebook\Helpers\FacebookCanvasLoginHelper;
use Facebook\Entities\FacebookApp;

 
 
class Faceb {
var $ci;
var $helper;
var $session;
var $permissions;
var $facebookApp;
 
	public function __construct() 
	{
		$id = '1563588553853090';
		$secret = '21ae87bddc5bc508d91ccace40db7b63';

		$this->facebookApp = new FacebookApp($id, $secret);
	
	}
	
	public function redirect()
	{
		$facebookClient = new FacebookClient();
		
		$helper = new FacebookRedirectLoginHelper($this->facebookApp);
		$permissions = ['email', 'user_likes']; // optional
		$loginUrl = $helper->getLoginUrl('http://www.schoolmanager.or.ke/login', $permissions);
		header('Location: ' . $loginUrl); 

		//echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	
	}
	
	
 /*
// Create the login helper and replace REDIRECT_URI with your URL
// Use the same domain you set for the apps 'App Domains'
// e.g. $helper = new FacebookRedirectLoginHelper( 'http://mydomain.com/redirect' );
$this->helper = new FacebookRedirectLoginHelper( $this->ci->config->item('redirect_url', 'facebook') );
 
if ( $this->ci->session->userdata('fb_token') ) {
$this->session = new FacebookSession( $this->ci->session->userdata('fb_token') );
 
// Validate the access_token to make sure it's still valid
try {
if ( ! $this->session->validate() ) {
$this->session = null;
}
} catch ( Exception $e ) {
// Catch any exceptions
$this->session = null;
}
} else {
// No session exists
try {
$this->session = $this->helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
// When Facebook returns an error
} catch( Exception $ex ) {
// When validation fails or other local issues
}
}
 
if ( $this->session ) {
$this->ci->session->set_userdata( 'fb_token', $this->session->getToken() );
 
$this->session = new FacebookSession( $this->session->getToken() );
}
}
 
/**
* Returns the login URL.
*/


/*
public function login_url() {
return $this->helper->getLoginUrl( $this->permissions );
}
 
/**
* Returns the current user's info as an array.
*/

/*
public function get_user() {
if ( $this->session ) {
/**
* Retrieve User’s Profile Information
*/
// Graph API to request user data


/*
$request = ( new FacebookRequest( $this->session, 'GET', '/me' ) )->execute();
 
// Get response as an array
$user = $request->getGraphObject()->asArray();
 
return $user;
}
return false;
}


*/


}