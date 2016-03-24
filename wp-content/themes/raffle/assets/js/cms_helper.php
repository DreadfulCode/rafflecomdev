<?php

function btn_status($url, $status)
{
    if($status == 1)
        echo anchor($url, 'Active', array('class' => 'btn btn-success btn-mini toggle-status'));
    elseif($status == 0)
        echo anchor($url, 'Deactive', array('class' => 'btn btn-danger btn-mini toggle-status'));
}

function user_btn_status($url, $status)
{
    if($status == 1)
        echo anchor($url, 'Active', array('class' => 'user btn btn-success btn-mini user-toggle-status'));
    elseif($status == 0)
        echo anchor($url, 'Deactive', array('class' => 'user btn btn-danger btn-mini user-toggle-status'));
}

function face_rev_btn_status($url, $status)
{
    if($status == 1)
        echo anchor($url, 'Active', array('class' => 'face btn btn-success btn-mini face-toggle-status'));
    elseif($status == 0)
        echo anchor($url, 'Deactive', array('class' => 'face btn btn-danger btn-mini face-toggle-status'));
}


function cat_front_view($url, $status)
{
    if($status == 1)
        echo anchor($url, 'Active', array('class' => 'btn btn-success btn-mini cat-front-toggle-status'));
    elseif($status == 0)
        echo anchor($url, 'Deactive', array('class' => 'btn btn-danger btn-mini cat-front-toggle-status'));
}



function faq_btn_status($url, $status)
{
    if($status == 1)
        echo anchor($url, 'Active', array('class' => 'btn btn-success btn-mini faqs-toggle-status'));
    elseif($status == 0)
        echo anchor($url, 'Deactive', array('class' => 'btn btn-danger btn-mini faqs-toggle-status'));
}


function merchant_btn_status($url, $status)
{
    if($status == 1)
        echo anchor($url, 'Active', array('class' => 'btn btn-success btn-mini merchant-toggle-status'));
    elseif($status == 0)
        echo anchor($url, 'Deactive', array('class' => 'btn btn-danger btn-mini merchant-toggle-status'));
}


function merchant_btn_front($url, $status)
{
    if($status == 1)
        echo anchor($url, 'Active', array('class' => 'btn btn-success btn-mini merchant-toggle-status'));
    elseif($status == 0)
        echo anchor($url, 'Deactive', array('class' => 'btn btn-danger btn-mini merchant-toggle-status'));
}


function order_btn_status($url, $status)
{
    if($status == 1)
        echo anchor($url, 'Delivered', array('class' => 'order btn btn-primary btn-mini order-toggle-status'));
   elseif($status == 0)
        echo anchor($url, 'Pending', array('class' => 'order btn btn-success btn-mini order-toggle-status'));
}

function page_permission_create($url, $status)
{
    if($status == 1)
        echo anchor($url, 'Active', array('class' => 'permission btn btn-success btn-mini toggle-status-create'));
   elseif($status == 0)
        echo anchor($url, 'Deactive', array('class' => 'permission btn btn-danger btn-mini toggle-status-create'));
}

function page_permission_view($url, $status)
{
    if($status == 1)
        echo anchor($url, 'Active', array('class' => 'permission btn btn-success btn-mini toggle-status-view'));
   elseif($status == 0)
        echo anchor($url, 'Deactive', array('class' => 'permission btn btn-danger btn-mini toggle-status-view'));
}


function page_permission_edit($url, $status)
{
    if($status == 1)
        echo anchor($url, 'Active', array('class' => 'permission btn btn-success btn-mini toggle-status-edit'));
   elseif($status == 0)
        echo anchor($url, 'Deactive', array('class' => 'permission btn btn-danger btn-mini toggle-status-edit'));
}


function page_permission_delete($url, $status)
{
    if($status == 1)
        echo anchor($url, 'Active', array('class' => 'permission btn btn-success btn-mini toggle-status-delete'));
   elseif($status == 0)
        echo anchor($url, 'Deactive', array('class' => 'permission btn btn-danger btn-mini toggle-status-delete'));
}

function page_permission_status($url, $status)
{
    if($status == 1)
        echo anchor($url, 'Active', array('class' => 'permission btn btn-success btn-mini toggle-status-status'));
   elseif($status == 0)
        echo anchor($url, 'Deactive', array('class' => 'permission btn btn-danger btn-mini toggle-status-status'));
}

function contact_btn_status($url, $status)
{
    if($status == 1)
        echo anchor($url, 'Read', array('class' => 'contact btn btn-primary btn-mini contact-toggle-status'));
   elseif($status == 0)
        echo anchor($url, 'Unread', array('class' => 'contact btn btn-success btn-mini contact-toggle-status'));
}


function review_btn_status($url, $status)
{
    if($status == 1)
        echo anchor($url, 'Checked', array('class' => 'review btn btn-primary btn-mini review-toggle-status'));
   elseif($status == 0)
        echo anchor($url, 'Unchecked', array('class' => 'review btn btn-success btn-mini review-toggle-status'));
}

function subscribe_btn_status($url, $status)
{
    if($status == 1)
        echo anchor($url, 'Active', array('class' => 'btn btn-success btn-mini subscribe-toggle-status'));
   elseif($status == 0)
        echo anchor($url, 'Deactive', array('class' => 'btn btn-danger btn-mini subscribe-toggle-status'));
}

function btn_show($url)
{
    echo anchor($url, '<i class="fa fa-eye"></i>', array('class' => 'btn btn-primary btn-mini'));
}

function btn_edit($url)
{
    echo anchor($url, '<i class="fa fa-edit"></i>', array('class' => 'btn btn-success btn-mini'));
}

function btn_delete($url)
{
    echo anchor($url, '<i class="fa fa-trash-o"></i>', array('class' => 'btn btn-danger btn-mini delete-item'));
}

function contact_btn_delete($url)
{
    echo anchor($url, '<i class="fa fa-trash-o"></i>', array('class' => 'btn btn-danger btn-mini delete-item' , 'id'   => 'contact_delete'));
}

function deal_behave($behave_int)
{
    if($behave_int == 0)
    {
        echo "Onfire";
    }
    else if($behave_int == 1)
    {
        echo "Latest";
    }
    else if($behave_int == 2)
    {
        echo "Feature";
    }
}


function deal_behave_array()
{
    $deal_behave = array('Onfire','Latest','Feature');
    
    $behave = array();
    foreach ($deal_behave as $key => $val) {
        $behave[$key] = $val;
    }

    return $behave;
}

