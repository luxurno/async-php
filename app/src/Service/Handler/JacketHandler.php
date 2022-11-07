<?php

namespace App\Service\Handler;

use App\Entity\Mssql\Jacket;
use App\Repository\Mssql\JacketRepository;

class JacketHandler
{
    public function __construct(
        private readonly JacketRepository $jacketRepository
    ) { }

    public function __invoke(array $data): void
    {
        $entity = new Jacket();

        $entity->setName($data['name']);
        $entity->setProducer($data['producer']);
        $entity->setColor($data['color']);
        $entity->setHeight($data['height']);
        $entity->setWidth($data['width']);

        $this->jacketRepository->save($entity, true);
    }
}
