<?php
/* @var $this SubProductsController */
/* @var $model SubProducts */

$this->breadcrumbs=array(
	'Sub Products'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SubProducts', 'url'=>array('index')),
	array('label'=>'Create SubProducts', 'url'=>array('create')),
	array('label'=>'View SubProducts', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SubProducts', 'url'=>array('admin')),
);
?>

<h1>Update SubProducts <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'products'=>$products)); ?>