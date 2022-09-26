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
class Clothes extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Clothes name
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = '';

    /**
     * further text
     *
     * @var string
     */
    protected $description = '';

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
     * Image/s of the item
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $images = null;

    /**
     * Path slug
     *
     * @var string
     */
    protected $slug = '';

    /**
     * where the item is located
     *
     * @var \Weisgerber\Inv\Domain\Model\Location
     */
    protected $location = null;

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the images
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Sets the images
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $images
     * @return void
     */
    public function setImages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $images)
    {
        $this->images = $images;
    }

    /**
     * Returns the location
     *
     * @return \Weisgerber\Inv\Domain\Model\Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the location
     *
     * @param \Weisgerber\Inv\Domain\Model\Location $location
     * @return void
     */
    public function setLocation(\Weisgerber\Inv\Domain\Model\Location $location)
    {
        $this->location = $location;
    }

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

    /**
     * Returns the slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Sets the slug
     *
     * @param string $slug
     * @return void
     */
    public function setSlug(string $slug)
    {
        $this->slug = $slug;
    }
}
