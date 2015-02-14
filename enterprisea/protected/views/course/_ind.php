<div class="panel panel-default ind-course" id="course-<?php echo $course->id;?>">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse_<?php echo $course->id;?>" id="course-title-<?php echo $course->id;?>"><?php echo $course->name;?></a>
        </h4>
    </div>
    <div id="collapse_<?php echo $course->id;?>" class="panel-collapse collapse" style="height: 0px;">
        <div class="panel-body">
            <div class="btn-group mr5 pull-right cp_action">
                <button class="btn btn-primary" type="button">Action</button>
                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="javascript:void(0);" class="open_popup" data-ajax-url="<?php echo Yii::app()->createUrl('curriculumProviders/ajaxcreate', array('id'=>$course->id, 'stype'=>$_GET['stype'], 'category'=>$_GET['category']))?>" data-target="#myModal" data-toggle="modal" data-modal-label="Add curriculum provider to `<?php echo $course->name;?>`">Add Curriculum Provider</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0);" class="open_popup" data-ajax-url="<?php echo Yii::app()->createUrl('course/ajaxupdate', array('id'=>$course->id, 'stype'=>$_GET['stype'], 'category'=>$_GET['category']))?>" data-target="#myModal" data-toggle="modal" data-modal-label="Edit course `<?php echo $course->name;?>`">Edit</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('course/delete', array('id'=>$course->id, 'ajax'=>'remove-sub', 'stype'=>$_GET['stype'], 'category'=>$_GET['category']));?>" class="remove-button" data-target="#accordion">Delete</a></li>
                </ul>
            </div>                
            <div class="row" id="cproviders-<?php echo $course->id;?>">
            <!--Curriculum Provider starts-->
                <?php $this->renderPartial('//curriculumProviders/_cproviders', array('course'=>$course));?>                    
            <!--Curriculum Provider ends-->
            </div>                
        </div>
    </div>
</div>