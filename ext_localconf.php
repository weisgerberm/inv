<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Inv',
        'Main',
        [
            \Weisgerber\Inv\Controller\ClothesController::class => 'list, show, new, create, edit, update, delete',
            \Weisgerber\Inv\Controller\ItemController::class => 'list, show, new, create, edit, update, delete',
            \Weisgerber\Inv\Controller\LocationController::class => 'index, list, show, new, create, edit, update, delete'
        ],
        // non-cacheable actions
        [
            \Weisgerber\Inv\Controller\ClothesController::class => 'list, show, new, create, edit, update, delete',
            \Weisgerber\Inv\Controller\ItemController::class => 'list, show, new, create, edit, update, delete',
            \Weisgerber\Inv\Controller\LocationController::class => 'index, list, show, new, create, edit, update, delete'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    main {
                        iconIdentifier = inv-plugin-main
                        title = LLL:EXT:inv/Resources/Private/Language/locallang_db.xlf:tx_inv_main.name
                        description = LLL:EXT:inv/Resources/Private/Language/locallang_db.xlf:tx_inv_main.description
                        tt_content_defValues {
                            CType = list
                            list_type = inv_main
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder