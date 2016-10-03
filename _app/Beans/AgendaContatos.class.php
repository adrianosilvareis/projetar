<?php

/**
 * AgendaContatos.class.php [Beans]
 * 
 * Classe que representa a tabela agenda_contatos do banco de dados
 * 
 * @copyright (c) 2015, Adriano S. Reis Programador
 */
class AgendaContatos extends Beans {

    private $contato_id;
    private $contato_nome;
    private $contato_sobrenome;
    private $contato_aniversario;
    private $contato_capa;
    private $contato_email;
    private $contato_telefone;
    private $contato_whatsapp;
    private $contato_site;
    private $contato_instagram;
    private $contato_facebook;
    private $contato_snap;
    private $contato_google_plus;
    private $contato_youtube;
    private $endereco_id;

    function __construct() {
        $this->Controle = new Controle('agenda_contatos');
    }

    /**
     * 
     * @return Objeto pupulado com todos os dados não nulo setado anteriormente.
     * 
     */
    public function getThis() {
        $this->Controle->setDados(array_filter([
            'contato_nome' => $this->getContato_nome(),
            'contato_sobrenome' => $this->getContato_sobrenome(),
            'contato_aniversario' => $this->getContato_aniversario(),
            'contato_capa' => $this->getContato_capa(),
            'contato_email' => $this->getContato_email(),
            'contato_telefone' => $this->getContato_telefone(),
            'contato_whatsapp' => $this->getContato_whatsapp(),
            'contato_site' => $this->getContato_site(),
            'contato_instagram' => $this->getContato_instagram(),
            'contato_facebook' => $this->getContato_facebook(),
            'contato_snap' => $this->getContato_snap(),
            'contato_google_plus' => $this->getContato_google_plus(),
            'contato_youtube' => $this->getContato_youtube(),
            'endereco_id' => $this->getEndereco_id(),
            'contato_id' => $this->getContato_id()
        ]));
        return $this->Controle->getDados();
    }

    /**
     * transforma a stdClass neste objeto, transferindo todos os dados não nulos para esta classe;
     * 
     * @param stdClass $object
     */
    public function setThis($object) {
        $this->setContato_id((isset($object->contato_id) ? $object->contato_id : null));
        $this->setContato_nome((isset($object->contato_nome) ? $object->contato_nome : null));
        $this->setContato_sobrenome((isset($object->contato_sobrenome) ? $object->contato_sobrenome : null));
        $this->setContato_aniversario((isset($object->contato_aniversario) ? $object->contato_aniversario : null));
        $this->setContato_capa((isset($object->contato_capa) ? $object->contato_capa : null));
        $this->setContato_email((isset($object->contato_email) ? $object->contato_email : null));
        $this->setContato_telefone((isset($object->contato_telefone) ? $object->contato_telefone : null));
        $this->setContato_whatsapp((isset($object->contato_whatsapp) ? $object->contato_whatsapp : null));
        $this->setContato_site((isset($object->contato_site) ? $object->contato_site : null));
        $this->setContato_instagram((isset($object->contato_instagram) ? $object->contato_instagram : null));
        $this->setContato_facebook((isset($object->contato_facebook) ? $object->contato_facebook : null));
        $this->setContato_snap((isset($object->contato_snap) ? $object->contato_snap : null));
        $this->setContato_google_plus((isset($object->contato_google_plus) ? $object->contato_google_plus : null));
        $this->setContato_youtube((isset($object->contato_youtube) ? $object->contato_youtube : null));
        $this->setEndereco_id((isset($object->endereco_id) ? $object->endereco_id : null));
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
    function getContato_id() {
        return $this->contato_id;
    }

    function getContato_nome() {
        return $this->contato_nome;
    }

    function getContato_sobrenome() {
        return $this->contato_sobrenome;
    }

    function getContato_aniversario() {
        return $this->contato_aniversario;
    }

    function getContato_capa() {
        return $this->contato_capa;
    }

    function getContato_email() {
        return $this->contato_email;
    }

    function getContato_telefone() {
        return $this->contato_telefone;
    }

    function getContato_whatsapp() {
        return $this->contato_whatsapp;
    }

    function getContato_site() {
        return $this->contato_site;
    }

    function getContato_instagram() {
        return $this->contato_instagram;
    }

    function getContato_facebook() {
        return $this->contato_facebook;
    }

    function getContato_snap() {
        return $this->contato_snap;
    }

    function getContato_google_plus() {
        return $this->contato_google_plus;
    }

    function getContato_youtube() {
        return $this->contato_youtube;
    }

    function getEndereco_id() {
        return $this->endereco_id;
    }

    function setContato_id($contato_id) {
        $this->contato_id = $contato_id;
    }

    function setContato_nome($contato_nome) {
        $this->contato_nome = $contato_nome;
    }

    function setContato_sobrenome($contato_sobrenome) {
        $this->contato_sobrenome = $contato_sobrenome;
    }

    function setContato_aniversario($contato_aniversario) {
        $this->contato_aniversario = $contato_aniversario;
    }

    function setContato_capa($contato_capa) {
        $this->contato_capa = $contato_capa;
    }

    function setContato_email($contato_email) {
        $this->contato_email = $contato_email;
    }

    function setContato_telefone($contato_telefone) {
        $this->contato_telefone = $contato_telefone;
    }

    function setContato_whatsapp($contato_whatsapp) {
        $this->contato_whatsapp = $contato_whatsapp;
    }

    function setContato_site($contato_site) {
        $this->contato_site = $contato_site;
    }

    function setContato_instagram($contato_instagram) {
        $this->contato_instagram = $contato_instagram;
    }

    function setContato_facebook($contato_facebook) {
        $this->contato_facebook = $contato_facebook;
    }

    function setContato_snap($contato_snap) {
        $this->contato_snap = $contato_snap;
    }

    function setContato_google_plus($contato_google_plus) {
        $this->contato_google_plus = $contato_google_plus;
    }

    function setContato_youtube($contato_youtube) {
        $this->contato_youtube = $contato_youtube;
    }

    function setEndereco_id($endereco_id) {
        $this->endereco_id = $endereco_id;
    }

}
