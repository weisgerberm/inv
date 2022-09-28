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
class MovieControllerTest extends UnitTestCase
{
    /**
     * @var \Weisgerber\Inv\Controller\MovieController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Weisgerber\Inv\Controller\MovieController::class))
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
    public function listActionFetchesAllMoviesFromRepositoryAndAssignsThemToView(): void
    {
        $allMovies = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $movieRepository = $this->getMockBuilder(\Weisgerber\Inv\Domain\Repository\MovieRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $movieRepository->expects(self::once())->method('findAll')->will(self::returnValue($allMovies));
        $this->subject->_set('movieRepository', $movieRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('movies', $allMovies);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenMovieToView(): void
    {
        $movie = new \Weisgerber\Inv\Domain\Model\Movie();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('movie', $movie);

        $this->subject->showAction($movie);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenMovieToMovieRepository(): void
    {
        $movie = new \Weisgerber\Inv\Domain\Model\Movie();

        $movieRepository = $this->getMockBuilder(\Weisgerber\Inv\Domain\Repository\MovieRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $movieRepository->expects(self::once())->method('add')->with($movie);
        $this->subject->_set('movieRepository', $movieRepository);

        $this->subject->createAction($movie);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenMovieToView(): void
    {
        $movie = new \Weisgerber\Inv\Domain\Model\Movie();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('movie', $movie);

        $this->subject->editAction($movie);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenMovieInMovieRepository(): void
    {
        $movie = new \Weisgerber\Inv\Domain\Model\Movie();

        $movieRepository = $this->getMockBuilder(\Weisgerber\Inv\Domain\Repository\MovieRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $movieRepository->expects(self::once())->method('update')->with($movie);
        $this->subject->_set('movieRepository', $movieRepository);

        $this->subject->updateAction($movie);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenMovieFromMovieRepository(): void
    {
        $movie = new \Weisgerber\Inv\Domain\Model\Movie();

        $movieRepository = $this->getMockBuilder(\Weisgerber\Inv\Domain\Repository\MovieRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $movieRepository->expects(self::once())->method('remove')->with($movie);
        $this->subject->_set('movieRepository', $movieRepository);

        $this->subject->deleteAction($movie);
    }
}
