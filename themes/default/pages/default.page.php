<?php
$WsPosts = new WsPosts();

$View = new View();
$article_p = $View->Load("article_p");
$article_m = $View->Load("article_m");
$article_g = $View->Load("article_g");

foreach ($AllCategories as $cat):
    extract((array) $cat);
    ?>
    <section class="section" id="<?= $category_name ?>">
        <div class="container">

            <div class="row">
                <h1><?= $category_title; ?></h1>

                <?php
                $WsPosts->Execute()->Query("(post_category = :cat or post_cat_parent = :cat) AND post_status = '1' ORDER BY post_type", ":cat={$category_id}");

                $i = 0;
                $j = 0;
                foreach ($WsPosts->Execute()->getResult() as $post):
                    $post->datetime = date('Y-m-d', strtotime($post->post_date));
                    $post->pubdate = date("d/m/Y H:i", strtotime($post->post_date));
                    $post->post_content = Check::Words($post->post_content, 30);
                    if (!$post->post_url):
                        $post->post_url = "#HOME#/artigo/$post->post_name";
                    endif;
                    if ($post->post_type === 'grande'):
                        $View->Show((array) $post, $article_g);
                    elseif ($post->post_type === 'medio'):
                        if ($i === 0)
                            echo "</div><div class='row'>";
                        $View->Show((array) $post, $article_m);
                        $i++;
                    else:
                        if ($j === 0)
                            echo "</div><div class='row'>";
                        $View->Show((array) $post, $article_p);
                        $j++;
                    endif;

                endforeach;
                ?>
            </div>
        </div>
    </section>
    <?php
endforeach;
