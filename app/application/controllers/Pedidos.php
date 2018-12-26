<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller
{
    /*http://midominio.com/controlador/metodo/parametro*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('pedido');
    }


    public function listar()
    {
        $data['pedidos'] = $this->pedido->listar();
        $this->load->view('header');
        $this->load->view('pedidos/listar',$data);
    }


    public function verPedido()
    {
        $order_id = $this->input->post('order_id');
        $data['pedido'] = $this->pedido->buscar($order_id);

        $this->load->view('header');
        $this->load->view('pedidos/ver',$data);
    }


    public function guardar($order, $img, $frase)
    {
        $db=new database();
        $db->conectar();

        $consulta = "SELECT *
                     FROM wp_woocommerce_order_img_cropped
                     WHERE order_id = '$order'
                     AND url_cropped_img = '$img'
                     AND url_frase_img = '$frase';";

        $resultado = mysqli_query($db->conexion, $consulta) or die ("No se puede guardar el pedido.");

        if(mysqli_num_rows($resultado))
        {
            echo "El pedido ya fue procesado";
        }
        else
        {
            $consulta = "INSERT INTO wp_woocommerce_order_img_cropped (order_id, url_cropped_img, url_frase_img)
                         VALUES ('$order', '$img', '$frase')";

            $resultado=mysqli_query($db->conexion, $consulta) or die ("No se puede guardar el pedido.");
        }

    }
}
