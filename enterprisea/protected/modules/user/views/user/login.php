
<style type="text/css">
.logo_img{ margin-bottom:10px;
	}
	
.img_log{max-width:100%;height:auto;}

.nomargin{  border-bottom: 1px solid #ccc;
    padding-bottom: 2px;}
	
.row {
    margin-left: 0px;
    margin-right: 0px;
}

.signup-footer {
    border-top: 1px solid #B8E7F9;
}


.container {
    padding-left:0px;
    padding-right:0px;
}

</style>
<script type="text/javascript">

  function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';

    else if (field.value == '') field.value = field.defaultValue;
 }

</script>


<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>
  <?php echo CHtml::beginForm(); ?>
  
                    <div class="logo_img" style="width:200px; margin:0 auto;"><img class="img_log" src="../../images/TVET.png"  /></div>
                    <h4 class="nomargin">Sign In</h4>
                    <?php if(Yii::app()->user->hasFlash('loginMessage')): ?>
                    
                    <div class="success">
                        <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
                    </div>
                    
                    <?php endif; ?>
                    <p class="mt5 mb20"><?php echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>
                 <?php echo CHtml::errorSummary($model); ?>
                  <?php echo CHtml::activeTextField($model,'username',array('onblur'=>'clearText(this)','onfocus'=>'clearText(this)','value'=>'Username or Email','class'=>'form-control uname')) ?>
                   <?php echo CHtml::activePasswordField($model,'password',array('onblur'=>'clearText(this)','onfocus'=>'clearText(this)','value'=>'Password','class'=>'form-control pword')) ?>
                    
                    <?php //echo CHtml::link(UserModule::t("<small>Forgot Your Password?</small>"),Yii::app()->getModule('user')->recoveryUrl); ?>
                   <div class="row"> <?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>  <?php echo CHtml::activeLabelEx($model,'rememberMe'); ?></div>
                  
                    <?php echo CHtml::submitButton(UserModule::t("Sign In"),array('class'=>'btn btn-primary btn-block')); ?>
               <?php echo CHtml::endForm(); ?>

<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>