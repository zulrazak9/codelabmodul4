<?php

namespace app\Controller;

include "app/Traits/ApiResponseFormatter.php";
include "app/Models/Product.php";

use app\Models\Product;
use app\Traits\ApiResponseFormatter;

class ProductController
{
    use ApiResponseFormatter;

    public function index()
    {
        //DEFINISI OBJEK MODEL PRODICT YANG SUDAH DIBUAT
        $productModel = new Product();
        $response = $productModel->findAll();
        // RETURN $RESPONSE DENGAN MELAKUKAN FORMATTIN TERLEBIH DAHULU MENGGUNAKAN TRAIT YANG SUDAH DIPANGGIL
        return $this->apiResponse(200, "success", $response);
    
    }

    public function getById($id)
    {
        $productModel = new Product();
        $response = $productModel->findById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        // TANGKAP INPUT JSON
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        // VALIDASI INPUT VALID ATAU TIDAK
        if (json_last_error()) {
            return $this->apiResponse(400, "Error invalid input", null);
        }

        $productModel = new Product();
        $response = $productModel->create([
            "product_name" => $inputData['product_name']
        ]);

        return $this->apiResponse(200, "success", $response);
    }

    public function update($id)
    {
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        if (json_last_error()) {
            return $this->apiResponse(400, "Error invalid input", null);
        }

        $productModel = new Product();
        $response = $productModel->update([
            "product_name" => $inputData['product_name']
        ], $id);

        return $this->apiResponse(200, "success", $response);
    }
    public function delete($id)    
    {
        $productModel = new product();
        $response = $productModel->delete($id);

        return $this->apiResponse(200, "success", $response);
    }
}