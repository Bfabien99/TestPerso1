<?php
require 'model/apiModel.php';

class apiController{
    
   public function Tojson($data)
   {    
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
   }

    public function save($name, $tel, $location, $area, $details, $price){
        $initModel = new apiModel();
        $callModel = $initModel->set($name, $tel, $location, $area, $details, $price);
        return $this->Tojson($callModel);
    }

    public function update($id,$name, $tel, $location, $area, $details, $price){
        $initModel = new apiModel();
        $callModel = $initModel->update($id, $name, $tel, $location, $area, $details, $price);
        return $this->Tojson($callModel);
    }

    public function obtainAll(){
        $initModel = new apiModel();
        $callModel = $initModel->getAll();
        return $this->Tojson($callModel);
    }

    public function obtainLimit($limite){
        $initModel = new apiModel();
        $callModel = $initModel->getLimite($limite);
        return $callModel;
    }

    public function cibleId($id){
        $initModel = new apiModel();
        $callModel = $initModel->cible($id);
        return $this->Tojson($callModel);
    }

    // public function cibleId2($id){
    //     $initModel = new apiModel();
    //     $callModel = $initModel->cible($id);
    //     $callModel = json_decode($callModel,true);
    //     return $callModel;
    // }

    public function unset($id){
        $initModel = new apiModel();
        $callModel = $initModel->unset($id);
        return $this->Tojson($callModel);
    }

    public function search($key){
        $initModel = new apiModel();
        $callModel = $initModel->search($key);
        return $callModel;
    }

    public function searchAdmin($key){
        $initModel = new apiModel();
        $callModel = $initModel->searchAdmin($key);
        return $callModel;
    }
    

}