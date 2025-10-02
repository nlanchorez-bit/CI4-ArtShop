<?php
// components/cards/card_commissions.php

$product = (object)[
    'id' => 103,
    'slug' => 'commission-basic',
    'title' => 'Commission (Basic)',
    'description' => 'Request a custom painting. Provide references and desired dimensions; artist will quote a price.',
    'image' => '', // no image for commissions by default
    'price' => null,
    'type' => 'commission',
    'available' => true,
    'created_at' => date('Y-m-d')
];

include __DIR__ . '/product_card.php';
