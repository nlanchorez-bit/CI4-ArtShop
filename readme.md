<a name="readme-top"></a>

<br/>
<br/>

<div align="center">
  <a href="https://github.com/nlanchorez-bit/CI4-ArtShop.git">
    <img src="./assets/img/nyebe_white.png" alt="Nyebe" width="130" height="100">
  </a>
<!-- * Title Section -->
  <h3 align="center">CI4 Niko's Artshop</h3>
</div>

<!-- * Description Section -->
<div align="center">
This is the repository for my Artshop
</div>

<br/>

![](https://visit-counter.vercel.app/counter.png?page=nlanchorez-bit/CI4-ArtShop)

<!-- ! Make sure it was similar to your github -->

---

<br/>
<br/>

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#overview">Overview</a>
      <ol>
        <li>
          <a href="#key-components">Key Components</a>
        </li>
        <li>
          <a href="#technology">Technology</a>
        </li>
      </ol>
    </li>
    <li>
      <a href="#rules-practices-and-principles">Rules, Practices and Principles</a>
    </li>
    <li>
      <a href="#resources">Resources</a>
    </li>
  </ol>
</details>

---

## Overview

The provided codes consist of two PHP view files (landing.php and roadmap.php) for a CodeIgniter 4-based art shop website called Arterion. These files demonstrate a modular frontend structure using reusable components, static content sections, and progress tracking for development.

They are designed to be modular and extensible, serving as entry points for the site's homepage and project roadmap, with emphasis on accessibility, responsive design, and integration with CI4's view system.

Purpose: To render the main landing page with gallery, shop previews, and contact features; and a roadmap page for tracking development milestones, including completed auth pages, ongoing design work, and planned e-commerce/CRUD features.
Key Technologies: PHP with CodeIgniter 4 views (e.g., <?= view('components/...') ?>), HTML5, inline CSS/JS, SVG icons, and external image sources for a static-to-dynamic prototype.
Audience: Frontend developers or full-stack teams building creative marketplaces, focusing on quick prototyping, component reuse, and roadmap visualization for agile planning.

### Key Components

These are **sample modules** included (or suggested) for learning how to add features:

| Component                 | Purpose                                                             | Notes                                                   |
| ------------------------- | ------------------------------------------------------------------- | ------------------------------------------------------- |
| **Header (Included)**     | Site-wide navigation bar with login/signup buttons and branding.    | Reusable via view('components/header') ?>;              |
| **Gallery (Static)**      | Displays sample artwork images in a responsive grid                 | Planned for dynamic filtering via CRUD integration.     |
| **Shop Cards (Modular)**  | Previews product types (prints, originals, commissions)             | Includes separate fragments                             |
| **Roadmap (UI)**          | Visual progress tracker for Development                             | Built with SVG icons                                    |
| **Product Catalog (CRUD)**| Manage artwork/products with variants                               | Planned for shop functionality;                         |

 <!-- ! Start simple. Use these modules as **learning samples**; extend or replace them based on your project’s needs. -->

### Technology

#### Language

![HTML](https://img.shields.io/badge/HTML-E34F26?style=for-the-badge\&logo=html5\&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-1572B6?style=for-the-badge\&logo=css3\&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge\&logo=javascript\&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge\&logo=php\&logoColor=white)

#### Framework/Library

![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-06B6D4?style=for-the-badge\&logo=tailwindcss\&logoColor=white)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-EF4223?style=for-the-badge\&logo=codeigniter\&logoColor=white)

#### Databases

![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge\&logo=mysql\&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-336791?style=for-the-badge\&logo=postgresql\&logoColor=white)
![MongoDB](https://img.shields.io/badge/MongoDB-47A248?style=for-the-badge\&logo=mongodb\&logoColor=white)
![Firebase](https://img.shields.io/badge/Firebase-FFCA28?style=for-the-badge\&logo=firebase\&logoColor=black)

<!-- ! Keep only the used technology -->

---

## Quick Start (Docker)

Run the development stack and the app (rebuild if needed):

```cmd
docker compose up -d --build
```

Common utility commands (run inside the project root):

- Run migrations:
```cmd
docker compose exec php composer migrate
```
- Run seeders:
```cmd
docker compose exec php composer seed
```
- Run tests:
```cmd
docker compose exec php composer test
```

- Create a migration (using CodeIgniter's spark tool):
```cmd
docker compose exec php php spark make:migration CreateUsersTabel
```

- Create a model (using CodeIgniter's spark tool):

```cmd
docker compose exec php php spark make:model UsemModel
```

- Create an entity (value object for a single record) (using CodeIgniter's spark tool):
```cmd
docker compose exec php php spark make:entity Uzer
```

- Create a controller (add --resource to scaffold resourceful methods if you like) (using CodeIgniter's spark tool):
```cmd
docker compose exec php php spark make:controller Usars
```

- Create a seeder (for test/dev data) (using CodeIgniter's spark tool):
```cmd
docker compose exec php php spark make:seeder UserzSeeder
```

If you prefer, you can include `-f "compose.yaml"` explicitly; the shorter commands above work when running from the repo root.

## Ports & Database

Defaults used in this project (host mapping):

| Service     | Host port |
|-------------|-----------:|
| nginx (app) | 8090      |
| phpMyAdmin  | 8091      |
| MySQL       | 3390      |

Database credentials used in examples and CI:

- Host: localhost
- Port: 3390
- Database: app
- User: root
- Password: root

Be careful: seeding and truncating are destructive operations — run only on local/dev environments unless you know what you're doing.

## Rules, Practices and Principles

<!-- ! Dont Revise this -->

1. Always prefix project titles with `AD-`.
2. Place files in their **respective CI4 folders** (`Controllers/`, `Services/`, `Repositories/`, `Views/`).
3. Naming conventions:

   | Type             | Case        | Example                   |
   | ---------------- | ----------- | ------------------------- |
   | Classes          | PascalCase  | `UserService.php`         |
   | Interfaces       | PascalCase  | `UserRepositoryInterface` |
   | DB tables/fields | snake\_case | `users`, `created_at`     |
   | Docs             | kebab-case  | `dev-manual.md`           |

4. Git commits use: `feat`, `fix`, `docs`, `refactor`.
5. Use **Controller → Service → Repository** pattern.
6. Assets (CSS/JS/img) live under `public/`.
7. Docker configs are at the repo root (`docker-compose.yml`, `nginx.conf`).
8. Docs are maintained in `/docs` (dev, technical, sop, commit, principles, copilot).

Example structure:

```
AD-ProjectName/
├─ backend/ci4/
│  ├─ app/Controllers/
│  ├─ app/Services/
│  ├─ app/Repositories/
│  ├─ app/Views/
│  ├─ public/
│  ├─ writable/
│  ├─ .env
│  └─ composer.json
├─ docker/               # Docker configs at root
├─ docs/                 # Manuals and project docs
├─ .gitignore
└─ readme.md
```

<!-- ! Dont Revise this -->

---

## Resources

| Title                   | Purpose                                                               | Link                                                                       |
| ----------------------- | --------------------------------------------------------------------- | -------------------------------------------------------------------------- |
| ChatGPT                 | General AI assistance for planning application architecture and docs. | [https://chat.openai.com](https://chat.openai.com)                         |
| GitHub Copilot          | In-IDE code suggestions and boilerplate generation.                   | [https://github.com/features/copilot](https://github.com/features/copilot) |
| YouTube “UI/UX Design”  | Video tutorials on modern web interface layouts and patterns.         | [https://www.youtube.com](https://www.youtube.com)                         |
| Pinterest Design Boards | Inspiration for color schemes, typography, and component layouts.     | [https://www.pinterest.com](https://www.pinterest.com)                     |
| Google Photos (Assets)  | Stock imagery and graphics used in UI mockups and documentation.      | [https://photos.google.com](https://photos.google.com)                     |
| System Documentation    | Internal docs from PHP, MongoDB, and PostgreSQL used in development.  | — (see `/docs` folder in repo)                                             |

<!-- ! Add what tools aided you -->
