<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Menu;
use AppBundle\Entity\MenuLike;
use AppBundle\Entity\User;
use AppBundle\Forms\MenuType;
use AppBundle\Forms\MenuLikeType;
use AppBundle\Forms\UserType;
use AppBundle\Services\MenuLikeService;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/menus", name="list_menupage")
     */
    public function listMenusAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Menu');

        $menus = $repository->findAllOrderedByName();
        // replace this example code with whatever you need
        return $this->render('menus/list_menus.html.twig', ['listMenus' => $menus]);
    }

    /**
     * @Route("/menus/add", name="add_menupage")
     */
    public function addMenuAction(Request $request)
    {
        $menu = new Menu();

        $form = $this->createForm(MenuType::class, $menu);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $menu = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($menu);
            $em->flush($menu);

            return $this->redirectToRoute('menupage', ['id' => $menu->getId()]);
        }

        return $this->render('menus/add_menu.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/menus/delete/{id}", name="delete_menupage")
     */
    public function deleteMenuAction($id, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Menu');

        $menu = $repository->findOneById($id);

        if(!$menu)
            throw new NotFoundHttpException('Menu d\'id "'.$id.'" inexistant.');

        $em = $this->getDoctrine()->getManager();
        $em->remove($menu);
        $em->flush($menu);

        $menus = $repository->findAllOrderedByName();

        return $this->render('menus/list_menus.html.twig', ['listMenus' => $menus]);
    }

    /**
     * @Route("/menus/{id}", name="menupage")
     */
    public function menuAction($id, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Menu');

        $menu = $repository->findOneById($id);

        if(!$menu)
            throw new NotFoundHttpException('Menu d\'id "'.$id.'" inexistant.');

        $rating = new MenuLike();

        $form = $this->createForm(MenuLikeType::class, $rating);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $rating = $form->getData();
            $rating->setMenu($menu);

            $em = $this->getDoctrine()->getManager();
            $em->persist($rating);
            $em->flush($rating);
        }

        $nbNotes = $this
        ->container
        ->get('app.menu_like_service')
        ->getTotalMenuLike($id);

        $moyenne = $this
        ->container
        ->get('app.menu_like_service')
        ->getMoyenneMenuLike($id);

        if($nbNotes == 0)
            $moyenne = "Pas encore de note !";

        return $this->render('menus/menu.html.twig', ['menu'  => $menu, 'form' => $form->createView()]);
    }

    /**
     * @Route("/contact", name="contactpage")
     */
    public function contactAction(Request $request)
    {
        return $this->render('contact.html.twig');
    }

    /**
    * @Route("/register", name="registerpage")
    */
    public function registerAction(Request $request)
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();
            $encoder = $this->container->get('security.password_encoder');

            $user->setPassword($encoder->encodePassword($user, $user->getPassword()));
            $user->setRole('ROLE_USER');

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush($user);

            $repository = $this->getDoctrine()->getRepository('AppBundle:Menu');
            $menus = $repository->findAllOrderedByName();

            return $this->redirectToRoute('list_menupage', ['listMenus' => $menus]);
        }

        return $this->render('register.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
