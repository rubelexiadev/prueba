<?php

namespace App\Controller;

use App\NumberUtilities;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SumController extends AbstractController
{
  #[Route("/sum/{a}/{b}")]
  public function sum(int $a = 0, int $b = 0, NumberUtilities $utilities): Response 
  {
    return new Response(
      $utilities->sumTwoNumbers($a, $b)
    );
  }
}