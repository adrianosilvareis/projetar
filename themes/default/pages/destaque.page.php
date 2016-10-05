<?php
$WsPosts = new WsPosts();
$WsPosts->setPost_type("destaque");

$WsPosts->Execute()->Query("#post_type#");

if ($WsPosts->Execute()->getResult()):
    $Post = $WsPosts->Execute()->getResult()[0];
    extract((array) $Post);
    ?>

    <div class = "section">
        <img src="<?= $post_cover; ?>" title="<?= $post_title; ?>" alt="<?= $post_content; ?>"
             class = "img-responsive">
    </div>

<?php endif; ?>