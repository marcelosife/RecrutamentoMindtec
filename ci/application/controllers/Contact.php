<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Contact_model', 'contact');
        $this->load->model('Client_model', 'client');
    }

	public function index()
	{
        $this->load->view('index');
    }

    public function getAll()
	{        
        $dados['contacts'] = $this->contact->getAll();
		$this->load->view('contact_list', $dados);
	}

    public function getAllClient()
	{        
        $clientid = $this->uri->segment(3);
        $dados['client'] = $this->client->get($clientid);
        $dados['contacts'] = $this->contact->getAllClient($clientid);
		$this->load->view('contact_list', $dados);
	}

    public function detail()
	{
        $contactid = $this->uri->segment(2);
        $dados['contact'] = $this->contact->get($contactid);
        $this->form_validation->set_rules('TipoContato', 'Tipo', 'trim|required|max_length[50]', 
        array(  'required'=> 'Campo {field} requerido'    ));
        $this->form_validation->set_rules('DescContato', 'Descrição', 'trim|required|max_length[255]', 
        array(  'required'=> 'Campo {field} requerido'    ));
        if($this->form_validation->run() == TRUE){
            $data_form = $this->input->post();            
            $update_contact['IdContato'] = $contactid;
            $update_contact['TipoContato'] = $data_form['TipoContato'];
            $update_contact['BolAtivo'] = $data_form['BolAtivo'];
            if($contacid = $this->contact->save($update_contact)){
                redirect(  'contatos', 'refresh' );
            }
        }
        $this->load->view('contact_detail', $dados);
	}

    public function delete()
	{
        $contactid = $this->uri->segment(3);
        if(isset($contactid) && $contactid > 0){
            if($this->contact->get($contactid)){
                $this->contact->delete($contactid);
            }
        }
        redirect(  'contatos', 'refresh' );
	}

    public function insert(){
        $clientid = $this->uri->segment(2);
        $dados['client'] = $this->client->get($clientid);
        $this->form_validation->set_rules('TipoContato', 'Tipo Contato', 'trim|required|max_length[50]', 
        array(  'required'=> 'Campo {field} requerido'    ));
        $this->form_validation->set_rules('DescContato', 'Descrição Contato', 'trim|required|max_length[255]', 
        array(  'required'=> 'Campo {field} requerido'    ));
        if($this->form_validation->run() == TRUE){       
            $data_form = $this->input->post();
            $newcontact['IdClinte'] = $clientid;
            $newcontact['TipoContato'] = $data_form['TipoContato'];
            $newcontact['DescContato'] = $data_form['TipoContato'];
            if($contactid = $this->contact->save($newcontact)){
                redirect(  'contatos/cliente/'.$clientid, 'refresh' );
            }
        }
        $this->load->view('contact_new', $dados);
    }

}
