<?php
// app/Views/user/login.php
$title = 'Login | Arterion';
?>
<!doctype html>
<html lang="en">

<head>
  <?= view('components/head', ['title' => $title]) ?>
  <style>
    /* Scoped login styles */
    main.auth {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: calc(100vh - 120px);
      padding: 40px 15px;
      background: linear-gradient(135deg, #f4f0ff, #ece6ff);
    }

    .form-box {
      background: #fff;
      padding: 34px 28px;
      border-radius: 12px;
      box-shadow: 0 8px 28px rgba(11, 12, 20, 0.06);
      width: 100%;
      max-width: 420px;
    }

    .form-box h2 {
      margin: 0 0 18px;
      text-align: center;
      color: var(--brand, #7f5af0);
      font-size: 1.5rem;
    }

    .field {
      margin-bottom: 12px;
    }

    label {
      display: block;
      font-size: 0.9rem;
      margin-bottom: 6px;
      color: #444;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #ddd;
      font-size: 1rem;
      transition: box-shadow .12s ease, border-color .12s ease;
    }

    input:focus {
      outline: none;
      border-color: var(--brand, #7f5af0);
      box-shadow: 0 6px 18px rgba(127, 90, 240, 0.08);
    }

    .btn {
      display: inline-block;
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      font-weight: 700;
      border: none;
      background: var(--brand, #7f5af0);
      color: #fff;
      cursor: pointer;
      font-size: 1rem;
      transition: transform .12s ease, box-shadow .12s ease;
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(127, 90, 240, 0.12);
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
      color: var(--brand);
      border: 1px solid rgba(127, 90, 240, 0.08);
    }

    .field-error {
      margin-top: 6px;
      color: #b82e45;
      font-size: 0.88rem;
    }

    .meta {
      text-align: center;
      margin-top: 12px;
      color: #555;
      font-size: 0.95rem;
    }

    .meta a {
      color: var(--brand);
      text-decoration: none;
      font-weight: 600;
    }

    .meta a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <?= view('components/header') ?>

  <main class="auth" role="main" aria-labelledby="login-title">
    <section class="form-box" aria-labelledby="login-title">
      <h2 id="login-title">Login to Arterion</h2>

      <?php
      // allow controller to pass $old and $errors, but also fallback to flashdata so redirects work
      $errors = $errors ?? session()->getFlashdata('errors') ?? [];
      $old    = $old    ?? session()->getFlashdata('old') ?? [];
      $success = session()->getFlashdata('success') ?? null;
      ?>

      <?php if (! empty($success)) : ?>
        <div class="notice success" role="status"><?= esc($success) ?></div>
      <?php endif; ?>

      <?php if (! empty($errors) && is_array($errors) && array_values($errors) !== []) : ?>
        <!-- If controller returned field-specific errors array, show small list -->
        <div class="notice error" role="alert" aria-live="assertive">
          <strong>There were some problems with your input.</strong>
        </div>
      <?php endif; ?>

      <form action="<?= site_url('login') ?>" method="post" novalidate>
        <?= csrf_field() ?>

        <div class="field">
          <label for="email">Email</label>
          <input
            id="email"
            name="email"
            type="email"
            autocomplete="email"
            required
            value="<?= esc($old['email'] ?? '') ?>"
            aria-invalid="<?= isset($errors['email']) ? 'true' : 'false' ?>"
            aria-describedby="<?= isset($errors['email']) ? 'email-error' : '' ?>">
          <?php if (! empty($errors['email'])): ?>
            <div id="email-error" class="field-error"><?= esc($errors['email']) ?></div>
          <?php endif; ?>
        </div>

        <div class="field">
          <label for="password">Password</label>
          <input
            id="password"
            name="password"
            type="password"
            autocomplete="current-password"
            required
            aria-invalid="<?= isset($errors['password']) ? 'true' : 'false' ?>"
            aria-describedby="<?= isset($errors['password']) ? 'password-error' : '' ?>">
          <?php if (! empty($errors['password'])): ?>
            <div id="password-error" class="field-error"><?= esc($errors['password']) ?></div>
          <?php endif; ?>
        </div>

        <div style="margin-top:12px;">
          <button type="submit" class="btn">Login</button>
        </div>
      </form>

      <div class="meta">
        Don’t have an account? <a href="<?= site_url('signup') ?>">Sign up</a>
      </div>
    </section>
  </main>

  <?= view('components/footer') ?>
</body>

</html>