<?php

namespace Admin\Extend\AdminConfigs;

use Admin\ExtendProvider;
use Admin\Core\ConfigExtensionProvider;
use Admin\Extend\AdminConfigs\Extension\Config;
use Admin\Extend\AdminConfigs\Extension\Install;
use Admin\Extend\AdminConfigs\Extension\Navigator;
use Admin\Extend\AdminConfigs\Extension\Uninstall;
use Admin\Extend\AdminConfigs\Extension\Permissions;
use Exception;

/**
 * Class ServiceProvider
 * @package Admin\Extend\AdminConfigs
 */
class ServiceProvider extends ExtendProvider
{
    /**
     * Extension ID name
     * @var string
     */
    public static $name = "bfg/admin-configs";

    /**
     * Extension call slug
     * @var string
     */
    static $slug = "bfg_admin_configs";

    /**
     * Extension description
     * @var string
     */
    public static $description = "Config extension for bfg admin";

    /**
     * @var string
     */
    protected $navigator = Navigator::class;

    /**
     * @var string
     */
    protected $install = Install::class;

    /**
     * @var string
     */
    protected $uninstall = Uninstall::class;

    /**
     * @var string
     */
    protected $permissions = Permissions::class;

    /**
     * @var ConfigExtensionProvider|string
     */
    protected $config = Config::class;

    /**
     * @return void
     * @throws Exception
     */
    public function boot()
    {
        parent::boot();

        $this->publishes([
            __DIR__ . '/../migrations' => database_path('migrations')
        ], 'bfg-admin-configs');
    }
}

