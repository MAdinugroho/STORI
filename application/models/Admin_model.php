<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class admin_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }

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

  public function createUser($alamat_foto)
    {
      $data = array(
        'username' => $this->input->post('username'),
        'password' => md5($this->input->post('password')),
        'fullname' => $this->input->post('fullname'),
        'address' => $this->input->post('address'),
        'previlleges' => $this->input->post('previlleges'),
        'foto' => $alamat_foto
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
