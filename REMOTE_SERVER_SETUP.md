# Remote Server Setup Guide - Fixing 419 CSRF Errors

## Common Causes of 419 Errors on Remote Servers

1. **Session/Cookie Configuration Issues**
2. **Proxy/Load Balancer Configuration**
3. **APP_KEY Mismatch**
4. **HTTPS/HTTP Mismatch**

## Required .env Configuration

Add or update these settings in your `.env` file on the remote server:

```env
# Application URL (IMPORTANT: Must match your actual domain)
APP_URL=https://yourdomain.com
# or for HTTP:
# APP_URL=http://yourdomain.com

# Session Configuration
SESSION_DRIVER=file
SESSION_LIFETIME=120

# For HTTPS sites, set to true
SESSION_SECURE_COOKIE=true
# For HTTP sites, set to false or leave commented
# SESSION_SECURE_COOKIE=false

# Session Domain (usually leave commented/null for same-domain)
# Only set if using subdomains: .yourdomain.com
# SESSION_DOMAIN=.yourdomain.com

# SameSite cookie setting
# Use 'none' if you have cross-domain issues with HTTPS
# Use 'lax' for most cases (default)
SESSION_SAME_SITE=lax

# Make sure APP_KEY is set and matches
APP_KEY=base64:your-app-key-here
```

## Steps to Fix

1. **Generate/Verify APP_KEY:**
   ```bash
   php artisan key:generate
   ```

2. **Clear all caches:**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan view:clear
   php artisan route:clear
   ```

3. **Ensure storage directories are writable:**
   ```bash
   chmod -R 775 storage
   chmod -R 775 bootstrap/cache
   ```

4. **If behind a proxy/load balancer:**
   - The TrustProxies middleware has been updated to trust all proxies
   - If you know specific proxy IPs, update `app/Http/Middleware/TrustProxies.php`

5. **For HTTPS sites:**
   - Set `SESSION_SECURE_COOKIE=true` in .env
   - Ensure your SSL certificate is valid

6. **For HTTP sites:**
   - Set `SESSION_SECURE_COOKIE=false` or leave it commented
   - Ensure APP_URL uses http://

## Testing

After making changes:
1. Clear browser cookies for your domain
2. Try logging in again
3. Check browser console for any cookie-related errors
4. Verify session files are being created in `storage/framework/sessions`

## Additional Troubleshooting

If issues persist:

1. **Check session files:**
   ```bash
   ls -la storage/framework/sessions
   ```

2. **Check Laravel logs:**
   ```bash
   tail -f storage/logs/laravel.log
   ```

3. **Verify APP_URL matches actual URL:**
   - Visit your site and check the actual URL
   - Ensure APP_URL in .env matches exactly (including http/https)

4. **Test CSRF token:**
   - Open login page
   - View page source
   - Verify `_token` input field exists in the form

