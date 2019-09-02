<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Civil
 *
 * @ORM\Table(name="civil")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CivilRepository")
 */
class Civil
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
     * @ORM\Column(name="Numar", type="string", length=255)
     */
    private $numar;

    /**
     * @var string
     *
     * @ORM\Column(name="Nume", type="string", length=255)
     */
    private $nume;

    /**
     * @var string
     *
     * @ORM\Column(name="Descriere", type="string", length=255)
     */
    private $descriere;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Data", type="datetime")
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="Upload", type="string", length=255)
     */
    private $pdfFIleName;

    /**
     * @return string
     */
    public function getPdfFIleName()
    {
        return $this->pdfFIleName;
    }

    /**
     * @param string $pdfFIleName
     */
    public function setPdfFIleName($pdfFIleName)
    {
        $this->pdfFIleName = $pdfFIleName;

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
     * Set numar
     *
     * @param string $numar
     *
     * @return Civil
     */
    public function setNumar($numar)
    {
        $this->numar = $numar;

        return $this;
    }

    /**
     * Get numar
     *
     * @return string
     */
    public function getNumar()
    {
        return $this->numar;
    }

    /**
     * Set nume
     *
     * @param string $nume
     *
     * @return Civil
     */
    public function setNume($nume)
    {
        $this->nume = $nume;

        return $this;
    }

    /**
     * Get nume
     *
     * @return string
     */
    public function getNume()
    {
        return $this->nume;
    }

    /**
     * Set descriere
     *
     * @param string $descriere
     *
     * @return Civil
     */
    public function setDescriere($descriere)
    {
        $this->descriere = $descriere;

        return $this;
    }

    /**
     * Get descriere
     *
     * @return string
     */
    public function getDescriere()
    {
        return $this->descriere;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     *
     * @return Civil
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }




}

