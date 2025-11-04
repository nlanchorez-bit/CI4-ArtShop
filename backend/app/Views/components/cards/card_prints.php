<?php

$product = (object)[
    'id' => 101,
    'slug' => 'sunrise-print',
    'title' => 'Sunrise Print',
    'description' => 'High-quality Giclée print on archival paper. Multiple sizes available.',
    'image' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=1400&auto=format&fit=crop',
    'price' => 1200.00,
    'type' => 'print',
    'available' => true,
    'created_at' => date('Y-m-d')
];

include __DIR__ . '/product_card.php';
