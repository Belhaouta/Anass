<?php

class Reponse 
{
   private $reponse;
   private $chaine;
   const MAUVAIS_REPONSE = false;
   const BONNE_REPONSE = true;
 
   public function __construct($reponse, $chaine = self::MAUVAIS_REPONSE) 
   {
      $this->reponse = $reponse;
      $this->chaine = $chaine;
   }
 
   public function Chaine() 
   {
      return $this->chaine;
   }
 
   public function Afficher() 
   {
      return $this->reponse;
   }
}
?>