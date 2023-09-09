<?php

namespace Admin\Extend\AdminConfigs\Extension;

use Admin\Core\NavigatorExtensionProvider;
use Admin\Extend\AdminConfigs\AdminConfigsController;
use Admin\Interfaces\ActionWorkExtensionInterface;

/**
 * Class Navigator
 * @package Admin\Extend\AdminConfigs\Extension
 */
class Navigator extends NavigatorExtensionProvider implements ActionWorkExtensionInterface {

    /**
     * @return void
     */
    public function handle(): void
    {
        $this->item('Configs')
            ->resource('configs', AdminConfigsController::class)
            ->icon_toggle_on();
    }
}
