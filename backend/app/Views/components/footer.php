<?php
// components/footer.php
?>
<footer>
    <div class="container" style="display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap">
        <div style="font-size:14px;color:#666">
            &copy; <?= date('Y') ?> Arterion. All rights reserved.
        </div>

        <div style="display:flex;gap:8px;align-items:center">
            <?php
            // Moodboard (secondary) and Roadmap (link)
            $text = 'Moodboard';
            $href = '/moodboard';
            include __DIR__ . '/buttons/button_secondary.php';

            $text = 'Roadmap';
            $href = '/roadmap';
            include __DIR__ . '/buttons/button_link.php';
            ?>
        </div>
    </div>
</footer>