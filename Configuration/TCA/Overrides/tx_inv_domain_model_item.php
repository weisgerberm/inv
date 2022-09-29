<?php
defined('TYPO3') || die();

if (!isset($GLOBALS['TCA']['tx_inv_domain_model_item']['ctrl']['type'])) {
    // no type field defined, so we define it here. This will only happen the first time the extension is installed!!
    $GLOBALS['TCA']['tx_inv_domain_model_item']['ctrl']['type'] = 'tx_extbase_type';
    $tempColumnstx_inv_tx_inv_domain_model_item = [];
    $tempColumnstx_inv_tx_inv_domain_model_item[$GLOBALS['TCA']['tx_inv_domain_model_item']['ctrl']['type']] = [
        'exclude' => true,
        'label' => 'LLL:EXT:inv/Resources/Private/Language/locallang_db.xlf:tx_inv.tx_extbase_type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['', ''],
                ['Clothes', 'Tx_Inv_Clothes']
            ],
            'default' => 'Tx_Inv_Clothes',
            'size' => 1,
            'maxitems' => 1,
        ]
    ];
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_inv_domain_model_item', $tempColumnstx_inv_tx_inv_domain_model_item);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_inv_domain_model_item',
    $GLOBALS['TCA']['tx_inv_domain_model_item']['ctrl']['type'],
    '',
    'after:' . $GLOBALS['TCA']['tx_inv_domain_model_item']['ctrl']['label']
);

$tmp_inv_columns = [

    'size' => [
        'exclude' => true,
        'label' => 'LLL:EXT:inv/Resources/Private/Language/locallang_db.xlf:tx_inv_domain_model_clothes.size',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['-- Label --', 0],
            ],
            'size' => 1,
            'maxitems' => 1,
            'eval' => ''
        ],
    ],
    'season' => [
        'exclude' => true,
        'label' => 'LLL:EXT:inv/Resources/Private/Language/locallang_db.xlf:tx_inv_domain_model_clothes.season',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['-- Label --', 0],
            ],
            'size' => 1,
            'maxitems' => 1,
            'eval' => ''
        ],
    ],

];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_inv_domain_model_item', $tmp_inv_columns);

// inherit and extend the show items from the parent class
if (isset($GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Item']['showitem'])) {
    $GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Clothes']['showitem'] = $GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Item']['showitem'];
} elseif (is_array($GLOBALS['TCA']['tx_inv_domain_model_item']['types'])) {
    // use first entry in types array
    $tx_inv_domain_model_item_type_definition = reset($GLOBALS['TCA']['tx_inv_domain_model_item']['types']);
    $GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Clothes']['showitem'] = $tx_inv_domain_model_item_type_definition['showitem'];
} else {
    $GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Clothes']['showitem'] = '';
}
$GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Clothes']['showitem'] .= ',--div--;LLL:EXT:inv/Resources/Private/Language/locallang_db.xlf:tx_inv_domain_model_clothes,';
$GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Clothes']['showitem'] .= 'size, season';

$GLOBALS['TCA']['tx_inv_domain_model_item']['columns'][$GLOBALS['TCA']['tx_inv_domain_model_item']['ctrl']['type']]['config']['items'][] = [
    'LLL:EXT:inv/Resources/Private/Language/locallang_db.xlf:tx_inv_domain_model_item.tx_extbase_type.Tx_Inv_Clothes',
    'Tx_Inv_Clothes'
];

$tmp_inv_columns = [

    'link' => [
        'exclude' => true,
        'label' => 'LLL:EXT:inv/Resources/Private/Language/locallang_db.xlf:tx_inv_domain_model_game.link',
        'config' => [
            'type' => 'input',
            'renderType' => 'inputLink',
        ]
    ],
    'digital' => [
        'exclude' => true,
        'label' => 'LLL:EXT:inv/Resources/Private/Language/locallang_db.xlf:tx_inv_domain_model_game.digital',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'items' => [
                [
                    0 => '',
                    1 => '',
                ]
            ],
            'default' => 0,
        ]
    ],
    'platform' => [
        'exclude' => true,
        'label' => 'LLL:EXT:inv/Resources/Private/Language/locallang_db.xlf:tx_inv_domain_model_game.platform',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_inv_domain_model_platform',
            'MM' => 'tx_inv_game_platform_mm',
            'size' => 10,
            'autoSizeMax' => 30,
            'maxitems' => 9999,
            'multiple' => 0,
            'fieldControl' => [
                'editPopup' => [
                    'disabled' => false,
                ],
                'addRecord' => [
                    'disabled' => false,
                ],
                'listModule' => [
                    'disabled' => true,
                ],
            ],
        ],
        
    ],

];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_inv_domain_model_item', $tmp_inv_columns);

