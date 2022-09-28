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
 * ClothesController
 */
class ClothesController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * clothesRepository
     *
     * @var \Weisgerber\Inv\Domain\Repository\ClothesRepository
     */
    protected $clothesRepository = null;

    /**
     * @param \Weisgerber\Inv\Domain\Repository\ClothesRepository $clothesRepository
     */
    public function injectClothesRepository(\Weisgerber\Inv\Domain\Repository\ClothesRepository $clothesRepository)
    {
        $this->clothesRepository = $clothesRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $clothes = $this->clothesRepository->findAll();
        $this->view->assign('clothes', $clothes);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Weisgerber\Inv\Domain\Model\Clothes $clothes
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Weisgerber\Inv\Domain\Model\Clothes $clothes): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('clothes', $clothes);
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
     * @param \Weisgerber\Inv\Domain\Model\Clothes $newClothes
     */
    public function createAction(\Weisgerber\Inv\Domain\Model\Clothes $newClothes)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->clothesRepository->add($newClothes);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Weisgerber\Inv\Domain\Model\Clothes $clothes
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("clothes")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\Weisgerber\Inv\Domain\Model\Clothes $clothes): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('clothes', $clothes);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \Weisgerber\Inv\Domain\Model\Clothes $clothes
     */
    public function updateAction(\Weisgerber\Inv\Domain\Model\Clothes $clothes)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->clothesRepository->update($clothes);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Weisgerber\Inv\Domain\Model\Clothes $clothes
     */
    public function deleteAction(\Weisgerber\Inv\Domain\Model\Clothes $clothes)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->clothesRepository->remove($clothes);
        $this->redirect('list');
    }
}
