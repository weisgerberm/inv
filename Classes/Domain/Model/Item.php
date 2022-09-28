<?php

declare(strict_types=1);

namespace Weisgerber\Inv\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * This file is part of the "Inventory" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Mark Weisgerber <mark.weisgerber@outlook.de>
 */

/**
 * Item
 */
class Item extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Path slug
     *
     * @var ObjectStorage<Category>
     */
    protected $categories = null;

    /**
     * Items name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Path slug
     *
     * @var string
     */
    protected $slug = '';

    /**
     * Image/s of the item
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * price
     *
     * @var float
     */
    protected $price = 0.0;

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * location
     *
     * @var \Weisgerber\Inv\Domain\Model\Location
     */
    protected $location = null;

    /**
     * shop
     *
     * @var \Weisgerber\Inv\Domain\Model\Shop
     */
    protected $shop = null;

    /**
     * items condition
     *
     * @var int
     */
    protected $itemCondition = 0;

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

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the price
     *
     * @param float $price
     * @return void
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
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
     * Returns the shop
     *
     * @return \Weisgerber\Inv\Domain\Model\Shop
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * Sets the shop
     *
     * @param \Weisgerber\Inv\Domain\Model\Shop $shop
     * @return void
     */
    public function setShop(\Weisgerber\Inv\Domain\Model\Shop $shop)
    {
        $this->shop = $shop;
    }

    /**
     * @return ObjectStorage
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param ObjectStorage $categories
     */
    public function setCategories(ObjectStorage $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Returns the itemCondition
     *
     * @return int
     */
    public function getItemCondition()
    {
        return $this->itemCondition;
    }

    /**
     * Sets the itemCondition
     *
     * @param int $itemCondition
     * @return void
     */
    public function setItemCondition(int $itemCondition)
    {
        $this->itemCondition = $itemCondition;
    }
}
