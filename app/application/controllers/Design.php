<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Design extends CI_Controller
{
    /*http://midominio.com/controlador/metodo/parametro*/
    public function __construct()
    {
        parent::__construct();
        //Libreria de session de CI:
        //$this->load->library('session');
        $this->load->helper('url');
        $this->load->model('categorias');
        $this->load->model('productos');
    }

    //Paso 1: Lista las categorias de productos.
    public function listarCategorias()
    {
        //$data['categorias']=$this->categorias->listar();
        $data['categorias']=$this->categorias->listarEditables();

        $this->load->view('header');
        $this->load->view('design/categorias',$data);
        $this->load->view('footer');
    }


    //Paso 2: Recibe la categoria elegida y filtra los productos asociados.
    public function categoriaElegida()
    {
        //$categoria=$this->input->post('categoria');
        $categoria=$this->input->get('categoria');
        //$data['productos']=$this->productos->buscarTodos($categoria);
        $data['productos']=$this->productos->buscarEditables($categoria);

        $this->load->view('header');
        $this->load->view('design/productos',$data);
        $this->load->view('footer');
    }


    //Paso 3: Recibe los datos del producto elegido.
    public function productoElegido()
    {
        //$producto = $this->input->post('grilla');
        $id_producto = $this->input->get('id_producto');
        $nombre = $this->input->get('nombre');
        $id_categoria = $this->input->get('id_categoria');

        //Separa el id del producto y el nombre del producto que provienen juntos separados por una coma.
        //$id_nombre_producto=$producto["id_producto"];
        //$datos=explode(",", $id_nombre_producto);

        //Se asigna el id del producto al array.
        //$producto["id_producto"]=$datos[0];

        //Se busca el producto por su id y recibe los datos asociados (sku, id_imagen, url_imagen)
        //ademas de los ya existentes (id_producto, id_categoria).
        $productoEncontrado = $this->productos->buscar($id_producto, $id_categoria);

        //Se asigna el nombre del producto (titulo).
        $productoEncontrado[0]["nombre_producto"]=$nombre;

        $data['productoEncontrado'] = $productoEncontrado;

        //Se envia a la pantalla donde se carga la imagen para recortar.
        $this->load->view('header');
        $this->load->view('design/productoElegido',$data);
        $this->load->view('footer');
    }

    //Paso 4: Se recibe la data de la imagen recortada y se convierte a un archivo para ser almacenada
    public function guardarEstampado()
    {
        $productoTerminado = $this->input->post('grilla');

        if($productoTerminado['imagenRecortada']!="")
        {
            $img = $productoTerminado['imagenRecortada'];

            /*
            $img_pedida = array(
            'order_item_id'  => '9999',
            'url_cropped_img' => 'johndoe@some-site.com',
            );
            //Setea las variables de sesion.
            $this->session->set_userdata($img_pedida);
            */

            /*
            echo $img;
            list($type, $img) = explode(';', $img);
            list(, $img)      = explode(',', $img);
            $img = base64_decode($img);

            file_put_contents('wp-content/uploads/image.png', $img);
            $img = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $img));
            */

            //Convierte la data de la imagen en un archivo.
            if (preg_match('/^data:image\/(\w+);base64,/', $img, $type)) {
                $img = substr($img, strpos($img, ',') + 1);
                $type = strtolower($type[1]); // jpg, png, gif

                if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                    throw new \Exception('invalid image type');
                }

                $img = base64_decode($img);

                if ($img === false) {
                    throw new \Exception('base64_decode failed');
                }
            } else {
                throw new \Exception('did not match data URI with image data');
            }

            //Se crea una variable fecha para dar nombre al archivo de imagen.
            $fecha = date("YmdHis");
            //Se forma la url donde esta almacenada la imagen.
            $url = "wp-content/uploads/" . $fecha . "." . $type;

            //Se guardar el archivo en la ubicacion indicada.
            file_put_contents($url, $img);

            //Almacena la ruta de la imagen para guardarlo luego en el template "order-details".
            $_SESSION["img"] = $url;
            //file_put_contents("wp-content/uploads/img.{$type}", $img);

            //Se asocia la url de la imagen recortada al producto.
            $productoTerminado['imagenRecortada'] = $url;

            /*Se busca el nombre de la categoria para asociarla al producto y
              crear el link para enviar los datos del producto al carrito.*/
            $productoTerminado['nombre_categoria'] = $this->categorias->nombreCategoria($productoTerminado);
            $data['productoTerminado'] = $productoTerminado;

            //Obtiene las variables de session.
            //$info=$this->session->all_userdata();
            //echo $info['order_item_id'];

            //Se envia a la ultima vista donde se ve finalizada la edicion y con el link para añadir al carrito de compras
            $this->load->view('header');
            $this->load->view('design/productoTerminado', $data);
            $this->load->view('footer');
        }
        else{
            $this->listarCategorias();
        }

    }


}
