<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clientes extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('cliente');
  }

  public function index()
  {
    $data['listaClientes'] = $this->cliente->getClientes();
    $this->load->view('templates/header');
    $this->load->view('clientes/index', $data);
    $this->load->view('templates/footer');
  }

  public function getClientePorId($id)
  {
    $data = $this->cliente->getClientePorId($id);
    echo json_encode($data);
  }

  public function guardarCliente()
  {
    $data = array(
      'nombre_aa' => $this->input->post('nombre_aa'),
      'apellido_aa' => $this->input->post('apellido_aa'),
      'cedula_aa' => $this->input->post('cedula_aa'),
      'ubicacion_aa' => $this->input->post('ubicacion_aa')
    );

    if ($this->cliente->guardarCliente($data)) {
      $response = array(
        'status' => 'success',
        'message' => 'Cliente guardado correctamente'
      );
    } else {
      $response = array(
        'status' => 'error',
        'message' => 'Error al guardar el cliente'
      );
    }
    echo json_encode($response);
  }

  public function eliminarCliente($id)
  {
    if ($this->cliente->eliminarCliente($id)) {
      $response = array(
        'status' => 'success',
        'message' => 'cliente eliminado correctamente'
      );
    } else {
      $response = array(
        'status' => 'error',
        'message' => 'Error al eliminar el cliente'
      );
    }
    echo json_encode($response);
  }

  public function editarCliente($id)
  {
    $data = array(
      'nombre_aa' => $this->input->post('nombre_aa'),
      'apellido_aa' => $this->input->post('apellido_aa'),
      'cedula_aa' => $this->input->post('cedula_aa'),
      'ubicacion_aa' => $this->input->post('ubicacion_aa')
    );

    if ($this->cliente->editarCliente($id, $data)) {
      $response = array(
        'status' => 'success',
        'message' => 'cliente editado correctamente'
      );
    } else {
      $response = array(
        'status' => 'error',
        'message' => 'Error al editar el cliente'
      );
    }
    echo json_encode($response);
  }
}
