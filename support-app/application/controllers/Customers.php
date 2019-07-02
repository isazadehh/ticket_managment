<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller
{
    public function index()
    {

        $data = array();

        if($query = $this->customers_model->get_all_customers()){
            $data['all_customers'] = $query;
        }
        $data['all_countries'] = $this->db->get('countries')->result();
        $data['all_modules'] = $this->db->get('modules')->result();
        $data['all_modules_versions'] = $this->db->get('modules_versions')->result();
        $data['all_shops'] = $this->db->get('shops')->result();
        $data['all_shops_versions'] = $this->db->get('shops_versions')->result();
        $data['all_issues'] = $this->db->get('problems')->result();
        $data['all_statuses'] = $this->db->get('processes')->result();
        $data['all_order_statuses'] = $this->db->get('statuses')->result();
        $this->load->view('customers_view', $data);
    }

    public function get_one_ticket($ticket_id)
    {
        $data = $this->customers_model->get_one_ticket($ticket_id);
        echo json_encode($data);
    }

    public function get_one_ticket_issue($ticket_id)
    {
        $data = $this->customers_model->get_one_ticket_issue($ticket_id);
        echo json_encode($data);
    }

    public function get_last_added_ticket_issue($ticket_id)
    {
        $data = $this->customers_model->get_last_added_ticket_issue($ticket_id);
        echo json_encode($data);
    }

    public function add_sub_issue_to_ticket()
    {
        $ticket_id = $_POST['ticket_id'];
        $main_issue_id = $_POST['main_issue_id'];
        $ajax_problem = $_POST['ajax_problem'];
        $ajax_solution = $_POST['ajax_solution'];


            $new_ticket_data = array(
                'customer_id' => $ticket_id,
                'problem_id' => $main_issue_id,
                'problem' => $ajax_problem,
                'solution' => $ajax_solution
            );

        $this->db->insert('customer_problem', $new_ticket_data);
        echo $this->get_last_added_ticket_issue($ticket_id);

    }

    public function module_version($module_id)
    {
        $data = $this->db->where('module_id',$module_id)->get('modules_versions')->result();
        echo json_encode($data);
    }

    public function shop_version($shop_id)
    {
        $data = $this->db->where('shop_id',$shop_id)->get('shops_versions')->result();
        echo json_encode($data);
    }

    public function ticket_add(){
        if(isset($_POST['ticket_submit']))
        {
            $order_number = $_POST['order_number'];
            $order_status = $_POST['order_status'];
            $country = $_POST['country'];
            $module = $_POST['module'];
            $module_version = $_POST['module_version'];
            $source_shop = $_POST['source_shop'];
            $source_shop_version = $_POST['source_shop_version'];
            $target_shop = $_POST['target_shop'];
            $target_shop_version = $_POST['target_shop_version'];
            $issue = $_POST['issue'];
            $status = $_POST['status'];

            if(!empty($order_number) && !empty($order_status) && !empty($country) && !empty($module) && !empty($module_version) && !empty($source_shop) && !empty($source_shop_version) && !empty($target_shop) && !empty($target_shop_version) && !empty($issue) && !empty($status))
            {

                $new_ticket_data = array(
                    'order_id' => $order_number,
                    'module_id' => $module,
                    'module_versions_id' => $module_version,
                    'source_shop_id' => $source_shop,
                    'source_shop_version_id' => $source_shop_version,
                    'target_shop_id' => $target_shop,
                    'target_shop_version_id' => $target_shop_version,
                    'country_id' => $country,
                    'status_id' => $order_status,
                    'problem_id' => $issue,
                    'process_id' => $status
                );

                $this->customers_model->add_customer($new_ticket_data);
                redirect(base_url('Customers'));
            }
        }
        else
        {
            redirect('Customers');
        }
    }

    public function ticket_delete($ticket_id){
        if(isset($_POST['ticket_delete']))
        {

            $this->customers_model->delete_customer($ticket_id);
            redirect(base_url('Customers'));

        }else
        {
            redirect(base_url('Customers'));
        }
    }
}