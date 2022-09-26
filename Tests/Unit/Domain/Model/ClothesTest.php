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
}
