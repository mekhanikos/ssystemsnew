<?php
/* @var $this SubProductsController */
/* @var $model SubProducts */

$this->breadcrumbs=array(
	'Sub Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubProducts', 'url'=>array('index')),
	array('label'=>'Manage SubProducts', 'url'=>array('admin')),
);
?>

<h1>Create SubProducts</h1>

<?php $this->renderPartial('_form', array('model'=>$model,
                                          'products'=>$products
                            )); ?>