<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initNavigation() {
        // registreer de navigation plugin
        $this->bootstrap('frontController');
        $front = $this->getResource('frontController');
        $front->registerPlugin(new Syntra_Controller_Plugin_Navigation());
    }

}

