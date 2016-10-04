<?php

//CONFIGURACAO DO BANCO ####################
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "ws_projetar");

//TRATAMENTO DE ERROS #####################
//CSS Constantes :: Mensagens de Erro
define("WS_ACCEPT", 'accept');
define("WS_INFOR", 'infor');
define("WS_ALERT", 'alerte');
define("WS_ERROR", 'error');

$Site = new WsSiteConfig();
$Site->Execute()->findAll();

//DEFINE IDENTIDADE DO SITE ####################
if (!$Site->Execute()->getResult()):
    define('SITENAME', 'Projetar');
    define('SITEDESC', 'Projetar comunicação integrada');
    define('NAME', '/projetar');
    define('THEME', 'default');
    define('SITECOVER', "/themes/" . THEME . "/img/logo.gif&h=150");
    
    
else:
    $SiteConfig = $Site->Execute()->getResult()[0];    
    define('SITENAME', $SiteConfig->site_title);
    define('SITEDESC', $SiteConfig->site_content);
    define('NAME', '/' . $SiteConfig->site_name);
    define('THEME', $SiteConfig->site_template);
    define('SITECOVER', "/uploads/" . $SiteConfig->site_cover);
endif;




//DEFINE A HOME DO SITE #########################
$SERVER = filter_input_array(INPUT_SERVER, FILTER_DEFAULT);
define('DOCUMENT_ROOT', $SERVER['DOCUMENT_ROOT']);
define('BASEDIR', DOCUMENT_ROOT . NAME);
define('HTTP_HOST', 'http://' . $SERVER['HTTP_HOST']);
define('HOME', HTTP_HOST . NAME);
define('REQUIRE_PATH', 'themes' . '/' . THEME);
define('INCLUDE_PATH', HOME . DIRECTORY_SEPARATOR . REQUIRE_PATH);
define('PRODUCAO', FALSE);

//REDES SOCIAIS
define('CANAL', 'UCG1S-LQV55pl0-n_KLTNtJQ');
define('FACEBOOK', 'adriano.reis23');
define('TWITTER', 'Adriano_EngPro');

//DEFINE SERVIDOR DE E-MAIL ####################
define('MAILUSER', 'adriano@tommasi.com.br');
define('MAILDESTINO', 'adriano@tommasi.com.br');
define('MAILNAME', 'Intranet Tommasi');
define('MAILASSUNTO', 'Contato via [SYSTEMA INTRANET]!');
define('MAILHOST', 'email-ssl.com.br');
define('MAILPASS', 'tommasi0000');
define('MAILPORT', '587');

//DEFINE SERVIDRO FTP
define("FTP_HOST", "192.168.0.50");
define("FTP_USER", "ftp");
define("FTP_PASS", "kr@p2605");
define("FTP_HOME", HOME . "/ftp");

//AUTO LOAD DE CLASSES ####################
function __autoload($Class_name) {
    /*
     * ****************************************
     * ********* DIRETORIOS PRINCIPAIS ********
     * ****************************************
     */
    $cDir = ['Conn', 'Helpers', 'Beans', 'Models', 'library'];
    $pDir = [];
    $iDir = null;

    foreach ($cDir as $dirName):
        $file = __DIR__ . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class_name . ".class.php";
        $iDir = AUTO($iDir, $file);
    endforeach;

    foreach ($pDir as $pdirName):
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . $pdirName . DIRECTORY_SEPARATOR . $Class_name . ".class.php";
        $iDir = AUTO($iDir, $file);
    endforeach;

    if (!$iDir):
        trigger_error("Não foi possivel inclur {$Class_name} .class.php", E_USER_ERROR);
        die;
    endif;
}

function AUTO($iDir, $file) {
    if (!$iDir && file_exists($file) && !is_dir($file)):
        require_once($file);
        $iDir = true;
    endif;
    return $iDir;
}

//ES ERROR :: Exibe os erros lançados :: FRONT
function WSErro($ErrMsg, $ErrNo, $ErrDie = null) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ALERT : ($ErrNo == E_USER_ERROR ? WS_ERROR : $ErrNo)));

    echo "<p class=\"trigger {$CssClass}\">{$ErrMsg}<span class=\"ajax_close\"></span></p>";

    if ($ErrDie):
        die;
    endif;
}

//PHPErro :: Personaliza o gatilho do PHP
function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {
    $start = explode("SQLSTATE[42S02]", $ErrMsg);
    if (!empty($start[1])):
        Check::BDCREATE($ErrMsg);
        echo "<div style='margin: 10px; padding: 15px; font-size: 1.2em; text-aling: center; color: #fff;' class=" . WS_ERROR . ">";
        echo "<p><strong>ERRO:</strong></p>";
        echo "<p>Tivemos um pequeno problema tecnico, mas já estamos consertando para você!</p>";
        echo "<small>Por favor, atualize a pagina!</small>";
        echo "</div>";
    endif;

    if (!strstr($ErrMsg, "ftp_chdir(): CWD")):
        $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ALERT : ($ErrNo == E_USER_ERROR ? WS_ERROR : $ErrNo)));
        echo "<p class=\"trigger {$CssClass}\">";
        echo "<b>Erro na Linha: {$ErrLine} ::</b> {$ErrMsg} <br>";
        echo "<small>{$ErrFile}</small>";
        echo "<span class=\"ajax_close\">{$ErrMsg}</span></p>";
    endif;

    if ($ErrNo == E_USER_ERROR):
        die;
    endif;
}

set_error_handler('PHPErro');
