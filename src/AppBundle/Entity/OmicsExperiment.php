<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * OmicsExperiment
 *
 * @ORM\Table(name="omics_experiment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OmicsExperimentRepository")
 */
class OmicsExperiment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="project_name", type="string")
     */
    private $projectName;

    /**
     * @var string
     *
     * @ORM\Column(name="requested_by", type="string")
     */
    private $requestedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="requested_date", type="date")
     */
    private $requestedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="questions", type="text")
     */
    private $questions;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="requested_end_date", type="date")
     */
    private $requestedEndDate;

    /**
     * @ORM\OneToMany(targetEntity="Status", mappedBy="omicsExperiment", cascade="all")
     */
    private $statuses;

    /**
     * @ORM\OneToMany(targetEntity="OmicsExperimentType", mappedBy="omicsExperiment", cascade="all")
     */
    private $omicsExperimentTypes;

    public function __construct()
    {
        $this->statuses = new ArrayCollection();
        $this->omicsExperimentTypes = new ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set projectName
     *
     * @param string $projectName
     *
     * @return OmicsExperiment
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;

        return $this;
    }

    /**
     * Get projectName
     *
     * @return string
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * Set requestedBy
     *
     * @param string $requestedBy
     *
     * @return OmicsExperiment
     */
    public function setRequestedBy($requestedBy)
    {
        $this->requestedBy = $requestedBy;

        return $this;
    }

    /**
     * Get requestedBy
     *
     * @return string
     */
    public function getRequestedBy()
    {
        return $this->requestedBy;
    }

    /**
     * Set requestedDate
     *
     * @param \DateTime $requestedDate
     *
     * @return OmicsExperiment
     */
    public function setRequestedDate($requestedDate)
    {
        $this->requestedDate = $requestedDate;

        return $this;
    }

    /**
     * Get requestedDate
     *
     * @return \DateTime
     */
    public function getRequestedDate()
    {
        return $this->requestedDate;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return OmicsExperiment
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set questions
     *
     * @param string $questions
     *
     * @return OmicsExperiment
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;

        return $this;
    }

    /**
     * Get questions
     *
     * @return string
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set requestedEndDate
     *
     * @param \DateTime $requestedEndDate
     *
     * @return OmicsExperiment
     */
    public function setRequestedEndDate($requestedEndDate)
    {
        $this->requestedEndDate = $requestedEndDate;

        return $this;
    }

    /**
     * Get requestedEndDate
     *
     * @return \DateTime
     */
    public function getRequestedEndDate()
    {
        return $this->requestedEndDate;
    }

    /**
     * Add status
     *
     * @param \AppBundle\Entity\Status $status
     *
     * @return OmicsExperiment
     */
    public function addStatus(\AppBundle\Entity\Status $status)
    {
        $this->statuses[] = $status;
        $status->setOmicsExperiment($this);

        return $this;
    }

    /**
     * Remove status
     *
     * @param \AppBundle\Entity\Status $status
     */
    public function removeStatus(\AppBundle\Entity\Status $status)
    {
        $this->statuses->removeElement($status);
    }

    /**
     * Get statuses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStatuses()
    {
        return $this->statuses;
    }

    /**
     * Add omicsExperimentType
     *
     * @param \AppBundle\Entity\OmicsExperimentType $omicsExperimentType
     *
     * @return OmicsExperiment
     */
    public function addOmicsExperimentType(\AppBundle\Entity\OmicsExperimentType $omicsExperimentType)
    {
        $this->omicsExperimentTypes[] = $omicsExperimentType;
        $omicsExperimentType->setOmicsExperiment($this);

        return $this;
    }

    /**
     * Remove omicsExperimentType
     *
     * @param \AppBundle\Entity\OmicsExperimentType $omicsExperimentType
     */
    public function removeOmicsExperimentType(\AppBundle\Entity\OmicsExperimentType $omicsExperimentType)
    {
        $this->omicsExperimentTypes->removeElement($omicsExperimentType);
    }

    /**
     * Get omicsExperimentTypes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOmicsExperimentTypes()
    {
        return $this->omicsExperimentTypes;
    }
}
