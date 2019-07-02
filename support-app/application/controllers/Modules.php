<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modules extends CI_Controller
{
    public function index()
    {
        $data = array();

        if($query = $this->modules_model->get_all_module())
        {
            $data['all_modules'] = $query;
        }

        $this->load->view('modules_view', $data);
    }

    public function module_add(){
        if(isset($_POST['module_submit']))
        {
            $module_name = $_POST['module_name'];
            $module_code = $_POST['module_code'];
            $module_image = $_POST['module_image'];

            if(!empty($module_name) && !empty($module_code) || !empty($module_image)){
                $new_module_data = array(
                    'code' => $module_code,
                    'module_name' => $module_name
                );

                $this->modules_model->add_module($new_module_data);
                redirect(base_url('Modules'));
            }
        }else
        {
            redirect(base_url('Modules'));
        }
    }

    public function module_delete($module_id)
    {
        if(isset($_POST['module_delete']))
        {

            $this->modules_model->delete_module($module_id);
            redirect(base_url('Modules'));

        }else
        {
            redirect(base_url('Modules'));
        }

    }

    public function module_update($module_id)
    {
        if(isset($_POST['module_submit']))
        {
            $module_name = $_POST['module_name'];
            $module_code = $_POST['module_code'];
            $module_image = $_POST['module_image'];

            if(!empty($module_name) && !empty($module_code) || !empty($module_image)){
                $new_module_data = array(
                    'code' => $module_code,
                    'module_name' => $module_name
                );

                $this->modules_model->update_module($module_id, $new_module_data);
                redirect(base_url('Modules'));
            }
        }else
        {
            redirect(base_url('Modules'));
        }
    }

}