<?php    
      try
      {
            //____________________________________
            //_________CONNEXION A LA BDD_________        
            //____________________________________
            
            $PARAM_hote='localhost'; // le chemin vers le serveur
            $PARAM_nom_bd='mgade'; // le nom de votre base de données
            $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter au serveur
            $PARAM_mdp='';

            $connexion = new PDO('mysql:host='.$PARAM_hote.';
                dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mdp);

            $connexion->exec('SET NAMES UTF8');
          
          
          
            //____________________________________
            //__________UPDATE LECTURES___________        
            //____________________________________       

            if( isset($_POST['modifLectures']))
            {	                      
          
            $update = "UPDATE lear_lectures SET titre='".$_POST['lecture_titre']."', auteur='".$_POST['lecture_auteur']."', description='".$_POST['lecture_desc']."' WHERE id=".$_POST['lecture_id']."";
                
            echo $update;
          
            $count=$connexion->exec($update);	
                
            unset($_POST['modifLectures']);	          

         	}
          
          
            //____________________________________
            //__________UPDATE ACTIONS___________        
            //____________________________________       

            if( isset($_POST['modifActions']))
            {
            
            
            $lycees = '';                
            foreach( $_POST['action_lycee'] as $action_lycee)
            {                    
                $lycees .= $action_lycee.', ';                    
            }
            $lycees = substr($lycees, 0 , strlen($lycees)-2);  
                
            $auteurs = '';                
            foreach( $_POST['action_auteur'] as $action_auteur)
            {                    
                $auteurs .= $action_auteur.', ';                    
            }                

            $auteurs = substr($auteurs, 0 , strlen($auteurs)-2);    
                
                
            
            $update = "UPDATE lear_actions SET date_debut='".$_POST['action_date_debut']."', date_fin='".$_POST['action_date_fin']."', auteurs='".$auteurs."', lycee='".$lycees."' WHERE id=".$_POST['action_id']."";
  
                
            //echo $update;
          
            $count=$connexion->exec($update);	
                
            unset($_POST['modifActions']);	          

         	}
            
            
            //____________________________________
            //________________DELETE______________        
            //____________________________________       

            if( isset($_POST['supOui']))
            {	                      
          
            $update = "DELETE FROM ".$_POST['table']." WHERE id=".$_POST['id']."";
            
                
            echo $update;
          
            $count=$connexion->exec($update);
                
          
                
            unset($_POST['supOui']);	          

         	}
          
          
          
          
          
          
            header('Location:admin.php'); 

      }//try
        //gestion des erreurs
        catch(Exception $e)
        {
            echo 'Erreur : '.$e->getMessage().'<br />';
            echo 'N° : '.$e->getCode();
        }	
          

?>