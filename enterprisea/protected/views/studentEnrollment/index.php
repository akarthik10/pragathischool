<style>
.checking{
	background:url('<?php echo Yii::app()->request->baseUrl;?>/images/saving.gif') no-repeat right center;
	border:1px solid #ccc !important;
}
.wizard_con{
	left:-30px;
}
.alert-info{
	margin-top:20px;
	width:97.4%;
}
.se_panel_formwrap{
	padding-top:0px;
}
</style>
<div class="se_panel">
        <div class="col-md-12 se_header">
        	<div class="col-sm-4 se_logo" align="center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.jpg" ></div>
            <div class="col-sm-8 se_head"> <h2>Student Enrolment</h2></div>
        </div>
        <div class="row clearfix">            
            <div class="col-md-4">
            	<?php $this->renderPartial('_leftside');?>            
            </div><!-- col-sm-6 -->
            
            <div class="col-md-8">
            	<div class="alert alert-info">
            	<h4>Experienced problems during the registration process?</h4>
                <div id="continue_reg" style="margin-top:10px;">
                	<form id="check-token" action="" method="post">
                        <div class="row mb10">
                            <div class="col-sm-6">
                                <label>Access Token <span class="required">*</span></label>
                                <?php echo CHtml::textField('accesstoken','',array('class'=>"form-control", 'id'=>'accesstoken', 'placeholder'=>'Access Token'));?>
                            </div>
                            <div class="col-sm-12">
                                <span class="required" style="display:none;" id="token-error">Invalid Access Token</span>
                            </div>
                        </div>
                        <div class="row mb10">
                          <div class="col-sm-6">
                            <button class="btn btn-success btn-block">Check My Token</button>
                          </div>  
                        </div>
                    </form>
                </div>
                </div>
                <div style="position:relative;">
            <?php $this->renderPartial('_wizard');?>
            <div class="col-xs-12 se_panel_formwrap">
            	    
            	<div class="wiz_right">
                	 
                <?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'search-form',
					'enableAjaxValidation'=>false,
				)); ?>                    
                    <h3 class="nomargin">Search</h3>
                    <p><?php 					
					//echo $this->encryptToken(Students::model()->findAll()[0]->email); //
					?></p>
                    <p class="mt5 mb20">Search for a Support Center or Private Tutor near you.</p>                
                    <div class="row mb10">
                        <div class="col-sm-6">
                        	<div class="rdio1 rdio-primary1">
								<?php echo $form->radioButtonList($model,'user_type', array(1=>'Support Center', 2=>'Private Tutor'),array('separator'=>' '));?>
                              </div>
                        </div>
                    </div>
                    <div class="row mb10">
                        <div class="col-sm-6" id="center_bx">
							<?php echo $form->labelEx($model,'center',array('class'=>'control-label')); ?>
                        	<?php echo $form->dropDownList($model,'center',CHtml::listData(Center::model()->findAll(array('condition'=>'`user_type`=:type', 'params'=> array(':type'=>1), 'order'=>'center_name')), 'id', 'center_name'),array('prompt'=>'Any', 'class'=>'form-control chosen-select')); ?>
                        </div>
                        <?php /*?><div class="col-sm-6">
							<?php echo $form->labelEx($model,'center_type_id',array('class'=>'control-label')); ?>
                        	<?php
                            echo $form->dropDownList(
								$model,
								'center_type_id',
								CHtml::listData(SchoolTypes::model()->findAll(array('distinct'=>true)), 'id', 'type'),
								array(
									'prompt'=>'Any',
									'class'=>'form-control',
									'ajax' => array(
										'type'=>'POST', 
										'url'=>Yii::app()->createUrl('studentEnrollment/loadprovinces'),
										'success' => 'function(data){
											$("#ph_province").html(data);
											$("#ph_province").trigger("chosen:updated");
										}',
										'data'=>array('country_id'=>'js:this.value','prompt'=>'Any'),
									)
								)
							);
							?>
                        </div><?php */?>
                    <!--</div>
                    
                    <div class="row mb10">-->
                        <div class="col-sm-6" id="tutor_bx">
                        	<?php echo $form->labelEx($model,'tutor',array('class'=>'control-label')); ?>
                        	<?php echo $form->dropDownList($model,'tutor',CHtml::listData(Center::model()->findAll(array('condition'=>'`user_type`=:type', 'params'=> array(':type'=>2), 'order'=>'center_name')), 'id', 'fullname'),array('prompt'=>'Any', 'class'=>'form-control chosen-select')); ?>
                        </div>
                        <?php /*?><div class="col-sm-6">
                        	<?php echo $form->labelEx($model,'tutor_type_id',array('class'=>'control-label')); ?>
                        	<?php echo $form->dropDownList($model,'tutor_type_id',CHtml::listData(Center::model()->findAll(array('distinct'=>true)), 'type_id', 'typename'),array('prompt'=>'Any', 'class'=>'form-control')); ?>
                        </div><?php */?>
                    <!--</div>                    
                    
                    <div class="row mb10">-->
                        <div class="col-sm-6">
							<?php echo $form->labelEx($model,'language',array('class'=>'control-label')); ?>
                            <?php echo $form->dropDownList($model,'language',CHtml::listData(Center::model()->findAll(array('distinct'=>true, 'order'=>'language')), 'language', 'language'),array('prompt'=>'Any', 'class'=>'form-control')); ?>                             
                    	</div>                        
                    </div>
                    
                    <div class="row mb10" id="center_bx">                        
                        <div class="col-sm-6">
							<?php echo $form->labelEx($model,'course_type',array('class'=>'control-label')); ?>
                        	<?php
                            echo $form->dropDownList(
								$model,
								'course_type',
								CHtml::listData(SchoolTypes::model()->findAll(array('condition'=>'`status`=1', 'order'=>'type')), 'id', 'type'),
								array(
									'prompt'=>'Any',
									'class'=>'form-control',
									'ajax' => array(
										'type'=>'POST', 
										'url'=>Yii::app()->createUrl('studentEnrollment/loadcoursecategory'),
										'success' => 'function(data){
											$("#course_category").html(data);
											$("#course_category").trigger("chosen:updated");
										}',
										'data'=>array('school_type'=>'js:this.value','prompt'=>'Any'),
									)
								)
							);
							?>
                        </div>
                        <div class="col-sm-6">
							<?php echo $form->labelEx($model,'course_category',array('class'=>'control-label')); ?>
                        	<?php
                            echo $form->dropDownList(
								$model,
								'course_category',
								CHtml::listData(CourseCategory::model()->findAll(array('order'=>'category')), 'id', 'category'),
								array(
									'prompt'=>'Any',
									'id'=>'course_category',
									'class'=>'form-control',
									'ajax' => array(
										'type'=>'POST', 
										'url'=>Yii::app()->createUrl('studentEnrollment/loadcourses'),
										'success' => 'function(data){
											$("#course_name").html(data);
											$("#course_name").trigger("chosen:updated");
										}',
										'data'=>array('category'=>'js:this.value','prompt'=>'Any'),
									)
								)
							);
							?>
                        </div>
                    </div>
                    
                    <div class="row mb10" id="center_bx">                        
                        <div class="col-sm-6">
							<?php echo $form->labelEx($model,'course_name',array('class'=>'control-label')); ?>
                        	<?php
                            echo $form->dropDownList(
								$model,
								'course_name',
								CHtml::listData(Course::model()->findAll(array('order'=>'name')), 'id', 'name'),
								array(
									'prompt'=>'Any',
									'class'=>'form-control',
									'id'=>'course_name',
									'ajax' => array(
										'type'=>'POST', 
										'url'=>Yii::app()->createUrl('studentEnrollment/loadcproviders'),
										'success' => 'function(data){
											$("#curriculum_provider").html(data);
											$("#curriculum_provider").trigger("chosen:updated");
										}',
										'data'=>array('course_id'=>'js:this.value','prompt'=>'Any'),
									)
								)
							);
							?>
                        </div>
                        <div class="col-sm-6">
							<?php echo $form->labelEx($model,'curriculum_provider',array('class'=>'control-label')); ?>
                        	<?php
                            echo $form->dropDownList(
								$model,
								'curriculum_provider',
								CHtml::listData(CurriculumProviders::model()->findAll(array('order'=>'name')), 'id', 'name'),
								array(
									'prompt'=>'Any',
									'class'=>'form-control',
									'id'=>'curriculum_provider',
								)
							);
							?>
                        </div>
                    </div>
                    
                    <div class="row mb10">
                        <div class="col-sm-6">
                        	<?php echo $form->labelEx($model,'ph_country',array('class'=>'control-label')); ?>
                            <?php
                            echo $form->dropDownList(
								$model,
								'ph_country',
								CHtml::listData(Countries::model()->findAll(array('condition'=>'`is_active`=1','order'=>'name')), 'id', 'name'),
								array(
									'prompt'=>'Any',
									'class'=>'form-control',									
									'ajax' => array(
										'type'=>'POST', 
										'url'=>Yii::app()->createUrl('studentEnrollment/loadprovinces'),
										'success' => 'function(data){
											$("#ph_province").html(data);
											$("#ph_province").trigger("chosen:updated");
										}',
										'data'=>array('country_id'=>'js:this.value','prompt'=>'Any'),
									)
								)
							);
							?>  
                        </div>
                        <div class="col-sm-6">
                        	<?php echo $form->labelEx($model,'ph_province',array('class'=>'control-label')); ?>
                            <?php                            
							echo $form->dropDownList(
								$model,
								'ph_province',
								array(),
								array(
									'id'=>'ph_province',
									'prompt'=>'Any',
									'class'=>'form-control',
									'ajax' => array(
										'type'=>'POST', 
										'url'=>Yii::app()->createUrl('studentEnrollment/loadcities'),
										'success' => 'function(data){
											$("#ph_city").html(data);
											$("#ph_city").trigger("chosen:updated");
										}',
										'data'=>array('province'=>'js:this.value','prompt'=>'Any'),
									)
								)
							);
							?>
                        </div>
                    </div>
                    
                    <div class="row mb10">
                        <div class="col-sm-6">
                        	<?php echo $form->labelEx($model,'ph_city',array('class'=>'control-label')); ?>
                            <?php
							echo $form->dropDownList(
								$model,
								'ph_city',
								array(),
								array(
									'id'=>'ph_city',
								'class'=>'form-control',
									'prompt'=>'Any',									
									'ajax' => array(
										'type'=>'POST', 
										'url'=>Yii::app()->createUrl('studentEnrollment/loadsuburbs'),
										'success' => 'function(data){
											$("#ph_suburb").html(data);
											$("#ph_suburb").trigger("chosen:updated");
										}',
										'data'=>array('city'=>'js:this.value','prompt'=>'Any'),
									)
								)
							);
							?>
                        </div>
                        <div class="col-sm-6">
                        	<?php echo $form->labelEx($model,'ph_suburb',array('class'=>'control-label')); ?>
                            <?php
							echo $form->dropDownList(
								$model,
								'ph_suburb',
								array(),
								array(
									'id'=>'ph_suburb',
									'class'=>'form-control',
									'prompt'=>'Any',
								)
							);
							?>
                        </div>
                    </div>
                     <div class="row mb10">
                      <div class="col-sm-6">
                      	<button class="btn btn-success btn-block" id="search_btn">Search</button>
                        
                      </div> 
                      <div class="col-sm-1">
                      <div class="checking" id="search_loader" style="height:20px; border:none !important; margin-top:5px; display:none;"></div>
                      </div>
                    </div>   
                <?php $this->endWidget(); ?>
           
            </div><!-- col-sm-6 -->
             <div id="results">
        </div>
          </div>
          </div>
          </div>  
        </div><!-- row -->

        <div class="signup-footer clearfix">
        <div class="pull-left">
            &copy; 2014. All Rights Reserved.
        </div>
        <div class="pull-right">
            Created By: <a href="http://wiwo.in/" target="_blank">wiwo</a>
        </div>
    </div>
        
    </div>
    
