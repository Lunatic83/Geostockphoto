<script type="text/javascript">
// initializiation of counters for new elements
var lastShoppingOptRm=<?php echo $shoppingOptRm->lastNew?>;
 
// the subviews rendered with placeholders
var trShoppingOptRm=new String(<?php echo CJSON::encode($this->render('_formShoppingOptRm', array(
		'id'=>'idRep',
		'model'=>new ShoppingOptPhotoRm,
		'modelDetails'=>new ConfLicenseRmDetails,
		'form'=>$form,
		'sizesRM'=>$sizesRM,
		'durationRm'=>$durationRm,
		'licensesRM'=>$licensesRM), true));?>);
var trShoppingOptUserRm=new String(<?php echo CJSON::encode($this->render('_formShoppingOptRm', array(
		'id'=>'idRep',
		'model'=>new ShoppingOptUserDefaultRm,
		'modelDetails'=>new ConfLicenseRmDetails,
		'form'=>$form,
		'sizesRM'=>$sizesRM,
		'durationRm'=>$durationRm,
		'licensesRM'=>$licensesRM), true));?>);
 
 
function addShoppingOptRm(button, model)
{
    lastShoppingOptRm++;
    if(model=='User')
    	button.parents('table').children('tbody').append(trShoppingOptUserRm.replace(/idRep/g,'n'+lastShoppingOptRm));
    else
    	button.parents('table').children('tbody').append(trShoppingOptRm.replace(/idRep/g,'n'+lastShoppingOptRm));
}
 
 
function deleteShoppingOptRm(button)
{
    button.parents('tr').detach();
}
 
</script>