<?php
/* @var $this MapObjectsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Map Objects',
);

$this->menu=array(
	array('label'=>'Create MapObjects', 'url'=>array('create')),
	array('label'=>'Manage MapObjects', 'url'=>array('admin')),
);
?>

<h1>Map Objects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
