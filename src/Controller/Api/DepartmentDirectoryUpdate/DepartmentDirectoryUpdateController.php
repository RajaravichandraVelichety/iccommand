<?php
namespace App\Controller\Api\DepartmentDirectoryUpdate;

// use App\Entity\Redirect\Redirect;
// use App\Entity\Redirect\Uncaught;
use App\Service\DepartmentDirectoryUpdateService;
use Doctrine\ORM\PersistentCollection;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Hateoas\HateoasBuilder;
use JMS\Serializer\SerializationContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;

if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}
error_reporting(E_ALL);

/**
 * API Redirect Controller
 * This controller manages the redirects with the actions of getting, adding,
 * updating, and deleting.
 */
class DepartmentDirectoryUpdateController extends FOSRestController
{
    private $service;
    private $logger;

    /**
     * The constructor of the RedirectController.
     * @param RedirectService $service The service container of this controller.
     */
    public function __construct(DepartmentDirectoryUpdateService $service, LoggerInterface $logger)
    {
        $this->service = $service;
        $this->logger = $logger;
    }
}

?>
