<?php

/**
 * AppEstados.class.php [Beans]
 * 
 * Classe que representa a tabela app_estados do banco de dados
 * 
 * @copyright (c) 2015, Adriano S. Reis Programador
 */
class AppEstados extends Beans {

    private $estado_id;
    private $estado_nome;
    private $estado_uf;
    private $estado_regiao;

    function __construct() {
        $this->Controle = new Controle('app_estados');
    }

    /**
     * 
     * @return Objeto pupulado com todos os dados não nulo setado anteriormente.
     * 
     */
    public function getThis() {
        $this->Controle->setDados(array_filter([
            'estado_nome' => $this->getEstado_nome(),
            'estado_uf' => $this->getEstado_uf(),
            'estado_regiao' => $this->getEstado_regiao(),
            'estado_id' => $this->getEstado_id()
        ]));
        return $this->Controle->getDados();
    }

    /**
     * transforma a stdClass neste objeto, transferindo todos os dados não nulos para esta classe;
     * 
     * @param stdClass $object
     */
    public function setThis($object) {
        $this->setEstado_id((isset($object->estado_id) ? $object->estado_id : null));
        $this->setEstado_nome((isset($object->estado_nome) ? $object->estado_nome : null));
        $this->setEstado_uf((isset($object->estado_uf) ? $object->estado_uf : null));
        $this->setEstado_regiao((isset($object->estado_regiao) ? $object->estado_regiao : null));
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
    function getEstado_id() {
        return $this->estado_id;
    }

    function getEstado_nome() {
        return $this->estado_nome;
    }

    function getEstado_uf() {
        return $this->estado_uf;
    }

    function getEstado_regiao() {
        return $this->estado_regiao;
    }

    function setEstado_id($estado_id) {
        $this->estado_id = $estado_id;
    }

    function setEstado_nome($estado_nome) {
        $this->estado_nome = $estado_nome;
    }

    function setEstado_uf($estado_uf) {
        $this->estado_uf = $estado_uf;
    }

    function setEstado_regiao($estado_regiao) {
        $this->estado_regiao = $estado_regiao;
    }


}
