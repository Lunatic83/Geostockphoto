<?php
 
class PersonalContactsManager extends TabularInputManager
{
 
    protected $class='OwnUserContacts';
	
	public function setClass($className){
		$this->class=$className;
	}
 
    public function getItems()
    {
        if (is_array($this->_items))
            return ($this->_items);
        else{
			if($this->class=='OwnUserContacts'){
            	return array('n0'=>new OwnUserContacts);
			}
		}
    }
 
 
    public function deleteOldItems($model, $itemsPk)
    {
        $criteria=new CDbCriteria;
        $criteria->addNotInCondition('id', $itemsPk);
        $criteria->addCondition("class_id= {$model->primaryKey}");
 		
		if($this->class=='OwnUserContacts'){
        	OwnUserContacts::model()->deleteAll($criteria); 
		}
    }
 
 
    public static function load($model)
    {
        $return= new OwnUserContacts;
        foreach ($model->shoppingOpts as $item)
            $return->_items[$item->primaryKey]=$item;
        return $return;
    }
 
 
    public function setUnsafeAttribute($item, $model)
    {
        $item->class_id=$model->primaryKey;
 
    }
 
	public function behaviors(){
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' =>  'insert_timestamp',
				'updateAttribute' =>  'update_timestamp',
				'setUpdateOnCreate' => true,
			),
		);
	} 
}