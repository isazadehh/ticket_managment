<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statuses extends CI_Controller
{
    public function index()
    {
        $data = array();

        if($query = $this->statuses_model->get_all_status())
        {
            $data['all_statuses'] = $query;
        }

        $this->load->view('statuses_view', $data);
    }

    public function status_add(){
        if(isset($_POST['status_submit']))
        {
            $status_name = $_POST['status_name'];
            $status_code = $_POST['status_code'];
            $status_image = $_POST['status_image'];

            if(!empty($status_name) && !empty($status_code) || !empty($status_image)){
                $new_status_data = array(
                    'code' => $status_code,
                    'status_name' => $status_name
                );

                $this->statuses_model->add_status($new_status_data);
                redirect(base_url('Statuses'));
            }
        }else
        {
            redirect(base_url('Statuses'));
        }
    }

    public function status_delete($status_id)
    {
        if(isset($_POST['status_delete']))
        {

            $this->statuses_model->delete_status($status_id);
            redirect(base_url('Statuses'));

        }else
        {
            redirect(base_url('Statuses'));
        }

    }

    public function status_update($status_id)
    {
        if(isset($_POST['status_submit']))
        {
            $status_name = $_POST['status_name'];
            $status_code = $_POST['status_code'];
            $status_image = $_POST['status_image'];

            if(!empty($status_name) && !empty($status_code) || !empty($status_image)){
                $new_status_data = array(
                    'code' => $status_code,
                    'status_name' => $status_name
                );

                $this->statuses_model->update_status($status_id, $new_status_data);
                redirect(base_url('Statuses'));
            }
        }else
        {
            redirect(base_url('Statuses'));
        }
    }
}