<?php
$suburbs	= Suburbs::model()->findAllByAttributes(array('city_id'=>$ccity->id));
if(count($suburbs)==0){
?>
	<div>No Suburbs</div>
<?php				
}
else{
	foreach($suburbs as $suburb){
		$this->renderPartial('//suburbs/_ind', array('data'=>$suburb));
	}
}
?>
<div class="btn-group mr5">                                
	<a href="javascript:void(0);" class="btn btn-success open_popup" data-ajax-url="<?php echo Yii::app()->createUrl('suburbs/ajaxcreate', array('id'=>$ccity->id,'country'=>$_GET['country']))?>" data-target="#myModal" data-toggle="modal" data-modal-label="Add Suburb to `<?php echo $ccity->provincename.' - '.$ccity->name;?>`">
Add Suburbs
	</a>
</div>