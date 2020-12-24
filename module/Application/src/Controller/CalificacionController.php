<?php
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class CalificacionController extends AbstractActionController
{
    public function calificacionAction()
    {
        return new ViewModel();
    }
}