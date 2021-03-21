<?php

namespace App\Entity;

use App\Repository\IpRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IpRepository::class)
 */
class Ip
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $addressIp;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity=Dedier::class, inversedBy="ips")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dedier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddressIp(): ?string
    {
        return $this->addressIp;
    }

    public function setAddressIp(string $addressIp): self
    {
        $this->addressIp = $addressIp;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDedier(): ?Dedier
    {
        return $this->dedier;
    }

    public function setDedier(?Dedier $dedier): self
    {
        $this->dedier = $dedier;

        return $this;
    }
}
