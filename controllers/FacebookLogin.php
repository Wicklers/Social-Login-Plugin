<?php

require ROOT_DIR . "libraries/facebook/vendor/autoload.php";

use Facebook\FacebookHttpable;
use Facebook\FacebookCurl;
use Facebook\FacebookCurlHttpClient;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookOtherException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;
use Facebook\GraphUser;

/**
 * FacebookLogin Class helps in logging in using Facebook API, Facebook-PHP-SDK-v4 & Graph API v2.0
 * @author Harsh Vardhan Ladha
 * @package Social-Login-Plugin
 */

class FacebookLogin extends Controller {

    public function __construct() {
        parent::__construct();
        $this -> _setDefaultApplication();
        if (Input::get('token') === '') {
            $this -> AttemptFBLogin();
        } else {
            $this -> CreateSession();
        }

    }

    private function _setDefaultApplication() {
        FacebookSession::setDefaultApplication(FB_APP_ID, FB_APP_SECRET_ID);
    }

    private function AttemptFBLogin() {
        $helper = new FacebookRedirectLoginHelper(URL . 'login.php?type=facebook&token=true');
        $loginUrl = $helper -> getLoginUrl(array("user_about_me", "user_birthday"));
        Redirect::to($loginUrl);
    }

    private function CreateSession() {
        $helper = new FacebookRedirectLoginHelper(URL . 'login.php?type=facebook&token=true');
        try {
            $session = $helper -> getSessionFromRedirect();
        } catch(FacebookRequestException $ex) {
            print('<pre>');
            print_r($ex);
            print('</pre>');
            // When Facebook returns an error
        } catch(\Exception $ex) {
            print('<pre>');
            print_r($ex);
            print('</pre>');
            // When validation fails or other local issues
        }
        if ($session) {
            Session::put("fb_session", $session);
            $this -> Login();
        }
    }

    private function Login() {
        $this -> loadmodel("FacebookLogin");

        $this -> model -> Attempt();
    }

}
