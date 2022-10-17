<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lignefraisforfait
 *
 * @ORM\Table(name="LigneFraisForfait", indexes={@ORM\Index(name="idFicheFrais", columns={"idFicheFrais"}), @ORM\Index(name="idFraisForfait", columns={"idFraisForfait"})})
 * @ORM\Entity(repositoryClass="App\Repository\LignefraisforfaitRepository")
 */
class Lignefraisforfait
{
    /**
     * @var int
     *
     * @ORM\Column(name="idLigneFraisForfait", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlignefraisforfait;

    /**
     * @var int|null
     *
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */
    private $quantite;

    /**
     * @var \Fraisforfait
     *
     * @ORM\ManyToOne(targetEntity="Fraisforfait")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFraisForfait", referencedColumnName="idFraisForfait")
     * })
     */
    private $idfraisforfait;

    /**
     * @var \Fichefrais
     *
     * @ORM\ManyToOne(targetEntity="Fichefrais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFicheFrais", referencedColumnName="idFicheFrais")
     * })
     */
    private $idfichefrais;

    public function getIdlignefraisforfait(): ?int
    {
        return $this->idlignefraisforfait;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getIdfraisforfait(): ?Fraisforfait
    {
        return $this->idfraisforfait;
    }

    public function setIdfraisforfait(?Fraisforfait $idfraisforfait): self
    {
        $this->idfraisforfait = $idfraisforfait;

        return $this;
    }

    public function getIdfichefrais(): ?Fichefrais
    {
        return $this->idfichefrais;
    }

    public function setIdfichefrais(?Fichefrais $idfichefrais): self
    {
        $this->idfichefrais = $idfichefrais;

        return $this;
    }


}
