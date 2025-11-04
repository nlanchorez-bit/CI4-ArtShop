<?php // app/Views/user/moodboard.php 
?>
<!doctype html>
<html lang="en">

<head>
  <?php $title = 'Moodboard | Arterion'; ?>
  <?= view('components/head') ?>

  <!-- page-specific styles -->
  <style>
    /* container already defined in head, but we tighten for this page */
    .moodboard-wrap {
      max-width: 1100px;
      margin: 0 auto;
      padding: 36px 18px;
    }

    .mb-8 {
      margin-bottom: 2rem;
    }

    .text-muted {
      color: #666;
    }

    h1.page-title {
      font-size: 1.5rem;
      margin: 0 0 .25rem 0;
      color: var(--brand);
      font-weight: 700;
    }

    h2.section-title {
      font-size: 1.05rem;
      margin: 0 0 .75rem 0;
      color: #222;
      font-weight: 600;
    }

    .moodboard-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 14px;
    }

    .moodboard-grid img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      border-radius: 10px;
      box-shadow: 0 6px 18px rgba(12, 12, 24, 0.06);
      transition: transform .18s ease, box-shadow .18s ease;
    }

    .moodboard-grid img:hover {
      transform: translateY(-6px);
      box-shadow: 0 18px 40px rgba(16, 16, 32, 0.08);
    }

    .colors {
      display: flex;
      justify-content: center;
      gap: 12px;
      flex-wrap: wrap;
      margin-top: 12px;
    }

    .color-box {
      width: 64px;
      height: 64px;
      border-radius: 8px;
      border: 1px solid rgba(0, 0, 0, 0.06);
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.04);
    }

    .swatch-grid {
      display: grid;
      gap: 10px;
      grid-template-columns: repeat(3, 1fr);
    }

    .swatch {
      height: 48px;
      border-radius: 8px;
      border: 1px solid rgba(0, 0, 0, 0.04);
    }

    .card-grid {
      display: grid;
      gap: 12px;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    }

    /* small screens */
    @media (max-width:760px) {
      .moodboard-wrap {
        padding: 20px 12px;
      }

      .moodboard-grid img {
        height: 160px;
      }

      .color-box {
        width: 48px;
        height: 48px;
      }
    }
  </style>
</head>

