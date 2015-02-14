<?php
$this->breadcrumbs=array(
	'Course Manager',
);

//courses
$courses	= array();
$category	= 0;
if(isset($_GET['category'])){
	$category	= $_GET['category'];
}

?>

<div class="pageheader">
      <h2><i class="fa fa-paste"></i> Course Manager <!--<span>multiSchools</span>--></h2>
      <!--<div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index.html">multischool</a></li>
          <li class="active">Courses</li>
        </ol>
      </div>-->
    </div>
<div class="contentpanel">

<div class="col-sm-9 col-lg-12">

<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="#" class="minimize">−</a>
          </div>
          <h3 class="panel-title">Manage Courses</h3>
          <p>Select School Type and Course Category.</p>
        </div>
        <div class="panel-body">
         <form action="" method="get" class="form-inline">
        	<div class="row row-pad-5">
                <div class="col-lg-3">
                <?php 
                    echo CHtml::dropDownList('stype',
						(isset($_GET['stype']))?$_GET['stype']:'',
                        CHtml::listData( SchoolTypes::model()->findAll(), 'id', 'type' ),
                        array(
                            'prompt'=>'Select school type',
							'id'=>'stype',
							'class'=>'form-control chosen-select'
                        )
                    );
                ?>
                </div>
                <div class="col-lg-3">
                <?php
					$categories	= array();
					if(isset($_GET['stype']))
						$categories	= CHtml::listData( CourseCategory::model()->findAllByAttributes(array('school_type'=>$_GET['stype'])), 'id', 'category' );
					echo CHtml::dropDownList('category',
						(isset($_GET['category']))?$_GET['category']:'',
						$categories,
						array(
							'prompt'=>'Select course category',
							'onchange'=>'js:this.form.submit();',
							'id'=>'ccategory',
							'class'=>'form-control chosen-select'
						)
					);
				?>
                </div>
                <div class="col-lg-6">
                  <div class="btn-group mr5 pull-right">
                <button type="button" class="btn btn-success">QUICK ADD</button>
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                  <span class="glyphicon  glyphicon-plus"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a class="open_popup" href="#" data-ajax-url="<?php echo Yii::app()->createUrl('schoolTypes/ajaxcreate', array('controller'=>'courseManager'))?>" type="button" data-target="#myModal" data-toggle="modal">Add School Type</a></li>
                  <li><a class="open_popup" href="#" data-ajax-url="<?php echo Yii::app()->createUrl('courseCategory/ajaxcreate', array('controller'=>'courseManager', 'stype'=>(isset($_GET['stype']))?$_GET['stype']:0))?>" type="button" data-target="#myModal" data-toggle="modal">Add Course Category</a></li>
                  <li><a class="open_popup" href="#" data-ajax-url="<?php echo Yii::app()->createUrl('course/ajaxcreate', array('category'=>(isset($_GET['category']))?$_GET['category']:0))?>" type="button" data-target="#myModal" data-toggle="modal">Add Course</a></li>
                 
                  <li><a class="open_popup" href="#" data-ajax-url="<?php echo Yii::app()->createUrl('cpCommonPool/ajaxcreate', array('controller'=>'courseManager'))?>" type="button" data-target="#myModal" data-toggle="modal">Add CPs to common pool</a></li>
                  <li><a class="open_popup" href="#" data-ajax-url="<?php echo Yii::app()->createUrl('subjectsCommonPool/ajaxcreate', array('controller'=>'courseManager'))?>" type="button" data-target="#myModal" data-toggle="modal">Add subjects to common pool</a></li>
                </ul>
              </div>
                </div>
              </div>
      
          </form>
          
        </div><!-- panel-body -->
      </div>


    <div class="panel-group " id="accordion">
        <!--course block start-->
        <?php
        $this->renderPartial('//course/_courses', array('category'=>$category));
        ?>    
        <!--course block end-->
    </div>
</div>
</div>


<script type="text/javascript">
function set_up_functions(){
	set_up_function_remove();
	open_popup_links();
}

function set_up_function_remove(){
	$('.remove-button').unbind('click');
	$('.remove-button').on('click', function(){
		if(!confirm('Continue delete ?')){
			return false;
		}
		var that	= this;
		var url		= $(that).attr('href');
		$.ajax({
			url:url,
			type:'POST',
			dataType:"json",
			success: function(response){
				$($(that).attr('data-target')).html(response.data);
				set_up_functions();
			}
		});		
		return false;
	});	
}

set_up_functions();

$('#stype').change(function(e) {
    $.ajax({
		url:"<?php echo Yii::app()->createUrl('courseCategory/get');?>",
		type:"GET",
		data:{school_type:$(this).val()},
		success: function(response){
			$("#ccategory").html(response);
			$("#ccategory").trigger("chosen:updated");
		}
	});
});
</script>
