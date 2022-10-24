<?php
class EmployerController{

  public static function getAllEmployers(){
    if(isset($_POST['search'])){
      $data = array('search' => $_POST['search']);
      $employers = EmployesDB::searchEmployer($data);
    }
    else
    {
      $employers = EmployesDB::getAll(); 
    }
    include('views/home.php');
  }

    public static function getOneEmployer(){
      if(isset($_POST['submit'])){
        $data = array(
          'id' => $_POST['id'],
          'nom' => $_POST['nom'],
          'prenom' => $_POST['prenom'],
          'matricule' => $_POST['matricule'],
          'depart' => $_POST['depart'],
          'poste' => $_POST['poste'],
          'date_emb' => $_POST['date_emb'],
          'statut' => $_POST['statut'],
        );
        $result = EmployesDB::update($data);
        if($result){
          Session::set('success', 'Employer est modifier');
          Redirect::to('home'); 
          
        }
        else{
          echo $result;
        }
      }
      else
      if(isset($_POST['id'])){
        $data = array(
          'id' => $_POST['id']
        );
        $employers = EmployesDB::getEmployer($data);
        include('views/update.php');
      }
      else
      include('views/home.php');
    }
  
    public static function addEmployer(){
      
      //formulaire validé
      if(isset($_POST["submit"])){
        //filtrage des données et neutralisation xss
        $data = array(
          'nom' =>filter_var($_POST["nom"],FILTER_SANITIZE_STRING),
          'prenom' =>filter_var($_POST["prenom"],FILTER_SANITIZE_STRING),
          'matricule' =>filter_var($_POST["matricule"],FILTER_SANITIZE_NUMBER_INT),
          'depart' =>filter_var($_POST["depart"],FILTER_SANITIZE_STRING),
          'poste' =>filter_var($_POST["poste"], FILTER_SANITIZE_STRING),
          'date_emb' =>filter_var($_POST["date_emb"],FILTER_SANITIZE_STRING),
          'statut'=>filter_var($_POST["statut"],FILTER_SANITIZE_STRING),
        );
        //validation des données et test de garde
        EmployerController::validateForm($data);
        //traitement des données valide
        $result = EmployesDB::add($data);
        if($result){
          Session::set('success','Employé Ajouté');
          Redirect::to('home');
        }
      }
        //afficher formulaire
        include('views/add.php'); 
    }

    public static function deleteEmployer(){
      if(isset($_POST['id'])){
        $data['id'] = $_POST['id'];
        $result = EmployesDB::delete($data);
        if($result){
          Session::set('success', 'Employer est supprimé');
          Redirect::to('home');
          
        }else{
          echo $result;
        }
      }
      else
      include('views/home.php');
    }
// affichage des messages d'erreur en cas de formulaire incomplet
    public static function validateForm($data){
      $errors = EmployesDB::checkdata($data);
        $message="";
        if ($errors->count()>0)
          {
            foreach($errors as $key => $val){
              $message .= $val;
            }
            Session::set('error',$message);
            Redirect::to('add');
          }
}
}
?>