<?php

/**
 * SiteHasEndereco.class.php [Beans]
 * 
 * Classe que representa a tabela site_has_endereco do banco de dados
 * 
 * @copyright (c) 2015, Adriano S. Reis Programador
 */
class SiteHasEndereco extends Beans {

    private $site_id;
    private $endereco_id;

    function __construct() {
        $this->Controle = new Controle('site_has_endereco');
    }

    /**
     * 
     * @return Objeto pupulado com todos os dados não nulo setado anteriormente.
     * 
     */
    public function getThis() {
        $this->Controle->setDados(array_filter([
            'endereco_id' => $this->getEndereco_id(),
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
        $this->setSite_id((isset($object->endereco_id) ? $object->endereco_id : null));
        $this->setEndereco_id((isset($object->site_id) ? $object->site_id : null));
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

    function getEndereco_id() {
        return $this->endereco_id;
    }

    function setSite_id($site_id) {
        $this->site_id = $site_id;
    }

    function setEndereco_id($endereco_id) {
        $this->endereco_id = $endereco_id;
    }

}
