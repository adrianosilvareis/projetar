<?php

/**
 * WsAreaCategory.class.php [Beans]
 * 
 * Classe que representa a tabela ws_area_category do banco de dados
 * 
 * @copyright (c) 2015, Adriano S. Reis Programador
 */
class WsAreaCategory extends Beans {

    private $category_id;
    private $category_parent;
    private $category_name;
    private $category_title;
    private $category_content;
    private $category_date;

    function __construct() {
        $this->Controle = new Controle('ws_area_category');
    }

    /**
     * 
     * @return Objeto pupulado com todos os dados não nulo setado anteriormente.
     * 
     */
    public function getThis() {
        $this->Controle->setDados(array_filter([
            'category_parent' => $this->getCategory_parent(),
            'category_name' => $this->getCategory_name(),
            'category_title' => $this->getCategory_title(),
            'category_content' => $this->getCategory_content(),
            'category_date' => $this->getCategory_date(),
            'category_id' => $this->getCategory_id()
        ]));
        return $this->Controle->getDados();
    }

    /**
     * transforma a stdClass neste objeto, transferindo todos os dados não nulos para esta classe;
     * 
     * @param stdClass $object
     */
    public function setThis($object) {
        $this->setCategory_id((isset($object->category_id) ? $object->category_id : null));
        $this->setCategory_parent((isset($object->category_parent) ? $object->category_parent : null));
        $this->setCategory_name((isset($object->category_name) ? $object->category_name : null));
        $this->setCategory_title((isset($object->category_title) ? $object->category_title : null));
        $this->setCategory_content((isset($object->category_content) ? $object->category_content : null));
        $this->setCategory_date((isset($object->category_date) ? $object->category_date : null));
    }

    /**
     * Retorna operações de insert, update, delete, e buscas
     * 
     * @return Controle
     */
    public function Execute() {
        $this->getThis();
        return $this->Controle;
    }

    /**
     * ****************************************
     * ************** GET & SET ***************
     * ****************************************
     */
    function getCategory_id() {
        return $this->category_id;
    }

    function getCategory_parent() {
        return $this->category_parent;
    }

    function getCategory_name() {
        return $this->category_name;
    }

    function getCategory_title() {
        return $this->category_title;
    }

    function getCategory_content() {
        return $this->category_content;
    }

    function getCategory_date() {
        return $this->category_date;
    }

    function setCategory_id($category_id) {
        $this->category_id = $category_id;
    }

    function setCategory_parent($category_parent) {
        $this->category_parent = $category_parent;
    }

    function setCategory_name($category_name) {
        $this->category_name = $category_name;
    }

    function setCategory_title($category_title) {
        $this->category_title = $category_title;
    }

    function setCategory_content($category_content) {
        $this->category_content = $category_content;
    }

    function setCategory_date($category_date) {
        $this->category_date = $category_date;
    }

}
