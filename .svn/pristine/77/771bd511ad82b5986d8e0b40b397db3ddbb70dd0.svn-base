<?php
 
class ShoppingOptManager extends TabularInputManager
{
 
    protected $class='ShoppingOptPhoto';
	
	public function setClass($className){
		$this->class=$className;
	}
 
    public function getItems()
    {
        if (is_array($this->_items))
            return ($this->_items);
        else{
			if($this->class=='ShoppingOptPhoto'){
            	return array('n0'=>new ShoppingOptPhoto);
			}else if($this->class=='ShoppingOptPhotoRm'){
				return array('n0'=>new ShoppingOptPhotoRm);
			}else if($this->class=='ShoppingOptUserDefaultRf'){
				return array('n0'=>new ShoppingOptUserDefaultRf);
			}else if($this->class=='ShoppingOptUserDefaultRm'){
				return array('n0'=>new ShoppingOptUserDefaultRm);
			}
		}
    }
 
 
    public function deleteOldItems($model, $itemsPk)
    {
        $criteria=new CDbCriteria;
        $criteria->addNotInCondition('id', $itemsPk);
        $criteria->addCondition("class_id= {$model->primaryKey}");
 		
		if($this->class=='ShoppingOptPhoto'){
        	ShoppingOptPhoto::model()->deleteAll($criteria); 
		}else if($this->class=='ShoppingOptPhotoRm'){
        	ShoppingOptPhotoRm::model()->deleteAll($criteria);
		}else if($this->class=='ShoppingOptUserDefaultRf'){
        	ShoppingOptUserDefaultRf::model()->deleteAll($criteria);
		} else if($this->class=='ShoppingOptUserDefaultRm'){
        	ShoppingOptUserDefaultRm::model()->deleteAll($criteria);
		} 
    }
 
 
    public static function load($model)
    {
        $return= new ShoppingOptManager;
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