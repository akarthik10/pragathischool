<?php 
/**
-------------------------
GNU GPL COPYRIGHT NOTICES
-------------------------
This file is part of Open-School.

Open-School is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Open-School is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Open-School.  If not, see <http://www.gnu.org/licenses/>.*/

/**
 * $Id$
 *
 * @author Open-School team <contact@Open-School.org>
 * @link http://www.Open-School.org/
 * @copyright Copyright &copy; 2009-2012 wiwo inc.
 * @Rajith Ramachandran,@Arun Kumar,
 * @Sherin Jose.
 * @license http://www.Open-School.org/
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<link rel="shortcut icon" href="images/favicon.png" type="image/png">-->

 <title><?php echo CHtml::encode($this->pageTitle); ?></title>

  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.default.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.datatables.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.min.js"></script>
<script>
function open_popup_links(){
	$('.open_popup').unbind('click');
	$('.open_popup').on('click', function(e) {
		$('#myModal .modal-body, #myModalLabel').html('Loading...');
		var url		= $(this).attr('data-ajax-url'),
			label	= $(this).attr('data-modal-label') || $(this).text();
		$('#myModalLabel').text(label);
		$.ajax({
			url:url,
			success: function(response){
				$('#myModal .modal-body').html(response);
			}
		});
	});
}
open_popup_links();
</script>
</head>
<body>

<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  
  <div class="leftpanel">
    
    <div class="logopanel">
        <h1 align="center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.jpg" ></h1>
    </div><!-- logopanel -->
    
    <div class="leftpanelinner">
        
        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">   
            <div class="media userlogged">
                <img alt="" src="images/photos/loggeduser.png" class="media-object">
                <div class="media-body">
                    <h4><?php echo ucfirst(Yii::app()->user->name); ?></h4>
                    <span>"Life is so..."</span>
                </div>
            </div>
         
           
            <h5 class="sidebartitle actitle">Account</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
              <li><a href="profile.html"><i class="fa fa-user"></i> <span>Profile</span></a></li>
              <li><?php echo CHtml::link('<i class="fa fa-cog"></i> <span>Account Settings</span>',array('/user/admin')); ?></li>
             
              <li><?php echo CHtml::link('<i class="fa fa-sign-out"></i> <span>Logout</span>',Yii::app()->getModule('user')->logoutUrl); ?></li>
            </ul>
        </div>
      
      
      <ul class="nav nav-pills nav-stacked nav-bracket">
       <?php /*?> <li><?php echo CHtml::link('<i class="fa fa-home"></i> <span>Dashboard</span>',Yii::app()->homeUrl); ?></li>
        
        <li class="nav-parent"><?php echo CHtml::link('<i class="glyphicon glyphicon-book"></i> <span>Reports</span>',array('/site/reports')); ?>
        	<ul class="children">
           	<li><?php echo CHtml::link('<i class="fa fa-caret-right"></i>Report Dashboard',array('/site/reports')); ?></li>
            <li><a href="general-forms.html"><i class="fa fa-caret-right"></i>Graphical</a></li>
            <li><a href="form-layouts.html"><i class="fa fa-caret-right"></i>Predefined Tabular</a></li>
           
            <li><a href="general-forms.html"><i class="fa fa-caret-right"></i>Custom</a></li>
            <li><a href="form-layouts.html"><i class="fa fa-caret-right"></i>GIS</a></li>
            <li><a href="form-layouts.html"><i class="fa fa-caret-right"></i>TVET Indicator</a></li>
            <li><a href="form-layouts.html"><i class="fa fa-caret-right"></i>National Examinations</a></li>
            
            
          </ul>
        </li><?php */?>
        
        <li class="nav-parent"><?php echo CHtml::link('<i class="glyphicon glyphicon-bookmark"></i> <span>Centers</span>',Yii::app()->homeUrl); ?>
        	<ul class="children">
            <h5 class="sidebartitle">Manage Center</h5>
            <li><?php echo CHtml::link('<i class="fa fa-caret-right"></i>List Centers',array('/center/index')); ?></li>
            <li><?php echo CHtml::link('<i class="fa fa-caret-right"></i>Create Centers',array('/center/create')); ?></li>
            <?php /*?><h5 class="sidebartitle">School Infrastructure</h5>
            <li><a href="general-forms.html"><i class="fa fa-caret-right"></i>Edit Infrastructure Details</a></li>
            <li><a href="form-layouts.html"><i class="fa fa-caret-right"></i>View Infrastructure</a></li>
            <h5 class="sidebartitle">Manage School Assets</h5>
            <li><a href="general-forms.html"><i class="fa fa-caret-right"></i>Add New Asset</a></li>
            <li><a href="form-layouts.html"><i class="fa fa-caret-right"></i>View Assets</a></li><?php */?>
            
          </ul>
         
        </li >
        
         <li class="nav-parent"><?php echo CHtml::link('<i class="glyphicon glyphicon-user"></i> <span>Teachers</span>',Yii::app()->homeUrl); ?>
         <ul class="children">
            <h5 class="sidebartitle">Manage Private Tutor</h5>
            <li><?php echo CHtml::link('<i class="fa fa-caret-right"></i>List Teachers',array('/privateTutor/index')); ?></li>
            <li><?php echo CHtml::link('<i class="fa fa-caret-right"></i>Create Teachers',array('/privateTutor/create')); ?></li>
            
            
          </ul>
        </li>
        
        
        <li class="nav-parent"><?php echo CHtml::link('<i class="fa fa-paste"></i> <span>Courses</span>',array('/courseManager')); ?>
        	<ul class="children">
            <h5 class="sidebartitle">Manage Courses</h5>
            <li><?php echo CHtml::link('<i class="fa fa-caret-right"></i>Course Manager',array('/courseManager')); ?></li>
            <li><?php echo CHtml::link('<i class="fa fa-caret-right"></i>School Types',array('/schoolTypes')); ?></li>
            <li><?php echo CHtml::link('<i class="fa fa-caret-right"></i>Course Category',array('/courseCategory')); ?></li>
            
            <li><?php echo CHtml::link('<i class="fa fa-caret-right"></i>CP Common Pool',array('/cpCommonPool')); ?></li>
            <li><?php echo CHtml::link('<i class="fa fa-caret-right"></i>Subjects Common Pool',array('/subjectsCommonPool')); ?></li>
            <?php /*?><h5 class="sidebartitle">School Infrastructure</h5>
            <li><a href="general-forms.html"><i class="fa fa-caret-right"></i>Edit Infrastructure Details</a></li>
            <li><a href="form-layouts.html"><i class="fa fa-caret-right"></i>View Infrastructure</a></li>
            <h5 class="sidebartitle">Manage School Assets</h5>
            <li><a href="general-forms.html"><i class="fa fa-caret-right"></i>Add New Asset</a></li>
            <li><a href="form-layouts.html"><i class="fa fa-caret-right"></i>View Assets</a></li><?php */?>
            
          </ul>
         
        </li >
        <li class="nav-parent"><?php echo CHtml::link('<i class="fa  fa-location-arrow"></i> <span>Location Manager</span>',array('/locationManager')); ?>
        	<ul class="children">
            <h5 class="sidebartitle">Manage Locations</h5>
            <li><?php echo CHtml::link('<i class="fa fa-caret-right"></i>Countries',array('/countries')); ?></li>
            <li><?php echo CHtml::link('<i class="fa fa-caret-right"></i>Active Countries',array('/locationManager')); ?></li>
           
          </ul>
         
        </li >
        <li><?php echo CHtml::link('<i class="fa fa-user"></i> <span>Student Enrollment</span>',array('/studentEnrollment')); ?></li >
         
        <li class="nav-parent"><?php echo CHtml::link('<i class="fa  fa-location-arrow"></i> <span>Product & Services</span>',array('/services')); ?>
        	<ul class="children">
            <h5 class="sidebartitle">Manage Product & Services</h5>
            <li><?php echo CHtml::link('<i class="fa fa-caret-right"></i>Category',array('/serviceCategory')); ?></li>
            <li><?php echo CHtml::link('<i class="fa fa-caret-right"></i>Product & Services',array('/services')); ?></li>
           
          </ul>
         
        </li >
       <?php /*?>  <li><?php echo CHtml::link('<i class="fa fa-paste"></i> <span>Courses / Curriculum</span>',array('/site/courses')); ?></li>
         
         <li><?php echo CHtml::link('<i class="fa fa-keyboard-o"></i> <span>Primary Data</span>',array('/site/primarydata')); ?></li>
         
         <li><?php echo CHtml::link('<i class="fa fa-user"></i> <span>Users</span>',array('/user/admin')); ?></li>
         
         <li><?php echo CHtml::link('<i class="fa fa-pencil"></i> <span>Examinations</span>',array('/site/exam')); ?></li>
         
         <li><?php echo CHtml::link('<i class="glyphicon glyphicon-zoom-in"></i> <span>Inspection/Accreditation</span>',array('/site/inspection')); ?></li>
         
         <li><a href="index.html"><i class="fa fa-bar-chart-o"></i> <span>Surveys</span></a></li>
     <?php */?>
        <li class="nav-parent"><?php echo CHtml::link('<i class="fa fa-cog"></i> <span>Settings</span>',array('/user/admin')); ?>
          <ul class="children">
         
          
              <li <?php if(Yii::app()->controller->id=='studentCategory')
				{
					echo 'class="active"';
				}
				?>>
				<?php echo CHtml::link('Student Category',array('/studentCategory'),array('class'=>'manage')); ?>
                </li>
            
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
        </li>
        
      </ul>
      
      
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
  
  <div class="mainpanel">
    <div class="headerbar">
      
      <a class="menutoggle"><i class="fa fa-bars"></i></a>
      
      <form class="searchform" action="#" method="post">
        <input type="text" class="form-control" name="keyword" placeholder="Search here..." />
      </form>
      
      <div class="header-right">
        <ul class="headermenu">
    
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photos/loggeduser.png" alt="" />
                <?php echo ucfirst(Yii::app()->user->name); ?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                <li>
                
                <?php echo CHtml::link('<i class="glyphicon glyphicon-user"></i> My Profile',array('/user/profile'),array('class'=>'profile')); ?>
                
                </li>
                <li><?php echo CHtml::link('<i class="fa fa-cog"></i> <span>Account Settings</span>',array('/user/admin')); ?></li>
             
              <li><?php echo CHtml::link('<i class="fa fa-sign-out"></i> <span>Logout</span>',Yii::app()->getModule('user')->logoutUrl); ?></li>
              </ul>
            </div>
          </li>
          
        </ul>
      </div><!-- header-right -->
      
    </div>
    
        
    
    
    
      		<?php echo $content; ?>
     
    
  </div><!-- mainpanel -->
  
 
  
</section>
<!--modal box-->
<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade in">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 id="myModalLabel" class="modal-title"></h4>
      </div>
      <div class="modal-body cmmodal_b">
        Content goes here...
      </div>
      <!--<div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>        
      </div>-->
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div>
<!--modal box end-->



<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.sparkline.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/toggles.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/retina.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.cookies.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.datatables.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/chosen.jquery.min.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js"></script>
<script>
  jQuery(document).ready(function() {
    
    jQuery('#table1').dataTable();
    
    jQuery('#table2').dataTable({
      "sPaginationType": "full_numbers"
    });
    
    // Chosen Select
    jQuery("select").chosen({
      'min-width': '100px',
      'white-space': 'nowrap',
      disable_search_threshold: 10
    });
    
    // Delete row in a table
    jQuery('.delete-row').click(function(){
      var c = confirm("Continue delete?");
      if(c)
        jQuery(this).closest('tr').fadeOut(function(){
          jQuery(this).remove();
        });
        
        return false;
    });
    
    // Show aciton upon row hover
    jQuery('.table-hidaction tbody tr').hover(function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
    });
  
  
  });
</script>
</body>
</html>

