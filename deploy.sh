#!/bin/bash
# deploy.sh — Quick deploy via GitHub Actions artifact
# Usage: bash deploy.sh

set -e

echo "📦 Building deployment package..."

# Clean previous
rm -f deployment.tar.gz

# Create deployment package
tar -czf deployment.tar.gz \
    --exclude='node_modules' \
    --exclude='.git' \
    --exclude='tests' \
    --exclude='.env' \
    --exclude='vendor' \
    --exclude='storage/logs/*' \
    --exclude='storage/framework/cache/*' \
    --exclude='storage/framework/sessions/*' \
    --exclude='.github' \
    app/ config/ database/ routes/ resources/ public/ \
    artisan composer.json composer.lock package.json \
    postcss.config.js tailwind.config.js vite.config.js

echo "✅ Package created: $(du -h deployment.tar.gz | cut -f1)"

echo ""
echo "📋 Manual deployment steps:"
echo "1. Upload deployment.tar.gz to server"
echo "2. Extract on server:"
echo "   cd /path/to/project"
echo "   tar -xzf deployment.tar.gz"
echo "3. Install dependencies on server:"
echo "   composer install --no-dev --optimize-autoloader"
echo "   npm ci && npm run build"
echo "4. Optimize Laravel:"
echo "   php artisan config:cache"
echo "   php artisan route:cache"
echo "   php artisan view:cache"
echo "   php artisan migrate --force"
echo "5. Set permissions:"
echo "   chown -R www-data:www-data storage bootstrap/cache"
echo ""
echo "🎉 Deploy complete!"
