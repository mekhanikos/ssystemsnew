<?php
/* @var $this MapObjectsController */
/* @var $model MapObjects */

$this->breadcrumbs=array(
	'Map Objects'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MapObjects', 'url'=>array('index')),
	array('label'=>'Create MapObjects', 'url'=>array('create')),
	array('label'=>'Update MapObjects', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MapObjects', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MapObjects', 'url'=>array('admin')),
);
?>

<h1>View MapObjects #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'latitude',
		'longitude',
		'description',
		'type',
	),
)); ?>
