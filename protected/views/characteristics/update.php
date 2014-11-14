<?php
/* @var $this CharacteristicsController */
/* @var $model Characteristic */

$this->breadcrumbs=array(
	'Characteristics'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Characteristic', 'url'=>array('index')),
	array('label'=>'Create Characteristic', 'url'=>array('create')),
	array('label'=>'View Characteristic', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Characteristic', 'url'=>array('admin')),
);
?>

<h1>Update Characteristic <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>