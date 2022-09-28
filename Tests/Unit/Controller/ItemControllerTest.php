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
class ItemControllerTest extends UnitTestCase
{
    /**
     * @var \Weisgerber\Inv\Controller\ItemController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Weisgerber\Inv\Controller\ItemController::class))
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
    public function listActionFetchesAllItemsFromRepositoryAndAssignsThemToView(): void
    {
        $allItems = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $itemRepository = $this->getMockBuilder(\Weisgerber\Inv\Domain\Repository\ItemRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $itemRepository->expects(self::once())->method('findAll')->will(self::returnValue($allItems));
        $this->subject->_set('itemRepository', $itemRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('items', $allItems);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenItemToView(): void
    {
        $item = new \Weisgerber\Inv\Domain\Model\Item();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('item', $item);

        $this->subject->showAction($item);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenItemToItemRepository(): void
    {
        $item = new \Weisgerber\Inv\Domain\Model\Item();

        $itemRepository = $this->getMockBuilder(\Weisgerber\Inv\Domain\Repository\ItemRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $itemRepository->expects(self::once())->method('add')->with($item);
        $this->subject->_set('itemRepository', $itemRepository);

        $this->subject->createAction($item);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenItemToView(): void
    {
        $item = new \Weisgerber\Inv\Domain\Model\Item();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('item', $item);

        $this->subject->editAction($item);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenItemInItemRepository(): void
    {
        $item = new \Weisgerber\Inv\Domain\Model\Item();

        $itemRepository = $this->getMockBuilder(\Weisgerber\Inv\Domain\Repository\ItemRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $itemRepository->expects(self::once())->method('update')->with($item);
        $this->subject->_set('itemRepository', $itemRepository);

        $this->subject->updateAction($item);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenItemFromItemRepository(): void
    {
        $item = new \Weisgerber\Inv\Domain\Model\Item();

        $itemRepository = $this->getMockBuilder(\Weisgerber\Inv\Domain\Repository\ItemRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $itemRepository->expects(self::once())->method('remove')->with($item);
        $this->subject->_set('itemRepository', $itemRepository);

        $this->subject->deleteAction($item);
    }
}