<body>
  <?= view('components/header') ?>

  <main class="moodboard-wrap" role="main" aria-labelledby="moodboard-title">
    <header class="mb-8">
      <h1 id="moodboard-title" class="page-title">Arterion Moodboard</h1>
      <p class="text-muted" style="max-width:760px;">
        A curated collection of visuals, textures, and colors that capture Arterion’s creative voice.
        Use this as a reference for UI, artwork styling, marketing, and product photography direction.
      </p>
    </header>

    <!-- Color system section (inspired by reference) -->
    <section class="mb-8" aria-labelledby="color-system">
      <h2 id="color-system" class="section-title">Color system</h2>
      <p class="text-muted" style="margin-bottom:12px;">Primary brand color, supporting neutrals, and accent tones — shown with hex examples.</p>

      <div class="swatch-grid mb-4" style="grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));">
        <div>
          <div class="swatch" style="background:#7f5af0;"></div>
          <p style="margin:.5rem 0 0 0;font-weight:600">Brand Purple</p>
          <div class="text-muted" style="font-size:13px;">#7f5af0</div>
        </div>

        <div>
          <div class="swatch" style="background:#f4f0ff;"></div>
          <p style="margin:.5rem 0 0 0;font-weight:600">Soft Lavender</p>
          <div class="text-muted" style="font-size:13px;">#f4f0ff</div>
        </div>

        <div>
          <div class="swatch" style="background:#ffce67;"></div>
          <p style="margin:.5rem 0 0 0;font-weight:600">Warm Amber</p>
          <div class="text-muted" style="font-size:13px;">#ffce67</div>
        </div>

        <div>
          <div class="swatch" style="background:#ef4565;"></div>
          <p style="margin:.5rem 0 0 0;font-weight:600">Accent Rose</p>
          <div class="text-muted" style="font-size:13px;">#ef4565</div>
        </div>

        <div>
          <div class="swatch" style="background:#111111;"></div>
          <p style="margin:.5rem 0 0 0;font-weight:600">Deep Graphite</p>
          <div class="text-muted" style="font-size:13px;">#111111</div>
        </div>
      </div>
    </section>

    <!-- Typography & Buttons (inspired by reference) -->
    <section class="mb-8" aria-labelledby="typography">
      <h2 id="typography" class="section-title">Typography & Buttons</h2>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:18px;align-items:start">
        <div>
          <p class="text-muted" style="margin-bottom:6px;font-size:13px;">Heading font</p>
          <div style="font-family: Georgia, 'Times New Roman', serif; font-size:20px; font-weight:700; margin-bottom:8px;">Playfair Display — Heading example</div>
          <p style="font-size:14px;color:#444;">Use a refined serif for hero headings and feature titles to bring a handcrafted feel.</p>
        </div>

        <div>
          <p class="text-muted" style="margin-bottom:6px;font-size:13px;">Body font</p>
          <div style="font-family: Arial, sans-serif; font-size:14px; color:#333;">Lato / Arial — Body text example that demonstrates readable copy for longer paragraphs.</div>
          <p style="margin-top:8px;font-size:13px;color:#666;">Prefer 14–16px body size for web; line-height 1.4–1.6 for comfortable reading.</p>
        </div>
      </div>

      <div style="margin-top:14px">
        <p class="text-muted" style="margin-bottom:8px;font-size:13px;">Buttons (visual examples)</p>
        <div style="display:flex;gap:12px;flex-wrap:wrap;align-items:center">
          <?= view('components/buttons/button_primary', ['text' => 'Primary', 'href' => '#']) ?>
          <?= view('components/buttons/button_secondary', ['text' => 'Secondary', 'href' => '#']) ?>
          <?= view('components/buttons/button_link', ['text' => 'Link', 'href' => '#']) ?>
          <?= view('components/buttons/button_border', ['text' => 'Border', 'href' => '#']) ?>
        </div>
      </div>
    </section>

    <!-- Mood images grid (your original visuals) -->
    <section class="mb-8" aria-labelledby="images">
      <h2 id="images" class="section-title">Image inspirations</h2>
      <div class="moodboard-grid" aria-live="polite">
        <img src="https://www.artsoullifemagazine.com/wp-content/uploads/2023/09/Image-1-4.jpg" alt="Inspiration 1">
        <img src="https://as2.ftcdn.net/jpg/05/69/14/69/1000_F_569146930_KuKgpoSHqyPPKDJWz6sNgjsa9Q3hAicg.jpg" alt="Inspiration 2">
        <img src="https://wallpaperaccess.com/full/3558785.jpg" alt="Inspiration 3">
        <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c" alt="Inspiration 4">
        <img src="https://pinaywise.com/wp-content/uploads/2024/03/Traditional-Arts-In-The-Philippines.jpg" alt="Inspiration 5">
        <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7" alt="Inspiration 6">
      </div>
    </section>

    <!-- Card samples -->
    <section class="mb-8" aria-labelledby="cards">
      <h2 id="cards" class="section-title">Card samples</h2>
      <div class="card-grid">
        <?= view('components/cards/card_prints', [
          'title' => 'Sunrise Print',
          'excerpt' => 'High-quality giclée print on archival paper.',
          'image' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=1400&auto=format&fit=crop'
        ]) ?>

        <?= view('components/cards/card_originals', [
          'title' => 'Aurora (Original)',
          'excerpt' => 'Original acrylic on canvas, signed by artist.',
          'image' => 'https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?q=80&w=1400&auto=format&fit=crop'
        ]) ?>

        <?= view('components/cards/card_commissions', [
          'title' => 'Commission (Basic)',
          'excerpt' => 'Request a custom piece. Provide references and size.',
          'image' => ''
        ]) ?>
      </div>
    </section>

    <!-- Logos preview -->
    <section class="mb-8" aria-labelledby="logos">
      <h2 id="logos" class="section-title">Logos</h2>
      <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:12px;">
        <div style="background:#fff;padding:14px;border-radius:10px;text-align:center;box-shadow:0 6px 18px rgba(12,12,24,0.04);">
          <div style="width:120px;height:120px;margin:0 auto 12px;border-radius:999px;overflow:hidden;display:grid;place-items:center;background:#fff;">
            <img src="/assets/logo-main.svg" alt="Arterion main logo" style="width:90px;height:90px;object-fit:contain;">
          </div>
          <div style="font-weight:600">Primary — Circle</div>
        </div>

        <div style="background:#fff;padding:14px;border-radius:10px;text-align:center;box-shadow:0 6px 18px rgba(12,12,24,0.04);">
          <div style="width:120px;height:120px;margin:0 auto 12px;border-radius:10px;overflow:hidden;display:grid;place-items:center;background:#fff;">
            <img src="/assets/logo-main.svg" alt="Arterion square logo" style="width:90px;height:90px;object-fit:contain;">
          </div>
          <div style="font-weight:600">Primary — Square</div>
        </div>
      </div>
    </section>
  </main>

  <?= view('components/footer', [
    'copyright' => 'Arterion — Uplifting creativity of the Filipino',
    'links' => [
      ['label' => 'Moodboard', 'href' => '/moodboard'],
      ['label' => 'Roadmap', 'href' => '/roadmap'],
      ['label' => 'Home', 'href' => '/landing'],
    ]
  ]) ?>

  <script>
    // ensure footer year updates if footer uses <span id="year">
    document.getElementById('year') && (document.getElementById('year').textContent = new Date().getFullYear());
  </script>
</body>

</html>