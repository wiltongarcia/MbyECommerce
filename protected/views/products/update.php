<?php
/* @var $this ProductsController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Product', 'url'=>array('create')),
	array('label'=>'View Product', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
?>

<h1>Update Product <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'categories'=>$categories, 'characteristics' => $characteristics)); ?>
