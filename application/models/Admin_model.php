<?php




class Admin_model extends CI_Model
{

    private $PAYMENT = 'payment';

    public function getAllPaymentData()
    {

        return $this->db->query("SELECT * FROM payment, users WHERE payment.email = users.email")->result_array();
    }

    public function Prosess_Data($states, $id)
    {

        if ($states == 'pending') {

            $update =   $this->db->set('role_payment', 7)->where('id_payment', $id)->update($this->PAYMENT);

            if ($update) {

                $this->session->set_flashdata('admin_message', ' <div class="alert alert-success" id="notification" role="alert">
             Data berhasil dipending !
            </div>');

                redirect('admin/payment');
            }
        }
    }

    
}
