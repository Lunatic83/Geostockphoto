<script type="text/javascript">
// initializiation of counters for new elements
var lastShoppingOpt=<?php echo $shoppingOpt->lastNew?>;
 
// the subviews rendered with placeholders
var trShoppingOpt=new String(<?php echo CJSON::encode($this->render('_formShoppingOpt', array('id'=>'idRep', 'model'=>new ShoppingOptPhoto, 'form'=>$form, 'sizes'=>$sizes, 'licenses'=>$licenses), true));?>);
var trShoppingOptUser=new String(<?php echo CJSON::encode($this->render('_formShoppingOpt', array('id'=>'idRep', 'model'=>new ShoppingOptUserDefaultRf, 'form'=>$form, 'sizes'=>$sizes, 'licenses'=>$licenses), true));?>);
 
 
function addShoppingOpt(button, model)
{
    lastShoppingOpt++;
    if(model=='User')
    	button.parents('table').children('tbody').append(trShoppingOptUser.replace(/idRep/g,'n'+lastShoppingOpt));
    else
    	button.parents('table').children('tbody').append(trShoppingOpt.replace(/idRep/g,'n'+lastShoppingOpt));
}
 
 
function deleteShoppingOpt(button)
{
    button.parents('tr').detach();
}
 
</script>