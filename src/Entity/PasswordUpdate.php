<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

class PasswordUpdate
{
 
   
  
    private $oldPassword;

   /**
    * @Assert\Regex(pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+.{7,}$^", message="Le nouveau mot de passe doit posséder minimum une majuscule, un chiffre et être supérieur à 8 caractères.")
    */
    private $newPassword;

   /**
    * @Assert\EqualTo(propertyPath="newPassword", message="Vous n'avez pas confirmé correctement votre mot de passe.")
    */
    private $confirmPassword;

  
    public function getOldPassword(): ?string
    {
        return $this->oldPassword;
    }

    public function setOldPassword(string $oldPassword): self
    {
        $this->oldPassword = $oldPassword;

        return $this;
    }

    public function getNewPassword(): ?string
    {
        return $this->newPassword;
    }

    public function setNewPassword(string $newPassword): self
    {
        $this->newPassword = $newPassword;

        return $this;
    }

    public function getConfirmPassword(): ?string
    {
        return $this->confirmPassword;
    }

    public function setConfirmPassword(string $confirmPassword): self
    {
        $this->confirmPassword = $confirmPassword;

        return $this;
    }
}
