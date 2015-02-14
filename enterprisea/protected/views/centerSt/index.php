<div class="pageheader">
  <h2><i class="glyphicon glyphicon-bookmark"></i> Center <span>View</span></h2>
  <div class="breadcrumb-wrapper"> <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li>Center</li>
      <li class="active">View</li>
    </ol>
  </div>
</div>
<div class="contentpanel">
  <div class="col-sm-9 col-lg-12">
    <div class="panel panel-default">
    	<ul class="nav nav-tabs nav-justified">
         <li ><?php echo CHtml::Link('<strong>Center <br>Details</strong>',array('center/view','id'=>$id));?></li>
          <li ><?php echo CHtml::Link('<strong>Course <br>Details</strong>',array('center/viewcourse','id'=>$id));?></li>
          <li><?php echo CHtml::Link('<strong>Location<br> Details</strong>',array('centerLocation/view','id'=>$id));?></li>
          <li><?php echo CHtml::Link('<strong>Upload <br>Documents</strong>',array('centerUploads/view','id'=>$id));?></li>
           <li><?php echo CHtml::Link('<strong>Upload <br>Images</strong>',array('centerImages/view','id'=>$id));?></li>
          <li class="active"><?php echo CHtml::Link('<strong>Shared Tutor <br>Groups</strong>',array('centerSt/index','id'=>$id));?></li>
        </ul>
      <div class="panel-heading" style="position:relative; height:60px;">
        <div class="btn-demo file_up" style="position:relative; top:-8px; right:3px; float:right;">
        <button data-toggle="modal" data-target="#myModal" type="button" data-ajax-url="<?php echo Yii::app()->createUrl('centerSt/ajaxcreate',array('center_id'=>$_GET['id']));?>" class="btn btn-primary open_popup">Add Shared Tutor Groups</button>
        </div>
        
        <!-- panel-btns -->
        <div class="clear"></div>
       <!-- <h3 class="panel-title">Centers </h3>-->
      </div>
      <div class="panel-body">
    
        <div class="table-responsive">
 
 <?php echo $this->renderPartial('_types', array('datas'=>$datas))?>
 
 	</div>
      </div>
    </div>
  </div>
</div>
<script>
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
   