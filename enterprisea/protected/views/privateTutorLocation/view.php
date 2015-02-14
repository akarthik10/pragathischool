<div class="pageheader">
  <h2><i class="glyphicon glyphicon-bookmark"></i> Private Tutor <span>View</span></h2>
  <div class="breadcrumb-wrapper"> <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li>Private Tutor</li>
      <li class="active">View</li>
    </ol>
  </div>
</div>
<div class="contentpanel">
  <div class="col-sm-9 col-lg-12">
    <div class="panel panel-default">
    	<ul class="nav nav-tabs nav-justified">
         <li ><?php echo CHtml::Link('<strong>Tutor<br> Details</strong>',array('privateTutor/view','id'=>$id));?></li>
          <li ><?php echo CHtml::Link('<strong>Course<br> Details</strong>',array('privateTutor/viewcourse','id'=>$id));?></li>
          <li class="active"><?php echo CHtml::Link('<strong>Location <br>Details</strong>',array('privateTutorLocation/view','id'=>$id));?></li>
          <li><?php echo CHtml::Link('<strong>Upload <br>Documents</strong>',array('privateTutorUploads/view','id'=>$id));?></li>
        <li><?php echo CHtml::Link('<strong>Upload <br>Images</strong>',array('privateTutorImages/view','id'=>$id));?></li>
        </ul>
      <div class="panel-heading" style="position:relative; height:60px;">
        <div class="btn-demo file_up" style="position:relative; top:-8px; right:3px; float:right;"><?php echo CHtml::Link('Edit Location Details',array('update','id'=>$id),array('class'=>'btn btn-success'));?></div>
        
        <!-- panel-btns -->
        <div class="clear"></div>
       <!-- <h3 class="panel-title">Centers </h3>-->
      </div>
      <div class="panel-body">
    
        <div class="table-responsive">
          <table class="table table-hover mb30">
            <tbody>
              <tr>
                <td width="50%">Where will you be operating from?</td>
                <td><?php echo $model->opertaing_from;?></td>
              </tr>
              
              <tr>
                <td>Are you computer literate? (give details of experience)</td>
                <td><?php echo $model->comp_literate; ?></td>
              </tr>
              <tr>
                <td>What are your skills levels with Microsoft Office?</td>
                <td><?php echo $model->ms_level; ?></td>
              </tr>
              <tr>
                <td>What computer do you have? (Give specifications)</td>
                <td><?php echo $model->computer_no;?></td>
              </tr>
              <tr>
                <td>Who is your Internet Service Provider?</td>
                <td><?php echo $model->isp; ?></td>
              </tr>
              <tr>
                <td>What Internet connection do you have?</td>
                <td><?php echo $model->internet_type; ?></td>
              </tr>
              <tr>
                <td>What is the speed of your Internet connection?</td>
                <td><?php echo $model->internet_speed; ?></td>
              </tr>
              
              <tr>
                <td>Capped or Un-capped?</td>
                <td><?php if($model->is_capped) echo 'Capped'; else echo 'Un-capped';?></td>
              </tr>
              <tr>
                <td>Do you have a web cam?</td>
                <td><?php if($model->is_cam) echo 'Yes'; else echo 'No';?></td>
              </tr>
              <tr>
                <td>Do you have a wireless headset?</td>
                <td><?php if($model->is_headset) echo 'Yes'; else echo 'No';?></td>
              </tr>
              <tr>
                <td>Do you have a printer, scanner and copier?</td>
                <td><?php if($model->is_multifunction) echo 'Yes'; else echo 'No';?></td>
              </tr>
              <tr>
                <td>Do you have a projector?</td>
                <td><?php if($model->is_projector) echo 'Yes'; else echo 'No';?></td>
              </tr>
              
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

   