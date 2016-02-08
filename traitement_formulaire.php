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
            //_________ Upload d'images  _________        
            //____________________________________
            


            //____________________________________
            //_____________NOS LECTURES___________        
            //____________________________________       

            if( isset($_POST['envoiLectures']))
            {  
                include_once('upload.php');
                $image = $_FILES["imgUpload"]["name"]; 
                
                if($uploadOk==1)
                {  
                    $insertion = "INSERT INTO lear_lectures(titre,auteur,description, image) VALUES('".$_POST['lecture_titre']."','".$_POST['lecture_auteur']."','".$_POST['lecture_desc']."','".$image."')";

                $count=$connexion->exec($insertion);
                }
                else
                {
                    echo "probleme à l'insertion";
                }
                
            unset($_POST['envoiLectures']);	          

         	}

           
            //____________________________________
            //_______________AUTEURS______________        
            //____________________________________       

            if( isset($_POST['envoiAuteurs']))
            {	
                
                include_once('upload.php');
                $image = $_FILES["imgUpload"]["name"];   

                if($uploadOk==1)
                {                
                    $insertion = "INSERT INTO lear_auteurs(nom,description,lien,image) VALUES('".$_POST['auteur_nom']."','".$_POST['auteur_desc']."','".$_POST['auteur_lien']."','".$image."')";
                   echo "<h2>".$insertion."</h2>";
                    $count=$connexion->exec($insertion);
                  	 
                }
                else{
                    echo "probleme à l'insertion";
                }
                
              unset($_POST['envoiAuteurs']);

         	}
          
            //____________________________________
            //_______________ACTIONS______________        
            //____________________________________       

            if( isset($_POST['envoiActions']))
            {	
            
            $insertion = "INSERT INTO lear_actions(date_debut,date_fin,auteurs,lycee) VALUES('".$_POST['action_date_debut']."','".$_POST['action_date_fin']."','".$_POST['action_auteurs']."','".$_POST['action_lycee']."')";
           echo "<h2>".$insertion."</h2>";
            $count=$connexion->exec($insertion);
                
        
                
            unset($_POST['envoiActions']);	          

         	}
          
            //____________________________________
            //___________PARTENAIRES______________        
            //____________________________________       

            if( isset($_POST['envoiPartenaires']))
            {	
            
                include_once('upload.php');
                $image = $_FILES["imgUpload"]["name"]; 
                
                if($uploadOk==1)
                {            
                    $insertion = "INSERT INTO lear_partenaires(nom,logo, lien) VALUES('".$_POST['partenaire_nom']."','".$image."','".$_POST['partenaire_lien']."')";
                   echo "<h2>".$insertion."</h2>";
                    $count=$connexion->exec($insertion);
                    
                }
                else
                {
                     echo "probleme à l'insertion";
                }
                
                unset($_POST['envoiPartenaires']);	

         	}
          
          
          
          
             //header('Location: admin.php'); 
           }
            //gestion des erreurs
            catch(Exception $e)
            {
                echo 'Erreur : '.$e->getMessage().'<br />';
                echo 'N° : '.$e->getCode();
            }	

?>