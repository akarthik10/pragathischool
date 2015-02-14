<div class="col-md-12 ind-cprovider" id="cprovider-<?php echo $cprovider->id;?>">
    <div class="people-item cp_bx">
        <div class="media">
            <div class="media-body">
                <div class="panel-heading">
                    <div class="panel-btns">
                    <a href="<?php echo Yii::app()->createUrl('curriculumProviders/delete', array('id'=>$cprovider->id, 'ajax'=>'remove-sub', 'stype'=>$_GET['stype'], 'category'=>$_GET['category']));?>" class="remove-button" data-target="#cproviders-<?php echo $cprovider->course_id;?>"><i class="fa fa-trash-o"></i></a>
                    <a href="javascript:void(0);" class="open_popup" data-ajax-url="<?php echo Yii::app()->createUrl('curriculumProviders/ajaxupdate', array('id'=>$cprovider->id, 'stype'=>$_GET['stype'], 'category'=>$_GET['category']))?>" data-target="#myModal" data-toggle="modal" data-modal-label="Edit curriculum provider `<?php echo $cprovider->coursename.' - '.$cprovider->name;?>`"><i class="fa fa-pencil"></i></a>
                    </div><!-- panel-btns -->
                    <h4>Curriculum Provider : <span class="person-name"><?php echo $cprovider->name;?></span></h4>
                    <!--subjects starts-->
                    <h5 class="subtitle">Subjects</h5>
                    <div id="cpsubjects-<?php echo $cprovider->id;?>">
                        <?php $this->renderPartial('//cpSubjects/_subjects', array('cprovider'=>$cprovider));?>
                    </div>
                    <!--subjects ends-->
                </div>
            </div>
        </div>
    </div>
</div>