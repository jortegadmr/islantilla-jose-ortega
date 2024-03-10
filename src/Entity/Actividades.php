<?php

namespace App\Entity;

use App\Repository\ActividadesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ActividadesRepository::class)]
class Actividades
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $categoria = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $FechaInicio = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $FechaFin = null;

    #[ORM\ManyToMany(targetEntity: Usuario::class, inversedBy: 'actividades')]
    
    private Collection $IdUsuario;

    public function __construct()
    {
        $this->IdUsuario = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): static
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getcategoria(): ?string
    {
        return $this->categoria;
    }

    public function setcategoria(string $categoria): static
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->FechaInicio;
    }

    public function setFechaInicio(?\DateTimeInterface $FechaInicio): static
    {
        $this->FechaInicio = $FechaInicio;

        return $this;
    }

    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->FechaFin;
    }

    public function setFechaFin(?\DateTimeInterface $FechaFin): static
    {
        $this->FechaFin = $FechaFin;

        return $this;
    }

    /**
     * @return Collection<int, Usuario>
     */
    public function getIdUsuario(): Collection
    {
        return $this->IdUsuario;
    }

    public function addIdUsuario(Usuario $idUsuario): static
    {
        if (!$this->IdUsuario->contains($idUsuario)) {
            $this->IdUsuario->add($idUsuario);
        }

        return $this;
    }

    public function removeIdUsuario(Usuario $idUsuario): static
    {
        $this->IdUsuario->removeElement($idUsuario);

        return $this;
    }
}
