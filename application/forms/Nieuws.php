<?php

class Application_Form_Nieuws extends Zend_Form {
    public function init() 
    {
        $this->setMethod(Zend_Form::METHOD_POST);
        $this->setAttrib('enctype', Zend_Form::ENCTYPE_MULTIPART);
        
        // <form method="post enctype='multipart/form-data'>
        
        //titel
        $this->addElement(new Zend_Form_Element_Text('titel', array(
           ' label' => 'Titel', 
            'filters' => array('StringTrim'), 
            'required' => true, 
        )));
        
        //omschrijving
        $this->addElement(new Zend_Form_Element_Textarea('omschrijving', array(
            'label' => 'Omschrijving',
            'filters' => array('StringTrim'),
            'required' => true,
        )));
        
        //versturen
        $this->addElement(new Zend_Form_Element_Button('versturen', array(
            'type' => 'submit',
            'label' => 'Nieuws toevoegen',
            'required' => false,
            'ignore' => true,
        )));
        
    }
}

?>
