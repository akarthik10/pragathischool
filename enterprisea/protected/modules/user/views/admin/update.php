<?php
$this->breadcrumbs=array(
	(UserModule::t('Users'))=>array('admin'),
	$model->username=>array('view','id'=>$model->id),
	(UserModule::t('Update')),
);

?>
<div class="m_inner_con">
	<?php echo $this->renderPartial('/admin/_left');?>
    <div class="m_rightpanel">
<h1><?php echo  UserModule::t('Update User')." ".$model->id; ?></h1>
<div class="m_rightpanel_inner">
<?php
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>
</div>
    </div>
</div>