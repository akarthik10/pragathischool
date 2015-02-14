
<div class="se_panel">
    <div class="col-md-12 se_header">
        <div class="col-sm-4 se_logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.jpg" ></div>
        <div class="col-sm-8 se_head"> <h2>Student Enrolment - Parent | Guardian Information</h2></div>
    </div>
    <div class="row">        
        <div class="col-md-4">
            <?php $this->renderPartial('_leftside');?>
        </div><!-- col-sm-6 -->
        
        <div class="col-md-8">
        	<?php $this->renderPartial('_wizard');?>
            <div class="col-md-12 se_panel_formwrap">
                <?php $this->renderPartial('_step4', array('model'=>$model));?>                
            </div><!-- col-sm-6 -->
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