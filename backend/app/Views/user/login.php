<?php
// app/Views/user/login.php
$title = 'Login | Arterion';
?>
<!doctype html>
<html lang="en">

<?= view('components/head') ?>

<body>
  <?= view('components/header') ?>

  <main class="container auth-page" role="main" aria-labelledby="login-title">
    <style>
      /* Scoped auth styles to avoid interfering with roadmap or global styles */
      .auth-page {
        min-height: calc(100vh - 160px);
        /* account for header + footer approximate height */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 36px 12px;
      }

      .form-box {
        width: 100%;
        max-width: 420px;
        background: #fff;
        border-radius: 12px;
        padding: 34px 28px;
        box-shadow: 0 8px 28px rgba(11, 12, 20, 0.06);
      }

      .form-box h2 {
        margin: 0 0 18px 0;
        text-align: center;
        color: var(--brand, #7f5af0);
        font-size: 1.5rem;
      }

      .form-row {
        margin-bottom: 12px;
      }

      .form-row label {
        display: block;
        font-size: 0.9rem;
        margin-bottom: 6px;
        color: #444;
      }

      .form-row input[type="email"],
      .form-row input[type="password"] {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 1rem;
        transition: box-shadow .15s ease, border-color .15s ease;
      }

      .form-row input:focus {
        outline: none;
        border-color: var(--brand, #7f5af0);
        box-shadow: 0 4px 12px rgba(127, 90, 240, 0.08);
      }

      .form-actions {
        margin-top: 14px;
      }

      .notice {
        margin-bottom: 12px;
        padding: 10px 12px;
        border-radius: 8px;
        font-size: 0.95rem;
      }

      .notice.error {
        background: rgba(239, 69, 101, 0.06);
        color: #b82e45;
        border: 1px solid rgba(239, 69, 101, 0.08);
      }

      .notice.success {
        background: rgba(127, 90, 240, 0.06);
        color: var(--brand, #7f5af0);
        border: 1px solid rgba(127, 90, 240, 0.08);
      }

      .small {
        font-size: 0.9rem;
        color: #555;
        text-align: center;
        margin-top: 14px;
      }

      .small a {
        color: var(--brand, #7f5af0);
        text-decoration: none;
        font-weight: 600;
      }

      .small a:hover {
        text-decoration: underline;
      }
    </style>

    <section class="form-box" aria-labelledby="login-title">
      <h2 id="login-title">Login to Arterion</h2>

      <?php
      // $old and $errors are passed in from controller on GET OR via flashdata.
      $old = $old ?? [];
      $errors = $errors ?? [];
      $success = session()->getFlashdata('success') ?? null;
      ?>

      <!-- show success flash -->
      <?php if ($success) : ?>
        <div class="notice success" role="status"><?= esc($success) ?></div>
      <?php endif; ?>

      <!-- show validation errors (general list) -->
      <?php if (! empty($errors)) : ?>
        <div class="notice error" role="alert" aria-live="assertive">
          <strong>There were some problems with your input:</strong>
          <ul style="margin:8px 0 0 18px;">
            <?php foreach ($errors as $err) : ?>
              <li><?= esc($err) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form action="<?= site_url('login') ?>" method="post" novalidate>
        <?= csrf_field() ?>

        <div class="form-row">
          <label for="email">Email</label>
          <input id="email" type="email" name="email" value="<?= esc($old['email'] ?? '') ?>" placeholder="you@domain.com" required autofocus>
        </div>

        <div class="form-row">
          <label for="password">Password</label>
          <input id="password" type="password" name="password" placeholder="••••••••" required>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary" style="width:100%;">Login</button>
        </div>
      </form>

      <div class="small">
        Don’t have an account? <a href="<?= site_url('signup') ?>">Sign up</a>
      </div>
    </section>
  </main>

  <?= view('components/footer') ?>

</body>

</html>