<?php
class apiModel{
        
    public function dbConnect() 
    {
        $dsn="mysql:dbname=immovable;host=localhost";
        $password = "";
        $user = "root";

        $connect = new PDO($dsn,$user,$password,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]);

        if (!$connect) 
        {
            return new \Exception("Database cannot connect");
        }
        else
        {   
            return $connect;
        }
    }

    public function set($name, $tel, $location, $area, $details, $price)
    {
        
        $db = $this->dbConnect();
        $query = $db->prepare('INSERT INTO property(owner, tel, postdate, location, area, details, price) VALUES (:name, :tel, :date, :location, :area, :details, :price)');
        $query->execute([
            'name' => $name,
            'tel' => $tel,
            'date' => date('Y-m-d H-M-i'),
            'location' => $location,
            'area' => $area,
            'details' => $details,
            'price' => $price
        ]);

    }

    public function getLimite($limite)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT * FROM property ORDER BY id DESC LIMIT '.$limite);
        $query->execute();
        $get = $query->fetchAll(PDO::FETCH_ASSOC);
        return $get;
    }

    public function getAll()
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT * FROM property');
        $query->execute();
        $get = $query->fetchAll(PDO::FETCH_ASSOC);
        return $get;
    }

    public function unset($id)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('DELETE FROM property WHERE id=:id');
        $query->execute([
            'id' => $id
        ]);
    }

    public function cible($id)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT * FROM property WHERE id=:id');
        $query->execute([
            'id' => $id
        ]);
        $get = $query->fetch(PDO::FETCH_ASSOC);
        return $get;
    }

    public function search($key)
    {
        $db = $this->dbConnect();
        $location = '%'. $key .'%';
        $query = $db->prepare('SELECT * FROM property WHERE price <= :price OR location LIKE :location');
        $query->execute([
            'price' => $key,
            'location' => $location,
        ]);
        $get = $query->fetchAll(PDO::FETCH_ASSOC);
        return $get;
    }

    public function searchAdmin($key)
    {
        $db = $this->dbConnect();
        $text = '%'. $key .'%';
        $query = $db->prepare('SELECT * FROM property WHERE price <= :price OR location LIKE :location OR owner LIKE :name');
        $query->execute([
            'price' => $key,
            'location' => $text,
            'name' => $text,
        ]);
        $get = $query->fetchAll(PDO::FETCH_ASSOC);
        return $get;
    }

    public function update($id, $name, $tel, $location, $area, $details, $price)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('UPDATE property SET owner=:name, tel=:tel, postdate=:date, location=:location, area=:area, details=:details, price=:price WHERE id=:id');
        $query->execute([
            'id' => $id,
            'name' => $name,
            'tel' => $tel,
            'date' => date('Y-m-d H-M-i'),
            'location' => $location,
            'area' => $area,
            'details' => $details,
            'price' => $price
        ]);
    }

}