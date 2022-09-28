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
 * Platform
 */
class Platform extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * link
     *
     * @var string
     */
    protected $link = '';

    /**
     * thumbnail
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $thumbnail = null;

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
     * Returns the link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets the link
     *
     * @param string $link
     * @return void
     */
    public function setLink(string $link)
    {
        $this->link = $link;
    }

    /**
     * Returns the thumbnail
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Sets the thumbnail
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $thumbnail
     * @return void
     */
    public function setThumbnail(\TYPO3\CMS\Extbase\Domain\Model\FileReference $thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }
}
