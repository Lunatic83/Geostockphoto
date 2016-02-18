<?php

    class BackToTop extends CWidget{
        
        //Default : '^ Back to top' - Text written into the link
        public $text = 'Back to top';
        
        //Default : true - Does the link appears during scrolling the page or is always displayed ?
        public $autoShow = true;
        
        //Default : 500 - Duration (in ms) of the scrolling effect, from the bottom to the top of the page
        public $timeEffect = 500;
        
        //Default : 'linear' - all jQueryUI effects allowed
        public $effectScroll = 'linear';
        
        //Default : 'slide' - How does the link appear ? Can be set to 'fade', 'slide' or empty
        public $appearMethod = 'slide'; 
        
        public function run()
        {
            $this->registerResources();
            $autoShow = $this->autoShow?'true':'false';
            $script = "
                jQuery(document).ready(function(){
                  
                    BackToTop({
                        text : '$this->text',
                        autoShow : $autoShow,
                        timeEffect : $this->timeEffect,
                        effectScroll: '$this->effectScroll',
                        appearMethod: '$this->appearMethod'
                    });
});";
            Yii::app()->clientScript->registerScript('back-to-top-widget',$script,  CClientScript::POS_END);
            return parent::run();
        }
        
        public function registerResources(){
            Yii::app()->clientScript->registerCoreScript('jquery');
            Yii::app()->clientScript->registerCoreScript('jqueryui');
            $assets = dirname(__FILE__).'/assets';
            $basePath = Yii::app()->assetManager->publish($assets);            
            Yii::app()->clientScript->registerScriptFile($basePath.'/js/BackToTop.jquery.js',  CClientScript::POS_END);
            Yii::app()->clientScript->registerCssFile($basePath.'/css/BackToTop.jquery.css');
            
        }
        
        
    }
?>
