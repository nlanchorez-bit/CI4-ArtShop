<?php

$cta_title = $cta_title ?? 'Original art, prints, and commissions';
$cta_text  = $cta_text  ?? 'Celebrate Filipino creativity through unique paintings, digital prints, and custom commissions.';
$cta_image = $cta_image ?? 'https://cdn.shopify.com/s/files/1/0603/3745/5243/files/38.png?v=1675148744';
$cta_btn_text = $cta_btn_text ?? 'Explore Gallery';
$cta_btn_href = $cta_btn_href ?? 'index.php#gallery';
?>
<section class="hero">
    <div class="hero-left">
        <h2><?= htmlspecialchars($cta_title, ENT_QUOTES, 'UTF-8') ?></h2>
        <p><?= htmlspecialchars($cta_text, ENT_QUOTES, 'UTF-8') ?></p>

        <?php
        // primary CTA button
        $text = $cta_btn_text;
        $href = $cta_btn_href;
        include __DIR__ . '/buttons/button_primary.php';
        ?>
    </div>

    <div class="hero-right" style="flex:0 0 300px">
        <img src="<?= htmlspecialchars($cta_image, ENT_QUOTES, 'UTF-8') ?>" alt="featured" style="width:100%;border-radius:8px">
    </div>
</section>