<?php
// components/header.php
$session = session();
$user = $session->get('user') ?? null;
$displayName = $user['display_name'] ?? $user['username'] ?? ($user['first_name'] ?? null);
$role = isset($user['role']) ? strtolower($user['role']) : null;
?>

<header class="site-header" role="banner" style="background:var(--muted);">
    <div class="container" style="display:flex;align-items:center;justify-content:space-between;gap:16px;padding:12px 0;">
        <div style="display:flex;align-items:center;gap:12px;">
            <a href="<?= site_url('/') ?>" class="logo" style="text-decoration:none;display:flex;align-items:center;gap:10px;">
                <div style="width:40px;height:40px;border-radius:8px;display:grid;place-items:center;color:#fff;background:var(--brand);font-weight:700;">
                    A
                </div>
                <span style="font-weight:700;color:var(--brand);">Arterion</span>
            </a>
        </div>

        <nav aria-label="Primary" style="display:flex;gap:14px;align-items:center;">
            <a href="<?= site_url('/') ?>">Home</a>
            <a href="<?= site_url('moodboard') ?>">Moodboard</a>
            <a href="<?= site_url('roadmap') ?>">Roadmap</a>
            <a href="<?= site_url('contact') ?>">Contact</a>
        </nav>

        <div style="display:flex;align-items:center;gap:10px;">
            <?php if ($user) : ?>
                <!-- Admin link for admins -->
                <?php if ($role === 'admin') : ?>
                    <a href="<?= site_url('admin') ?>" class="btn btn-secondary" style="font-weight:700;">Admin</a>
                <?php endif; ?>

                <!-- Display name -->
                <div style="display:flex;flex-direction:column;align-items:flex-end;margin-right:6px;font-size:13px;">
                    <span style="font-weight:700;"><?= esc($displayName) ?></span>
                    <span style="font-size:11px;color:#666;"><?= esc(ucfirst($role ?? 'client')) ?></span>
                </div>

                <!-- Logout form (POST) -->
                <form action="<?= site_url('logout') ?>" method="post" style="margin:0;">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-secondary" style="cursor:pointer;">Logout</button>
                </form>
            <?php else: ?>
                <!-- Guest -->
                <a href="<?= site_url('login') ?>" class="btn btn-secondary">Login</a>
                <a href="<?= site_url('signup') ?>" class="btn btn-primary">Sign Up</a>
            <?php endif; ?>
        </div>
    </div>
</header>