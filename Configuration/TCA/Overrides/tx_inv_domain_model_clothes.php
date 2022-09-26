<?php
defined('TYPO3') || die();
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

// Change Slug-Type
$GLOBALS['TCA']['tx_inv_domain_model_clothes']['columns']['slug']['config'] = [
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
$GLOBALS['TCA']['tx_inv_domain_model_clothes']['columns']['season']['config']['items'] = array(
    ['---','0'],
    ['Frühling','1'],
    ['Sommer','2'],
    ['Herbst','3'],
    ['Winter','4'],
);

$GLOBALS['TCA']['tx_inv_domain_model_clothes']['columns']['size']['config']['items'] = array(
    ['---','0'],
    ['XS','1'],
    ['S','2'],
    ['M','3'],
    ['L','4'],
    ['XL','5'],
    ['XXL','6'],
    ['40','7'],
    ['41','8'],
    ['42','9'],
    ['43','10'],
    ['44','11'],
);

$GLOBALS['TCA']['tx_inv_domain_model_clothes']['columns']['description']['config']['rows'] = 4;
