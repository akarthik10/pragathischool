<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t('Manage'),
);
$this->menu=array(
    array('label'=>UserModule::t('Create Profile Field'), 'url'=>array('create')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('profile-field-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>
<div class="m_inner_con">
	<div class="m_leftpanel">
    	<div class="m_yellow_bx">
        	<div class="myb_h">Settings</div>
        </div>
        <div class="m_leftnav">
        	<ul>
            	<li><a href="#">Manage Users</a></li>
                <li><a href="#">List User</a></li>
                <li><a href="#">Edit</a></li>
                <li><a href="#">Change Password</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="m_rightpanel">
<h1><?php echo UserModule::t('Manage Profile Fields'); ?></h1>
<div class="m_rightpanel_inner">


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name'=>'varname',
			'type'=>'raw',
			'value'=>'UHtml::markSearch($data,"varname")',
		),
		array(
			'name'=>'title',
			'value'=>'UserModule::t($data->title)',
		),
		array(
			'name'=>'field_type',
			'value'=>'$data->field_type',
			'filter'=>ProfileField::itemAlias("field_type"),
		),
		'field_size',
		//'field_size_min',
		array(
			'name'=>'required',
			'value'=>'ProfileField::itemAlias("required",$data->required)',
			'filter'=>ProfileField::itemAlias("required"),
		),
		//'match',
		//'range',
		//'error_message',
		//'other_validator',
		//'default',
		'position',
		array(
			'name'=>'visible',
			'value'=>'ProfileField::itemAlias("visible",$data->visible)',
			'filter'=>ProfileField::itemAlias("visible"),
		),
		//*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
    </div>
</div>