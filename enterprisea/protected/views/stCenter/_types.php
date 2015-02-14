<div class="row">
	<div class="btn-demo pull-left">
	 <button data-toggle="modal" data-target="#myModal" type="button" data-ajax-url="<?php echo Yii::app()->createUrl('stCenter/ajaxcreate',array('group_id'=>$_GET['id']));?>" class="btn btn-primary open_popup">Assign To Centers</button>
	</div>
</div>
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
		$datas	= StCenter::model()->findAllByAttributes(array('group_id'=>$group_id));
        if(count($datas)==0){
        }
        else{
            foreach($datas as $key=>$data){
				
				$center = Center::model()->findByPk($data->center_id);
            ?>
            <tr>
                <td><span class="item-no"><?php echo $key+1;?></span></td>
                <td><span class="name_txt" data-id="<?php echo $data->id;?>"><?php echo $center->center_name;?></span></td>
                <td>
                	
                    <a class="remove-icon" href="<?php echo Yii::app()->createUrl('stCenter/delete', array('id'=>$data->id, 'ajax'=>'remove-type'));?>"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            <?php
            }
        }
        ?>
        </tbody>
        
    </table>
</div>