<?php

namespace App\Entity\MultimediaRequest;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MultimediaRequest\PublicationRequestTypeRepository")
 */
class PublicationRequestType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="You must provide a request type.")
     * @Serializer\SerializedName("requestType")
     */
    private $requestType;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="You must provide a slug.")
     */
    private $slug;

    public function getId()
    {
        return $this->id;
    }

    public function getRequestType(): ?string
    {
        return $this->requestType;
    }

    public function setRequestType(string $requestType): self
    {
        $this->requestType = $requestType;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