<script>
$('form#search-form').on('submit', function(){
	var that	= this,
		datas	= $(that).serialize();
	$.ajax({
		url:"<?php echo Yii::app()->createUrl('/studentEnrollment/search');?>",
		type:'POST',
		data:datas,
		beforeSend: function(){
			$('#search_loader').show();
		},
		success: function(response){
			$('#search_loader').hide();
			$('#results').html(response);
			$('html,body').animate({
				scrollTop: $("#results").offset().top
			},'slow');
			open_popup_links();
		}
	});
	return false;
});

$('input[type="radio"][name="CenterSearch[user_type]"]').change(function(e) {
	switch(parseInt($(this).val())){
		case 1:
			$('#center_bx').show();
			$('#tutor_bx').hide();
		break;
		case 2:
			$('#center_bx').hide();
			$('#tutor_bx').show();
		break;
		default:
			$('#center_bx').show();
			$('#tutor_bx').show();
		break;
	}
});

$('#getstuck').click(function(e) {
    $('#continue_reg').toggle();
});

$('form#check-token').on('submit', function(){
	var that	= this,
		method	= $(that).attr('method'),
		datas	= $(that).serialize();
	
	if($('#accesstoken').val()==""){
		$('span#token-error').html('How you can continue registration without your token  :)').show();
		$('#accesstoken').val('').focus();
		return false;
	}	
	$.ajax({
		url:"<?php echo Yii::app()->createUrl('/studentEnrollment/continue');?>",
		type:method,
		data:datas,
		dataType:"json",
		beforeSend: function(){
			$('#accesstoken').addClass('checking');
		},
		success: function(response){
			$('#accesstoken').removeClass('checking');
			if(response.status=="success"){
				document.location	= response.redirect;
			}
			else{
				$('span#token-error').html('Looks like you are using invalid token, am i right ?').show();
				$('#accesstoken').val('').focus();
			}
		}
	});
	return false;
});
function open_popup_links(){
	$('.open_popup').unbind('click');
	$('.open_popup').on('click', function(e) {
		var url		= $(this).attr('data-ajax-url'),
			label	= $(this).attr('data-modal-label') || $(this).text();
			
		$('#myModalLabel').text(label);
		
		$.ajax({
			url:url,
			beforeSend: function(){
				var loader	= $('<img />').attr({src:'<?php echo Yii::app()->request->baseUrl;?>/images/loading.gif'}).css({'margin':'121px 121px 121px 260px'});
				$('#myModal .modal-body').html(loader);				
			},
			success: function(response){				
				$('#myModal .modal-body').html(response);				
			}
		});
	});
}
$(window).load(function(e) {
    window.setTimeout(function(){
		$('#tutor_bx').hide();
	}, 100);
});
</script>