<?php
$this->breadcrumbs=array(
	'PrivateTutor'=>array('index'),
	'Create',
);

?>
<div class="pageheader">
      <h2><i class="glyphicon glyphicon-bookmark"></i> Center <span>View</span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
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
          <li ><?php echo CHtml::Link('<strong>Tutor <br>Details</strong>',array('view','id'=>$id));?></li>
          <li class="active"><?php echo CHtml::Link('<strong>Course <br>Details</strong>',array('viewcourse','id'=>$id));?></li>
          <li><?php echo CHtml::Link('<strong>Location <br>Details</strong>',array('centerLocation/view','id'=>$id));?></li>
          <li><?php echo CHtml::Link('<strong>Upload<br> Documents</strong>',array('centerUploads/view','id'=>$id));?></li>
        	 <li><?php echo CHtml::Link('<strong>Upload <br>Images</strong>',array('centerImages/view','id'=>$id));?></li>
            <li><?php echo CHtml::Link('<strong>Shared Tutor <br>Groups</strong>',array('centerSt/index','id'=>$id));?></li>
        </ul>
	<div class="panel-heading" style="position:relative;height:60px;">
<div class="btn-demo file_up" style="position:relative; top:-8px; right:3px; float:right;"><?php echo CHtml::Link('<strong>Edit Course Details</strong>',array('createcourse','id'=>$id),array('class'=>'btn btn-success'));?> </div>
              <!-- panel-btns -->
              <div class="clear"></div>
        
</div> 
    <?php
		$old_courses = CenterCourse::model()->findAllByAttributes(array('center_id'=>$id));
		foreach($old_courses as $old_course)
		{ ?>
			<div class="panel-body">
    		<h4>Course Category : <?php echo $old_course->cat_name->category;?></h4><br />
    		<div class="table-responsive">
            <table class="table mb30">
            <thead>
              <tr>
                <th>#</th>
                <th>Grades</th>
                <th>Ciriculam Providers</th>
                <th>Subjects</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
	  <?php 
	  		$i =1;
	  		$courses = Courses::model()->findAllByAttributes(array('category_id'=>$old_course->course_id));
			foreach($courses as $course)
			{ 
				if($course != NULL)
				{
					
					$batch = Batches::model()->findAllByAttributes(array('course_id'=>$course->id));
					foreach($batch as $val)
					{
						$subjects = Subjects::model()->findAllByAttributes(array('batch_id'=>$val->id));
						?>
						<tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $course->course_name;?></td>
                            <td><?php echo $val->name;?></td>
                            <td> <?php 
											$sub_name = '';
											foreach($subjects as $val){
												$sub_name = $sub_name.' '.$val->name;
												
											}?><?php echo $sub_name; ?></td>
                            
                      	</tr>
						
			<?php		
					}
					
				}
			$i++;	
			}
			
			?>
            </tbody>
          	</table>
             </div>
           </div>
            <?php 
			
		}
		
		
?>

</div>
</div>
</div>