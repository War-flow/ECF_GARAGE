<?php

namespace App\Twig;

use App\Entity\Horaires;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FooterExtention extends AbstractExtension
{
  private $em;

  public function __construct(EntityManagerInterface $em)
  {
    $this->em = $em;
  }

  public function getFunctions() : array 
  {
    return[
      new TwigFunction('Footer',[$this, 'getFooter'])
    ];
  }
  public function getFooter() 
  {
    return $this->em->getRepository(Horaires::class)->findby([],[]);
  }
}