<div class="col-md-12 se_panel_formwrap">
    <div class="wiz_right">
    
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'students-_step1-form',
        'enableAjaxValidation'=>false,
    )); ?>
    
        <p class="note">Fields with <span class="required">*</span> are required.</p>
    
        <?php //echo $form->errorSummary($model); ?>
        
        <h4 class="text-success">PERSONAL DETAILS</h4>
        
        <div class="row mb10">
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'first_name',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'first_name', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('first_name'))); ?>
                <?php echo $form->error($model,'first_name'); ?>
            </div>
    
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'middle_name',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'middle_name', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('middle_name'))); ?>
                <?php echo $form->error($model,'middle_name'); ?>
            </div>
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'last_name',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'last_name', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('last_name'))); ?>
                <?php echo $form->error($model,'last_name'); ?>
            </div>
        </div>
        <div class="row mb10">
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'sur_name',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'sur_name', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('sur_name'))); ?>
                <?php echo $form->error($model,'sur_name'); ?>
            </div>
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'date_of_birth',array('class'=>'control-label')); ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model'=>$model,
                    'attribute'=>'date_of_birth',
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'dd/mm/yy',
                        'changeMonth'=> true,
                        'changeYear'=>true,
                        'yearRange'=>'1900:'.date('Y')
                    ),
                    'htmlOptions'=>array(
                        'class'=>'form-control',
                        'placeholder'=>$model->getAttributeLabel('date_of_birth')
                    ),
                ));
                ?>
                <?php echo $form->error($model,'date_of_birth'); ?>
            </div>
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'age',array('class'=>'control-label')); ?>
                <?php echo $form->dropDownList($model,'age', range(4,50), array('class'=>'form-control', 'prompt'=>'Select '.$model->getAttributeLabel('age'))); ?>
                <?php echo $form->error($model,'age'); ?>
            </div>
        </div>
        
        <div class="row mb10">
        	<div class="col-sm-4">
				<?php echo $form->labelEx($model,'birth_place',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'birth_place', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('birth_place'))); ?>
                <?php echo $form->error($model,'birth_place'); ?>
            </div>
            <div class="col-sm-4">
            	 <?php echo $form->labelEx($model,'id_passport_number',array('class'=>'control-label')); ?>
				<?php echo $form->textField($model,'id_passport_number', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('id_passport_number'))); ?>
                <?php echo $form->error($model,'id_passport_number'); ?>
            </div>
            <div class="col-sm-4">
            	<?php echo $form->labelEx($model,'nationality_id',array('class'=>'control-label')); ?>
				<?php echo $form->dropDownList($model,'nationality_id',CHtml::listData(Nationality::model()->findAll(), 'id', 'name'), array('class'=>'form-control','prompt'=>'Select '.$model->getAttributeLabel('nationality_id'))); ?>
                <?php echo $form->error($model,'nationality_id'); ?>
            </div>
        </div>
  
        <div class="row mb10">
        	<div class="col-sm-4">
				<?php echo $form->labelEx($model,'gender',array('class'=>'control-label')); ?><br />
                <?php echo $form->radioButtonList($model,'gender', array('M'=>'Male', 'F'=>'Female'),array('separator'=>' ')); ?>
                <?php echo $form->error($model,'gender'); ?>
            </div>
            <div class="col-sm-4">
            	<?php echo $form->labelEx($model,'language',array('class'=>'control-label')); ?><br />				
                <?php                
                $how_status	= array('Afrikaans'=>'Afrikaans', 'English'=>'English');
                if(in_array($model->language, $how_status) or $model->language==NULL){
                    $how_status["-1"]	= "Other";
                    echo CHtml::radioButtonList('language',$model->language,$how_status,array('id'=>'language','separator'=>' '));
                    echo $form->hiddenField($model,'language',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('language')));
                }
                else{
                    $how_status["-1"]	= "Other";
                    echo CHtml::radioButtonList('language',"-1",$how_status,array('id'=>'language','separator'=>' '));
                    echo $form->textField($model,'language',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('language')));
                }                
                ?>
                <?php echo $form->error($model,'language'); ?>
            </div>
            <div class="col-sm-4">
            	<?php echo $form->labelEx($model,'religion',array('class'=>'control-label')); ?>
				<?php echo $form->textField($model,'religion', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('religion'))); ?>
                <?php echo $form->error($model,'religion'); ?>
            </div>
        </div>
        <h4 class="text-success">MEDICAL HISTROY(IF ANY)</h4>
    
        <div>
            <?php echo $form->labelEx($model,'medical_history'); ?>
            <?php echo $form->textArea($model,'medical_history', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('medical_history'))); ?>
            <?php echo $form->error($model,'medical_history'); ?>
        </div>
        <br />
        <h4 class="text-success">CONTACT DETAILS</h4>
        
        <div class="row mb10">
        	 <div class="col-sm-4">
				<?php echo $form->labelEx($model,'phone1',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'phone1', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('phone1'))); ?>
                <?php echo $form->error($model,'phone1'); ?>
            </div>
            <div class="col-sm-4">
            	<?php echo $form->labelEx($model,'phone2',array('class'=>'control-label')); ?>
				<?php echo $form->textField($model,'phone2', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('phone2'))); ?>
                <?php echo $form->error($model,'phone2'); ?>
            </div>
            <div class="col-sm-4">
            	<?php echo $form->labelEx($model,'fathers_cell_number',array('class'=>'control-label')); ?>
				<?php echo $form->textField($model,'fathers_cell_number', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('fathers_cell_number'))); ?>
                <?php echo $form->error($model,'fathers_cell_number'); ?>
            </div>
        </div>
        <div class="row mb10">
        	<div class="col-sm-4">
				<?php echo $form->labelEx($model,'mothers_cell_number',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'mothers_cell_number', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('mothers_cell_number'))); ?>
                <?php echo $form->error($model,'mothers_cell_number'); ?>
            </div>
            <div class="col-sm-4">
            	<?php echo $form->labelEx($model,'email',array('class'=>'control-label')); ?>
				<?php echo $form->textField($model,'email', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('email'))); ?>
                <?php echo $form->error($model,'email'); ?>
            </div>
            <div class="col-sm-4">
            	<?php echo $form->labelEx($model,'skype_name',array('class'=>'control-label')); ?>
				<?php echo $form->textField($model,'skype_name', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('skype_name'))); ?>
                <?php echo $form->error($model,'skype_name'); ?>
            </div>
        </div>
        <br />
        <h4 class="text-success">PHYSICAL ADDRESS</h4>
        
        <div class="row mb10">
        	<div class="col-sm-4">
				<?php echo $form->labelEx($model,'country_id',array('class'=>'control-label')); ?>
                <?php
                echo $form->dropDownList(
					$model,
					'country_id',
					CHtml::listData(Countries::model()->findAll(), 'id', 'name'),
					array(
						'prompt'=>'Select '.$model->getAttributeLabel('country_id'),
						'ajax' => array(
							'type'=>'POST', 
							'url'=>Yii::app()->createUrl('studentEnrollment/loadprovinces'),
							'success' => 'function(data){
								$("#province_name").html(data);
								$("#province_name").trigger("chosen:updated");
							}',
							'data'=>array('country_id'=>'js:this.value'),
						),
						'style'=>'width:228px;',
					)
				); 
				?>
                <?php echo $form->error($model,'country_id'); ?>
            </div>
            <div class="col-sm-4">
            	<?php echo $form->labelEx($model,'state',array('class'=>'control-label')); ?>
				<?php
				$criteria				= new CDbCriteria;
				$criteria->condition	= '`country_id`=:country_id';
				$criteria->params		= array(':country_id'=>$model->country_id);
				$criteria->order		= '`name`';
				$states	= CHtml::listData(Provinces::model()->findAll($criteria),'name','name');
                echo $form->dropDownList(
					$model,
					'state',
					$states,
					array(
						'id'=>'province_name',
						'prompt'=>'Select '.$model->getAttributeLabel('state'),
						'ajax' => array(
							'type'=>'POST', 
							'url'=>Yii::app()->createUrl('studentEnrollment/loadcities'),
							'success' => 'function(data){
								$("#city_name").html(data);
								$("#city_name").trigger("chosen:updated");
							}',
							'data'=>array('province'=>'js:this.value'),
						),
						'style'=>'width:228px;',
					)
				);
				?>
                <?php echo $form->error($model,'state'); ?>
            </div>
            <div class="col-sm-4">
            	<?php echo $form->labelEx($model,'city',array('class'=>'control-label')); ?>
				<?php
				$criteria				= new CDbCriteria;
				$criteria->join			= 'JOIN `provinces` `p` ON `p`.`name`=:state';
				$criteria->condition	= '`t`.`province_id`=`p`.`id`';
				$criteria->params		= array(':state'=>$model->state);
				$criteria->order		= '`name`';
				$cities	= CHtml::listData(Cities::model()->findAll($criteria),'name','name');
                echo $form->dropDownList(
					$model,
					'city',
					$cities,
					array(
						'id'=>'city_name',
						'prompt'=>'Select '.$model->getAttributeLabel('city'),
						'ajax' => array(
							'type'=>'POST', 
							'url'=>Yii::app()->createUrl('studentEnrollment/loadsuburbs'),
							'success' => 'function(data){
								data	+= "<option value=\"-1\">Other</option>";
								$("#suburb_name").html(data);
								$("#suburb_name").trigger("chosen:updated");
								other_suburbs();
							}',
							'data'=>array('city'=>'js:this.value'),
						),
						'style'=>'width:228px;',
					)
				);
				?>
                <?php echo $form->error($model,'city'); ?>
            </div>
        </div>

        <div class="row mb10">
        	<div class="col-sm-4">
				<?php echo $form->labelEx($model,'suburb',array('class'=>'control-label')); ?>
                <?php
                $criteria				= new CDbCriteria;
				$criteria->join			= 'JOIN `cities` `p` ON `p`.`name`=:city';
				$criteria->condition	= '`t`.`city_id`=`p`.`id`';
				$criteria->params		= array(':city'=>$model->city);
				$criteria->order		= '`name`';
				$suburbs	= CHtml::listData(Suburbs::model()->findAll($criteria),'name','name');
                
				if(in_array($model->suburb, $suburbs) or $model->suburb==NULL){
					$suburbs["-1"]	= "Other";
					echo CHtml::dropDownList('suburb',$model->suburb,$suburbs,array('id'=>'suburb_name', 'prompt'=>'Select '.$model->getAttributeLabel('suburb'),'style'=>'width:228px;',));
					echo $form->hiddenField($model,'suburb',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('suburb')));
				}
				else{
					$suburbs["-1"]	= "Other";
					echo CHtml::dropDownList('suburb',"-1",$suburbs,array('id'=>'suburb_name', 'prompt'=>'Select '.$model->getAttributeLabel('suburb'),'style'=>'width:228px;',));
					echo $form->textField($model,'suburb',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('suburb')));
				}
				?>
                <?php echo $form->error($model,'suburb'); ?>
            </div>
            <div class="col-sm-4">
            	 <?php echo $form->labelEx($model,'address_line1',array('class'=>'control-label')); ?>
				<?php echo $form->textField($model,'address_line1', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('address_line1'))); ?>
                <?php echo $form->error($model,'address_line1'); ?>
            </div>
            <div class="col-sm-4">
            	 <?php echo $form->labelEx($model,'address_line2',array('class'=>'control-label')); ?>
				<?php echo $form->textField($model,'address_line2', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('address_line2'))); ?>
                <?php echo $form->error($model,'address_line2'); ?>
            </div>
        </div>
        <div class="row mb10">
            <div class="col-sm-4">
            	<?php echo $form->labelEx($model,'pin_code',array('class'=>'control-label')); ?>
				<?php echo $form->textField($model,'pin_code', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('pin_code'))); ?>
                <?php echo $form->error($model,'pin_code'); ?>
            </div>
       	</div>
        <br />
        <h4 class="text-success">POSTAL ADDRESS</h4>
    
        <div class="row mb10">
        	<div class="col-sm-4">
				<?php echo $form->labelEx($model,'postal_country_id',array('class'=>'control-label')); ?>
                <?php
				echo $form->dropDownList(
					$model,
					'postal_country_id',
					CHtml::listData(Countries::model()->findAll(), 'id', 'name'),
					array(
						'prompt'=>'Select '.$model->getAttributeLabel('postal_country_id'),
						'ajax' => array(
							'type'=>'POST', 
							'url'=>Yii::app()->createUrl('studentEnrollment/loadprovinces'),
							'success' => 'function(data){
								$("#p_province_name").html(data);
								$("#p_province_name").trigger("chosen:updated");
							}',
							'data'=>array('country_id'=>'js:this.value'),
						),
						'style'=>'width:228px;',
					)
				);
				?>
                <?php echo $form->error($model,'postal_country_id'); ?>
            </div>
            <div class="col-sm-4">
            	<?php echo $form->labelEx($model,'postal_state',array('class'=>'control-label')); ?>
				<?php
				$criteria				= new CDbCriteria;
				$criteria->condition	= '`country_id`=:country_id';
				$criteria->params		= array(':country_id'=>$model->postal_country_id);
				$criteria->order		= '`name`';
				$states	= CHtml::listData(Provinces::model()->findAll($criteria),'name','name');
                echo $form->dropDownList(
					$model,
					'postal_state',
					$states,
					array(
						'id'=>'p_province_name',
						'prompt'=>'Select '.$model->getAttributeLabel('postal_state'),
						'ajax' => array(
							'type'=>'POST', 
							'url'=>Yii::app()->createUrl('studentEnrollment/loadcities'),
							'success' => 'function(data){
								$("#p_city_name").html(data);
								$("#p_city_name").trigger("chosen:updated");
							}',
							'data'=>array('province'=>'js:this.value'),
						),
						'style'=>'width:228px;',
					)
				);
				?>
                <?php echo $form->error($model,'postal_state'); ?>
            </div>
             <div class="col-sm-4">
             	<?php echo $form->labelEx($model,'postal_city',array('class'=>'control-label')); ?>
				<?php
				$criteria				= new CDbCriteria;
				$criteria->join			= 'JOIN `provinces` `p` ON `p`.`name`=:state';
				$criteria->condition	= '`t`.`province_id`=`p`.`id`';
				$criteria->params		= array(':state'=>$model->postal_state);
				$criteria->order		= '`name`';
				$cities	= CHtml::listData(Cities::model()->findAll($criteria),'name','name');
                echo $form->dropDownList(
					$model,
					'postal_city',
					$cities,
					array(
						'id'=>'p_city_name',
						'prompt'=>'Select '.$model->getAttributeLabel('postal_city'),
						'ajax' => array(
							'type'=>'POST', 
							'url'=>Yii::app()->createUrl('studentEnrollment/loadsuburbs'),
							'success' => 'function(data){
								data	+= "<option value=\"-1\">Other</option>";
								$("#p_suburb_name").html(data);
								$("#p_suburb_name").trigger("chosen:updated");
								other_suburbs();
							}',
							'data'=>array('city'=>'js:this.value'),
						),
						'style'=>'width:228px;',
					)
				);
				?>
                <?php echo $form->error($model,'postal_city'); ?>
             </div>
        </div>
        <div class="row mb10">
        	 <div class="col-sm-4">
				<?php echo $form->labelEx($model,'postal_suburb',array('class'=>'control-label')); ?>
                <?php
				$criteria				= new CDbCriteria;
				$criteria->join			= 'JOIN `cities` `p` ON `p`.`name`=:city';
				$criteria->condition	= '`t`.`city_id`=`p`.`id`';
				$criteria->params		= array(':city'=>$model->postal_city);
				$criteria->order		= '`name`';
				$suburbs	= CHtml::listData(Suburbs::model()->findAll($criteria),'name','name');
                			
				if(in_array($model->postal_suburb, $suburbs) or $model->postal_suburb==NULL){
					$suburbs["-1"]	= "Other";
					echo CHtml::dropDownList('postal_suburb',$model->postal_suburb,$suburbs,array('id'=>'p_suburb_name', 'prompt'=>'Select '.$model->getAttributeLabel('postal_suburb'),'style'=>'width:228px;',));
					echo $form->hiddenField($model,'postal_suburb',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('postal_suburb')));
				}
				else{
					$suburbs["-1"]	= "Other";
					echo CHtml::dropDownList('postal_suburb',"-1",$suburbs,array('id'=>'p_suburb_name', 'prompt'=>'Select '.$model->getAttributeLabel('postal_suburb'),'style'=>'width:228px;',));
					echo $form->textField($model,'postal_suburb',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('postal_suburb')));
				}				
				?>
                
                <?php echo $form->error($model,'postal_suburb'); ?>
            </div>
            <div class="col-sm-4">
            	<?php echo $form->labelEx($model,'postal_postbox',array('class'=>'control-label')); ?>
				<?php echo $form->textField($model,'postal_postbox', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('postal_postbox'))); ?>
                <?php echo $form->error($model,'postal_postbox'); ?>
            </div>
            <div class="col-sm-4">
            	 <?php echo $form->labelEx($model,'postal_private_bag',array('class'=>'control-label')); ?>
				<?php echo $form->textField($model,'postal_private_bag', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('postal_private_bag'))); ?>
                <?php echo $form->error($model,'postal_private_bag'); ?>
            </div>
        </div>
    
        <div class="row mb10">
        	<div class="col-sm-4">
				<?php echo $form->labelEx($model,'postal_zip_code',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'postal_zip_code', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('postal_zip_code'))); ?>
                <?php echo $form->error($model,'postal_zip_code'); ?>
            </div>
        </div>
        <br />
        <h4 class="text-success">Student Category</h4>
    
        <div>
           
            <?php 
			$categories = CHtml::listData(StudentCategory::model()->findAllByAttributes(array('is_deleted'=>0)),'id','name');
			echo $form->dropDownList($model,'student_category_id',$categories,array('id'=>'student_category', 'prompt'=>'Select Category','style'=>'width:228px;',)); ?>
            <?php echo $form->error($model,'student_category_id'); ?>
        </div>
 		 <h4 class="text-success">Product & Services</h4>
    
        <div>
           
            <?php 
			
			$criteria				= new CDbCriteria;
			$criteria->join			= 'LEFT JOIN `admin_service_center` `p` ON `p`.center_id=:center';
			$criteria->condition	= '`t`.`id`=`p`.`service_id` AND `t`.`is_editable`=:status';
			$criteria->params		= array(':center'=>$center_id,':status'=>1);
			$criteria->order		= '`name`';
			$services = CHtml::listData(Services::model()->findAll($criteria),'id','name');
			echo $form->dropDownList($model_service,'service_id',$services,array('id'=>'service_id', 'prompt'=>'Select Services','style'=>'width:228px;',)); ?>
            <?php echo $form->error($model_service,'service_id'); ?>
        </div>
        <br />
        <h4 class="text-success">DOE(Department of Education) DETAILS</h4>
    
        <div>
            <label>Are you registered with the DOE (Department of Education)</label>
            <?php
            echo $form->radioButtonList($model,'registered_with_doe', array('1'=>'Yes', '0'=>'No'),array('separator'=>' ')); ?>
            <?php echo $form->error($model,'registered_with_doe'); ?>
        </div>
        
        <div id="doe_datas" <?php if($model->registered_with_doe==0){ echo 'style="display:none;"'; }?>>
            <div class="row mb10">
            	<div class="col-sm-6">
                <?php echo $form->labelEx($model,'doe_date',array('class'=>'control-label')); ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model'=>$model,
                    'attribute'=>'doe_date',
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'dd/mm/yy',
                        'changeMonth'=> true,
                        'changeYear'=>true,
                        'yearRange'=>'1900:'.date('Y')
                    ),
                    'htmlOptions'=>array(
                        'class'=>'form-control',
                        'placeholder'=>$model->getAttributeLabel('doe_date'),
                    ),
                ));
                ?>
                <?php echo $form->error($model,'doe_date'); ?>
                </div>
                <div class="col-sm-6">
                	<?php echo $form->labelEx($model,'doe_register_number',array('class'=>'control-label')); ?>
					<?php echo $form->textField($model,'doe_register_number', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('doe_register_number'))); ?>
                    <?php echo $form->error($model,'doe_register_number'); ?>
                </div>
            </div>
        </div>
    	<br />
        <h4 class="text-success">CURRICULUM PROVIDER DETAILS</h4>
    
        <div>
            <label>Are you registered with a Curriculum Provider?</label>
            <?php echo $form->radioButtonList($model,'registered_with_cp', array(1=>'Yes', 0=>'No'),array('separator'=>' ')); ?>
            <?php echo $form->error($model,'registered_with_cp'); ?>
        </div>
        
        <div id="cp_datas">
            <div class="row mb10">
            	<div class="col-sm-6">
                    <label class="control-label">If Yes, which Curriculum Provider</label>
                    <?php 
					$reg_cps	= CHtml::listData(CpCommonPool::model()->findAll(), 'name', 'name');
					if(in_array($model->registered_cp_name, $reg_cps) or $model->registered_cp_name==NULL){
						$reg_cps["-1"]	= "Other";
						echo CHtml::dropDownList('registered_cp_name',$model->registered_cp_name,$reg_cps,array('id'=>'registered_cp_name', 'prompt'=>'Select '.$model->getAttributeLabel('registered_cp_name')));
						echo $form->hiddenField($model,'registered_cp_name',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('registered_cp_name')));
					}
					else{
						$reg_cps["-1"]	= "Other";
						echo CHtml::dropDownList('registered_cp_name',"-1",$reg_cps,array('id'=>'registered_cp_name', 'prompt'=>'Select '.$model->getAttributeLabel('registered_cp_name')));
						echo $form->textField($model,'registered_cp_name',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('registered_cp_name')));
					}
					?>
                    <?php echo $form->error($model,'registered_cp_name'); ?>
                </div>
                <div class="col-sm-6">
                	<?php echo $form->labelEx($model,'registered_cp_client_number'); ?>
					<?php echo $form->textField($model,'registered_cp_client_number', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('registered_cp_client_number'))); ?>
                    <?php echo $form->error($model,'registered_cp_client_number'); ?>
                </div>
            </div>
        </div>
        
        <div class="row mb10">
            <div class="col-sm-4">
				<?php $this->widget('CCaptcha'); ?>
				<?php echo $form->textField($model,'verifyCode',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'verifyCode'); ?>
           	</div>
       	</div>                  
        
        <br />
         <div class="row mb10">
         	<div class="col-sm-4">
            <div class="row buttons">
                <?php echo CHtml::submitButton('Save & Continue',array('class'=>"btn btn-success btn-block")); ?>
            </div>
            </div>
        </div>
    
    <?php $this->endWidget(); ?>
    
    </div><!-- form -->
