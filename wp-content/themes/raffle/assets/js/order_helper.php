<?php 	

		
function update_order_total_admin($id){
            $ci =& get_instance();
            $ci->load->database();     
            $general_setting = $ci->option_m->option_array('gs_');

            // $sess_id = $ci->session->userdata('session_id');
            $query=$ci->db->query("SELECT *, SUM(total_amount) as total FROM dc0_orders WHERE id = '$id'");
            $result=$query->result_array();
            $grandTotal = $result[0]['total'];
            //print_r($result[0]['total']);
            //exit();
            $getCoupon = "";
            // $UpdateCouponPrice = "";

            $couponcode = $result[0]['coupon_code']; 
            if (!empty($couponcode)) {
                // print_r($couponcode);
                $getCoupon = $ci->coupon_m->get_by(['code' => $couponcode, 'status' => 1]);
            }

            $output = '<table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order </th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <tr>
                                            <td class="total-table-title ">Subtotal:</td>';
                                            $output .= '<td>';
                                            //$output .= $general_setting['gs_currency']." ".$grandTotal;
                                            if(isset($grandTotal)) $output .= $general_setting['gs_currency']." ".$grandTotal; else $output .= $general_setting['gs_currency']." 00.00";

                                            $output .= '</td>
                                        </tr>';
                                         
                                         if (!empty($result[0]['discount'])) {                                                          
                                            $output .= '<tr>
                                            <td class="total-table-title ">Discount:</td>';
                                            $output .= '<td>';
                                            $output .= $general_setting['gs_currency']." ".$result[0]['discount'];

                                            $output .= '</td></tr>'; }



                                 // print_r(coupon_code_cart_ammount());
                                       if(!empty($getCoupon)){ 
                                           
                                            $coupon_array = coupon_code_cart_ammount_admin($id);
                                            $UpdateCouponPrice = $coupon_array['newCartTotal'];
                                            $discount_amount = $coupon_array['discount_amount'];
                                            $output .= '<tr><td class="total-table-title">Coupon Discount:</td> <td>';
                                                         $output .= $general_setting['gs_currency']." ".$discount_amount;
                                                         $output .= '</td></tr>';
                                       }                                        
                                       $output .= '<tr>
                                            <td class="total-table-title">Delivery Charges:</td>
                                            <td>';

                                             $output .= $general_setting['gs_currency']." ".$general_setting['gs_delivery_charges'];

                                             $output .= '</td>
                                        </tr>
                                        <!-- <tr>
                                            <td class="total-table-title">TAX (0%):</td>
                                            <td>$0.00</td>
                                        </tr> -->
                                    </tbody>
                                    <tfoot>
                                        <tr class="fontWeightBold">
                                            <td>Total:</td>
                                            
                                            
                                            <td>';

                                            if(isset($grandTotal)) {


                                              if (isset($UpdateCouponPrice)) {

                                                  $output .= $general_setting['gs_currency']." ".($general_setting['gs_delivery_charges']+$UpdateCouponPrice);
                                               
                                              } else {
                                               
                                                  $output .= $general_setting['gs_currency']." ".($general_setting['gs_delivery_charges']+$grandTotal);


                                              }
                                            } else { $output .= $general_setting['gs_currency']." 00.00"; }

                                            $output .='</td>
                                        </tr>
                                    </tfoot>
                                </table>';

                                $output .= '<input type="hidden" id="shipping_charges" value="';                                            
                                $output .=  $general_setting['gs_delivery_charges'].'">';
                                $output .= '<input type="hidden" id="grandtotal" value="'; 
                                if (isset($grandTotal)) {

                                  if (isset($UpdateCouponPrice)) {

                                    $output .= ($general_setting['gs_delivery_charges']+$UpdateCouponPrice).'">';
                                      # code...
                                  } else {
                                    $output .= ($general_setting['gs_delivery_charges']+$grandTotal).'">';

                                  }
                                } else {
                                    $output .= "00 >";
                                }
                                echo $output;
            
     } 





if(! function_exists('get_order_item_sum')){
    function get_order_item_sum($OrderId)
    {
        $ci =& get_instance();
        $ci->load->database();
        $ci->db->where('order_id',$OrderId);
        $ci->db->select_sum('total_price ');
        $query = $ci->db->get('dc0_order_item');
        $result = $query->result_array();
        $order_total_sum = $result[0]['total_price'];
        return $order_total_sum;
    }
}




 
    
    