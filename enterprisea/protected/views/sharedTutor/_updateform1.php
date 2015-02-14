
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'center-form',
	'enableAjaxValidation'=>false,
)); ?>


<?php echo $form->errorsummary($model_1); ?>
<div class="panel panel-default">
<div class="panel-heading" style="position:relative;">
              <div class="clear"></div>
              <h3 class="panel-title">Private Tutor Registration Application</h3>
  </div>
<div class="panel-body">
	<div class="col-sm-6">
    	
        <p>Some text giving them instructions...i.e. You must be older than 18 years old to apply</p>
        
        <p>Documents to be uploaded:</p>
        <ul style="list-style:none;">
         <li>1. CV</li>
         <li>2. Copy of ID and Business Registration Number</li>
         <li>3. Copy of latest study results/Diploma/Degree/Certificate</li>
         <li>4. Profile picture</li>
      </ul>
    </div>
    <div class="col-sm-4">
    	<p class="note">Fields with <span class="required">*</span> are required.</p>
        
    	<div class="form-group">
        	<label class="control-label">Type<span class="required">*</span></label>
       <?php
				
				$school	= CHtml::listData(SchoolTypes::model()->findAll(),'id','type');
				echo $form->dropDownList($model,'type_id',$school,
				 array(
					'prompt'=>'Select Type',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>$this->createUrl('loadcategories'), //or $this->createUrl('loadcities') if '$this' extends CController
					'success'=>'js:function(data){ $("#PrivateTutorCourse_course_id").html(data);$("#PrivateTutorCourse_course_id").trigger("chosen:updated");}', //or 'success' => 'function(data){...handle the data in the way you want...}',
				  'data'=>array('type'=>'js:this.value'),
				  ),'class'=>'form-control mb15')); 
		?>
            
		<?php echo $form->error($model,'provider_id'); ?>
        </div>
        <div class="form-group">
        	<label class="control-label">Course Category<span class="required">*</span></label>
		    <?php 
			$options = array();
			$categories	= CHtml::listData(CourseCategory::model()->findAllByAttributes(array('school_type'=>$model->type_id)), 'id', 'category' );
			if(isset($_POST['PrivateTutorCourse']['course_id']))
			{
				 foreach ($_POST['PrivateTutorCourse']['course_id'] as $optionVal) {
					 if ($optionVal) {
						$options[$optionVal] = array('selected' => 'selected');
						}
					}
			}else
				$saved_courses= PrivateTutorCourse::model()->findAllByAttributes(array('center_id'=>$model->id));
			if(isset($saved_courses))
			{
				 foreach ($saved_courses as $optionVal) {
					 if ($optionVal) {
						$options[$optionVal->course_id] = array('selected' => 'selected');
						}
					}
			}
			echo $form->dropDownList($model_course,'course_id',$categories,array('options' =>$options,'multiple'=>true,'class'=>'form-control mb15')); //,'prompt' => 'Select Course Category'?>
		<?php echo $form->error($model_course,'course_id'); ?>
        </div>
        
       
    </div>
</div>
</div>

