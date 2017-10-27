<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {


    function __construct(){
        parent::__construct();
    }

	public function save($contact)
	{
        if(isset($contact['IdContato']) && $contact['IdContato'] > 0){
            $this->db->where('IdContato', $contact['IdContato']);
            unset($contact['IdContato']);
            $this->db->update('ContatosClientes', $contact);
            return $this->db->affected_rows();
        }
        else{
            $this->db->insert('ContatosClientes', $contact);
            return $this->db->insert_id();
        }
	}

    public function get($contactid)
	{
        $this->db->where('IdContato', $contactid);
        $query = $this->db->get('ContatosClientes', 1);
        if($query->num_rows()==1){
            return $query->row();
        }
        else{
            return NULL;
        }
	}

    public function delete($contactid)
	{
        $this->db->where('IdContato', $contactid);
        $this->db->delete('ContatosClientes');
        return $this->db->affected_rows();
	}

    public function getAllClient($clientid){      
        $this->db->where('IdClinte', $clientid);  
        $this->db->order_by('IdContato', 'desc');
        $query = $this->db->get('ContatosClientes');
        if($query->num_rows() > 0 ){
            return $query->result();
        }
        else {
            return NULL;
        }
    }

    public function getAll($limit=0, $offset=0){
        if($limit == 0 ){
            $this->db->order_by('IdContato', 'desc');
            $query = $this->db->get('ContatosClientes');
            if($query->num_rows() > 0 ){
                return $query->result();
            }
            else {
                return NULL;
            }        
        }
        else{
            $this->db->order_by('IdContato', 'desc');
            $query = $this->db->get('ContatosClientes', $limit);
            if($query->num_rows() > 0 ){
                return $query->result();
            }
            else {
                return NULL;
            }     
        }
    }
}
