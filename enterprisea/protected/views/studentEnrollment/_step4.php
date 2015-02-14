<div class="wiz_right">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'guardians-_step4-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>
    <div class="row">
    	<h4 class="text-success">PERSONAL DETAILS</h4>
        <div class="row mb10">
        	<div class="col-sm-4">
            <?php echo $form->labelEx($model,'relation',array('class'=>'control-label')); ?>
            <?php
            $g_relation	= array("Guardian"=>"Guardian", "Father"=>"Father", "Mother"=>"Mother", "Step-Father"=>"Step-Father", "Step-Mother"=>"Step-Mother", "Brother"=>"Brother", "Sister"=>"Sister", "Grand Parent"=>"Grand Parent", "Uncle"=>"Uncle", "Aunt"=>"Aunt", "Friend"=>"Friend");						
			if(in_array($model->relation, $g_relation) or $model->relation==NULL){
				$g_relation["-1"]	= "Other";
				echo CHtml::dropDownList('relation',$model->relation,$g_relation,array('id'=>'g_relation','prompt'=>"Select Parent ".$model->getAttributeLabel('relation')));
				echo $form->hiddenField($model,'relation',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('relation')));
			}
			else{
				$g_relation["-1"]	= "Other";
				echo CHtml::dropDownList('relation',$model->relation,$g_relation,array('id'=>'g_relation','prompt'=>"Select Parent ".$model->getAttributeLabel('relation'),'options' => array('-1'=>array('selected'=>true))));
				echo $form->textField($model,'relation',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('relation')));
			}
			?>
            <?php echo $form->error($model,'relation'); ?>
            </div>
        </div><br />
       <div class="row mb10">
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'first_name',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'first_name',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('first_name'))); ?>
                <?php echo $form->error($model,'first_name'); ?>
            </div>
        
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'last_name',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'last_name',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('last_name'))); ?>
                <?php echo $form->error($model,'last_name'); ?>
            </div>	
        
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'sur_name',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'sur_name',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('sur_name'))); ?>
                <?php echo $form->error($model,'sur_name'); ?>
            </div>
    	</div>
        <div class="row mb10">
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'id_passport_number',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'id_passport_number',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('id_passport_number'))); ?>
                <?php echo $form->error($model,'id_passport_number'); ?>
            </div>
            
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'dob',array('class'=>'control-label')); ?>
                <?php 
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model'=>$model,
                    'attribute'=>'dob',
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
                        'class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('dob')
                    ),
                ));
                ?>
                <?php echo $form->error($model,'dob'); ?>
            </div>
            
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'age',array('class'=>'control-label')); ?><br />
                <?php echo $form->dropDownList($model,'age',range(18, 80),array('prompt'=>'Select '.$model->getAttributeLabel('age'))); ?>
                <?php echo $form->error($model,'age'); ?>
            </div>
    	</div>
        <div class="row mb10">
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'birth_place',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'birth_place',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('birth_place'))); ?>
                <?php echo $form->error($model,'birth_place'); ?>
            </div>
        
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'gender',array('class'=>'control-label')); ?><br />
                <?php echo $form->radioButtonList($model,'gender',array('M'=>'Male', 'F'=>'Female'),array('separator'=>' ')); ?>
                <?php echo $form->error($model,'gender'); ?>
            </div>
        
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'nationality_id',array('class'=>'control-label')); ?>
                <?php echo $form->dropDownList($model,'nationality_id',CHtml::listData(Nationality::model()->findAll(), 'id', 'name'), array('prompt'=>'Select '.$model->getAttributeLabel('nationality_id')));?>
                <?php echo $form->error($model,'nationality_id'); ?>
            </div>
    	</div>
        <div class="row mb10">
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'religion',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'religion',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('religion'))); ?>
                <?php echo $form->error($model,'religion'); ?>
            </div>
        
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'marital_status',array('class'=>'control-label')); ?>
                <?php			
                $m_status	= array("Single"=>"Single", "Engaged"=>"Engaged", "Married"=>"Married", "Separated"=>"Separated", "Widowed"=>"Widowed", "Divorced"=>"Divorced");
                if(in_array($model->marital_status, $m_status) or $model->marital_status==NULL){
                    $m_status["-1"]	= "Other";
                    echo CHtml::dropDownList('marital_status',$model->marital_status,$m_status,array('id'=>'marital_status','prompt'=>"Select ".$model->getAttributeLabel('marital_status')));
                    echo $form->hiddenField($model,'marital_status',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('marital_status')));
                }
                else{
                    $m_status["-1"]	= "Other";
                    echo CHtml::dropDownList('relation',$model->marital_status,$m_status,array('id'=>'marital_status','prompt'=>"Select ".$model->getAttributeLabel('marital_status'),'options' => array('-1'=>array('selected'=>true))));
                    echo $form->textField($model,'marital_status',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('marital_status')));
                }
                
                ?>
                <?php echo $form->error($model,'marital_status'); ?>
            </div>
        </div>
        <br />
        <h4 class="text-success">EMPLOYMENT DETAILS</h4>
    	<div class="row mb10">
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'emp_name',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'emp_name',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('emp_name'))); ?>
                <?php echo $form->error($model,'emp_name'); ?>
            </div>
        
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'emp_position',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'emp_position',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('emp_position'))); ?>
                <?php echo $form->error($model,'emp_position'); ?>
            </div>
        
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'emp_period',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'emp_period',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('emp_period'))); ?>
                <?php echo $form->error($model,'emp_period'); ?>
            </div>
    	</div>
        <div class="row mb10">
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'emp_gross_income',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'emp_gross_income',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('emp_gross_income'))); ?>
                <?php echo $form->error($model,'emp_gross_income'); ?>
            </div>
        
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'emp_net_income',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'emp_net_income',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('emp_net_income'))); ?>
                <?php echo $form->error($model,'emp_net_income'); ?>
            </div>
        </div>
        <br />
        <h4 class="text-success">CONTACT DETAILS</h4>
        <div class="row mb10">
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'mobile_phone',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'mobile_phone',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('mobile_phone'))); ?>
                <?php echo $form->error($model,'mobile_phone'); ?>
            </div>
            
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'home_number',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'home_number',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('home_number'))); ?>
                <?php echo $form->error($model,'home_number'); ?>
            </div>
            
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'office_phone1',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'office_phone1',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('office_phone1'))); ?>
                <?php echo $form->error($model,'office_phone1'); ?>
            </div>
        </div>
        <div class="row mb10">
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'email',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'email',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('email'))); ?>
                <?php echo $form->error($model,'email'); ?>
            </div>
        
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'skype_name',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'skype_name',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('skype_name'))); ?>
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
                /*echo $form->dropDownList(
					$model,
					'suburb',
					$suburbs,
					array(
						'id'=>'suburb_name',
						'prompt'=>'Select '.$model->getAttributeLabel('suburb'),						
						'style'=>'width:228px;',
					)
				);*/
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
                <?php echo $form->labelEx($model,'office_address_line1',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'office_address_line1',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('office_address_line1'))); ?>
                <?php echo $form->error($model,'office_address_line1'); ?>
            </div>
        
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'office_address_line2',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'office_address_line2',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('office_address_line2'))); ?>
                <?php echo $form->error($model,'office_address_line2'); ?>
            </div>
    	</div>
        <div class="row mb10">
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'pin_code',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'pin_code',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('pin_code'))); ?>
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
                /*echo $form->dropDownList(
					$model,
					'postal_suburb',
					$suburbs,
					array(
						'id'=>'p_suburb_name',
						'prompt'=>'Select '.$model->getAttributeLabel('postal_suburb'),						
						'style'=>'width:228px;',
					)
				);*/
				
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
                <?php echo $form->labelEx($model,'postal_street_address_line1',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'postal_street_address_line1',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('postal_street_address_line1'))); ?>
                <?php echo $form->error($model,'postal_street_address_line1'); ?>
            </div>
        
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'postal_street_address_line2',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'postal_street_address_line2',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('postal_street_address_line2'))); ?>
                <?php echo $form->error($model,'postal_street_address_line2'); ?>
            </div>
    	</div>
        <div class="row mb10">
        <div class="col-sm-4">
            <?php echo $form->labelEx($model,'postal_pin_code',array('class'=>'control-label')); ?>
            <?php echo $form->textField($model,'postal_pin_code',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('postal_pin_code'))); ?>
            <?php echo $form->error($model,'postal_pin_code'); ?>
        </div>
        </div><br />
        <h4 class="text-success">SPOUSE / MOTHER DETAILS</h4>
        <div class="row mb10">
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'sm_relation',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'sm_relation',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('sm_relation'))); ?>
                <?php echo $form->error($model,'sm_relation'); ?>
            </div>
        
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'sm_fullname',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'sm_fullname',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('sm_fullname'))); ?>
                <?php echo $form->error($model,'sm_fullname'); ?>
            </div>	
        
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'sm_dob'); ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model'=>$model,
                    'attribute'=>'sm_dob',
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
                        'placeholder'=>$model->getAttributeLabel('sm_dob'),
                    ),
                ));
                ?>            
                <?php echo $form->error($model,'sm_dob'); ?>
            </div>
    	</div>
        <div class="row mb10">
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'sm_id_passport_number',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'sm_id_passport_number',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('sm_id_passport_number'))); ?>
                <?php echo $form->error($model,'sm_id_passport_number'); ?>
            </div>
        
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'sm_mobile_number',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'sm_mobile_number',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('sm_mobile_number'))); ?>
                <?php echo $form->error($model,'sm_mobile_number'); ?>
            </div>
        
            <div class="col-sm-4">
                <?php echo $form->labelEx($model,'sm_home_number',array('class'=>'control-label')); ?>
                <?php echo $form->textField($model,'sm_home_number',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('sm_home_number'))); ?>
                <?php echo $form->error($model,'sm_home_number'); ?>
            </div>
    	</div>
        <div class="row mb10">
        <div class="col-sm-4">
            <?php echo $form->labelEx($model,'sm_work_number',array('class'=>'control-label')); ?>
            <?php echo $form->textField($model,'sm_work_number',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('sm_work_number'))); ?>
            <?php echo $form->error($model,'sm_work_number'); ?>
        </div>
    
        <div class="col-sm-4">
            <?php echo $form->labelEx($model,'sm_email',array('class'=>'control-label')); ?>
            <?php echo $form->textField($model,'sm_email',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('sm_email'))); ?>
            <?php echo $form->error($model,'sm_email'); ?>
        </div>
    
        <div class="col-sm-4">
            <?php echo $form->labelEx($model,'sm_skype_name',array('class'=>'control-label')); ?>
            <?php echo $form->textField($model,'sm_skype_name',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('sm_skype_name'))); ?>
            <?php echo $form->error($model,'sm_skype_name'); ?>
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
        <div class="col-sm-4 buttons">
            <?php echo CHtml::submitButton('Save & Continue',array('class'=>"btn btn-success btn-block")); ?>
        </div>
        <div class="col-sm-4 buttons">
            <?php echo CHtml::link('Upload Documentations',array('step5', 'token'=>$_GET['token']),array('class'=>"btn btn-default btn-block")); ?>
        </div>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
