<div style="margin-bottom:15px;">

<div class="col-lg-8 nopadding">
<div class="dataTables_paginate paging_full_numbers">
                        <?php                                          
                          $this->widget('CLinkPager', array(
                          'currentPage'=>$pages->getCurrentPage(),
                          'itemCount'=>$item_count,
                          'pageSize'=>20,
                          'maxButtonCount'=>5,
                          //'nextPageLabel'=>'My text >',
                          'header'=>'',
                        'htmlOptions'=>array('class'=>'pages'),
                        ));?>
                        </div>
                        
                        

</div>
             
<div class="clearfix"></div>
		
</div>

<div class="clearfix"></div>
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
		
        if(count($list)==0){
        }
        else{
            foreach($list as $key=>$data){
            ?>
            <tr>
                <td>
                <?php echo ($key+1)+((isset($_REQUEST['page']))?($_REQUEST['page']-1)*20:0);?>
               </td>
                <td><span class="name_txt" data-id="<?php echo $data->id;?>"><?php echo $data->name;?></span></td>
                <td>
                	<a href="javascript:void(0);" class="open_popup" data-ajax-url="<?php echo Yii::app()->createUrl('serviceCategory/ajaxupdate', array('id'=>$data->id))?>" data-target="#myModal" data-toggle="modal" data-modal-label="Edit Category `<?php echo $data->name;?>`"><i class="fa fa-pencil"></i></a>
                    &nbsp;&nbsp;
                    <a class="remove-icon" href="<?php echo Yii::app()->createUrl('serviceCategory/delete', array('id'=>$data->id, 'ajax'=>'remove-type'));?>"><i class="fa fa-trash-o"></i></a>
                 
                </td>
            </tr>
            <?php } } ?>
           
        </tbody>
        
    </table>
</div>

<div class="dataTables_paginate paging_full_numbers">
                        <?php                                          
                          $this->widget('CLinkPager', array(
                          'currentPage'=>$pages->getCurrentPage(),
                          'itemCount'=>$item_count,
                          'pageSize'=>20,
                          'maxButtonCount'=>5,
                          //'nextPageLabel'=>'My text >',
                          'header'=>'',
                        'htmlOptions'=>array('class'=>'pages'),
                        ));?>
                        </div>
                        <div class="clearfix"></div>
