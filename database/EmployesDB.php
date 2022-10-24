<?php

class EmployesDB {
	
	static public function checkdata($data)
	{
		$errors= new ArrayObject();
		foreach ($data as $key => $value) {
			if(empty($value)) {
				$errors->append("$key n'est pas valide <br>");
			}
		}
		return $errors;
	}
    static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM employer');
		$stmt->execute();
		$employers= $stmt->fetchAll(PDO::FETCH_OBJ);
		$liste = new ArrayObject();
			foreach ($employers as $key => $employe) {
				$liste->append(new Employes($employe->id,$employe->nom,$employe->prenom,$employe->matricule,$employe->depart,$employe->poste,$employe->date_emb,$employe->statut));
			}
			
		return $liste;
	}

	static public function getEmployer($data){
		$id = $data['id'];
		try{
			$query = 'SELECT * FROM employer WHERE id=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			$employers = $stmt->fetch(PDO::FETCH_OBJ);

			return new Employes($employers->id,$employers->nom,$employers->prenom,$employers->matricule,$employers->depart,$employers->poste,$employers->date_emb,$employers->statut);
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function add($data):bool{
		if (empty($data['nom'])){Session::set('error','Nom manquant');
			return false;
		}
			
		if (empty($data['prenom'])){Session::set('error','Prenom manquant');
			return false;

		}
			
		if (empty($data['matricule'])){Session::set('error','Matricule manquant');
			return false; 
		}
			
		if (empty($data['depart'])){Session::set('error','depart manquant');
			return false;
		}
			
		if (empty($data['poste'])){Session::set('error','poste manquant');
			return false;
		}
			
		if (empty($data['date_emb'])){Session::set('error','date_emb manquant');
			return false;
		}
			
		if (empty($data['statut'])){Session::set('error','Statut manquant');
			return false;
		}

			
									
		$stmt = DB::connect()->prepare('INSERT INTO employer (nom,prenom,matricule,depart,poste,date_emb,statut)
			VALUES (:nom,:prenom,:matricule,:depart,:poste,:date_emb,:statut)');
		$stmt->bindParam(':nom',$data['nom']);
		$stmt->bindParam(':prenom',$data['prenom']);
		$stmt->bindParam(':matricule',$data['matricule']);
		$stmt->bindParam(':depart',$data['depart']);
		$stmt->bindParam(':poste',$data['poste']);
		$stmt->bindParam(':date_emb',$data['date_emb']);
		$stmt->bindParam(':statut',$data['statut']);
		if($stmt->execute()){
		$stmt = null;
			return true;
		}else{
		$stmt = null;
			return false;
		}
		
	}
	static public function update($data):bool
	{
		$stmt = DB::connect()->prepare('UPDATE employer SET nom= :nom,prenom=:prenom,matricule=:matricule,depart=:depart,poste=:poste,date_emb=:date_emb,statut=:statut WHERE id=:id');
		$stmt->bindParam(':id',$data['id']);
		$stmt->bindParam(':nom',$data['nom']);
		$stmt->bindParam(':prenom',$data['prenom']);
		$stmt->bindParam(':matricule',$data['matricule']);
		$stmt->bindParam(':depart',$data['depart']);
		$stmt->bindParam(':poste',$data['poste']);
		$stmt->bindParam(':date_emb',$data['date_emb']);
		$stmt->bindParam(':statut',$data['statut']);
		if($stmt->execute()){
			$stmt = null;
			return true;
		}else{

			$stmt = null;
			return false;
		}
	}

	static public function delete($data){
		$id = $data['id'];
		try{
			$query = 'DELETE FROM employer WHERE id=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			if($stmt->execute()){
				return true;
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
	static public function searchEmployer($data){
		$search = $data['search'];
		try{
			$query = 'SELECT * FROM employer WHERE nom LIKE ? OR prenom LIKE ?';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%','%'.$search.'%'));
			$employers = $stmt->fetchAll(PDO::FETCH_OBJ);

			$liste = new ArrayObject();
			foreach ($employers as $key => $employe) {
				$liste->append(new Employes($employe->id,$employe->nom,$employe->prenom,$employe->matricule,$employe->depart,$employe->poste,$employe->date_emb,$employe->statut));
			}
			return $liste;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
}

?>