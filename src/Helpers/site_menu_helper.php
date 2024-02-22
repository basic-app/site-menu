<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
use BasicApp\SiteMenu\SiteMenuEvents;
use CodeIgniter\Events\Events;

if (!function_exists('siteMainMenu'))
{
    function siteMainMenu(array $customItems = [], bool $removeEmpty = true) : array
    {
        $mainMenu = new stdClass;

        $mainMenu->items = [];

        Events::trigger(SiteMenuEvents::EVENT_MAIN_MENU, $mainMenu);

        $return = $mainMenu->items;

        if ($customItems)
        {
            $return = array_merge_recursive($return, $customItems);
        }

        if ($removeEmpty)
        {
            foreach($return as $key => $value)
            {
                if (empty($value['url']) || ($value['url'] == '#'))
                {
                    if (empty($value['items']))
                    {
                        unset($return[$key]);
                    }
                }
            }
        }

        return $return;
    }
}
