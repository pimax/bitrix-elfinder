<?php
Class CPimaxElfinder
{
    function OnBuildGlobalMenu(&$aGlobalMenu, &$aModuleMenu)
    {
        $MODULE_ID = basename(dirname(__DIR__.'../'));
        if($GLOBALS['APPLICATION']->GetGroupRight($MODULE_ID) < "R")
            return;

        $aMenu = array(
            "parent_menu" => "global_menu_content",
            "section" => $MODULE_ID,
            "sort" => 0,
            "text" => GetMessage("PIMAX_ELFINDER_FAYLOVYY_MENEDJER"),
            "title" => '',
            "url" => $MODULE_ID.'_index.php',
            "module_id" => $MODULE_ID,
            "icon" => "fileman_menu_icon",
            "page_icon" => "",
            "items_id" => $MODULE_ID."_items",
            "more_url" => array(),
            "items" => array()
        );

        if (file_exists($path = dirname(__FILE__).'/../admin'))
        {
            if ($dir = opendir($path))
            {
                while(false !== $item = readdir($dir))
                {
                    if (in_array($item,array('.','..','menu.php')))
                        continue;

                    if (!file_exists($file = $_SERVER['DOCUMENT_ROOT'].'/bitrix/admin/'.$MODULE_ID.'_'.$item))
                        file_put_contents($file,'<'.'? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/'.$MODULE_ID.'/admin/'.$item.'");?'.'>');
                }
            }
        }
        $aModuleMenu[] = $aMenu;
    }
}