<?php

/**
 * WsSiteConfig.class.php [Beans]
 * 
 * Classe que representa a tabela ws_site_config do banco de dados
 * 
 * @copyright (c) 2015, Adriano S. Reis Programador
 */
class WsSiteConfig extends Beans {

    private $site_id;
    private $site_cover;
    private $site_title;
    private $site_name;
    private $site_content;
    private $site_template;
    private $user_id;

    function __construct() {
        $this->Controle = new Controle('ws_site_config');
    }

    /**
     * 
     * @return Objeto pupulado com todos os dados não nulo setado anteriormente.
     * 
     */
    public function getThis() {
        $this->Controle->setDados(array_filter([
            'site_cover' => $this->getSite_cover(),
            'site_title' => $this->getSite_title(),
            'site_name' => $this->getSite_name(),
            'site_content' => $this->getSite_content(),
            'site_template' => $this->getSite_template(),
            'user_id' => $this->getUser_id(),
            'site_id' => $this->getSite_id()
        ]));
        return $this->Controle->getDados();
    }

    /**
     * transforma a stdClass neste objeto, transferindo todos os dados não nulos para esta classe;
     * 
     * @param stdClass $object
     */
    public function setThis($object) {
        $this->setSite_id((isset($object->site_id) ? $object->site_id : null));
        $this->setSite_cover((isset($object->site_cover) ? $object->site_cover : null));
        $this->setSite_title((isset($object->site_title) ? $object->site_title : null));
        $this->setSite_name((isset($object->site_name) ? $object->site_name : null));
        $this->setSite_content((isset($object->site_content) ? $object->site_content : null));
        $this->setSite_template((isset($object->site_template) ? $object->site_template : null));
        $this->setUser_id((isset($object->user_id) ? $object->user_id : null));
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
    function getSite_id() {
        return $this->site_id;
    }

    function getSite_cover() {
        return $this->site_cover;
    }

    function getSite_title() {
        return $this->site_title;
    }

    function getSite_name() {
        return $this->site_name;
    }

    function getSite_content() {
        return $this->site_content;
    }

    function getSite_template() {
        return $this->site_template;
    }

    function getUser_id() {
        return $this->user_id;
    }

    function setSite_id($site_id) {
        $this->site_id = $site_id;
    }

    function setSite_cover($site_cover) {
        $this->site_cover = $site_cover;
    }

    function setSite_title($site_title) {
        $this->site_title = $site_title;
    }

    function setSite_name($site_name) {
        $this->site_name = $site_name;
    }

    function setSite_content($site_content) {
        $this->site_content = $site_content;
    }

    function setSite_template($site_template) {
        $this->site_template = $site_template;
    }

    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }



}
