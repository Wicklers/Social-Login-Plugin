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
 * Login_model checks whether user's information i.e., email(Unique Key) exists, if exists then starts the loggedin session else
 * saves the field value to database and then starts the loggedin session.
 * @author Harsh Vardhan Ladha
 * @package Social-Login-Plugin
 */
class FacebookLogin_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function Attempt() {
        $session = Session::get('fb_session');
        $user =       (new FacebookRequest($session, 'GET', '/me')) -> execute() -> getGraphObject(GraphUser::className());
        $email = $this -> db -> real_escape_string($user -> getProperty("email"));

        $query = "SELECT * FROM " . DB_TABLE . " WHERE email = '" . $email . "' LIMIT 1";
        $result = $this -> db -> query($query);

        if ($result -> num_rows) {
            $user_info = $result -> fetch_object();
            Session::put('id', $user_info -> id);
            Session::put('email', $user_info -> email);
            Session::put('dob',$user_info->dob);
            Session::put('first_name',$user_info->first_name);
            Session::put('last_name',$user_info->last_name);
            Session::put('name',$user_info->name);
            Session::put('gender',$user_info->gender);
            Session::put('profile_pic_link',$user_info->profile_pic_link);
            Session::put('loggedIn', '1');
            Redirect::to("home.php");
        } else {
            $this -> AddNewUser();
        }
    }

    private function AddNewUser() {
        $session = Session::get('fb_session');

        $user =      (new FacebookRequest($session, 'GET', '/me')) -> execute() -> getGraphObject(GraphUser::className());
        $user_pic =      (new FacebookRequest($session, 'GET', '/me/picture', array('redirect' => false, 'height' => '480', 'width' => '480'))) -> execute() -> getGraphObject(GraphUser::className());

        $uid = $this -> db -> real_escape_string($user -> getProperty("id"));
        $first_name = $this -> db -> real_escape_string($user -> getProperty("first_name"));
        $last_name = $this -> db -> real_escape_string($user -> getProperty("last_name"));
        $email = $this -> db -> real_escape_string($user -> getProperty("email"));
        $name = $this -> db -> real_escape_string($user -> getProperty("name"));
        $gender = $this -> db -> real_escape_string($user -> getProperty("gender"));
        $dob = $this -> db -> real_escape_string(changeDateFormatToDB($user -> getProperty("birthday")));
        $dos = date("Y-m-d");
        $profile_pic_link = $this -> db -> real_escape_string($user_pic -> getProperty("url"));

        $query = "INSERT INTO " . DB_TABLE . " (uid,email,first_name,last_name,name,gender,dob,dos,profile_pic_link) 
                                     VALUES ('" . $uid . "','" . $email . "','" . $first_name . "','" . $last_name . "','" . $name . "','" . $gender . "','" . $dob . "','" . $dos . "','" . $profile_pic_link . "')";

        $result = $this -> db -> query($query);

        if ($this -> db -> affected_rows) {
            $this -> Attempt();
        }

    }

}
