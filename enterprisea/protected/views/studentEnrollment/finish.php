<div class="se_panel">
    <div class="col-md-12 se_header">
        <div class="col-sm-4 se_logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.jpg" ></div>
        <div class="col-sm-8 se_head"> <h2>Student Enrollment - THANK YOU</h2></div>
    </div>
    <div class="row">        
        <div class="col-md-4">
            <?php $this->renderPartial('_leftside');?>
        </div><!-- col-sm-6 -->
        <div class="col-md-8">
        	<?php $this->renderPartial('_wizard');?>
        	<div class="col-md-12 se_panel_formwrap">
            	<div class="wiz_right" style="min-height:500px;"> 
                    <h4 class="text-success">ENROLLMENT FINISHED</h4>
                    <p class="note">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div><!-- col-sm-6 -->        
    </div>
    <!-- row -->
    
    <div class="signup-footer clearfix">
        <div class="pull-left">
            &copy; 2014. All Rights Reserved. Bracket Bootstrap 3 Admin Template
        </div>
        <div class="pull-right">
            Created By: <a href="http://wiwo.in/" target="_blank">wiwo</a>
        </div>
    </div>
</div>