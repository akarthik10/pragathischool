<?php
	if(count($subjects)==0){
	?>
    No subjects
    <?php
	}
	else{
	?>
    <div class="row mb10 clearfix">
    	<div class="col-md-12">  
            <span class="errorMessage" id="ermsg" style="display:none;"></span>
            <p class="note">Select subjects to enroll</p>
        </div>
	</div>
    <div class="row mb10 clearfix">
    	<div class="col-md-12">
			<?php echo CHtml::checkBox('selectall', '', array('id'=>'selectall'))?>
            &nbsp;<label for="selectall">Select all</label>
    	</div>
    </div>
    <?php
		foreach($subjects as $subject){
		?>
        <div class="row mb10 clearfix">
            <div class="col-md-12">			
                <?php echo CHtml::activeCheckBox($model,'subject_id[]',array('value'=>$subject->id, 'class'=>'subject-check','id'=>'subject-'.$subject->id)); ?>
                &nbsp;<label for='subject-<?php echo $subject->id;?>'><?php echo $subject->name;?></label>
            </div>
		</div>
		<?php
		}
	?>
  <br />
    

</div><!-- form -->
<div class="row mb10">    
    	<div class="col-md-4">
		<?php echo CHtml::submitButton('Save & Continue',array('class'=>"btn btn-success btn-block")); ?>
		</div>
    </div>
<script>
$('#selectall').change(function(e) {
    if($(this).is(':checked')){
		$('#subjects input[type="checkbox"]').prop('checked', true);
	}
	else{
		$('#subjects input[type="checkbox"]').prop('checked', false);
	}
});

$('.subject-check').change(function(e) {
    if($('input[type="checkbox"].subject-check:checked').length==$('input[type="checkbox"].subject-check').length)
		$('#selectall').prop('checked',true);
	else
		$('#selectall').prop('checked',false);
});
</script>
<?php
}
?>