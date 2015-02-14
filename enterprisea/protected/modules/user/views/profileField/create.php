<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t('Create'),
);
$this->menu=array(
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
);
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
<h1><?php echo UserModule::t('Create Profile Field'); ?></h1>
<div class="m_rightpanel_inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
    </div>
</div>