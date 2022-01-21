<?php
//<?php? >

    class Database{
        //Paramètre de la Database
        private $host = 'localhost';
        private $db_name = 'immovable';
        private $user = 'root';
        private $password = '';
        private $connexion;

        //Connexion à la Database
        public function connect ()
        {

            $this->connexion = null;

            try {
                $this->connexion = new PDO('mysql:host='.$this->host.'; dbname='.$this->db_name, $this->user, $this->password);
                $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erreur: ".$e->getMessage();
            }
            return $this->connexion;

        }

       

    }
?>