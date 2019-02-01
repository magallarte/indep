<?php

namespace App\Controller;

use App\Entity\Page;
use App\Form\PageType;
use App\Repository\PageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface; 

/**
 * @Route("/page")
 */
class PageController extends AbstractController
{
    /**
     * @Route("/", name="page_index", methods={"GET"})
     */
    public function index(PageRepository $pageRepository): Response
    {
        return $this->render('page/index.html.twig', [
            'pages' => $pageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/maternelle", name="page_maternelle", methods={"GET"})
     */
    public function maternelle(PageRepository $pageRepository, Request $request,SessionInterface $session): Response
    {
        return $this->render('page/maternelle.html.twig', [
            'pages' => $pageRepository->findAll(),
        ]);
    }
 
    /**
     * @Route("/decouvrir", name="page_decouvrir", methods={"GET"})
     */
    public function decouvrir(PageRepository $pageRepository, Request $request,SessionInterface $session): Response
    {
        return $this->render('page/decouvrir.html.twig', [
            'pages' => $pageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/sinformer", name="page_sinformer", methods={"GET"})
     */
    public function sinformer(PageRepository $pageRepository, Request $request,SessionInterface $session): Response
    {
        return $this->render('page/sinformer.html.twig', [
            'pages' => $pageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/adherer", name="page_adherer", methods={"GET"})
     */
    public function adherer(PageRepository $pageRepository, Request $request,SessionInterface $session): Response
    {
        return $this->render('page/adherer.html.twig', [
            'pages' => $pageRepository->findAll(),
        ]);
    }

        /**
     * @Route("/participer", name="page_participer", methods={"GET"})
     */
    public function participer(PageRepository $pageRepository, Request $request,SessionInterface $session): Response
    {
        return $this->render('page/participer.html.twig', [
            'pages' => $pageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/creeruneliste", name="page_creeruneliste", methods={"GET"})
     */
    public function creeruneliste(PageRepository $pageRepository, Request $request,SessionInterface $session): Response
    {
        return $this->render('page/creeruneliste.html.twig', [
            'pages' => $pageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="page_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $page = new Page();
        $form = $this->createForm(PageType::class, $page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($page);
            $entityManager->flush();

            return $this->redirectToRoute('page_index');
        }

        return $this->render('page/new.html.twig', [
            'page' => $page,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="page_show", methods={"GET"})
     */
    public function show(Page $page): Response
    {
        return $this->render('page/show.html.twig', [
            'page' => $page,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="page_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Page $page): Response
    {
        $form = $this->createForm(PageType::class, $page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('page_index', [
                'id' => $page->getId(),
            ]);
        }

        return $this->render('page/edit.html.twig', [
            'page' => $page,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="page_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Page $page): Response
    {
        if ($this->isCsrfTokenValid('delete'.$page->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($page);
            $entityManager->flush();
        }

        return $this->redirectToRoute('page_index');
    }
}
