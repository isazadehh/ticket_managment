<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shops extends CI_Controller
{
    public function index()
    {
        $data = array();

        if($query = $this->shops_model->get_all_shop())
        {
            $data['all_shops'] = $query;
        }

        $this->load->view('shops_view', $data);
    }

    public function shop_add(){
        if(isset($_POST['shop_submit']))
        {
            $shop_name = $_POST['shop_name'];
            $shop_code = $_POST['shop_code'];
            $shop_image = $_POST['shop_image'];

            if(!empty($shop_name) && !empty($shop_code) || !empty($shop_image)){
                $new_shop_data = array(
                    'code' => $shop_code,
                    'shop_name' => $shop_name
                );

                $this->shops_model->add_shop($new_shop_data);
                redirect(base_url('Shops'));
            }
        }else
        {
            redirect(base_url('Shops'));
        }
    }

    public function shop_delete($shop_id)
    {
        if(isset($_POST['shop_delete']))
        {

            $this->shops_model->delete_shop($shop_id);
            redirect(base_url('Shops'));

        }else
        {
            redirect(base_url('Shops'));
        }

    }

    public function shop_update($shop_id)
    {
        if(isset($_POST['shop_submit']))
        {
            $shop_name = $_POST['shop_name'];
            $shop_code = $_POST['shop_code'];
            $shop_image = $_POST['shop_image'];

            if(!empty($shop_name) && !empty($shop_code) || !empty($shop_image)){
                $new_shop_data = array(
                    'code' => $shop_code,
                    'shop_name' => $shop_name
                );

                $this->shops_model->update_shop($shop_id, $new_shop_data);
                redirect(base_url('Shops'));
            }
        }else
        {
            redirect(base_url('Shops'));
        }
    }
}