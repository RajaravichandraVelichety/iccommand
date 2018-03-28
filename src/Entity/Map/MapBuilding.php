<?php

namespace App\Entity\Map;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;
use App\Entity\Map\MapBuildingType;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Map\MapBuildingRepository")
 */
class MapBuilding extends MapItem
{
    const ITEM_TYPE = 'building';

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $hours;

    /**
     * One building has (zero to) many bathrooms.
     * @ORM\OneToMany(targetEntity="MapBathroom", mappedBy="building", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $bathrooms;

    /**
     * One building has (zero to) many emergency devices.
     * @ORM\OneToMany(targetEntity="MapEmergency", mappedBy="building", cascade={"persist"})
     * @Serializer\SerializedName("emergencyDevices")
     */
    private $emergencyDevices;

    /**
     * One building has (zero to) many exhibits.
     * @ORM\OneToMany(targetEntity="MapExhibit", mappedBy="building", cascade={"persist"})
     */
    private $exhibits;

    /**
     * Many buildings have one type.
     * @ORM\ManyToOne(targetEntity="App\Entity\Map\MapBuildingType")
     * @ORM\JoinColumn(name="buildingtype_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     * @Serializer\SerializedName("buildingType")
     */
    private $buildingType;

    public function __construct() {
        parent::__construct();
        $this->bathrooms = new ArrayCollection();
        $this->emergencyDevices = new ArrayCollection();
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("itemType")
     * @return String
    */
    public function getItemType(){
      return constant("self::ITEM_TYPE");
    }

    public function addBathroom(MapBathroom $bathroom = null){
      $this->bathrooms[] = $bathroom;
    }

    public function addEmergencyDevice(MapEmergency $emergencyDevice = null){
      $this->emergencyDevices[] = $emergencyDevice;
    }

    public function addExhibit(MapExhibit $exhibit = null){
      $this->exhibits[] = $exhibit;
    }

    public function getHours()
    {
        return $this->hours;
    }

    public function setHours($hours)
    {
        $this->hours = $hours;
    }

    public function getBathrooms()
    {
        return $this->bathrooms;
    }

    public function getEmergencyDevices()
    {
        return $this->emergencyDevices;
    }

    public function getExhibits()
    {
        return $this->exhibits;
    }

    public function getBuildingType(): ?MapBuildingType
    {
        return $this->buildingType;
    }

    public function setBuildingType(MapBuildingType $buildingType = null)
    {
        $this->buildingType = $buildingType;
    }
}
