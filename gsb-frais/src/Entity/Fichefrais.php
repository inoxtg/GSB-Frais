<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Fichefrais
 *
 * @ORM\Table(name="FicheFrais", indexes={@ORM\Index(name="idEtat", columns={"idEtat"}), @ORM\Index(name="idVisiteur", columns={"idVisiteur"}), @ORM\Index(name="idComptable", columns={"idComptable"})})
 * @ORM\Entity(repositoryClass="App\Repository\Fichefrais")
 */
class Fichefrais
{
    /**
     * @var int
     *
     * @ORM\Column(name="idFicheFrais", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfichefrais;

    /**
     * @var string
     *
     * @ORM\Column(name="mois", type="string", length=7, nullable=false)
     */
    private $mois;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nbJustificatifs", type="integer", nullable=true)
     */
    private $nbjustificatifs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="montantValide", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $montantvalide;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateModif", type="date", nullable=true)
     */
    private $datemodif;

    /**
     * @var \Visiteur
     *
     * @ORM\ManyToOne(targetEntity="Visiteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVisiteur", referencedColumnName="idVisiteur")
     * })
     */
    private $idvisiteur;

    /**
     * @var \Comptable
     *
     * @ORM\ManyToOne(targetEntity="Comptable")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idComptable", referencedColumnName="idComptable")
     * })
     */
    private $idcomptable;

    /**
     * @var \Etat
     *
     * @ORM\ManyToOne(targetEntity="Etat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEtat", referencedColumnName="idEtat")
     * })
     */
    private $idetat;

    public function getIdfichefrais(): ?int
    {
        return $this->idfichefrais;
    }

    public function getMois(): ?string
    {
        return $this->mois;
    }

    public function setMois(string $mois): self
    {
        $this->mois = $mois;

        return $this;
    }

    public function getNbjustificatifs(): ?int
    {
        return $this->nbjustificatifs;
    }

    public function setNbjustificatifs(?int $nbjustificatifs): self
    {
        $this->nbjustificatifs = $nbjustificatifs;

        return $this;
    }

    public function getMontantvalide(): ?string
    {
        return $this->montantvalide;
    }

    public function setMontantvalide(?string $montantvalide): self
    {
        $this->montantvalide = $montantvalide;

        return $this;
    }

    public function getDatemodif(): ?\DateTimeInterface
    {
        return $this->datemodif;
    }

    public function setDatemodif(?\DateTimeInterface $datemodif): self
    {
        $this->datemodif = $datemodif;

        return $this;
    }

    public function getIdvisiteur(): ?Visiteur
    {
        return $this->idvisiteur;
    }

    public function setIdvisiteur(?Visiteur $idvisiteur): self
    {
        $this->idvisiteur = $idvisiteur;

        return $this;
    }

    public function getIdcomptable(): ?Comptable
    {
        return $this->idcomptable;
    }

    public function setIdcomptable(?Comptable $idcomptable): self
    {
        $this->idcomptable = $idcomptable;

        return $this;
    }

    public function getIdetat(): ?Etat
    {
        return $this->idetat;
    }

    public function setIdetat(?Etat $idetat): self
    {
        $this->idetat = $idetat;

        return $this;
    }


}
