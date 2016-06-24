<?php
/*
  Template Name: Stest
 */
?>
<?php //get_header(); 
session_start();
//session_destroy();
require __DIR__ .'/facebook-php-sdk/autoload.php';

use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookJavaScriptLoginHelper;

define ('APP_ID', '110209429315133');
define ('APP_SECRET', '24d26b3bb177eb131571460ab03b01a6');
define ('REDIRECT_URL', 'http://bottangcan.com/stest/');

FacebookSession::setDefaultApplication(APP_ID, APP_SECRET);

// Add `use Facebook\FacebookJavaScriptLoginHelper;` to top of file
$helper = new FacebookRedirectLoginHelper(REDIRECT_URL, APP_ID, APP_SECRET);
// Authorize the user.
try {
    if ( isset( $_SESSION['access_token'] ) ) {
        // Check if an access token has already been set.		
        $session = new FacebookSession( $_SESSION['access_token'] );
    } else {
        // Get access token from the code parameter in the URL.
        $session = $helper->getSessionFromRedirect();
    }
} catch( FacebookRequestException $ex ) {
 
    // When Facebook returns an error.
    print_r( $ex );
} catch( \Exception $ex ) {
 
    // When validation fails or other local issues.
    //print_r( $ex );
}


if ( isset( $session ) ) {
 
    // Retrieve & store the access token in a session.
    $_SESSION['access_token'] = $session->getToken();
 
    $logoutURL = $helper->getLogoutUrl( $session);
 
    // Logged in
    echo 'Successfully logged in! <a href="' . $logoutURL . '">Logout</a>';
	
	// Main action: do somethings after logined
	//Son: 10206907307749028
	
	$accessToken = $session->getAccessToken();
	//var_dump($accessToken);
	$request = (new FacebookRequest(
		$session, 'GET', '/1596315213960641'		
    ));
	$response = $request->execute();
	$graphObject = $response->getGraphObject();
   

	//var_dump($response);
	var_dump($graphObject);
	
	
	/* $request = new FacebookRequest(
	$session,
	  'GET',
	  '/me/permissions'
	);
	$response = $request->execute();
	$graphObject = $response->getGraphObject();
	var_dump($graphObject); */
	
	// END main action
	
	
} else {
 
    // Generate the login URL for Facebook authentication.
	$permissions = array('manage_pages', 'publish_pages', 'read_insights', 'user_friends', 'user_likes');
    $loginUrl = $helper->getLoginUrl($permissions);
    echo '<a href="' . $loginUrl . '">Login</a>';
}

?>

