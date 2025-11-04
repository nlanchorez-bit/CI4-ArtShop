<?php // app/Views/user/roadmap.php 
?>
<!doctype html>
<html lang="en">

<?= view('components/head', ['title' => 'Roadmap | Arterion']) ?>

<body>
  <div class="page" role="main" aria-labelledby="roadmap-title">

    <?= view('components/header') ?>

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

    <?= view('components/footer') ?>

  </div>

  <script>
    document.getElementById("year") && (document.getElementById("year").textContent = new Date().getFullYear());
  </script>
</body>

</html>