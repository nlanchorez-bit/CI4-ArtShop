<?php
// components/buttons/button_primary.php
// Expects: $text, $href (optional)
// Defaults provided for safety.
$text = $text ?? 'Primary';
$href = $href ?? '#';
?>
<a class="btn btn-primary" href="<?= htmlspecialchars($href, ENT_QUOTES, 'UTF-8') ?>">
    <?= htmlspecialchars($text, ENT_QUOTES, 'UTF-8') ?>
</a>