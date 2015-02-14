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
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/cd_style.css" rel="stylesheet">
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
<div class="container cd_wrapper">
	
<div class="panel-body">
	<div class="col-md-12 cd_head clearfix"></div>
    <div class="row cd_container">
    	<div class="col-md-3 cd_left">
       	  <div class="col-md-12 cd_left_top clearfix">
            	<div class="row clearfix">
                	<div class="col-xs-4">
                    	<div class="t_type_img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/centre-orange_icon.png" class="img-responsive"></div>
                    </div>
                    <div class="col-xs-8">
                    	<h1><span>Institution Type</span><?php echo $center->type->type;?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-12 cd_left_mid">
            	<div class="row clearfix">
                	<div class="col-xs-3">
                    	<div class="t_name_img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/centre-whiteicon.png" class="img-responsive"></div>
                    </div>
                    <div class="col-xs-9">
                    	<h1><span>Center Name</span><?php echo $center->center_name;?></h1>
                    </div>
                </div>
            </div>
            <div id="sticky-anchor"></div>
            <div class="col-md-12 cd_left_register" id="sticky">
            	<div class="row clearfix">
                	<div class="col-xs-3">
                    	<div class="t_register_img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/register-icon.png" class="img-responsive"></div>
                    </div>
                    <div class="col-xs-9">
                    	<?php
                       		echo CHtml::link('Register', array('studentEnrollment/step1', 'center'=>$center->id), array('class'=>'btn btn-success'));
						?>
                    </div>
                </div>
            </div>
            
          <div class="col-md-12 cd_left_btm">
          		<?php /*?><h2>Center Images</h2>
                <div class="other_img_con">
                    <div class="container other_img_box">
                    <img src="<?php echo Yii::app()->request->baseUrl."/images/centre-01.jpg"; ?>" class="img-responsive">
                    </div>
                    <span class="other_img_txt">Image 1</span>
                </div>
                <div class="other_img_con">
                    <div class="container other_img_box">
                    <img src="<?php echo Yii::app()->request->baseUrl."/images/centre-01.jpg"; ?>" class="img-responsive">
                    </div>
                    <span class="other_img_txt">Image 2</span>
                </div><?php */?>
          		<?php
				$criteria		= new CDbCriteria;
				$criteria->condition	= '`center_id`=:center_id';
				$criteria->params		= array(':center_id'=>$center->id);
                $center_images	= CenterImages::model()->findAll($criteria);
				if(count($center_images)>0){
				?>
            	<h2>Center Images</h2>
				<?php
                foreach($center_images as $center_image){
                ?>
                <div class="other_img_con">
                    <div class="container other_img_box">
                    <img src="<?php echo Yii::app()->request->baseUrl."/uploadedfiles/center_images/".$center->id."/".$center_image->file; ?>" class="img-responsive">
                    </div>
                    <span class="other_img_txt"><?php echo $center_image->title;?></span>
                </div>
                <?php
                }
				}
				?>
            </div>
        </div>
        <div class="col-md-9 cd_right">
        	<div class="panel panel-dark">
            <div class="panel-heading">
              <div class="panel-btns">
                <a class="minimize" href="#">−</a>
              </div><!-- panel-btns -->
              <h3 class="panel-title">Location</h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
              
              <?php
              if(isset($center->location_lat) and isset($center->location_long) and $center->location_lat!=NULL and $center->location_long!=NULL){
			 ?>
             <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
             <script type="text/javascript">
				var geocoder = new google.maps.Geocoder();
				function initialize() {
				  var latLng = new google.maps.LatLng("<?php echo $center->location_lat;?>", "<?php echo $center->location_long;?>");
				  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
					zoom: 8,
					center: latLng,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				  });
				  var marker = new google.maps.Marker({
					position: latLng,
					title: 'Point A',
					map: map,
				  });
				}			
				// Onload handler to fire off the app.
				google.maps.event.addDomListener(window, 'load', initialize);
			 </script>
             <div id="mapCanvas" style="width:100%; height:250px;"></div>
			 <?php
			  }
			  //else{
			  ?>
              <!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13428.341350652701!2d26.29476!3d-32.71036!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xaab91f44731ec308!2sAdelaide+Gymnasium!5e0!3m2!1sen!2sin!4v1415869412308" width="100%" height="250" frameborder="0" style="border:0"></iframe>-->
              <?php
			  //}
			  ?>
              <div class="clearfix">
                  <table class="table table-hover mb30">
                    <tbody>                       
                    <tr>
                        <td width="20%">Street Adress :</td>
                        <td><?php echo ($center->ph_address1!=NULL or $center->ph_address2!=NULL)?($center->ph_address1."<br/>".$center->ph_address2):'-'; ?></td>
                    </tr>
                    <tr>
                        <td>Suburb :</td>
                        <td><?php echo ($center->ph_suburb!=NULL)?$center->ph_suburb:'-'; ?></td>
                    </tr>
                    <tr>
                        <td>City :</td>
                        <td><?php echo ($center->ph_city!=NULL)?Cities::model()->findByPk($center->ph_city)->name:'-'; ?></td>
                    </tr>
                    <tr>
                        <td>Province :</td>
                        <td><?php echo ($center->ph_province!=NULL)?Provinces::model()->findByPk($center->ph_province)->name:'-'; ?></td>
                    </tr>
                    <tr>
                        <td>Country :</td>
                        <td><?php echo ($center->ph_country!=NULL)?Countries::model()->findByPk($center->ph_country)->name:'-'; ?></td>
                    </tr>
                    <tr>
                        <td>Postal Address :</td>
                        <td>
                        <?php 
                            echo ($center->po_box!=NULL)?'P O Box '.$center->po_box.",<br/>":''; 
                            echo ($center->po_suburb!=NULL)?$center->po_suburb.",<br/>":'';
                            echo ($center->po_city!=NULL)?Cities::model()->findByPk($center->po_city)->name.",<br/>":'';
                            echo ($center->po_province!=NULL)?Provinces::model()->findByPk($center->po_province)->name.",<br/>":'';
                            echo ($center->po_country!=NULL)?Countries::model()->findByPk($center->po_country)->name.",<br/>":'';
                            echo ($center->po_zipcode!=NULL)?$center->po_zipcode:'';
                        ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        
        	<div class="panel panel-dark">
            <div class="panel-heading">
              <div class="panel-btns">
                <a class="minimize" href="#">−</a>
              </div><!-- panel-btns -->
              <h3 class="panel-title">Principal Personal Information</h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
              		<table class="table table-hover mb30">
                        <tbody>
                       
                        <tr>
                            <td>Name :</td>
                            <td><?php echo $center->fullname; ?></td>
                        </tr>
                        <tr>
                            <td>Age :</td>
                            <td><?php echo $center->age; ?></td>
                        </tr>
                        <tr>
                            <td>Nationality :</td>
                            <td><?php echo Nationality::model()->findByAttributes(array('id'=>$center->nationality))->name;?></td>
                        </tr>
                        <tr>
                            <td>Qualification :</td>
                            <td><?php echo ($center->qualification!=NULL)?$center->qualification:'-'; ?></td>
                        </tr>
                       </tbody>
                   </table>
              </div>
            </div>
          </div>
          
          <div class="panel panel-dark">
            <div class="panel-heading">
              <div class="panel-btns">
                <a class="minimize" href="#">−</a>
              </div><!-- panel-btns -->
              <h3 class="panel-title">Contact Details</h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
        <table class="table table-hover mb30">
            <tbody>
               
                <tr>
                    <td>Cell Number :</td>
                    <td><?php echo $center->cell_no; ?></td>
                </tr>
                <tr>
                    <td>Home Number :</td>
                    <td><?php echo $center->home_no; ?></td>
                </tr>
                <tr>
                    <td>Center Number :</td>
                    <td><?php echo $center->center_no; ?></td>
                </tr>
                <tr>
                    <td>Email-Address :</td>
                    <td><?php echo $center->email; ?></td>
                </tr>
                <tr>
                    <td>Website :</td>
                    <td><?php echo $center->website; ?></td>
                </tr>
                <tr>
                    <td>Skype Name :</td>
                    <td><?php echo $center->skype; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
            </div>
          </div>
          
          <div class="panel panel-dark">
            <div class="panel-heading">
              <div class="panel-btns">
                <a class="minimize" href="#">−</a>
              </div><!-- panel-btns -->
              <h3 class="panel-title">Specialities</h3>
            </div>
            <div class="panel-body">
            	<div class="results-list">
                	<?php							
						$criteria	= new CDbCriteria;
						$criteria->join		= 'JOIN `center_course` as `cc` ON `cc`.`course_id`=`t`.`category_id`';
						$criteria->condition	= '`cc`.`center_id`=:center_id';
						$criteria->params		= array(':center_id'=>$center->id);
						$courses	= EnrollmentCourses::model()->findAll($criteria);
						foreach($courses as $index=>$course){
						?>
                        <div class="media">
                            <div class="media-body">
                            	<h3 class="filename text-primary"><?php echo $course->course_name;?></h3>
                            	<?php
                                //number of students
                                $criteria	= new CDbCriteria;
                                $criteria->join	= 'JOIN `batches` as `b` ON `b`.`id`=`t`.`batch_id`';
                                $criteria->condition	= '`b`.`course_id`=:course_id';
                                $criteria->params		= array(':course_id'=>$course->id);
                                $students	= Students::model()->count($criteria);
								?>
                                <h5>Students : <?php echo $students;?></h5>
                                <?php                                
                                $batches	= EnrollmentBatches::model()->findAllByAttributes(array('course_id'=>$course->id));
								?>
                                <h5><strong>Curriculum Providers:</strong></h5>
                                <?php
                                if(count($batches)>0){									
                                    foreach($batches as $index=>$batch){
									?>
                                    <span class="label label-info"><?php echo $batch->name;?></span>
                                    <?php
                                    }
                                }
                                else{
                                    echo 'Not found';
                                }
                            	?>
                            </div>
                    	</div>
						<?php
						}
					?>
                    <!--<div class="media">
                        <div class="media-body">
                          <h3 class="filename text-primary">Grade 2</h3>
                          <h5>Students : 10</h5>
                          <h5><strong>Curriculum Providers:</strong></h5>
                          <span class="label label-info">Damelinerer</span>
                          <span class="label label-info">Teller</span>
                          <span class="label label-info">Perkhin</span>
                        </div>
                    </div>-->
                </div>
            </div>
          </div>
        	
        </div>
    </div>
    <div class="col-md-12 cd_footer"></div>
</div>
</div>
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
<script>
	function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var div_top = $('#sticky-anchor').offset().top;
    if (window_top > div_top) {
        $('#sticky').addClass('stick');
    } else {
        $('#sticky').removeClass('stick');
    }
}

$(function () {
    $(window).scroll(sticky_relocate);
    sticky_relocate();
});
</script>
</body>
</html>