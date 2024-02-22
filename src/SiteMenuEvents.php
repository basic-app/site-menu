<?php

namespace BasicApp\SiteMenu;

use CodeIgniter\Events\Events;

class SiteMenuEvents
{

    const EVENT_MAIN_MENU = 'site-main-menu';

    public static function onMainMenu($callback)
    {
        return Events::on(static::EVENT_MAIN_MENU, $callback);
    }

}