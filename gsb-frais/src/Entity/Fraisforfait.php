<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Fraisforfait
 *
 * @ORM\Table(name="FraisForfait")
 * @ORM\Entity(repositoryClass="App\Repository\Fraisforfait")
 */
class Fraisforfait
{
    /**
     * @var int
     *
     * @ORM\Column(name="idFraisForfait", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfraisforfait;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $libelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="montant", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $montant;

    public function getIdfraisforfait(): ?int
    {
        return $this->idfraisforfait;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(?string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }


}
