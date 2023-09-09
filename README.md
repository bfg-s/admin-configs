<p align="center"><a href="https://wood.veskod.com/documentation/admin-panel" target="_blank">
<img src="https://wood.veskod.com/images/logo.png" alt="Laravel Logo">
</a></p>

<p align="center">
<a href="https://packagist.org/packages/bfg/admin-configs"><img src="https://img.shields.io/packagist/dt/bfg/admin-configs" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/bfg/admin-configs"><img src="https://img.shields.io/packagist/v/bfg/admin-configs" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/bfg/admin-configs"><img src="https://img.shields.io/packagist/l/bfg/admin-configs" alt="License"></a>
</p>

# Install
```
composer require bfg/admin-configs
```
# Admin install
```
php artisan admin:extension bfg/admin-configs --install
```
```
php artisan migrate
```
Open `app/Providers/AppServiceProvider.php`, and call the `Config::load()` method within the `boot` method:
```php
<?php

namespace App\Providers;

use Admin\Extend\AdminConfigs\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (Schema::hasTable('admin_config')) {
            Config::load();
        }
    }
}
```
