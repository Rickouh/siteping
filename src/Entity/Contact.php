<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 * @ORM\Table(name="contact")
 */
class Contact
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="firstName", type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     */
    private $firstName;

    /**
     * @ORM\Column(name="lastName", type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     */
    private $lastName;

    /**
     * @ORM\Column(name="email", type="string", length=150, nullable=false)
     * @Assert\Email(message = "L'email '{{ value }}' n'est pas valide.", checkMX = true)
     */
    private $email;

    /**
     * @ORM\Column(name="message", type="text", nullable=false)
     * @Assert\Length(
     *      min = 25,
     *      minMessage = "Votre message doit être composé d'au moins {{ limit }} caractères",
     * )
     */
    private $message;

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getEmail() {
        return $this->email;
    }

    function getMessage() {
        return $this->message;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setMessage($message) {
        $this->message = $message;
    }
}
