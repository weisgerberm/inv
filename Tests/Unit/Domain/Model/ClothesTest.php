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
class ClothesTest extends UnitTestCase
{
    /**
     * @var \Weisgerber\Inv\Domain\Model\Clothes|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Weisgerber\Inv\Domain\Model\Clothes::class,
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
    public function getSizeReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getSize()
        );
    }

    /**
     * @test
     */
    public function setSizeForIntSetsSize(): void
    {
        $this->subject->setSize(12);

        self::assertEquals(12, $this->subject->_get('size'));
    }

    /**
     * @test
     */
    public function getSeasonReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getSeason()
        );
    }

    /**
     * @test
     */
    public function setSeasonForIntSetsSeason(): void
    {
        $this->subject->setSeason(12);

        self::assertEquals(12, $this->subject->_get('season'));
    }

    /**
     * @test
     */
    public function getImagesReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function setImagesForFileReferenceSetsImages(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImages($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('images'));
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
}
