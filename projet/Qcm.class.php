<?php

//Class Qcm
class Qcm {
   private $questions;
    
   public function __construct()
   {
      $this->questions = array();
   }
    
   public function ajouterQuestion($question)
   {
      $this->questions[] = $question;   
   }
   
    public function afficherImage($n)
   {
      if($n==20) echo "<center><img src='image.gif'></center>";   
   }
    
   public function generer()
   {
      if(isset($_POST['qcm_q0'])!='')
	  {
         $nbr = 0;
		 echo "<center><h2>CORRECTION</h2>";
         foreach($this->questions as $i=>$question)
		 {
            echo '<p>Question '.($i+1).' : '.$question->getQuestion().'</p>';
            if($_POST['qcm_q'.$i]==$question->NumBonneReponse())
			{
               echo 'Bonne réponse<br /><br />';
               $nbr++;
            }
            else
               echo 'Mauvaise réponse <br /><br />';
            echo 'La bonne réponse est : '.$question->getBonneReponse()->Afficher().'<br /><br />';
            echo 'Explication : '.$question->getExplication().'<br />';
         }
         $note = $nbr/count($this->questions)*20;
         echo '<h3>Note : '.$note.'/20<br /></h3></center>';
		 $this -> afficherImage($note);
         
      }
      else {
		 echo "<center>";
         echo '<form method="post" />';
         foreach($this->questions as $i=>$question)
		 {
            echo '<p>Question '.($i+1).' : '.$question->getQuestion().'<br /></p>';
            foreach($question->getReponses() as $j=>$reponse)
			{
               echo '<input type="radio" name="qcm_q'.$i.'" value="'.$j.'" checked />';
               echo $reponse->Afficher().'<br />';
            }
            echo '<br />';
         }
         echo '<input id="button" type="submit" value="envoyer" /></form></center>';
      }
   }
}


?>