function getting_complaint_status($id,$status)
{
    $output = '<select class="form-control" id="status" onchange="'.'change_complain('.$id.',this)'.'">';

    if($status == 0)
    {
        $output .= '
                <option selected="selected" value="0">Pending</option>
                <option value="1">Processing</option>
                <option value="2">Solved</option>';
    }
    else if($status == 1)
    {
                $output .= '
                <option value="0">Pending</option>
                <option selected="selected" value="1">Processing</option>
                <option value="2">Solved</option>';
    }
    else if($status == 2)
    {
        $output .= '
                <option value="0">Pending</option>
                <option value="1">Processing</option>
                <option selected="selected" value="2">Solved</option>';
                
    }

    $output .= '</select>';
    //$output .= $status;

    return $output;
}
/*
this function is not being used 
function geting_order_status($id,$status)
{
    
    $output = '<select class="form-control input-sm" id="status" onchange="'.'change_order('.$id.',this)'.'">';
    $statusarray=array( 'On Hold', 'Pending', 'Confirmed', 'Shipped', 'TCS-shipped','Delivered', 'Not Answering', 'Reviewed', 'Cancelled', 'Returned');
    foreach($statusarray as $key=>$val){
       if($status=="$key") $selected="selected='selected'"; else $selected='';
        $output.='<option '.$selected.' value="'.$key.'">'.$val.'</option>';        
    }
    $output .= '</select>';
    return $output;
}

*/


if ( ! function_exists('get_specific_field'))
{
    function get_specific_field($table='', $field='', $id='')
    {
        $ci =& get_instance();
        $ci->load->database();
        $output='';
        if(!empty($table) && !empty($field) && !empty($id) && is_numeric($id)){
            $query=$ci->db->query("SELECT $field FROM $table WHERE id=$id ORDER BY id DESC LIMIT 1 ");
            $result=$query->result_array();
            if($result){ $output=$result[0][$field]; }       
        }
        return $output;   
    }   
}

if ( ! function_exists('get_real_sold'))
{
    function get_real_sold($id='1')
    {
        $ci =& get_instance();
        $ci->load->database();
        $output='0';
        if(!empty($id)){
            $query=$ci->db->query("select sold from sold_stock WHERE deal_id=$id");
            $result=$query->row();
            if($result){ $output=$result->sold; }       
        }
        return $output;   
    }   
}



if ( ! function_exists('geting_order_status'))
{
    function geting_order_status($select=0, $id=0, $order_status)
    {
        //$ci =& get_instance();
       // $ci->load->database();
        $output='<div class="form-group ">';
        
        //$output.='<select class="form-control"  onchange="change_order('.$id.',this)" id="status" name="status" >';
                $output.='<select class="form-control" onChange="change_order('.$id.');"   id="status'.$id.'" name="status">';

        //$query=$ci->db->query("SELECT * FROM dc0_order_status ORDER BY order_seq");
        
        //$result=$query->result_array();
        $result=$order_status;
      //  print_r($result);
        if($result){
            foreach($result as $row){
                if($row->id==$select) $selected="selected='selected'"; else $selected=""; 
                $output.='<option '.$selected.' value='.$row->id.'>'.$row->title.'</option>';
            }
        }
        $output.='</select></div>';
        echo $output;
    }   
}


if ( ! function_exists('get_bulk_status'))
{
    function get_bulk_status($status)
    {
        //$ci =& get_instance();
       // $ci->load->database();
        $output='<div class="form-group col-md-3">';
        
        //$output.='<select class="form-control"  onchange="change_order('.$id.',this)" id="status" name="status" >';
                $output.='<select class="form-control" onchange="bulk_status()" id="bulkstatus" name="bulkstatus" >';
 $output.='<option value="0" selected="selected">--Bulk Status update--</option>';   

        //$query=$ci->db->query("SELECT * FROM dc0_order_status ORDER BY order_seq");
        
        //$result=$query->result_array();
        $result=$status;
      //  print_r($result);
        if($result){
            foreach($result as $row){
                $output.='<option value='.$row->id.'>'.$row->title.'</option>';
            }
        }
        $output.='</select></div>';
        echo $output;
    }   
}

if ( ! function_exists('get_bulk_shipper'))
{
    function get_bulk_shipper($shippers)
    {
         $output='<div class="form-group col-md-3">';
        $output.='<select class="form-control" name="bulkshipper">';
        
              $output.='<option value="0" selected="selected">--Bulk Shipper update--</option>';   

         $result=$shippers;
     
        if($result){
            foreach($result as $row){
                $output.='<option value='.$row->id.'>'.$row->title.'</option>';
            }
        }
        $output.='</select></div>';
        echo $output;
    }   
}



function status_title($status)
{
    $ci =& get_instance();
    $ci->load->database();
    $query=$ci->db->query("SELECT title FROM dc0_order_status where id=".$status);
    $result = $query->row();
    
    return $result->title;
}

if ( ! function_exists('get_shipper'))
{
    function get_shipper($select=0, $id=0, $ship)
    {
        $output='<div class="form-group">';
        $output.='<select class="form-control" onChange="change_shipper('.$id.');"   id="shipper'.$id.'" name="shipper">';
        
        if ($select==0){
        $output.='<option value="0" selected="selected">--NOT SELECTED--</option>';
        }
        else
        {
        $output.='<option value="0" >--NOT SELECTED--</option>';
            
        }
        
        $result=$ship;
      //  print_r($result);
            if($result){
            foreach($result as $row){
                if($row->id==$select) $selected="selected='selected'"; else $selected=""; 
                $output.='<option '.$selected.' value='.$row->id.'>'.$row->title.'</option>';
            }
        }
        $output.='</select></div>';
        echo $output;
    }   
}












if ( ! function_exists('get_attributes'))
{
    function get_attributes($id=0)
    {

        $ci =& get_instance();
        $ci->load->database();
        $query=$ci->db->query("select distinct attribute_id ,b.attribute_key from dc0_deal_attribute a , dc0_attribute b where a.deal_id =".$id." and a.attribute_id = b.id");
        $result=$query->result_array();
      // print_r($result);
       
 if($result){
       $attrib_count = 0;
        foreach ($result as $row)
         {
            
            $output='<div class="form-group">';   
            $output.='<label >'.$row['attribute_key'].'</label>';
            $output.='<select class="form-control"  id="attributes'.$attrib_count.'" name="attributes['.$row['attribute_key'].'][]">';
            $attrib_count += 1 ;
    //  print_r($row);
             $a_query=$ci->db->query("select * from dc0_deal_attribute where attribute_id = ".$row['attribute_id']." and deal_id =".$id." and attribute_status = 1 " );
            $a_result = $a_query->result_array();
            if($a_result)   
                foreach($a_result as $row)
                {
                   // print_r($row);
                   // exit();
                     $output.='<option value='.$row['id'].'>'.$row['attribute_value'].'</option>';

                }

        $output.='</select></div>';
          echo $output;
          
         }
        //$output='<div class="form-group">';
        
        //$output.='<select class="form-control"  onchange="change_order('.$id.',this)" id="status" name="status" >';
          //      $output.='<select class="form-control" onChange="change_order('.$id.');"   id="status'.$id.'" name="status">';

       
        
        //$result=$query->result_array();
      
      //  print_r($result);
        echo $attrib_count;
        $data['attrib_count']=$attrib_count;

    }   

}}

