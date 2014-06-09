<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="language_container">
    <?php
    $links = Yii::app()->urlManager->getLanguageImageLinks(array(), true, array(),array("class"=>"languages"));
    foreach($links as $link)
        echo $link;
    ?>
</div>

<div class="container" id="page">



	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/cms/main/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Products', 'url'=>array('/cms/products'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Sub Products', 'url'=>array('/cms/subproducts'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Items', 'url'=>array('/cms/items'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Features', 'url'=>array('/cms/features'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Blog', 'url'=>array('/cms/blog'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Map objects', 'url'=>array('/cms/mapobjects'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Categories', 'url'=>array('/cms/categories'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/cms/main/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/cms/main/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'homeLink'=>CHtml::link('Home', array('/cms/main/index')),
            'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by gglaboratories.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
