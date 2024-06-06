<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NameController
{
  #[Route("/hello/{name}", name: "greeting")]
  public function name(string $name = "World"): Response 
  {
    return new Response(
      "Hello ".ucfirst($name)."."
    );
  }
}