if ( ! function_exists('get_order_type'))
{
    function get_order_type($select=0, $id=0, $order_type)
    {
        //$ci =& get_instance();
       // $ci->load->database();
        $output='<div class="form-group">';
        
        $output.='<select class="form-control"  id="order_type'.$id.'" onchange="change_type('.$id.');" name="order_type" >';
        //$query=$ci->db->query("SELECT * FROM dc0_order_status ORDER BY order_seq");
        
        //$result=$query->result_array();
        $result=$order_type;
      //  print_r($result);
        if($result){
            foreach($result as $row){
                if($row->id==$select) $selected="selected='selected'"; else $selected=""; 
                $output.='<option '.$selected.' value='.$row->id.'>'.$row->title.'</option>';
            }
        }
        $output.='</select></div>';
        echo $output;
    }   
}


//start function explode attributes 
// received the attributes json and converts it into a string of attributes with labels 
if ( ! function_exists('explode_attributes'))
{
    function explode_attributes($json=0)
    {
$output = '';
                    $deal_option = json_decode($json);
                    
 
                    if(isset($deal_option->lbl1))
                    {
                        $output .= '('.trim(get_specific_field('dc0_attribute','attribute_key',$deal_option->lbl1)).' :'.trim($deal_option->atr1).')';
                    }

                    if(isset($deal_option->lbl2))
                    {
                        $output .= ' ( '.get_specific_field('dc0_attribute','attribute_key',$deal_option->lbl2).' :'.$deal_option->atr2.') ';
                    }

                    if(isset($deal_option->lbl3))
                    {
                        $output .= ' ( '.get_specific_field('dc0_attribute','attribute_key',$deal_option->lbl3).' :'.$deal_option->atr3.') ';
                    }

                    if(isset($deal_option->lbl4))
                    {
                        $output .= ' ('.get_specific_field('dc0_attribute','attribute_key',$deal_option->lbl4).' :'.$deal_option->atr4.') ';
                    }
                


                    if(isset($deal_option->lbl5))
                    {
                        $output .= ' ('.get_specific_field('dc0_attribute','attribute_key',$deal_option->lbl5).' :'.$deal_option->atr5.')  / ';
                    }
                                       
                         
                 
                
         
                    
                  
                  
                return $output;
                }
                  
}

     //end of explode attributes       










if ( ! function_exists('status_color'))
{
    function status_color($select=0)
    {
        $ci =& get_instance();
        $ci->load->database();
        $query=$ci->db->query("select colorcode from dc0_order_status where id = ".$select);
        $result=$query->row();
        return $result->colorcode;
    }
}


if ( ! function_exists('get_status_history'))
{
    function get_status_history($id=0)
    {
        $ci =& get_instance();
        $ci->load->database();
        
        //ch.changed_at, ch.change_by,u.username,ch.new_status,s.title
        $query=$ci->db->query("SELECT ch.changed_at, ch.change_by,u.username,ch.new_status,s.title  FROM `dc0_status_change` ch, users u , dc0_order_status s where order_id = $id  and ch.change_by = u.id and s.id = ch.new_status order by changed_at DESC");
               $result=$query->result();
        return $result;
    }
}




function get_order_status_button($status)


