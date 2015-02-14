<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Create'),
);

?>
<div class="pageheader">
      <h2><i class="fa fa-user"></i> Create Users <span>Subtitle goes here...</span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index.html">Bracket</a></li>
          <li class="active">Blank</li>
        </ol>
      </div>
    </div>

<div class="contentpanel">
    	<div class="col-sm-9 col-lg-12">
<div class="panel panel-default">
	<div class="panel-heading" style="position:relative;">

              <!-- panel-btns -->
              <div class="clear"></div>
              <h3 class="panel-title">Create User </h3>
</div>
    <div class="panel-body">
    
<?php
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>
	</div>
</div>
</div>
</div>
