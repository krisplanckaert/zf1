<?php

class Application_Model_Nieuws1 extends Zend_Db_Table_Abstract
{
    // definieren hoe de tabel eruit ziet
    protected $_name='nieuws';
    protected $_primary='id';
    
    public function getAllNieuws() {
        // Zend_Db_Select
        /*$db = Zend_Registry::get('db');
        $select = $db->select();
        $select->from('nieuws');
        $select->where(//search criteria);
        $select->order(); */
        
        $this->fetchAll();  //Select * from nieuws
        
    }
    
    public function toevoegenNieuws($params) 
    {
        // $params = array('titel' => 'lipsum', 'omschrijving => 'blabla');
        $this->insert($params);
    }
    
    public function wijzigenNieuws($params, $id) 
    {
        //Beveilig de variabele dmv de adapter
        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        $this->update($params, $where);
    }
    
    public function verwijderNieuws($id) 
    {
        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        $this->delete($where);
    }
    
}
?>