{
   $output = '';

  if($status == 1)
    {
       $output .= '<a target="_blank" href="javascript:;" class="btn btn-danger btn-xs">On Hold</a>';
    }
    else if($status == 2)
    {
       $output .= '<a target="_blank" href="javascript:;" class="btn btn-danger btn-xs">Pending</a>';
       
    }
    else if($status == 3)
    {
       $output .= '<a target="_blank" href="javascript:;" class="btn btn-success btn-xs">Confirmed</a>';
        
    }
    else if($status == 4)
    {
       $output .= '<a target="_blank" href="javascript:;" class="btn btn-primary btn-xs">Shipped</a>';
       
    }
    else if($status == 5)
    {
       $output .= '<a target="_blank" href="javascript:;" class="btn btn-primary btn-xs">Delivered</a>';
        
    }
    else if($status == 6)
    {
       $output .= '<a target="_blank" href="javascript:;" class="btn btn-danger btn-xs">Not Answering</a>';
       
    }
    else if($status == 7)
    {
       $output .= '<a target="_blank" href="javascript:;" class="btn btn-danger btn-xs">Reviewed</a>';
    }
    else if($status == 8)
    {
       $output .= '<a target="_blank" href="javascript:;" class="btn btn-danger btn-xs">Cancelled</a>';
    }
    else if($status == 9)
    {
       $output .= '<a target="_blank" href="javascript:;" class="btn btn-danger btn-xs">Returned</a>';
    }
    //$output .= $status;

    return $output;
}

    function user_checkout_form()
    {
        $ci =& get_instance();
        $ci->load->database();
        if ($ci->ion_auth->logged_in()) {
       
         $getUser = $ci->user_m->get($ci->session->userdata('user_id'), TRUE);

         $sess_id = $ci->session->userdata('session_id');
       
         $query=$ci->db->query("SELECT * FROM dc0_carts WHERE session_id = '$sess_id'");
         $result = $query->result_array();
        // print_r($result);
         $couponcode = $result[0]['coupon_code'];
         $payment = $ci->payment_m->get_by(['status' => 1]);
        // print_r($getUser);


        $checkout_output = '
            <div class="row" id="userCheckoutDiv" style="">
              
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading panel-border">
                                  <h4 class="panel-head-custom">CheckOut Form </h4>

                                <form name="checkoutUserForm" method="POST" role="form">

                                        <div class="clearfix">&nbsp;</div>
                                    
                                    <div class="row">';

                                    $address_order=$getUser->address;
                                    $coupon_type = '';

                                    if (isset($couponcode)) {
                                        $getCoupon = $ci->coupon_m->get_by(['code' => $couponcode, 'status' => 1]);
                                        if (!empty($getCoupon)) {
                                                   if ($getCoupon[0]->type == 'special') {
                                                        $address_order=$getCoupon[0]->address;
                                                        $coupon_type=$getCoupon[0]->type;
                                                    }
                                        }
                                 
                                    }


                                    if ($coupon_type == 'special') {

                                          $checkout_output .= '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group checkout-user-group">
                                               <label for="" class="label-custom">Coupon Address:</label>
                                                <textarea name="customer_ship_address" class="form-control" id="customer_ship_address" disabled rows="1" placeholder="Address">'.$address_order.'</textarea>
                                            </div>
                                           </div>';
                                          $checkout_output .=  '<input type="hidden" name="customer_ship_address" value="'.$address_order.'">';

                                    } else {

                                         $checkout_output .= '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group checkout-user-group">
                                               <label for="" class="label-custom">Address:</label>
                                                <textarea name="customer_ship_address" class="form-control" id="customer_ship_address" rows="1" placeholder="Address">'.$address_order.'</textarea>
                                            </div>
                                           </div>';

                                    }


                                 

                                    $checkout_output .= '</div>
                                    <div class="clearfix">&nbsp;</div>
                                    
                                    <div class="row"> 

                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="form-group checkout-user-group">
                                           <label for="" class="label-custom">Name:</label>
                                           <input type="phone" name="customer_name" class="form-control" id="customer_name" placeholder="Customer Name" value="'.ucfirst($getUser->slug).'">
                                        </div>
                                    </div>
                                                  
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="form-group checkout-user-group">
                                           <label for="" class="label-custom">Contact Number:</label>
                                           <input type="phone" name="customer_contact" class="form-control" id="customer_contact" data-mask="(___) ___-____" placeholder="Contact Number" value="'.$getUser->phone.'">
                                        </div>
                                        <script>
                                        jQuery(function($){
  
                                        $("#customer_contact").mask("(0999) 999-9999");
  
                                        }); </script>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="form-group checkout-user-group">
                                           <label for="" class="label-custom">City:</label>
                                           <select name="customer_city_id" id="CheckOut Form" class="form-control" required>
                                               <option value="0">--Select City --</option>';

                                               //$allcities = $ci->city_m->get();
                                               $ci->db->order_by('city', 'ASC');
                                                $allcities = $ci->city_m->get_by(array('country_id' => '72'));
                                                foreach($allcities as $city) {
                                                    if ($city->id == $getUser->city_id) {
                                                        $selected="selected='selected'";
                                                    }else{
                                                        $selected="";
                                                    }
                                                  $checkout_output .= '<option '.$selected.' value="'.$city->id.'">'.$city->city.'</option>';
                                                }
                                             


                                               $checkout_output .= '</select></div>
                                    </div>
                             



                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group checkout-user-group">
                                           <label for="" class="label-custom">Other Instructions:</label>
                                           <Textarea name="remarks" class="form-control" row="2" id="remarks" placeholder="Other Instructions" value=""></textarea>
                                        </div>
                                </div>  
                                   </div>

';



                                $checkout_output  .= '<div class="clearfix">&nbsp;</div><h4 class="panel-head-custom">Selct Payment Method</h4><div class="row">';
                                foreach($payment as $pay) { 
                                   $checkout_output .=  '

                                          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                           
        
                                                 <div class="radio">
                                                   <label>
                                                     <input type="radio" name="payment_id" value="'.$pay->id.'" class="payment_section" onClick="showdetails('.$pay->id.')"  >'.str_replace("_", " ", $pay->key).'
                                                   </label>
                                                 </div>

                                                <div class="payment_detail" id="'.$pay->id.'">
                                                    <h4 class="panel-title">'.$pay->title.'</h4>

                                                    <p>'.$pay->description.'</p>
                                                </div></div>'; 
                                  }

                                    

                                $checkout_output .= '</div><div class="row">             
                                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 pull-right">
                                        <div class="form-group checkout-user-group">
                                            <label for="">&nbsp;</label>
                                            <button type="button" onClick="userCheckout()" class="btn btn-primary btn-block btn-radius-0">CheckOut</button>
                                        </div>            
                                            
                                       </div>
                                       </div>
                                   </form>
                                                      
                              </div>
                                                  
                        </div>  
                    </div>
            </div>';

            return $checkout_output;
        } else {
            echo "Please Login";
        }

    }

      function get_rating_by_deal_id($deal_id){
            $ci =& get_instance();
            $ci->load->database();     
            $output=0;
            $strSQL="SELECT AVG(star) as rating from dc0_deal_rating WHERE deal_id=".$deal_id;
            $query=$ci->db->query($strSQL);
            $result= $query->result_array();
           
            if($query->num_rows()>0) $output=$result[0]['rating'];
            return ceil($output);
        
      }


  
    function theme_options($key_prefix)
    {
        $ci =& get_instance();
        $ci->load->database(); 
        $options = array();
        $ci->db->like('option_key', $key_prefix, 'after');
        $query = $ci->db->get('dc0_option');
        $result= $query->result();
        foreach ($result as $key => $value) {
            $options[$value->option_key] = $value->option_value;
        }

        return $options;
    }
      function call_merchants()
    {
        $ci =& get_instance();
        $ci->load->database(); 
        $ci->db->select('id, username, company, city_id, phone');
        $ci->db->where('group_id', 2);
        $ci->db->where('active', 1);
        $get = $ci->db->get('users');
        $result = $get->result();
        return $result;
    }
   
       function call_merchants_front()
    {
        $ci =& get_instance();
        $ci->load->database(); 
        $ci->db->select('id, username, company, city_id, phone');
        $ci->db->where('group_id', 2);
        $ci->db->where('active', 1);
                $ci->db->where('on_front', 1);
                $ci->db->order_by('id', 'RANDOM');

        $get = $ci->db->get('users');
        $result = $get->result();
        return $result;
    }
    function get_merchants($cat)
    {
        $ci =& get_instance();
        $ci->load->database(); 
       // $ci->db->select('id, username, company, city_id, phone');
       // $ci->db->where('group_id', 2);
       // $ci->db->where('active', 1);
       // $get = $ci->db->get('users');
       // $result = $get->result();
       
        
        if ($cat == "")
                {
                $cat_id ="";
                }       
          else
                {
            $cat_id = "where category_id = '".$cat."'";
                }
          
          $sql = "select * from users where id in(select distinct merchant_id  from active_deals 
                  where id in (select  deal_id from dc0_deal_category ".$cat_id.")) and on_front=1";
            $query=$ci->db->query($sql);
            $result=$query->result_array();
          // if($result){
         //  foreach ($result as $results):
           
            //echo $results['id'];
           // echo $results['company'];
            
           
        //  endforeach;
          
         // }
          
         return $result;
}        
 
 
 
       function get_user_rights($identity)
       {
          // print_r($query);
        $ci =& get_instance();
        $ci->load->database(); 
     
        //$output=array();
        $query=$ci->db->query("SELECT * FROM users_privileges AS up WHERE up.users in(select id from users where email='".$identity."') AND up.deleted=0 AND up.active=1 ");
       //print_r($query); 
       //exit();
        $result = $query->result_array();
        return $result;           
    } 
 
     function get_filterdeals($category=0, $fromprice=0, $toprice=100000, $merchant=0)
    {
        $ci =& get_instance();
        $ci->load->database(); 
        //$cat=0,$mer=0,$from=0,$to=0
       // $sql = "select * from active_deals where  category_id ='".$cat." and merchant_id='".$mer."' and  discounted_price between ".$from."  and ".$to." order by start_date";
      
       
       if($category) $catCon="  id in(select deal_id from dc0_deal_category where category_id = ".$category.")  and "; else  $catCon=" ";
       if($merchant) $merCon="  merchant_id=".$merchant." and "; else  $merCon="";
       
       
       
       $sql="select * from active_deals where ".$catCon.$merCon."  discounted_price >=".$fromprice." AND discounted_price<=".$toprice." order by id DESC ";
       // print_r($sql);
            $query=$ci->db->query($sql);
            //$result=$query->result_array();
            $result=$query->result();
       
          //print_r($result);
          /*if (isset($mer == ""))
                {
                $mer_id = "merchant_id like '%'";             
                }       
          else
                {
                $mer_id =" merchant_id = '".$mer."'";
                }
          
         if (isset($from)){
            }  
          $sql = "select * from active_deals where merchant_id like '".$mer"' and ";
            $query=$ci->db->query($sql);
            $result=$query->result_array();
          // if($result){
         //  foreach ($result as $results):
           
            //echo $results['id'];
           // echo $results['company'];
           //  endforeach;
          // }  */    
    
       return $result;
       
                
 }        
        
        
        
        /*
        
        function geting_order_status($select=0, $id=0)
    {
        $ci =& get_instance();
        $ci->load->database();
        $output='<div class="form-group">';
     //   $output.='<label for="credit_terms"></label>';
        
        $output.='<select class="form-control" onChange="change_order('.$id.');"   id="status'.$id.'" name="status">';
        $query=$ci->db->query("SELECT *  FROM dc0_order_status order by order_seq ");
        $result=$query->result_array();
        if($result){
            foreach($result as $row){
                if($row['id']==$select) $selected="selected='selected'"; else $selected=""; 
                $output.='<option '.$selected.' value='.$row['id'].'>'.$row['title'].'</option>';
            }
        }
        $output.='</select></div>';
        echo $output;
    }   
        
        
        */
        
        
        
        
        
    
   
    function merchant_logo()
    {      
        $ci =& get_instance();
        $ci->load->database(); 
        $get_merchant_logo = $ci->merchant_detail_m->get_merchant_logo();
        return $get_merchant_logo;

    }
    
  
    
    function site_name()
    {
        $options = theme_options('gs_');
        return $options['gs_site_name'];
    }
    function site_logo()
    {
        # code...
        $options = theme_options('gs_');
        return '/uploads/site_images/'.$options['gs_site_logo'];
    }
    function front_page()
    {
        $options = theme_options('gs_');
        $frontpage = $options['gs_frontpage'];
        if ($frontpage==1) {
           return $page = 'home/page';
            
        } else {
           return  $page = 'home/index';
        }
    }
    function front_template()
    {
        $options = theme_options('gs_');
        $frontpage = $options['gs_frontpage'];
        if ($frontpage==1) {
           return $page = '/layout/template_front';
            
        } else {
           return  $page = '/layout/template_home';
        }
    }

    function delete_group($id)
    {
          $ci =& get_instance();
          $ci->load->database();
          $check = $ci->ion_auth_model->check_deletable_group($id);
          if ($check) 
          {
            echo $check;
          }

    } 
    function city_array()
    {
        $ci =& get_instance();
        $ci->load->database();

        $cities = array();
        $query = $ci->db->get('dc0_city');
        $result= $query->result();
        foreach ($result as $key => $city) {
            $cities[$city->id] = $city->city;
        }

        return $cities;
    }


    function Get_qr_Code($deal_id)
    {
        $ci =& get_instance();
        $ci->load->database();

        $ci->db->where('id',$deal_id);
        $query = $ci->db->get('dc0_deal');
        $result = $query->result();

        $data = $result;

        foreach ($data as $key) {
            $qr_code = $key->qr_code;
        }

        return $qr_code;
    }


    
    
    
