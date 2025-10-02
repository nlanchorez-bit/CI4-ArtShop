<?php
// landing.php
?>
<!doctype html>
<html lang="en">

<head>
  <?php
  // optional: override page title
  $title = 'Arterion — Art Shop';
  include __DIR__ . '/../components/head.php';
  ?>
</head>

<body>

  <?php
  // main header (includes login / signup buttons)
  include __DIR__ . '/../components/header.php';
  ?>

  <main class="container">
    <?php
    // hero / CTA section
    include __DIR__ . '/../components/cta.php';
    ?>

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
        <?php
        // include the three named card fragments (each sets $product then includes product_card.php)
        include __DIR__ . '/../components/cards/card_prints.php';
        include __DIR__ . '/../components/cards/card_originals.php';
        include __DIR__ . '/../components/cards/card_commissions.php';
        ?>
      </div>
    </section>

    <section id="contact">
      <h3>Contact</h3>
      <form action="mailto:hello@arterionph.com" method="post" enctype="text/plain">
        <input type="text" name="name" placeholder="Your name" required>
        <input type="email" name="email" placeholder="Your email" required>
        <textarea name="message" placeholder="Your message" required></textarea>

        <?php
        // reuse the primary button fragment for the form submit button (renders an <a>, so we use a regular button too)
        // Keep the included button for visual consistency; also provide an actual submit button.
        $text = 'Send Message';
        $href = '#';
        include __DIR__ . '/../components/buttons/button_primary.php';
        ?>
        <button type="submit" style="display:inline-block;margin-left:8px;padding:8px 14px;border-radius:6px;border:none;background:var(--brand);color:#fff;font-weight:bold;cursor:pointer;">Send</button>
      </form>
    </section>
  </main>

  <?php
  include __DIR__ . '/../components/footer.php';
  ?>

  <script>
    // header/footer components use PHP date() for year, but keep this fallback in case of static footer.
    if (document.getElementById('year')) {
      document.getElementById('year').textContent = new Date().getFullYear();
    }
  </script>
</body>

</html>