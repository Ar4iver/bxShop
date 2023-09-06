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
            <a class="logo_link" href="/"><img class="logo_link_img" src="<?= SITE_TEMPLATE_PATH ?>/img/logo.svg"
                                               alt=""></a>
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
        <div class="bottom_header_content_actions">
            <div>
                <?
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
		"PATH_TO_PERSONAL" => SITE_DIR."personal/",
		"SHOW_AUTHOR" => "N",
		"PATH_TO_AUTHORIZE" => "",
		"SHOW_REGISTRATION" => "N",
		"PATH_TO_REGISTER" => SITE_DIR."login/",
		"PATH_TO_PROFILE" => SITE_DIR."personal/",
		"SHOW_PRODUCTS" => "N",
		"SHOW_DELAY" => "N",
		"SHOW_NOTAVAIL" => "N",
		"SHOW_IMAGE" => "Y",
		"SHOW_PRICE" => "Y",
		"SHOW_SUMMARY" => "Y",
		"POSITION_FIXED" => "N",
		"HIDE_ON_BASKET_PAGES" => "N",
		"MAX_IMAGE_SIZE" => "70"
	),
	false
);
                ?>
            </div>
            <div>
                <a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="28" viewBox="0 0 26 28" fill="none">
                        <path d="M24.98 22.8503C24.3278 21.2785 23.3813 19.8508 22.1933 18.6467C21.0089 17.4392 19.6059 16.4764 18.0617 15.8116C18.0478 15.8045 18.034 15.801 18.0202 15.794C20.1742 14.2111 21.5744 11.6327 21.5744 8.72362C21.5744 3.90452 17.7367 0 13 0C8.26333 0 4.42559 3.90452 4.42559 8.72362C4.42559 11.6327 5.82585 14.2111 7.97982 15.7975C7.96599 15.8045 7.95216 15.808 7.93833 15.8151C6.38941 16.4799 4.99952 17.4332 3.80671 18.6503C2.61981 19.8553 1.67349 21.2827 1.02003 22.8538C0.37806 24.3918 0.0318323 26.0409 8.64563e-05 27.7116C-0.000836348 27.7491 0.00563604 27.7864 0.0191224 27.8214C0.0326088 27.8564 0.0528363 27.8882 0.0786128 27.9151C0.104389 27.942 0.135194 27.9633 0.16921 27.9779C0.203227 27.9925 0.239768 28 0.27668 28H2.35113C2.50326 28 2.62427 27.8769 2.62773 27.7256C2.69688 25.01 3.76868 22.4668 5.66335 20.5392C7.62371 18.5447 10.2271 17.4472 13 17.4472C15.7729 17.4472 18.3763 18.5447 20.3367 20.5392C22.2313 22.4668 23.3031 25.01 23.3723 27.7256C23.3757 27.8804 23.4967 28 23.6489 28H25.7233C25.7602 28 25.7968 27.9925 25.8308 27.9779C25.8648 27.9633 25.8956 27.942 25.9214 27.9151C25.9472 27.8882 25.9674 27.8564 25.9809 27.8214C25.9944 27.7864 26.0008 27.7491 25.9999 27.7116C25.9653 26.0301 25.6231 24.3945 24.98 22.8503ZM13 14.7739C11.413 14.7739 9.91943 14.1442 8.79577 13.001C7.67211 11.8578 7.05323 10.3382 7.05323 8.72362C7.05323 7.10905 7.67211 5.58945 8.79577 4.44623C9.91943 3.30301 11.413 2.67337 13 2.67337C14.587 2.67337 16.0806 3.30301 17.2042 4.44623C18.3279 5.58945 18.9468 7.10905 18.9468 8.72362C18.9468 10.3382 18.3279 11.8578 17.2042 13.001C16.0806 14.1442 14.587 14.7739 13 14.7739Z"
                              fill="#A65CF0"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>


