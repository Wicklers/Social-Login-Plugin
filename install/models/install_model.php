<?php
/**
 * Social-Login-Plugin Install Model
 * @author Harsh Vardhan Ladha
 * @package Social-Login-Model
 */
class Install_Model {

    public function check_params() {
        error_reporting(0);
        $this -> db = new Mysqli(Input::get('db-server'), Input::get('db-username'), Input::get('db-password'));
        if ($this -> db -> connect_errno) {
            return $this -> db -> connect_error;
        }
    }

    public function step1() {

        $db_name = $this -> db -> real_escape_string(escape(Input::get('db-name')));
        $query = "CREATE DATABASE IF NOT EXISTS `" . $db_name . "`";
        $result = $this -> db -> query($query);
        if ($this -> db -> error != '') {
            echo $this->db->error;
            return;
        }
        $this -> db -> select_db($db_name);
        $table_name = $this -> db -> real_escape_string(escape(Input::get('db-table')));
        $query = "CREATE TABLE IF NOT EXISTS `" . $table_name . "` (id bigint(20) NOT NULL auto_increment,
                                                                uid bigint(20),
                                                                email varchar(100) NOT NULL,
                                                                first_name varchar(50) NOT NULL,
                                                                last_name varchar(50) NOT NULL,
                                                                name varchar(100) NOT NULL,
                                                                gender varchar(10) NOT NULL,
                                                                dob date,
                                                                dos date NOT NULL,
                                                                profile_pic_link varchar(255),
                                                                PRIMARY KEY(id),
                                                                UNIQUE KEY(email))";
        $result = $this -> db -> query($query);
        if ($this -> db -> error != '') {
            echo $this -> db -> error;
            echo "<br/>Something Went Wrong!";
            return;
        }

        Session::put('db-server', Input::get('db-server'));
        Session::put('db-username', Input::get('db-username'));
        Session::put('db-password', Input::get('db-password'));
        Session::put('db-name', Input::get('db-name'));
        Session::put('db-table', Input::get('db-table'));
        Session::put('proxy-rule', Input::get('proxy-rule'));

        return 1;
    }

    public function step2() {
        $url = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $url .= $_SERVER['SERVER_NAME'];
        $url .= $_SERVER['REQUEST_URI'];
        $url = explode("install",$url);
        $url = $url[0];
        $this -> create_config_file($url, Session::get('db-server'), Session::get('db-username'), Session::get('db-password'), Session::get('db-name'), Session::get('db-table'), Input::get('fb-app-id'), Input::get('fb-app-secret-id'),Session::get('proxy-rule'));
        Session::destroy();
        return 1;
    }

    public function create_config_file($url, $db_server, $db_username, $db_password, $db_name, $db_table, $fb_app_id, $fb_app_secret_id, $proxy_rule) {

        $filename = ROOT_DIR . "install/config-sample.php";
        $file = fopen($filename, "a+");
        $new_filename = ROOT_DIR . "config.php";
        $nf = fopen($new_filename, "w");
        if($proxy_rule!='')
            $proxy_settings=1;
        else
            $proxy_settings=0;
        while (!feof($file)) {
            $line = fgets($file);
            $var = array("url", "db-server", "db-username", "db-password", "db-name", "db-table", "fb-app-id", "fb-app-secret-id","proxy-settings","proxy-rule");
            $values = array($url, $db_server, $db_username, $db_password, $db_name, $db_table, $fb_app_id, $fb_app_secret_id,$proxy_settings,$proxy_rule);

            $content = str_replace($var, $values, $line);
            fwrite($nf, $content);
        }
    }

}
