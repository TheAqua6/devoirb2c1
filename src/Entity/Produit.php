<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Reference;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nom;

    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=14)
     */
    private $EAN;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->Reference;
    }

    public function setReference(string $Reference): self
    {
        $this->Reference = $Reference;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getEAN(): ?string
    {
        return $this->EAN;
    }

    public function setEAN(string $EAN): self
    {
        $this->EAN = $EAN;
        $tab=$EAN;
        $tailleEAN = strlen($EAN);

        if ($tailleEAN==13) {
            $tab[0]=$tab[0] * 3;
            $tab[1]=$tab[1] * 1;
            $tab[2]=$tab[2] * 3;
            $tab[3]=$tab[3] * 1;
            $tab[4]=$tab[4] * 3;
            $tab[5]=$tab[5] * 1;
            $tab[6]=$tab[6] * 3;
            $tab[7]=$tab[7] * 1;
            $tab[8]=$tab[8] * 3;
            $tab[9]=$tab[9] * 1;
            $tab[10]=$tab[10] * 3;
            $tab[11]=$tab[11] * 1;
            $tab[12]=$tab[12] * 3;

            $addition=$tab[1]+$tab[2]+$tab[3]+ $tab[4]+$tab[5]+$tab[6]+$tab[7]+$tab[8]+$tab[9]+$tab[10]+$tab[11]+$tab[12]+$tab[0];
            $dizaine=round($addition,-2,PHP_ROUND_HALF_UP);
            if($tab[12]==$dizaine-$addition){
                return $this;
            }
        }
        elseif ($tailleEAN==14) {
            $tab[0]=$tab[0] * 3;
            $tab[1]=$tab[1] * 1;
            $tab[2]=$tab[2] * 3;
            $tab[3]=$tab[3] * 1;
            $tab[4]=$tab[4] * 3;
            $tab[5]=$tab[5] * 1;
            $tab[6]=$tab[6] * 3;
            $tab[7]=$tab[7] * 1;
            $tab[8]=$tab[8] * 3;
            $tab[9]=$tab[9] * 1;
            $tab[10]=$tab[10] * 3;
            $tab[11]=$tab[11] * 1;
            $tab[12]=$tab[12] * 3;
            $tab[13]=$tab[13] * 1;
            $addition=$tab[1]+$tab[2]+$tab[3]+ $tab[4]+$tab[5]+$tab[6]+$tab[7]+$tab[8]+$tab[9]+$tab[10]+$tab[11]+$tab[12]+$tab[13]+$tab[0];
            $dizaine=round($addition,-2,PHP_ROUND_HALF_UP);
            if($tab[13]==$dizaine-$addition){
                return $this;
            }
        }
        return $this;
    }
}
