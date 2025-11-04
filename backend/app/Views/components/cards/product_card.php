<?php
// components/cards/product_card.php
// Data contract:
//   $product : object or array with keys:
//     id, slug, title, description, image, price, type, available, created_at
//
// This file is intended to be included by specific card fragments
// (card_prints.php, card_originals.php, card_commissions.php)
// which set $product then include this file.

// Ensure $product exists
if (!isset($product)) {
    $product = (object)[
        'id' => null,
        'slug' => '',
        'title' => 'Untitled',
        'description' => 'No description available.',
        'image' => '',
        'price' => null,
        'type' => 'product',
        'available' => false,
        'created_at' => ''
    ];
}

if (is_array($product)) {
    $product = (object) $product;
}

/**
 * Safe helper: escape HTML
 * Guarded with function_exists to avoid redeclaration errors when this file
 * (or other fragments) are included multiple times.
 */
if (!function_exists('h')) {
    function h($v)
    {
        return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
    }
}

// Prepare text fields
$desc = $product->description ?? '';
$max = 240;
$short_desc = (mb_strlen($desc) > $max) ? mb_substr($desc, 0, $max) . '…' : $desc;

$img = !empty($product->image) ? $product->image : 'https://via.placeholder.com/800x600?text=No+Image';

$link = !empty($product->available) ? ('/product.php?slug=' . urlencode($product->slug ?? $product->id)) : null;

$typeLabelMap = [
    'print' => 'Print',
    'original' => 'Original',
    'commission' => 'Commission',
    'product' => 'Product'
];
$typeLabel = $typeLabelMap[$product->type ?? 'product'] ?? ucfirst($product->type ?? 'Product');

$availabilityClass = (!empty($product->available)) ? '' : 'card--unavailable';

$price = (isset($product->price) && is_numeric($product->price)) ? number_format((float)$product->price, 2) : null;
?>

<article
    class="card <?= $availabilityClass ?>"
    data-id="<?= h($product->id ?? '') ?>"
    data-type="<?= h($product->type ?? '') ?>"
    data-price="<?= h($product->price ?? '') ?>"
    data-created="<?= h($product->created_at ?? '') ?>"
    aria-labelledby="prod-title-<?= h($product->id ?? uniqid()) ?>">
    <?php if ($link): ?>
        <a href="<?= h($link) ?>" style="text-decoration:none;color:inherit;display:block;">
        <?php else: ?>
            <div style="display:block;">
            <?php endif; ?>

            <?php if (!empty($img)): ?>
                <div style="overflow:hidden;border-radius:8px;">
                    <img src="<?= h($img) ?>" alt="<?= h($product->title ?? 'Product image') ?>" style="width:100%;height:180px;object-fit:cover;display:block;">
                </div>
            <?php endif; ?>

            <div style="padding:12px 0;">
                <h4 id="prod-title-<?= h($product->id ?? uniqid()) ?>" style="margin:0 0 8px;font-size:16px;">
                    <?= h($product->title ?? 'Untitled') ?>
                    <?php if (empty($product->available)): ?>
                        <small style="color:#999;font-weight:600;margin-left:6px;font-size:12px;">(Unavailable)</small>
                    <?php endif; ?>
                </h4>

                <p style="margin:0 0 10px;color:#555;font-size:14px;min-height:42px;">
                    <?= h($short_desc) ?>
                </p>

                <div style="display:flex;justify-content:space-between;align-items:center;gap:12px;">
                    <div>
                        <span class="tag" style="padding:6px 8px;border-radius:999px;font-size:13px;background:#f6f5ff;color:var(--brand);border:1px solid rgba(127,90,240,0.08);">
                            <?= h($typeLabel) ?>
                        </span>
                    </div>

                    <div style="text-align:right;">
                        <?php if ($price !== null && $price !== ''): ?>
                            <div class="date-pill" style="background:#fff8f0;color:#7a4f11;padding:6px 10px;border-radius:999px;border:1px solid rgba(0,0,0,0.03);font-weight:600;">
                                ₱<?= h($price) ?>
                            </div>
                        <?php else: ?>
                            <div class="date-pill" style="background:#fff8f0;color:#7a4f11;padding:6px 10px;border-radius:999px;border:1px solid rgba(0,0,0,0.03);font-weight:600;">
                                Contact for price
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php if ($link): ?>
        </a>
    <?php else: ?>
        </div>
    <?php endif; ?>
</article>