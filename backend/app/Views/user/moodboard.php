<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Moodboard | Arterion</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f4f0ff;
      color: #111;
    }

    header {
      background: #fff;
      padding: 15px 20px;
      border-bottom: 1px solid #eee;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header h1 {
      margin: 0;
      color: #7f5af0;
    }

    nav a {
      margin-left: 15px;
      text-decoration: none;
      color: #555;
      font-weight: bold;
    }

    .container {
      max-width: 1000px;
      margin: 0 auto;
      padding: 30px 15px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #7f5af0;
    }

    .moodboard-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 15px;
    }

    .moodboard-grid img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      border-radius: 10px;
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    }

    .palette {
      margin-top: 40px;
      text-align: center;
    }

    .palette h3 {
      margin-bottom: 10px;
      color: #333;
    }

    .colors {
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .color-box {
      width: 60px;
      height: 60px;
      border-radius: 8px;
      border: 1px solid #ddd;
    }

    footer {
      text-align: center;
      padding: 20px;
      border-top: 1px solid #eee;
      margin-top: 40px;
      color: #666;
    }
  </style>
</head>

<body>
  <header>
    <h1>Arterion</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="moodboard.html">Moodboard</a>
      <a href="roadmap.html">Roadmap</a>
    </nav>
  </header>

  <main class="container">
    <h2>Arterion Moodboard</h2>
    <p style="text-align:center;max-width:700px;margin:0 auto 30px;">
      A collection of visuals, textures, and tones that capture the essence of Arterion’s creative identity.
      This moodboard guides the style and inspiration for artworks, events, and branding.
    </p>

    <div class="moodboard-grid">
      <img src="https://www.artsoullifemagazine.com/wp-content/uploads/2023/09/Image-1-4.jpg" alt="Inspiration 1">
      <img src="https://as2.ftcdn.net/jpg/05/69/14/69/1000_F_569146930_KuKgpoSHqyPPKDJWz6sNgjsa9Q3hAicg.jpg" alt="Inspiration 2">
      <img src="https://wallpaperaccess.com/full/3558785.jpg" alt="Inspiration 3">
      <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c" alt="Inspiration 4">
      <img src="https://pinaywise.com/wp-content/uploads/2024/03/Traditional-Arts-In-The-Philippines.jpg" alt="Inspiration 5">
      <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7" alt="Inspiration 6">
    </div>

    <div class="palette">
      <h3>Color Palette</h3>
      <div class="colors">
        <div class="color-box" style="background:#7f5af0;" title="#7f5af0"></div>
        <div class="color-box" style="background:#f4f0ff;" title="#f4f0ff"></div>
        <div class="color-box" style="background:#ffce67;" title="#ffce67"></div>
        <div class="color-box" style="background:#ef4565;" title="#ef4565"></div>
        <div class="color-box" style="background:#111;" title="#111111"></div>
      </div>
    </div>
  </main>

  <footer>
    &copy; <span id="year"></span> Arterion. All rights reserved.
  </footer>

  <script>
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>
</body>

</html>