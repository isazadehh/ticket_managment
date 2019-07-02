<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Countries extends CI_Controller
{
    public function index()
    {
        $data = array();

        if($query = $this->countries_model->get_all_country())
        {
            $data['all_countries'] = $query;
        }

        $this->load->view('countries_view', $data);
    }

    public function country_add(){
        if(isset($_POST['country_submit']))
        {
            $country_name = $_POST['country_name'];
            $country_code = $_POST['country_code'];
            $country_image = $_POST['country_image'];

            if(!empty($country_name) && !empty($country_code) || !empty($country_image)){
                $new_country_data = array(
                    'code' => $country_code,
                    'country_name' => $country_name
                );

                $this->countries_model->add_country($new_country_data);
                redirect(base_url('Countries'));
            }
        }else
        {
            redirect(base_url('Countries'));
        }
    }

    public function country_delete($country_id)
    {
        if(isset($_POST['country_delete']))
        {

            $this->countries_model->delete_country($country_id);
            redirect(base_url('Countries'));

        }else
        {
            redirect(base_url('Countries'));
        }

    }

    public function country_update($country_id)
    {
        if(isset($_POST['country_submit']))
        {
            $country_name = $_POST['country_name'];
            $country_code = $_POST['country_code'];
            $country_image = $_POST['country_image'];

            if(!empty($country_name) && !empty($country_code) || !empty($country_image)){
                $new_country_data = array(
                    'code' => $country_code,
                    'country_name' => $country_name
                );

                $this->countries_model->update_country($country_id, $new_country_data);
                redirect(base_url('Countries'));
            }
        }else
        {
            redirect(base_url('Countries'));
        }
    }
}