#!/bin/bash
# Run Laravel 5.8 with PHP 7.4 (Laravel 5.8 does not support PHP 8)
# Install PHP 7.4 first: brew tap shivammathur/php && brew install shivammathur/php/php@7.4

PHP74_PATHS=(
    "/usr/local/opt/php@7.4/bin/php"
    "/opt/homebrew/opt/php@7.4/bin/php"
)

for php in "${PHP74_PATHS[@]}"; do
    if [ -x "$php" ]; then
        echo "→ Using PHP 7.4: $($php -v 2>/dev/null | head -1)"
        echo "→ Server: http://127.0.0.1:8000"
        echo ""
        exec "$php" artisan serve "$@"
    fi
done

echo "❌ PHP 7.4 not found. Laravel 5.8 requires PHP 7.4 (PHP 8 is incompatible)."
echo ""
echo "Install PHP 7.4:"
echo "  brew tap shivammathur/php"
echo "  brew install shivammathur/php/php@7.4"
echo ""
echo "Then run: ./serve.sh"
exit 1
