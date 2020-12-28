<?php
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class actaController extends AbstractActionController
{
    public function actaAction()
    {
        return new ViewModel();
    }
}