<?php

    class Post{

        //Database
        private $connexion;
        private $table = 'property';

        //Element de $table
        public $id;
        public $owner;
        public $tel;
        public $postdate;
        public $location;
        public $area;
        public $details;
        public $price;


        public function __construct($db) {
            $this->connexion = $db;
        }

        public function read(){
            $query = 'SELECT * FROM '.$this->table;
            //prepare statement
            $stmt = $this->connexion->prepare($query);

            //execute statement
            $stmt->execute();

            return $stmt;
        }

        public function read_single(){
            $query = 'SELECT * FROM '.$this->table.' WHERE id = ? LIMIT 0,1';
            //prepare statement
            $stmt = $this->connexion->prepare($query);

            //lier id(bind)
            $stmt->bindParam(1, $this->id);
            //execute statement
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //set properties
            $this->owner = $row['owner'];
            $this->tel = $row['tel'];
            $this->location = $row['location'];
            $this->area = $row['area'];
            $this->details = $row['details'];
            $this->price = $row['price'];

            return $stmt;
        }

        public function create()
        {
            $query = 'INSERT INTO '.$this->table.' SET owner = :owner, tel = :tel, location = :location, area = :area, details = :details, price = :price';

            $stmt = $this->connexion->prepare($query);

            $this->owner = htmlspecialchars(strip_tags($this->owner));
            $this->tel = htmlspecialchars(strip_tags($this->tel));
            $this->location = htmlspecialchars(strip_tags($this->location));
            $this->area = htmlspecialchars(strip_tags($this->area));
            $this->details = htmlspecialchars(strip_tags($this->details));
            $this->price = htmlspecialchars(strip_tags($this->price));

            $stmt->bindParam(':owner', $this->owner);
            $stmt->bindParam(':tel', $this->tel);
            $stmt->bindParam(':location', $this->location);
            $stmt->bindParam(':area', $this->area);
            $stmt->bindParam(':details', $this->details);
            $stmt->bindParam(':price', $this->price);

            if ($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;
        }

        public function update()
        {
            $query = 'UPDATE '.$this->table.' SET owner = :owner, tel = :tel, location = :location, area = :area, details = :details, price = :price WHERE id = :id';

            $stmt = $this->connexion->prepare($query);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->owner = htmlspecialchars(strip_tags($this->owner));
            $this->tel = htmlspecialchars(strip_tags($this->tel));
            $this->location = htmlspecialchars(strip_tags($this->location));
            $this->area = htmlspecialchars(strip_tags($this->area));
            $this->details = htmlspecialchars(strip_tags($this->details));
            $this->price = htmlspecialchars(strip_tags($this->price));

            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':owner', $this->owner);
            $stmt->bindParam(':tel', $this->tel);
            $stmt->bindParam(':location', $this->location);
            $stmt->bindParam(':area', $this->area);
            $stmt->bindParam(':details', $this->details);
            $stmt->bindParam(':price', $this->price);

            if ($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;
        }

        public function delete(){
            $query = 'DELETE FROM '.$this->table.' WHERE ID = :id';

            $stmt = $this->connexion->prepare($query);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id', $this->id);

            if ($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;
        }


    }