<div class="pageheader">
      <h2><i class="glyphicon glyphicon-bookmark"></i> Center</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li>Center</li>
          <li class="active">List</li>
        </ol>
      </div>
    </div>
<div class="contentpanel">
    	<div class="col-sm-9 col-lg-12">

<div class="panel panel-default">
	<div class="panel-heading" style="position:relative;">

 		<div class="btn-demo file_up" style="position:relative; top:-8px; right:3px; float:right;">
		<?php echo CHtml::link('Create New center',array('/center/create'),array('class'=>'btn btn-success')); ?></div>
         
              <!-- panel-btns -->
              <div class="clear"></div>
              <h3 class="panel-title">Centers </h3>
</div>
    <div class="panel-body">
    <div class="table-responsive">
          <table class="table mb30">
            <thead>
              <tr>
                <th>#</th>
                <th>Center Name</th>
                <th>Principal Name</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php 
			$i =1;
			foreach($centers as $center){ ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo CHtml::Link($center->center_name,array('view','id'=>$center->id));?></td>
                <td><?php echo $center->fullname; ?></td>
                <td class="table-action">
                	<?php echo CHtml::Link('<i class="fa fa-pencil"></i>',array('view','id'=>$center->id));?>
    				<?php echo CHtml::Link('<i class="fa fa-trash-o"></i>',array('delete','id'=>$center->id),array('confirm'=>'Are you sure?'));?>
                </td>
              </tr>
             <?php $i++; } ?>
            </tbody>
          </table>
          </div>
    	
    </div>
</div>
</div>
</div>
