<?php

class Nieuws1Controller extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function wijzigenAction()
    {
        $id = $this->_getParam('id'); //$_GET('id')
        /*$sql = "select * from nieuws where id = " . $id;
        $result = $this->db->query($sql);
        $nieuws = $result->fetch();  //Haal alles op*/
        $nieuwsModel = new Application_Model_Nieuws1();
        $nieuws = $nieuwsModel->find($id)->current(); //select * from nieuws where id = $id
        
        //var_dump($nieuws->toArray());exit;
        
        $form = new Application_Form_Nieuws(); //omzetten in array om het formulier op te vullen
        
        // populate from the odd way
        //$form->getElement('titel')->setValue($nieuws['titel']);
        //$form->getElement('omschrijving')->setValue($nieuws['omschrijving']);
        
        $form->populate($nieuws->toArray());
        
        $this->view->form = $form;
        
        if($this->getRequest()->isPost()) {
            $postParams = $this->getRequest()->getPost();
            
            if($this->view->form->isValid($postParams)) {
                /*$sql = "update `nieuws` set titel = '".$postParams['titel']."',".
                                     "      omschrijving = '".$postParams['omschrijving']."'
                                        where id = ".$id; 
                $this->db->query($sql);*/
                
                unset($postParams['versturen']);
                $nieuwsModel->wijzigenNieuws($postParams, $id);
                
                $this->_redirect($this->view->url(array('controller' => 'Nieuws1', 'action' => 'Overzicht')));
            }
        }

    }

    public function verwijderenAction()
    {
        // action body
    }

    public function toevoegenAction()
    {
        $form = new Application_Form_Nieuws();
        $this->view->form = $form;
        
        if($this->getRequest()->isPost()) {
            $postParams = $this->getRequest()->getPost();
            
            if($this->view->form->isValid($postParams)) {
                
                /*$sql = "insert into `nieuws` (titel, omschrijving) 
                    values ('".$postParams['titel']."','".$postParams['omschrijving']."')";
                $this->db->query($sql);*/
                
                unset($postParams['versturen']);
                $nieuwsModel = new Application_Model_Nieuws1();
                $nieuwsModel->toevoegenNieuws($postParams);
                
                //$this->_redirect('/nieuws1/overzicht');
                $this->_redirect($this->view->url(array('controller' => 'Nieuws1', 'action' => 'Overzicht')));
            }
        }
        
    }

    public function overzichtAction()
    {
        /*$sql = "select * from nieuws";
        $result = $this->db->query($sql);
        $nieuws = $result->fetchAll();  //Haal alles op
        //var_dump($nieuws);
        //die();*/
        $nieuwsModel = new Application_Model_Nieuws1();
        $this->view->nieuws = $nieuwsModel->;
    }


}









