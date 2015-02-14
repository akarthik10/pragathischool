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
          <li class="active"><?php echo CHtml::Link('<strong>Location <br>Details</strong>',array('centerLocation/view','id'=>$id));?></li>
          <li><?php echo CHtml::Link('<strong>Upload <br>Documents</strong>',array('centerUploads/view','id'=>$id));?></li>
        	 <li><?php echo CHtml::Link('<strong>Upload <br>Images</strong>',array('centerImages/view','id'=>$id));?></li>
            <li><?php echo CHtml::Link('<strong>Shared <br>Tutor Groups</strong>',array('centerSt/index','id'=>$id));?></li>
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
                <td width="50%">Name of Your Support Center </td>
                <td><?php echo $model->name;?></td>
              </tr>
              
              <tr>
                <td>Registration Number</td>
                <td><?php echo $model->registration_no; ?></td>
              </tr>
              <tr>
                <td>Vat Number</td>
                <td><?php echo $model->vat_no; ?></td>
              </tr>
               <tr>
                <td>Tax Number</td>
                <td><?php echo $model->tax_no; ?></td>
              </tr>
              <tr>
                <td>Where will you be operating from? (give details)</td>
                <td><?php echo $model->opertaing_from;?></td>
              </tr>
              <tr>
                <td>How many students are you planning for per Course / Grade?</td>
                <td><?php echo $model->students_no; ?></td>
              </tr>
              <tr>
                <td>What are your skills levels with Microsoft Office?</td>
                <td><?php echo $model->ms_level; ?></td>
              </tr>
              <tr>
                <td>Are they connected on a wireless network and to the Internet?</td>
                <td><?php if($model->is_connected) echo 'Yes'; else echo 'No';?></td>
              </tr>
              
              <tr>
                <td>What Internet connection do you have?</td>
                <td><?php echo $model->internet_type;?></td>
              </tr>
              <tr>
                <td>Capped or Un-capped?</td>
                <td><?php if($model->is_capped) echo 'Capped'; else echo 'Uncapped';?></td>
              </tr>
              <tr>
                <td>Do you have a web cam? </td>
                <td><?php if($model->is_cam) echo 'Yes'; else echo 'No';?></td>
              </tr>
              <tr>
                <td>Do you have a wireless headset? </td>
                <td><?php if($model->is_headset) echo 'Yes'; else echo 'No';?></td>
              </tr>
              
              <tr>
                <td>Business format</td>
                <td><?php echo $model->business_format; ?></td>
              </tr>
              
               <tr>
                <td>Do you have a projector?</td>
                <td><?php if($model->is_projector) echo 'Yes'; else echo 'No';?></td>
              </tr>
              
               <tr>
                <td>Is this an existing Support Center or are you starting a new Support Center?</td>
                <td><?php if($model->is_new) echo 'New'; else echo 'Existing';?></td>
              </tr>
               <tr>
                <td>How many Center Tutors will you employ? (give details)</td>
                <td><?php echo $model->center_tutors_no;?></td>
              </tr>
               <tr>
                <td>Are you computer literate? (give details of experience)</td>
                <td><?php echo $model->comp_literate; ?></td>
              </tr>
              <tr>
                <td>How many computers do you have? (Give specifications)</td>
                <td><?php echo $model->computer_no; ?></td>
              </tr>
              <tr>
                <td>Who is your Internet Service Provider? </td>
                <td><?php echo $model->isp; ?></td>
              </tr>
              <tr>
                <td>What is the speed of your Internet connection?</td>
                <td><?php echo $model->internet_speed; ?></td>
              </tr>
              <tr>
                <td>Do you have Multi Functions Centers (printer, scanner and copier) and how many?</td>
                <td><?php  if($model->is_multifunction){echo $model->multifunction; }else{ echo 'No';} ?></td>
              </tr>
               <tr>
                <td>Do you have an Electronic White Board?</td>
                <td><?php if($model->is_board) echo 'Yes'; else echo 'No';?></td>
              </tr>
               
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

   