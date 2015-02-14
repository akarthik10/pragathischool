<?php
$this->breadcrumbs=array(
	'Course Category',
);
$controller	= $this->getUniqueId();
?>
<style>
.saving{
	background:url('<?php echo Yii::app()->request->baseUrl;?>/images/saving.gif') no-repeat right center;
	border:none;
}
</style>
<div class="pageheader">
	<h2><i class="glyphicon glyphicon-list"></i> Course Categories<!--<span>Subtitle goes here...</span>--></h2>
    <!--<div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
            <li><a href="index.html">Bracket</a></li>
            <li class="active">Tables</li>
        </ol>
    </div>-->
</div>

<div class="contentpanel">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-btns">
                    	<a class="minimize" href="#">−</a>
                    </div>
                    
                    
                    
                	<h3 class="panel-title">Manage Course Categories</h3>
                	<p>Our Course Categories.</p>
                    
                </div>
                
                <div class="panel-body">
               
                <div class="col-lg-8">
                <form action="" method="get" class="form-inline">
                        
                            <div class="col-lg-3">
                              <?php 
                                echo CHtml::dropDownList('stype',
                                    (isset($_GET['stype']))?$_GET['stype']:'',
                                    CHtml::listData( SchoolTypes::model()->findAllByAttributes(array('status'=>1)), 'id', 'type' ),
                                    array(
                                        'prompt'=>'Select school type',
                                        'id'=>'stype',
                                        'class'=>'form-control chosen-select',
										'onchange'=>'js:this.form.submit();',
                                    )
                                );
                            ?>
                            </div>
                        
                    </form>
                    </div>
                     <div class="col-lg-4">
                     <div class="btn-demo pull-right">
                     <button data-toggle="modal" data-target="#myModal" type="button" data-ajax-url="<?php echo Yii::app()->createUrl($controller.'/ajaxcreate');?>" class="btn btn-primary open_popup">Add course category</button>
                    <?php
                    echo CHtml::link('Course manager', array('/courseManager'),array('class'=>'btn btn-primary '));
					?></div>
                    </div>
                    </div>
                    
                    
                    </div>
                    <div class="panel panel-default">
                
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb30">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Name</th>
                                    <th width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="cp-common-pool">
                            	<?php
								if(count($datas)==0){
								?>
                                <tr>
                                	<td colspan="3">
                                    <?php
                                    if(!isset($_GET['stype'])){
										echo 'Select school type first.';
									}
									else{
										echo 'No data found.';
									}
									?>
                                    </td>
                                </tr>
                                <?php
								}
								else{
									foreach($datas as $key=>$data){
									?>
									<tr>
										<td><span class="item-no"><?php echo $key+1;?></span></td>
										<td><span class="name_txt" data-id="<?php echo $data->id;?>"><?php echo $data->category;?></span></td>
										<td>
                                            <a href="javascript:void(0);" class="open_popup" data-ajax-url="<?php echo Yii::app()->createUrl($controller.'/ajaxupdate', array('id'=>$data->id))?>" data-target="#myModal" data-toggle="modal" data-modal-label="Edit category `<?php echo $data->category;?>`"><i class="fa fa-pencil"></i></a>
                    &nbsp;&nbsp;
											<a class="remove-icon" href="<?php echo Yii::app()->createUrl($controller.'/delete', array('id'=>$data->id, 'ajax'=>'remove-cat'));?>"><i class="fa fa-trash-o"></i></a>
										</td>
									</tr>
									<?php
									}
								}
								?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- panel-body -->
            </div>
        <!-- table-responsive -->
        </div><!-- col-md-12 -->
    </div>
</div>
<script>
function content_inline_edit(){
	$('#cp-common-pool span.name_txt').unbind('dblclick');
	$('#cp-common-pool span.name_txt').on('dblclick', function(){
		var that	= this;
		var data	= $(that).text();
		var id		= $(that).attr('data-id');
		var textbox	= $('<input type="text" class="form-control "/>').val(data).attr('data-id', id);
		textbox.on('blur', function(){
			update_item(this);
		});
		textbox.on('keyup', function(e){
			if(e.keyCode==13)
				update_item(this);
		});
		$(that).replaceWith(textbox);
		textbox.focus();
	});
}

function update_item(that){
	var val		= $(that).val();
	var id		= $(that).attr('data-id');
	if(val!="" && val!=null){
		$.ajax({
			url:'<?php echo Yii::app()->createUrl($controller.'/ajaxupdate');?>?id=' + id,
			type:'POST',
			data:{<?php echo ucfirst($controller);?>:{category:val}, ajax:'cp-subjects-form'},
			beforeSend: function(){
				$(that).addClass('saving');
			},
			success:function(){
				var span	= $('<span class="name_txt" />').text(val).attr('data-id', id);
				$(that).replaceWith(span);
				content_inline_edit();
			}
		});
	}
}

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
content_inline_edit();
open_popup_links();
</script>