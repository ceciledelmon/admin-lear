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
            //_____________NOS LECTURES___________        
            //____________________________________       

            if( isset($_POST['envoiLectures']))
            {	
                      
            $insertion = "INSERT INTO lear_lectures(titre,auteur,description) VALUES('".$_POST['lecture_titre']."','".$_POST['lecture_auteur']."','".$_POST['lecture_desc']."')";
          
            $count=$connexion->exec($insertion);	
                
            unset($_POST['envoiLectures']);	          

         	}

           
            //____________________________________
            //_______________AUTEURS______________        
            //____________________________________       

            if( isset($_POST['envoiAuteurs']))
            {	
            
            $insertion = "INSERT INTO lear_auteurs(nom,description,lien) VALUES('".$_POST['auteur_nom']."','".$_POST['auteur_desc']."','".$_POST['auteur_lien']."')";
            echo "<h2>".$insertion."</h2>";
            $count=$connexion->exec($insertion);	
                
            unset($_POST['envoiAuteurs']);	          

         	}
          
            //____________________________________
            //_______________ACTIONS______________        
            //____________________________________       

            if( isset($_POST['envoiActions']))
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
                
                
                
            $insertion = "INSERT INTO lear_actions(date_debut,date_fin,auteurs,lycee) VALUES('".$_POST['action_date_debut']."','".$_POST['action_date_fin']."','".$auteurs."','".$lycees."')";
           
            $count=$connexion->exec($insertion);	
                
            unset($_POST['envoiActions']);	          

         	}
          
          
            header('Location:admin.php'); 
           }
            //gestion des erreurs
            catch(Exception $e)
            {
                echo 'Erreur : '.$e->getMessage().'<br />';
                echo 'N° : '.$e->getCode();
            }	

?>