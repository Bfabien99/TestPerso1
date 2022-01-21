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
        if ($callModel) {
            $response = [
            "ok" => true,
            "message" => "All Ressource found",
            "results" => $callModel,
        ];
        }
        else {
            $response = [
                "results" => $callModel,
                "ok" => false,
                "message" => "Ressource not found"];
        }
        return $this->Tojson($response);
        // $allPropertys = $callModel;
        // ob_start();
        // // extract($callModel);
        // require "view/allProperty.php";
        // return ob_get_clean();
    }

    public function obtainLimit($limite){
        $initModel = new apiModel();
        $callModel = $initModel->getLimite($limite);
        return $callModel;
    }

    public function cibleId($id){
        $initModel = new apiModel();
        $callModel = $initModel->cible($id);
        if ($callModel) {
            $response = [
            "ok" => true,
            "message" => "Ressource found",
            "results" => $callModel,
        ];
        }
        else {
            $response = [
                "results" => $callModel,
                "ok" => false,
                "message" => "Ressource not found"];
        }
        return $this->Tojson($response);
        // $property = $callModel;
        // ob_start();
        // require "view/show.php";
        // return ob_get_clean();
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
        if ($callModel) {
            $response = [
                "ok" => false,
                "message" => "Ressource not found"
            ];
        }
        else {
            $response = [
                "ok" => true,
                "message" => "Deleted succesfully"
            ];
        }
        
        return $this->Tojson($response);
        // ob_start();
        // require "view/delete.php";
        // return ob_get_clean();
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