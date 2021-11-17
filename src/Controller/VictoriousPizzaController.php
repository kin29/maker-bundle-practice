<?php

namespace App\Controller;

use App\Entity\VictoriousPizza;
use App\Form\VictoriousPizzaType;
use App\Repository\VictoriousPizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/victorious/pizza')]
class VictoriousPizzaController extends AbstractController
{
    #[Route('/', name: 'victorious_pizza_index', methods: ['GET'])]
    public function index(VictoriousPizzaRepository $victoriousPizzaRepository): Response
    {
        return $this->render('victorious_pizza/index.html.twig', [
            'victorious_pizzas' => $victoriousPizzaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'victorious_pizza_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $victoriousPizza = new VictoriousPizza();
        $form = $this->createForm(VictoriousPizzaType::class, $victoriousPizza);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($victoriousPizza);
            $entityManager->flush();

            return $this->redirectToRoute('victorious_pizza_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('victorious_pizza/new.html.twig', [
            'victorious_pizza' => $victoriousPizza,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'victorious_pizza_show', methods: ['GET'])]
    public function show(VictoriousPizza $victoriousPizza): Response
    {
        return $this->render('victorious_pizza/show.html.twig', [
            'victorious_pizza' => $victoriousPizza,
        ]);
    }

    #[Route('/{id}/edit', name: 'victorious_pizza_edit', methods: ['GET','POST'])]
    public function edit(Request $request, VictoriousPizza $victoriousPizza): Response
    {
        $form = $this->createForm(VictoriousPizzaType::class, $victoriousPizza);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('victorious_pizza_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('victorious_pizza/edit.html.twig', [
            'victorious_pizza' => $victoriousPizza,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'victorious_pizza_delete', methods: ['POST'])]
    public function delete(Request $request, VictoriousPizza $victoriousPizza): Response
    {
        if ($this->isCsrfTokenValid('delete'.$victoriousPizza->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($victoriousPizza);
            $entityManager->flush();
        }

        return $this->redirectToRoute('victorious_pizza_index', [], Response::HTTP_SEE_OTHER);
    }
}
