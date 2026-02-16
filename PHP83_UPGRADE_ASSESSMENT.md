# PHP 8.3 Upgrade Assessment

## Summary

To run this Laravel 5.8 app on **PHP 8.3**, you need to upgrade to **Laravel 10 or 11** (Laravel 10+ is the first to support PHP 8.3). This is a **major undertaking**—effectively rewriting significant parts of the application.

## What’s Required

### 1. Laravel 5.8 → 10/11 (5–6 major versions)

- New directory and bootstrap structure
- New configuration layout
- New middleware handling
- Deprecated APIs removed

### 2. Package Replacements

| Current Package | Issue | Replacement |
|-----------------|-------|-------------|
| `zizaco/entrust` | Abandoned, L5 only | `spatie/laravel-permission` (requires DB + code migration) |
| `laravelcollective/html` | Abandoned, max L10 | `spatie/laravel-html` or `laravelcollectiveforked/html` |
| `fideloper/proxy` | Replaced | `fruitcake/laravel-cors` |
| `fzaninotto/faker` | Abandoned | `fakerphp/faker` |
| `consoletvs/charts` | Max v6.8, no L11 | Find alternative or keep 6.x on L10 |
| `africastalking/africastalking` | Uses Guzzle 6 | Resolve Guzzle version conflicts |

### 3. Entrust → Spatie Permission Migration

- **Database**: `role_user` → `model_has_roles` (different schema)
- **Models**: `EntrustUserTrait` → `HasRoles`
- **Middleware**: Entrust role/permission → Spatie equivalents
- **Blade/code**: Update all `hasRole()`, `can()`, `ability()` usage
- **Tables**: `role_user`, `permission_role` → `model_has_roles`, `role_has_permissions`

### 4. Codebase Impact

- `app/User.php` – Entrust trait change
- `app/Http/Kernel.php` – middleware updates
- `config/app.php` – providers and aliases
- Controllers using `role_user` joins
- All views using `Form::` / `Html::` (if switching to Spatie HTML)
- `app/Models/Roles.php`, `Permission.php` – model changes for Spatie
- `config/entrust.php` – remove and replace with Spatie config

## Estimated Effort

- **With Laravel Shift** (paid): ~2–4 hours of automated changes + manual fixes
- **Without Shift**: ~2–4 weeks of focused development and testing

## Recommended Options

### Option A: Use PHP 7.4 for Now (fastest)

```bash
brew tap shivammathur/php
brew install shivammathur/php/php@7.4
/usr/local/opt/php@7.4/bin/php artisan serve
```

### Option B: Use Laravel Shift

- https://laravelshift.com/
- Automated upgrade from 5.8 → 11
- Still expect manual fixes for Entrust and custom code

### Option C: Full Manual Upgrade

1. Upgrade stepwise: 5.8 → 6 → 7 → 8 → 9 → 10  
2. Migrate Entrust to Spatie at the Laravel 8 stage  
3. Migrate LaravelCollective HTML to Spatie at the Laravel 10 stage  
4. Run full regression testing

## Files Backed Up

- `composer.json.backup` – original
- `composer.lock.backup` – original

To restore:

```bash
cp composer.json.backup composer.json
cp composer.lock.backup composer.lock
composer install
```