<div class="panel panel-default">
 <!-- Nav tabs -->
       
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="home3">
            <div class="panel-heading">
              <h4 class="panel-title">Personal Details</h4>
            </div>
           <div class="panel-body">
           		<div class="col-sm-4">
                	
                    <div class="form-group">
                    	<label class="control-label">First Name<span class="required">*</span></label>
						<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                        <?php echo $form->error($model,'name'); ?>
                    </div>
                    <div class="form-group">
                    	<label class="control-label">Middle Name<span class="required">*</span></label>
						<?php echo $form->textField($model,'m_name',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                        <?php echo $form->error($model,'m_name'); ?>
                    </div>
                    <div class="form-group">
                    	<label class="control-label">Last Name<span class="required">*</span></label>
						<?php echo $form->textField($model,'l_name',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                        <?php echo $form->error($model,'l_name'); ?>
                    </div>
                    <div class="form-group">
                    	<label class="control-label">Surename<span class="required">*</span></label>
						<?php echo $form->textField($model,'surname',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                        <?php echo $form->error($model,'surname'); ?>
                    </div>
                    <div class="form-group">
                    	<label class="control-label">Marital Status<span class="required">*</span></label>
						<?php echo $form->dropDownList($model,'marital_status',array('1'=>'Single','2'=>'Engaged','3'=>'Married','4'=>'Separated','5'=>'Widowed','6'=>'Divorced','7'=>'Other'),array('prompt' => 'Select Marital Status','class'=>'form-control mb15')); ?>
                        <?php echo $form->error($model,'marital_status'); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                	<div class="form-group">
                    <label class="control-label">Date of Birth<span class="required">*</span></label>
                    	
		<?php 
		
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        //'name'=>'attendance_date',
                        'model'=>$model,
                        'attribute'=>'dob',
                        // additional javascript options for the date picker plugin
                        'options'=>array(
                        'showAnim'=>'fold',
                        //'dateFormat'=>$date,
                        'changeMonth'=> true,
                        'changeYear'=>true,
                        'yearRange'=>'1900:'.(date('Y')+5)
                        ),
                        'htmlOptions'=>array(
                        
						'class'=>'form-control mb15'
                        ),
                        ));
						
		?>
		<?php echo $form->error($model,'dob'); ?>
                    </div>
                    <div class="form-group">
                    	<label class="control-label">Age<span class="required">*</span></label>
						<?php echo $form->dropDownList($model,'age',array('4'=>'4','50'=>'50'),array('prompt' => 'Select Age','class'=>'form-control mb15')); ?>
                        <?php echo $form->error($model,'age'); ?>
                    </div>
                    <div class="form-group">
                    	<label class="control-label">Birth Place<span class="required">*</span></label>
						<?php echo $form->textField($model,'birth_place',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                        <?php echo $form->error($model,'birth_place'); ?>
                    </div>
                    <div class="form-group">
                    	<label class="control-label">Nationality<span class="required">*</span></label>
						<?php echo $form->dropDownList($model,'nationality',CHtml::listData(Nationality::model()->findAll(),'id','name'),array(
                        'class'=>'form-control mb15','empty'=>'Select Nationality','options' => array('164'=>array('selected'=>true))
                        )); ?>
                        <?php echo $form->error($model,'nationality'); ?>
                    </div>
                    <div class="form-group">
                    	<label class="control-label">Ethnicity<span class="required">*</span></label>
						<?php echo $form->textField($model,'ethnicity',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                        <?php echo $form->error($model,'ethnicity'); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                	<div class="form-group">
                    	<label class="control-label">Passport ID<span class="required">*</span></label>
						<?php echo $form->textField($model,'passport_id',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                        <?php echo $form->error($model,'passport_id'); ?>
                    </div>
                    <div class="form-group">
                    	<label class="control-label">Tax Number<span class="required">*</span></label>
						<?php echo $form->textField($model,'tax_no',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                        <?php echo $form->error($model,'tax_no'); ?>
                    </div>
                     <div class="form-group">
                     	<label class="control-label">Gender<span class="required">*</span></label>
						<?php echo $form->radioButtonList($model, 'gender', array('1'=>'Male', '2'=>'Female'), array('uncheckValue'=>null, 'onclick'=>"",'labelOptions'=>array('style'=>'display:inline'),'separator'=>' &nbsp;&nbsp;')); ?>
                        <?php echo $form->error($model,'gender'); ?>
                     </div>
                     <div class="form-group">
                     	<label class="control-label">Language<span class="required">*</span></label>
						<?php echo $form->radioButtonList($model, 'language', array('Afrikaans'=>'Afrikaans', 'English'=>'English','Other'=>'Other'), array('uncheckValue'=>null, 'onclick'=>"",'labelOptions'=>array('style'=>'display:inline'),'separator'=>' &nbsp;&nbsp;')); ?>
                        <?php echo $form->error($model,'language'); ?>
                     </div>
                      <div class="form-group">
                     	<label class="control-label">Fully Bilingual?<span class="required">*</span></label>
						<?php echo $form->radioButtonList($model, 'is_bilingual', array('1'=>'Yes', '0'=>'No'), array('uncheckValue'=>null, 'onclick'=>"",'labelOptions'=>array('style'=>'display:inline'),'separator'=>' &nbsp;&nbsp;')); ?>
                        <?php echo $form->error($model,'language'); ?>
                     </div>
                     <div class="form-group">
                     <label class="control-label">Religion<span class="required">*</span></label>
						<?php echo $form->textField($model,'religion',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                        <?php echo $form->error($model,'religion'); ?>
                     </div>
                </div>
                
           </div>
           <br />
           <div class="panel-body" style="border-top:1px #CCC solid;">
           		<div class="form-group">
            	<label class="control-label">Cell Number<span class="required">*</span></label>
				<?php echo $form->textField($model,'cell_no',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                <?php echo $form->error($model,'cell_no'); ?>
                </div>
                <div class="form-group">
                    <label class="control-label">Home Number<span class="required">*</span></label>
                    <?php echo $form->textField($model,'home_no',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model,'home_no'); ?>
                </div>
            	<div class="form-group">
            	<label class="control-label">Center Number<span class="required">*</span></label>
				<?php echo $form->textField($model,'center_no',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                <?php echo $form->error($model,'center_no'); ?>
                </div>
                <div class="form-group">
                    <label class="control-label">Email Address<span class="required">*</span></label>
                    <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model,'email'); ?>
                </div>
                 <div class="form-group">
                    <label class="control-label">Website<span class="required">*</span></label>
                    <?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model,'website'); ?>
                </div>
                 <div class="form-group">
                    <label class="control-label">Skype Name<span class="required">*</span></label>
                    <?php echo $form->textField($model,'skype',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model,'skype'); ?>
                </div>
           </div>
            <div class="panel-body" style="border-top:1px #CCC solid;">
            	<div class="col-sm-4">
                	<div class="form-group">
                	<label class="control-label">Name</label>
					<?php echo $form->textField($model,'spouse_name',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model,'spouse_name'); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                	<div class="form-group">
                	<label class="control-label">Date Of Birth</label>
					<?php 
		
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        //'name'=>'attendance_date',
                        'model'=>$model,
                        'attribute'=>'spouse_dob',
                        // additional javascript options for the date picker plugin
                        'options'=>array(
                        'showAnim'=>'fold',
                        //'dateFormat'=>$date,
                        'changeMonth'=> true,
                        'changeYear'=>true,
                        'yearRange'=>'1900:'.(date('Y')+5)
                        ),
                        'htmlOptions'=>array(
                        
						'class'=>'form-control mb15'
                        ),
                        ));
						
		?>
                    <?php echo $form->error($model,'spouse_dob'); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                	<div class="form-group">
                	<label class="control-label">ID/Passport Number</label>
					<?php echo $form->textField($model,'spouse_passport_id',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model,'spouse_passport_id'); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                	<div class="form-group">
                	<label class="control-label">Cell Number</label>
					<?php echo $form->textField($model,'spouse_cell_no',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model,'spouse_cell_no'); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                	<div class="form-group">
                	<label class="control-label">Home Number</label>
					<?php echo $form->textField($model,'spouse_home_no',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model,'spouse_home_no'); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                	<div class="form-group">
                	<label class="control-label">Work Number</label>
					<?php echo $form->textField($model,'spouse_work_no',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model,'spouse_work_no'); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                	<div class="form-group">
                	<label class="control-label">Email-Address</label>
					<?php echo $form->textField($model,'spouse_email',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model,'spouse_email'); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                	<div class="form-group">
                	<label class="control-label">Skype Name</label>
					<?php echo $form->textField($model,'spouse_skype',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model,'spouse_skype'); ?>
                    </div>
                </div>
                
           </div>
          </div>
          <div class="tab-pane" id="profile3">
            <div class="row">
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
               
            </div>
          </div>
          <div class="tab-pane" id="about3">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
          </div>
          <div class="tab-pane" id="contact3">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
          </div>
        </div>
			
</div>

<div class="panel panel-default">
	<div class="panel-heading" style="position:relative;">
    	<div class="clear"></div>
        	
            
  </div>
	<div class="panel-body">
    	<div class="col-sm-4">
        	<h5 class="subtitle">Tutor Physical Address</h5>
            <div class="form-group">
            	<label class="control-label">Country<span class="required">*</span></label>
				<?php echo $form->dropDownList($model,'pp_country',array('1'=>'india','2'=>'pakistan'),array('prompt' => 'Select Country','class'=>'form-control mb15')); ?>
                <?php echo $form->error($model,'pp_country'); ?>
            </div>
            <div class="form-group">
            	<label class="control-label">Province<span class="required">*</span></label>
				<?php echo $form->dropDownList($model,'pp_province',array('1'=>'kochi','2'=>'alappuzha'),array('prompt' => 'Select Province','class'=>'form-control mb15')); ?>
                <?php echo $form->error($model,'pp_province'); ?>
            </div>
            <div class="form-group">
            	<label class="control-label">City<span class="required">*</span></label>
				<?php echo $form->dropDownList($model,'pp_city',array('1'=>'kochi','2'=>'alappuzha'),array('prompt' => 'Select City','class'=>'form-control mb15')); ?>
                <?php echo $form->error($model,'pp_city'); ?>
            </div>
             <div class="form-group">
             	<label class="control-label">Suburb<span class="required">*</span></label>
				<?php echo $form->dropDownList($model,'pp_suburb',array('1'=>'kochi','2'=>'alappuzha'),array('prompt' => 'Select Suburb','class'=>'form-control mb15')); ?>
                <?php echo $form->error($model,'pp_suburb'); ?>
             </div>
             <div class="form-group">
             	<label class="control-label">Zipcode<span class="required">*</span></label>
				<?php echo $form->textField($model,'pp_zipcode',array('size'=>45,'maxlength'=>45,'class'=>'form-control mb15')); ?>
                <?php echo $form->error($model,'pp_zipcode'); ?>
             </div>
             <br />
             <div class="form-group">
             	<label class="control-label">Street Address 1<span class="required">*</span></label>
				<?php echo $form->textField($model,'pp_address1',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                <?php echo $form->error($model,'pp_address1'); ?>
             </div>
             <div class="form-group">
             	<label class="control-label">Street Address 2<span class="required">*</span></label>
				<?php echo $form->textField($model,'pp_address2',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                <?php echo $form->error($model,'pp_address2'); ?>
             </div>
             
              
             
        </div>
    	
        <div class="col-sm-4 col-sm-offset-1">
        	<h5 class="subtitle">Tutor Postal Address</h5>
            <div class="form-group">
            	<label class="control-label">Country<span class="required">*</span></label>
				<?php echo $form->dropDownList($model,'po_country',array('1'=>'india','2'=>'pakistan'),array('prompt' => 'Select Country','class'=>'form-control mb15')); ?>
                <?php echo $form->error($model,'po_country'); ?>
            </div>
            <div class="form-group">
            	<label class="control-label">Province<span class="required">*</span></label>
				<?php echo $form->dropDownList($model,'po_province',array('1'=>'kochi','2'=>'alappuzha'),array('prompt' => 'Select Province','class'=>'form-control mb15')); ?>
                <?php echo $form->error($model,'po_province'); ?>
            </div>
            <div class="form-group">
            	<label class="control-label">City<span class="required">*</span></label>
				<?php echo $form->dropDownList($model,'po_city',array('1'=>'kochi','2'=>'alappuzha'),array('prompt' => 'Select City','class'=>'form-control mb15')); ?>
                <?php echo $form->error($model,'po_city'); ?>
            </div>
            <div class="form-group">
            	<label class="control-label">Suburb<span class="required">*</span></label>
				<?php echo $form->dropDownList($model,'po_suburb',array('1'=>'kochi','2'=>'alappuzha'),array('prompt' => 'Select Suburb','class'=>'form-control mb15')); ?>
                <?php echo $form->error($model,'po_suburb'); ?>
            </div>
            <div class="form-group">
            	<label class="control-label">Postal / Zipcode<span class="required">*</span></label>
				<?php echo $form->textField($model,'po_zipcode',array('size'=>45,'maxlength'=>45,'class'=>'form-control mb15')); ?>
                <?php echo $form->error($model,'po_zipcode'); ?>
            </div>
            <br />
            <div class="form-group">
            	<label class="control-label">P O Box / Private Bag<span class="required">*</span></label>
				<?php echo $form->textField($model,'po_box',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                <?php echo $form->error($model,'po_box'); ?>
            </div>
             <br />
              <br />
              
            <div  class="clearfix">
            <h4>Medical History (If Any)</h4>
            <div class="form-group">
                <label class="control-label">Brief description<span class="required">*</span></label>
                <?php echo $form->textArea($model,'achievements',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'achievements'); ?>
            </div>
            </div>
        </div>
	</div>
</div>


<div class="panel panel-default">
	<div class="panel-heading" style="position:relative;">
    	<div class="clear"></div>
        	<h3 class="panel-title">Credentials</h3>
            
  </div>
	<div class="panel-body">
    	<h5 class="subtitle">Experience / Employment</h5>
        
          <div class="table-responsive">
          <table class="table table-striped mb30">
            <thead>
              <tr>
                <th>Employer name</th>
                <th>Where located?</th>
                <th>Position</th>
                <th>Period</th>
                <th>Gross Income</th>
                <th>Net Income</th>
                 <th>Contact Person</th>
                <th>Contact Number</th>
              </tr>
            </thead>
            <tbody>
              <!--Experience................ -->
             
  
   
	
              <tr>
                <td>
                	<div class="form-group">
					<?php echo $form->textField($model_1,'name',array('class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model_1,'name'); ?>
                    </div>
                </td>
                <td>
                	<div class="form-group">
					<?php echo $form->textField($model_1,'location',array('class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model_1,'location'); ?>
                    </div>
                </td>
                <td>  
                	<div class="form-group">  	
					<?php echo $form->textField($model_1,'period',array('class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model_1,'period'); ?>
                    </div>
                </td>
                <td>
                	<div class="form-group">
					<?php echo $form->textField($model_1,'position',array('class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model_1,'position'); ?>
                    </div>
                </td>
                <td>
                	<div class="form-group">
					<?php echo $form->textField($model_1,'gross_income',array('class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model_1,'gross_income'); ?>
                    </div>
                </td>
                <td>
                	<div class="form-group">
					<?php echo $form->textField($model_1,'net_income',array('class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model_1,'net_income'); ?>
                    </div>
        		</td>
                <td>
                	<div class="form-group">
					<?php echo $form->textField($model_1,'contact_person',array('class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model_1,'contact_person'); ?>
                    </div>
        		</td>
                <td>
                	<div class="form-group">
					<?php echo $form->textField($model_1,'contact_no',array('class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model_1,'contact_no'); ?>
                    </div>
        		</td>
              </tr>
              
    
    		<!--Experience................ -->
            </tbody>
          </table>
          </div><!-- table-responsive -->
          
          
          <div class="col-sm-4">
          		<div class="form-group">
                <label class="control-label">Qualification<span class="required">*</span></label>
                	
					<?php echo $form->textField($model,'qualification',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                    <?php echo $form->error($model,'qualification'); ?>
                </div>
                <div class="form-group">
                <label class="control-label">Year Qualified<span class="required">*</span></label>
                	
					<?php 
		
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        //'name'=>'attendance_date',
                        'model'=>$model,
                        'attribute'=>'qualification_year',
                        // additional javascript options for the date picker plugin
                        'options'=>array(
                        'showAnim'=>'fold',
                        //'dateFormat'=>$date,
                        'changeMonth'=> true,
                        'changeYear'=>true,
                        'yearRange'=>'1900:'.(date('Y')+5)
                        ),
                        'htmlOptions'=>array(
                        
						'class'=>'form-control mb15'
                        ),
                        ));
						
		?>
                    <?php echo $form->error($model,'qualification_year'); ?>
                </div>
          </div>
    </div>
    
  <?php /*?><div class="panel-body" style="border-top:1px #CCC solid;">
    	<h4>I offer tutoring for the following Grades and Subjects:</h4>
        <div class="col-sm-4">
        	<div class="form-group">
            	<?php echo $form->labelEx($model_grades,'[]grade_id',array('class'=>'control-label')); ?>
				<?php echo $form->dropDownList($model_grades,'grade_id',array('1'=>'Grade 1','2'=>'Grade 2','3'=>'Grade 3'),array('class'=>'form-control mb15')); ?>
                <?php echo $form->error($model_grades,'grade_id'); ?>
          </div>
        </div>
        <div class="col-sm-4">
        	<div class="form-group">
            	<?php echo $form->labelEx($model_batches,'[]batch_id',array('class'=>'control-label')); ?>
				<?php echo $form->dropDownList($model_batches,'batch_id',array('1'=>'Brainline','2'=>'Impak','3'=>'Damelin'),array('class'=>'form-control mb15')); ?>
                <?php echo $form->error($model_batches,'batch_id'); ?>
            </div>
        </div>
        <div class="col-sm-4">
        	<div class="form-group">
            	<?php echo $form->labelEx($model_subjects,'[]subject_id',array('class'=>'control-label')); ?>
				<?php echo $form->dropDownList($model_subjects,'subject_id',array('1'=>'Brainline Subjects','2'=>'Impak Subjects','3'=>'Damelin Subjects'),array('class'=>'form-control mb15')); ?>
                <?php echo $form->error($model_subjects,'subject_id'); ?>
            </div>
        </div>
        
  </div><?php */?>
  <div class="panel-body" style="border-top:1px #CCC solid;">
    <div class="clearfix">
  	<h4>Registered with the SACE - (Supply registration number if applicable)</h4>
    <div class="col-sm-3">
    	<div class="form-group">
        	
          <div class="">
		<?php echo $form->radioButtonList($model, 'registered_sace', array('1'=>'Yes', '0'=>'No'), array('uncheckValue'=>null, 'onclick'=>"",'labelOptions'=>array('style'=>'display:inline'),'separator'=>' &nbsp;&nbsp;&nbsp;&nbsp;')); ?>
		<?php echo $form->error($model,'registered_sace'); ?>
        </div>
        </div>
    </div>
    
    <div class="col-sm-3">
    	<div class="form-group">
        	
			<?php echo $form->textField($model,'sace_number',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
            <?php echo $form->error($model,'sace_number'); ?>
        </div>
    </div>
    <div class="form-group">
                <label class="control-label">Date of registration<span class="required">*</span></label>
                	
					<?php 
		
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        //'name'=>'attendance_date',
                        'model'=>$model,
                        'attribute'=>'sace_date',
                        // additional javascript options for the date picker plugin
                        'options'=>array(
                        'showAnim'=>'fold',
                        //'dateFormat'=>$date,
                        'changeMonth'=> true,
                        'changeYear'=>true,
                        'yearRange'=>'1900:'.(date('Y')+5)
                        ),
                        'htmlOptions'=>array(
                        
						'class'=>'form-control mb15'
                        ),
                        ));
						
		?>
                    <?php echo $form->error($model,'sace_date'); ?>
                </div>
    </div>
    <div  class="clearfix">
    <h4>General</h4>
    <div class="col-sm-3">
    	<div class="form-group">
        	
          <div class="radio">
          <label class="control-label">Do you have a criminal record?<span class="required">*</span></label>
			<?php echo $form->radioButtonList($model, 'is_criminal', array('1'=>'Yes', '0'=>'No'), array('uncheckValue'=>null, 'onclick'=>"",'separator' =>'<br/><br/>' )); ?>
            <?php echo $form->error($model,'is_criminal'); ?>
            </div>
        </div>
    </div>
    
    <div  class="clearfix">
            <h4>If Yes, please give details</h4>
            <div class="form-group">
                <label class="control-label">Brief description<span class="required">*</span></label>
                <?php echo $form->textArea($model,'criminal_details',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'criminal_details'); ?>
            </div>
            </div>
    </div>
    <div  class="clearfix">
    <h4>Academic & Cultural Achievements (If any)</h4>
    <div class="form-group">
    	
		<?php echo $form->textArea($model,'achievements',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'achievements'); ?>
    </div>
    </div>
  </div>
</div>
<div class="panel panel-default">
	<div class="panel-heading" style="position:relative;">
    	<div class="clear"></div>
        	<h3 class="panel-title">Terms & Conditions</h3>
            
  </div>
  <div class="panel-body">
   	<p>
By clicking submit I Confirm that all the information contained herein is true and correct AND declare that I have read and agree to the TERMS & CONDITIONS of use of any or all StudyPro products and services.</p>
	<div class="checkbox block"><label><input type="checkbox" name="agree" id="agree"> I Agree</label></div>
    <br />
    <p>Type these numbers and letters in the space provided.</p>
    <div class="col-sm-4"><?php $this->widget('CCaptcha'); ?>
    </div>
    <div class="col-sm-2">
    	<div class="form-group">
                   
                   <?php echo $form->textField($model,'verifyCode',array('class'=>'form-control')); ?>
                  <?php echo $form->error($model,'verifyCode'); ?>  
      </div>
    </div>
    
  </div>
  <div class="panel-footer">
             
              <?php echo CHtml::submitButton($model->isNewRecord ? 'Continue to the next section' : 'Save',array('class'=>'btn btn-orange')); ?>
</div>
</div>


<?php $this->endWidget(); ?>

<?php Yii::app()->clientScript->registerScript('jquery.js', "
$('#center-form').submit(function() {
	if($('#agree').attr('checked'))
	{
	}
	else{
		alert('please agree to the TERMS & CONDITIONS.');
		return false;
	}
    
});
");
?>
