<?php

namespace App\Entity\Mssql;

use App\Entity\Core\Product;
use App\Repository\Mssql\JacketRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'jacket')]
#[ORM\Entity(repositoryClass: JacketRepository::class)]
class Jacket extends Product
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
