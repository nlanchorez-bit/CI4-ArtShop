<?php
// components/cards/card_originals.php

$product = (object)[
    'id' => 102,
    'slug' => 'aurora-original',
    'title' => 'Aurora (Original)',
    'description' => 'Original acrylic on canvas, signed by the artist. Ready to hang.',
    'image' => 'https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?q=80&w=1400&auto=format&fit=crop',
    'price' => 15000.00,
    'type' => 'original',
    'available' => true,
    'created_at' => date('Y-m-d')
];

include __DIR__ . '/product_card.php';
