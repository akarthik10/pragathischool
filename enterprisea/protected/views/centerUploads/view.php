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
         <li ><?php echo CHtml::Link('<strong>Tutor <br>Details</strong>',array('center/view','id'=>$id));?></li>
          <li ><?php echo CHtml::Link('<strong>Course <br>Details</strong>',array('center/viewcourse','id'=>$id));?></li>
          <li ><?php echo CHtml::Link('<strong>Location <br>Details</strong>',array('centerLocation/view','id'=>$id));?></li>
          <li class="active"><?php echo CHtml::Link('<strong>Upload <br>Documents</strong>',array('centerUploads/view','id'=>$id));?></li>
        	 <li><?php echo CHtml::Link('<strong>Upload <br>Images</strong>',array('centerImages/view','id'=>$id));?></li>
            <li><?php echo CHtml::Link('<strong>Shared <br>Tutor Groups</strong>',array('centerSt/index','id'=>$id));?></li>
        </ul>
      <div class="panel-heading" style="position:relative; height:60px;">
        <div class="btn-demo file_up" style="position:relative; top:-8px; right:3px; float:right;"><?php echo CHtml::Link('Edit Upload Documents',array('centerUploads/create','id'=>$id),array('class'=>'btn btn-success'));?></div>
        
        <!-- panel-btns -->
        <div class="clear"></div>
       <!-- <h3 class="panel-title">Centers </h3>-->
      </div>
      <div class="panel-body">
    
        <div class="table-responsive">
          <table class="table table-hover mb30">
            <tbody>
            <tr>
               <td>#</td> 
                <td>Name</td>
                <td>Type</td>
              </tr>
            <?php $documents = centerUploads::model()->findAllByAttributes(array('center_id'=>$_REQUEST['id'])); ?>
    <?php
			if($documents) // If documents present
			{
				$i =1;
				foreach($documents as $document) // Iterating the documents
				{
			?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $document->title;?></td><td><?php echo $document->file_type;?></td>
              </tr>
              <?php $i++; }} ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

   