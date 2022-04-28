<?php 

class reclamation {

	private  $id = null ;
	private  $message = null;
		private  $categorie= null;
		


function __construct( string $message, string $categorie){
			
			$this->message=$message;
			$this->categorie=$categorie;
			

		
		}
		function getId(): int{
			return $this->id;
		}
		function getmessage(): string{
			return $this->message;
		}
		function getcategorie(): string{
			return $this->categorie;
		}
		
   
		function setcategorie(string $categorie): void{
			$this->categorie=$categorie;
		}
		
		


		
    
  
}



?>