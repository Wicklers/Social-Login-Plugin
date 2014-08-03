<!doctype html>

<html>
<head>
    <title>
        Social-Login
    </title>
    
    <!--
        CSS Stylesheets
    -->
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css" />
    <?php
        if(isset($this->css)){
            foreach($this->css as $css){
                echo '<link rel="stylesheet" href="'.URL.'views/'.$css.'" />
     ';
            }
        }
    ?>
    
    <!--
        JS Files
    -->
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="http://malsup.github.io/jquery.form.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
    <?php
        if(isset($this->js)){
            foreach($this->js as $js){
                echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>
    ';
            }
        }
    ?>
    
</head>
<body>
    <div id="header">
        Social-Login
    </div>
    <div id="content">