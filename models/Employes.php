<?php
class Employes
{
    private int $id;
    private String $nom;
    private String $prenom;
    private int $matricule;
    private String $depart;
    private String $poste;
    private DateTime $date_emb;
    private int $statut;
    public function __construct($id, $nom,$prenom,$matricule, $depart, $poste, $date_emb, $statut)
    {
        $this->id = $id;
        $this->nom = htmlentities($nom);
        $this->prenom = htmlentities($prenom);
        $this->matricule = htmlentities($matricule);
        $this->date_emb = new DateTime($date_emb);
        $this->statut = $statut;
        $this->depart = $depart;
        $this->poste = $poste;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getMatricule()
    {
        return $this->matricule;
    }
    public function getDepart()
    {
        return $this->depart;
    }
    public function getPoste()
    {
        return $this->poste;
    }
    public function getStatut()
    {
        return $this->statut;
    }
    public function getDate_emb()
    {
        return $this->date_emb;
    }

}