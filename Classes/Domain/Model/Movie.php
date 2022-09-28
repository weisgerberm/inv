<?php

declare(strict_types=1);

namespace Weisgerber\Inv\Domain\Model;


/**
 * This file is part of the "Inventory" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Mark Weisgerber <mark.weisgerber@outlook.de>
 */

/**
 * Movie
 */
class Movie extends \Weisgerber\Inv\Domain\Model\Item
{

    /**
     * platform
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Weisgerber\Inv\Domain\Model\Platform>
     */
    protected $platform = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->platform = $this->platform ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Platform
     *
     * @param \Weisgerber\Inv\Domain\Model\Platform $platform
     * @return void
     */
    public function addPlatform(\Weisgerber\Inv\Domain\Model\Platform $platform)
    {
        $this->platform->attach($platform);
    }

    /**
     * Removes a Platform
     *
     * @param \Weisgerber\Inv\Domain\Model\Platform $platformToRemove The Platform to be removed
     * @return void
     */
    public function removePlatform(\Weisgerber\Inv\Domain\Model\Platform $platformToRemove)
    {
        $this->platform->detach($platformToRemove);
    }

    /**
     * Returns the platform
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Weisgerber\Inv\Domain\Model\Platform>
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * Sets the platform
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Weisgerber\Inv\Domain\Model\Platform> $platform
     * @return void
     */
    public function setPlatform(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $platform)
    {
        $this->platform = $platform;
    }
}
