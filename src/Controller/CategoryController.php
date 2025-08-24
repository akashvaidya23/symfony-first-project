<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategoryRepository;
use App\Entity\Category;
use App\Form\CategoryCreateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

final class CategoryController extends AbstractController
{
    #[Route('/categories', name: 'app_category')]
    public function index(CategoryRepository $repository): Response
    {
        $categories = $repository->findAll();

        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
            'categries' => $categories
        ]);
    }

    #[Route('/categories/{id}', name: 'show_category')]
    public function show(Category $category) :Response 
    {
        return $this->render('category/show.html.twig', [
            'product' => $category
        ]);
    }

    #[Route('/create_categories', name:"create_categories")]
    public function create(Request $request, EntityManagerInterface $manager) {
        $category = new Category;
        $form = $this->createForm(CategoryCreateType::class, $category);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($category);
            $manager->flush();
            $this->addFlash(
               'success',
               'Category Saved'
            );
            return $this->redirectToRoute('app_category');
        }
        return $this->render('category/new.html.twig', [
            'form' => $form
        ]);
    }
}
