<?php

namespace App\Controller;

use App\Controller\Promise\PromiseRejection;
use App\Form\Type\ProductsCollectionType;
use App\Service\CreateOrderService;
use React\Promise\Promise;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    public function __construct(
        private readonly CreateOrderService $orderService,
    ) { }

    #[Route(path: '/order/save', methods: [Request::METHOD_POST])]
    public function __invoke(Request $request): Response
    {
        $content = json_decode($request->getContent(), true);
        $form = $this->createForm(ProductsCollectionType::class, $content);

        $form->handleRequest($request);
        $form->submit($content);

        if ($form->isSubmitted() && !$form->isValid()) {
            return new Response('', Response::HTTP_BAD_REQUEST);
        }

        try {
            $data = $form->getData();
            $service = $this->orderService;
            new Promise(function () use ($service, $data) {
                $service($data);
            }, new PromiseRejection());
        } catch (\Throwable) {
            return new Response('', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new Response('', Response::HTTP_OK);
    }
}
