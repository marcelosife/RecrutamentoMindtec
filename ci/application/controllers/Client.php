<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Client_model', 'client');
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
            $update_client['IdClinte'] = $clientid;
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
        $clientid = $this->uri->segment(3);
        if(isset($clientid) && $clientid > 0){
            if($this->client->get($clientid)){
                $this->client->delete($clientid);
            }
        }
        redirect(  'clientes', 'refresh' );
	}

    public function insert(){
        $this->form_validation->set_rules('RazaoSocial', 'Razão Social', 'trim|required', 
        array(  'required'=> 'Campo {field} requerido'    ));
        if($this->form_validation->run() == TRUE){       
            $data_form = $this->input->post();
            $newclient['RazaoSocial'] = $data_form['RazaoSocial'];
            $newclient['DataCadastro'] = date("Y-m-d H:i:s");
            if($clientid = $this->client->save($newclient)){
                redirect(  'clientes', 'refresh' );
            }
        }
        $this->load->view('client_new');
    }

}
