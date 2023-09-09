<?php

namespace Admin\Extend\AdminConfigs\Extension;

use Admin\Core\InstallExtensionProvider;
use Admin\Interfaces\ActionWorkExtensionInterface;

/**
 * Class Install
 * @package Admin\Extend\AdminConfigs\Extension
 */
class Install extends InstallExtensionProvider implements ActionWorkExtensionInterface {

    /**
     * @return void
     */
    public function handle(): void
    {
        \Artisan::call('vendor:publish', [
            '--tag' => 'bfg-admin-configs',
            '--force' => true
        ]);
    }
}
