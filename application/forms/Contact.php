<?php

class Application_Form_Contact extends Zend_Form {
   
    public function init(){
        // set the defaults
        $this->setMethod(Zend_Form::METHOD_POST);
        //$this->setAttrib('enctype', 'multiparts/form-data');
        $this->setAttrib('enctype', Zend_Form::ENCTYPE_MULTIPART);
        
        // element firstName
        $this->addElement(new Zend_Form_Element_Text('firstname',array(
            'label'=>"Voornaam",
            'required'=>true,
            // filters
            'filters' => array('StringTrim')
            )));
        
        // element lastName
        $this->addElement(new Zend_Form_Element_Text('lastName',array(
            'label'=>"Naam",
            'required'=>true,
            // filters
            'filters' => array('StringTrim')
            )));
        
        // element adress
        $this->addElement(new Zend_Form_Element_Text('address',array(
            'label'=>"Adres",
            'required'=>true,
            //'maxlength'=> '255',
            // filters
            'filters' => array('StringTrim'),
            'validators' => array( array('StringLength',true, array('max'=>255)))
                
            )));
        
        // element lastName
        $this->addElement(new Zend_Form_Element_Text('email',array(
            'label'=>"E-mail",
            'required'=>true,
            // filters
            'filters' => array('StringTrim'),
            'validators'=>array ('StringLength', true , array('max'=>100)),
            'validators'=>array ('EmailAddress'),
            )));
        
        // element lastName
        $this->addElement(new Zend_Form_Element_Textarea('description',array(
            'label'=>"Omschrijving",
            'required'=>true,
            // filters
            'filters' => array('StringTrim', 'StripTags'),
            'validators'=>array (),
            )));
        
         // element lastName
        $this->addElement(new Zend_Form_Element_Button('versturen', array(
            'type'=>"submit",
            'value'=>'mailen',
            'required'=> 'false',
            'ignore'=> true
            )));
        
        //$btn = new Zend_Form_Element_Button();
        //$btn->setLabel('versturen')->setRequired(false);
        
        
        
    }
    
}

?>
