<?php

class SiteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/site';
    
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
    {
        $productModel=new Product(); 
        $categoryModel=new Category();
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        $this->render('index', array(
            'categories'=>$categoryModel->getCategoriesWithTotal(),
            'latest' => $productModel::model()->findAll(array(
                'order'=>'created_at DESC',
                'limit'=>10
            ))
        ));
    }

    public function actionCategory($id)
    {
        $categoryModel=new Category();
        $this->render('category', array(
            'categories'=>$categoryModel->getCategoriesWithTotal(),
            'categoryProducts' => $categoryModel::model()->with('product')->findByPk($id)
        )); 
    }

    public function actionCart()
    {
        $categoryModel=new Category();
        $this->render('cart',array(
            'categories'=>$categoryModel->getCategoriesWithTotal(),
            'cart'=>$this->getCart(),
        ));    
    }    

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
    {
        $this->layout='//layouts/column2'; 
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
    }

    /**
     * Busca no Lucene 
     *
     * @return Array
     * @author Wilton Garcia
     **/
    public function actionSearch($q)
    {
        if (!empty($q))
        {
            $categoryModel=new Category();
            $lucene=new ZFLucene;
            $this->render('search',array(
                'categories'=>$categoryModel->getCategoriesWithTotal(),
                'search' => $lucene->search($q)
            ));
            
        }    
    }

    /**
     * exibe a interna de produtos
     *
     * @return void
     * @author Wilton Garcia
     **/
    public function actionProduct($id)
    {
        $categoryModel=new Category();
        $productModel=Product::model();
        $dependency = new CDbCacheDependency("SELECT p.updated_at FROM products as p WHERE p.id={$id}");
        $this->render('product', array(
            'categories'=>$categoryModel->getCategoriesWithTotal(),
            'product'=>$productModel->cache(600, $dependency)->with('characteristic')->findByPk($id),
        ));     
    }

    /**
     * Efetua o checkout dos produtos no carrinho
     *
     * @return void
     * @author Wilton Garcia
     **/
    public function actionCheckout()
    {
        $cart=$this->getCart();

        if (!empty($cart))
        {    
            $this->destroyCart();
            $order = $this->processOrder($cart);

            $this->enqueue($order);

            $categoryModel=new Category();
            $this->render('checkout', array(
                'categories'=>$categoryModel->getCategoriesWithTotal(),
                'cart'=>$cart,
                'order'=>uniqid(),
            )); 
        }
        else
        {
            $this->redirect(Yii::app()->homeUrl);
        }    
    }

    /**
     * undocumented function
     *
     * @return void
     * @author Me
     **/
    protected function getCart()
    {
        return Yii::app()->cache->get($this->getCacheId());    
    }

    /**
     * Retorna uuid para ser usado no cache
     *
     * @return String
     * @author Wilton Garcia
     **/
    protected function getCacheId()
    {
        $uuid=isset($_COOKIE['__cid']) ? $_COOKIE['__cid'] : false;
        return $uuid;
    } 

    /**
     * Remove os cookies e deleta o cache 
     *
     * @return Boolean
     * @author Wilton Garcia
     **/
    protected function destroyCart()
    {
        return setcookie('__cid', '', time()+(30 * 24 * 3600), '/') 
                && setcookie('__ci', '', time()+(30 * 24 * 3600), '/') 
                &&  setcookie('__ct', '', time()+(30 * 24 * 3600), '/') 
                && Yii::app()->cache->delete($this->getCacheId());   
    }

    /**
     * Recebe o carrinho, processa os cados e salva em order e order_items
     *
     * @return Order
     * @author Wilton Garcia
     **/
    protected function processOrder($cart)
    {

        $orderModel=new Order;
        $orderModel->created_at=date("Y-m-d h:i:s");
        $orderModel->updated_at=date("Y-m-d h:i:s");

        $orderModel->save();

        foreach ($cart['items'] as $k=>$p)
        {
            $orderItemsModel=new OrderItem; 
            $orderItemsModel->order_id=$orderModel->id;
            $orderItemsModel->product_id=$k;
            $orderItemsModel->price=$p['price'];
            $orderItemsModel->quantity=$p['quantity'];
            $orderItemsModel->total=$p['total'];
            $orderItemsModel->save();
        }

       return $orderModel;
    }

    /**
     * Insere a order na fila
     *
     * @return void
     * @author Wilton Garcia
     **/
    protected function enqueue($order)
    {
        $queue=new Queue;
        $queue->insert($order);        
    }

}
