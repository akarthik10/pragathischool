<!--
 * Ajax Crud Administration Form
 * ExamGroups *
 * InfoWebSphere {@link http://libkal.gr/infowebsphere}
 * @author  Spiros Kabasakalis <kabasakalis@gmail.com>
 * @link http://reverbnation.com/spiroskabasakalis/
 * @copyright Copyright &copy; 2011-2012 Spiros Kabasakalis
 * @since 1.0
 * @ver 1.3
 -->
 <style type="text/css">
 
.png_bg {
    float: right;
    margin: 0 18px 0 32px;
}
 </style>
<div id="exam-groups_form_con" class="client-val-form" >
    <?php if ($model->isNewRecord) : ?>    <h3 id="create_header"><?php echo Yii::t('examination','Create New Exam Groups');?></h3>
    <?php  elseif (!$model->isNewRecord):  ?>    <h3 id="update_header"><?php echo Yii::t('examination','Update Exam Groups');?> <?php  echo
        $model->id;  ?>  </h3>
    <?php   endif;  ?>
    <?php      $val_error_msg = Yii::t('examination','Error.Exam Groups was not saved.');
    $val_success_message = ($model->isNewRecord) ?
            Yii::t('examination','Exam Groups was created successfuly.') :
            Yii::t('examination','Exam Groups  was updated successfuly.');
  ?>

    <div id="success-note" class="notification success png_bg"
         style="display:none;">
        <a href="#" class="close"><img
                src="<?php echo Yii::app()->request->baseUrl.'/js_plugins/ajaxform/images/icons/cross_grey_small.png';  ?>"
                title="Close this notification" alt="close"/></a>
        <div>
            <?php   echo $val_success_message;  ?>        </div>
    </div>

    <div id="error-note" class="notification errorshow png_bg"
         style="display:none;">
        <a href="#" class="close"><img
                src="<?php echo Yii::app()->request->baseUrl.'/js_plugins/ajaxform/images/icons/cross_grey_small.png';  ?>"
                title="Close this notification" alt="close"/></a>
        <div>
            <?php   echo $val_error_msg;  ?>        </div>
    </div>

    <div id="ajax-form"  class='form'>
<?php   $formId='exam-groups-form';
   $actionUrl =
   ($model->isNewRecord)?CController::createUrl('exam/ajax_create')
                                                                 :CController::createUrl('exam/ajax_update');


    $form=$this->beginWidget('CActiveForm', array(
     'id'=>'exam-groups-form',
    //  'htmlOptions' => array('enctype' => 'multipart/form-data'),
         'action' => $actionUrl,
    // 'enableAjaxValidation'=>true,
      'enableClientValidation'=>true,
     'focus'=>array($model,'name'),
     'errorMessageCssClass' => 'input-notification-error  error-simple png_bg',
     'clientOptions'=>array('validateOnSubmit'=>true,
                                        'validateOnType'=>false,
                                        'afterValidate'=>'js_afterValidate',
                                        'errorCssClass' => 'err',
                                        'successCssClass' => 'suc',
                                        'afterValidate' => 'js:function(form,data,hasError){ $.js_afterValidate(form,data,hasError);  }',
                                         'errorCssClass' => 'err',
                                        'successCssClass' => 'suc',
                                        'afterValidateAttribute' => 'js:function(form, attribute, data, hasError){
                                                                                                 $.js_afterValidateAttribute(form, attribute, data, hasError);
                                                                                                                            }'
                                                                             ),
	'htmlOptions'=>array(
            'style'=>'height:auto; width: 350px;'),

));

     ?>
    <?php echo $form->errorSummary($model, '
    <div style="font-weight:bold">Please correct these errors:</div>
    ', NULL, array('class' => 'errorsum notification errorshow png_bg')); ?>    <p class="note"><?php echo Yii::t('examination','Fields with'); ?><span class="required">*</span> <?php echo Yii::t('examination','are required.') ;?></p>


    <div class="row">
    	<div>
            <?php echo $form->labelEx($model,Yii::t('examination','name'),array('style'=>'color:#444444')); ?>
		</div>
		<span style="float:left; display:inline;">
            <?php echo $form->textField($model,'name',array('size'=>35,'maxlength'=>25)); ?>
		</span>
        <span style="margin-top:0px; position: relative; right:76px; top:6px;"  id="success-ExamGroups_name" class="hid input-notification-success  success png_bg right" ></span>
        <div style="clear:left">
            <small></small>
        </div>
            <?php echo $form->error($model,'name'); ?>
    </div>
    <?php if($model->batch_id==NULL)
			{ 
            echo $form->hiddenField($model,'batch_id',array('value'=>$_POST['batch_id']));
			}?>

        

        <div class="row">
            <?php echo $form->labelEx($model,Yii::t('examination','exam_type'),array('style'=>'color:#444444')); ?>
            <?php echo $form->dropDownList($model,'exam_type',array('Marks'=>'Marks','Grades'=>'Grades','Marks And Grades'=>'Marks And Grades')); ?>
        <span style="margin-top:0px; position: relative; right:55px; top:6px;"  id="success-ExamGroups_exam_type"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'exam_type'); ?>
    </div>

        <div class="row">
        	<table width="60%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php echo $form->checkBox($model,'is_published'); ?></td>
                <td><?php echo $form->labelEx($model,Yii::t('examination','is_published')); ?></td>
                <td> <?php echo $form->error($model,'is_published'); ?></td>
              </tr>
            </table>

           
    </div>

        <div class="row">
        <table width="80%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td ><?php echo $form->checkBox($model,'result_published'); ?></td>
            <td><?php echo $form->labelEx($model,Yii::t('examination','result_published')); ?></td>
            <td><?php echo $form->error($model,'result_published'); ?></td>
          </tr>
        </table>
   
    </div>

        <div class="row">
        	<div>
            <?php echo $form->labelEx($model,Yii::t('examination','exam_date'),array('style'=>'color:#444444')); ?>
            </div>
            
			<span style="float:left; display:inline;">
			<?php $settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
			if($settings!=NULL)
			{
				$date=$settings->dateformat;
		
		
			}
   			else
			$date = 'dd-mm-yy';		
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				//'name'=>'Students[admission_date]',
				'model'=>$model,
				'attribute'=>'exam_date',
				// additional javascript options for the date picker plugin
				'options'=>array(
					'showAnim'=>'fold',
					'dateFormat'=>$date,
					'changeMonth'=> true,
					'changeYear'=>true,
					'yearRange'=>'1900:'.(date('Y')+2),
				),
				'htmlOptions'=>array(
					'style'=>'height:20px;width:200px;'
				),
			));
			?>
			<?php //echo $form->textField($model,'exam_date'); ?>
            </span>
            
            
        <span style="margin-top:0px; position: relative; right:82px; top:6px;"  id="success-ExamGroups_exam_date" class="hid input-notification-success  success png_bg right"></span>
        <div style="clear:left;">
            <small></small>
        </div>
            <?php echo $form->error($model,'exam_date'); ?>
    </div>

    
    <input type="hidden" name="YII_CSRF_TOKEN"
           value="<?php echo Yii::app()->request->csrfToken; ?>"/>

    <?php  if (!$model->isNewRecord): ?>    <input type="hidden" name="update_id"
           value=" <?php echo $model->id; ?>"/>
    <?php endif; ?>
    <div class="row buttons" style="width:30%">
        <?php   echo CHtml::submitButton($model->isNewRecord ? Yii::t('examination','Submit') : Yii::t('examination','Save'),array('class' =>
        'formbut')); ?>    </div>

  <?php  $this->endWidget(); ?></div>
    <!-- form -->

</div>
<script type="text/javascript">

    //Close button:

    $(".close").click(
            function () {
                $(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
                    $(this).slideUp(600);
                });
                return false;
            }
    );


</script>


