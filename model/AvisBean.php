<?php

    class AvisBean{

        /*----------------------------------------------------
                            Attributs :
        -----------------------------------------------------*/  
        private $id_avis;
        private $note;
        private $title_avis;
        private $comments;
        private $id_user;

        /*----------------------------------------------------
                            Constucteur :
        -----------------------------------------------------*/        
        public function __construct($note, $title_avis, $comments){
            $this->note = $note;
            $this->title_avis = $title_avis;
            $this->comments = $comments;
            //l'id_user est récupéré grâce à la session php ($_SESSION["user"])
        }

        /*----------------------------------------------------
                            Getter & Setter :
        -----------------------------------------------------*/

        //id_avis Getter & Setter
        public function getIdAvis(){
            return $this->id_avis;
        }

        public function setIdAvis($newIdAvis){
            $this->id_avis = $newIdAvis;
        }

        //note Getter & Setter
        public function getNote(){
            return $this->note;
        }

        public function setNote($newNote){
            $this->note = $newNote;
        }

        //title_avis Getter & Setter
        public function getTitleAvis(){
            return $this->title_avis;
        }

        public function setTitleAvis($newTitleAvis){
            $this->title_avis = $newTitleAvis;
        }

        //comments Getter & Setter
        public function getComments(){
            return $this->comments;
        }

        public function setComments($newComments){
            $this->comments = $newComments;
        }

        //id_user Getter & Setter
        public function getIdUserAvis(){
            return $this->id_user;
        }

        public function setIdUserAvis($newIdUser){
            $this->id_user = $newIdUser;
        }
    
    /*-----------------------------------------------------
                            Fonctions :
    -----------------------------------------------------*/

        //méthode ajout d'un Avis en en bdd
        public function createAvis($bdd){  

            //récupération des valeurs de l'objet
            $note = $this->getNote();
            $title_avis = $this->getTitleAvis();
            $comments = $this->getComments();
            $id_user = $this->getIdUserAvis();
      
            try{   
                //requête ajout d'une tâche
                $sql = "INSERT INTO avis(note, title_avis, comments, id_user) 
                VALUES (:note, :title_avis, :comments, :id_user)";

                $query = $bdd->prepare($sql);
                //éxécution de la requête SQL
                $query->execute(array(
                    "note" => $note,
                    "title_avis" => $title_avis,
                    "comments" => $comments,
                    "id_user" => $id_user
                ));
                
            } catch(Exception $e) {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }  
        }      
    }
    






?>