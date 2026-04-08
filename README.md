# 🚨 Laravel HTTP Errors

Beautiful, customizable HTTP error pages for Laravel applications.
Replace Laravel's default error screens with clean, user-friendly views — in seconds.
---

## ✨ Features

- 🎨 Clean, modern error page designs
- 📦 Drop-in install — zero configuration needed
- ✏️ Fully publishable and customizable views
- ⚡ Covers all common HTTP error codes
- 🌙 Easy to style to match your app's branding

---

## 📋 Included Error Pages

| Code | Description |
|------|-------------|
| 400  | Bad Request |
| 401  | Unauthorized |
| 403  | Forbidden |
| 404  | Not Found |
| 419  | Page Expired |
| 429  | Too Many Requests |
| 500  | Internal Server Error |
| 503  | Service Unavailable |

---

## 📦 Installation



**Dev / latest:**
```bash
composer require anthonymacs/http-errors dev-main
```

---

## 🚀 Publish Error Views

```bash
php artisan vendor:publish --tag=http-errors-views
```

This copies all error views into your project at:
