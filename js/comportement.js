
function modif(section,id){
       
    console.log("table : "+section);
    console.log("id : "+id);
       
}
       
   
function modifLectures(id,titre,auteur,desc){
       
    var formulaire;
    formulaire = '<form role="form"  method="POST" action="update_bdd.php" > ';
    formulaire += '<input type="hidden" name="lecture_id" id="lecture_id" value="'+id+'">';
    formulaire += ' <div class="form-group">';
    formulaire += '     <label for="lecture_titre">Titre :</label>';
    formulaire += '     <input type="text" required="required" class="form-control" name="lecture_titre" id="lecture_titre" placeholder="'+titre+'" value="'+titre+'"  >'; 
    formulaire += ' </div>';
    formulaire += ' <div class="form-group">';
    formulaire += '     <label for="lecture_auteur">Auteur :</label>';
    formulaire += '     <input type="text" required="required" class="form-control" name="lecture_auteur" id="lecture_auteur" placeholder="'+auteur+'" value="'+auteur+'">'; 
    formulaire += ' </div>';
    formulaire += ' <div class="form-group">';
    formulaire += '     <label for="lecture_desc">Description :</label>';
   formulaire += '     <input type="text" required="required" class="form-control" name="lecture_desc" id="lecture_desc" placeholder="'+desc+'" value="'+desc+'">'; 
    formulaire += ' </div>';
    formulaire += ' <button type="submit" name="modifLectures" class="btn btn-default">Ajouter</button>';    
    formulaire += ' </form>';             

    $('body').prepend(formulaire);   

}

function modifActions(id,date_debut,date_fin,lycee){

    var formulaire;

    console.log("id : "+id);   
    console.log("date_debut : "+date_debut);
    console.log("date_fin : "+date_fin);


    formulaire = '<form role="form"  method="POST" action="update_bdd.php" > ';
    formulaire += '<input type="hidden" name="action_id" id="action_id" value="'+id+'">';
    formulaire += ' <div class="form-group">';
    formulaire += '     <label for="action_date_debut">date début :</label>';
    formulaire += '     <input type="date" required="required" class="form-control" name="action_date_debut" id="action_date_debut" placeholder="'+date_debut+'" value="'+date_debut+'"  >'; 
    formulaire += ' </div>';
    formulaire += ' <div class="form-group">';
    formulaire += '     <label for="action_date_fin">date fin</label>';
    formulaire += '     <input type="date" required="required" class="form-control" name="action_date_fin" id="action_date_fin" placeholder="'+date_fin+'" value="'+date_fin+'"  >'; 
    formulaire += ' </div>';
    formulaire += ' <div class="form-group" id="checkbox_lycee_modif">';        
    formulaire += ' </div>';
    formulaire += ' <div class="form-group" id="checkbox_auteur_modif">';        
    formulaire += ' </div>';

    //formulaire +=  auteur;       

    formulaire += ' <button type="submit" name="modifActions" class="btn btn-default">Ajouter</button>';    
    formulaire += ' </form>';              


    $('body').prepend(formulaire);    


    //insertion des inputs checkbox_auteur   
    var nodelist = document.getElementById("checkbox_auteur");
    console.log(nodelist.length);  
    console.log(nodelist.innerHTML);
    document.getElementById('checkbox_auteur_modif').innerHTML = nodelist.innerHTML;

    //insertion des inputs checkbox_lycee     
    nodelist = document.getElementById("checkbox_lycee");
    console.log(nodelist.length);  
    console.log(nodelist.innerHTML);
    document.getElementById('checkbox_lycee_modif').innerHTML = nodelist.innerHTML;  

}


function supTuple(table,id){
        
    var formulaire;    
    formulaire = '<form role="form"  method="POST" action="update_bdd.php" > ';
    formulaire += '<input type="hidden" name="table" id="table" value="'+table+'">';
    formulaire += '<input type="hidden" name="id" id="id" value="'+id+'">';    
    formulaire += '<p>Supprimer définitivement ?</p>'; 
    formulaire += ' <button type="submit" name="supOui" class="btn btn-default">Ok</button>'; 
    formulaire += ' <button type="submit" name="supNon" class="btn btn-default">Non</button>';
    formulaire += ' </form>';   

    $('body').prepend(formulaire);      
        
}
       
   
    
