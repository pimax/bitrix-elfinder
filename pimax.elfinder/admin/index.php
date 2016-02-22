<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/prolog.php");

if($GLOBALS['APPLICATION']->GetGroupRight("pimax.elfinder") < "R")
	$APPLICATION->AuthForm("");

IncludeModuleLangFile(__FILE__);
$MODULE_ID = 'pimax.elfinder';

$APPLICATION->SetTitle(GetMessage("PIMAX_ELFINDER_FAYLOVYY_MENEDJER"));
require($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/include/prolog_admin_after.php");

?>

<!-- jQuery and jQuery UI (REQUIRED) -->
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/smoothness/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>

<!-- elFinder CSS (REQUIRED) -->
<link rel="stylesheet" type="text/css" href="/bitrix/js/pimax.elfinder/css/elfinder.min.css">
<link rel="stylesheet" type="text/css" href="/bitrix/js/pimax.elfinder/css/theme.css">

<!-- elFinder JS (REQUIRED) -->
<script src="/bitrix/js/pimax.elfinder/js/elfinder.min.js"></script>

<!-- elFinder translation (OPTIONAL) -->
<script src="/bitrix/js/pimax.elfinder/js/i18n/elfinder.ru.js"></script>

<!-- elFinder initialization (REQUIRED) -->
<script type="text/javascript" charset="utf-8">
    // Documentation for client options:
    // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
    $(document).ready(function() {
        $('#elfinder').elfinder({
            url : '/bitrix/admin/pimax.elfinder_connector.php'  // connector URL (REQUIRED)
             , lang: 'ru'                    // language (OPTIONAL)
        });
    });
</script>

<div id="elfinder"></div>

<?
require($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/include/epilog_admin.php");
?>
