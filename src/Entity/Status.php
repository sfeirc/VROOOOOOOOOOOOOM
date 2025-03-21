<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatusRepository::class)]
#[ORM\Table(name: 'status')]
class Status
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', length: 50)]
    private ?string $id = null;

    #[ORM\Column(name: 'type', length: 50)]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'status', targetEntity: Car::class)]
    private Collection $cars;

    public function __construct()
    {
        $this->cars = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return Collection<int, Car>
     */
    public function getCars(): Collection
    {
        return $this->cars;
    }

    public function addCar(Car $car): static
    {
        if (!$this->cars->contains($car)) {
            $this->cars->add($car);
            $car->setStatus($this);
        }

        return $this;
    }

    public function removeCar(Car $car): static
    {
        if ($this->cars->removeElement($car)) {
            // set the owning side to null (unless already changed)
            if ($car->getStatus() === $this) {
                $car->setStatus(null);
            }
        }

        return $this;
    }
} 