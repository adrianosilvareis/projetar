<?php
$location = (count($Link->getLocal()) > 1 ? HOME . '/' : FALSE);
$login = new Login(5);
?>

<div class="section" style="margin: 0;padding: 0; font-size: 0;">
    <h1 id="home" style="margin: 0;padding: 0; font-size: 0;">
        <?= SITENAME ?>
        <a title="<?= SITENAME ?>" href="<?= HOME ?>">
            <img src="<?= HOME ?>/tim.php?src=<?= HOME ?>/<?= SITECOVER ?>&h=150">
        </a>
    </h1>
</div>

<nav class="navbar navbar-default navbar-static-top" id="menuHeader">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= HOME ?>"><span><?= SITENAME ?></span></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right" id="menulist">
                <li>
                    <a href="<?= $location; ?>#home">Home</a>
                </li>
                
                <li>
                    <a href="<?= $location; ?>#servicos">Serviços</a>
                </li>
                
                <li>
                    <a href="<?= $location; ?>#clientes">Clientes</a>
                </li>
                
                <li>
                    <a href="<?= $location; ?>#">Blog</a>
                </li>
                
                <li>
                    <a href="<?= $location; ?>#contato">Contato</a>
                </li>
                
                <?php
//                $AllCategories = Check::CatParentByName("menu-1");
//                if (!$location):
//                    foreach ($AllCategories as $value) :
//                        extract((array) $value);
                ?>
                        <!--<li><a href="#//////<?= $category_name; ?>"><?= $category_title; ?></a></li>-->
                <?php
//                    endforeach;
//                endif;
                ?>
                
                <li>
                    <a href="/projetar/admin">Log In</a>
                </li>
            </ul>
        </div>

        <?php if ($login->CheckLogin()): ?>
            <p class="navbar-text" style="float: right;">Olá, Adriano Reis</p>
        <?php endif; ?>

    </div>
</nav>