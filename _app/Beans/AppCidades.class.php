<?php

/**
 * AppCidades.class.php [Beans]
 * 
 * Classe que representa a tabela app_cidades do banco de dados
 * 
 * @copyright (c) 2015, Adriano S. Reis Programador
 */
class AppCidades extends Beans {

    private $cidade_id;
    private $estado_id;
    private $cidade_nome;
    private $cidade_uf;

    function __construct() {
        $this->Controle = new Controle('app_cidades');
    }

    /**
     * 
     * @return Objeto pupulado com todos os dados não nulo setado anteriormente.
     * 
     */
    public function getThis() {
        $this->Controle->setDados(array_filter([
            'cidade_nome' => $this->getCidade_nome(),
            'cidade_uf' => $this->getCidade_uf(),
            'estado_id' => $this->getEstado_id(),
            'cidade_id' => $this->getCidade_id()
        ]));
        return $this->Controle->getDados();
    }

    /**
     * transforma a stdClass neste objeto, transferindo todos os dados não nulos para esta classe;
     * 
     * @param stdClass $object
     */
    public function setThis($object) {
        $this->setCidade_id((isset($object->cidade_id) ? $object->cidade_id : null));
        $this->setCidade_nome((isset($object->cidade_nome) ? $object->cidade_nome : null));
        $this->setCidade_uf((isset($object->cidade_uf) ? $object->cidade_uf : null));
        $this->setEstado_id((isset($object->estado_id) ? $object->estado_id : null));
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
    function getCidade_id() {
        return $this->cidade_id;
    }

    function getEstado_id() {
        return $this->estado_id;
    }

    function getCidade_nome() {
        return $this->cidade_nome;
    }

    function getCidade_uf() {
        return $this->cidade_uf;
    }

    function setCidade_id($cidade_id) {
        $this->cidade_id = $cidade_id;
    }

    function setEstado_id($estado_id) {
        $this->estado_id = $estado_id;
    }

    function setCidade_nome($cidade_nome) {
        $this->cidade_nome = $cidade_nome;
    }

    function setCidade_uf($cidade_uf) {
        $this->cidade_uf = $cidade_uf;
    }

}
