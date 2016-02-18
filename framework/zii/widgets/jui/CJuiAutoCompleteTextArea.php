<?php

Yii::import('zii.widgets.jui.CJuiAutoComplete');

class CJuiAutoCompleteTextArea extends CJuiAutoComplete
{
    public function run()
    {
        list($name,$id)=$this->resolveNameID();

        if(isset($this->htmlOptions['id']))
            $id=$this->htmlOptions['id'];
        else
            $this->htmlOptions['id']=$id;

        if(isset($this->htmlOptions['name']))
            $name=$this->htmlOptions['name'];
        else
            $this->htmlOptions['name']=$name;

        if($this->hasModel())
            echo CHtml::activeTextArea($this->model,$this->attribute,$this->htmlOptions);
        else
            echo CHtml::textArea($name,$this->value,$this->htmlOptions);

        if($this->sourceUrl!==null)
            $this->options['source']=CHtml::normalizeUrl($this->sourceUrl);
        else
            $this->options['source']=$this->source;

        $options=CJavaScript::encode($this->options);

        $js = "jQuery('#{$id}').autocomplete($options);";

        $cs = Yii::app()->getClientScript();
        $cs->registerScript(__CLASS__.'#'.$id, $js);
    }
}