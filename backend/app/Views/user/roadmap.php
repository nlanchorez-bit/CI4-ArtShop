<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Roadmap | Arterion</title>
  <style>
    :root {
      --brand: #7f5af0;
      --muted: #f4f0ff;
      --bg: #fbf9ff;
      --card: #ffffff;
      --text: #111;
      --accent: #ffce67;
      --success: #28a745;
      --danger: #ef4565;
      --glass: rgba(127, 90, 240, 0.06);
      --max-width: 1100px;
    }

    * {
      box-sizing: border-box
    }

    body {
      margin: 0;
      font-family: Inter, system-ui, Segoe UI, Roboto, Arial, sans-serif;
      background: var(--bg);
      color: var(--text);
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      line-height: 1.45;
      padding: 28px 18px;
      display: flex;
      justify-content: center;
    }

    .page {
      width: 100%;
      max-width: var(--max-width);
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.9));
      border-radius: 14px;
      box-shadow: 0 10px 30px rgba(15, 15, 25, 0.06);
      overflow: hidden;
      border: 1px solid rgba(0, 0, 0, 0.04);
    }

    header {
      padding: 22px 28px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      background: linear-gradient(90deg, var(--muted), #fff 60%);
    }

    header .brand {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .logo {
      width: 48px;
      height: 48px;
      border-radius: 10px;
      background: var(--brand);
      display: grid;
      place-items: center;
      color: white;
      font-weight: 700;
      font-size: 18px;
      box-shadow: 0 4px 14px rgba(127, 90, 240, 0.12);
    }

    header h1 {
      font-size: 18px;
      margin: 0;
      color: var(--brand);
      letter-spacing: -0.2px;
    }

    header p {
      margin: 0;
      font-size: 13px;
      color: #666
    }

    .controls {
      display: flex;
      gap: 10px;
      align-items: center;
    }

    .chip {
      background: var(--card);
      border: 1px solid rgba(0, 0, 0, 0.04);
      padding: 8px 12px;
      border-radius: 999px;
      font-size: 13px;
      color: #444;
      display: inline-flex;
      gap: 8px;
      align-items: center;
      cursor: pointer;
    }

    main.container {
      display: grid;
      grid-template-columns: 1fr 360px;
      gap: 24px;
      padding: 26px;
    }

    /* Timeline column */
    .timeline {
      background: transparent;
      padding: 8px 6px 18px 18px;
    }

    .progress-wrap {
      margin-bottom: 18px;
    }

    .progress {
      background: rgba(0, 0, 0, 0.06);
      height: 12px;
      border-radius: 999px;
      overflow: hidden;
    }

    .progress .bar {
      height: 100%;
      background: linear-gradient(90deg, var(--brand), #a77bff);
      width: 30%;
      /* change to reflect progress */
      display: block;
      transition: width .7s cubic-bezier(.2, .9, .2, 1);
    }

    .stats {
      display: flex;
      gap: 12px;
      margin-top: 10px;
      font-size: 13px;
      color: #555;
      align-items: center;
    }

    .stat {
      background: var(--card);
      padding: 8px 10px;
      border-radius: 10px;
      border: 1px solid rgba(0, 0, 0, 0.03);
      display: inline-flex;
      gap: 8px;
      align-items: center;
    }

    /* timeline list */
    .items {
      margin-top: 8px;
      display: flex;
      flex-direction: column;
      gap: 14px;
    }

    .item {
      display: grid;
      grid-template-columns: 48px 1fr;
      gap: 14px;
      align-items: start;
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.95));
      padding: 14px;
      border-radius: 12px;
      border: 1px solid rgba(0, 0, 0, 0.03);
      transition: transform .18s, box-shadow .18s;
    }

    .item:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 30px rgba(16, 16, 32, 0.06);
    }

    .item .icon {
      width: 48px;
      height: 48px;
      border-radius: 10px;
      background: var(--glass);
      display: grid;
      place-items: center;
      align-self: center;
      flex-shrink: 0;
    }

    .item h4 {
      margin: 0 0 6px 0;
      font-size: 15px;
    }

    .meta {
      font-size: 13px;
      color: #666;
      margin-bottom: 8px;
    }

    .tags {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
      margin-top: 6px;
    }

    .tag {
      padding: 6px 8px;
      font-size: 12px;
      border-radius: 999px;
      background: #f6f5ff;
      color: var(--brand);
      border: 1px solid rgba(127, 90, 240, 0.08);
    }

    .badge {
      display: inline-flex;
      gap: 8px;
      align-items: center;
      font-size: 12px;
      padding: 6px 8px;
      border-radius: 999px;
    }

    .done {
      background: rgba(40, 167, 69, 0.12);
      color: var(--success);
      border: 1px solid rgba(40, 167, 69, 0.12)
    }

    .inprogress {
      background: rgba(127, 90, 240, 0.08);
      color: var(--brand)
    }

    .planned {
      background: rgba(0, 0, 0, 0.04);
      color: #444
    }

    .right-col {
      padding: 12px;
      position: sticky;
      top: 22px;
      align-self: start;
      height: fit-content;
    }

    .card {
      background: var(--card);
      padding: 14px;
      border-radius: 12px;
      border: 1px solid rgba(0, 0, 0, 0.04);
      margin-bottom: 16px;
    }

    .card h3 {
      margin: 0 0 8px 0;
      color: var(--brand)
    }

    .milestone-list {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-top: 8px;
    }

    .milestone {
      display: flex;
      gap: 10px;
      align-items: center;
      font-size: 14px;
      color: #444;
    }

    .ico-sm {
      width: 34px;
      height: 34px;
      border-radius: 8px;
      display: grid;
      place-items: center;
      background: var(--muted);
      flex-shrink: 0;
      color: var(--brand);
    }

    footer.page-foot {
      padding: 16px 22px;
      background: linear-gradient(180deg, #fff, rgba(255, 255, 255, 0.98));
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 12px;
    }

    footer p {
      margin: 0;
      color: #666;
      font-size: 13px
    }

    /* responsiveness */
    @media (max-width:980px) {
      main.container {
        grid-template-columns: 1fr;
        padding: 18px;
      }

      .right-col {
        position: static;
      }
    }

    /* small helper styles for icons & timestamps */
    .time {
      font-size: 12px;
      color: #888
    }

    .desc {
      color: #444;
      font-size: 14px
    }
  </style>
</head>

<body>
  <div class="page" role="main" aria-labelledby="roadmap-title">
    <header>
      <div class="brand" aria-hidden="false">
        <div class="logo">A</div>
        <div>
          <h1 id="roadmap-title">Arterion Roadmap</h1>
          <p>Roadmap for Website Development.</p>
        </div>
      </div>

      <div class="controls" aria-hidden="false">
        <div class="chip" title="Current progress">
          <!-- small spark icon (svg) -->
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M12 2v6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 16v6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M4 10h6M14 10h6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <strong style="font-weight:600">Roadmap</strong>
        </div>
        <div class="chip" title="Filter">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M4 6h16M7 12h10M10 18h4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
          </svg>
          Filter
        </div>
      </div>
    </header>

    <main class="container" aria-label="Timeline and details">
      <!-- LEFT: timeline -->
      <section class="timeline" aria-labelledby="timeline-heading">
        <div class="progress-wrap card" role="region" aria-label="Overall progress">
          <div style="display:flex;justify-content:space-between;align-items:center;">
            <div>
              <strong>Website Development Progress</strong>
              <div class="time">30% complete</div>
            </div>
            <div class="time">Updated: today</div>
          </div>
          <div style="margin-top:12px;">
            <div class="progress" aria-hidden="true">
              <span class="bar" style="width:30%"></span>
            </div>
            <div class="stats">
              <div class="stat">✅ Completed <strong style="margin-left:6px;">2</strong></div>
              <div class="stat">🔧 In Progress <strong style="margin-left:6px;">1</strong></div>
              <div class="stat">📝 Planned <strong style="margin-left:6px;">8</strong></div>
            </div>
          </div>
        </div>

        <div class="items" id="roadmap-items">
          <!-- Item: Login (done) -->
          <article class="item" aria-labelledby="mi-login">
            <div class="icon" aria-hidden="true">
              <!-- check icon -->
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                <rect width="24" height="24" rx="6" fill="var(--success)" opacity="0.08"></rect>
                <path d="M6 12l3 3 9-9" stroke="#28a745" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <div>
              <h4 id="mi-login">Login Page — <span class="badge done">Completed</span></h4>
              <div class="meta">Status: <strong>Done</strong> — Implemented responsive frontend.</div>
              <div class="desc">The simple, accessible login UI is implemented and styled to match the brand. (login.html)</div>
              <div class="tags" aria-hidden="true">
                <span class="tag">UX</span><span class="tag">Responsive</span><span class="tag">Accessibility</span>
              </div>
            </div>
          </article>

          <!-- Item: Signup (done) -->
          <article class="item" aria-labelledby="mi-signup">
            <div class="icon" aria-hidden="true">
              <!-- user-add icon -->
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                <rect width="24" height="24" rx="6" fill="var(--success)" opacity="0.08"></rect>
                <path d="M6 12l3 3 9-9" stroke="#28a745" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <div>
              <h4 id="mi-signup">Signup Page — <span class="badge done">Completed</span></h4>
              <div class="meta">Status: <strong>Done</strong> — Signup UI built and linked to login page.</div>
              <div class="desc">Frontend only. Fields: Full name, Email, Password, Confirm password. (signup.html)</div>
              <div class="tags" aria-hidden="true"><span class="tag">Auth</span><span class="tag">UI</span></div>
            </div>
          </article>

          <!-- Item: Moodboard (in progress) -->
          <article class="item" aria-labelledby="mi-moodboard">
            <div class="icon" aria-hidden="true">
              <!-- palette -->
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                <rect width="24" height="24" rx="6" fill="#f4f0ff"></rect>
                <path d="M12 21a6 6 0 100-12 3 3 0 113 3 3 3 0 01-3 3" stroke="#ef4565" stroke-width="1.4" stroke-linecap="round" />
              </svg>
            </div>
            <div>
              <h4 id="mi-moodboard">Moodboard Page — <span class="badge inprogress">In progress</span></h4>
              <div class="meta">Status: <strong>In progress</strong> — Grid and palette ready; fine-tuning images and copy.</div>
              <div class="desc">Moodboard for inspiration images, color palettes, textures, and brand references. (moodboard.php)</div>
              <div class="tags" aria-hidden="true"><span class="tag">Design</span><span class="tag">Brand</span></div>
            </div>
          </article>

          <!-- Item: Gallery (planned) -->
          <article class="item" aria-labelledby="mi-gallery">
            <div class="icon" aria-hidden="true">
              <!-- gallery icon -->
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                <rect width="24" height="24" rx="6" fill="#fff8f0"></rect>
                <path d="M3 7h18M3 17h18" stroke="#ffb86b" stroke-width="1.4" stroke-linecap="round" />
                <path d="M7 7v10" stroke="#ffb86b" stroke-width="1.4" stroke-linecap="round" />
              </svg>
            </div>
            <div>
              <h4 id="mi-gallery">Gallery & Art Grid — <span class="badge planned">Planned</span></h4>
              <div class="meta">Status: <strong>Planned</strong> — Add filters, artist pages, and lightbox.</div>
              <div class="desc">Responsive masonry/grid, artist attribution, filtering by medium, and image optimization.</div>
              <div class="tags" aria-hidden="true"><span class="tag">Gallery</span><span class="tag">Performance</span></div>
            </div>
          </article>

          <!-- Item: Shop Catalog (planned) -->
          <article class="item" aria-labelledby="mi-shop">
            <div class="icon" aria-hidden="true">
              <!-- shopping cart -->
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                <rect width="24" height="24" rx="6" fill="#fff"></rect>
                <path d="M6 6h14l-1.5 9h-11z" stroke="#7f5af0" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                <circle cx="10" cy="19" r="1" fill="#7f5af0" />
                <circle cx="17" cy="19" r="1" fill="#7f5af0" />
              </svg>
            </div>
            <div>
              <h4 id="mi-shop">Shop & Catalog — <span class="badge planned">Planned</span></h4>
              <div class="meta">Status: <strong>Planned</strong> — Product pages, variants, and cart UX.</div>
              <div class="desc">Add product detail pages, image galleries, variant selects, and wishlist functionality.</div>
              <div class="tags" aria-hidden="true"><span class="tag">E-commerce</span><span class="tag">UX</span></div>
            </div>
          </article>

          <!-- NEW: Artist Profiles & Portfolios (planned) -->
          <article class="item" aria-labelledby="mi-artist">
            <div class="icon" aria-hidden="true">
              <!-- artist/profile icon -->
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                <rect width="24" height="24" rx="6" fill="#fff8ff"></rect>
                <path d="M12 12a3 3 0 100-6 3 3 0 000 6z" stroke="#7f5af0" stroke-width="1.3" stroke-linecap="round" />
                <path d="M5 20v-.5A4.5 4.5 0 019.5 15h5A4.5 4.5 0 0119 19.5V20" stroke="#7f5af0" stroke-width="1.2" stroke-linecap="round" />
              </svg>
            </div>
            <div>
              <h4 id="mi-artist">Artist Profiles & Portfolios — <span class="badge planned">Planned</span></h4>
              <div class="meta">Status: <strong>Planned</strong> — CRUD for artist profiles & portfolio items.</div>
              <div class="desc">Artists can create/edit public profiles, upload portfolio pieces, and manage visibility. Suggested fields: name, bio, avatar, portfolio items, social links, verified flag.</div>
              <div class="tags" aria-hidden="true"><span class="tag">Creators</span><span class="tag">CRUD</span></div>
            </div>
          </article>

          <!-- NEW: Artwork / Product Catalog (planned) -->
          <article class="item" aria-labelledby="mi-product">
            <div class="icon" aria-hidden="true">
              <!-- product icon -->
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                <rect width="24" height="24" rx="6" fill="#fff"></rect>
                <path d="M4 10h16M7 10v6M17 10v6" stroke="#a77bff" stroke-width="1.4" />
              </svg>
            </div>
            <div>
              <h4 id="mi-product">Artwork / Product Catalog — <span class="badge planned">Planned</span></h4>
              <div class="meta">Status: <strong>Planned</strong> — CRUD for products, variants, and inventory.</div>
              <div class="desc">Structured product pages for prints & originals with variants (size, format), inventory handling, and product images. Suggested models: Product, Variant, ProductImage.</div>
              <div class="tags" aria-hidden="true"><span class="tag">E-commerce</span><span class="tag">Data</span></div>
            </div>
          </article>

          <!-- NEW: Commissions & Order Requests (planned) -->
          <article class="item" aria-labelledby="mi-commission">
            <div class="icon" aria-hidden="true">
              <!-- commission/messages icon -->
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                <rect width="24" height="24" rx="6" fill="#fff8f0"></rect>
                <path d="M4 7h10v6H4z" stroke="#ffb86b" stroke-width="1.2" stroke-linecap="round" />
                <path d="M15 8l4-1v6" stroke="#7f5af0" stroke-width="1.2" stroke-linecap="round" />
              </svg>
            </div>
            <div>
              <h4 id="mi-commission">Commissions & Order Requests — <span class="badge planned">Planned</span></h4>
              <div class="meta">Status: <strong>Planned</strong> — CRUD flow for commission briefs, quotes, and delivery.</div>
              <div class="desc">Customer submits a commission brief, artist/admin can quote, update status, upload drafts, and mark delivered — includes messaging and attachments.</div>
              <div class="tags" aria-hidden="true"><span class="tag">Requests</span><span class="tag">Workflow</span></div>
            </div>
          </article>

        </div> <!-- end items -->
      </section>

      <!-- RIGHT: details & quick actions -->
      <aside class="right-col" aria-labelledby="side-heading">
        <div class="card">
          <h3 id="side-heading">Quick Milestones</h3>
          <div class="milestone-list">
            <div class="milestone">
              <div class="ico-sm">✅</div>
              <div>Login page (done)</div>
            </div>
            <div class="milestone">
              <div class="ico-sm">✅</div>
              <div>Signup page (done)</div>
            </div>
            <div class="milestone">
              <div class="ico-sm">🎨</div>
              <div>Moodboard (in progress)</div>
            </div>
            <div class="milestone">
              <div class="ico-sm">🖼️</div>
              <div>Gallery grid (planned)</div>
            </div>
            <div class="milestone">
              <div class="ico-sm">🛒</div>
              <div>Shop & checkout (planned)</div>
            </div>
            <div class="milestone">
              <div class="ico-sm">👩‍🎨</div>
              <div>Artist Profiles (planned)</div>
            </div>
            <div class="milestone">
              <div class="ico-sm">📦</div>
              <div>Product Catalog (planned)</div>
            </div>
            <div class="milestone">
              <div class="ico-sm">✉️</div>
              <div>Commissions (planned)</div>
            </div>
          </div>
        </div>

        <div class="card" aria-labelledby="roles">
          <h3 id="roles">CRUD Functionalities</h3>
          <p style="margin:6px 0 0 0;color:#555;font-size:14px">
            Proposed Processes that uses CRUD:
          </p>
          <ul style="margin-top:10px;padding-left:18px;color:#444">
            <li>Artist Profiles & Portfolios — Enable artists to create/manage their profiles and showcase works.</li>
            <li>Artwork / Product Catalog — Shop functionality</li>
            <li>Commissions & Order Requests Management — Let customers request commissions and let artists/admin manage requests</li>
          </ul>
        </div>

        <div class="card" aria-labelledby="notes">
          <h3 id="notes">Notes & Next Steps</h3>
          <ol style="margin:10px 0 0 0;color:#444">
            <li>Fix routing for Login, Signup</li>
            <li>Fragmentation.</li>
            <li>3 Functionality with CRUD (artist profiles, product catalog, commissions).</li>
            <li>Test Development Branch.</li>
          </ol>
        </div>

      </aside>
    </main>

    <footer class="page-foot" role="contentinfo">
      <p>&copy; <span id="year"></span> Arterion — Uplifting creativity of the Filipino</p>
      <div style="display:flex;gap:10px;align-items:center">
        <a href="moodboard.php" class="chip" style="background:transparent;border:1px solid rgba(0,0,0,0.04)">Open Moodboard</a>
        <a href="landing.php" class="chip" style="background:var(--muted)">Back to site</a>
      </div>
    </footer>
  </div>
</body>

</html>