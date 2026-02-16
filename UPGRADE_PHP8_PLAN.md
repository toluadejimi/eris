# PHP 8 Upgrade Plan for Eris

## Summary: Critical Dependency

**Laravel 5.8 does not support PHP 8.** It was released in February 2019 (before PHP 8 existed) and targets PHP 7.1.3–7.3. If you switch the project to PHP 8 without framework changes, it will crash due to incompatible dependencies and Laravel internals.

To move to PHP 8, you need to upgrade Laravel first. Below is a phased plan to do this safely.

---

## Quick: Run the app now (PHP 7.4)

```bash
# 1. Install PHP 7.4 (one-time)
brew tap shivammathur/php
brew install shivammathur/php/php@7.4

# 2. Run the app
./serve.sh
# or: /usr/local/opt/php@7.4/bin/php artisan serve
```

You can also disable the gnupg warning: `./disable-gnupg.sh`

---

## Current State

| Component | Version |
|-----------|---------|
| Laravel | 5.8.* |
| PHP (composer.json) | >=7.2.9 |
| Key packages | Many from 2019 era |

### Deprecated Patterns (will break on Laravel 6+)

- **`array_prepend()`** – used ~25+ times (Traits, Controllers)
- **`array_pluck()`** – used ~20+ times  
  These helpers were removed in Laravel 6. Replace with `Arr::prepend()`, `collect()->pluck()` / `Arr::pluck()`.

### Packages Needing Attention

| Package | Issue |
|---------|-------|
| `fideloper/proxy` | Replaced by `fruitcake/laravel-cors` in Laravel 7+ |
| `fzaninotto/faker` | Abandoned → use `fakerphp/faker` |
| `zizaco/entrust` | Abandoned → consider `spatie/laravel-permission` |
| `laravel/framework` | 5.8 → 6 → 7 → 8+ for PHP 8 support |
| `phpunit/phpunit` ^7.5 | Needs ^9.x for PHP 8 |
| `symfony/translation` 4.3.8 | Pinned; will be upgraded by framework |
| `guzzlehttp/guzzle` ^6.3 | Laravel 8+ uses Guzzle 7 |

---

## Recommended Approach: Phased Upgrade

### Phase 1: Prep Work (no Laravel upgrade yet) ✅ COMPLETED

1. **Back up everything**
   - Code, database, `.env`, configs
   - Consider a staging clone for testing

2. **Replace deprecated helpers** ✅ DONE
   - `array_prepend($arr, $value, $key)` → `Arr::prepend($arr, $value, $key)`
   - `array_pluck($arr, $value, $key)` → `collect($arr)->pluck($value, $key)->all()` or `Arr::pluck($arr, $value, $key)`
   - `array_where($arr, $callback)` → `array_filter($arr, $callback, ARRAY_FILTER_USE_BOTH)`
   - Applied across all Traits, Controllers, and Blade views

3. **Update PHP in composer.json**
   - Change `">=7.2.9"` to `"^7.4|^8.0"` when ready to test on both versions.

### Phase 2: Laravel 5.8 → 6.x (LTS)

- Laravel 6 supports PHP 7.2–7.4 (no PHP 8 yet, but gets you closer).
- Follow: https://laravel.com/docs/6.x/upgrade#upgrade-6.0
- Main changes:
  - Carbon 1.x → 2.x
  - Auth scaffolding changes
  - `laravel/ui` or equivalent for auth if needed
- Run tests and manual checks after each step.

### Phase 3: Laravel 6.x → 7.x

- Laravel 7 supports PHP 7.2.5–8.0.
- Follow: https://laravel.com/docs/7.x/upgrade
- Notable changes:
  - `fideloper/proxy` → `fruitcake/laravel-cors`
  - Fluent strings, routing changes
- Replace `fzaninotto/faker` with `fakerphp/faker` (if not done yet).

### Phase 4: Laravel 7.x → 8.x (PHP 8 ready)

- Laravel 8 supports PHP 7.3–8.1.
- Follow: https://laravel.com/docs/8.x/upgrade
- Main changes:
  - Model factories, maintenance mode
  - Jetstream/Fortify if using new auth scaffolding
- Update PHPUnit to ^9.x.
- After this phase, you can safely run on PHP 8.0+.

### Phase 5: PHP 8

- Once on Laravel 8+, switch to PHP 8 (8.0, 8.1, or 8.2) in your environment and `composer.json`.
- Run `composer update` and fix any remaining compatibility issues.
- Run full test suite and manual QA.

---

## Quick Reference: Helper Replacements

```php
// array_prepend - add item to beginning of array
array_prepend($exams, 'Select Exams', '0');
// becomes:
\Illuminate\Support\Arr::prepend($exams, 'Select Exams', '0');
// or:
['0' => 'Select Exams'] + $exams;

// array_pluck - extract column from array
array_pluck($examSchedule, 'id');
// becomes:
collect($examSchedule)->pluck('id')->all();
// or:
\Illuminate\Support\Arr::pluck($examSchedule, 'id');
```

Add `use Illuminate\Support\Arr;` at the top of files using `Arr::`.

---

## Option B: Stay on PHP 7.4 (short term)

If a full Laravel upgrade is not possible soon:

- Keep PHP 7.4 while planning the migration.
- Note: PHP 7.4 security support ended Nov 2022. Use only if your environment has other mitigations or extended support.

---

## Suggested Next Steps

1. Create a git branch for the upgrade.
2. Implement Phase 1 (helper replacements) in your app code.
3. Run the app and tests on PHP 7.4 to confirm stability.
4. Proceed with Laravel upgrades (Phase 2–4) step by step.
5. Test on PHP 8 after reaching Laravel 8+.

If you want to start with Phase 1 (helper replacements), I can walk through the concrete changes file by file.
