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
         <li class="active"><?php echo CHtml::Link('<strong>Center <br>Details</strong>',array('view','id'=>$id));?></li>
          <li ><?php echo CHtml::Link('<strong>Course <br>Details</strong>',array('viewcourse','id'=>$id));?></li>
          <li><?php echo CHtml::Link('<strong>Location <br>Details</strong>',array('centerLocation/view','id'=>$id));?></li>
          <li><?php echo CHtml::Link('<strong>Upload<br> Documents</strong>',array('centerUploads/view','id'=>$id));?></li>
          <li><?php echo CHtml::Link('<strong>Upload <br>Images</strong>',array('centerImages/view','id'=>$id));?></li>
            <li><?php echo CHtml::Link('<strong>Shared Tutor<br> Groups</strong>',array('centerSt/index','id'=>$id));?></li>
        </ul>
      <div class="panel-heading" style="position:relative; height:60px;">
        <div class="btn-demo file_up" style="position:relative; top:-8px; right:3px; float:right;"><?php echo CHtml::Link('Edit Center Details',array('update','id'=>$center->id),array('class'=>'btn btn-success'));?></div>
        
        <!-- panel-btns -->
        <div class="clear"></div>
       <!-- <h3 class="panel-title">Centers </h3>-->
      </div>
      <div class="panel-body">
    
        <div class="table-responsive">
 <table class="table table-hover mb30">
            <tbody>
              <tr>
                <td width="30%">School Type :</td>
                <td><?php echo $center->type->type;?></td>
              </tr>
              <tr>
                <td width="30%">Center Name :</td>
                <td><?php echo $center->center_name;?></td>
              </tr>
              <tr>
                <td><h4>Principal Personal Information</h4></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Name :</td>
                <td><?php echo $center->fullname; ?></td>
              </tr>
              <tr>
                <td>Date Of Birth :</td>
                <td><?php echo $center->dob; ?></td>
              </tr>
              <tr>
                <td>ID/Passport Number :</td>
                <td><?php echo $center->passport_id;?></td>
              </tr>
              <tr>
                <td>Age :</td>
                <td><?php echo $center->age; ?></td>
              </tr>
              
              <tr>
                <td>Nationality :</td>
                <td><?php echo Nationality::model()->findByAttributes(array('id'=>$center->nationality))->name;?></td>
              </tr>
              <tr>
                <td><h4>Contact Details</h4></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Cell Number :</td>
                <td><?php echo $center->cell_no; ?></td>
              </tr>
              <tr>
                <td>Home Number :</td>
                <td><?php echo $center->home_no; ?></td>
              </tr>
              <tr>
                <td>Center Number :</td>
                <td><?php echo $center->center_no; ?></td>
              </tr>
              <tr>
                <td>Email-Address :</td>
                <td><?php echo $center->email; ?></td>
              </tr>
              <tr>
                <td>Website :</td>
                <td><?php echo $center->website; ?></td>
              </tr>
              <tr>
                <td>Skype Name :</td>
                <td><?php echo $center->skype; ?></td>
              </tr>
              
            </tbody>
          </table>
 </div>
      </div>
    </div>
  </div>
</div>

   