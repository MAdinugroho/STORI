<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
  public function __construct(){
  parent::__construct();
  $this->load->model('admin_model');
  $this->load->model('kasir_model');
}


	public function index()
	{
		redirect(base_url('adminHome'));
	}


    public function adminHome()
    {
      $data['view_name'] = "adminHome";
      $data['notification'] = 'loginSuccess';
      $this->load->view('admin/template',$data);
    }

    public function adminRecord()
    {
      $data['record'] = $this->admin_model->getreport();
      $data['view_name'] = "adminRecord";
      $data['notification'] = 'kosongan';
      $this->load->view('admin/template',$data);
    }

    public function adminStok()
    {
      $data['stok'] = $this->kasir_model->getStok();
      $data['view_name'] = "rekapStok";
      $data['notification'] = 'kosongan';
      $this->load->view('admin/template',$data);
    }

    public function rekapUser()
      {
        $data['user'] = $this->admin_model->getUser();
        $data['notification'] = "kosongan";
        $data['view_name'] = "rekapUser";
        $this->load->view('admin/template',$data);
      }

      public function createUser()
        {
            if ($this->input->post('createUser')) {
                $config['upload_path']   = './foto/profil/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']      = 300;
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('foto'))
                {
                  echo $this->upload->display_errors();
                }
                else
                {

                  $data = $this->upload->data();
                  $this->admin_model->createUser($data['file_name']);
                }

                redirect(base_url('adminHome'));
            } else {
              $data['notification'] = 'dataCreateAlert';
              $data['view_name'] = 'createUser';
              $this->load->view('admin/template',$data);
            }
        }

        public function editUser($id)
  {
    if ($this->input->post('updateUser')) {
      $this->admin_model->updateUser($id);
      $data['notification'] = 'dataCreateSuccess';
      $data['user'] = $this->admin_model->getUser();
  		$data['view_name'] = "adminHome";
  		$this->load->view('admin/template',$data);
    } else {
    $data['user'] = $this->admin_model->getSelectedUser($id);
    $data['notification'] = 'dataCreateAlert';
    $data['view_name'] = 'editUser';
    $this->load->view('admin/template',$data);
    }
  }

  public function deleteUser($id)
  {
    $this->admin_model->deleteUser($id);
    redirect(base_url('rekapUser'));
  }

  public function adminEdit()
  {
    if ($this->input->post('updateAdmin')) {
      $this->admin_model->updateAdmin();
      $data['account'] = $this->admin_model->getUpdatedAdmin();
      $data_session = array(
        'login' => true,
        'id' => $data['account']->id,
        'username' => $data['account']->username,
        'password' => $data['account']->password,
        'fullname' => $data['account']->fullname,
        'address' => $data['account']->address
      );
      $this->session->set_userdata($data_session);

      $data['notification'] = 'dataCreateSuccess';
      $data['view_name'] = 'adminEdit';
      $this->load->view('admin/template',$data);
    } else {
    $data['notification'] = 'dataCreateAlert';
    $data['view_name'] = 'adminEdit';
    $this->load->view('admin/template',$data);
    }
  }

  public function adminLogout()
  	{
  		$this->session->sess_destroy();
  		redirect(base_url('adminLogin'));
  	}

    public function cetak()
    {
      $data['record'] = $this->admin_model->getreport();
      $this->load->view('admin/cetak',$data);
    }

    public function cetak2()
    {
      $data['stok'] = $this->kasir_model->getStok();
      $this->load->view('admin/cetak2',$data);
    }

}
  ?>
