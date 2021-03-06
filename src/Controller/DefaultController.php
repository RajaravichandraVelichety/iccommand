<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;

class DefaultController extends Controller
{
  /**
  * @Route("/", name="home")
  */
  public function index()
  {
    $user = null;
    $currentUser = null;
    $currentUserRoles = null;

    if($this->getUser()){
      $user = $this->getUser();
      $currentUser = $user->getUsername();
      $currentUserRoles = json_encode($this->getUser()->getRoles());
    }

    return $this->render('index.html.twig', [
      'currentUsername' => $currentUser,
      'currentUserRoles' => $currentUserRoles,
    ]);
  }

  /**
  * @Route("/profile", name="user_profile")
  */
  public function profile()
  {
    return $this->render('profile.html.twig', []);
  }

  /**
  * @Route("/unittest", name="unit_test")
  */
  public function unitTest()
  {
    return new Response('Hello World', 201, array('Content-Type' => 'application/json; charset=UTF-8'));
  }
}
