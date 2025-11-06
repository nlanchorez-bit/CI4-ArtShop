<?php
// app/Views/admin/dashboard.php
/** @var array $counts */
$counts = $counts ?? ['users' => 0, 'products' => 0, 'requests' => 0];
$active = $active ?? 'home';

$counts['users'] = isset($counts['users']) ? (int)$counts['users'] : 0;
$counts['products'] = isset($counts['products']) ? (int)$counts['products'] : 0;
$counts['requests'] = isset($counts['requests']) ? (int)$counts['requests'] : 0;
$totalEntities = $counts['users'] + $counts['products'] + $counts['requests'];
?>
<!doctype html>
<html lang="en">

<head>
  <?= view('components/head') ?>
  <style>
    .admin-wrap {
      padding: 32px;
      max-width: 1100px;
      margin: 0 auto;
    }

    .greeting {
      text-align: center;
      margin-bottom: 25px;
    }

    .greeting h1 {
      margin: 0;
      font-size: 22px;
      font-weight: 800;
      color: var(--brand);
    }

    .greeting p {
      margin-top: 6px;
      color: #666;
    }

    .dashboard-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 18px;
    }

    @media (max-width: 720px) {
      .dashboard-grid {
        grid-template-columns: 1fr;
      }

      .admin-wrap {
        padding: 18px;
      }
    }

    .tile {
      background: #fff;
      border: 1px solid rgba(0, 0, 0, 0.05);
      border-radius: 12px;
      padding: 18px;
      display: flex;
      flex-direction: column;
      gap: 14px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
      transition: transform .15s, box-shadow .15s;
    }

    .tile:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
    }

    .row {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .icon {
      width: 40px;
      height: 40px;
      background: rgba(0, 0, 0, 0.04);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .tile .title a {
      font-weight: 700;
      font-size: 16px;
      color: #222;
      text-decoration: none;
    }

    .tile .title a:hover {
      text-decoration: underline;
    }

    .meta {
      color: #666;
      font-size: 13px;
    }

    .count {
      font-size: 28px;
      font-weight: 800;
      color: var(--brand);
    }

    .actions {
      margin-top: auto;
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }

    .btn-plain {
      padding: 8px 10px;
      border-radius: 8px;
      border: 1px solid rgba(0, 0, 0, 0.08);
      background: transparent;
      font-weight: 600;
      text-decoration: none;
      color: inherit;
      font-size: 13px;
    }

    .btn-primary {
      background: var(--brand);
      color: white;
      padding: 8px 12px;
      border-radius: 8px;
      font-weight: 700;
      text-decoration: none;
      font-size: 13px;
    }
  </style>
</head>

<body>
  <?= view('components/header') ?>

  <main class="admin-wrap">
    <div class="greeting">
      <h1>Welcome back, Administrator</h1>
      <p>Quick overview and shortcuts to manage system activity.</p>
    </div>

    <section class="dashboard-grid">

      <!-- HOME -->
      <div class="tile">
        <div class="row">
          <div class="icon">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5">
              <path d="M3 10.5L12 4l9 6.5" />
              <path d="M5 21V11h14v10" />
            </svg>
          </div>
          <div>
            <div class="title"><a href="<?= site_url('admin') ?>">Home</a></div>
            <div class="meta">Overview</div>
          </div>
        </div>

        <div class="count"><?= esc($totalEntities) ?></div>
        <div class="meta">Total entities</div>

        <div class="actions">
          <a class="btn-plain" href="<?= site_url('users') ?>">Users</a>
          <a class="btn-plain" href="<?= site_url('shop') ?>">Shop</a>
          <a class="btn-primary" href="<?= site_url('admin') ?>">Open</a>
        </div>
      </div>

      <!-- SHOP PAGE -->
      <div class="tile">
        <div class="row">
          <div class="icon">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5">
              <path d="M3 7h18" />
              <path d="M5 7v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7" />
              <path d="M9 11h.01" />
            </svg>
          </div>
          <div>
            <div class="title"><a href="<?= site_url('shop') ?>">Shop Page</a></div>
            <div class="meta">Products</div>
          </div>
        </div>

        <div class="count"><?= esc($counts['products']) ?></div>
        <div class="meta">Products in catalog</div>

        <div class="actions">
          <a class="btn-plain" href="<?= site_url('shop') ?>">Open catalog</a>
          <a class="btn-primary" href="<?= site_url('shop/create') ?>">New product</a>
        </div>
      </div>

      <!-- USERS -->
      <div class="tile">
        <div class="row">
          <div class="icon">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5">
              <path d="M16 11a4 4 0 1 0-8 0" />
              <path d="M2 21v-2a4 4 0 0 1 4-4h6" />
            </svg>
          </div>
          <div>
            <div class="title"><a href="<?= site_url('users') ?>">Users</a></div>
            <div class="meta">Accounts</div>
          </div>
        </div>

        <div class="count"><?= esc($counts['users']) ?></div>
        <div class="meta">Registered users</div>

        <div class="actions">
          <a class="btn-plain" href="<?= site_url('users') ?>">Manage</a>
          <a class="btn-primary" href="<?= site_url('users/create') ?>">Add</a>
        </div>
      </div>

      <!-- REQUESTS -->
      <div class="tile">
        <div class="row">
          <div class="icon">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5">
              <path d="M21 10v6a2 2 0 0 1-2 2H9l-4 4V6a2 2 0 0 1 2-2h11" />
            </svg>
          </div>
          <div>
            <div class="title"><a href="<?= site_url('requests') ?>">Requests</a></div>
            <div class="meta">Commissions & Orders</div>
          </div>
        </div>

        <div class="count"><?= esc($counts['requests']) ?></div>
        <div class="meta">Pending / total requests</div>

        <div class="actions">
          <a class="btn-plain" href="<?= site_url('requests') ?>">Open</a>
          <a class="btn-primary" href="<?= site_url('requests/create') ?>">New</a>
        </div>
      </div>

    </section>
  </main>

  <?= view('components/footer') ?>
</body>

</html>