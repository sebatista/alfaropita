<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Precargadas extends CI_Controller
{
    /*http://midominio.com/controlador/metodo/parametro*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('pedido');
        $this->load->model('categorias');
        $this->load->model('imagenesPrecargadas');
    }


    public function nuevaImagen()
    {
        $data['categorias'] = $this->categorias->listarCategoriasPredeterminadas();
        $this->load->view('header');
        $this->load->view('pedidos/menu');
        $this->load->view('imagen/nueva',$data);
    }


    public function nuevaCategoria()
    {
        $this->load->view('header');
        $this->load->view('pedidos/menu');
        $this->load->view('categoria/nueva');
    }


    public function guardarCategoria()
    {
        $categoria = $this->input->post('categoria');
        $this->categorias->guardarCategoria($categoria);

        $this->nuevaImagen();
    }


    public function guardarImagen()
    {
        $categoria = $this->input->post('categoria');

        //Check if the file is well uploaded
        if($_FILES['file']['error'] > 0) { echo 'Error during uploading, try again'; }

        //We won't use $_FILES['file']['type'] to check the file extension for security purpose

        //Set up valid image extensions
        $extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );

        //Extract extention from uploaded file
        //substr return ".jpg"
        //Strrchr return "jpg"

        $extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;

        //Check if the uploaded file extension is allowed
        if (in_array($extUpload, $extsAllowed) ) {

            //Upload the file on the server
            $name = $_FILES['file']['name'];
            $this->imagenesPrecargadas->guardarImagen($categoria, $name);
            $urlName = "wp-content/{$_FILES['file']['name']}";
            $result = move_uploaded_file($_FILES['file']['tmp_name'], $urlName);

            if($result){echo "<img src='$urlName'/>";}

        } else { echo 'File is not valid. Please try again'; }

    }


}