$('select#g_relation').on('change', function(){
	var that	= this,
		val		= $(that).val();	
	if(val=="-1"){
		$('input#Guardians_relation').val('').attr('type', 'text');
	}
	else{
		$('input#Guardians_relation').val(val).attr('type', 'hidden');
	}
});

$('select#marital_status').on('change', function(){
	var that	= this,
		val		= $(that).val();	
	if(val=="-1"){
		$('input#Guardians_marital_status').val('').attr('type', 'text');
	}
	else{
		$('input#Guardians_marital_status').val(val).attr('type', 'hidden');
	}
});

function other_suburbs(){
	$('select#p_suburb_name').unbind('change').change(function(e) {
		var that	= this,
			val		= $(that).val();	
		if(val=="-1"){
			$('input#Guardians_postal_suburb').val('').attr('type', 'text');
		}
		else{
			$('input#Guardians_postal_suburb').val(val).attr('type', 'hidden');
		}    
	});
	
	$('select#suburb_name').unbind('change').change(function(e) {
		var that	= this,
			val		= $(that).val();	
		if(val=="-1"){
			$('input#Guardians_suburb').val('').attr('type', 'text');
		}
		else{
			$('input#Guardians_suburb').val(val).attr('type', 'hidden');
		}    
	});
}
other_suburbs();
</script>