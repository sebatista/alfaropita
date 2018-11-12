<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Design extends CI_Controller
{
    /*http://midominio.com/controlador/metodo/parametro*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('categorias');
        $this->load->model('productos');
    }


    public function listarCategorias()
    {

        $data['categorias']=$this->categorias->listar();

        $this->load->view('header');
        $this->load->view('design/categorias',$data);
    }


    public function categoriaElegida()
    {
        //$data['categoria']=$this->input->post("categoria");

        $categoria=$this->input->post('categoria');
        $data['productos']=$this->productos->buscarTodos($categoria);

        $this->load->view('header');
        $this->load->view('design/productos',$data);
    }


    public function productoElegido()
    {
        $data["idProducto"] = $this->input->post('idProducto');

        $idProducto = $data["idProducto"];
        $data['productoEncontrado']=$this->productos->buscar($idProducto);

        $this->load->view('header');
        $this->load->view('design/productoElegido',$data);
    }


    public function guardarEstampado()
    {
        $productoTerminado = $this->input->post('grilla');
        $img=$productoTerminado['imagenRecortada'];

        /*
        echo $img;
        list($type, $img) = explode(';', $img);
        list(, $img)      = explode(',', $img);
        $img = base64_decode($img);

        file_put_contents('wp-content/uploads/image.png', $img);
        $img = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $img));
        */
        //Convierte la data de la imagen en un archivo.
        $fecha = date("YmdHis");
        if (preg_match('/^data:image\/(\w+);base64,/', $img, $type)) {
            $img = substr($img, strpos($img, ',') + 1);
            $type = strtolower($type[1]); // jpg, png, gif

            if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
                throw new \Exception('invalid image type');
            }

            $img = base64_decode($img);

            if ($img === false) {
                throw new \Exception('base64_decode failed');
            }
        } else {
            throw new \Exception('did not match data URI with image data');
        }
        $url= "wp-content/uploads/".$fecha.".".$type;
        file_put_contents($url, $img);
        //file_put_contents("wp-content/uploads/img.{$type}", $img);

        $productoTerminado['imagenRecortada'] = $url;
        $data['productoTerminado'] = $productoTerminado;
        $this->load->view('header');
        $this->load->view('design/productoTerminado',$data);
    }



    //////////////////////////////////

    public function nuevo()
    {
        $this->load->model('plan');
        $data['planes']=$this->plan->listar();

        $this->load->model('datos');
        $data['datos']=$this->datos->listar();

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('design/nuevo',$data);
    }

    public function guardar()
    {
        $this->load->model('Categorias');
        $this->load->model('rel_plan_datos');

        $linea=$this->input->post('design[]');

        //Envio el array design sin el idPlanDatos y me lo devuelve con id para despues guardarlo en la design
        $linea=$this->rel_plan_datos->guardar($linea);
        $this->linea->guardar($linea);

        $this->listar();
    }

    public function editar()
    {
        $this->load->model('Categorias');
        $data['Design']=$this->linea->listar();

        $this->load->model('plan');
        $data['planes']=$this->plan->listar();

        $this->load->model('datos');
        $data['datos']=$this->datos->listar();

        $this->load->view('header');
        $this->load->view('navbar');
        //$this->load->view('design/headerTablaLineas');
        $this->load->view('design/editar',$data);
        $this->load->view('design/footerTabla');
    }

    public function actualizar()
    {
        $this->load->model('Categorias');
        $this->load->model('rel_plan_datos');
        $grilla=$this->input->post('grilla[]');

        $i=0;
        foreach($grilla as $linea)
        {
            if($linea['modificado']==1)
            {
                $lineas[$i]["id"]=$linea["id"];
                $lineas[$i]["numero"]=$linea["numero"];
                $lineas[$i]["estado"]=$linea["estado"];
                $lineas[$i]["estadoFecha"]=$linea["estadoFecha"];
                $lineas[$i]["idPlanDatos"]=$linea["idPlanDatos"];
                $lineas[$i]["idPlan"]=$linea["idPlan"];
                $lineas[$i]["idDatos"]=$linea["idDatos"];
                $lineas[$i]["observaciones"]=$linea["observaciones"];
                $i++;
            }
        }

        $lineas=$this->rel_plan_datos->actualizar($lineas);
        $this->linea->actualizar($lineas);
        $this->listar();
    }

}
