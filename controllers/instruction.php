<?php
/**
 * Instructions to use Social-Login-Plugin
 */
class Instruction extends Controller {

    function __construct() {
        parent::__construct();
        $this -> view -> render("instruction");
    }

}
