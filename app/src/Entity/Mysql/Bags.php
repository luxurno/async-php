<?php

namespace App\Entity\Mysql;

use App\Entity\Core\Product;
use App\Repository\Mysql\BagsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'bags')]
#[ORM\Entity(repositoryClass: BagsRepository::class)]
class Bags extends Product
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer', length: 250)]
    #[ORM\GeneratedValue]
    protected int $id;

    #[ORM\Column(type: 'string', length: 20)]
    protected string $name;

    #[ORM\Column(type: 'string', length: 15)]
    protected string $producer;

    #[ORM\Column(type: 'string', length: 5)]
    protected string $color;

    #[ORM\Column(type: 'integer')]
    protected int $height;

    #[ORM\Column(type: 'integer')]
    protected int $width;
}
