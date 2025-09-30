<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: CrudController
 * 
 * Automatically generated via CLI.
 */
class CrudController extends Controller {
    public function __construct()
    {
        parent::__construct();
         // Guard: redirect if not logged in
        if(!$this->Auth->is_logged_in()) {
            redirect('auth/login');
            exit;
        }
    }

    public function all()
    {
        $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 5;

        $all = $this->UserModel->page($q, $records_per_page, $page);
        $data['all'] = $all['records'];
        $total_rows = $all['total_rows'];
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('bootstrap'); // or 'tailwind', or 'custom'
        $this->pagination->initialize($total_rows, $records_per_page, $page, site_url('/View').'?q='.$q);
        $data['page'] = $this->pagination->paginate();
        $this->call->view('View', $data);
    }

    public function create()
    {
        if($this->io->method() === 'post') {
            $name = $this->io->post('name');
            $email = $this->io->post('email');

            $data = [
                'name'  => $name,
                'email' => $email
            ];
            $this->UserModel->Insert($data);
            redirect('/View');
        } else {
            $this->call->view('Create');
        }
    }

    public function update($id)
    {
        if($this->io->method() === 'post') {
            $name = $this->io->post('name');
            $email = $this->io->post('email');

            $data = [
                'name'  => $name,
                'email' => $email
            ];
            $this->UserModel->Update($id, $data);
            redirect('/View');
        } else {
            $data = $this->UserModel->Find($id);
            $this->call->view('Update', $data);
        }
    }

    public function delete($id)
    {
        $this->UserModel->Delete($id);
        redirect('/View');
    }
}
?>