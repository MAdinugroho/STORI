<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Kasir_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }

  public function loginValidation()
  {
    $where = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password'))
     );

     return $this->db->get_where('account',$where);
  }

  public function getLoggedAccount()
  {
    $where = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password'))
     );

     $query = $this->db->get_where('account',$where);
     return $query->row();

  }

  public function getbeli()
  {
//    $query = $this->db->get('beli');
    $query = $this->db->query('select a.id_beli, a.username, a.tanggal, a.nama_pelanggan, b.subtotal from beli as a, (SELECT	a.id_beli, sum(a.total) as subtotal from 	view_detailbeli as a GROUP BY id_beli) as b where a.id_beli=b.id_beli');
    return $query->result();
  }



  public function createpembeli()
  {
    $data = array(
      'nama_pelanggan' => $this->input->post('nama_pelanggan'),
      'username' =>  $this->session->userdata['username']
     );
     $this->db->insert('beli',$data);
  }

  public function getlastid()
  {
    $query= $this->db->insert_id();
    return $query;
  }

  public function getSelectedDetailBeli($id)
  {
    $where = array('id_beli' => $id );
    $query = $this->db->get_where('detail_beli',$where);
    return $query->result();
  }

  public function tambahOrder($id)
  {
    $data = array(
      'id_beli' => $id,
      'id_kue' => $this->input->post('id_kue'),
      'jumlah_pesan' => $this->input->post('jumlah_pesan')
     );
    $this->db->insert('detailbeli',$data);
  }

  public function getmenu()
  {
    $query = $this->db->get('kue');
    return $query->result();
  }

  public function getdetail()
  {
    $query = $this->db->get('view_detailbeli');
    return $query->result();
  }

  public function createdetail()
  {
    $data = array(
      'kue' => $this->input->post('nama_pelanggan'),
      'jumlah' =>  $this->input->post('nama_pelanggan'),
     );
     $this->db->insert('beli',$data);
  }



  public function getStok()
  {
    $query = $this->db->get('view_stok_baru');
    return $query->result();
  }

  public function getSelectedStok($id)
  {
    $where = array(
      'id_kue' => $id
     );

     $query = $this->db->get_where('view_stok',$where);
     return $query->row();
  }

  public function updateStok($id)
  {
    $where = array('id_kue' => $id );
    $data = array(
      'nama_kue' => $this->input->post('nama_kue'),
      'harga' => $this->input->post('harga')
    );
    $data1 = array('stok_awal' => $this->input->post('stok_awal'));
    $this->db->where($where);
    $this->db->update('kue',$data);
    $this->db->where($where);
    $this->db->update('stok',$data1);
  }

  public function deleteStok($id)
  {
    $where = array('id_kue' => $id);
    $this->db->delete('kue',$where);
    $this->db->delete('stok',$where);
  }

  public function createStok()
  {
    $data = array(
      'nama_kue' => $this->input->post('nama_kue'),
      'harga' => $this->input->post('harga')
     );
     $data1 = array('stok_awal' => $this->input->post('stok_awal'));
     $this->db->insert('kue',$data);
     $this->db->insert('stok',$data1);
  }

  public function updateAkun()
  {
    $where = array('id' => $this->session->userdata['id'] );
    $data = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password')),
      'fullname' => $this->input->post('fullname'),
      'address' => $this->input->post('address')
    );
    $this->db->where($where);
    $this->db->update('account',$data);
  }

  public function getUpdatedUser()
  {
    $where = array('id' => $this->session->userdata['id']);
     $query = $this->db->get_where('account',$where);
     return $query->row();

  }


/*-----------------   UNTUKKK ADMINNNN  ------------------------- */
  public function getreport()
  {
    $query = $this->db->get('view_reportt');
    return $query->result();
  }

  public function getUser()
  {
    $query = $this->db->get('account');
    return $query->result();
  }

  public function createUser()
    {
      $data = array(
        'username' => $this->input->post('username'),
        'password' => md5($this->input->post('password')),
        'fullname' => $this->input->post('fullname'),
        'address' => $this->input->post('address'),
        'previlleges' => $this->input->post('previlleges')
      );

      $this->db->insert('account',$data);
    }


    public function getSelectedUser($id)
  {
    $where = array('id' => $id );
    $query = $this->db->get_where('account',$where);
    return $query->row();
  }

  public function updateUser($id)
  {
    $where = array('id' => $id );
    $data = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password')),
      'fullname' => $this->input->post('fullname'),
      'address' => $this->input->post('address')
    );
    $this->db->where($where);
    $this->db->update('account',$data);
  }

  public function deleteUser($id)
    {
      $where = array(
        'id' => $id
       );
      $this->db->delete('account',$where);
    }

    public function updateAdmin()
  {
    $where = array('id' => $this->session->userdata['id'] );
    $data = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password')),
      'fullname' => $this->input->post('fullname'),
      'address' => $this->input->post('address')
    );
    $this->db->where($where);
    $this->db->update('account',$data);
  }

  public function getUpdatedAdmin()
  {
    $where = array('id' => $this->session->userdata['id']);
    $query = $this->db->get_where('account',$where);
    return $query->row();
  }
}
 ?>
