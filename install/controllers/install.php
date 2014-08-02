<?php
/**
 * Installation Class
 * @package Social-Login
 * @author Harsh Vardhan Ladha
 */
class Install extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
    
    public function introduction(){
        $this->view->render("introduction");
    }
    
    public function step1(){
        $this->view->css = array("css/main.css");
        $this->view->js = array("js/step1.js");
        $this->view->render("step1");
    }
    
    public function step2(){
        $this->view->css = array("css/main.css");
        $this->view->js = array("js/step2.js");
        $this->view->render("step2");
    }
    
    public function save_step1(){
        $this->loadmodel("install");
        if($this->model->check_params()){
            echo "Mis-configuration.";
            return;
        }
        if($this->model->step1()){
            echo "Success";
        }
    }
    
    public function save_step2(){
        $this->loadmodel("install");
        if($this->model->step2()){
            echo "Success";
        }
    }
    
    public function finished(){
        $this->view->render("finished");
    }
}

