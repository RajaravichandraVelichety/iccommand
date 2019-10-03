<?php

namespace App\Controller\DepartmentDirectoryUpdate;

// use App\Entity\Redirect\Redirect;
use App\Service\DepartmentDirectoryUpdateService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DepartmentDirectoryUpdateController extends Controller
{
    private $service;

    public function __construct(DepartmentDirectoryUpdateService $service){
        $this->service = $service;
    }

    /**
     * @Route("/departmentdirectoryupdate", name="department_directory_update_index")
     */
    public function index()
    {
      return $this->render('department_directory_update/index.html.twig', []);
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
