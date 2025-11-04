<?php
// app/Views/user/signup.php
// Sign up page — uses shared head/header/footer via view()
$title = 'Sign Up | Arterion';
?>
<!doctype html>
<html lang="en">

<head>
  <?php // shared head contains brand variables and buttons styling 
  ?>
  <?= view('components/head', ['title' => $title]) ?>
  <style>
    /* Signup-specific styles (light, centered card) */
    .auth-layout {
      min-height: calc(100vh - 88px);
      /* leave space for header/footer */
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
      font-size: 0.95rem;
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
      border: 1px solid rgba(0, 0, 0, 0.12);
      font-size: 1rem;
      box-sizing: border-box;
      background: #fff;
    }

    input:focus {
      outline: none;
      box-shadow: 0 6px 18px rgba(127, 90, 240, 0.08);
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
      box-shadow: 0 8px 20px rgba(127, 90, 240, 0.12);
    }

    .small-meta {
      margin-top: 12px;
      font-size: 0.92rem;
      color: #555;
      text-align: center;
    }

    .small-meta a {
      color: var(--brand);
      text-decoration: none;
      font-weight: 700;
    }

    .small-meta a:hover {
      text-decoration: underline;
    }

    /* Responsive tweaks */
    @media (max-width:460px) {
      .signup-box {
        padding: 20px;
      }
    }
  </style>
</head>

<body>
  <?= view('components/header') ?>

  <main class="auth-layout" role="main">
    <div class="signup-box" aria-labelledby="signup-title">
      <h2 id="signup-title">Create your Arterion account</h2>
      <div class="signup-sub">Join to save favorites, request commissions, and buy art.</div>

      <form method="post" action="/signup" novalidate>
        <div class="form-row">
          <label for="fullname" class="sr-only">Full name</label>
          <input id="fullname" name="fullname" type="text" placeholder="Full name" required autocomplete="name" />
        </div>

        <div class="form-row">
          <label for="email" class="sr-only">Email</label>
          <input id="email" name="email" type="email" placeholder="Email address" required autocomplete="email" />
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
        Already have an account?
        <!-- pretty route (no .php). Header/footer already handle routing/navigation -->
        <a href="/login">Login</a>
      </div>
    </div>
  </main>

  <?= view('components/footer') ?>

  <script>

  </script>
</body>

</html>