// inherit and extend the show items from the parent class
if (isset($GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Item']['showitem'])) {
    $GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Game']['showitem'] = $GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Item']['showitem'];
} elseif (is_array($GLOBALS['TCA']['tx_inv_domain_model_item']['types'])) {
    // use first entry in types array
    $tx_inv_domain_model_item_type_definition = reset($GLOBALS['TCA']['tx_inv_domain_model_item']['types']);
    $GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Game']['showitem'] = $tx_inv_domain_model_item_type_definition['showitem'];
} else {
    $GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Game']['showitem'] = '';
}
$GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Game']['showitem'] .= ',--div--;LLL:EXT:inv/Resources/Private/Language/locallang_db.xlf:tx_inv_domain_model_game,';
$GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Game']['showitem'] .= 'link, digital, platform';

$GLOBALS['TCA']['tx_inv_domain_model_item']['columns'][$GLOBALS['TCA']['tx_inv_domain_model_item']['ctrl']['type']]['config']['items'][] = [
    'LLL:EXT:inv/Resources/Private/Language/locallang_db.xlf:tx_inv_domain_model_item.tx_extbase_type.Tx_Inv_Game',
    'Tx_Inv_Game'
];

$tmp_inv_columns = [

    'platform' => [
        'exclude' => true,
        'label' => 'LLL:EXT:inv/Resources/Private/Language/locallang_db.xlf:tx_inv_domain_model_movie.platform',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_inv_domain_model_platform',
            'MM' => 'tx_inv_movie_platform_mm',
            'size' => 10,
            'autoSizeMax' => 30,
            'maxitems' => 9999,
            'multiple' => 0,
            'fieldControl' => [
                'editPopup' => [
                    'disabled' => false,
                ],
                'addRecord' => [
                    'disabled' => false,
                ],
                'listModule' => [
                    'disabled' => true,
                ],
            ],
        ],
        
    ],

];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_inv_domain_model_item', $tmp_inv_columns);

// inherit and extend the show items from the parent class
if (isset($GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Item']['showitem'])) {
    $GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Movie']['showitem'] = $GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Item']['showitem'];
} elseif (is_array($GLOBALS['TCA']['tx_inv_domain_model_item']['types'])) {
    // use first entry in types array
    $tx_inv_domain_model_item_type_definition = reset($GLOBALS['TCA']['tx_inv_domain_model_item']['types']);
    $GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Movie']['showitem'] = $tx_inv_domain_model_item_type_definition['showitem'];
} else {
    $GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Movie']['showitem'] = '';
}
$GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Movie']['showitem'] .= ',--div--;LLL:EXT:inv/Resources/Private/Language/locallang_db.xlf:tx_inv_domain_model_movie,';
$GLOBALS['TCA']['tx_inv_domain_model_item']['types']['Tx_Inv_Movie']['showitem'] .= 'platform';

$GLOBALS['TCA']['tx_inv_domain_model_item']['columns'][$GLOBALS['TCA']['tx_inv_domain_model_item']['ctrl']['type']]['config']['items'][] = [
    'LLL:EXT:inv/Resources/Private/Language/locallang_db.xlf:tx_inv_domain_model_item.tx_extbase_type.Tx_Inv_Movie',
    'Tx_Inv_Movie'
];
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

// Change Slug-Type
$GLOBALS['TCA']['tx_inv_domain_model_item']['columns']['slug']['config'] = [
    'type' => 'slug',
    'size' => 200,
    'generatorOptions' => [
        'fields' => ['name'],
        'fieldSeparator' => '/',
        'prefixParentPageSlug' => true,
        'replacements' => [
            '/' => '-'
        ],
    ],
    'fallbackCharacter' => '-',
    'eval' => 'unique'
];

$GLOBALS['TCA']['tx_inv_domain_model_item']['columns']['shop']['config']['default'] = '';
$GLOBALS['TCA']['tx_inv_domain_model_item']['columns']['location']['config']['default'] = '';
$GLOBALS['TCA']['tx_inv_domain_model_item']['columns']['season']['config']['renderType'] = 'selectMultipleSideBySide';
$GLOBALS['TCA']['tx_inv_domain_model_item']['columns']['season']['config']['size'] = 4;
$GLOBALS['TCA']['tx_inv_domain_model_item']['columns']['season']['config']['maxitems'] = 4;
$GLOBALS['TCA']['tx_inv_domain_model_item']['columns']['season']['config']['items'] = array(
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:season.1','1'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:season.2','2'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:season.3','3'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:season.4','4'],
);
$GLOBALS['TCA']['tx_inv_domain_model_item']['columns']['item_condition']['config']['items'] = array(
    ['LLL:EXT:inv/Resources/Private/Language/locallang.xlf:condition.0','0'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang.xlf:condition.1','1'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang.xlf:condition.2','2'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang.xlf:condition.3','3'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang.xlf:condition.4','4'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang.xlf:condition.5','5'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang.xlf:condition.6','6'],
);

$GLOBALS['TCA']['tx_inv_domain_model_item']['columns']['size']['config']['items'] = array(
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.0','0'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.10','10'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.20','20'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.30','30'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.40','40'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.50','50'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.60','60'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.70','70'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.75','75'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.80','80'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.85','85'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.90','90'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.95','95'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.100','100'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.105','105'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.110','110'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.115','115'],
    ['LLL:EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf:size.120','120'],


);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_inv_domain_model_item',
    'categories',
    '',
    'after:slug'
);