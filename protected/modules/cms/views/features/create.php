<?php
/* @var $this FeaturesController */
/* @var $model Features */

$this->breadcrumbs=array(
	'Features'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Features', 'url'=>array('index')),
	array('label'=>'Manage Features', 'url'=>array('admin')),
);
?>

<h1>Create Features</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'items'=>$items)); ?>