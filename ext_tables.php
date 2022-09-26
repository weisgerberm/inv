<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_inv_domain_model_location', 'EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_location.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_inv_domain_model_location');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_inv_domain_model_shop', 'EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_shop.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_inv_domain_model_shop');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_inv_domain_model_item', 'EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_item.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_inv_domain_model_item');
})();
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder