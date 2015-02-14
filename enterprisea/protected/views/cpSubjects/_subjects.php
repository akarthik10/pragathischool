<?php
$cpsubjects	= CpSubjects::model()->findAllByAttributes(array('status'=>1, 'cp_id'=>$cprovider->id));
if(count($cpsubjects)==0){
?>
	<div>No CP subjects added</div>
<?php				
}
else{
	foreach($cpsubjects as $cpsubject){
		$this->renderPartial('//cpSubjects/_ind', array('data'=>$cpsubject));
	}
}
?>
<div class="btn-group mr5">                                
	<a href="javascript:void(0);" class="btn btn-success open_popup" data-ajax-url="<?php echo Yii::app()->createUrl('cpSubjects/ajaxcreate', array('id'=>$cprovider->id, 'stype'=>$_GET['stype'], 'category'=>$_GET['category']))?>" data-target="#myModal" data-toggle="modal" data-modal-label="Add subjects to `<?php echo $cprovider->coursename.' - '.$cprovider->name;?>`">
Add subjects
	</a>
</div>