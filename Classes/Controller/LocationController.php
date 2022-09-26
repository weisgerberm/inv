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
 * LocationController
 */
class LocationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * action index
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function indexAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $locations = $this->locationRepository->findAll();
        $this->view->assign('locations', $locations);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Weisgerber\Inv\Domain\Model\Location $location
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Weisgerber\Inv\Domain\Model\Location $location): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('location', $location);
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
     * @param \Weisgerber\Inv\Domain\Model\Location $newLocation
     */
    public function createAction(\Weisgerber\Inv\Domain\Model\Location $newLocation)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->locationRepository->add($newLocation);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Weisgerber\Inv\Domain\Model\Location $location
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("location")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\Weisgerber\Inv\Domain\Model\Location $location): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('location', $location);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \Weisgerber\Inv\Domain\Model\Location $location
     */
    public function updateAction(\Weisgerber\Inv\Domain\Model\Location $location)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->locationRepository->update($location);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Weisgerber\Inv\Domain\Model\Location $location
     */
    public function deleteAction(\Weisgerber\Inv\Domain\Model\Location $location)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->locationRepository->remove($location);
        $this->redirect('list');
    }
}
