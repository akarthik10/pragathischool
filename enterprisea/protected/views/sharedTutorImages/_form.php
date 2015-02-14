<script>
	function addRow(tableID) 
	{
		var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
		if(rowCount < 10)// limit the user from creating fields more than your limits
		{
			var row = table.insertRow(rowCount);
			var colCount = table.rows[0].cells.length;
			for(var i=0; i<colCount; i++) 
			{
				var newcell = row.insertCell(i);
				newcell.innerHTML = "&nbsp;";
			}   
			rowCount++;                     
			for(var j=0; j<2; j++)
			{
				var row = table.insertRow(rowCount);
				var colCount = table.rows[j].cells.length;
				for(var i=0; i<colCount; i++) 
				{
					var newcell = row.insertCell(i);
					newcell.innerHTML = table.rows[j].cells[i].innerHTML;
				}
				rowCount++;
			}
			addDiv("student_id");
			addDiv("file_type");
			addDiv("created_at");
		}
		else
		{
			 alert("Upload limit reached");
				   
		}
	}
	
	function addDiv(divID)
	{
		var divTag = document.createElement("div");
		divTag.className = "row";
		divTag.innerHTML = document.getElementById(divID).innerHTML;
		document.getElementById("innerDiv").appendChild(divTag);
	}
</script>

<div class="panel panel-default">
	<div class="panel-heading" style="position:relative;">
    	<div class="clear"></div>
        	<h3 class="panel-title">Image Name</h3>
            
  </div>
  <?php $documents = SharedTutorImages::model()->findAllByAttributes(array('center_id'=>$_REQUEST['id'])); ?>
    <?php
			if($documents) // If documents present
			{
				foreach($documents as $document) // Iterating the documents
				{
			?>
                <div class="panel-body document_list">
                <div class="col-sm-9"><h5 class="subtitle"><?php echo ucfirst($document->title);?></h5></div>
                <div class="col-sm-3">
                <span class="btn btn-primary">
				<i class="glyphicon glyphicon-edit"></i>
				<?php echo CHtml::link('Edit', array('sharedTutorImages/update','id'=>$document->center_id,'document_id'=>$document->id),array('class'=>''));  ?></span>
                <span class="btn btn-danger">
				<i class="glyphicon glyphicon-trash"></i>
				<?php echo CHtml::link('Delete', array('sharedTutorImages/deletes','id'=>$document->center_id,'document_id'=>$document->id),array('class'=>'','confirm'=>'Are you sure?'));  ?></span>
                </div>
                </div>
    <?php }}else{ ?>
		
		<div class="panel-body document_list">
    	<div class="col-sm-8"><h5 class="subtitle">No Images(s) uploaded</h5></div>
        </div>
		
	<?php } ?>
    
</div>


<div class="panel panel-default">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'center-upload-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	
)); ?>
	<div class="form">
    <div class="panel-body">



	<?php 
		if($form->errorSummary($model)){
	?>
        <div class="errorSummary"><?php echo Yii::t('students','Input Error'); ?><br />
        	<span><?php echo 'Please fix the following error(s).'; ?></span>
        </div>
    <?php } ?>
    
  	<p class="note" style="float:left"><?php echo 'Fields with <span class="required">*</span> are required.'; ?></p>
    
    
    <?php
	
	Yii::app()->clientScript->registerScript(
	   'myHideEffect',
	   '$(".error1").animate({opacity: 1.0}, 3000).fadeOut("slow");',
	   CClientScript::POS_READY
	);
	?>
	<?php
	if(Yii::app()->user->hasFlash('errorMessage')): 
	?>
	<div class="error1" style="color:#C00; padding-left:200px;">
		<?php echo Yii::app()->user->getFlash('errorMessage'); ?>
	</div>
	<?php
	endif;
		
	?>
 <div class="formCon" style="clear:left;">
        <div class="formConInner" id="innerDiv">
      
        	<table width="100%" border="0" cellspacing="0" cellpadding="0" id="documentTable">
            	<tr>
                	<td ><?php echo $form->labelEx($model,'Image Name'); ?></td>
                    <td><?php echo $form->labelEx($model,'file'); ?></td>
                </tr>
                <tr>
                	<td>

						 <div style="padding-right:20px;"><?php echo $form->textField($model,'title[]',array('class'=>'form-control mb15')); ?>
                         <?php echo $form->error($model,'title'); ?></div>
                    </td>
                    <td>
                    <div style="padding-top:15px;">
						<?php echo $form->fileField($model,'file[]'); ?>
                        <?php echo $form->error($model,'file'); ?>
                        <p style="font-size:11px;">(Only files with these extensions are allowed: jpg, png, pdf, doc, txt.)</p>
                    </div>
                    </td>
                    
                </tr>
            </table>
            </div></div>
            <div class="row" style="padding-top:20px;">
                <?php echo $form->hiddenField($model,'document',array('value'=>1)); ?>
                <?php echo $form->error($model,'document'); ?>    
            </div>
			
            <div class="row">
                <?php echo $form->hiddenField($model,'sid',array('value'=>$_REQUEST['id'])); ?>
                <?php echo $form->error($model,'sid'); ?>    
            </div>
			
            <div class="row" id="student_id">
                <?php echo $form->hiddenField($model,'center_id[]',array('value'=>$_REQUEST['id'])); ?>
                <?php echo $form->error($model,'center_id'); ?>
            </div>
        
            <div class="row" id="file_type">
                <?php //echo $form->labelEx($model,'file_type'); ?>
                <?php echo $form->hiddenField($model,'file_type[]'); ?>
                <?php echo $form->error($model,'file_type'); ?>
            </div>
        
            <div class="row" id="created_at">
                <?php //echo $form->labelEx($model,'created_at'); ?>
                <?php echo $form->hiddenField($model,'created_at[]'); ?>
                <?php echo $form->error($model,'created_at'); ?>
            </div>
     
    <div >
         <?php     echo CHtml::ajaxLink('Add Another',array('addrow','id'=>$_REQUEST['id']), 
				array (
					
					'type'=>'POST',
					'dataType'=>'json',
					'success'=>'function(html){ jQuery("#innerDiv").append(html);
					 }'
					), 
				array ('class'=>'btn btn-primary')
				); ?>
             <?php //echo CHtml::button('Add Another', array('class'=>'btn btn-primary','id'=>'addAnother','onclick'=>'addRow("documentTable");')); ?>
        <?php echo CHtml::submitButton('Save',array('class'=>'btn btn-success')); ?>
    </div>
    	



</div>
<div class="panel-footer">
      <?php echo CHtml::Link('Continue',array('sharedTutor/view','id'=>$_REQUEST['id']),array('class'=>'btn btn-orange')); ?>
     </div>
<!-- form -->
</div><?php $this->endWidget(); ?>
</div>