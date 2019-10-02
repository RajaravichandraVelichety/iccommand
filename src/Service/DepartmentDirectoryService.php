<?php
namespace App\Service;

// use App\Entity\Redirect\Redirect;
// use App\Enttiy\Redirect\Uncaught;
use Doctrine\ORM\PersistentCollection;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Component\Validator\ConstraintViolationList;

/**
 * The redirect service is used primary for deleting redirects, getting redirect
 * permissions of users, and validating.
 */
class DepartmentDirectoryService {
  private $container;

  /**
   * The constructor of the service of the redirects.
   * @param Container $container The container for the service of the redirects.
   */
  public function __construct(Container $container) {
    $this->container = $container;
  }

  /**
   * Uses the Symfony container's validator to validate fields for a redirect.
   * @param Redirect A redirect that makes one link go to another link.
   * @return array A list of errors.
   */
  public function validate($redirect): ConstraintViolationList {
    $validator = $this->container->get('validator');
    $errors = $validator->validate($redirect);

    return $errors;
  }
}
