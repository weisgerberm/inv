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
class ClothesControllerTest extends UnitTestCase
{
    /**
     * @var \Weisgerber\Inv\Controller\ClothesController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Weisgerber\Inv\Controller\ClothesController::class))
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
    public function listActionFetchesAllClothesFromRepositoryAndAssignsThemToView(): void
    {
        $allClothes = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $clothesRepository = $this->getMockBuilder(\Weisgerber\Inv\Domain\Repository\ClothesRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $clothesRepository->expects(self::once())->method('findAll')->will(self::returnValue($allClothes));
        $this->subject->_set('clothesRepository', $clothesRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('clothes', $allClothes);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenClothesToView(): void
    {
        $clothes = new \Weisgerber\Inv\Domain\Model\Clothes();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('clothes', $clothes);

        $this->subject->showAction($clothes);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenClothesToClothesRepository(): void
    {
        $clothes = new \Weisgerber\Inv\Domain\Model\Clothes();

        $clothesRepository = $this->getMockBuilder(\Weisgerber\Inv\Domain\Repository\ClothesRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $clothesRepository->expects(self::once())->method('add')->with($clothes);
        $this->subject->_set('clothesRepository', $clothesRepository);

        $this->subject->createAction($clothes);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenClothesToView(): void
    {
        $clothes = new \Weisgerber\Inv\Domain\Model\Clothes();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('clothes', $clothes);

        $this->subject->editAction($clothes);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenClothesInClothesRepository(): void
    {
        $clothes = new \Weisgerber\Inv\Domain\Model\Clothes();

        $clothesRepository = $this->getMockBuilder(\Weisgerber\Inv\Domain\Repository\ClothesRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $clothesRepository->expects(self::once())->method('update')->with($clothes);
        $this->subject->_set('clothesRepository', $clothesRepository);

        $this->subject->updateAction($clothes);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenClothesFromClothesRepository(): void
    {
        $clothes = new \Weisgerber\Inv\Domain\Model\Clothes();

        $clothesRepository = $this->getMockBuilder(\Weisgerber\Inv\Domain\Repository\ClothesRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $clothesRepository->expects(self::once())->method('remove')->with($clothes);
        $this->subject->_set('clothesRepository', $clothesRepository);

        $this->subject->deleteAction($clothes);
    }
}
