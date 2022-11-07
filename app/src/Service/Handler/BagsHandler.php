<?php

namespace App\Service\Handler;

use App\Entity\Mysql\Bags;
use App\Repository\Mysql\BagsRepository;

class BagsHandler
{
    public function __construct(
        private readonly BagsRepository $bagsRepository
    ) { }

    public function __invoke(array $data): void
    {
        $entity = new Bags();

        $entity->setName($data['name']);
        $entity->setProducer($data['producer']);
        $entity->setColor($data['color']);
        $entity->setHeight($data['height']);
        $entity->setWidth($data['width']);

        $this->bagsRepository->save($entity, true);
    }
}
