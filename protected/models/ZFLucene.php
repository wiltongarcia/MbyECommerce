<?php

/**
 * Model para pesquisa e indexação usando o ZendLucene
 *
 * @author Wilton Garcia    
 **/
class ZFLucene
{

    private $indexFiles = 'runtime.search';

    /**
     * Array de campos e tipos para ser usado no metodo getDocument
     *
     * @var Array
     **/
    protected $fields = array(
        'id' => 'Text',
        'title' => 'Text',
        'description' => 'Text',
        'image' => 'UnIndexed',
        'price' => 'Text',
    );

    /**
     * Construtor da classe, importa o ZendLucene
     *
     * @return void
     * @author Wilton Garcia
     **/
    public function __construct()
    {
        Yii::import('application.vendor.*');
        require_once('Zend/Search/Lucene.php');        
    }


    /**
     * Efetua a busca no index e retorna o resultado
     *
     * @return Array
     * @author Wilton Garcia
     **/
    public function search($term)
    {
        if (!empty($term))
        {
            $id='lucene-'.base64_encode($term);
            $value=Yii::app()->cache->get($id);
            if($value===false)
            {
            $index=new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->indexFiles));
                $results=$index->find($term);
                $query=Zend_Search_Lucene_Search_QueryParser::parse($term);

                $value=array(
                    'term'=>$term,
                    'results'=>array(),
                );

                foreach($results as $r)
                {
                    $value['results'][] = (object) array(
                        'id'=>$r->id,
                        'title'=>$r->title,
                        'description'=>$r->description,
                        'image' => $r->image,
                        'price' => $r->price, 
                    );
                }
                Yii::app()->cache->set($id, $value, 600);
            }

            return $value;
        }    
        
    }

    /**
     * Cria um documento e salva no Lucene
     *
     * @return Boolean
     * @author Wilton Garcia
     **/
    public function create($params)
    {
        if (!empty($params))
        {
            $index=new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->indexFiles), true);
            $doc=$this->getDocument($params);
            $index->addDocument($doc);

            return $index->commit();
        }

        return false;    
    }

    /**
     * Edita um documento e salva no Lucene
     *
     * @return Boolean
     * @author Wilton Garcia
     **/
    public function update($params)
    {
        if (!empty($params))
        {
            $index=new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->indexFiles), true);

            $docs=$index->find("id:{$params->id}");
            foreach ($docs as $d)
                $index->delete($d);


            $doc=$this->getDocument($params);
            $index->addDocument($doc);

            return $index->commit();
        }

        return false;      
    }

    /**
     * Deleta Document ao deletar o registro
     *
     * @return Boolean
     * @author Wilton Garcia
     **/
    public function delete($id)
    {
        $docs=$index->find("id:{$id}");
        $tf=true;
        foreach ($docs as $d)
            $tf=$tf && $index->delete($d);
        return $tf;     
    }

    /**
     * Cria, popula e retorna um Document do Lucene 
     *
     * @return Zend_Search_Lucene_Document
     * @author Wilton Garcia
     **/
    protected function getDocument($params)
    {
        $doc = new Zend_Search_Lucene_Document();

        foreach ($this->fields as $f=>$t) 
        {
            $doc->addField(
                Zend_Search_Lucene_Field::{$t}($f,
                CHtml::encode($params->$f), 'utf-8')
            );  
        }    

        return $doc;     
    }
} 
