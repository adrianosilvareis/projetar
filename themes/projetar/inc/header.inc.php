<?php
$location = (count($Link->getLocal()) > 1 ? HOME . '/' : FALSE);
$login = new Login(5);
?>

<div class="section">
    <h1 id="home" style="margin: 0;padding: 0">
        <img src="<?= HOME ?>/tim.php?src=<?= HOME ?>/themes/<?= THEME ?>/img/logo.gif&h=150">
    </h1>
</div>

<nav class="navbar navbar-default navbar-static-top" id="menuHeader">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>Projetar</span></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right" id="menulist">
                <li>
                    <a href="<?= $location; ?>#home">Home</a>
                </li>

                <?php
                $AllCategories = Check::CatParentByName("menu-1");
                if (!$location):
                    foreach ($AllCategories as $value) :
                        extract((array) $value);
                        ?>
                        <li><a href="#<?= $category_name; ?>"><?= $category_title; ?></a></li>
                        <?php
                    endforeach;
                endif;
                ?>

                <li>
                    <a href="<?= $location; ?>#contato">Contato</a>
                </li>

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