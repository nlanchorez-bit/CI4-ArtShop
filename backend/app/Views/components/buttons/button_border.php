<?php
// app/Views/components/buttons/button_border.php
$label = $label ?? 'Border Button';
$href  = $href  ?? '#';
$disable = $disable ?? false;
?>

<a href="<?= $disable ? 'javascript:void(0)' : htmlspecialchars($href, ENT_QUOTES, 'UTF-8') ?>"
    class="btn btn-border <?= $disable ? 'disabled' : '' ?>"
    <?= $disable ? 'aria-disabled="true" tabindex="-1"' : '' ?>>
    <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>
</a>

<style>
    .btn-border {
        background: transparent;
        border: 1.5px solid var(--brand);
        color: var(--brand);
        transition: background 0.2s ease, color 0.2s ease;
    }

    .btn-border:hover {
        background: var(--brand);
        color: #fff;
    }

    .btn-border.disabled {
        opacity: 0.5;
        pointer-events: none;
    }
</style>