if ( ! function_exists('get_merchant_front'))
{
    function get_merchant_front($merchant=0)
    {

        $ci =& get_instance();
        $ci->load->database();
        $query=$ci->db->query("SELECT *  FROM users where  id = $merchant");
        $result=$query->row();
        
        if ($result->on_front ==1 )
        {return $result->avatar;}
        else 
        {
        //return ("gs_site_logo.png");
        return ("zgs_site_logo.png");
        }
 }
}

if ( ! function_exists('get_order_status_combo'))
{
    function get_order_status_combo($selected=0)
    {
        $output=0;
        $ci =& get_instance();
        $ci->load->database();
        $query=$ci->db->query("SELECT * FROM dc0_orders");
        $result=$query->result_array();
        if($result){
            $output='<select class="form-control" onchange="change_order_status();" id="order_status" name="order_status" ><option value="0">--Select Status --</option>';
            //print_r($result);
            foreach($result as $row){
                if($row['id'] == $selected) $select="selected='selected'"; else $select="";
                $output.='<option '.$select.' value="'.$row['id'].'">'.$row['order_status'].'</option>';
            }
            
            $output.='</select>';
            
        }
        echo $output;
    }   
}    

    
if ( ! function_exists('get_notification'))
{
    function get_notification()
    {
        //$output=0;

        $ci =& get_instance();
        $ci->load->database();
        $sql ="SELECT * FROM dc0_option WHERE option_key = 'gs_notification'";
        $query = $ci->db->query($sql);
        $result = $query->result_array();
        $val = $result[0]['option_value'];

        $sql ="SELECT * FROM dc0_deal WHERE DATE_SUB(expiration_date, INTERVAL $val DAY) <= CURDATE()";
        $query = $ci->db->query($sql);
        $result = $query->result();
        $exp_deals= count($result);
        $output="";
        if($exp_deals > 0) :

 /*       $output= '<div class="notification-messages info">
                
                <div class="user-profile">
                <!--  <img src="/assets/admin/img/profiles/d.jpg" alt="" data-src="/assets/admin/img/profiles/d.jpg" data-src-retina="/assets/admin/img/profiles/d2x.jpg" width="35" height="35">  -->
                </div>

                

               <div class="message-wrapper">
               <a href="/admin/dashboard/deal_notification" > 
               <h4>Deal Expired </h4>
                  <!-- <div class="heading">Deal Expired </div>
                  <div class="description">Description...</div>
                  <div class="date pull-left">A min ago</div>  -->         
                </a>
                </div>
                

                <div class="clearfix"></div>
                               
              </div>';*/
              
              $output= '<hr><li><a href="/admin/dashboard/deal_notification" >See More</a></li>';
        endif;

      return $output;
    }   
}    


