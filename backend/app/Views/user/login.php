<!doctype html>
<html lang="en">

<head>
  <?= view('components/head', ['title' => 'Login | Arterion']) ?>
  <style>
    main {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: calc(100vh - 120px);
      /* leaves space for header/footer */
      padding: 40px 15px;
      background: linear-gradient(135deg, #f4f0ff, #ece6ff);
    }

    .form-box {
      background: #fff;
      padding: 35px 30px;
      border-radius: 14px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 380px;
      animation: fadeIn 0.6s ease-in-out;
    }

    .form-box h2 {
      margin-top: 0;
      margin-bottom: 22px;
      font-size: 1.6rem;
      text-align: center;
      color: var(--brand);
    }

    .form-box input {
      width: 100%;
      padding: 12px;
      margin-bottom: 14px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      transition: 0.2s;
    }

    .form-box input:focus {
      border-color: var(--brand);
      outline: none;
      box-shadow: 0 0 5px rgba(127, 90, 240, 0.4);
    }

    .btn {
      display: inline-block;
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      text-align: center;
      border: none;
      cursor: pointer;
      font-size: 1rem;
      transition: 0.3s;
    }

    .btn-primary {
      background: var(--brand);
      color: #fff;
    }

    .btn-primary:hover {
      background: #6a47e0;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(127, 90, 240, 0.25);
    }

    .form-box p {
      text-align: center;
      margin-top: 16px;
      font-size: 0.9rem;
      color: #555;
    }

    .form-box a {
      color: var(--brand);
      text-decoration: none;
      font-weight: 500;
    }

    .form-box a:hover {
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(12px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
  <?= view('components/header') ?>

  <main>
    <div class="form-box">
      <h2>Login to Arterion</h2>
      <form action="<?= base_url('login') ?>" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
      <p>Don’t have an account?
        <a href="<?= base_url('signup') ?>">Sign up</a>
      </p>
    </div>
  </main>

  <?= view('components/footer') ?>
</body>

</html>