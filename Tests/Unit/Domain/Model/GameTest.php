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
class GameTest extends UnitTestCase
{
    /**
     * @var \Weisgerber\Inv\Domain\Model\Game|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Weisgerber\Inv\Domain\Model\Game::class,
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
    public function getDigitalReturnsInitialValueForBool(): void
    {
        self::assertFalse($this->subject->getDigital());
    }

    /**
     * @test
     */
    public function setDigitalForBoolSetsDigital(): void
    {
        $this->subject->setDigital(true);

        self::assertEquals(true, $this->subject->_get('digital'));
    }

    /**
     * @test
     */
    public function getPlatformReturnsInitialValueForPlatform(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getPlatform()
        );
    }

    /**
     * @test
     */
    public function setPlatformForObjectStorageContainingPlatformSetsPlatform(): void
    {
        $platform = new \Weisgerber\Inv\Domain\Model\Platform();
        $objectStorageHoldingExactlyOnePlatform = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOnePlatform->attach($platform);
        $this->subject->setPlatform($objectStorageHoldingExactlyOnePlatform);

        self::assertEquals($objectStorageHoldingExactlyOnePlatform, $this->subject->_get('platform'));
    }

    /**
     * @test
     */
    public function addPlatformToObjectStorageHoldingPlatform(): void
    {
        $platform = new \Weisgerber\Inv\Domain\Model\Platform();
        $platformObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $platformObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($platform));
        $this->subject->_set('platform', $platformObjectStorageMock);

        $this->subject->addPlatform($platform);
    }

    /**
     * @test
     */
    public function removePlatformFromObjectStorageHoldingPlatform(): void
    {
        $platform = new \Weisgerber\Inv\Domain\Model\Platform();
        $platformObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $platformObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($platform));
        $this->subject->_set('platform', $platformObjectStorageMock);

        $this->subject->removePlatform($platform);
    }
}
