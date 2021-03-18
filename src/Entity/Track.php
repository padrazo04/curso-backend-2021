<?php

namespace App\Entity;

use App\Repository\TrackRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrackRepository::class)
 */
class Track
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startsAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $durationInMinutes;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPrivate;

    /**
     * @ORM\Column(type="integer")
     */
    private $lengthInMeters;

    /**
     * @ORM\Column(type="integer")
     */
    private $seats;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modality;

    /**
     * @ORM\ManyToMany(targetEntity=Trail::class)
     */
    private $trails;

    /**
     * @ORM\OneToMany(targetEntity=Ticket::class, mappedBy="track", orphanRemoval=true)
     */
    private $tickets;

    public function __construct()
    {
        $this->trails = new ArrayCollection();
        $this->tickets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartsAt(): ?\DateTimeInterface
    {
        return $this->startsAt;
    }

    public function setStartsAt(\DateTimeInterface $startsAt): self
    {
        $this->startsAt = $startsAt;

        return $this;
    }

    public function getDurationInMinutes(): ?int
    {
        return $this->durationInMinutes;
    }

    public function setDurationInMinutes(int $durationInMinutes): self
    {
        $this->durationInMinutes = $durationInMinutes;

        return $this;
    }

    public function getIsPrivate(): ?bool
    {
        return $this->isPrivate;
    }

    public function setIsPrivate(bool $isPrivate): self
    {
        $this->isPrivate = $isPrivate;

        return $this;
    }

    public function getLengthInMeters(): ?int
    {
        return $this->lengthInMeters;
    }

    public function setLengthInMeters(int $lengthInMeters): self
    {
        $this->lengthInMeters = $lengthInMeters;

        return $this;
    }

    public function getSeats(): ?int
    {
        return $this->seats;
    }

    public function setSeats(int $seats): self
    {
        $this->seats = $seats;

        return $this;
    }

    public function getModality(): ?string
    {
        return $this->modality;
    }

    public function setModality(string $modality): self
    {
        $this->modality = $modality;

        return $this;
    }

    /**
     * @return Collection|Trail[]
     */
    public function getTrails(): Collection
    {
        return $this->trails;
    }

    public function addTrail(Trail $trail): self
    {
        if (!$this->trails->contains($trail)) {
            $this->trails[] = $trail;
        }

        return $this;
    }

    public function removeTrail(Trail $trail): self
    {
        $this->trails->removeElement($trail);

        return $this;
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }

    public function addTicket(Ticket $ticket): self
    {
        if (!$this->tickets->contains($ticket)) {
            $this->tickets[] = $ticket;
            $ticket->setTrack($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): self
    {
        if ($this->tickets->removeElement($ticket)) {
            // set the owning side to null (unless already changed)
            if ($ticket->getTrack() === $this) {
                $ticket->setTrack(null);
            }
        }

        return $this;
    }
}
