<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Supplier extends CI_Model
{
    // deklarasi variable
    private $_table = "supplier";
    public $id_supplier;
    public $nama;

    //menampilkan data
    public function rule()
    {
        return [
            [
                `field` => `username`,
                `rules` => `required`
            ],
            [
                `field` => `password`,
                `rules` => `required`
            ],
        ];
    }
    //kode
    

    //menampilkan data
    public function ambil_data()
    {
        return $this->db->get($this->_table)->result();
    }

    //create
    public function save()
    {
        $post = $this->input->post();
        
        
        $this->nama = $post["nama"];
        
        

        $result = $this->db->insert($this->_table, $this);
        return $result;
    }
    //Update data
    public function update()
    {
        $post = $this->input->post();
        $encrypt = $post["password"];
        $this->kode_pemesanan = $post["kode_pemesanan"];
        $this->bayar = $post["bayar"];

        $this->db->update($this->_table, $this, array('kode_pemesanan' => $post['kode_pemesanan2']));
    }
    //Delete
    public function delete()
    {
        // return $this->db->delete($this->_table, array("id_user"=> $id_user));
        $id_user = $this->input->post('id_user');
        $this->db->where('id_user', $id_user);
        $result = $this->db->delete('login');
        return $result;
    }
}
