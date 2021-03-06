<?php
  class Home extends CI_Controller{
    public function __construct(){
      parent::__construct();

      // Load the model
      $this->load->model('HomeModel');
    }

    public function index(){
      $data['library'] = $this->load->view('includes/general/library.php', NULL, TRUE);
      $data['js'] = $this->load->view('includes/home/js.php', NULL, TRUE);
      $data['css'] = $this->load->view('includes/home/css.php', NULL, TRUE);
      
      $data['navbar'] = $this->load->view('components/general/navbar.php', NULL, TRUE);

      $this->load->view('pages/home.php', $data);
    }

    public function getAllProducts(){
      $allProducts = $this->HomeModel->getAllProducts();

      echo json_encode(array('status' => 'ok', 'datas' => $allProducts));
    }

    public function addNewProduct(){
      $name = $this->input->post('name');
      $price = $this->input->post('price');
      $quantity = $this->input->post('quantity');
      $description = $this->input->post('description');
      $imageURL = $this->input->post('imageURL');

      $response = $this->HomeModel->addNewProduct($name, $price, $quantity, $description, $imageURL);
    
      if($response){
        echo json_encode(array('status' => 'ok', 'message' => 'The product has been successfully added!'));
      }
    }

    public function deleteProduct(){
      $productID = $this->input->post('productID');

      $response = $this->HomeModel->deleteProduct($productID);

      if($response){
        echo json_encode(array('status' => 'ok', 'message' => 'The product has been successfully deleted!'));
      }
    }

    public function updateProduct(){
      $name = $this->input->post('name');
      $price = $this->input->post('price');
      $quantity = $this->input->post('quantity');
      $description = $this->input->post('description');
      $imageURL = $this->input->post('imageURL');

      $response = $this->HomeModel->updateProduct($name, $price, $quantity, $description, $imageURL);
    
      if($response){
        echo json_encode(array('status' => 'ok', 'message' => 'The product has been successfully updated!'));
      }
    }
  }
?>
