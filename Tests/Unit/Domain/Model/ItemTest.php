<?php

declare(strict_types=1);

namespace Weisgerber\Inv\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Mark Weisgerber <mark.weisgerber@outlook.de>
 */
class ItemTest extends UnitTestCase
{
    /**
     * @var \Weisgerber\Inv\Domain\Model\Item|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Weisgerber\Inv\Domain\Model\Item::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName(): void
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('name'));
    }

    /**
     * @test
     */
    public function getSlugReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getSlug()
        );
    }

    /**
     * @test
     */
    public function setSlugForStringSetsSlug(): void
    {
        $this->subject->setSlug('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('slug'));
    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('image'));
    }

    /**
     * @test
     */
    public function getPriceReturnsInitialValueForFloat(): void
    {
        self::assertSame(
            0.0,
            $this->subject->getPrice()
        );
    }

    /**
     * @test
     */
    public function setPriceForFloatSetsPrice(): void
    {
        $this->subject->setPrice(3.14159265);

        self::assertEquals(3.14159265, $this->subject->_get('price'));
    }

    /**
     * @test
     */
    public function getItemConditionReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getItemCondition()
        );
    }

    /**
     * @test
     */
    public function setItemConditionForIntSetsItemCondition(): void
    {
        $this->subject->setItemCondition(12);

        self::assertEquals(12, $this->subject->_get('itemCondition'));
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription(): void
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('description'));
    }

    /**
     * @test
     */
    public function getStatusReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getStatus()
        );
    }

    /**
     * @test
     */
    public function setStatusForIntSetsStatus(): void
    {
        $this->subject->setStatus(12);

        self::assertEquals(12, $this->subject->_get('status'));
    }

    /**
     * @test
     */
    public function getLocationReturnsInitialValueForLocation(): void
    {
        self::assertEquals(
            null,
            $this->subject->getLocation()
        );
    }

    /**
     * @test
     */
    public function setLocationForLocationSetsLocation(): void
    {
        $locationFixture = new \Weisgerber\Inv\Domain\Model\Location();
        $this->subject->setLocation($locationFixture);

        self::assertEquals($locationFixture, $this->subject->_get('location'));
    }

    /**
     * @test
     */
    public function getShopReturnsInitialValueForShop(): void
    {
        self::assertEquals(
            null,
            $this->subject->getShop()
        );
    }

    /**
     * @test
     */
    public function setShopForShopSetsShop(): void
    {
        $shopFixture = new \Weisgerber\Inv\Domain\Model\Shop();
        $this->subject->setShop($shopFixture);

        self::assertEquals($shopFixture, $this->subject->_get('shop'));
    }
}
