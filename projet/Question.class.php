<?php

class Question
{
   private $question;
   private $reponses;
   private $explication;
 
   public function __construct($question) 
   {
      $this->question = $question;
      $this->reponses = array();
   }
 
   public function ajouterReponse($reponse)
   {
      $this->reponses[] = $reponse;
   }
 
   public function setExplications($explication)
   {
      $this->explication = $explication;
      return $this;
   }
 
   public function NumBonneReponse()
   {
      foreach($this->reponses as $i=>$reponse)
         if($reponse->Chaine())
            return $i;
   }
 
   public function getBonneReponse()
   {
      foreach($this->reponses as $reponse)
         if($reponse->Chaine())
            return $reponse;
   }
 
   public function getReponses()
   {
      return $this->reponses;
   }
 
   public function getQuestion() 
   {
      return $this->question;
   }
 
   public function getExplication() 
   {
      return $this->explication;
   }
}
?>