<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\GlaceRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: GlaceRepository::class)]
class Glace
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[UploadableField(mapping: 'images', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(nullable: true)]
    private ?DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ingredientSpecial = null;

    #[ORM\ManyToOne]
    private ?Cornet $Cornet = null;

    /**
     * @var Collection<int, Topping>
     */
    #[ORM\ManyToMany(targetEntity: Topping::class)]
    private Collection $Toppings;

    public function __construct()
    {
        $this->Toppings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getIngredientSpecial(): ?string
    {
        return $this->ingredientSpecial;
    }

    public function setIngredientSpecial(string $ingredientSpecial): static
    {
        $this->ingredientSpecial = $ingredientSpecial;
        return $this;
    }

    public function getCornet(): ?Cornet
    {
        return $this->Cornet;
    }

    public function setCornet(?Cornet $Cornet): static
    {
        $this->Cornet = $Cornet;
        return $this;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
        if ($imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     * @return Collection<int, Topping>
     */
    public function getToppings(): Collection
    {
        return $this->Toppings;
    }

    public function addTopping(Topping $topping): static
    {
        if (!$this->Toppings->contains($topping)) {
            $this->Toppings->add($topping);
        }

        return $this;
    }

    public function removeTopping(Topping $topping): static
    {
        $this->Toppings->removeElement($topping);

        return $this;
    }
}
