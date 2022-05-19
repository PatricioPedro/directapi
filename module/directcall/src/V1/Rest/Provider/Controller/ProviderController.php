<?php

/**
 * This app was built using PHP 7.4 it might not work so well in PHP 8.0+ 
 *  @author    https://twitter.com/pulenong
 */



declare(strict_types=1);

namespace directcall\V1\Rest\Provider\Controller;

use directcall\Form\Comment\CreateForm; # be sure to add this use statement
use directcall\Model\Table\ProviderTable; 
use Laminas\Authentication\AuthenticationService; # <- be sure to add this statement
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use RuntimeException;

class ProviderController extends AbstractActionController
{
    private $providerTable;

    public function __construct(
        ProviderTable $providerTable
    )
    {
        $this->providerTable = $providerTable;
    }

    public function createAction()
    {
       
        // $createForm = new CreateForm();
        // $request = $this->getRequest();

        // if ($request->isPost()) {
        //      $formData = $request->getPost()->toArray();
        //     // $createForm->setInputFilter($this->commentsTable->getCommentFormFilter());
        //     $createForm->setData($formData);

        //     try {
        //         $data = $createForm->getData();
        //         $this->providerTable->insertComment($data);

        //         return ['success' => true];

        //     } catch(\RuntimeException $exception) {
        //         return ['success' => false];
        //     }
        // }

        // return (new ViewModel())->setTerminal(true);

        return ['success' => true];
    }

    public function deleteAction()
    {
        # @todo - try completing this on your own.
        return (new ViewModel())->setTerminal(true);
    }

    public function editAction()
    {
        # @todo try completing this on your own
        return (new ViewModel())->setTerminal(true);
    }
}
