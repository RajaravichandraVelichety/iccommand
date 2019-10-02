<?php

namespace App\Controller\DepartmentDirectory;

// use App\Entity\Redirect\Redirect;
use App\Service\DepartmentDirectoryService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DepartmentDirectoryController extends Controller
{
    private $service;

    public function __construct(DepartmentDirectoryService $service){
        $this->service = $service;
    }

    /**
     * @Route("/map", name="map_index")
     */
    public function index()
    {
      return $this->render('department_directory/index.html.twig', []);
    }

    /**
     * @Route("/map/manage", name="map_manage")
     * @Security("has_role('ROLE_MAP_ADMIN') or has_role('ROLE_GLOBAL_ADMIN')")
     */
    // public function manage()
    // {
    //   return $this->render('map/manage.html.twig', []);
    // }
}
