<?php 

namespace Application\Controller;

use Application\Form\LoginForm;
use Application\Service\UserManager;
use Laminas\Authentication\AuthenticationServiceInterface;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class LoginController extends AbstractActionController
{
    /**
     * @var AuthenticationServiceInterface
     */
    protected $authService;

    /**
     * @var UserManager
     */
    protected $userManager;

    public function __construct(AuthenticationServiceInterface $authService, UserManager $userManager)
    {
        $this->authService = $authService;
        $this->userManager = $userManager;
    }

    public function loginAction()
    {
        $form = new LoginForm();

        $prg = $this->prg('/login', true);

        if ($prg instanceof \Laminas\Http\PhpEnvironment\Response) {
            // Returned a response to redirect us.
            return $prg;
        }

        $view = new ViewModel();
        $view->setTerminal(true);
        
        if ($prg === false) {

            $this->userManager->checkAdminCreate();

            $view->setVariable('form', $form);
            return $view;
        }

        $form->setData($prg);

        if ($form->isValid()) {
            $data = $form->getData();
            $adapter = $this->authService->getAdapter();
            $adapter->setIdentity($data['username']);
            $adapter->setCredential($data['password']);

            $result = $this->authService->authenticate();
            if ($result->isValid()) {
                return $this->redirect()->toRoute('home');
            }
        }

        $view->setVariable('form', $form);
        $view->setVariable('error', 'Los datos proporcionados no son válidos.');
        return $view;
    }
}
