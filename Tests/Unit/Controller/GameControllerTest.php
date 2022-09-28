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
class GameControllerTest extends UnitTestCase
{
    /**
     * @var \Weisgerber\Inv\Controller\GameController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Weisgerber\Inv\Controller\GameController::class))
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
    public function listActionFetchesAllGamesFromRepositoryAndAssignsThemToView(): void
    {
        $allGames = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $gameRepository = $this->getMockBuilder(\Weisgerber\Inv\Domain\Repository\GameRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $gameRepository->expects(self::once())->method('findAll')->will(self::returnValue($allGames));
        $this->subject->_set('gameRepository', $gameRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('games', $allGames);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenGameToView(): void
    {
        $game = new \Weisgerber\Inv\Domain\Model\Game();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('game', $game);

        $this->subject->showAction($game);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenGameToGameRepository(): void
    {
        $game = new \Weisgerber\Inv\Domain\Model\Game();

        $gameRepository = $this->getMockBuilder(\Weisgerber\Inv\Domain\Repository\GameRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $gameRepository->expects(self::once())->method('add')->with($game);
        $this->subject->_set('gameRepository', $gameRepository);

        $this->subject->createAction($game);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenGameToView(): void
    {
        $game = new \Weisgerber\Inv\Domain\Model\Game();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('game', $game);

        $this->subject->editAction($game);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenGameInGameRepository(): void
    {
        $game = new \Weisgerber\Inv\Domain\Model\Game();

        $gameRepository = $this->getMockBuilder(\Weisgerber\Inv\Domain\Repository\GameRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $gameRepository->expects(self::once())->method('update')->with($game);
        $this->subject->_set('gameRepository', $gameRepository);

        $this->subject->updateAction($game);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenGameFromGameRepository(): void
    {
        $game = new \Weisgerber\Inv\Domain\Model\Game();

        $gameRepository = $this->getMockBuilder(\Weisgerber\Inv\Domain\Repository\GameRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $gameRepository->expects(self::once())->method('remove')->with($game);
        $this->subject->_set('gameRepository', $gameRepository);

        $this->subject->deleteAction($game);
    }
}
