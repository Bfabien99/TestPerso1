<?php
    require 'model/apiModel.php';
    class apiController
    {
        public function Tojson($value)
        {   
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            echo json_encode($value,JSON_UNESCAPED_UNICODE);
        }

        public function All()
        {
            $initModel = new apiModel();
            $calls = $initModel->getFormations();
            return $this->Tojson($calls);
        }

        public function byId($id)
        {
            $initModel = new apiModel();
            $calls = $initModel->getFormationbyId($id);
            return $this->Tojson($calls);
        }

    }