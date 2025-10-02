<?php
// components/header.php
// Presentational header matching the provided screenshot reference.
// Uses pretty routes (no .php) and plain anchors so it works with your existing routing.
?>
<header class="flex justify-between items-center bg-amber-100 shadow px-6 py-4">
    <div class="flex items-center gap-6">
        <!-- Brand / Logo -->
        <div class="font-bold text-amber-800 text-2xl">Arterion</div>

        <!-- Main nav -->
        <nav class="flex items-center gap-6" aria-label="Main navigation">
            <a href="/landing" class="font-medium text-stone-700 hover:text-amber-700">Home</a>
            <a href="/moodboard" class="font-medium text-stone-700 hover:text-amber-700">Moodboard</a>
            <a href="/roadmap" class="font-medium text-stone-700 hover:text-amber-700">Roadmap</a>
            <a href="/contact" class="font-medium text-stone-700 hover:text-amber-700">Contact</a>
        </nav>
    </div>

    <!-- Right side actions -->
    <div class="flex gap-3">
        <a href="/login" class="bg-white hover:bg-amber-50 px-4 py-2 border border-amber-700 rounded-lg font-medium text-amber-700">
            Login
        </a>

        <a href="/signup" class="bg-amber-700 hover:bg-amber-800 px-4 py-2 rounded-lg font-medium text-white">
            Sign Up
        </a>
    </div>
</header>