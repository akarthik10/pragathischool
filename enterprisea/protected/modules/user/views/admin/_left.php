<div class="m_leftpanel">
    	<div class="m_yellow_bx">
        	<div class="myb_h">Settings</div>
        </div>
        <div class="m_leftnav">
        	<ul>
            	<li <?php if(Yii::app()->controller->id=='admin' and (Yii::app()->controller->action->id=='admin' or Yii::app()->controller->action->id=='view' or Yii::app()->controller->action->id=='update'))
				{
					echo 'class="active"';
				}
				?>>
				<?php echo CHtml::link('Manage Users',array('/user/admin'),array('class'=>'manage')); ?>
                </li>
                
                
                <li  <?php if(Yii::app()->controller->id=='admin' and Yii::app()->controller->action->id=='create')
				{
					echo 'class="active"';
				}
				?>>
				<?php echo CHtml::link('Create User',array('/user/admin/create'),array('class'=>'user')); ?>
                </li>
                
                <li <?php if(Yii::app()->controller->id=='profile' and (Yii::app()->controller->action->id=='profile' or Yii::app()->controller->action->id=='edit'))
				{
					echo 'class="active"';
				}
				?>>
				<?php echo CHtml::link('My Profile',array('/user/profile'),array('class'=>'profile')); ?>
                </li>
                
                <li <?php if(Yii::app()->controller->id=='profile' and Yii::app()->controller->action->id=='changepassword')
				{
					echo 'class="active"';
				}
				?>>
				<?php echo CHtml::link('Change Password',array('/user/profile/changepassword'),array('class'=>'password')); ?>
                </li>
                
                <li ><?php echo CHtml::link('Logout',Yii::app()->getModule('user')->logoutUrl,array('class'=>'logout')); ?></li>
            </ul>
        </div>
</div>