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
        --bg: #ffffff;
        --muted: #f4f0ff;
        --text: #111;
    }

    /* Reset / base */
    html,
    body {
        margin: 0;
        padding: 0
    }

    body {
        font-family: Arial, sans-serif;
        line-height: 1.5;
        color: var(--text);
        background: var(--muted)
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 15px
    }

    header {
        background: #f4f0ff;
        padding: 20px
    }

    .nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px
    }

    nav a {
        margin-left: 15px;
        text-decoration: none;
        color: #555;
        font-weight: 600;
        font-size: 14px
    }

    .hero {
        display: flex;
        gap: 20px;
        align-items: center;
        padding: 40px 0;
        flex-wrap: wrap
    }

    .hero-left {
        flex: 1
    }

    .hero h2 {
        margin: 0 0 10px
    }

    .hero p {
        margin: 0 0 16px;
        color: #444
    }

    .btn {
        display: inline-block;
        padding: 8px 14px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
        cursor: pointer
    }

    .btn-primary {
        background: var(--brand);
        color: #fff
    }

    .btn-secondary {
        background: #fff;
        border: 1px solid rgba(0, 0, 0, 0.06);
        color: var(--brand);
        padding: 7px 12px;
        border-radius: 8px
    }

    .btn-link {
        background: transparent;
        color: #555;
        padding: 0 6px;
        text-decoration: underline;
        font-size: 14px
    }

    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 10px
    }

    .gallery img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px
    }

    .features {
        display: flex;
        gap: 15px;
        padding: 30px 0;
        flex-wrap: wrap
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
        margin-bottom: 10px
    }

    form textarea {
        min-height: 100px
    }

    .tag {
        padding: 6px 8px;
        font-size: 13px;
        border-radius: 999px;
        background: #f6f5ff;
        color: var(--brand);
        border: 1px solid rgba(127, 90, 240, 0.08)
    }

    .date-pill {
        background: #fff8f0;
        color: #7a4f11;
        padding: 6px 10px;
        border-radius: 999px;
        border: 1px solid rgba(0, 0, 0, 0.03);
        font-weight: 600
    }

    footer {
        padding: 20px 0;
        border-top: 1px solid #eee;
        margin-top: 30px;
        text-align: center;
        color: #666
    }

    @media (max-width:760px) {
        .features {
            flex-direction: column
        }

        .hero {
            padding: 28px 0
        }
    }
</style>