<div class="panel-body">
    <h4 class="panel-title">Search results</h4>
    <br />
    <div class="results-list">        
    	<?php
		if(count($datas)==0){
			echo 'No results';
		}
		else{
			foreach($datas as $data){
			?>
			<div class="media">
            <div class="col-sm-3">
				<a href="<?php echo Yii::app()->createUrl('center/details', array('id'=>$data->id));?>" class="pull-left" target="_blank">
				  <img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/images/photos/media-doc.png" class="media-object">                  
				</a>
                </div>
				<div class="media-body col-xs-9">
                	<div class="col-sm-9">
				  <a href="<?php echo Yii::app()->createUrl('center/details', array('id'=>$data->id));?>" target="_blank">
					<h4 class="filename text-primary">
						<?php echo ($data->user_type==1)?$data->center_name:$data->fullname;?>
					</h4>
				  </a>
				  <small class="text-muted">Type : <?php echo SchoolTypes::model()->findByPk($data->type_id)->type;?></small><br>
				  <small class="text-muted">Created: <?php echo date('M d, Y', strtotime($data->date))?></small><br>
                  </div>
                  <div class="col-sm-3">
                	<a href="<?php echo Yii::app()->createUrl('studentEnrollment/step1', array('center'=>$data->id));?>" class="btn btn-primary pull-right">
                      Register
                  </a>
                </div>
				</div>  
                              
			</div>
            
			<?php
			}
		}
		?>
    </div><!-- results-list -->    
</div>