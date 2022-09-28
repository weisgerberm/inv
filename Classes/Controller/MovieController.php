<?php

declare(strict_types=1);

namespace Weisgerber\Inv\Controller;


/**
 * This file is part of the "Inventory" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Mark Weisgerber <mark.weisgerber@outlook.de>
 */

/**
 * MovieController
 */
class MovieController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * movieRepository
     *
     * @var \Weisgerber\Inv\Domain\Repository\MovieRepository
     */
    protected $movieRepository = null;

    /**
     * @param \Weisgerber\Inv\Domain\Repository\MovieRepository $movieRepository
     */
    public function injectMovieRepository(\Weisgerber\Inv\Domain\Repository\MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $movies = $this->movieRepository->findAll();
        $this->view->assign('movies', $movies);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Weisgerber\Inv\Domain\Model\Movie $movie
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Weisgerber\Inv\Domain\Model\Movie $movie): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('movie', $movie);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action create
     *
     * @param \Weisgerber\Inv\Domain\Model\Movie $newMovie
     */
    public function createAction(\Weisgerber\Inv\Domain\Model\Movie $newMovie)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->movieRepository->add($newMovie);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Weisgerber\Inv\Domain\Model\Movie $movie
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("movie")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\Weisgerber\Inv\Domain\Model\Movie $movie): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('movie', $movie);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \Weisgerber\Inv\Domain\Model\Movie $movie
     */
    public function updateAction(\Weisgerber\Inv\Domain\Model\Movie $movie)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->movieRepository->update($movie);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Weisgerber\Inv\Domain\Model\Movie $movie
     */
    public function deleteAction(\Weisgerber\Inv\Domain\Model\Movie $movie)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->movieRepository->remove($movie);
        $this->redirect('list');
    }
}
