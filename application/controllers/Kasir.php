<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kasir extends CI_Controller{
  public function __construct(){
  parent::__construct();
  $this->load->model('kasir_model');
}


	public function index()
	{
		redirect(base_url('kasirHome'));
	}

  public function login()
  {
    if ($this->input->post('loginValidation')) {
      $user = $this->kasir_model->loginValidation();
      if ($user->num_rows() > 0) {
        $data['account'] = $this->kasir_model->getLoggedAccount();
        $data_session = array(
          'login' => true,
          'id' => $data['account']->id,
          'username' => $data['account']->username,
          'password' => $data['account']->password,
          'fullname' => $data['account']->fullname,
          'address' => $data['account']->address,
          'previlleges'=> $data['account']->previlleges,
          'foto'=> $data['account']->foto
        );
        $this->session->set_userdata($data_session);
        if ($data['account']->previlleges=='user') {
          redirect(base_url('kasirHome'));
        } elseif ($data['account']->previlleges=='admin') {
          redirect(base_url('adminHome'));
        }
      } else {
        $this->load->view('notification/loginFailed');
        $this->load->view('kasir/kasirLogin');
      }
    }
    else {
    $this->load->view('kasir/kasirLogin');
    }
  }

    public function kasirHome()
    {
      $data['view_name'] = "kasirHome";
      $data['notification'] = 'loginSuccess';
      $this->load->view('kasir/template',$data);
    }

    public function kasirBeli()
    {
      if ($this->input->post('createpembeli')) {
        $this->kasir_model->createpembeli();
        $data['id'] = $this->kasir_model->getlastid();
        redirect(base_url('kasirDetail/'.$data['id']));
//        var_dump($data['id']);die;
//        $data['menu'] = $this->kasir_model->getmenu();
//        $data['detail'] = $this->kasir_model->getdetail();
//        $data['detailBeli'] = $this->kasir_model->getSelectedDetailBeli($data['id']);
//        $data['view_name'] = "kasirDetail";
//        $data['notification'] = 'beliAlert';
//        $this->load->view('kasir/template',$data);
      } else {
        $data['beli'] = $this->kasir_model->getbeli();
        $data['view_name'] = "kasirBeli";
        $data['notification'] = 'beliAlert';
        $this->load->view('kasir/template',$data);
      }
    }

    public function kasirDetail($id)
    {
      if ($this->input->post('tambahOrder')) {
        $this->kasir_model->tambahOrder($id);
      }
      $data['menu'] = $this->kasir_model->getmenu();
      $data['detail'] = $this->kasir_model->getSelectedDetailBeli($id);
      $data['view_name'] = "kasirDetail";
      $data['notification'] = 'beliAlert';
      $this->load->view('kasir/template',$data);
    }

    public function kasirRecord()
    {
      $data['view_name'] = "kasirRecord";
      $data['notification'] = 'beliAlert';
      $this->load->view('kasir/template',$data);
    }

    public function kasirLogout()
  {
    $this->session->sess_destroy();
    redirect(base_url('kasirLogin'));
  }

  public function rekapStok()
  {
    $data['stok'] = $this->kasir_model->getStok();
    $data['view_name'] = "rekapStok";
    $data['notification'] = 'rekapStok';
    $this->load->view('kasir/template',$data);
  }

  public function createStok()
  {
    if ($this->input->post('createStok')) {
      $this->kasir_model->createStok();
      redirect(base_url('rekapStok'));
    } elseif ($this->input->post('back')) {
      redirect(base_url('rekapStok'));
    } else {
      $data['view_name'] = "createStok";
      $data['notification'] = 'createStok';
      $this->load->view('kasir/template',$data);
    }
  }

  public function detailStok($id)
  {
    if ($this->input->post('updateStok')) {
      $this->kasir_model->updateStok($id);
      $data['notification'] = 'updateStokSuccess';
      $data['stok'] = $this->kasir_model->getSelectedStok($id);
      $data['view_name'] = "detailStok";
      $this->load->view('kasir/template',$data);
    } elseif ($this->input->post('back')) {
      redirect(base_url('rekapStok'));
    } elseif ($this->input->post('deleteStok')) {
      $this->kasir_model->deleteStok($id);
      redirect(base_url('rekapStok'));
    } else {
      $data['notification'] = 'kosongan';
      $data['stok'] = $this->kasir_model->getSelectedStok($id);
      $data['view_name'] = "detailStok";
      $this->load->view('kasir/template',$data);
    }
  }

  public function akunEdit()
  {
    if ($this->input->post('updateAkun')) {
      $this->kasir_model->updateAkun();
      $data['account'] = $this->kasir_model->getUpdatedUser();
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
      $data['view_name'] = 'akunEdit';
      $this->load->view('kasir/template',$data);
    } else {
    $data['notification'] = 'dataCreateAlert';
    $data['view_name'] = 'akunEdit';
    $this->load->view('kasir/template',$data);
    }
  }

}
  ?>
