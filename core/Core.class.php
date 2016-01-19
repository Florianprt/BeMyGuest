<?php

// LOAD DE LA PAGE SI EXIST SINON  VUE_ERROR.php
class Core
{
    protected $model;
    protected $controler;
    protected $page_erreur = 'vue_error.php' ;

    public function __construct() {

        if (isset($_GET['page'])) {
            $action = $_GET['page'];
        } else {
            $action = DEFAULT_ACTION;
        }

        if (!isset($_GET['module'])) {
            $module = ucfirst(DEFAULT_MODULE);
        }else {
            $module = ucfirst($_GET['module']);
        }

        $this->controler = $module.'Controllersec';
        $thecontroler = new $this->controler();

        if (method_exists($thecontroler, $action)) {
            $thecontroler->$action();
        } else{ 
            define("TITLE_FOR_LAYOUT", "Erreur");
            $this->view($this->page_erreur);
        }
    }



    public function view($file_name, $data = null) {
        include 'views/' . $file_name;
    }
}