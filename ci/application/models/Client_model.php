<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {


    function __construct(){
        parent::__construct();
    }

	public function save($client)
	{
        if(isset($client['IdClinte']) && $client['IdClinte'] > 0){
            $this->db->where('IdClinte', $client['IdClinte']);
            unset($client['IdClinte']);
            $this->db->update('Clientes', $client);
            return $this->db->affected_rows();
        }
        else{
            $this->db->insert('Clientes', $client);
            return $this->db->insert_id();
        }
	}

    public function get($clienteid)
	{
        $this->db->where('IdClinte', $clienteid);
        $query = $this->db->get('Clientes', 1);
        if($query->num_rows()==1){
            return $query->row();
        }
        else{
            return NULL;
        }
	}

    public function delete($clienteid)
	{
        $this->db->where('IdClinte', $clienteid);
        $this->db->delete('Clientes');
        return $this->db->affected_rows();
	}

    public function getAll($limit=0, $offset=0){
        if($limit == 0 ){
            $this->db->order_by('IdClinte', 'desc');
            $query = $this->db->get('Clientes');
            if($query->num_rows() > 0 ){
                return $query->result();
            }
            else {
                return NULL;
            }        
        }
        else{
            $this->db->order_by('IdClinte', 'desc');
            $query = $this->db->get('Clientes', $limit);
            if($query->num_rows() > 0 ){
                return $query->result();
            }
            else {
                return NULL;
            }     
        }
    }
}