if ( ! function_exists('get_notification_count'))
{
    function get_notification_count()
    {
        $ci =& get_instance();
        $ci->load->database();
        $sql ="SELECT * FROM dc0_option WHERE option_key = 'gs_notification'";
        $query = $ci->db->query($sql);
        $result = $query->result_array();
        $val = $result[0]['option_value'];

        $sql ="SELECT * FROM dc0_deal WHERE DATE_SUB(expiration_date, INTERVAL $val DAY) <= CURDATE()";
        $query = $ci->db->query($sql);
        $result = $query->result();
        $exp_deals = count($result);
        $output="";
        if($exp_deals > 0) :
                $output = 1;
        else :
            $output = 0;
        endif;

      return $output;
    }   
}    





if ( ! function_exists('get_login_form'))
{
    function get_login_form()
    {


         $output='<ul class="nav nav-1 menu-list text-uppercase text-center navbar-nav navbar-right" id="login_user_navbar">
                      <li class="hidden-xs">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="loginButton">
                               <i class="fa fa-user glyphicon-default"></i> <strong class="title-default">Login</strong> <span class="glyphicon glyphicon-chevron-down glyphicon-default"></span>
                            </a>
                              <ul class="dropdown-menu dropdown-login">
                                <li> 
                                    <div class="login-box col-xs-12 text-capitalize borderRadius5 box-shadow" id="loginDropdown" role="menu">
                                        
                                        <div class="login_resposnse"> </div>

                                        <form  id="loginform" name="loginForm" class="form-horizontal" method="post" role="form">
                                                
                                           <div style="" class="input-group login-field">
                                                 <span class="input-group-addon input-icon"><i class="glyphicon glyphicon-user "></i></span>
                                                 <input type="text" name="identity" value="" id="identity" class="form-control" placeholder="Email">                                   
                                           </div>
                                            
                                          <div style="" class="input-group login-field">
                                                 <span class="input-group-addon input-icon"><i class="glyphicon glyphicon-eye-open "></i></span>             
                                                 <input type="password" name="password" value="" id="password" class="form-control" placeholder="Password">
                                          </div>   

                                          <div class="checkbox">
                                            <label>
                                              <input type="checkbox">remember me
                                            </label>
                                          </div>
                                          
                                          <button type="button" id="loginbtn" class="login-btn btn" ><i class="fa fa-sign-in"></i>Submit</button>
                                          <p>you have an account <a href="javascript:;"  data-toggle="modal" data-target="#forget_Modal">forgot password</a></p>
                                           <button type="button" id="fbloginbtn" class="btn btn-block btn-social btn-facebook loginBtnNew marginBottom15"><span class="pull-left fb-icon"><i class="fa fa-facebook"></i></span><p>sign in with facebook</p></a>
                                          <button type="button" class="sign-up-btn btn" data-toggle="modal" href="#signUpModal" ><i class="fa fa-power-off"></i>sign up</button>   
                                
                                        </form>     
                                        
                                    </div>

                                  </li>

                              </ul>



                       </li>
                    </ul>';
// /hauth/social/Facebook
          return $output;
    }   
}    


    
if ( ! function_exists('get_login_dropdown'))
{
    function get_login_dropdown()
    {
        //$output=0;

        $ci =& get_instance();
        $ci->load->database();     
        if ($ci->ion_auth->logged_in()) : 
        $output= '<ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img class="borderRadius5" width="20px" height="20px" src="'.$ci->session->userdata('avatar').'" alt="'.$ci->session->userdata('slug').'">                                        
                        <strong class="title-default">'.$ci->session->userdata('username').'</strong>
                        <span class="glyphicon glyphicon-chevron-down glyphicon-default"></span>
                    </a>
                    <ul class="dropdown-menu user-box borderRadius5 box-shadow">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img class="img-responsive borderRadius5" src="'.$ci->session->userdata('avatar').'" alt="'.$ci->session->userdata('slug').'">                                        
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong>'.$ci->session->userdata('username').'</strong></p>
                                        <p class="text-left small">'.$ci->session->userdata('email').'</p>
                                        <p class="text-left">
                                            <a href="/account/'.$ci->session->userdata('slug').'" class="btn btn-default btn-sm"><i class="fa fa-user-secret"></i> My Account</a> 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-6"><a href="/account/'.$ci->session->userdata('slug').'?tab=Wishlist" class="btn btn-primary btn-sm"><i class="fa fa-heart-o"></i> Wishlist</a> </div>
                                    <div class="col-lg-6"><a href="/logout" class="btn btn-primary btn-sm"><i class="fa fa-sign-out"></i> Logout</a> </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
              </ul>';
        endif;

      return $output;
    }   
}    


if ( ! function_exists('get_category_active'))
{
    function get_category_active()
    {
        $ci =& get_instance();
        $ci->load->database();
        $ci->db->order_by('menu_sort', 'DESC');
        $category_List = $ci->category_m->get_by(['category_status' => '1', 'category_view' => '1', 'parent_id' => 0]);
        return $category_List;
    }

}

