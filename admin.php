
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LEAR | BDD</title>
	<link rel="shortcut icon"    href="img/favicon.ico" />
		
    <!-- ___________CSS____________-->
        <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="framework/bootstrap/css/bootstrap.min.css"/>
        <!-- Resize Image -->
    <link rel="stylesheet" type="text/css" href="framework/resizeimg/cropimg.css"/>
    
    <!-- ___________JS____________-->
        <!-- jQuery -->  
    <script src="framework/jquery-1.11.3.min.js"></script>
        <!-- Bootstrap -->
    <script src="framework/bootstrap/js/bootstrap.min.js"></script>
        <!-- Validator -->
    <script src="framework/bootstrap/js/validator.min.js"></script>
        <!-- Resize Image -->
    <script src="framework/resizeimg/cropimg.jquery.min.js"></script>
        <!-- Image Black & White -->
    <script src="framework/blackandwhite/jquery.BlackAndWhite.min.js"></script>
            <!-- Script -->    
    <script src="js/script.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/comportement.js"></script>


</head>

<body>
    
     		
    
    <?php	include_once('affichage_bdd.php'); //recupere les données contenues dans la base ?>
		
		<!-- __________AUTEURS___________-->
        <!--_____________________________-->	
		<section id="auteurs">			
			  <h3>Auteurs</h3>
            
			  <form data-toggle="validator" role="form"  method="POST" enctype="multipart/form-data" action="traitement_formulaire.php" >
                  
                <!--Nom -->
                <div class="form-group has-feedback">
                    <div class="input-group">
                      <label for="auteur_nom">Nom</label>
                      <input type="text" required="required" class="form-control" placeholder="Nom" name="auteur_nom" id="auteur_nom"  >
                    </div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <!--Description -->
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <label for="auteur_desc">Description</label>
                        <textarea type="text" class="form-control" name="auteur_desc" id="auteur_desc" placeholder="Description"></textarea>
                    </div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span> 
                </div>	
                  
                <!-- Lien du site de l'auteur -->
                <div class="form-group has-feedback">
                    <div class="input-group">
                            <label for="auteur_url">Lien du site de l'auteur</label>
                            <input type="url" class="form-control" name="auteur_lien" id="auteur_lien"  >
                    </div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span> 
                </div>
                  
                <!-- Photo de l'auteur -->
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <label for="auteur_image" class="control-label">Photo</label>
                        <input type="file" class="form-control" name="imgUpload" id="auteur_image" required onChange="loadFile(event, 'authorPicture');"/>
                        <div class="wrapperImg"><img id="authorPicture"  alt="auteur"/></div>
                    </div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div> 
                  
                  

                <button type="submit" name="envoiAuteurs" class="btn btn-default">Ajouter</button>
				
			  </form>
            

            
		
            <!-- Liste des lectures -->            
	        <?php echo $liste_auteurs; ?>	        
	   </section>  
    
			
		<!-- ________NOS LECTURES_______-->
		<!--____________________________-->	
		<section id="lectures">
          			
			  <h3>Nos Lectures</h3>
			  <form data-toggle="validator" role="form"  method="POST" enctype="multipart/form-data" action="traitement_formulaire.php" >
                <!-- Titre du Livre -->
				<div class="form-group has-feedback">
                    <div class="input-group">
				        <label for="lecture_titre">Titre</label>
				        <input type="text" required="required" class="form-control" name="lecture_titre" id="lecture_titre" placeholder="Titre du Livre">
                    </div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
				</div>
                  
                <!-- Auteur du Livre -->
				<div class="form-group has-feedback">
                    <div class="input-group">
				        <label for="lecture_auteur">Auteur</label>
				        <input type="text" required="required" class="form-control" name="lecture_auteur" id="lecture_auteur" placeholder="Auteur du Livre">
                    </div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
				</div>
                  
                <!-- Description du Livre -->
				<div class="form-group has-feedback">
                    <div class="input-group">
				        <label for="lecture_desc">Description</label>
                        <textarea type="text" class="form-control" name="lecture_desc" id="lecture_desc" placeholder="Description du livre"></textarea>
                    </div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
				</div>
                  
                <!-- Image du Livre -->
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <label for="lecture_img" class="control-label">Image du Livre</label>
                        <input  name="imgUpload" type="file" class="form-control"  id="lecture_img"  required onChange="loadFile(event, 'bookPicture');">
                        <div class="wrapperImg"><img id="bookPicture" alt="livre"/></div>
                    </div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>
                  
				<button type="submit" name="envoiLectures" class="btn btn-default">Ajouter</button>
			  </form>		
		
            <!-- Liste des lectures -->            
	        <?php echo $liste_lectures; ?>
	        
	   </section>   							
    
        
        <!-- __________ACTIONS___________-->
        <!--_____________________________-->	
		<section id="actions">			
			  <h3>Actions</h3>
			  
			  <form data-toggle="validator" role="form"  method="POST" action="traitement_formulaire.php" >
			        <!-- Date de début --> 
                    <div class="form-group has-feedback">
                        <div class="input-group">   
                            <label for="action_date_debut"  class="control-label">Date début</label>
                            <input type="date" required class="form-control" name="action_date_debut" id="action_date_debut" data-provide="datepicker">
                        </div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

			        <!-- Date de fin --> 
                    <div class="form-group has-feedback">
                        <div class="input-group"> 
                            <label for="action_date_fin"  class="control-label">Date fin</label>
                            <input type="date" required class="form-control" name="action_date_fin" id="action_date_fin">
                        </div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>
                  
                    <!-- Lieu --> 
                    <div class="form-group has-feedback" id="checkbox_lycee">				  
                      <?php echo $checkbox_lycee;?>
                    </div>
			        <!-- Auteurs --> 
                    <div class="form-group has-feedback" id="checkbox_auteur">				  
                      <?php echo $checkbox_auteur;?>
                    </div>

                    <button type="submit" name="envoiActions" class="btn btn-default">Ajouter</button>
				
			  </form>			
		
            <!-- Liste des lectures -->            
	        <?php echo $liste_actions; ?>	        
	   </section>     
    
        
        <!-- ________PARTENAIRES_________-->
        <!--_____________________________-->
        
		<section id="partenaires">			
            <h3>Partenaires</h3>
            <form data-toggle="validator" role="form" method="post" name="partenairesTable" enctype="multipart/form-data"  action="traitement_formulaire.php">

                <!-- Nom Partenaire -->
               <div class="form-group has-feedback">
                    <div class="input-group">
                        <label for="partenaire_nom" class="control-label">Nom du Partenaire</label>
                        <input type="text" class="form-control" name="partenaire_nom" id="partenaire_nom" required>
                    </div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <!-- Logo Partenaires -->
               <div class="form-group has-feedback">
                    <div class="input-group">
                        <label for="partenaire_logo" class="control-label">Logo du Partenaire</label>
                        <input  name="imgUpload" type="file" class="form-control" id="partenaire_logo" required onChange="loadFile(event, 'partenairePicture');">
                        <div class="wrapperImg"><img id="partenairePicture" alt="livre"/></div>
                    </div>
                    <div class="input-group">
                        <label for="partenaire_lien" class="control-label">Lien du site Partenaire</label>
                        <input type="url" class="form-control" name="partenaire_lien" id="partenaire_lien">
                   </div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>
                
                <button type="submit" name="envoiPartenaires" class="btn btn-default">Ajouter</button>
                
            </form>
            <?php echo $liste_partenaires; ?>
        </section>

    

    
</body>

</html>
