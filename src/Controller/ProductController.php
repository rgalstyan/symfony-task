<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'products')]
    public function index(Request $request, Environment $twig, ProductRepository $productRepository): Response
    {
        $offset = max(0, $request->query->getInt('offset', 0));
        $products = $productRepository->getCommentPaginator($offset);
        return new Response($twig->render('product/index.html.twig', [
            'products' => $products,
            'previous' => $offset - ProductRepository::PAGINATOR_PER_PAGE,
            'next' => min(count($products), $offset + ProductRepository::PAGINATOR_PER_PAGE),
        ]));
    }

    #[Route('/product/{id}', name: 'product')]
    public function show(Environment $twig, Product $product): Response
    {
        return new Response($twig->render('product/show.html.twig', [
            'product' => $product
        ]));
    }
}