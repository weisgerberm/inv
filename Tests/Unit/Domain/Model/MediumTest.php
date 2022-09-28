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
class MediumTest extends UnitTestCase
{
    /**
     * @var \Weisgerber\Inv\Domain\Model\Medium|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Weisgerber\Inv\Domain\Model\Medium::class,
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
    public function getSizeReturnsInitialValueForFloat(): void
    {
        self::assertSame(
            0.0,
            $this->subject->getSize()
        );
    }

    /**
     * @test
     */
    public function setSizeForFloatSetsSize(): void
    {
        $this->subject->setSize(3.14159265);

        self::assertEquals(3.14159265, $this->subject->_get('size'));
    }
}
