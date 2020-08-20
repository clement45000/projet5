<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
 * fields = {"username"},
 * message ="Pseudo ou email déjà utilisé"
 * )
 * @UniqueEntity(
 * fields = {"mail"},
 * message ="Pseudo ou email déjà utilisé"
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=4, minMessage="Votre pseudo doit comporter au moins 5 caractères")
     * @Assert\NotBlank(message="Vous devez remplir ce champs")
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\EqualTo(propertyPath="verifPassword",message="Les 2 mots de passe doivent correspondre")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password",message="Les 2 mots de passe doivent correspondre")
     */
    private $verifPassword;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez remplir ce champs")
     */
    private $mail;

    /**
     * @Assert\EqualTo(propertyPath="mail",message="Les 2 adresses doivent correspondre")
     */
    private $verifMail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roles;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getVerifPassword(): ?string
    {
        return $this->password;
    }

    public function setVerifPassword(string $verifPassword): self
    {
        $this->verifPassword = $verifPassword;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getVerifMail(): ?string
    {
        return $this->mail;
    }

    public function setVerifMail(string $verifMail): self
    {
        $this->verifMail = $verifMail;

        return $this;
    }

    public function getRoles()
    {
        return [$this->roles];
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function eraseCredentials(){

    }

    public function getSalt(){

    }
}
