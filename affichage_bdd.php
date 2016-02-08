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
            //_______REMPLISSAGE CHECKBOX_________        
            //____________________________________ 
            
            $requete = "SELECT * FROM lear_auteurs";
            $resultat=$connexion->query($requete);							
            $res=$resultat ->fetchALL(PDO::FETCH_ASSOC);
            
            $checkbox_auteur = '';
            foreach($res as $k => $v)
            {  
                $checkbox_auteur .= " <p><input type='checkbox' name='action_auteur[]' value='".$v['nom']."'> ".$v['nom']."</p>";     
            }
         
         
            //____________________________________
            //________CHECK BOX LYCEE_____________        
            //____________________________________ 
         
            $requete = "SELECT * FROM lear_partenaires WHERE lycee=1";
            $resultat=$connexion->query($requete);							
            $res=$resultat ->fetchALL(PDO::FETCH_ASSOC);
            
            $checkbox_lycee = '';
            foreach($res as $k => $v)
            {                
            $checkbox_lycee .= " <p><input type='checkbox' name='action_lycee[]' value='".$v['nom']."'> ".$v['nom']."</p>";     
             
            }
         

            //_____________________________________
            //____________NOS LECTURES_____________        
            //_____________________________________

            $requete = "SELECT * FROM lear_lectures";
            $resultat=$connexion->query($requete);							
            $res=$resultat ->fetchALL(PDO::FETCH_ASSOC);				
        
            $liste_lectures="";
            $liste_lectures .= '<div id="listeAbonne" >';
            $liste_lectures .= '<ul class="list-group" >';
            foreach($res as $k => $v)
            {
                
                $liste_lectures .= "<li class='list-group-item'>";             
                $liste_lectures .=  '<p> Titre : '.$v['titre'].' <p/> ';
                $liste_lectures .=  '<p> Auteur : '.$v['auteur'].' <p/> ';		
                $liste_lectures .=  '<p> Description : '.$v['description'].' <p/> ';	
                $liste_lectures .=  '<img src="img/'.$v['image'].'" /> ';	
                $liste_lectures .=  "</li>";
                
                
                
                $jsFunctionUpdate = 'modifLectures('.$v["id"].',\''.$v["titre"].'\',\''.$v["auteur"].'\',\''.$v["description"].'\')';    
                $jsFunctionDelete = 'supTuple(\'lear_lectures\','.$v["id"].')';  
                
            
                
                $liste_lectures .= '<button onclick="'.$jsFunctionUpdate.'" >Modifier</button>';
                $liste_lectures .= '<button onclick="'.$jsFunctionDelete.'" >Supprimer</button>';
                
                $liste_lectures .=  "</li>";

            }
            
            $liste_lectures .= '</ul>';
            $liste_lectures .= '</div>';	

            

             //_____________________________________
            //________________AUTEURS_______________        
            //______________________________________

            $requete = "SELECT * FROM lear_auteurs";
            $resultat=$connexion->query($requete);							
            $res=$resultat ->fetchALL(PDO::FETCH_ASSOC);				
           
            $liste_auteurs="";
            $liste_auteurs .= '<div id="listeAbonne" >';
            $liste_auteurs .= '<ul class="list-group" >';
            foreach($res as $k => $v)
            {
                
                $liste_auteurs .= "<li class='list-group-item'>";             
                $liste_auteurs .=  '<p> Nom : '.$v['nom'].' <p/> ';
                $liste_auteurs .=  '<p> Lien : '.$v['lien'].' <p/> ';		
                $liste_auteurs .=  '<p> Description : '.$v['description'].' <p/> ';	
                $liste_auteurs .=  '<img src="img/'.$v['image'].'" /> ';	
                    
                $jsFunctionDelete = 'supTuple(\'lear_auteurs\','.$v["id"].')';  
                $liste_auteurs .= '<button onclick="'.$jsFunctionDelete.'" >Supprimer</button>';
                
                
                $liste_auteurs .=  "</li>";

            }
            
            $liste_auteurs .= '</ul>';
            $liste_auteurs .= '</div>';	

            

             //_____________________________________
            //_____________NOS ACTIONS______________        
            //_______________________________________

            $requete = "SELECT * FROM lear_actions";
            $resultat=$connexion->query($requete);							
            $res=$resultat ->fetchALL(PDO::FETCH_ASSOC);				
           
            $liste_actions="";
            $liste_actions .= '<div id="listeAbonne" >';
            $liste_actions .= '<ul class="list-group" >';
            foreach($res as $k => $v)
            {
                
                $liste_actions .= "<li class='list-group-item'>";             
                $liste_actions .=  '<p> Du : '.$v['date_debut'].' au '.$v['date_fin'].'<p/> ';                	
                $liste_actions .=  '<p> Avec : '.$v['auteurs'].' <p/> ';	
                $liste_actions .=  '<p> Lycée : '.$v['lycee'].' <p/> ';	
                
                
                $jsFunctionUpdate = 'modifActions('.$v["id"].',\''.$v["date_debut"].'\',\''.$v["date_fin"].'\',\''.$v["lycee"].'\')';    
                $jsFunctionDelete = 'supTuple(\'lear_actions\','.$v["id"].')';  
            
                $liste_actions .= '<button onclick="'.$jsFunctionUpdate.'" >Modifier</button>';
                $liste_actions .= '<button onclick="'.$jsFunctionDelete.'" >Supprimer</button>';
                
                
                $liste_actions .=  "</li>";

            }
            
            $liste_actions .= '</ul>';
            $liste_actions .= '</div>';	
         
         
             //_____________________________________
            //_____________PARTENAIRES______________        
            //_______________________________________

            $requete = "SELECT * FROM lear_partenaires";
            $resultat=$connexion->query($requete);							
            $res=$resultat ->fetchALL(PDO::FETCH_ASSOC);				
           
            $liste_partenaires="";
            $liste_partenaires .= '<div id="listeAbonne" >';
            $liste_partenaires .= '<ul class="list-group" >';
            foreach($res as $k => $v)
            {
                
                $liste_partenaires .= "<li class='list-group-item'>";                 
                $liste_partenaires .=  '<p> Nom : '.$v['nom'].' </p> ';                	
                $liste_partenaires .=  '<img src="img/'.$v['logo'].'" /> ';		            
                $liste_partenaires .=  '<a href="'.$v['lien'].'"></a>';
                $liste_partenaires .=  "</li>";

            }
            
            $liste_partenaires .= '</ul>';
            $liste_partenaires .= '</div>';	
         
        }//try
        //gestion des erreurs
        catch(Exception $e)
        {
            echo 'Erreur : '.$e->getMessage().'<br />';
            echo 'N° : '.$e->getCode();
        }				
        ?>		