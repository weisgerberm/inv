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
 * ItemController
 */
class ItemController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * itemRepository
     *
     * @var \Weisgerber\Inv\Domain\Repository\ItemRepository
     */
    protected $itemRepository = null;

    /**
     * @param \Weisgerber\Inv\Domain\Repository\ItemRepository $itemRepository
     */
    public function injectItemRepository(\Weisgerber\Inv\Domain\Repository\ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $items = $this->itemRepository->findAll();
        $this->view->assign('items', $items);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Weisgerber\Inv\Domain\Model\Item $item
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Weisgerber\Inv\Domain\Model\Item $item): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('item', $item);
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
     * @param \Weisgerber\Inv\Domain\Model\Item $newItem
     */
    public function createAction(\Weisgerber\Inv\Domain\Model\Item $newItem)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->itemRepository->add($newItem);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Weisgerber\Inv\Domain\Model\Item $item
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("item")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\Weisgerber\Inv\Domain\Model\Item $item): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('item', $item);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \Weisgerber\Inv\Domain\Model\Item $item
     */
    public function updateAction(\Weisgerber\Inv\Domain\Model\Item $item)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->itemRepository->update($item);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Weisgerber\Inv\Domain\Model\Item $item
     */
    public function deleteAction(\Weisgerber\Inv\Domain\Model\Item $item)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->itemRepository->remove($item);
        $this->redirect('list');
    }
}
