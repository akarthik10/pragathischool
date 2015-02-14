<div class="row">
	<div class="btn-demo pull-right">
<button data-toggle="modal" data-target="#myModal" type="button" data-ajax-url="<?php echo Yii::app()->createUrl('stGroupMembers/ajaxcreate',array('group_id'=>$_GET['id']));?>" class="btn btn-primary open_popup">Add Shared Tutor Group Members</button>
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
        if(count($datas)==0){
        }
        else{
            foreach($datas as $key=>$data){
				
				$tutor = SharedTutor::model()->findByPk($data->tutor_id);
            ?>
            <tr>
                <td><span class="item-no"><?php echo $key+1;?></span></td>
                <td><span class="name_txt" data-id="<?php echo $data->id;?>"><?php echo $tutor->fullname;?></span></td>
                <td>
                	
                    <a class="remove-icon" href="<?php echo Yii::app()->createUrl('stGroupMembers/delete', array('id'=>$data->id, 'ajax'=>'remove-type'));?>"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            <?php
            }
        }
        ?>
        </tbody>
        
    </table>
</div>
          