if ( ! function_exists('get_child_cstegory'))
{
    function get_child_category($p_cat)
    {
        $ci =& get_instance();
        $ci->load->database();
        $sql ="SELECT * FROM dc0_category WHERE category_status = '1' AND category_view = '1' 
        AND parent_id = '$p_cat'";
        $query = $ci->db->query($sql);
        $result = $query->result_array();

        return $result;
    }

}
if ( ! function_exists('count_category'))
{
    function count_category($id)
    {
        /*
        date_default_timezone_set('UTC');
        $date = new DateTime('now', new DateTimeZone('Asia/Karachi'));
        $ci =& get_instance();
        $ci->load->database();
        $category = $ci->category_m->get_by(array('slug' => $slug), true);
        $getDealCat = $ci->deal_category_m->deals($category->id);

        //$getDealCat = $ci->deal_category_m->deals($category->id);
          // print_r($getDealCat);

        $ci->db->where("deal_status",1);
        $ci->db->where("expiration_date >", date('Y-m-d H:i:s'));
        $ci->db->where_in('id', $getDealCat);
        $get_deal = $ci->deal_m->get();
        $count = count($get_deal);
        return count($count);
        
        
        */
        
        //old
        $ci =& get_instance();
        $ci->load->database(); 
        //$cat=0,$mer=0,$from=0,$to=0
       // $sql = "select * from active_deals where  category_id ='".$cat." and merchant_id='".$mer."' and  discounted_price between ".$from."  and ".$to." order by start_date";
        $sql="select count(*) as cnt from active_deals where id in (select deal_id from dc0_deal_category where category_id =".$id.")";
       // print_r($sql);
            $query=$ci->db->query($sql);
            //$result=$query->result_array();
            $result=$query->row();
       
          //print_r($result);
          /*if (isset($mer == ""))
                {
                $mer_id = "merchant_id like '%'";             
                }       
          else
                {
                $mer_id =" merchant_id = '".$mer."'";
                }
          
         if (isset($from)){
            }  
          $sql = "select * from active_deals where merchant_id like '".$mer"' and ";
            $query=$ci->db->query($sql);
            $result=$query->result_array();
          // if($result){
         //  foreach ($result as $results):
           
            //echo $results['id'];
           // echo $results['company'];
           //  endforeach;
          // }  */    
    
       return $result->cnt;
 
        
        
        
        
        
        
    }

}

