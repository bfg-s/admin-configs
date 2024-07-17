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
    public static string $name = "bfg/admin-configs";

    /**
     * Extension call slug
     * @var string
     */
    static string $slug = "bfg_admin_configs";

    /**
     * Extension description
     * @var string
     */
    public static string $description = "Config extension for bfg admin";

    /**
     * @var string
     */
    protected string $navigator = Navigator::class;

    /**
     * @var string
     */
    protected string $install = Install::class;

    /**
     * @var string
     */
    protected string $uninstall = Uninstall::class;

    /**
     * @var ConfigExtensionProvider|string
     */
    protected string|ConfigExtensionProvider $config = Config::class;

    /**
     * @return void
     * @throws Exception
     */
    public function boot(): void
    {
        parent::boot();

        $this->publishes([
            __DIR__ . '/../migrations' => database_path('migrations')
        ], 'bfg-admin-configs');
    }
}

