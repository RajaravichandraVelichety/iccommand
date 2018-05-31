<?php

namespace App\Entity\MultimediaRequest;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MultimediaRequest\VideoRequestRepository")
 */
class VideoRequest extends MultimediaRequest
{
    const REQUEST_TYPE = 'video';

    /**
     * @ORM\Column(type="date")
     * @Assert\Date(message="You must provide a valid completion date.")
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Serializer\SerializedName("completionDate")
     */
    private $completionDate;

    public function __construct() {
        parent::__construct();
    }

    public function getRequestType(){
        return constant("self::REQUEST_TYPE");
    }

    public function getCompletionDate(): ?\DateTimeInterface
    {
        return $this->completionDate;
    }

    public function setCompletionDate(\DateTimeInterface $completionDate): self
    {
        $this->completionDate = $completionDate;

        return $this;
    }
}
