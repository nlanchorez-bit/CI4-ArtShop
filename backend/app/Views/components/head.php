<?php
$title = $title ?? 'Arterion — Art Shop';
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></title>
<meta name="description" content="Arterion — Uplifting creativity of the Filipino. Art prints, originals, and commissions.">
<style>
    :root {
        --brand: #7f5af0;
        --brand-hover: #6b47e3;
        --bg: #ffffff;
        --muted: #f4f0ff;
        --text: #111;
        --border: rgba(0, 0, 0, 0.08);
    }

    /* Reset / base */
    html,
    body {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        line-height: 1.5;
        color: var(--text);
        background: var(--muted);
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 15px;
    }

    /* Global header (always on top) */
    header.site-header {
        background: var(--muted);
        padding: 16px 22px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
    }

    /* Global footer (always at bottom) */
    footer.site-footer {
        padding: 16px 20px;
        text-align: center;
        background: #fff;
        border-top: 1px solid rgba(0, 0, 0, 0.06);
        margin-top: 40px;
        color: #666;
        font-size: 14px;
    }


    .nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    nav a {
        margin-left: 15px;
        text-decoration: none;
        color: #555;
        font-weight: 600;
        font-size: 14px;
    }

    .hero {
        display: flex;
        gap: 20px;
        align-items: center;
        padding: 40px 0;
        flex-wrap: wrap;
    }

    .hero-left {
        flex: 1;
    }

    .hero h2 {
        margin: 0 0 10px;
    }

    .hero p {
        margin: 0 0 16px;
        color: #444;
    }

    /* Button base */
    .btn {
        display: inline-block;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        border: none;
    }

    /* Variants */
    .btn-primary {
        background: var(--brand);
        color: #fff;
        box-shadow: 0 2px 6px rgba(127, 90, 240, 0.2);
    }

    .btn-primary:hover {
        background: var(--brand-hover);
        box-shadow: 0 4px 10px rgba(127, 90, 240, 0.28);
    }

    .btn-secondary {
        background: #fff;
        border: 1px solid var(--border);
        color: var(--brand);
    }

    .btn-secondary:hover {
        background: #faf9ff;
        border-color: var(--brand);
    }

    .btn-link {
        background: transparent;
        color: #555;
        padding: 0 4px;
        text-decoration: underline;
        font-size: 14px;
    }

    .btn-link:hover {
        color: var(--brand);
    }

    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 10px;
    }

    .gallery img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
    }

    .features {
        display: flex;
        gap: 15px;
        padding: 30px 0;
        flex-wrap: wrap;
    }

    .card {
        background: #fff;
        padding: 15px;
        border: 1px solid #eee;
        border-radius: 8px;
        flex: 1;
        min-width: 220px;
        transition: transform .18s ease, box-shadow .18s ease;
        box-shadow: 0 6px 12px rgba(12, 12, 24, 0.04);
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 40px rgba(16, 16, 32, 0.08);
    }

    form input,
    form textarea {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }

    form textarea {
        min-height: 100px;
    }

    .tag {
        padding: 6px 8px;
        font-size: 13px;
        border-radius: 999px;
        background: #f6f5ff;
        color: var(--brand);
        border: 1px solid rgba(127, 90, 240, 0.08);
    }

    .date-pill {
        background: #fff8f0;
        color: #7a4f11;
        padding: 6px 10px;
        border-radius: 999px;
        border: 1px solid rgba(0, 0, 0, 0.03);
        font-weight: 600;
    }

    /* Roadmap-specific visual improvements */
    .page {
        font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        color: #111;
        background: linear-gradient(180deg, #fbf9ff 0%, #fff 100%);
        padding: 28px 18px;
        max-width: 1100px;
        margin: 0 auto;
    }


    /* container inside page (keeps original max-width) */
    .page>.container,
    .page .container {
        width: 100%;
        max-width: var(--max-width, 1100px);
        padding: 0;
        margin: 0 auto;
    }

    /* Roadmap layout only inside .page */
    .roadmap-layout {
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 24px;
        padding: 22px;
    }


    /* Header content that might appear at the top of the .page element */
    .page .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        padding: 18px 22px;
        background: linear-gradient(90deg, var(--muted, #f4f0ff), #fff 60%);
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
        margin-bottom: 22px;
        /* Spacing from main content */
    }

    .page .page-header .brand {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .page .logo {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        display: grid;
        place-items: center;
        font-weight: 700;
        color: #fff;
        background: var(--brand);
        box-shadow: 0 6px 20px rgba(127, 90, 240, 0.12);
    }

    .page .page-header h1 {
        font-size: 18px;
        margin: 0;
        color: var(--brand);
    }

    .page .page-header p {
        margin: 0;
        color: #666;
        font-size: 13px;
    }

    /* controls (chips, login/signup) */
    .page .controls {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .page .chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--card, #fff);
        border: 1px solid rgba(0, 0, 0, 0.04);
        padding: 8px 12px;
        border-radius: 999px;
        font-size: 13px;
        color: #444;
        box-shadow: 0 6px 14px rgba(12, 12, 24, 0.03);
    }

    /* make the progress card visually distinct like a card */
    .progress-wrap.card {
        border-radius: 12px;
        padding: 16px 18px;
        background: #fff;
        border: 1px solid rgba(0, 0, 0, 0.04);
        box-shadow: 0 8px 20px rgba(16, 16, 32, 0.04);
    }

    /* progress bar */
    .progress {
        height: 12px;
        border-radius: 999px;
        background: #f3f3f5;
        overflow: hidden;
    }

    .progress .bar {
        height: 100%;
        border-radius: 999px;
        background: linear-gradient(90deg, var(--brand) 0%, #a77bff 100%);
        transition: width .6s cubic-bezier(.2, .9, .2, 1);
    }

    /* stats badges */
    .page .stats {
        margin-top: 10px;
        display: flex;
        gap: 12px;
        align-items: center;
        color: #444;
    }

    .page .stat {
        display: inline-flex;
        gap: 8px;
        align-items: center;
        background: #fff;
        padding: 8px 10px;
        border-radius: 10px;
        border: 1px solid rgba(0, 0, 0, 0.03);
        box-shadow: 0 4px 10px rgba(12, 12, 24, 0.03);
    }

    /* timeline items: make them vertical cards with icon column */
    .items {
        margin-top: 14px;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .item {
        display: grid;
        grid-template-columns: 56px 1fr;
        gap: 16px;
        align-items: start;
        padding: 14px;
        border-radius: 12px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.95), #fff);
        border: 1px solid rgba(0, 0, 0, 0.03);
        box-shadow: 0 8px 18px rgba(16, 16, 32, 0.04);
        transition: transform .12s ease, box-shadow .12s ease;
    }

    .item:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 40px rgba(16, 16, 32, 0.06);
    }

    /* icon column sizing and centering */
    .item .icon {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        background: var(--glass, rgba(127, 90, 240, 0.06));
        display: grid;
        place-items: center;
        flex-shrink: 0;
    }

    /* content */
    .item h4 {
        margin: 0 0 8px;
        font-size: 16px;
        font-weight: 700;
        color: var(--brand);
    }

    .item .meta {
        font-size: 13px;
        color: #666;
        margin-bottom: 6px;
    }

    .item .desc {
        color: #444;
        font-size: 14px;
        line-height: 1.5;
    }

    /* tags */
    .tags {
        display: flex;
        gap: 8px;
        margin-top: 10px;
        flex-wrap: wrap;
    }

    .tag {
        font-size: 12px;
        padding: 6px 8px;
        border-radius: 999px;
        background: #f6f5ff;
        color: var(--brand);
        border: 1px solid rgba(127, 90, 240, 0.08);
        box-shadow: 0 6px 14px rgba(127, 90, 240, 0.04);
    }

    /* badges (status) */
    .badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 10px;
        border-radius: 999px;
        font-weight: 600;
        font-size: 12px;
    }

    .badge.done {
        background: rgba(40, 167, 69, 0.10);
        color: var(--success, #28a745);
        border: 1px solid rgba(40, 167, 69, 0.08);
    }

    .badge.inprogress {
        background: rgba(127, 90, 240, 0.08);
        color: var(--brand);
        border: 1px solid rgba(127, 90, 240, 0.08);
    }

    .badge.planned {
        background: rgba(0, 0, 0, 0.04);
        color: #444;
        border: 1px solid rgba(0, 0, 0, 0.03);
    }

    /* right column cards */
    .right-col .card {
        padding: 14px;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 8px 20px rgba(16, 16, 32, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.04);
    }

    .right-col h3 {
        margin: 0 0 10px;
        color: var(--brand);
    }

    /* milestone list */
    .milestone-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 6px;
    }

    .milestone {
        display: flex;
        gap: 12px;
        align-items: center;
        color: #444;
        font-size: 14px;
    }

    .ico-sm {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        display: grid;
        place-items: center;
        background: var(--muted);
        color: var(--brand);
    }

    /* small helpers */
    .time {
        font-size: 13px;
        color: #666;
    }
</style>