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
class PlatformTest extends UnitTestCase
{
    /**
     * @var \Weisgerber\Inv\Domain\Model\Platform|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Weisgerber\Inv\Domain\Model\Platform::class,
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
    public function getLinkReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getLink()
        );
    }

    /**
     * @test
     */
    public function setLinkForStringSetsLink(): void
    {
        $this->subject->setLink('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('link'));
    }

    /**
     * @test
     */
    public function getThumbnailReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getThumbnail()
        );
    }

    /**
     * @test
     */
    public function setThumbnailForFileReferenceSetsThumbnail(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setThumbnail($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('thumbnail'));
    }
}
