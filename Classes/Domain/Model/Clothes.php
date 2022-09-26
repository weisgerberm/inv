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
 * Clothes
 */
class Clothes extends \Weisgerber\Inv\Domain\Model\Item
{

    /**
     * items size
     *
     * @var int
     */
    protected $size = 0;

    /**
     * season when to wear the item
     *
     * @var int
     */
    protected $season = 0;

    /**
     * Returns the size
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Sets the size
     *
     * @param int $size
     * @return void
     */
    public function setSize(int $size)
    {
        $this->size = $size;
    }

    /**
     * Returns the season
     *
     * @return int
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Sets the season
     *
     * @param int $season
     * @return void
     */
    public function setSeason(int $season)
    {
        $this->season = $season;
    }
}
