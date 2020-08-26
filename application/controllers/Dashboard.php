<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('data_login'))) {
			$this->session->set_flashdata('flash-error', 'Anda Belum Login');
			redirect('Login', 'refresh');
		}

		$this->load->model('M_Rekap', 'rekap');
		$this->load->model('M_Data', 'data');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['page'] = 'backend/dashboard';
		$this->load->view('backend/index', $data);
	}

	public function dashboard_realtime()
	{
		$data_tabel = $this->rekap->getLast();

		if ($data_tabel == null) {
			$data_tabel[] = [
				"id" => 0,
				"waktu" => null,
				"cahaya" => 0,
				"hujan" => 0
			];
		}

		echo json_encode($data_tabel);
	}

	public function profile()
	{
		$data['title'] = 'Profile';
		$data['page'] = 'backend/profile';
		$this->load->view('backend/index', $data);
	}

	public function editProfile()
	{
		if ($this->input->post('password', true)) {
			$data = [
				"nama" => $this->input->post('nama', true),
				"password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT)
			];
		} else {
			$data = [
				"nama" => $this->input->post('nama', true)
			];
		}

		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('tbuser', $data);

		$this->session->set_flashdata('flash-sukses', 'Profile berhasil diedit');
		redirect('Dashboard/profile', 'refresh');
	}

	function get_realtime()
	{
		$data_tabel = $this->rekap->getGrafik();
		echo json_encode($data_tabel);
	}

	public function grafik()
	{
		$data['title'] = 'Grafik Intensitas Cahaya Lama';
		$data['page'] = 'backend/grafik';
		$this->load->view('backend/index', $data);
	}

	public function rekap()
	{
		$data['title'] = 'Data Rekap';
		$data['page'] = 'backend/rekap';
		$data['rekap'] = $this->rekap->getAll();
		$this->load->view('backend/index', $data);
	}

	public function hapusRekap($id)
	{
		$this->rekap->hapusRekap($id);
		$this->session->set_flashdata('flash-sukses', 'data berhasil dihapus');
		redirect('Dashboard/rekap');
	}
}
