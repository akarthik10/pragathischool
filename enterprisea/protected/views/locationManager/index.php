<?php
$this->breadcrumbs=array(
	'Location Manager',
);

//countries
$province	= array();
$country	= 0;
if(isset($_GET['country'])){
	$country	= $_GET['country'];
}

?>

<div class="pageheader">
      <h2><i class="fa fa-paste"></i> Location Manager <!--<span>multiSchools</span>--></h2>
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
          <h3 class="panel-title">Manage Locations</h3>
          <p>Select Country.</p>
        </div>
        <div class="panel-body">
         <form action="" method="get" class="form-inline">
        	<div class="row row-pad-5">
                <div class="col-lg-3">
                <?php 
                    echo CHtml::dropDownList('country',
						(isset($_GET['country']))?$_GET['country']:'',
                        CHtml::listData( Countries::model()->findAllByAttributes(array('is_active'=>1)), 'id', 'name' ),
                        array(
                            'prompt'=>'Select Country',
							'id'=>'country',
							'onchange'=>'js:this.form.submit();',
							'class'=>'form-control chosen-select'
                        )
                    );
                ?>
                </div>
                <?php if($country!=0){ ?>
                <div class="col-lg-6">
                  <div class="btn-group mr5 pull-right">
                <button type="button" class="btn btn-success open_popup" data-ajax-url="<?php echo Yii::app()->createUrl('provinces/ajaxcreate', array('country'=>(isset($_GET['country']))?$_GET['country']:0))?>" data-target="#myModal" data-toggle="modal">Add Province</button>
                
              </div>
                </div>
                <?php } ?>
              </div>
      
          </form>
          
        </div><!-- panel-body -->
      </div>


    <div class="panel-group " id="accordion">
        <!--course block start-->
        <?php
        $this->renderPartial('//provinces/_provinces', array('country'=>$country));
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

</script>
