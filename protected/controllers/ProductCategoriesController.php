<?php

class ProductCategoriesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ProductCategories;

		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if(isset($_POST['ProductCategories']))
		{
            $model->attributes=$_POST['ProductCategories'];
            echo CJavaScript::jsonEncode(
                array(
                    'successful' => $model->save()
                )
            );
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete()
	{
        $model=new ProductCategories;

        if(isset($_POST['ProductCategories']))
		{
            $filters = $_POST['ProductCategories'];
            echo CJavaScript::jsonEncode(
                array(
                    'successful' => $model->deleteAllByAttributes($filters)
                )
            );
		} 

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProductCategories('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductCategories']))
			$model->attributes=$_GET['ProductCategories'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ProductCategories the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ProductCategories::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ProductCategories $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-categories-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
