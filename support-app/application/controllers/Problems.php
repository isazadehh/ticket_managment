<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Problems extends CI_Controller
{
    public function index()
    {
        $data = array();

        if($query = $this->problems_model->get_all_problem())
        {
            $data['all_problems'] = $query;
        }
        $data['all_statuses'] = $this->db->get('processes')->result();
        $this->load->view('problems_view', $data);
    }

    public function problem_add(){
        if(isset($_POST['problem_submit']))
        {
            $problem_name = $_POST['problem_name'];
            $problem_trick = $_POST['problem_trick'];
            $problem_status = $_POST['problem_status'];

            if(!empty($problem_name) && !empty($problem_trick) && !empty($problem_status) || !empty($problem_image)){
                $new_problem_data = array(
                    'trick' => $problem_trick,
                    'problem_name' => $problem_name,
                    'process_id' => $problem_status
                );

                $this->problems_model->add_problem($new_problem_data);
                redirect(base_url('Problems'));
            }
        }else
        {
            redirect(base_url('Problems'));
        }
    }

    public function problem_delete($problem_id)
    {
        if(isset($_POST['problem_delete']))
        {

            $this->problems_model->delete_problem($problem_id);
            redirect(base_url('Problems'));

        }else
        {
            redirect(base_url('Problems'));
        }

    }

    public function problem_update($problem_id)
    {
        if(isset($_POST['problem_submit']))
        {
            $problem_name = $_POST['problem_name'];
            $problem_trick = $_POST['problem_trick'];

            if(!empty($problem_name) && !empty($problem_trick)){
                $new_problem_data = array(
                    'trick' => $problem_trick,
                    'problem_name' => $problem_name
                );

                $this->problems_model->update_problem($problem_id, $new_problem_data);
                redirect(base_url('Problems'));
            }
        }else
        {
            redirect(base_url('Problems'));
        }
    }
}