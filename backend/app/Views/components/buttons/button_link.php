<?php
// components/buttons/button_link.php
// Expects: $text, $href (optional)
$text = $text ?? 'Link';
$href = $href ?? '#';
?>
<a class="btn btn-link" href="<?= htmlspecialchars($href, ENT_QUOTES, 'UTF-8') ?>">
    <?= htmlspecialchars($text, ENT_QUOTES, 'UTF-8') ?>
</a>