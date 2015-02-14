<div class="se_panel">
    <div class="col-md-12 se_header">
        <div class="col-sm-4 se_logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.jpg" ></div>
        <div class="col-sm-8 se_head"> <h2>Student Enrolment - Previous Details</h2></div>
    </div>
    <div class="row">        
        <div class="col-md-4">
        	<?php $this->renderPartial('_leftside');?>
        </div><!-- col-sm-6 -->
        
        <div class="col-md-8">
        	<?php $this->renderPartial('_wizard');?>
            <div class="col-md-12 se_panel_formwrap"> 
            	<div class="wiz_right">   
                    <div class="table-responsive">
                        <table class="table table-bordered mb30">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th><?php echo $model->getAttributeLabel('institution');?></th>
                                    <th><?php echo $model->getAttributeLabel('course');?></th>
                                    <th><?php echo $model->getAttributeLabel('year');?></th>
                                    <th><?php echo $model->getAttributeLabel('total_mark');?></th>
                                    <th><?php echo $model->getAttributeLabel('contact_person');?></th>
                                    <th><?php echo $model->getAttributeLabel('contact_number');?></th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="cp-common-pool">
                                <?php
                                if(count($datas)==0){
                                ?>
                                <tr>
                                    <td colspan="7" align="center">No data</td>
                                </tr>
                                <?php
                                }
                                else{
                                    foreach($datas as $key=>$data){
                                    ?>
                                    <tr>
                                        <td><?php echo $key+1;?></td>
                                        <td><?php echo ($data->institution!=NULL)?$data->institution:'-';?></td>
                                        <td><?php echo ($data->course!=NULL)?$data->course:'-';?></td>
                                        <td><?php echo ($data->year!=NULL)?$data->year:'-';?></td>
                                        <td><?php echo ($data->total_mark!=NULL)?$data->total_mark:'-';?></td>
                                        <td><?php echo ($data->contact_person!=NULL)?$data->contact_person:'-';?></td>
                                        <td><?php echo ($data->contact_number!=NULL)?$data->contact_number:'-';?></td>
                                        <td>
                                        	<?php echo CHtml::link('<i class="fa fa-pencil"></i>', array('step2', 'token'=>$_GET['token'], 'id'=>$data->id));?>
                                            &nbsp;&nbsp;
                                            <?php echo CHtml::link('<i class="fa fa-trash-o"></i>', array('step2', 'token'=>$_GET['token'], 'id'=>$data->id, 'action'=>'remove'), array('confirm'=>'Are you sure ?'));?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                	<?php $this->renderPartial('_step2', array('model'=>$model));?>                
           		</div><!-- col-sm-6 -->
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