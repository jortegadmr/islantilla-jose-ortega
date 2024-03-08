<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuarioRepository::class)]
class Usuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Email = null;

    #[ORM\Column(length: 255)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $Apellidos = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Fecha = null;

    #[ORM\Column(length: 255)]
    private ?string $Pais = null;

    #[ORM\OneToMany(targetEntity: Habitacion::class, mappedBy: 'usuario')]
    private Collection $IdHabitacion;

    public function __construct()
    {
        $this->IdHabitacion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
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

    public function getApellidos(): ?string
    {
        return $this->Apellidos;
    }

    public function setApellidos(string $Apellidos): static
    {
        $this->Apellidos = $Apellidos;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->Fecha;
    }

    public function setFecha(?\DateTimeInterface $Fecha): static
    {
        $this->Fecha = $Fecha;

        return $this;
    }

    public function getPais(): ?string
    {
        return $this->Pais;
    }

    public function setPais(string $Pais): static
    {
        $this->Pais = $Pais;

        return $this;
    }

    /**
     * @return Collection<int, Habitacion>
     */
    public function getIdHabitacion(): Collection
    {
        return $this->IdHabitacion;
    }

    public function addIdHabitacion(Habitacion $idHabitacion): static
    {
        if (!$this->IdHabitacion->contains($idHabitacion)) {
            $this->IdHabitacion->add($idHabitacion);
            $idHabitacion->setUsuario($this);
        }

        return $this;
    }

    public function removeIdHabitacion(Habitacion $idHabitacion): static
    {
        if ($this->IdHabitacion->removeElement($idHabitacion)) {
            // set the owning side to null (unless already changed)
            if ($idHabitacion->getUsuario() === $this) {
                $idHabitacion->setUsuario(null);
            }
        }

        return $this;
    }
}
