<?php

namespace App\Entity\Map;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;
use App\Entity\Map\MapParkingType;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Map\MapParkingRepository")
 */
class MapParking extends MapItem
{
    const ITEM_TYPE = 'parking';

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $hours;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $spaces;

    /**
     * @ORM\Column(type="boolean")
     *
     * @Assert\NotNull(message="Is the bathroom handicap accessible?")
     * @Serializer\SerializedName("hasHandicapSpaces")
     */
    private $hasHandicapSpaces;

    /**
     * Many Parking lots have Many types.
     * @ORM\ManyToMany(targetEntity="App\Entity\Map\MapParkingType", inversedBy="parkingLots")
     * @ORM\JoinTable(name="mapparking_types",
     *      joinColumns={@ORM\JoinColumn(name="mapparking_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="type_id", referencedColumnName="id")}
     *      )
     * @ORM\OrderBy({"name" = "ASC"})
     * @Serializer\SerializedName("parkingTypes")
     */
    private $parkingTypes;

    public function __construct() {
        $this->parkingTypes = new ArrayCollection();
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("itemType")
     * @return String
    */
    public function getItemType(){
      return constant("self::ITEM_TYPE");
    }

    public function getHours(){
      return $this->hours;
    }

    public function setHours($hours){
      $this->hours = $hours;
    }

    public function getSpaces(){
      return $this->spaces;
    }

    public function setSpaces($spaces){
      $this->spaces = $spaces;
    }

    public function getHasHandicapSpaces(){
      return $this->hasHandicapSpaces;
    }

    public function setHasHandicapSpaces($hasHandicapSpaces){
      $this->hasHandicapSpaces = $hasHandicapSpaces;
    }

    public function getParkingTypes()
    {
        return $this->parkingTypes;
    }

    public function addParkingType(MapParkingType $parkingType)
    {
        if ($this->parkingTypes->contains($parkingType)) {
            return;
        }
        $this->parkingTypes->add($parkingType);
        $parkingType->addParkingLot($this);
    }

    public function removeParkingType(MapParkingType $parkingType)
    {
        if (!$this->parkingTypes->contains($parkingType)) {
            return;
        }
        $this->parkingTypes->removeElement($parkingType);
        $parkingType->removeParkingLot($this);
    }
}
