<?php

namespace App\Service;

use App\Entity\Mssql\Jacket;
use App\Entity\Mysql\Bags;
use App\Service\Handler\BagsHandler;
use App\Service\Handler\JacketHandler;
use Exception;

class CreateOrderService
{
    public function __construct(
        private readonly BagsHandler $bagsHandler,
        private readonly JacketHandler $jacketHandler,
    ) { }

    /**
     * @throws Exception
     */
    public function __invoke(array $data = []): void
    {
        foreach ($data['products'] as $product) {
            /** @var JacketHandler|BagsHandler $entity */
            $handler = match ($product['type']) {
                Bags::class => $this->bagsHandler,
                Jacket::class => $this->jacketHandler,
                default => throw new Exception('Unprocessable entity'),
            };

            // calling the handlers might be used async also
            $handler($product);
        }
    }
}
