<?php
	$controller	= $this->getUniqueId();
?>
<div class="table-responsive">
    <table class="table table-bordered mb30">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th>Name</th>
                <th width="20%">Actions</th>
            </tr>
        </thead>
        
        <tbody id="cp-common-pool">
        <?php
        if(count($datas)==0){
        }
        else{
            foreach($datas as $key=>$data){
            ?>
            <tr>
                <td><span class="item-no"><?php echo $key+1;?></span></td>
                <td><span class="name_txt" data-id="<?php echo $data->id;?>"><?php echo $data->type;?></span></td>
                <td>
                	<a href="javascript:void(0);" class="open_popup" data-ajax-url="<?php echo Yii::app()->createUrl($controller.'/ajaxupdate', array('id'=>$data->id))?>" data-target="#myModal" data-toggle="modal" data-modal-label="Edit type `<?php echo $data->type;?>`"><i class="fa fa-pencil"></i></a>
                    &nbsp;&nbsp;
                    <a class="remove-icon" href="<?php echo Yii::app()->createUrl($controller.'/delete', array('id'=>$data->id, 'ajax'=>'remove-type'));?>"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            <?php
            }
        }
        ?>
        </tbody>
        
    </table>
</div>