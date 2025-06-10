<?php
defined('BASEPATH') or die('No direct script access allowed!');

/**
 * @property CI_Loader $load
 * @property CI_Input $input
 * @property CI_Session $session
 * @property Absensi_model $absensi
 * @property User_Model $user
 * @property CI_Router $router
 * @property CI_DB $db
 */
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session'); // Pastikan session di-load
        // Hanya cek login untuk method selain index dan login
        if (!in_array($this->router->method, ['index', 'login', 'logout'])) {
            is_login(true);
        }
    }

    public function index()
    {
        // Jika sudah login, redirect ke dashboard
        if ($this->session->userdata('is_login')) {
            redirect('dashboard');
        }
        return $this->load->view('login');
    }

    public function login()
    {
        $this->load->model('User_Model', 'user');

        // Ambil input
        $username = $this->input->post('username');
        $password = $this->input->post('password'); // Password angka biasa

        $check = $this->user->find_by('username', $username, false);

        if ($check->num_rows() == 1) {
            $user_data = $check->row();

            // Bandingkan password langsung (tanpa hash)
            if ($password == $user_data->password) { // Perubahan utama di sini
                $this->set_session($user_data);
                redirect('dashboard');
                return;
            } else {
                $this->error('Login gagal! Password tidak sesuai');
            }
        } else {
            $this->error('Login gagal! User tidak ditemukan');
        }

        redirect('auth/');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/');
    }

    private function set_session($user_data)
    {
        $this->load->model('Absensi_model', 'absensi');
        $this->session->set_userdata([
            'id_user' => $user_data->id_user,
            'nama' => $user_data->nama,
            'foto' => $user_data->foto,
            'username' => $user_data->username,
            'divisi' => $user_data->divisi,
            'level' => $user_data->level,
            'is_login' => true,
            'last_activity' => time() // Untuk session timeout
        ]);

        if ($user_data->level == 'Karyawan') {
            $absen = $this->absensi->absen_harian_user($user_data->id_user);
            $absen_hari_ini = $absen->num_rows();

            if ($absen_hari_ini < 2) {
                $this->session->set_flashdata('absen_needed', [
                    'href' => base_url('absensi/check_absen/'),
                    'message' => 'Anda belum melakukan absensi ' . ($absen_hari_ini == 0 ? 'masuk' : 'pulang')
                ]);
            }
        }

        $this->session->set_flashdata('response', [
            'status' => 'success',
            'message' => 'Selamat Datang ' . $user_data->nama
        ]);
    }

    private function error($msg)
    {
        $this->session->set_flashdata('error', $msg);
    }
}
