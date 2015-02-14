<?php $time = time(); ?>
      
        	<table width="100%" border="0" cellspacing="0" cellpadding="0" id="documentTable">
            	<tr>
                	<td><?php echo CHtml::activeLabel($model,'Image Name'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'file'); ?></td>
                   
                </tr>
                <tr>
                	<td width="30%">
                   
						 <div style="padding-right:20px;"><?php echo CHtml::activeTextField($model,'title[]',array('id'=>$time,'class'=>'form-control mb15')); ?>
                         <?php echo CHtml::error($model,'title'); ?></div>
                    </td>
                    <td >
                    	<div style="padding-top:15px;">
						<?php echo CHtml::activeFileField($model,'file[]'); ?>
                        <?php echo CHtml::error($model,'file'); ?>
                        <p style="font-size:11px;">(Only files with these extensions are allowed: jpg, png, pdf, doc, txt.)</p>
                        </div>
                    </td>
                   
                </tr>
            </table>
             <div class="row" id="student_id">
                <?php echo CHtml::activeHiddenField($model,'center_id[]',array('value'=>$_REQUEST['id'])); ?>
                <?php echo CHtml::error($model,'center_id'); ?>
            </div>
        
            <div class="row" id="file_type">
                <?php //echo $form->labelEx($model,'file_type'); ?>
                <?php echo CHtml::activeHiddenField($model,'file_type[]'); ?>
                <?php echo CHtml::error($model,'file_type'); ?>
            </div>
        
            <div class="row" id="created_at">
                <?php //echo $form->labelEx($model,'created_at'); ?>
                <?php echo CHtml::activeHiddenField($model,'created_at[]'); ?>
                <?php echo CHtml::error($model,'created_at'); ?>
            </div>
 <script>
 $("select#<?php echo $time; ?>").chosen({width:"286px"});
 </script>