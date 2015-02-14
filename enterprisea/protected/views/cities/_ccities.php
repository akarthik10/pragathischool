<?php
$ccities	= Cities::model()->findAllByAttributes(array('province_id'=>$province->id));
if(count($ccities)==0){
?>
	<div>No Cities found</div>
<?php				
}
else{
	foreach($ccities as $ccity){
		$this->renderPartial('//cities/_ind', array('ccity'=>$ccity));
	}
}
?>