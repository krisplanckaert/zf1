<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->naam = "Kris Planckaert";
        // action body
    }

    public function productenAction()
    {
        //die('Ik zit in de producten');
        $this->view->test="testje";
        // action body
    }

    public function sitemapAction()
    {
        // action body
    }


}





