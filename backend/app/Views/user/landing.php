<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Arterion — Art Shop</title>
  <meta name="description" content="Arterion — Uplifting creativity of the Filipino. Art prints, originals, and commissions.">
  <style>
    body{margin:0;font-family:Arial, sans-serif;line-height:1.5;color:#111}
    header{background:#f4f0ff;padding:20px}
    .container{max-width:900px;margin:0 auto;padding:0 15px}
    .nav{display:flex;align-items:center;justify-content:space-between}
    nav a{margin-left:15px;text-decoration:none;color:#555}
    .hero{display:flex;gap:20px;align-items:center;padding:40px 0;flex-wrap:wrap}
    .hero-left{flex:1}
    .hero h2{margin:0 0 10px}
    .btn{display:inline-block;padding:8px 14px;border-radius:6px;text-decoration:none;font-weight:bold}
    .btn-primary{background:#7f5af0;color:#fff}
    .gallery{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:10px}
    .gallery img{width:100%;height:200px;object-fit:cover;border-radius:8px}
    .features{display:flex;gap:15px;padding:30px 0;flex-wrap:wrap}
    .card{background:#fff;padding:15px;border:1px solid #eee;border-radius:8px;flex:1;min-width:220px}
    footer{padding:20px 0;border-top:1px solid #eee;margin-top:30px;text-align:center;color:#666}
    form input, form textarea{width:100%;padding:10px;border-radius:6px;border:1px solid #ccc;margin-bottom:10px}
    form textarea{min-height:100px}
  </style>
</head>
<body>
  <header>
    <div class="container nav">
      <h1>Arterion</h1>
      <nav>
        <a href="#gallery">Gallery</a>
        <a href="#shop">Shop</a>
        <a href="#contact">Contact</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <section class="hero">
      <div class="hero-left">
        <h2>Original art, prints, and commissions</h2>
        <p>Celebrate Filipino creativity through unique paintings, digital prints, and custom commissions.</p>
        <a class="btn btn-primary" href="#gallery">Explore Gallery</a>
      </div>
      <div class="hero-right" style="flex:0 0 300px">
        <img src="https://cdn.shopify.com/s/files/1/0603/3745/5243/files/38.png?v=1675148744" alt="featured" style="width:100%;border-radius:8px">
      </div>
    </section>

    <section id="gallery">
      <h3>Gallery</h3>
      <div class="gallery">
        <img src="https://upload.wikimedia.org/wikipedia/commons/7/75/Vincent_van_Gogh_-_Road_with_Cypress_and_Star_-_c._12-15_May_1890.jpg" alt="art">
        <img src="https://aesthesy.com/cdn/shop/files/custom_resized_758ec37b-c3c7-4e02-8c14-9d3a25e9d64d.jpg?v=1692844426&width=1100" alt="art">
        <img src="https://i.etsystatic.com/5150206/r/il/1e331b/3717819675/il_570xN.3717819675_s1e1.jpg" alt="art">
      </div>
    </section>

    <section id="shop">
      <h3>Shop</h3>
      <div class="features">
        <div class="card">
          <h4>Prints</h4>
          <p>High-quality art prints in multiple sizes.</p>
        </div>
        <div class="card">
          <h4>Originals</h4>
          <p>One-of-a-kind works by Filipino artists.</p>
        </div>
        <div class="card">
          <h4>Commissions</h4>
          <p>Custom artwork for homes, offices, and gifts.</p>
        </div>
      </div>
    </section>

    <section id="contact">
      <h3>Contact</h3>
      <form>
        <input type="text" name="name" placeholder="Your name">
        <input type="email" name="email" placeholder="Your email">
        <textarea name="message" placeholder="Your message"></textarea>
        <button class="btn btn-primary" type="button">Send Message</button>
      </form>
    </section>
  </main>

  <footer>
    &copy; <span id="year"></span> Arterion. All rights reserved.
  </footer>

  <script>
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>
</body>
</html>
