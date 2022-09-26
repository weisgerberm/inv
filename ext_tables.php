<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_inv_domain_model_clothes', 'EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_clothes.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_inv_domain_model_clothes');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_inv_domain_model_location', 'EXT:inv/Resources/Private/Language/locallang_csh_tx_inv_domain_model_location.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_inv_domain_model_location');
})();
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder