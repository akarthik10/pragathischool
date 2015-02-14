<div class="col-md-12 ind-cprovider" id="cprovider-<?php echo $ccity->id;?>">
    <div class="people-item cp_bx">
        <div class="media">
            <div class="media-body">
                <div class="panel-heading">
                    <div class="panel-btns">
                    <a href="<?php echo Yii::app()->createUrl('cities/delete', array('id'=>$ccity->id, 'ajax'=>'remove-sub', 'country'=>$_GET['country']));?>" class="remove-button" data-target="#cproviders-<?php echo $ccity->province_id;?>"><i class="fa fa-trash-o"></i></a>
                    <a href="javascript:void(0);" class="open_popup" data-ajax-url="<?php echo Yii::app()->createUrl('cities/ajaxupdate', array('id'=>$ccity->id,'country'=>$_GET['country']))?>" data-target="#myModal" data-toggle="modal" data-modal-label="Edit City `<?php echo $ccity->provincename.' - '.$ccity->name;?>`"><i class="fa fa-pencil"></i></a>
                    </div><!-- panel-btns -->
                    <h4>City : <span class="person-name"><?php echo $ccity->name;?></span></h4>
                    <!--subjects starts-->
                    <h5 class="subtitle">Suburbs</h5>
                    <div id="cpsubjects-<?php echo $ccity->id;?>">
                        <?php $this->renderPartial('//suburbs/_suburbs', array('ccity'=>$ccity));?>
                    </div>
                    <!--subjects ends-->
                </div>
            </div>
        </div>
    </div>
</div>