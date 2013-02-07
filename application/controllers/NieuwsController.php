<?php

class NieuwsController extends Zend_Controller_Action
{
    public $db;

    public function init()
    {
        $this->db = Zend_Registry::get('db');
    }

    public function indexAction()
    {
        // action body
    }

    public function overzichtAction()
    {
        $sql = "select * from nieuws";
        $result = $this->db->query($sql);
        $nieuws = $result->fetchAll();  //Haal alles op
        //var_dump($nieuws);
        //die();
        $this->view->nieuws = $nieuws;
    }

    public function toevoegenAction()
    {
        $form = new Application_Form_Nieuws();
        $this->view->form = $form;
        
        if($this->getRequest()->isPost()) {
            $postParams = $this->getRequest()->getPost();
            
            if($this->view->form->isValid($postParams)) {
                
                $sql = "insert into `nieuws` (titel, omschrijving) 
                    values ('".$postParams['titel']."','".$postParams['omschrijving']."')";
                $this->db->query($sql);
                
                $this->_redirect('/nieuws/overzicht');
            }
        }
    }

    public function verwijderenAction()
    {
        // action body
    }

    public function wijzigenAction()
    {
        $id = $this->_getParam('id'); //$_GET('id')
        $sql = "select * from nieuws where id = " . $id;
        $result = $this->db->query($sql);
        $nieuws = $result->fetch();  //Haal alles op
        
        $form = new Application_Form_Nieuws();
        
        // populate from the odd way
        
        $form->getElement('titel')->setValue($nieuws['titel']);
        $form->getElement('omschrijving')->setValue($nieuws['omschrijving']);
        
        $this->view->form = $form;
        
        if($this->getRequest()->isPost()) {
            $postParams = $this->getRequest()->getPost();
            
            if($this->view->form->isValid($postParams)) {
                //$id = (int)$this->_getParam('id');                
                $sql = "update `nieuws` set titel = '".$postParams['titel']."',".
                                     "      omschrijving = '".$postParams['omschrijving']."'
                                        where id = ".$id; 
                $this->db->query($sql);
                
                $this->_redirect('/nieuws/overzicht');
            }
        }
    }


}









