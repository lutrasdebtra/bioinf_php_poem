<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sample
 *
 * @ORM\Table(name="sample")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SampleRepository")
 */
class Sample
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
     * @var int
     *
     * @ORM\Column(name="bcexperiment_id", type="integer")
     */
    private $BCExperimentID;

    /**
     * @var int
     *
     * @ORM\Column(name="bcsample_id", type="integer")
     */
    private $BCSampleID;

    /**
     * @var int
     *
     * @ORM\Column(name="bcrun_id", type="integer")
     */
    private $BCRunID;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sampled_date_time", type="datetime")
     */
    private $sampledDateTime;


    /**
     * @var string
     *
     * @ORM\Column(name="sampled_by", type="string")
     */
    private $sampledBy;

    /**
     * @var bool
     *
     * @ORM\Column(name="rnalater_treated", type="boolean")
     */
    private $RNALaterTreated;

    /**
     * @ORM\ManyToOne(targetEntity="MaterialTypeStrings", inversedBy="samples")
     * @ORM\JoinColumn(name="material_type_strings_id", referencedColumnName="id")
     */
    private $materialTypeString;

    /**
     * @ORM\ManyToOne(targetEntity="OmicsExperimentSubType", inversedBy="samples")
     * @ORM\JoinColumn(name="omics_experiment_sub_type_id", referencedColumnName="id")
     */
    private $omicsExperimentSubType;

    /**
     * @ORM\ManyToOne(targetEntity="SequenceRun", inversedBy="samples")
     * @ORM\JoinColumn(name="sequencing_run_id", referencedColumnName="id")
     */
    private $sequencingRun;


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
     * Set bCExperimentID
     *
     * @param integer $bCExperimentID
     *
     * @return Sample
     */
    public function setBCExperimentID($bCExperimentID)
    {
        $this->BCExperimentID = $bCExperimentID;

        return $this;
    }

    /**
     * Get bCExperimentID
     *
     * @return int
     */
    public function getBCExperimentID()
    {
        return $this->BCExperimentID;
    }

    /**
     * Set bCSampleID
     *
     * @param integer $bCSampleID
     *
     * @return Sample
     */
    public function setBCSampleID($bCSampleID)
    {
        $this->BCSampleID = $bCSampleID;

        return $this;
    }

    /**
     * Get bCSampleID
     *
     * @return int
     */
    public function getBCSampleID()
    {
        return $this->BCSampleID;
    }

    /**
     * Set bCRunID
     *
     * @param integer $bCRunID
     *
     * @return Sample
     */
    public function setBCRunID($bCRunID)
    {
        $this->BCRunID = $bCRunID;

        return $this;
    }

    /**
     * Get bCRunID
     *
     * @return int
     */
    public function getBCRunID()
    {
        return $this->BCRunID;
    }

    /**
     * Set sampledBy
     *
     * @param string $sampledBy
     *
     * @return Sample
     */
    public function setSampledBy($sampledBy)
    {
        $this->sampledBy = $sampledBy;

        return $this;
    }

    /**
     * Get sampledBy
     *
     * @return string
     */
    public function getSampledBy()
    {
        return $this->sampledBy;
    }

    /**
     * Set rNALaterTreated
     *
     * @param boolean $rNALaterTreated
     *
     * @return Sample
     */
    public function setRNALaterTreated($rNALaterTreated)
    {
        $this->RNALaterTreated = $rNALaterTreated;

        return $this;
    }

    /**
     * Get rNALaterTreated
     *
     * @return bool
     */
    public function getRNALaterTreated()
    {
        return $this->RNALaterTreated;
    }

    /**
     * Set omicsExperimentSubType
     *
     * @param \AppBundle\Entity\OmicsExperimentSubType $omicsExperimentSubType
     *
     * @return Sample
     */
    public function setOmicsExperimentSubType(\AppBundle\Entity\OmicsExperimentSubType $omicsExperimentSubType = null)
    {
        $this->omicsExperimentSubType = $omicsExperimentSubType;

        return $this;
    }

    /**
     * Get omicsExperimentSubType
     *
     * @return \AppBundle\Entity\OmicsExperimentSubType
     */
    public function getOmicsExperimentSubType()
    {
        return $this->omicsExperimentSubType;
    }

    /**
     * Set sequencingRun
     *
     * @param \AppBundle\Entity\SequencingRun $sequencingRun
     *
     * @return Sample
     */
    public function setSequencingRun(\AppBundle\Entity\SequencingRun $sequencingRun = null)
    {
        $this->sequencingRun = $sequencingRun;

        return $this;
    }

    /**
     * Get sequencingRun
     *
     * @return \AppBundle\Entity\SequencingRun
     */
    public function getSequencingRun()
    {
        return $this->sequencingRun;
    }

    /**
     * Set materialTypeString
     *
     * @param \AppBundle\Entity\MaterialTypeStrings $materialTypeString
     *
     * @return Sample
     */
    public function setMaterialTypeString(\AppBundle\Entity\MaterialTypeStrings $materialTypeString = null)
    {
        $this->materialTypeString = $materialTypeString;

        return $this;
    }

    /**
     * Get materialTypeString
     *
     * @return \AppBundle\Entity\MaterialTypeStrings
     */
    public function getMaterialTypeString()
    {
        return $this->materialTypeString;
    }

    /**
     * Set sampledDateTime
     *
     * @param \DateTime $sampledDateTime
     *
     * @return Sample
     */
    public function setSampledDateTime($sampledDateTime)
    {
        $this->sampledDateTime = $sampledDateTime;

        return $this;
    }

    /**
     * Get sampledDateTime
     *
     * @return \DateTime
     */
    public function getSampledDateTime()
    {
        return $this->sampledDateTime;
    }
}
