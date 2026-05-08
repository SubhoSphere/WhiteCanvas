# 🎨 WhiteCanvas - Industrial Blog Platform

WhiteCanvas is a premium, industrial-grade blog system built with **Laravel 12**. Designed with the "Untitled UI" aesthetic, it provides a sleek, modern interface for both readers and content creators.

## 🚀 Key Features

### 📖 Reader Experience
- **Featured Landing Page:** High-impact hero section for breaking news and featured content.
- **Dedicated Blog Listing:** Comprehensive post list with a functional sidebar for search, categories, and tags.
- **High-Fidelity Detail Page:** Single post view featuring glassmorphism overlays and a "Founders Corner" section.
- **Public Author Profiles:** Dynamic user profile pages (`/user/{username}`) showcasing individual creator portfolios.

### 🛠️ Creator Tools (Dashboard)
- **Centralized Dashboard:** Manage identity and content from a single command center.
- **Blog CMS:** Professional table-based management system with status badges (Published/Draft).
- **Interactive Creation Flow:** Modal-driven "Create Post" workflow with file upload support.
- **Profile Management:** Secure personal details and password update system.

### 🏢 Corporate Essentials
- **About Us:** Mission-driven page with values grid and team showroom.
- **FAQ & Contact:** Interactive accordion-style support and a professional communication hub.
- **Error Resilience:** Custom-designed 404 "Not Found" page.

## 🛠️ Tech Stack
- **Backend:** Laravel 12.x
- **Database:** MySQL
- **Frontend:** Blade Templating, Vanilla CSS (Custom Design System), FontAwesome 6.4.
- **Local Environment:** Laragon / PHP 8.3+

## ⚙️ Installation

### Prerequisites
- PHP 8.3 or higher
- Composer
- MySQL

### Setup Steps
1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   cd WhiteCanvas
   ```

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Configure Environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Configuration:**
   - Create a database named `whitecanvas_db` in your local MySQL.
   - Update `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in your `.env`.

5. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

6. **Serve the application:**
   ```bash
   php artisan serve
   ```
   Open `http://127.0.0.1:8000` in your browser.

## 📁 Page Directory
| Page | Route | Description |
| :--- | :--- | :--- |
| **Home** | `/` | Featured landing page with hero post. |
| **All Blogs** | `/blogs` | Dedicated listing with sidebar filters. |
| **Blog Detail** | `/blog/{slug}` | Detailed reading view. |
| **User Profile** | `/user/{username}` | Public author portfolio. |
| **Dashboard** | `/dashboard` | User command center. |
| **My Posts** | `/dashboard/my-posts` | Content management system. |
| **About Us** | `/about-us` | Company mission and team. |
| **FAQ** | `/faq` | Support accordion. |
| **Contact** | `/contact-us` | Communication form and info. |
| **Login/Register** | `/login`, `/register` | Authentication pages. |

---

Developed with ❤️ by **SubhoSphere** for the Jobyaari Team.
