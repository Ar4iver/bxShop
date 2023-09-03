<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$CurDir = $APPLICATION->GetCurDir();
$CurUri = $APPLICATION->GetCurUri();
?>
<!doctype html>
<html xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">
<head>
    <?

    use Bitrix\Main\Page\Asset;

    // CSS;
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/bootstrap.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/fonts/Roboto/stylesheet.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/js/fancy/jquery.fancybox.min.css');
    // JS
    CJSCore::Init(array("jquery3"));
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/fancy/jquery.fancybox.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/myscripts.min.js');

    // HEADERS
    $APPLICATION->ShowHead();
    ?>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="apple-touch-icon" sizes="57x57" href="/local/ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/local/ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/local/ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/local/ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/local/ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/local/ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/local/ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/local/ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/local/ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/local/ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/local/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/local/ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/local/ico/favicon-16x16.png">
    <link rel="manifest" href="/local/ico/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/local/ico/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title><? $APPLICATION->ShowTitle() ?></title>
</head>
<body>

<? $APPLICATION->ShowPanel(); ?>

<div class="top_header">
    <div class="top_header_content">
            <div class="container menu_top_component">
                <?
                $APPLICATION->IncludeComponent("bitrix:menu", "top_menu", array(
                    "ROOT_MENU_TYPE" => "top_menu",    // Тип меню для первого уровня
                    "MENU_CACHE_TYPE" => "A",    // Тип кеширования
                    "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                    "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                    "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                    "MAX_LEVEL" => "2",    // Уровень вложенности меню
                    "CHILD_MENU_TYPE" => "section",    // Тип меню для остальных уровней
                    "USE_EXT" => "Y",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                    "DELAY" => "N",    // Откладывать выполнение шаблона меню
                    "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                    "COMPONENT_TEMPLATE" => "catalog_horizontal",
                    "MENU_THEME" => "site",    // Тема меню
                ),
                    false
                );
                ?>
            </div>
    </div>
    <div class="container middle_header_content">
        <div class="header_logo">
            <a class="logo_link" href="/"><img class="logo_link_img" src="<?= SITE_TEMPLATE_PATH ?>/img/logo.svg" alt=""></a>
        </div>
        <div class="menu_middle_component">
            <?
            $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "main_menu",                  // [bottom_menu, catalog_native, top_menu, .default, blue_tabs, catalog_horizontal, catalog_vertical, grey_tabs, horizontal_multilevel, tree, vertical_multilevel]
                array(
                    // region Основные параметры
                    "ROOT_MENU_TYPE" => "main_menu",  // Тип меню для первого уровня : array ( 'left' => 'Левое меню', 'top' => 'Верхнее меню', 'bottom' => 'Нижнее меню', )
                    // endregion
                    // region Настройки кеширования
                    "MENU_CACHE_TYPE" => "A",     // Тип кеширования : array ( 'A' => 'Авто', 'Y' => 'Кешировать', 'N' => 'Не кешировать', )
                    "MENU_CACHE_TIME" => "3600",  // Время кеширования (сек.)
                    "MENU_CACHE_USE_GROUPS" => "Y",     // Учитывать права доступа
                    "MENU_CACHE_GET_VARS" => "",      // Значимые переменные запроса
                    // endregion
                    // region Дополнительные настройки
                    "MAX_LEVEL" => "2",     // Уровень вложенности меню : array ( 1 => '1', 2 => '2', 3 => '3', 4 => '4', )
                    "CHILD_MENU_TYPE" => "section",  // Тип меню для остальных уровней : array ( 'left' => 'Левое меню', 'top' => 'Верхнее меню', 'bottom' => 'Нижнее меню', )
                    "USE_EXT" => "Y",     // Подключать файлы с именами вида .тип_меню.menu_ext.php
                    "DELAY" => "N",     // Откладывать выполнение шаблона меню
                    "ALLOW_MULTI_SELECT" => "N",     // Разрешить несколько активных пунктов одновременно
                    // endregion
                )
            );
            ?>
        </div>
    </div>
    <div class="container bottom_header_content">
        <div>
            <? // Поиск по заголовкам - http://dev.1c-bitrix.ru/user_help/settings/search/components_2/search_title.php
            $APPLICATION->IncludeComponent("bitrix:search.title", "top_header_search", array(
                "NUM_CATEGORIES" => "1",    // Количество категорий поиска
                "TOP_COUNT" => "5",    // Количество результатов в каждой категории
                "ORDER" => "date",    // Сортировка результатов
                "USE_LANGUAGE_GUESS" => "Y",    // Включить автоопределение раскладки клавиатуры
                "CHECK_DATES" => "N",    // Искать только в активных по дате документах
                "SHOW_OTHERS" => "N",    // Показывать категорию "прочее"
                "PAGE" => "#SITE_DIR#search/index.php",    // Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
                "CATEGORY_0_TITLE" => "",    // Название категории
                "CATEGORY_0" => array(    // Ограничение области поиска
                    0 => "all",
                )
            ),
                false
            );
            ?>
        </div>
        <div>
            <div>Личный кабинет</div>
            <div>
                <? // Ссылка на корзину
                $APPLICATION->IncludeComponent(
                    "bitrix:sale.basket.basket.line",
                    "top_header_basket",
                    array(
                        "COMPONENT_TEMPLATE" => "top_header_basket",
                        "PATH_TO_BASKET" => "/personal/cart/",
                        "PATH_TO_ORDER" => "/personal/order/make/",
                        "SHOW_NUM_PRODUCTS" => "Y",
                        "SHOW_TOTAL_PRICE" => "Y",
                        "SHOW_EMPTY_VALUES" => "Y",
                        "SHOW_PERSONAL_LINK" => "N",
                        "PATH_TO_PERSONAL" => SITE_DIR . "personal/",
                        "SHOW_AUTHOR" => "N",
                        "PATH_TO_AUTHORIZE" => "",
                        "SHOW_REGISTRATION" => "N",
                        "PATH_TO_REGISTER" => SITE_DIR . "login/",
                        "PATH_TO_PROFILE" => SITE_DIR . "personal/",
                        "SHOW_PRODUCTS" => "Y",
                        "SHOW_DELAY" => "N",
                        "SHOW_NOTAVAIL" => "N",
                        "SHOW_IMAGE" => "Y",
                        "SHOW_PRICE" => "Y",
                        "SHOW_SUMMARY" => "Y",
                        "POSITION_FIXED" => "N",
                        "HIDE_ON_BASKET_PAGES" => "N"
                    ),
                    false
                );
                ?>
            </div>
        </div>
    </div>
</div>


