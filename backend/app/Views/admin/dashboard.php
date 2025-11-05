<?php
// app/Views/admin/dashboard.php
/** @var array $counts */
$counts = $counts ?? ['users' => 0, 'products' => 0, 'requests' => 0];
$active = $active ?? 'home';
?>
<!doctype html>
<html lang="en">

<head>
  <?= view('components/head') ?>
  <style>
    /* scoped dashboard styles (won't override roadmap since scoped) */
    .admin-wrap {
      padding: 28px;
      max-width: 1100px;
      margin: 0 auto;
    }

    .admin-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      margin-bottom: 18px;
    }

    .admin-title {
      font-size: 20px;
      font-weight: 700;
      color: var(--brand);
    }

    .dashboard-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 16px;
      align-items: start;
    }

    .tile {
      background: #fff;
      border-radius: 12px;
      padding: 18px;
      box-shadow: 0 8px 20px rgba(16, 16, 32, 0.04);
      border: 1px solid rgba(0, 0, 0, 0.04);
      display: flex;
      flex-direction: column;
      gap: 12px;
      transition: transform .12s ease, box-shadow .12s ease, border-color .12s ease;
      text-decoration: none;
      color: inherit;
    }

    .tile:hover {
      transform: translateY(-6px);
      box-shadow: 0 18px 40px rgba(16, 16, 32, 0.06);
    }

    .tile .title {
      font-weight: 700;
      color: #333;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 8px;
    }

    .tile .count {
      font-size: 28px;
      font-weight: 800;
      color: var(--brand);
    }

    .tile .meta {
      color: #666;
      font-size: 13px;
    }

    /* active tile */
    .tile.active {
      border-color: rgba(127, 90, 240, 0.18);
      box-shadow: 0 20px 50px rgba(127, 90, 240, 0.08);
      outline: 3px solid rgba(127, 90, 240, 0.04);
    }

    /* small action row */
    .tile .actions {
      display: flex;
      gap: 8px;
      margin-top: auto;
    }

    .btn-plain {
      padding: 8px 10px;
      border-radius: 8px;
      border: 1px solid rgba(0, 0, 0, 0.06);
      background: transparent;
      cursor: pointer;
      font-weight: 600;
    }

    .btn-primary {
      background: var(--brand);
      color: white;
      padding: 8px 12px;
      border-radius: 8px;
      border: none;
      font-weight: 700;
    }

    @media (max-width:720px) {
      .admin-wrap {
        padding: 18px;
      }

      .tile .count {
        font-size: 22px;
      }
    }
  </style>
</head>

<body>
  <?= view('components/header') ?>

  <main class="admin-wrap">
    <div class="admin-header">
      <div>
        <div class="admin-title">Admin Dashboard</div>
        <div class="meta" style="margin-top:6px;">Overview — quick links and stats</div>
      </div>
      <div>
        <a href="<?= site_url('admin') ?>" class="btn-plain">Refresh</a>
      </div>
    </div>

    <section class="dashboard-grid" role="region" aria-label="Admin tiles">
      <!-- HOME tile -->
      <a href="<?= site_url('admin') ?>" class="tile <?= $active === 'home' ? 'active' : '' ?>">
        <div class="title">
          <span>Home</span>
          <span class="meta">Overview</span>
        </div>
        <div>
          <div class="count"><?= esc($counts['users'] + $counts['products'] + $counts['requests']) ?></div>
          <div class="meta">Total entities</div>
        </div>
        <div class="actions">
          <a class="btn-plain" href="<?= site_url('users') ?>">Users</a>
          <a class="btn-plain" href="<?= site_url('shop') ?>">Shop</a>
          <a class="btn-primary" href="<?= site_url('admin') ?>">Open</a>
        </div>
      </a>

      <!-- SHOP PAGE tile -->
      <a href="<?= site_url('shop') ?>" class="tile <?= $active === 'shop' ? 'active' : '' ?>">
        <div class="title">
          <span>Shop Page</span>
          <span class="meta">Products</span>
        </div>
        <div>
          <div class="count"><?= esc($counts['products']) ?></div>
          <div class="meta">Products in catalog</div>
        </div>
        <div class="actions">
          <a class="btn-plain" href="<?= site_url('shop') ?>">Open catalog</a>
          <a class="btn-primary" href="<?= site_url('shop/create') ?>">New product</a>
        </div>
      </a>

      <!-- USERS tile -->
      <a href="<?= site_url('users') ?>" class="tile <?= $active === 'users' ? 'active' : '' ?>">
        <div class="title">
          <span>Users</span>
          <span class="meta">Accounts</span>
        </div>
        <div>
          <div class="count"><?= esc($counts['users']) ?></div>
          <div class="meta">Registered users</div>
        </div>
        <div class="actions">
          <a class="btn-plain" href="<?= site_url('users') ?>">Manage</a>
          <a class="btn-primary" href="<?= site_url('users/create') ?>">Add</a>
        </div>
      </a>

      <!-- REQUESTS tile -->
      <a href="<?= site_url('requests') ?>" class="tile <?= $active === 'requests' ? 'active' : '' ?>">
        <div class="title">
          <span>Requests</span>
          <span class="meta">Commissions & Orders</span>
        </div>
        <div>
          <div class="count"><?= esc($counts['requests']) ?></div>
          <div class="meta">Pending / total requests</div>
        </div>
        <div class="actions">
          <a class="btn-plain" href="<?= site_url('requests') ?>">Open</a>
          <a class="btn-primary" href="<?= site_url('requests/create') ?>">New</a>
        </div>
      </a>
    </section>
  </main>

  <?= view('components/footer') ?>
</body>

</html>