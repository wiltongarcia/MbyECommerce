<?php
/* @var $this CharacteristicsController */
/* @var $model Characteristic */

$this->breadcrumbs=array(
	'Characteristics'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Characteristic', 'url'=>array('index')),
	array('label'=>'Create Characteristic', 'url'=>array('create')),
	array('label'=>'Update Characteristic', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Characteristic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Characteristic', 'url'=>array('admin')),
);
?>

<h1>View Characteristic #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'status',
		'updated_at',
		'created_at',
	),
)); ?>
