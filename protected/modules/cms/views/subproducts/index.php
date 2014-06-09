<?php
/* @var $this SubProductsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sub Products',
);

$this->menu=array(
	array('label'=>'Create SubProducts', 'url'=>array('create')),
	array('label'=>'Manage SubProducts', 'url'=>array('admin')),
);
?>

<h1>Sub Products</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
