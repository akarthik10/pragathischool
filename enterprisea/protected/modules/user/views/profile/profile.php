<div class="pageheader">
      <h2><i class="fa fa-user"></i> Manage Users <span>Subtitle goes here...</span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index.html">Bracket</a></li>
          <li class="active">Blank</li>
        </ol>
      </div>
    </div>
<div class="contentpanel">
    	<div class="col-sm-9 col-lg-12">
<div class="panel panel-default">
	<div class="panel-heading" style="position:relative;">
	<div class="btn-demo file_up" style="position:relative; top:-8px; right:3px; float:right;">
		<?php echo CHtml::link('Edit',array('/user/profile/edit'),array('class'=>'btn btn-success')); ?></div>
              <!-- panel-btns -->
              <div class="clear"></div>
              <h3 class="panel-title">Your profile </h3>
</div>
    <div class="panel-body">
    	

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>

<div class="table-responsive">

<table class="table table-hover mb30">
	<tr>
		<td><?php echo CHtml::encode($model->getAttributeLabel('username')); ?></td>
	    <td><?php echo CHtml::encode($model->username); ?></td>
	</tr>
	<?php 
		$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
		if ($profileFields) {
			foreach($profileFields as $field) {
				//echo "<pre>"; print_r($profile); die();
			?>
	<tr>
		<td><?php echo CHtml::encode(UserModule::t($field->title)); ?></td>
    	<td><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?></td>
	</tr>
			<?php
			}//$profile->getAttribute($field->varname)
		}
	?>
	<tr>
		<td><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></td>
    	<td><?php echo CHtml::encode($model->email); ?></td>
	</tr>
	<tr>
		<td><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?></td>
    	<td><?php echo $model->create_at; ?></td>
	</tr>
	<tr>
		<td><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?></td>
    	<td><?php echo $model->lastvisit_at; ?></td>
	</tr>
	<tr>
		<td><?php echo CHtml::encode($model->getAttributeLabel('status')); ?></td>
    	<td><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status)); ?></td>
	</tr>
</table>
</div>
	</div>
</div>
</div>
</div>