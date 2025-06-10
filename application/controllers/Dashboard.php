<?php
defined('BASEPATH') or die('No direct script access allowed!');
/**
 * @property CI_Template $template
 * @property CI_Session $session
 */
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
    }

    public function index()
    {
        return $this->template->load('template', 'dashboard');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        session_destroy();
        redirect(base_url());
    }
}
