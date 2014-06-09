<?php
/* @var $this MapObjectsController */
/* @var $model MapObjects */

$this->breadcrumbs=array(
	'Map Objects'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MapObjects', 'url'=>array('index')),
	array('label'=>'Create MapObjects', 'url'=>array('create')),
	array('label'=>'View MapObjects', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MapObjects', 'url'=>array('admin')),
);
?>

<h1>Update MapObjects <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>