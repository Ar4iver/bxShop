<? /*Это стандартная проверка для компонентов Bitrix,
 чтобы удостовериться, что файл был вызван в рамках системы Bitrix, а не напрямую. */ ?>

<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

//Если в $arResult["ALL_ITEMS"] нет элементов, выполнение скрипта прекращается, и меню не выводится.
if (empty($arResult["ALL_ITEMS"]))
    return;


// Создается уникальный идентификатор для меню, который будет использоваться в качестве атрибута id для HTML-тегов.
$menuBlockId = "catalog_menu_" . $this->randString();
?>

<? /* Контейнер меню */ ?>
<div class="header_top_nav" id="<?= $menuBlockId ?>">

    <div class="header_top_nav_phone">
        <a class="" href="tel:+74958854547">
            <span class="phone-icon">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.3425 14.0983C17.215 14.0983 16.1242 13.915 15.1067 13.585C14.7858 13.475 14.4283 13.5575 14.1808 13.805L12.7417 15.6108C10.1475 14.3733 7.71833 12.0358 6.42583 9.35L8.21333 7.82833C8.46083 7.57167 8.53417 7.21417 8.43333 6.89333C8.09417 5.87583 7.92 4.785 7.92 3.6575C7.92 3.1625 7.5075 2.75 7.0125 2.75H3.84083C3.34583 2.75 2.75 2.97 2.75 3.6575C2.75 12.1733 9.83583 19.25 18.3425 19.25C18.9933 19.25 19.25 18.6725 19.25 18.1683V15.0058C19.25 14.5108 18.8375 14.0983 18.3425 14.0983Z"/>
                    </svg>
            </span>+7 (495) 885-45-47
        </a>
    </div>

    <div>
        <nav class="header_top_nav_container" id="cont_<?= $menuBlockId ?>">

            <ul class="header_top_nav_list" id="ul_<?= $menuBlockId ?>">
                <? /* В этом блоке кода происходит перебор основных элементов меню (первого уровня). */ ?>
                <? foreach ($arResult["MENU_STRUCTURE"] as $itemID => $arColumns): ?>
                    <li class="bx-nav-1-lvl">
                        <a href="<?= $arResult["ALL_ITEMS"][$itemID]["LINK"] ?>">
                            <span><?= $arResult["ALL_ITEMS"][$itemID]["TEXT"] ?></span>
                        </a>
                        <? if (is_array($arColumns) && !empty($arColumns)): ?>
                            <div class="bx-nav-2-lvl-container">
                                <? foreach ($arColumns as $key => $arRow): ?>
                                    <ul class="bx-nav-list-2-lvl">
                                        <? foreach ($arRow as $itemIdLevel_2 => $arLevel_3): ?>
                                            <li class="bx-nav-2-lvl">
                                                <a href="<?= $arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"] ?>">
                                                    <span><?= $arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"] ?></span>
                                                </a>
                                                <? if (is_array($arLevel_3) && !empty($arLevel_3)): ?>
                                                    <ul class="bx-nav-list-3-lvl">
                                                        <? foreach ($arLevel_3 as $itemIdLevel_3): ?>
                                                            <li class="bx-nav-3-lvl">
                                                                <a href="<?= $arResult["ALL_ITEMS"][$itemIdLevel_3]["LINK"] ?>">
                                                                    <span><?= $arResult["ALL_ITEMS"][$itemIdLevel_3]["TEXT"] ?></span>
                                                                </a>
                                                            </li>
                                                        <? endforeach; ?>
                                                    </ul>
                                                <? endif ?>
                                            </li>
                                        <? endforeach; ?>
                                    </ul>
                                <? endforeach; ?>
                            </div>
                        <? endif ?>
                    </li>
                <? endforeach; ?>
            </ul>
            <div style="clear: both;"></div>
        </nav>
    </div>

</div>