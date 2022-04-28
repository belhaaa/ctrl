<?PHP
	include "../config.php";
	 require_once '../Model/reclamation.php';

class reclamationC
{
    
 public function afficherreclamation()
    {  $sql= " SELECT * FROM reclamation" ; 
      $db = config ::getConnexion();
      try{
        $listecategorie = $db->query($sql);
        return $listecategorie ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
    
     }

     public function ajouterreclamation($reclamation)
     {
    
        $sql="insert into reclamation (message,categorie)
        values (:message,:categorie)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'message'=>$reclamation->getmessage(),
                'categorie'=>$reclamation->getcategorie(),
                

                
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    
    function supprimerreclamation($id)
    {
			$sql="DELETE FROM reclamation WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
	}
    
    function modifierreclamation($categorie, $id){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                    message = :message, 
                    categorie = :categorie
                    
                WHERE id = :id'
            );
            
            $query->bindValue(':message',$categorie->getmessage());
            $query->bindValue(':categorie',$categorie->getcategorie());

            $query->bindValue(':id',$id);
            $query->execute();
 
            echo "<script>alert(\"Modification appliqué\")</script>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    function recupererreclamation($id){
        $sql="SELECT * from reclamation where id=$id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $categorie=$query->fetch();
            return $categorie;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function affichecat()
 {
    $sql="SELECT categorierec.nom FROM categorierec ";
    $db=config::getConnexion();
    try{
        $listecat=$db->query($sql);
        return $listecat;
    } catch (Exception $e) {die ('erreur : '.$e->getMessage());}

 }

}
 

?>