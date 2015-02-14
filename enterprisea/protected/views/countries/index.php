
<script>
function getstatus()
{
	var status = document.getElementById('status_drop').value;
	if(status != '') 	
	{
		window.location= '?&status='+status;
	}
	else if(status == '')
	{
		window.location= '?&status=';
	}
	else
	{
		return false;
	}
}
</script>
<?php
$this->breadcrumbs=array(
	'Countries',
);

?>
<style>
.saving{
	background:url('<?php echo Yii::app()->request->baseUrl;?>/images/saving.gif') no-repeat right center;
	border:none;
}
</style>
<div class="pageheader">
	<h2><i class="glyphicon glyphicon-bookmark"></i> Countries<!--<span>Subtitle goes here...</span>--></h2>
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
                	<h3 class="panel-title">Manage Countries</h3>
                	<p>Active Countries</p>
                   
                </div>
                
                <div class="panel-body">
                     <div class="col-lg-12">
                     <div class="btn-demo pull-right">
                      <button data-toggle="modal" data-target="#myModal" type="button" data-ajax-url="<?php echo Yii::app()->createUrl('countries/ajaxcreate');?>" class="btn btn-primary open_popup">Add Country</button>
                     
                    <?php
                    echo CHtml::link('Location manager', array('/locationManager'),array('class'=>'btn btn-primary '));
					?></div>
                    </div>
                    </div>
                    
                    </div>
                    <div class="panel panel-default">
                <div class="panel-body" id="datas-body">
                    <?php echo $this->renderPartial('_countries', array('list'=>$list,
								'pages' => $pages,
								'item_count'=>$item_count,
								'page_size'=>$page_size))?>
                </div><!-- panel-body -->
            </div>
        <!-- table-responsive -->
        </div><!-- col-md-12 -->
    </div>
</div>
<script>


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

function activate(){
	$('.activate').unbind('click').click(function(e) {
		if(confirm('Are you sure ?')){
			var that	= this;	
			var url		= $(that).attr('href');
			$.ajax({
				'url':url,
				type:'POST',
				dataType:"json",
				success:function(response){	
					if(response.status=="success"){
						
						$(that).replaceWith(response.data);
						if(response.active ==1)
							$("#sl_no_"+response.id).attr('class', 'item-no_green');
						else
							$("#sl_no_"+response.id).attr('class', 'item-no_red');
					activate();
					}
					
				}
			});
		}
		return false;
	});
}
activate();
open_popup_links();
</script>