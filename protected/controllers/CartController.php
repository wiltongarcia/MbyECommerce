<?php

class CartController extends Controller
{
	public function actionCreate()
    {
        $id=$this->setCacheId(); 
        $value=Yii::app()->cache->get($id);
        if($value===false)
        {
            $cart=$_POST['Cart'];
            $k=key($cart);
            $cart[$k]['quantity'] = 1;
            $cartData = current($cart);
            $cart[$k]['total']=(float)$cartData['price'];
            $value=array(
                'items'=>$cart,
                'totalItems'=>1,
                'totalValue'=>(float)$cartData['price']
            );
            $r = Yii::app()->cache->set($id, $value, (30 * 24 * 3600));

            if ($r)
                $this->setCookieData($value);

        }
        echo CJavaScript::jsonEncode(
            array(
                'successful'=>$r,
                'data'=>$value
            )
        );
    }

    public function actionUpdate()
    {
        $id=$this->getCacheId(); 
        $value=Yii::app()->cache->get($id);
        if($value!==false)
        {
            $value=$this->processCart($value);
            $r = Yii::app()->cache->set($id, $value, (30 * 24 * 3600));

            if ($r)
                $this->setCookieData($value);

        }
        echo CJavaScript::jsonEncode(
            array(
                'successful'=>($r && !empty($value)),
                'data'=>$value
            )
        );
    }

	public function actionIndex()
	{
		$this->render('index');
    }

    /**
     *  Gera e retorna uuid para ser usado no cache e salva o mesmo em cookie
     *
     * @return String
     * @author Wilton Garcia
     **/
    protected function setCacheId()
    {
        $uuid = uniqid(mt_rand(0,1000));
        setcookie('__cid', $uuid, time()+(30 * 24 * 3600), '/');
        return $uuid;
    }

    /**
     * Retorna uuid para ser usado no cache
     *
     * @return String
     * @author Wilton Garcia
     **/
    protected function getCacheId()
    {
        $uuid=$_COOKIE['__cid'];
        return $uuid;
    } 

    /**
     * Seta os valores nos cookies para facilitar a exibição no front
     *
     * @return void
     * @author Wilton Garcia
     **/
    protected function setCookieData($value)
    {
        setcookie('__ci', $value['totalItems'], time()+(30 * 24 * 3600), '/');
        setcookie('__ct', $value['totalValue'], time()+(30 * 24 * 3600), '/');
    }

    /**
    * Processa os dados e retorna os dados atualizados
    *
    * @return Array
    * @author Wilton Garcia
    **/
    protected function processCart($value)
    {
        $cart=$_POST['Cart'];
        $cartData = current($cart);  

        $items = array_keys($value['items']);
        $k=key($cart);
        if (in_array($k, $items))
        {
            $value['items'][$k]['quantity'] += 1;
            $value['items'][$k]['total'] += (float)$cartData['price'];
        } 
        else
        {
            $value['items'][$k]['quantity'] = 1;
            $value['items'][$k]['total'] = (float)$cartData['price'];
            $value['items'][$k]['price'] = (float)$cartData['price'];
            $value['items'][$k]['title'] = $cartData['title'];
            $value['items'][$k]['image'] = $cartData['image'];
        }
        
        $value['totalItems'] += 1;
        $value['totalValue'] += (float)$cartData['price'];
        return $value;     
    }
}
