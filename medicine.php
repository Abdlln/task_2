<?php

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetAdditionalCSS('/local/templates/.default/css/medicine_form_styles.css');

$APPLICATION->IncludeComponent(
    'bitrix:form.result.new',
    'medicine',
    [
        'WEB_FORM_ID' => '2',
        'START_PAGE' => 'new',
        'SHOW_LIST_PAGE' => 'N',
        'SHOW_EDIT_PAGE' => 'N',
        'SHOW_VIEW_PAGE' => 'N',
        'SUCCESS_URL' => '/rezultatformy.php',
        'CHAIN_ITEM_TEXT' => '',
        'CHAIN_ITEM_LINK' => '',
        'COMPONENT_TEMPLATE' => 'medicine',
        'IGNORE_CUSTOM_TEMPLATE' => 'N',
        'USE_EXTENDED_ERRORS' => 'N',
        'SEF_MODE' => 'N',
        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => '3600',
        'LIST_URL' => '/rezultatformy.php',
        'EDIT_URL' => '/result_edit.php',
        'VARIABLE_ALIASES' => [
            'WEB_FORM_ID' => 'WEB_FORM_ID',
            'RESULT_ID' => 'RESULT_ID',
        ],
    ],
    false
);

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');