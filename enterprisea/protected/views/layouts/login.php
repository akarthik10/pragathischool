<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<link rel="shortcut icon" href="images/favicon.png" type="image/png">-->

  <title><?php echo CHtml::encode($this->pageTitle); ?></title>

  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>
<body class="signin">

<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  
    <div class="signinpanel">
        
        <div class="row">
            
       
            
            <div class="container loginWrapper">
                <?php echo $content; ?>
               
            </div><!-- col-sm-5 -->
            
        </div><!-- row -->
        
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2014. All Rights Reserved.
            </div>
            <div class="pull-right">
                <!--Created By: <a href="http://wiwo.in/" target="_blank">WIWO</a>-->
            </div>
        </div>
        
    </div><!-- signin -->
  
</section>


<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/retina.min.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js"></script>

</body>
</html>


	
