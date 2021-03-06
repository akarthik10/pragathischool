<div id="othleft-sidebar">
             <!--<div class="lsearch_bar">
             	<input type="text" value="Search" class="lsearch_bar_left" name="">
                <input type="button" class="sbut" name="">
                <div class="clear"></div>
  </div>-->       
                    <?php 
		$cnt=Roomrequest::model()->findAll('status=:x',array(':x'=>'C'));		
			
			function t($message, $category = 'cms', $params = array(), $source = null, $language = null) 
{
    return $message;
}

			$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'activateItems'=>true,
			'activeCssClass'=>'list_active',
			'items'=>array(
			array('label'=>''.'<h1>'.Yii::t('hostel','Manage Room').'</h1>'),  
					array('label'=>''.Yii::t('hostel','List Room Details').'<span>'.Yii::t('hostel','All Room Details').'</span>', 'url'=>array('/hostel/Room/manage') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='room' and Yii::app()->controller->action->id=='manage')
					    ),
						array('label'=>''.Yii::t('hostel','Search Room').'<span>'.Yii::t('hostel','Search All Rooms').'</span>', 'url'=>array('/hostel/Room/roomsearch') ,'linkOptions'=>array('class'=>'sroom_ico'),
                                   'active'=> (Yii::app()->controller->id=='room' and Yii::app()->controller->action->id=='roomsearch')
					    ),        
						
						array('label'=>''.Yii::t('hostel','Hostel Details').'<span>'.Yii::t('hostel','Add New Hostel Details').'</span>', 'url'=>array('/hostel/Hosteldetails/manage') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='hosteldetails' and (Yii::app()->controller->action->id=='create' or Yii::app()->controller->action->id=='manage' or Yii::app()->controller->action->id=='view' or Yii::app()->controller->action->id=='update'))
					    ),    
						array('label'=>''.Yii::t('hostel','Add Room Details').'<span>'.Yii::t('hostel','Add New Room Details').'</span>', 'url'=>array('/hostel/Floor/create') ,'linkOptions'=>array('class'=>'abook_ico'),
                                   'active'=> (Yii::app()->controller->id=='floor' and Yii::app()->controller->action->id=='create')
					    ),      
						array('label'=>''.Yii::t('hostel','Add Mess Details').'<span>'.Yii::t('hostel','Add New Mess Details').'</span>', 'url'=>array('/hostel/foodInfo/manage') ,'linkOptions'=>array('class'=>'abook_ico'),
                                   'active'=> (Yii::app()->controller->id=='foodInfo' and (Yii::app()->controller->action->id=='create' or Yii::app()->controller->action->id=='manage' or Yii::app()->controller->action->id=='update'  or Yii::app()->controller->action->id=='view'))
					    ),                
					array('label'=>''.'<h1>'.Yii::t('hostel','Room').'</h1>'), 
					array('label'=>''.Yii::t('hostel','Allot Room').'<span>'.Yii::t('hostel','Allot New Room').'</span>', 'url'=>array('/hostel/registration/create') ,'linkOptions'=>array('class'=>'aroom_ico'),
                                   'active'=> ((Yii::app()->controller->id=='registration' and Yii::app()->controller->action->id=='create') or(Yii::app()->controller->id=='room' and  (Yii::app()->controller->action->id=='change' or  Yii::app()->controller->action->id=='roomlist')) or (Yii::app()->controller->id=='allotment' and Yii::app()->controller->action->id=='create') )
					    ),  
						array('label'=>''.Yii::t('hostel','Change Room').'<span>'.Yii::t('hostel','Manage Rooms').'</span>', 'url'=>array('/hostel/Room/roomchange') ,'linkOptions'=>array('class'=>'c_room_ico'),
                                   'active'=> (Yii::app()->controller->id=='room' and Yii::app()->controller->action->id=='roomchange' )
					    ),  
						array('label'=>''.Yii::t('hostel','Vacate').'<span>'.Yii::t('hostel','Manage Rooms').'</span>', 'url'=>array('/hostel/Vacate/roomvacate') ,'linkOptions'=>array('class'=>'vroom_ico'),
                                   'active'=> (Yii::app()->controller->id=='vacate' and (Yii::app()->controller->action->id=='roomvacate' or Yii::app()->controller->action->id=='create' or  Yii::app()->controller->action->id=='view'))
					    ),  
						
						array('label'=>''.'<h1>'.Yii::t('hostel','Settings').'</h1>'),  
						array('label'=>''.Yii::t('hostel','View Student Details').'<span>'.Yii::t('hostel','All Student Details').'</span>', 'url'=>array('/hostel/MessManage/manage') ,'linkOptions'=>array('class'=>'vsd_ico'),
                                   'active'=> ((Yii::app()->controller->id=='messManage' and (Yii::app()->controller->action->id=='manage' or Yii::app()->controller->action->id=='messdetails' or Yii::app()->controller->action->id=='Payfees')) or (Yii::app()->controller->id=='allotment' and  Yii::app()->controller->action->id=='view') or (Yii::app()->controller->id=='messmanage' and  Yii::app()->controller->action->id=='payfees'))
					    ), 
						array('label'=>''.Yii::t('hostel','Mess Manage').'<span>'.Yii::t('hostel','Manage Mess Details').'</span>', 'url'=>array('/hostel/MessManage/messinfo') ,'linkOptions'=>array('class'=>'m_manage_ico'),
                                   'active'=> (Yii::app()->controller->id=='messManage' and Yii::app()->controller->action->id=='messinfo') or  (Yii::app()->controller->id=='registration' and Yii::app()->controller->action->id=='Change')
					    ), 
						array('label'=>''.Yii::t('hostel','View Mess Dues').'<span>'.Yii::t('hostel','Manage Mess Dues').'</span>', 'url'=>array('/hostel/settings/settings') ,'linkOptions'=>array('class'=>'vmd_ico'),
                                   'active'=> (Yii::app()->controller->id=='settings' and Yii::app()->controller->action->id=='settings')
					    ), 
						
						array('label'=>''.Yii::t('hostel','Notifications('.count($cnt).')').'<span>'.Yii::t('hostel','View Notifications').'</span>', 'url'=>array('/hostel/settings/notifications') ,'linkOptions'=>array('class'=>'notify_ico'),
                                   'active'=> (Yii::app()->controller->id=='settings' and Yii::app()->controller->action->id=='notifications')
					    ), 
				),
			)); ?>
		
		</div>
        <script type="text/javascript">

	$(document).ready(function () {
            //Hide the second level menu
            $('#othleft-sidebar ul li ul').hide();            
            //Show the second level menu if an item inside it active
            $('li.list_active').parent("ul").show();
            
            $('#othleft-sidebar').children('ul').children('li').children('a').click(function () {                    
                
                 if($(this).parent().children('ul').length>0){                  
                    $(this).parent().children('ul').toggle();    
                 }
                 
            });
          
            
        });

    </script>