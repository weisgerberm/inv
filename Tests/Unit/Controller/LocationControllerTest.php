<?php

declare(strict_types=1);

namespace Weisgerber\Inv\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author Mark Weisgerber <mark.weisgerber@outlook.de>
 */
class LocationControllerTest extends UnitTestCase
{
    /**
     * @var \Weisgerber\Inv\Controller\LocationController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Weisgerber\Inv\Controller\LocationController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllLocationsFromRepositoryAndAssignsThemToView(): void
    {
        $allLocations = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $locationRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $locationRepository->expects(self::once())->method('findAll')->will(self::returnValue($allLocations));
        $this->subject->_set('locationRepository', $locationRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('locations', $allLocations);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenLocationToView(): void
    {
        $location = new \Weisgerber\Inv\Domain\Model\Location();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('location', $location);

        $this->subject->showAction($location);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenLocationToLocationRepository(): void
    {
        $location = new \Weisgerber\Inv\Domain\Model\Location();

        $locationRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $locationRepository->expects(self::once())->method('add')->with($location);
        $this->subject->_set('locationRepository', $locationRepository);

        $this->subject->createAction($location);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenLocationToView(): void
    {
        $location = new \Weisgerber\Inv\Domain\Model\Location();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('location', $location);

        $this->subject->editAction($location);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenLocationInLocationRepository(): void
    {
        $location = new \Weisgerber\Inv\Domain\Model\Location();

        $locationRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $locationRepository->expects(self::once())->method('update')->with($location);
        $this->subject->_set('locationRepository', $locationRepository);

        $this->subject->updateAction($location);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenLocationFromLocationRepository(): void
    {
        $location = new \Weisgerber\Inv\Domain\Model\Location();

        $locationRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $locationRepository->expects(self::once())->method('remove')->with($location);
        $this->subject->_set('locationRepository', $locationRepository);

        $this->subject->deleteAction($location);
    }
}
