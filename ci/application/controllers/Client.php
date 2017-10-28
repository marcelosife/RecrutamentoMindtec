<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Client_model', 'client');
        $this->load->model('Contact_model', 'contact');
    }

	public function index()
	{
        $this->load->view('index');
    }

    public function getAll()
	{        
        $dados['clients'] = $this->client->getAll();
		$this->load->view('client_list', $dados);
	}

    public function detail()
	{
        $clientid = $this->uri->segment(2);
        $dados['client'] = $this->client->get($clientid);
        $this->form_validation->set_rules('RazaoSocial', 'Razão Social', 'trim|required|max_length[255]', 
        array(  'required'=> 'Campo {field} requerido'    ));
        if($this->form_validation->run() == TRUE){
            $data_form = $this->input->post();            
            $update_client['IdCliente'] = $clientid;
            $update_client['RazaoSocial'] = $data_form['RazaoSocial'];
            $update_client['BolAtivo'] = $data_form['BolAtivo'];
            if($clientid = $this->client->save($update_client)){
                redirect(  'clientes', 'refresh' );
            }
        }
        $this->load->view('client_detail', $dados);
	}

    public function delete()
	{
        $clientid = $this->input->post('clientid');
        if(isset($clientid) && $clientid > 0){
            if($this->client->get($clientid)){
                if($this->contact->getAllClient($clientid)){
                    $data = array('delete' => FALSE );   
                }
                else{
                   $this->client->delete($clientid);
                   $data = array('delete' => TRUE );
                }     
                echo json_encode($data);               
            }
        }
	}

    public function insert(){
        $this->form_validation->set_rules('RazaoSocial', 'Razão Social', 'trim|required', 
        array(  'required'=> 'Campo {field} requerido'    ));
        if($this->form_validation->run() == TRUE){       
            $data_form = $this->input->post();
            $newclient['RazaoSocial'] = $data_form['RazaoSocial'];
            date_default_timezone_set('America/Sao_Paulo');
            $newclient['DataCadastro'] = date("Y-m-d H:i:s");
            if($clientid = $this->client->save($newclient)){
                redirect(  'clientes', 'refresh' );
            }
        }
        $this->load->view('client_new');
    }

}