if ( ! function_exists('get_review_avatar'))
{
    function get_review_avatar($user_id)
    {
        $ci =& get_instance();
        $ci->load->database();
        $ci->db->where('id', $user_id);
        $ci->db->select('avatar');
        $query = $ci->db->get('users');
        $result = $query->row();
        if ($result) {
           if (!empty($result->avatar)) {
             return '/uploads/user_avatar/'.$result->avatar;           
           } else {
             return '/uploads/user_avatar/avatar_placeholder.gif';   
           }
        } else {
             return '/uploads/user_avatar/avatar_placeholder.gif'; 
        }
     
    }

}
if ( ! function_exists('refer_friend_deal_plus'))
{
    function refer_friend_deal_plus($deal_id)
    {
        $ci =& get_instance();
        $ci->load->database();
        $ci->db->where('id', $deal_id);
        $ci->db->select('refer');
        $query = $ci->db->get('dc0_deal');
        $result = $query->row();
        if ($result) {
          $refer = $result->refer;
          $plus = $refer+1;
          $ci->deal_m->save(['refer'=>$plus], $deal_id);
        } else {
            $refer = $result->refer;
            $ci->deal_m->save(['refer'=>$refer], $deal_id);

        }
     
    }
    function onsale()
    {
        $ci =& get_instance();
        $ci->load->database();
        $get_deals_id = $ci->order_item_m->get_deal_ids();

        $ci->db->limit(12);
        $ci->db->where("deal_status",1);
        $ci->db->where("expiration_date >", date('Y-m-d H:i:s'));
        $ci->db->where_in('id', $get_deals_id);
        $ci->db->order_by('start_date','DESC');
        $result = $ci->deal_m->get();
        return $result;

    }
    
      function hotest()
    {
        $ci =& get_instance();
        $ci->load->database();
        $get_deals_id = $ci->order_item_m->get_deal_ids();

        $ci->db->limit(12);
        $ci->db->where("deal_status",1);
        $ci->db->where("expiration_date >", date('Y-m-d H:i:s'));
        $ci->db->where_in('id', $get_deals_id);
        $ci->db->order_by('start_date','DESC');
        $result = $ci->deal_m->get();
        return $result;

    }


    function get_order_items($id)
    {
        $ci =& get_instance();
        $ci->load->database();
        $orderdetails = $ci->order_item_m->order_item_array($id);
        return $orderdetails;
        
        
    }
    function check_deal_single($slug)
    {
        
        $ci =& get_instance();
        $ci->load->database();
        date_default_timezone_set('UTC');
        $date = new DateTime('now', new DateTimeZone('Asia/Karachi'));
        $get = $ci->deal_m->get_by(array('expiration_date >' =>  date('Y-m-d H:i:s'), 'deal_status' => 1,'slug' => $slug));
        if (!empty($get)) {
            return 1;
        } else {
            return 0;
        }
      
    }


    function recentlybought()
    {
        $ci =& get_instance();
        $ci->load->database();
        
        $query = " select * from dc0_deal a , recently_bought_view b  where b.deal_id = a.id order by last_bought DESC  limit 12";
        $data['get_deals'] = $ci->db->query($query)->result();
     //   $ci->db->limit(12);
        $result = $data['get_deals'];
        return $result;
        
    }

    



 function send_sms($id,$smsmessage,$destination)
    {
        
        
        
        
        
        
        $apiurl = 'http://cbs.zong.com.pk/reachcwsv2/corporatesms.svc?wsdl';
        $client = new SoapClient($apiurl, array("trace"=>1,"exception"=>0));
        $resultQuick = $client->QuickSMS(array('obj_QuickSMS'=>array('loginId'=>'923111222919',
        'loginPassword'=>'123','Destination'=>$destination,'Mask'=>'OSHI.PK','Message'=>$smsmessage, 
            'UniCode'=>'0','ShortCodePrefered'=>'n')));
         return $resultQuick;
         
       
    }


     function send_tcs($id)
    {
                
      //  echo "<pre>       baba</pre>";
      $ci =& get_instance();
        $ci->load->database();
         $userid=$ci->session->userdata('user_id');
        $query = " select * from dc0_orders   where id = $id";
        $shipdetails = $ci->db->query($query)->row();
        $mphone= '0'.ltrim(preg_replace('/\D+/', '', $shipdetails->phone),0);
        $cty=get_specific_field("dc0_city","city",$shipdetails->city_id);
     //   $ci->db->limit(12);
        $remarkstcs="Handle With Care - Please Call Before Delivery / B.O id: ".$shipdetails->confirmed_by." - ".$shipdetails->remarks;
        $apiurl = 'http://202.61.51.93:6265/Service1.asmx?WSDL';
        $client = new SoapClient($apiurl, array("trace"=>1,"exception"=>0));
        $resultQuick = $client->InsertData(array('userName'=>"oshi.pk",
                                                                        'password'=>"2155260abdullah",
                                                                        'costCenterCode'=>"037568",
                                                                        'consigneeName'=>$shipdetails->user_name,
                                                                        'consigneeAddress'=>$shipdetails->ship_address,
                                                                        'consigneeMobNo'=>$mphone,
                                                                        'consigneeEmail'=>$shipdetails->email,
                                                                        'originCityName'=>"KARACHI",
                                                                        'destinationCityName'=>$cty,
                                                                        'pieces'=>"1",
                                                                        'weight'=>"0.5",
                                                                        'codAmount'=>$shipdetails->total_amount,
                                                                        'custRefNo'=>$id,
                                                                        'productDetails'=>$shipdetails->item_summary,
                                                                        'fragile'=>"NO",
                                                                        'services'=>"O",
                                                                        'remarks'=>$remarkstcs,
                                                                        'insuranceValue'=>"0"));

// //       $shiprefno = $this->input->$resultQuick;

        //$status = $this->input->post('st');
       // $oid = $this->orders_m->save(['order_status' => 10], $id);
    //    $ci =& get_instance();
//        $ci->load->database();
        $resultQuicks=$ci->orders_m->save(['ship_ref_no' => $resultQuick->InsertDataResult], $id);
        //$data = array( 'ship_ref_no' => $resultQuicks);
            //$this->orders_m->save($data);
         //   return $resultQuick;
        /*echo "<pre>";
        print_r($resultQuick);
        echo "</pre>";*/
        return $resultQuick->InsertDataResult;

        }
    
    
    
     function track_tcs($cn)
    {
                
        //echo "<pre>       baba</pre>";
        $apiurl = 'http://track.tcs.com.pk/trackingaccount/track.asmx?WSDL';
        $client = new SoapClient($apiurl, array("trace"=>1,"exception"=>0));
        $resultQuick = $client->CreateSession(array('UserId'=>"037568", 
                                                                        'Password'=>"oshipk"
                                                                        ));

        if ($resultQuick)
        {
        $apiurl = 'http://track.tcs.com.pk/trackingaccount/track.asmx?WSDL';
        $client = new SoapClient($apiurl, array("trace"=>1,"exception"=>0));
        $resultQuick = $client->DataSet_DeliveryDetails_CN(array('CN'=>$cn));
     
        }                                                                
     
       $xml=simplexml_load_string($resultQuick->DataSet_DeliveryDetails_CNResult->any);
       $allstates =$xml->NewDataSet;
        return($allstates);
        //foreach ($allstates as $all)
         //{ //print_r($all);
        // }
        
        //   $array = json_decode(json_encode($resultQuick),true);
//        echo "<pre>";
//        
//        $languages = simplexml_load_file("$array");
//
//        print_r($languages);
//        echo "</pre>";              
                                           
        }
    
 function tcs_shipment()
    {
                
        $apiurl = 'http://track.tcs.com.pk/trackingaccount/track.asmx?WSDL';
        $client = new SoapClient($apiurl, array("trace"=>1,"exception"=>0));
        $resultQuick = $client->CreateSession(array('UserId'=>"037568", 
                                                                        'Password'=>"oshipk"
                                                                        ));

        if ($resultQuick)
        {
        $apiurl = 'http://track.tcs.com.pk/trackingaccount/track.asmx?WSDL';
        $client = new SoapClient($apiurl, array("trace"=>1,"exception"=>0));
        $resultQuick = $client->DataSet_DeliveryDetails(array('CustomerNo'=>"037568",
                                                                        'FromDate'=>'28-Dec-2015',
                                                                        'ToDate' =>'28-Dec-2015'
                                                                            ));
     
        }                                                                
       $xml=simplexml_load_string($resultQuick->DataSet_DeliveryDetailsResult->any);
      // $allstates =$xml->NewDataSet;
        return($xml);
      //  return($allstates);
                                           
        }
    

    
        
     if ( ! function_exists('get_privilege_slug_by_id'))
{
    function get_privilege_slug_by_id($id=0)
    {
        $ci =& get_instance();
        $ci->load->database();
        $slug='';
        $query=$ci->db->query("SELECT slug FROM privileges WHERE id=$id ");
        $result=$query->result_array();  
        if($result) $slug=$result[0]['slug'];
        return $slug;
    }
}
    
if ( ! function_exists('has_permission'))
{
    function has_permission($slug='', $field='')
    {
        $ci =& get_instance();
        $ci->load->database();
        $flag=0;
        $id=$ci->session->userdata('user_id');
        //$emp=$ci->session->userdata('id');
        if(!empty($slug) && !empty($field)){
            $query=$ci->db->query("SELECT up.* FROM users_privileges AS up WHERE up.users=$id AND up.slug='$slug' AND up.$field=1 ");
            $result=$query->result_array();            
            if($result) $flag=1;
           // print_r($result);
//            exit();         
        }
        //if($id==0) $flag=1;
        return $flag;
    }
}
    
//if ( ! function_exists('auth'))
//{
//    function auth($slug='', $field='')
//    {
//        $ci =& get_instance();
//        $ci->load->database();
//        if(!$ci->ion_auth->logged_in() || !$ci->ion_auth->is_admin())
//        
//        
//        { 
//            redirect('admin/dashboard/index', 'refresh'); 
//        }
//        else if(!has_permission("$slug", "$field")){ redirect('dashboard', 'refresh'); }
//    }
//}
//

if ( ! function_exists('auth'))
{
    function auth($slug='', $field='')
    {
        $ci =& get_instance();
        $ci->load->database();
      
        if(!has_permission("$slug", "$field") ||  !$ci->ion_auth->logged_in() || !$ci->ion_auth->is_admin())
   
            { 
               // print_r($slug,$field)  ;
              
              redirect('admin/dashboard/index', 'refresh');
               
            }
          
      
    }
}
    
if ( ! function_exists('auth_options'))
{
    function auth_options($slug='', $field='')
    {
        $ci =& get_instance();
        $ci->load->database();
       $right = 0       ;
        if(!has_permission("$slug", "$field") ||  !$ci->ion_auth->logged_in() || !$ci->ion_auth->is_admin())
   
            { 
               // print_r($slug,$field)  ;
              
            $right=0 ;
               
            }
            else 
            {
                 $right= 1;

            }
       
           return($right);
    }
}

    

//while apply permissions:  auth("employees", "view");   
        
        

}
/* End of file cms_helper.php */
/* Location: ./application/models/cms_helper.php */