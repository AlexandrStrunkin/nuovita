<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$templateLibrary = array('popup');
$currencyList = '';
if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}
$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
	'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$strMainID = $this->GetEditAreaId($arResult['ID']);
$arItemIDs = array(
	'ID' => $strMainID,
	'PICT' => $strMainID.'_pict',
	'DISCOUNT_PICT_ID' => $strMainID.'_dsc_pict',
	'STICKER_ID' => $strMainID.'_sticker',
	'BIG_SLIDER_ID' => $strMainID.'_big_slider',
	'BIG_IMG_CONT_ID' => $strMainID.'_bigimg_cont',
	'SLIDER_CONT_ID' => $strMainID.'_slider_cont',
	'SLIDER_LIST' => $strMainID.'_slider_list',
	'SLIDER_LEFT' => $strMainID.'_slider_left',
	'SLIDER_RIGHT' => $strMainID.'_slider_right',
	'OLD_PRICE' => $strMainID.'_old_price',
	'PRICE' => $strMainID.'_price',
	'DISCOUNT_PRICE' => $strMainID.'_price_discount',
	'SLIDER_CONT_OF_ID' => $strMainID.'_slider_cont_',
	'SLIDER_LIST_OF_ID' => $strMainID.'_slider_list_',
	'SLIDER_LEFT_OF_ID' => $strMainID.'_slider_left_',
	'SLIDER_RIGHT_OF_ID' => $strMainID.'_slider_right_',
	'QUANTITY' => $strMainID.'_quantity',
	'QUANTITY_DOWN' => $strMainID.'_quant_down',
	'QUANTITY_UP' => $strMainID.'_quant_up',
	'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
	'QUANTITY_LIMIT' => $strMainID.'_quant_limit',
	'BASIS_PRICE' => $strMainID.'_basis_price',
	'BUY_LINK' => $strMainID.'_buy_link',
	'ADD_BASKET_LINK' => $strMainID.'_add_basket_link',
	'BASKET_ACTIONS' => $strMainID.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
	'COMPARE_LINK' => $strMainID.'_compare_link',
	'PROP' => $strMainID.'_prop_',
	'PROP_DIV' => $strMainID.'_skudiv',
	'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
	'OFFER_GROUP' => $strMainID.'_set_group_',
	'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
);
$strObName = 'ob'.preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);
$templateData['JS_OBJ'] = $strObName;

$GLOBALS['link_to_item_info'] = "#";
$GLOBALS['link_cat_id'] = [];

//echo '<pre>', print_r($arResult['DISPLAY_PROPERTIES'], 1), '</pre>';

    foreach ($arResult['DISPLAY_PROPERTIES'] as &$arOneProp)
    {
        if(strcmp($arOneProp['CODE'], "items") == 0)
        {
            $kkk = array_shift($arOneProp['LINK_ELEMENT_VALUE']);
			$GLOBALS['link_to_item_info'] = $kkk['DETAIL_PAGE_URL'];
			$GLOBALS['link_cat_id'] = $kkk['ID'];
            //echo($GLOBALS['link_to_item_info']);
        }
		elseif(strcmp($arOneProp['CODE'], "item_photos") === 0)
		{
            //echo("PPPPOOPPPP");
			//$kkk = array_shift($arOneProp['LINK_ELEMENT_VALUE']);
			//$GLOBALS['link_to_item_info'] = $kkk['DETAIL_PAGE_URL'];
			//$GLOBALS['link_cat_id'] = $kkk['ID'];

            $GLOBALS['link_cat_id'] = $arOneProp['VALUE'];

			//echo($GLOBALS['link_to_item_info']);
		}
    }
    unset($arOneProp);
/*
foreach ($arResult['PROPERTIES'] as &$arOneProp)
{
    if(strcmp($arOneProp['CODE'], "item_photos") == 0)
    {
        //print_r($arOneProp);
        //$kkk = array_shift($arOneProp['ID']);
        //$GLOBALS['link_to_item_info'] = $kkk['DETAIL_PAGE_URL'];
        array_push($GLOBALS['link_cat_id'], $arOneProp['ID']);
        //$GLOBALS['link_cat_id'] = $arOneProp['ID'];
        //echo($GLOBALS['link_to_item_info']);
    }
}
unset($arOneProp);

*/



