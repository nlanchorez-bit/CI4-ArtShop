<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up | Arterion</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f4f0ff;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      color: #111;
    }

    .signup-box {
      background: #fff;
      padding: 30px 25px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 350px;
    }

    .signup-box h2 {
      margin-top: 0;
      margin-bottom: 20px;
      font-size: 1.5rem;
      text-align: center;
      color: #7f5af0;
    }

    .signup-box input {
      width: 100%;
      padding: 10px;
      margin-bottom: 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
    }

    .btn {
      display: inline-block;
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      text-align: center;
      border: none;
      cursor: pointer;
      font-size: 1rem;
    }

    .btn-primary {
      background: #7f5af0;
      color: #fff;
    }

    .signup-box p {
      text-align: center;
      margin-top: 15px;
      font-size: 0.9rem;
      color: #555;
    }

    .signup-box a {
      color: #7f5af0;
      text-decoration: none;
    }

    .signup-box a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="signup-box">
    <h2>Create Your Account</h2>
    <form>
      <input type="text" placeholder="Full Name" required>
      <input type="email" placeholder="Email" required>
      <input type="password" placeholder="Password" required>
      <input type="password" placeholder="Confirm Password" required>
      <button type="button" class="btn btn-primary">Sign Up</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
  </div>
</body>

</html>