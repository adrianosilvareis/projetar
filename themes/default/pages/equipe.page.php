<?php
$equipe = Check::CatParentByName("equipe");
$WsPosts = new WsPosts();

$View = new View();
$equip_m = $View->Load("equip_m");

foreach ($equipe as $equip):
    extract((array) $equip);
    ?>

    <section class="section" id="<?= $category_name ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Equipe <small><?= $category_title; ?></small></h1>
                    <p class="text-center"><?= $category_content; ?></p>
                </div>
            </div>

            <div class="row">
                <?php
                $WsPosts->Execute()->Query("(post_category = :cat or post_cat_parent = :cat) AND post_status = '1' ORDER BY post_type", ":cat={$category_id}");

                $i = 0;
                foreach ($WsPosts->Execute()->getResult() as $post):
                    $post->post_content = Check::Words($post->post_content, 5);
                    if (!$post->post_url):
                        $post->post_url = "#HOME#/artigo/$post->post_name";
                    endif;
                    if ($i > 3 && $i % 3 === 0)
                        echo "</div><div class='row'>";
                    $i++;
                    $View->Show((array) $post, $equip_m);
                endforeach;
                ?>
            </div>
        </div>
    </section>
    <?php
endforeach;
?>