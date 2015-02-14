
<div class="table-responsive">
    <table class="table table-bordered mb30">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th>Name</th>
                 <th>School Type</th>
                  <th>Course Category</th>
                   <th>Curriculum Provider</th>
                   <th>Tutors</th>
                <th width="20%">Actions</th>
            </tr>
        </thead>
        
        <tbody id="cp-common-pool">
        <?php
        if(count($datas)==0){
        }
        else{
            foreach($datas as $key=>$data){
				
				$batch = CurriculumProviders::model()->findByPk($data->batch_id);
				$grade = Course::model()->findByPk($batch->course_id);
				$category = CourseCategory::model()->findByPk($grade->category);
				$type = SchoolTypes::model()->findByPk($category->school_type);
				$members = StGroupMembers::model()->findAllByAttributes(array('group_id'=>$data->id));
				
            ?>
            <tr>
                <td><span class="item-no"><?php echo $key+1;?></span></td>
                <td><span class="name_txt" data-id="<?php echo $data->id;?>"><?php echo CHtml::Link($data->name,array('stGroupMembers/index','id'=>$data->id));?></span></td>
                <td><?php echo $type->type;?></td>
                <td><?php echo $category->category;?></td>
                <td><?php echo $batch->name;?></td>
                <td><?php if(count($members)==0){echo CHtml::Link('<span class="fa fa-plus-circle" style="margin-left:10px; color:#25b161;"></span>',array('stGroupMembers/index','id'=>$data->id));}else{echo count($members).CHtml::Link('<span class="fa fa-plus-circle" style="margin-left:10px; color:#25b161;"></span>',array('stGroupMembers/index','id'=>$data->id));}?></td>
                <td>
                	<a href="javascript:void(0);" class="open_popup" data-ajax-url="<?php echo Yii::app()->createUrl('stGroups/ajaxupdate', array('id'=>$data->id))?>" data-target="#myModal" data-toggle="modal" data-modal-label="Edit Group `<?php echo $data->name;?>`"><i class="fa fa-pencil"></i></a>
                    &nbsp;&nbsp;
                    <a class="remove-icon" href="<?php echo Yii::app()->createUrl('stGroups/delete', array('id'=>$data->id, 'ajax'=>'remove-type'));?>"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            <?php
            }
        }
        ?>
        </tbody>
        
    </table>
</div>