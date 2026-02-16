# PHP 7.4 Setup for Eris

This Laravel 5.8 app requires **PHP 7.4** (it does not support PHP 8).

## Quick Start

### 1. Serve the app (recommended)

```bash
./serve.sh
```

Opens http://127.0.0.1:8000 using PHP 7.4.

### 2. Run other commands with PHP 7.4

```bash
./php74 artisan migrate
./php74 composer install
./php74 artisan tinker
```

## If PHP 7.4 is not installed

```bash
brew tap shivammathur/php
brew install shivammathur/php/php@7.4
```

Then run `./serve.sh` again.

## Using PHP 7.4 in your shell (optional)

Add to `~/.zshrc` for the current project:

```bash
# Use PHP 7.4 for Eris project
alias eris-php='/usr/local/opt/php@7.4/bin/php'
```

Or on Apple Silicon (M1/M2):

```bash
alias eris-php='/opt/homebrew/opt/php@7.4/bin/php'
```

Then: `eris-php artisan serve`
