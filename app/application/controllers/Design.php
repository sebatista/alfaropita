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
        $this->load->model('imagenesPrecargadas');
    }


    public function croppie()
    {
        $this->load->view('header2');
        $this->load->view('croppie-upload');
        $this->load->view('footer');
    }


    //Paso 1: Lista las categorias de productos.
    public function listarCategorias()
    {
        $data['categorias']=$this->categorias->listarEditables();

        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('design/categorias',$data);
        $this->load->view('footer');
    }


    //Paso 2: Recibe la categoria elegida y filtra los productos asociados.
    public function categoriaElegida()
    {
        $categoria=$this->input->get('categoria');
        $productos = $this->productos->buscarEditables($categoria);
        $data['productos'] = $productos;

        $this->load->view('header');
        $this->load->view('design/productos',$data);
        $this->load->view('footer');
    }


    //Paso 3: Recibe los datos del producto elegido.
    public function productoElegido()
    {
        $productoEncontrado["id_producto"] = $id_producto = $this->input->get('id_producto');
        $productoEncontrado["sku"] = $nombre_producto = $this->input->get('sku');
        $productoEncontrado["nombre_producto"] = $nombre_producto = $this->input->get('nombre_producto');
        $productoEncontrado["id_imagen"] = $url_imagen = $this->input->get('id_imagen');
        $productoEncontrado["url_imagen"] = $url_imagen = $this->input->get('url_imagen');
        $productoEncontrado["id_categoria"] = $id_categoria = $this->input->get('id_categoria');

        $data['producto'] = $productoEncontrado;

        //Se envia a la pantalla donde se carga la imagen para recortar.
        $this->load->view('header');
        $this->load->view('design/productoElegido',$data);
        $this->load->view('footer');
    }


    //Paso 4: Se recibe la data de la imagen recortada y se convierte a un archivo para ser almacenada
    public function guardarEstampado()
    {
        $productoTerminado = $this->input->post('grilla');
        $imgDesign = $productoTerminado['imgDesign'];

        if($productoTerminado['imagenRecortada']!="" || $productoTerminado['urlImagenFrase']!="" || $productoTerminado['idImagenPrecargada']!="")
        {
            //Consulta la informacion de la imagen recortada
            $img = $productoTerminado['imgDesign'];
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

            //Guarda los datos de la imagen precargada
            //Almacena la ruta de la imagen del diseño para guardarla luego en el template "order-details".
            //wp-content/plugins/woocommerce/templates/order/order-details.php.
            $_SESSION["img"] = $url;

            //file_put_contents("wp-content/uploads/img.{$type}", $img);

            //Se asocia la url de la imagen recortada al producto.
            $productoTerminado['imagenRecortada'] = $url;

            /*Se busca el nombre de la categoria para asociarla al producto y
              crear el link para enviar los datos del producto al carrito.*/
            $productoTerminado['nombre_categoria'] = $this->categorias->nombreCategoria($productoTerminado);
            $productoTerminado['design'] = $imgDesign;
            $data['productoTerminado'] = $productoTerminado;


            //Se envia a la ultima vista donde se ve finalizada la edicion y con el link para añadir al carrito de compras
            $this->load->view('header');
            $this->load->view('design/productoTerminado', $data);
            $this->load->view('footer');
        }
        else
            {
                $this->listarCategorias();
            }

    }


    public function listarImagenesPrecargadas()
    {
        $data['imagenes'] = $this->imagenesPrecargadas->listarImagenes();
        $this->load->view('design/imagenesPrecargadas', $data);
    }


    public function listarRelCatImg()
    {
        $data['categorias'] = $this->imagenesPrecargadas->listarCategorias();
        $data['cat_img'] = $this->imagenesPrecargadas->listarRelCatImg();
        $this->load->view('design/imagenesPrecargadas', $data);
    }
}
