<script type="text/javascript">
// initializiation of counters for new elements
var lastPersonalContacts=<?php echo $personalContactsManager->lastNew?>;
 
// the subviews rendered with placeholders
var trPersonalContacts=new String(<?php echo CJSON::encode($this->render('_formPersonalContacts', array('id'=>'idRep', 'model'=>new OwnUserContacts, 'form'=>$form, 'contacts'=>$contacts), true));?>);

  
function addPersonalContacts(button, model)
{
    lastPersonalContacts++;
   	button.parents('table').children('tbody').append(trPersonalContacts.replace(/idRep/g,'n'+lastPersonalContacts));
}
 
 
function deletePersonalContacts(button)
{
    button.parents('tr').detach();
}
 
</script>