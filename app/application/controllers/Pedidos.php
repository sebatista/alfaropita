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

}