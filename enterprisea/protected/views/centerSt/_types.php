
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
				
				$group = StGroups::model()->findByPk($data->group_id);
            ?>
            <tr>
                <td><span class="item-no"><?php echo $key+1;?></span></td>
                <td><span class="name_txt" data-id="<?php echo $data->id;?>"><?php echo $group->name;?></span></td>
                <td>
                	
                    <a class="remove-icon" href="<?php echo Yii::app()->createUrl('centerSt/delete', array('id'=>$data->id, 'ajax'=>'remove-type'));?>"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            <?php
            }
        }
        ?>
        </tbody>
        
    </table>
</div>