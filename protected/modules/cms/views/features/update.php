<?php
/* @var $this FeaturesController */
/* @var $model Features */

$this->breadcrumbs=array(
	'Features'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Features', 'url'=>array('index')),
	array('label'=>'Create Features', 'url'=>array('create')),
	array('label'=>'View Features', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Features', 'url'=>array('admin')),
);
?>

<h1>Update Features <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$mode, 'itemsl'=>$items)); ?>