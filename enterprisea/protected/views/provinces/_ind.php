<div class="panel panel-default ind-course" id="course-<?php echo $province->id;?>">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse_<?php echo $province->id;?>" id="course-title-<?php echo $province->id;?>"><?php echo $province->name;?></a>
        </h4>
    </div>
    <div id="collapse_<?php echo $province->id;?>" class="panel-collapse collapse" style="height: 0px;">
        <div class="panel-body">
            <div class="btn-group mr5 pull-right cp_action">
                <button class="btn btn-primary" type="button">Action</button>
                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="javascript:void(0);" class="open_popup" data-ajax-url="<?php echo Yii::app()->createUrl('cities/ajaxcreate', array('id'=>$province->id,'country'=>$_GET['country']))?>" data-target="#myModal" data-toggle="modal" data-modal-label="Add City to `<?php echo $province->name;?>`">Add Cities</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0);" class="open_popup" data-ajax-url="<?php echo Yii::app()->createUrl('provinces/ajaxupdate', array('id'=>$province->id,'country'=>$_GET['country']))?>" data-target="#myModal" data-toggle="modal" data-modal-label="Edit Province `<?php echo $province->name;?>`">Edit</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('provinces/delete', array('id'=>$province->id, 'ajax'=>'remove-sub','country'=>$_GET['country']));?>" class="remove-button" data-target="#accordion">Delete</a></li>
                </ul>
            </div>                
            <div class="row" id="cproviders-<?php echo $province->id;?>">
            <!--Curriculum Provider starts-->
                <?php $this->renderPartial('//cities/_ccities', array('province'=>$province));?>                    
            <!--Curriculum Provider ends-->
            </div>                
        </div>
    </div>
</div>