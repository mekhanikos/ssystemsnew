<?php
/* @var $this MapObjectsController */
/* @var $model MapObjects */

$this->breadcrumbs=array(
	'Map Objects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MapObjects', 'url'=>array('index')),
	array('label'=>'Manage MapObjects', 'url'=>array('admin')),
);
?>

<h1>Create MapObjects</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>