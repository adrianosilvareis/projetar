<?php
$location = (count($Link->getLocal()) > 1 ? HOME . '/' : FALSE);
$login = new Login(5);
?>

<!--<div class="section" style="margin: 0;padding: 0; font-size: 0;">
    <h1 id="home" style="margin: 0;padding: 0; font-size: 0;">
<?= SITENAME ?>
        <a title="<?= SITENAME ?>" href="<?= HOME ?>">
            <img src="<?= HOME ?>/tim.php?src=<?= HOME ?>/<?= SITECOVER ?>&h=150">
        </a>
    </h1>
</div>-->
<style>
    .logo_small{
        background-image: url(<?= HOME ?>/tim.php?src=<?= HOME ?>/<?= SITECOVER ?>&w=240&h=60);
        height: 60px;width: 240px;
    }

    .logo_big{
        background-image: url(<?= HOME ?>/tim.php?src=<?= HOME ?>/<?= SITECOVER ?>&w=240&h=150);
        height: 150px;width: 240px;
    }

    .logo{
        margin: 0;padding: 0; font-size: 0;
        background-repeat: no-repeat;
        -webkit-transition: width 2s, height 1s; /* For Safari 3.1 to 6.0 */
        transition: width 2s, height 1s;
    }
</style>

<div id="home"></div>
<nav class="navbar navbar-default navbar-static-top" id="menuHeader">
    <div class="container">
        <div class="navbar-header">
            <a title="<?= SITENAME ?>" href="<?= HOME ?>">
                <h1 id="logo" class="logo logo_big">
                    <?= SITENAME ?>
                </h1>
            </a>
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