<?php

/**
 * AdminSite.class.php [ Models Admin ]
 * Responsavel por gerenciar as definições principiais do site
 *
 * @copyright (c) 2016 AdrianoReis PROGRAMADOR
 */
class AdminSite {

    private $Data;
    private $Site;
    private $Error;
    private $Result;

    public function ExeDefault(array $Data) {
        $this->Data = $Data;
        $this->Data['site_template'] = (isset($this->Data['site_template']) ? $this->Data['site_template'] : 'default');
        $this->Data['user_id'] = $_SESSION['userlogin']['user_id'];

        $WsSiteConfig = new WsSiteConfig();
        $WsSiteConfig->Execute()->findAll();
        $config = $WsSiteConfig->Execute()->getResult();
        if (isset($config[0])):
            $this->Data['site_id'] = $config[0]->site_id;
            $this->ExeUpdate($this->Data['site_id'], $this->Data);
        else:
            $this->ExeCreate($this->Data);
        endif;
    }

    public function ExeCreate(array $Data) {
        $this->Data = $Data;

        if (in_array('', $this->Data)):
            $this->Error = ["Erro ao cadastrar: Para criar um post, favor preencha todos os campos!", WS_ALERT];
            $this->Result = FALSE;
        else:
            $this->setData();
            $this->setName();
            $this->CreateImage();
        endif;
        $this->Data = null;
    }

    public function ExeUpdate($SiteId, array $Data) {
        $this->Site = (int) $SiteId;
        $this->Data = $Data;

        if (in_array('', $this->Data)):
            $this->Error = ["Para atualizar este post, preencha todos os campos ( Capa não precisa ser enviada! )", WS_ALERT];
            $this->Result = false;
        else:
            $this->setData();
            $this->setName();
            $this->UpdateImage();
            $this->Data = null;
        endif;
    }

    function getError() {
        return $this->Error;
    }

    function getResult() {
        return $this->Result;
    }

    /**
     * ****************************************
     * *************** PRIVATES ***************
     * ****************************************
     */
    private function deletaArquivo($Url) {
        if (file_exists($Url) && !is_dir($Url)):
            unlink($Url);
        endif;
    }

    private function CreateImage() {
        if ($this->Data['site_cover']):
            $upload = new upload();
            $upload->Image($this->Data['site_cover'], $this->Data['site_name']);
        endif;

        if (isset($upload) && $upload->getResult()):
            $this->Data['site_cover'] = $upload->getResult();
            $this->Create();
        else:
            $this->Data['site_cover'] = null;

            if (!empty($upload) && $upload->getError()):
                WSErro("<b>ERRO AO ENVIAR LOGO: </b>" . $upload->getError(), E_USER_WARNING);
            else:
                $this->Create();
            endif;

        endif;
    }

    private function UpdateImage() {

        if (is_array($this->Data['site_cover'])):
            $WsSiteConfig = new WsSiteConfig;
            $WsSiteConfig->setSite_id($this->Site);
            $WsSiteConfig->Execute()->find();

            $this->deletaArquivo('../uploads/' . $WsSiteConfig->Execute()->getResult()->site_cover);

            $upload = new Upload;
            $upload->Image($this->Data['site_cover'], $this->Data['site_name']);
        endif;

        if (isset($upload) && $upload->getResult()):
            $this->Data['site_cover'] = $upload->getResult();
            $this->Update();
        else:
            unset($this->Data['site_cover']);
            if (!empty($upload) && $upload->getError()):
                WSErro("<b>ERRO AO ENVIAR LOGO: </b>" . $upload->getError(), E_USER_WARNING);
            endif;
            $this->Update();
        endif;
    }

    private function setData() {
        $Cover = $this->Data['site_cover'];
        $Content = $this->Data['site_content'];
        unset($this->Data['site_cover'], $this->Data['site_content']);

        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data = array_map('trim', $this->Data);

        $this->Data['site_name'] = Check::Name($this->Data['site_title']);

        $this->Data['site_cover'] = ($Cover != 'null' ? $Cover : null);
        $this->Data['site_content'] = $Content;
    }

    private function setName() {
        $Where = (isset($this->Site) ? "site_id != {$this->Site} AND " : "");
        $WsSiteConfig = new WsSiteConfig();
        $WsSiteConfig->setSite_title($this->Data['site_title']);
        $WsSiteConfig->Execute()->Query("{$Where}#site_title#");

        if ($WsSiteConfig->Execute()->getResult()):
            $this->Data['site_name'] = $this->Data['site_name'] . '-' . $WsSiteConfig->Execute()->getRowCount();
        endif;
    }

    private function Create() {
        $cadastra = new WsSiteConfig();
        $cadastra->setThis((object) $this->Data);
        $result = $cadastra->Execute()->insert();

        if ($result):
            $this->Error = ['Definições salvas com sucesso!', WS_ACCEPT];
            $this->Result = true;
        endif;
    }

    private function Update() {
        $WsSiteConfig = new WsSiteConfig();
        $this->Data['site_id'] = $this->Site;
        $this->Data['site_cover'] = (!empty($this->Data['site_cover']) ? $this->Data['site_cover'] : null);

        $WsSiteConfig->setThis((object) $this->Data);
        $result = $WsSiteConfig->Execute()->update(null, 'site_id');

        if ($result):
            $this->Error = ['Definições salvas com sucesso!', WS_ACCEPT];
            $this->Result = true;
        endif;
    }

}
