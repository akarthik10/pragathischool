<div class="se_panel">
    <div class="col-md-12 se_header">
        <div class="col-sm-4 se_logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.jpg" ></div>
        <div class="col-sm-8 se_head"> <h2>Student Enrolment - Upload Documentation</h2></div>
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
                                        <th><?php echo $model->getAttributeLabel('title');?></th>
                                        <th><?php echo $model->getAttributeLabel('file');?></th>
                                        <th><?php echo $model->getAttributeLabel('file_type');?></th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="cp-common-pool">
                                    <?php
                                    if(count($datas)==0){
                                    ?>
                                    <tr>
                                        <td colspan="7" align="center">No datas</td>
                                    </tr>
                                    <?php
                                    }
                                    else{
                                        foreach($datas as $key=>$data){
                                        ?>
                                        <tr>
                                            <td><?php echo $key+1;?></td>
                                            <td><?php echo ($data->title!=NULL)?$data->title:'-';?></td>
                                            <td><?php echo ($data->file!=NULL)?((strlen($data->file)<30)?$data->file:substr($data->file, 0, 30).'...'):'-';?></td>
                                            <td><?php echo ($data->file_type!=NULL)?$data->file_type:'-';?></td>
                                            <td>
                                            <?php echo CHtml::link('<i class="fa fa-trash-o"></i>', array('step5', 'token'=>$_GET['token'], 'id'=>$data->id, 'action'=>'remove'), array('confirm'=>'Are you sure ?'));?>
                                        </td>
                                        </tr>
                                        <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                     
                </div>
                <?php $this->renderPartial('_step5', array('model'=>$model));?>                
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