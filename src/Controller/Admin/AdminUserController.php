<?php


namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepositoryInterface;
use App\Service\User\UserService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminUserController extends AdminBaseController
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var UserService $userService
     */
    private $userService;

    public function __construct(UserRepositoryInterface $userRepository, UserService $userService){
        $this->userRepository=$userRepository;
        $this->userService=$userService;
    }
    

    /**
     * @Route("/admin/user", name="admin_user")
     * @return Response
     */
    public function indexAction()
    {
        $forRender=parent::renderDefault();
        $forRender['title']="Пользователи";
        $forRender['users']=$this->userRepository->getAll();
        return $this->render('admin/user/index.html.twig', $forRender);
    }

    /**
     * @Route("/admin/user/create", name="admin_user_create")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function createAction(Request $request){
        $user= new User();
        $form=$this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if(($form->isSubmitted()) && ($form->isValid())){
            $this->userService->handleCreate($user);
            $this->addFlash('success', 'Пользователь создан!');
            return $this->redirectToRoute('admin_user');
        }
        $forRender=parent::renderDefault();
        $forRender['title']="Форма создания пользователя";
        $forRender['form']=$form->createView();
        return $this->render('admin/user/form.html.twig', $forRender);
    }
}