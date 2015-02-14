<?php
$provinces	= Provinces::model()->findAllByAttributes(array('country_id'=>$country));
if(count($provinces)==0){
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">
			<a>                  
			<?php
			if($country==0){
				echo 'Select Country.';				
			}
			else{
				echo 'Provinces Not found';
			}
			?>
			</a>
		</h4>
	</div>
</div>
<?php
}
else{
	foreach($provinces as $province){
		$this->renderPartial('//provinces/_ind', array('province'=>$province));
	}
}
?>