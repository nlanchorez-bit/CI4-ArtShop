<?php
// components/buttons/button_secondary.php
// Expects: $text, $href (optional)
$text = $text ?? 'Secondary';
$href = $href ?? '#';
?>
<a class="btn btn-secondary" href="<?= htmlspecialchars($href, ENT_QUOTES, 'UTF-8') ?>">
    <?= htmlspecialchars($text, ENT_QUOTES, 'UTF-8') ?>
</a>