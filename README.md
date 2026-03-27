<p align="center">
  <strong>Event Management API</strong><br>
  <sub>Production-ready REST backend · Laravel · JWT</sub>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP 8.2+">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat-square&logo=laravel&logoColor=white" alt="Laravel 11">
  <img src="https://img.shields.io/badge/Auth-JWT-black?style=flat-square" alt="JWT">
  <img src="https://img.shields.io/badge/License-MIT-green?style=flat-square" alt="License">
</p>

---

## Project overview

**Event Management API** is a RESTful backend for managing events and attendee registrations. It exposes a clean JSON API secured with **JWT** (`tymon/jwt-auth`), layered architecture (controllers → services → validation), and owner-based authorization for event updates and deletes.

Ideal as a foundation for mobile apps, SPAs, or microservices that need authenticated users, event CRUD, and many-to-many event registration.

---

## Features

| Area | Details |
|------|---------|
| **Authentication** | Register, login, logout, profile (`/me`) with JWT access tokens |
| **Events** | Full CRUD; list with **pagination**, **title search**, **date filters** |
| **Authorization** | Only the event **owner** can update or delete an event |
| **Registrations** | Users register / unregister for events; **duplicate** registrations prevented |
| **API design** | Consistent JSON: `{ "success", "data", "message" }` |
| **Quality** | Form requests, API resources, policies, rate limits on auth routes |

---

## Requirements

- **PHP** 8.2+
- **Composer** 2.x
- **SQLite** (default) or MySQL / PostgreSQL
- PHP extensions: `openssl`, `pdo`, `mbstring`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath` (as required by Laravel)

---

## Installation & setup

### 1. Clone and install dependencies

```bash
git clone <your-repo-url> event-management-api
cd event-management-api
composer install
```

### 2. Environment

```bash
cp .env.example .env
php artisan key:generate
php artisan jwt:secret
```

Edit `.env` and set:

- `APP_URL` — your app URL (e.g. `http://localhost:8000`)
- **Database** — for SQLite, ensure the file exists:

  ```bash
  touch database/database.sqlite
  ```

  Or configure `DB_*` for MySQL/PostgreSQL.

### 3. Database

```bash
php artisan migrate
```

### 4. (Optional) Development helpers

```bash
php artisan config:clear
php artisan cache:clear
```

---

## How to run

### Local development (PHP built-in server)

```bash
php artisan serve
```

API base URL: **`http://127.0.0.1:8000/api`**

### Docker (optional)

If you use [Laravel Sail](https://laravel.com/docs/sail), after configuring Sail:

```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
```

*(Adjust commands if your project uses a custom `docker-compose` setup.)*

---

## API reference (examples)

All routes below are prefixed with `/api`. Send JSON with `Content-Type: application/json` where a body is shown.

### Authentication (JWT)

| Method | Endpoint | Auth | Description |
|--------|----------|------|-------------|
| `POST` | `/register` | No | Create account; returns user + `access_token` |
| `POST` | `/login` | No | Returns `access_token` |
| `POST` | `/logout` | Bearer JWT | Invalidate current token (blacklist) |
| `GET` | `/me` | Bearer JWT | Current user profile |

**Register**

```bash
curl -s -X POST http://127.0.0.1:8000/api/register \
  -H "Content-Type: application/json" \
  -d '{"name":"Demo User","email":"demo@example.com","password":"password123","password_confirmation":"password123"}'
```

**Login**

```bash
curl -s -X POST http://127.0.0.1:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{"email":"demo@example.com","password":"password123"}'
```

**Authenticated request** (replace `YOUR_JWT` with the `access_token` value)

```bash
curl -s http://127.0.0.1:8000/api/me \
  -H "Authorization: Bearer YOUR_JWT" \
  -H "Accept: application/json"
```

### Events (CRUD)

| Method | Endpoint | Auth | Description |
|--------|----------|------|-------------|
| `GET` | `/events` | No | Paginated list; query: `search`, `date`, `date_from`, `date_to`, `per_page`, `page` |
| `GET` | `/events/{id}` | No | Single event |
| `POST` | `/events` | Bearer JWT | Create (you become owner) |
| `PUT` / `PATCH` | `/events/{id}` | Bearer JWT | Update (**owner only**) |
| `DELETE` | `/events/{id}` | Bearer JWT | Delete (**owner only**) |

**List events (with filters)**

```bash
curl -s "http://127.0.0.1:8000/api/events?search=meetup&date_from=2025-06-01&per_page=10"
```

**Create event**

```bash
curl -s -X POST http://127.0.0.1:8000/api/events \
  -H "Authorization: Bearer YOUR_JWT" \
  -H "Content-Type: application/json" \
  -d '{"title":"Laravel Meetup","description":"Networking","date":"2025-07-15 18:00:00","location":"Berlin"}'
```

### Event registration

| Method | Endpoint | Auth | Description |
|--------|----------|------|-------------|
| `POST` | `/events/{id}/register` | Bearer JWT | Register current user |
| `DELETE` | `/events/{id}/register` | Bearer JWT | Unregister |

```bash
curl -s -X POST http://127.0.0.1:8000/api/events/1/register \
  -H "Authorization: Bearer YOUR_JWT" \
  -H "Accept: application/json"
```

---

## Screenshots & demos *(placeholders)*

| Placeholder | Suggested content |
|-------------|-------------------|
| **Postman / Insomnia** | Export collection screenshot showing auth + events folders |
| **Response sample** | Paste a successful `GET /api/events` JSON response |
| **Architecture** | Simple diagram: Client → API → JWT → Services → DB |

> Add your images under `docs/` or link a hosted demo when available.

---

## Project structure (high level)

```
app/
├── Http/Controllers/Api/   # Thin controllers
├── Http/Requests/          # Validation
├── Http/Resources/         # JSON transformers
├── Http/Responses/       # Unified API envelope
├── Policies/               # Event ownership
├── Services/               # Business logic
└── Models/
```

---

## License

This project is open-sourced under the **MIT License**.

---

## Contact & portfolio *(optional)*

| | |
|---|--|
| **Developer** | *[Your name or agency]* |
| **Portfolio** | *[https://your-portfolio.com]* |
| **Email** | *[your@email.com]* |
| **Upwork / Fiverr** | *[Link to your profile]* |

Replace the placeholders above with your real details when publishing.

---

<p align="center">
  <sub>Built with Laravel · JWT · REST best practices</sub>
</p>
