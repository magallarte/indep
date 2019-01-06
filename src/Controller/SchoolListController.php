<?php

namespace App\Controller;

use App\Entity\SchoolList;
use App\Form\SchoolListType;
use App\Repository\SchoolListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/school/list")
 */
class SchoolListController extends AbstractController
{
    /**
     * @Route("/", name="school_list_index", methods={"GET"})
     */
    public function index(SchoolListRepository $schoolListRepository): Response
    {
        return $this->render('school_list/index.html.twig', [
            'school_lists' => $schoolListRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="school_list_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $schoolList = new SchoolList();
        $form = $this->createForm(SchoolListType::class, $schoolList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($schoolList);
            $entityManager->flush();

            return $this->redirectToRoute('school_list_index');
        }

        return $this->render('school_list/new.html.twig', [
            'school_list' => $schoolList,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="school_list_show", methods={"GET"})
     */
    public function show(SchoolList $schoolList): Response
    {
        return $this->render('school_list/show.html.twig', [
            'school_list' => $schoolList,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="school_list_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SchoolList $schoolList): Response
    {
        $form = $this->createForm(SchoolListType::class, $schoolList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('school_list_index', [
                'id' => $schoolList->getId(),
            ]);
        }

        return $this->render('school_list/edit.html.twig', [
            'school_list' => $schoolList,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="school_list_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SchoolList $schoolList): Response
    {
        if ($this->isCsrfTokenValid('delete'.$schoolList->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($schoolList);
            $entityManager->flush();
        }

        return $this->redirectToRoute('school_list_index');
    }
}
