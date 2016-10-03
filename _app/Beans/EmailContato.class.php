<?php

/**
 * EmailContato.class.php [Beans]
 * 
 * Classe que representa a tabela email_contato do banco de dados
 * 
 * @copyright (c) 2015, Adriano S. Reis Programador
 */
class EmailContato extends Beans {

    private $email_id;
    private $email_user;
    private $email_destiny;
    private $email_name;
    private $email_title;
    private $email_host;
    private $email_pass;
    private $email_port;
    private $site_id;

    function __construct() {
        $this->Controle = new Controle('email_contato');
    }

    /**
     * 
     * @return Objeto pupulado com todos os dados não nulo setado anteriormente.
     * 
     */
    public function getThis() {
        $this->Controle->setDados(array_filter([
            'email_user' => $this->getEmail_user(),
            'email_destiny' => $this->getEmail_destiny(),
            'email_title' => $this->getEmail_title(),
            'email_host' => $this->getEmail_host(),
            'email_pass' => $this->getEmail_pass(),
            'email_port' => $this->getEmail_port(),
            'site_id' => $this->getSite_id(),
            'contato_id' => $this->getEmail_id()
        ]));
        return $this->Controle->getDados();
    }

    /**
     * transforma a stdClass neste objeto, transferindo todos os dados não nulos para esta classe;
     * 
     * @param stdClass $object
     */
    public function setThis($object) {
        $this->setEmail_id((isset($object->email_id) ? $object->email_id : null));
        $this->setEmail_user((isset($object->email_user) ? $object->email_user : null));
        $this->setEmail_destiny((isset($object->email_destiny) ? $object->email_destiny : null));
        $this->setEmail_name((isset($object->email_name) ? $object->email_name : null));
        $this->setEmail_title((isset($object->email_title) ? $object->email_title : null));
        $this->setEmail_host((isset($object->email_host) ? $object->email_host : null));
        $this->setEmail_pass((isset($object->email_pass) ? $object->email_pass : null));
        $this->setEmail_port((isset($object->email_port) ? $object->email_port : null));
        $this->setSite_id((isset($object->site_id) ? $object->site_id : null));
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
    function getEmail_id() {
        return $this->email_id;
    }

    function getEmail_user() {
        return $this->email_user;
    }

    function getEmail_destiny() {
        return $this->email_destiny;
    }

    function getEmail_name() {
        return $this->email_name;
    }

    function getEmail_title() {
        return $this->email_title;
    }

    function getEmail_host() {
        return $this->email_host;
    }

    function getEmail_pass() {
        return $this->email_pass;
    }

    function getEmail_port() {
        return $this->email_port;
    }

    function getSite_id() {
        return $this->site_id;
    }

    function setEmail_id($email_id) {
        $this->email_id = $email_id;
    }

    function setEmail_user($email_user) {
        $this->email_user = $email_user;
    }

    function setEmail_destiny($email_destiny) {
        $this->email_destiny = $email_destiny;
    }

    function setEmail_name($email_name) {
        $this->email_name = $email_name;
    }

    function setEmail_title($email_title) {
        $this->email_title = $email_title;
    }

    function setEmail_host($email_host) {
        $this->email_host = $email_host;
    }

    function setEmail_pass($email_pass) {
        $this->email_pass = $email_pass;
    }

    function setEmail_port($email_port) {
        $this->email_port = $email_port;
    }

    function setSite_id($site_id) {
        $this->site_id = $site_id;
    }

}
