<?php
// app/Views/user/signup.php
$title = 'Sign Up | Arterion';
?>
<!doctype html>
<html lang="en">

<head>
  <?= view('components/head', ['title' => $title]) ?>
  <style>
    /* (your existing styles — unchanged) */
    .auth-layout {
      min-height: calc(100vh - 88px);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 16px;
      box-sizing: border-box;
    }

    .signup-box {
      width: 100%;
      max-width: 420px;
      background: #fff;
      border-radius: 12px;
      padding: 28px;
      box-shadow: 0 10px 30px rgba(16, 16, 32, 0.06);
      border: 1px solid rgba(0, 0, 0, 0.04);
    }

    .signup-box h2 {
      margin: 0 0 12px 0;
      font-size: 1.375rem;
      color: var(--brand);
      font-weight: 700;
      text-align: center;
    }

    .signup-sub {
      text-align: center;
      margin-bottom: 18px;
      color: #666;
      font-size: .95rem
    }

    .form-row {
      margin-bottom: 12px;
    }

    label.sr-only {
      position: absolute !important;
      width: 1px;
      height: 1px;
      padding: 0;
      margin: -1px;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      white-space: nowrap;
      border: 0;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px 12px;
      border-radius: 8px;
      border: 1px solid rgba(0, 0, 0, .12);
      font-size: 1rem;
      box-sizing: border-box;
      background: #fff;
    }

    input:focus {
      outline: none;
      box-shadow: 0 6px 18px rgba(127, 90, 240, .08);
      border-color: var(--brand);
    }

    .form-actions {
      margin-top: 14px;
      display: flex;
      gap: 12px;
      align-items: center;
      flex-direction: column;
    }

    .btn {
      display: inline-block;
      padding: 10px 14px;
      border-radius: 10px;
      font-weight: 700;
      font-size: 14px;
      cursor: pointer;
      border: none;
      text-decoration: none;
      box-sizing: border-box;
    }

    .btn-primary {
      width: 100%;
      background: var(--brand);
      color: #fff;
      box-shadow: 0 8px 20px rgba(127, 90, 240, .12);
    }

    .small-meta {
      margin-top: 12px;
      font-size: .92rem;
      color: #555;
      text-align: center;
    }

    .small-meta a {
      color: var(--brand);
      text-decoration: none;
      font-weight: 700;
    }

    @media (max-width:460px) {
      .signup-box {
        padding: 20px;
      }
    }

    .notice {
      padding: 10px 12px;
      border-radius: 8px;
      margin-bottom: 12px;
      font-size: .95rem;
    }

    .notice.error {
      background: rgba(239, 69, 101, .06);
      color: #b82e45;
      border: 1px solid rgba(239, 69, 101, .08);
    }

    .notice.success {
      background: rgba(127, 90, 240, .06);
      color: var(--brand);
      border: 1px solid rgba(127, 90, 240, .08);
    }
  </style>
</head>

<body>
  <?= view('components/header') ?>

  <main class="auth-layout" role="main">
    <div class="signup-box" aria-labelledby="signup-title">
      <h2 id="signup-title">Create your Arterion account</h2>
      <div class="signup-sub">Join to save favorites, request commissions, and buy art.</div>

      <?php
      $old = $old ?? [];
      $errors = $errors ?? [];
      $success = session()->getFlashdata('success') ?? null;
      if ($success) : ?>
        <div class="notice success"><?= esc($success) ?></div>
      <?php endif; ?>

      <?php if (! empty($errors)) : ?>
        <div class="notice error" role="alert">
          <strong>Problems with your input:</strong>
          <ul style="margin:8px 0 0 18px;">
            <?php foreach ($errors as $err) : ?>
              <li><?= esc($err) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form method="post" action="<?= site_url('signup') ?>" novalidate>
        <?= csrf_field() ?>

        <div class="form-row">
          <label for="first_name" class="sr-only">First name</label>
          <input id="first_name" name="first_name" type="text" placeholder="First name" required autocomplete="given-name" value="<?= esc($old['first_name'] ?? '') ?>" />
        </div>

        <div class="form-row">
          <label for="middle_name" class="sr-only">Middle name</label>
          <input id="middle_name" name="middle_name" type="text" placeholder="Middle name (optional)" autocomplete="additional-name" value="<?= esc($old['middle_name'] ?? '') ?>" />
        </div>

        <div class="form-row">
          <label for="last_name" class="sr-only">Last name</label>
          <input id="last_name" name="last_name" type="text" placeholder="Last name" required autocomplete="family-name" value="<?= esc($old['last_name'] ?? '') ?>" />
        </div>

        <div class="form-row">
          <label for="display_name" class="sr-only">Display name</label>
          <input id="display_name" name="display_name" type="text" placeholder="Display name (optional)" value="<?= esc($old['display_name'] ?? '') ?>" />
        </div>

        <div class="form-row">
          <label for="email" class="sr-only">Email</label>
          <input id="email" name="email" type="email" placeholder="Email address" required autocomplete="email" value="<?= esc($old['email'] ?? '') ?>" />
        </div>

        <div class="form-row">
          <label for="password" class="sr-only">Password</label>
          <input id="password" name="password" type="password" placeholder="Password" required autocomplete="new-password" />
        </div>

        <div class="form-row">
          <label for="confirm_password" class="sr-only">Confirm Password</label>
          <input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm password" required autocomplete="new-password" />
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary" aria-label="Sign up">Sign Up</button>
        </div>
      </form>

      <div class="small-meta">
        Already have an account? <a href="<?= site_url('login') ?>">Login</a>
      </div>
    </div>
  </main>

  <?= view('components/footer') ?>
</body>

</html>