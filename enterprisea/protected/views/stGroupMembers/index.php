<?php
$this->breadcrumbs=array(
	'Shared Tutor Group Members',
);

?>
<style>
.saving{
	background:url('<?php echo Yii::app()->request->baseUrl;?>/images/saving.gif') no-repeat right center;
	border:none;
}
</style>
<div class="pageheader">
	<h2><i class="glyphicon glyphicon-bookmark"></i> Shared Tutor Group Members<!--<span>Subtitle goes here...</span>--></h2>
    <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
            <li>Shared Tutor Group Members</li>
            <li class="active">List</li>
        </ol>
    </div>
</div>

<div class="contentpanel">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-btns">
                    	<a class="minimize" href="#">−</a>
                    </div>
                	<h3 class="panel-title">Manage Shared Tutor Group Members</h3>
                    <p><?php 
					$group	= StGroups::model()->findByPk($group_id);
					echo 'Group Name: '.$group->name; ?></p>
                	<p><?php 
					
					
					$batch = CurriculumProviders::model()->findByPk($group->batch_id);
					$grade = Course::model()->findByPk($batch->course_id);
					$category = CourseCategory::model()->findByPk($grade->category);
					$type = SchoolTypes::model()->findByPk($category->school_type);
					
					echo $type->type.'/'.$category->category.'/'.$batch->name;
					
					?></p>
                   
                </div>
                
                <div class="panel-body">
                     <div class="col-lg-12">
                     <div class="btn-demo pull-right">
                    <?php
                    echo CHtml::link('Shared Tutor Groups', array('/stGroups/index'),array('class'=>'btn btn-primary '));
					?>
                   </div>
                    </div>
                    </div>
                    
                    </div>
                    <div class="panel panel-default">
                
                	<!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified">
          <li class="active"><a href="#home3" data-toggle="tab"><strong>Group Members</strong></a></li>
          <li><a href="#profile3" data-toggle="tab"><strong>Assigned Centers</strong></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="home3">
          
                    <?php echo $this->renderPartial('_types', array('datas'=>$datas))?>
           </div>
          <div class="tab-pane" id="profile3">
             <?php echo $this->renderPartial('/stCenter/_types', array('group_id'=>$_GET['id']))?>
          
        </div>      
	</div>
        </div><!-- col-md-12 -->
    </div>
</div>
<script type="text/javascript">
function reorder_items(){
	var items	= $('#cp-common-pool span.item-no');
	$.each(items, function(index, item){
		$(this).text(index+1);
	});	
}

$('.edit-icon').click(function(e) {
    $(this).closest('tr').find('span.name_txt').dblclick();
});
$('.remove-icon').click(function(e) {
	if(confirm('Are you sure ?')){
		var that	= this;	
		var url		= $(that).attr('href');
		$.ajax({
			'url':url,
			type:'POST',
			success:function(){			
				$(that).closest('tr').remove();
				reorder_items();
			}
		});
	}
	return false;
});

open_popup_links();

</script>