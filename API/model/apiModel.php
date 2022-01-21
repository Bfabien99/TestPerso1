<?php

    class apiModel{

        public function db(){
            return new PDO("mysql:host=localhost;dbname=montestapi;charset=utf8","root","");
        }

        public function getFormations()
        {
            $pdo=$this->db();
            $req = "SELECT * FROM formations";
            $state = $pdo->prepare($req);
            $state->execute();
            $formations = $state->fetchAll(PDO::FETCH_ASSOC);
            return $formations;
            $state->closeCursor();
        }

        public function getFormationbyId($id)
        {
            $pdo=$this->db();
            $req = "SELECT * FROM formations WHERE id= :id";
            $state = $pdo->prepare($req);
            $state->bindValue(":id",$id,PDO::PARAM_INT);
            $state->execute();
            $formation = $state->fetch();
            return $formation;
            $state->closeCursor();
        }

    }