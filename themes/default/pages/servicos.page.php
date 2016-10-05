<?php
$service = Check::CatByName("servicos");

$WsPosts = new WsPosts();

$View = new View();
$service_m = $View->Load("service_m");
?>
<section class="section" id="servicos">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Serviços</h1>
                <!--<p class="text-center"><?= $category_content; ?></p>-->
                <hr>
            </div>
        </div>

        <div class="row">
            <?php
            $WsPosts->Execute()->Query("(post_category = :cat or post_cat_parent = :cat) AND post_status = '1' ORDER BY post_type", ":cat={$service}");

            $i = 0;
            foreach ($WsPosts->Execute()->getResult() as $post):
                $i++;
                $post->post_content = Check::Words($post->post_content, 30);
                if (!$post->post_url):
                    $post->post_url = "#HOME#/artigo/$post->post_name";
                endif;

                if ($i % 2)
                    echo "</div><div class='row'>";

                $View->Show((array) $post, $service_m);
            endforeach;
            ?>
        </div>
    </div>
</section>