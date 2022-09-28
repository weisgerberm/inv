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
 * GameController
 */
class GameController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * gameRepository
     *
     * @var \Weisgerber\Inv\Domain\Repository\GameRepository
     */
    protected $gameRepository = null;

    /**
     * @param \Weisgerber\Inv\Domain\Repository\GameRepository $gameRepository
     */
    public function injectGameRepository(\Weisgerber\Inv\Domain\Repository\GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $games = $this->gameRepository->findAll();
        $this->view->assign('games', $games);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Weisgerber\Inv\Domain\Model\Game $game
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Weisgerber\Inv\Domain\Model\Game $game): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('game', $game);
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
     * @param \Weisgerber\Inv\Domain\Model\Game $newGame
     */
    public function createAction(\Weisgerber\Inv\Domain\Model\Game $newGame)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->gameRepository->add($newGame);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Weisgerber\Inv\Domain\Model\Game $game
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("game")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\Weisgerber\Inv\Domain\Model\Game $game): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('game', $game);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \Weisgerber\Inv\Domain\Model\Game $game
     */
    public function updateAction(\Weisgerber\Inv\Domain\Model\Game $game)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->gameRepository->update($game);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Weisgerber\Inv\Domain\Model\Game $game
     */
    public function deleteAction(\Weisgerber\Inv\Domain\Model\Game $game)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->gameRepository->remove($game);
        $this->redirect('list');
    }
}
