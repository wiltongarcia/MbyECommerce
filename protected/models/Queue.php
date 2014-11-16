<?php
/**
 * Implementa o controle básico de filas
 *
 * @author Wilton Garcia
 **/
class Queue
{       
    /**
     * Construtor da classe, importa o ZendLucene
     *
     * @return void
     * @author Wilton Garcia
     **/
    public function __construct()
    {
        Yii::import('application.vendor.*');
        require_once('MEMQ/memq.class.php');
                
    }


    public function insert($item)
    {
        MEMQ::enqueue('orders', $item);    
    }
}