</div>
<script>
$('input[name=language]').change(function(e) {
	var that	= this,
		val		= $(that).val();	
	if(val=="-1"){
		$('input#Students_language').val('').attr('type', 'text');
	}
	else{
		$('input#Students_language').val(val).attr('type', 'hidden');
	}    
});
$('select[name=registered_cp_name]').change(function(e) {
	var that	= this,
		val		= $(that).val();	
	if(val=="-1"){
		$('input#Students_registered_cp_name').val('').attr('type', 'text');
	}
	else{
		$('input#Students_registered_cp_name').val(val).attr('type', 'hidden');
	}    
});

function other_suburbs(){
	$('select#p_suburb_name').unbind('change').change(function(e) {
		var that	= this,
			val		= $(that).val();	
		if(val=="-1"){
			$('input#Students_postal_suburb').val('').attr('type', 'text');
		}
		else{
			$('input#Students_postal_suburb').val(val).attr('type', 'hidden');
		}    
	});
	
	$('select#suburb_name').unbind('change').change(function(e) {
		var that	= this,
			val		= $(that).val();	
		if(val=="-1"){
			$('input#Students_suburb').val('').attr('type', 'text');
		}
		else{
			$('input#Students_suburb').val(val).attr('type', 'hidden');
		}    
	});
}
other_suburbs();

$('input[name="Students[registered_with_doe]"]').change(function(e) {
    var val	= $(this).val();
	if(val==0){
		$('#doe_datas').hide();
	}
	else{
		$('#doe_datas').show();
	}
});

<?php if($model->registered_with_cp==0){?>
window.setTimeout(function(){$('#cp_datas').hide();}, 1000);
<?php }?>
$('input[name="Students[registered_with_cp]"]').change(function(e) {
    var val	= $(this).val();
	if(val==0){
		$('#cp_datas').hide();
	}
	else{
		$('select#Students_registered_cp_name').trigger('chosen:updated');
		$('#cp_datas').show();
	}
});
</script>