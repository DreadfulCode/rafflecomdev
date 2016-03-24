<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Order extends CI_Controller {
        var $data =array();
        var $config = array();
        public function __construct()
        {
            parent::__construct();

            $this->load->model('city_m');
            $this->load->model('deal_m');
            $this->load->model('option_m');
            $this->load->model('order_m');
            $this->load->model('user_m');
            $this->load->model('deal_image_m');
            $this->load->helper('cms');
            $this->load->model('orders_m');
            $this->load->model('order_item_m');
            $this->load->model('users_groups_m');
            $this->load->model('groups_m');
            $this->load->model('attribute_m');
            $this->load->model('coupon_m');
            $this->load->model('coupon_used_m');
            $this->load->model('payment_m');
            $this->load->model('deal_cart_m', 'cart');
            $this->load->model('cart_item_m', 'cart_item');
            $this->load->model('user_account_m');
            $this->load->model('smsorderlog_m');
            $this->load->model('order_status_m');
            $this->load->model('shipper_m');
            $this->load->model('order_type_m');
            if (!$this->ion_auth->logged_in())
            {
                //redirect them to the login page
                redirect('/', 'refresh');
            }
        }

        public function index()
        {

            auth('all_order','view') ;
            $this->load->library('pagination');
            if(isset($_REQUEST['cn4khi'])){
                $val=$this->input->post(null, TRUE);
                if(isset($val['chkID']) && is_array($val['chkID'])){
                    $ids=implode(', ',$val['chkID']);    
                    $this->session->set_flashdata('ids',$ids);
                    redirect('/admin/order/cn_4_khi');
                }
            }

            if($this->input->get('limit_order'))
            {
                $per_page = $this->input->get('limit_order');
            }
            else
            {
                $per_page = $this->config->item('admin_per_page');
            }

                
                
                $this->load->database();
                
                if ($this->uri->segment(4)=="")
                {
                               $this->session->unset_userdata('search_order');
                }
                $searchcriteria="";
                
              
              
                if($this->input->post('q')){
                    $k = $this->input->post('q');
                    //$this->db->like(array('email' => $k, 'phone' => $k, 'ship_address' => $k, 'total_amount' => $k));
                  $searchcriteria  = " and ( upper(`user_name`) like upper('%$k%') or upper(`email`) LIKE upper('%$k%') OR  `phone` LIKE '%$k%' OR `ship_address` LIKE '%$k%' OR `total_amount` LIKE '%$k%' OR `item_summary` LIKE '%$k%'  OR  ship_ref_no like '%$k%' OR id  = '$k' )";
                    //$this->db->where("(`email` LIKE '%$k%')");

                }

              
               if($this->input->post('dealsearch')){
                   $dealid = $this->input->post('dealsearch');
                   $searchcriteria .= " and id in(select order_id from dc0_order_item where (deal_id ='$dealid') or (deal_title like '%$dealid%' )) ";
                   
               }


                if($this->input->post('city')){
                    $search_city = $this->input->post('city');
                    $searchcriteria .= " and city_id =".$search_city;
                }
                
                
                if($this->input->post('limit_order')){
                    $search_limit = $this->input->post('limit_order');
                        $per_page = $search_limit;
                   // $searchcriteria .= " and city_id =".$search_city;
                }


                if($this->input->post('to_oshipicker')) {


                    $first_date = $this->input->post('to_oshipicker');
  //                  $second_date = $this->input->post('from_oshipicker');

                    $searchcriteria .=  "  and (dc0_orders.created_at  >= '".$first_date."' ";

                    /*$search_date = $this->input->post('oshipicker');
                    $this->db->like("created_at",$search_date);*/
                }

                  if( $this->input->post('from_oshipicker')){


                   
                    $second_date = $this->input->post('from_oshipicker');

                    $searchcriteria .=  " and dc0_orders.created_at < '".$second_date."' )";

                    /*$search_date = $this->input->post('oshipicker');
                    $this->db->like("created_at",$search_date);*/
                }

              
                
                
                
                if($this->input->post('status')!='0'){

                    $noQuotes = str_replace("'", '', $this->input->post('status'));
                    $search_status = $noQuotes;
                     $searchcriteria .= " and order_status = ".$search_status;
                }
                if($this->input->post('shippers')!='0'){

                    $noQuotes = str_replace("'", '', $this->input->post('shippers'));
                    $search_shipper = $noQuotes;
                     $searchcriteria .= " and shipper = ".$search_shipper;
                }

                if($this->input->post('order_type')!='0'){
                    
                    $noQuotes = str_replace("'", '', $this->input->post('order_type'));
                    $search_ordertype = $noQuotes;
                    $searchcriteria .= " and order_type = ".$search_ordertype;

                    
                }
               
               if ($this->uri->segment(4)==""){
                   $startrecord = 0;
               }
               else 
               {
                           $startrecord = $this->uri->segment(4);
               }
               
                $searchcriteria     .=     $this->session->userdata('search_order');
    
                
                  if($searchcriteria != "")
                        {
                        $this->session->set_userdata('search_order', $searchcriteria);
                        }
                  else
                    {    
                     $this->session->unset_userdata('search_order');
                    }       
    
    
    
    
    
               $sql= "select * from dc0_orders where truncate = 0 $searchcriteria order by created_at DESC ";
              // $base_64 = base64_encode($searchcriteria);
                $config['base_url'] = '/admin/order/index/';
              
                //$query = $this->db->get();
                   // $this->db->limit($per_page, (($this->uri->segment(4)) ? $this->uri->segment(4) : 0));

                $query = $this->db->query($sql);
                $count_rows = $query->num_rows();
                
                $sql .="LIMIT ".$startrecord.",".$per_page;
               $query =  $query = $this->db->query($sql);
                $data['total_rows'] = 0;
                $data['searchcriteria'] = $searchcriteria;
                $data['startrecord'] = $startrecord;
                $data['total_rows'] = $count_rows;
                $config['total_rows'] = $count_rows;
               
                if ($count_rows > 0)
                {
  
                $result = $query->result();
                //print_r($searchcriteria); 
                $data['all_order'] = $result;
                
                /*	        print_r($result);
                exit();*/
                
                
                //$config['total_rows'] = $count_rows;
               // $data['total_rows'] = $count_rows;
               // $data['searchcriteria'] = $searchcriteria;
                 $this->session->set_flashdata('message',"Search Criteria :".$searchcriteria."  Total Records found : ".$count_rows);
                    $this->session->set_userdata('limit',$per_page);
                   
                //print_r($count_rows." Results retrieved!"); 
                //$config['page_query_string'] = TRUE;
               // $config['use_page_numbers'] = TRUE;
                $config['per_page'] = $per_page;
                $config['uri_segment'] = 4;
                $config['num_links'] = 5;
                
                $this->pagination->initialize($config);

                $data['pagination_create_links'] = $this->pagination->create_links();
                }
                $data['cityArray'] = $this->city_m->city_array();
                $data['status']= $this->order_status_m->get_status();
                $data['shippers'] = $this->shipper_m->get();
                $data['order_type'] = $this->order_type_m->get();
                $data['get_user_by_id'] = $this->user_array();


                               
                $data['title'] = "Orders";

            if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
            {
                $data['mainContent'] = 'admin/order/index';
                $this->load->view('admin/layout/master', $data);
            }
          
           
}


        public function show($id)
        {	
            auth("all_order", "view");

            $data['all_user_array'] = $this->user_m->user_array();
            $order_single = $this->orders_m->get($id);
            $data['single_order'] = $order_single;
            $data['cityArray'] = $this->city_m->city_array();
            $data['status']= $this->order_status_m->get_status();
            $st_history=get_status_history($id);
            $data['status_history']= $st_history;
        //    $st_history=get_status_history($id));
            $data['shippers']= $this->shipper_m->get();
            $data['order_type'] = $this->order_type_m->get();
            // print_r($data['order_deal_details']);
            $this->db->limit(30);
            $this->db->order_by('id', 'desc');
            $this->db->where_not_in('id', $id);

            $currentemail= $order_single->email;
            $currentphone = $order_single->phone;


            $SQL = "SELECT * from dc0_orders where ( email like '$currentemail' or phone like '$currentphone') AND id <>$id order by created_at DESC";
            $query = $this->db->query($SQL);

            $data['pastOrders'] = $query->result();
            // print_r($data['pastorders']);
            //		$data['pastOrders'] = $this->orders_m->get_by([$query);
            //print_r($id);
            $sql = "select * from dc0_order_item where order_id = ".$id;                                      
            //$data['order_items'] = $this->order_item_m->get_by(array('order_id' => $id));

            $query=$this->db->query($sql);

            $data['order_items'] =           $query ->result();      //              #query = $this->db->query($sql);

            $data['order_deal_details']   =$this->deal_m->deal_by_id();


            //   echo "<pre>";       
            //                           print_r($SQL);
            //                                                                print_r($id);
            //
            //                            print_r($query);
            //                                // print_r($data);
            //                                echo "</pre>";
            $data['group_id_By_user_id'] = $this->users_groups_m->user_group_id();
            $data['group_name_by_group_id'] = $this->groups_m->Group_name();
            $data['attributes'] = $this->attribute_m->attribute_array();

            //$data['mainContent'] = 'admin/order/show';
            //$this->load->view('admin/layout/master', $data);

            if ($this->ion_auth->logged_in())
            {
                $data['mainContent'] = 'admin/order/show';
                $this->load->view('admin/layout/master', $data);
            }
            else
            {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('admin/auth/login', 'refresh');
            }
        }


        public function changetype($id)
        {   
            $otype = $this->input->post('ot');
            $oid = $this->orders_m->save(['order_type' => $otype], $id);
            echo $otype;
        } //end changetype 


        public function status($id)
        {   
            $connecteduser = $this->ion_auth->get_user_id();
            $status = $this->input->post('st');
            
            $logdata = array(
              'order_id' => $id ,
              'new_status' => $status,
              'change_by' => $connecteduser
                );

               $this->db->insert('dc0_status_change', $logdata); 
           
            $oid = $this->orders_m->save(['order_status' => $status], $id);
            //embed zong api 
            

            $general_setting = $this->option_m->option_array('gs_');
            $orderdetails = $this->orders_m->get_by(array('id'=>$id));
            $orderdetails=$orderdetails[0];

            $custel= $orderdetails->phone;
            $custel = '92'.ltrim(preg_replace('/\D+/', '', $custel),0);


            $connecteduser = $this->ion_auth->get_user_id();
            $smsmessage=$subject=$emailmessage=$sms_result=$orderdetail='';
            $orderdetail = $this->orders_m->get_by(array('id'=>$id));
            $orderdetail=$orderdetail[0];
            $email = $orderdetail->email;


            
            switch($status){
                /*case 2:
                    $smsmessage = "Dear ".$orderdetails->user_name." Your Order No.".$id." has been Pending, on ".$general_setting['gs_company'] ." do send us ur feedback. Thanks ";
                    break;*/
                    //Dear[space][customername][space]Your Order No. XXXXX Has been Delivered. Thanks For Shopping at Oshi.pk. Do Recommend Your Friends & Family
                    case 3:
                     $oid = $this->orders_m->save(['confirmed_by' => $connecteduser], $id);
                    
                      break;
                    //Dear[space][customername][space]We were calling for confirmation of your Order No. XXXXX But Calls were Un Attended. Please Call Back At 021-32271995
                    
                    
                    
                case 5:
                    $subject = "Your Order No".$id." Delivered successfully.";
                    $emailmessage = 'Hi Dear,'."\n\r";
                    $emailmessage .= 'Thanks for order at Oshi.pk.';

                    $smsmessage = "Dear ".$orderdetails->user_name. " Your Order No.".$id." Has been Delivered, Thanks For shopping at ".$general_setting['gs_company'] ." Do Recommend Your Friends & Family";
                    break;
                    //Dear[space][customername][space]We were calling for confirmation of your Order No. XXXXX But Calls were Un Attended. Please Call Back At 021-32271995
                case 6:
                    $smsmessage = "Dear ".$orderdetails->user_name. " We were calling for confirmation of your Order No. ".$orderdetails->id." But Calls were Un Attended. Please Call Back At 021-32271995";
                    break;
                case 8:
                    $subject = 'Sorry your order has been cancelled';
                    $emailmessage = 'Hi Dear,'."\n\r";
                    $emailmessage .= 'Your order has been canceled due to some reason. Please contact to admin.';                
                        //Dear[space][customername][space]Your Order No. XXXXX has been cancelled as 4 calls were un answered. For Assistance Please Call: 021-32271995
                    $smsmessage = "Dear ".$orderdetails->user_name. "Your Order No.".$id. " has been cancelled as 4 calls were un answered. For Assistance Please Call 021-32271995";
                    break;


            } 


            if(!empty($smsmessage)){
                //  echo "<pre>";
                // print_r($orderdetail);
                // echo "</pre>";
                $sms_result = send_sms($id,$smsmessage,$custel);
                $this->smsorderlog_m->save_sms_result($sms_result,$id,$smsmessage,$custel,$status,$connecteduser);            
            }   
            if(!empty($emailmessage)){
                $to=$email;
                ///$to = $this->email->to($email);
                // $to      = 'mzahid705@gmail.com';
                $emailmessage = $emailmessage;
                $subject = $subject;
                $headers = 'From: sales@oshi.pk' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
                mail($to, $subject, $emailmessage, $headers);                   
            }


           // if ($status == 10)
//            {
//                if ($orderdetails->ship_ref_no=="")
//                {
//                    $tcsresult = send_tcs($id);
//                }
//                //$data = array( 'ship_ref_no' => $resultQuicks);
//                //$this->orders_m->save($data);
//
//            }

            /*    
            if ($status == 5)
            {
            //$smsmessage = "Dear ".$orderdetails->user_name." Your Order No.".$orderdetails->id." has been received, Total amount Payable on delivery : ".$general_setting['gs_currency'] .$orderdetails->total_amount.". You will be contacted for confirmation soon. thanks";
            $smsmessage = "Dear ".$orderdetails->user_name." Your Order No.".$id." has been Delivered, Thx 4 shopping on ".$general_setting['gs_company'] ." do send us ur feedback ";
            $sms_result = send_sms($id,$smsmessage,$custel);
            $this->smsorderlog_m->save_sms_result($sms_result,$id,$smsmessage,$custel,$status,$connecteduser);

            }
            elseif ($status == 6)

            {

            $smsmessage = "Hi ".$orderdetails->user_name." trying to reach u to confirm ur order no.".$orderdetails->id." at  ".$general_setting['gs_company'] ." on ". $custel . " Please call back on ".$general_setting['gs_orderphone'] .". Thx ";
            $sms_result = send_sms($id,$smsmessage,$custel);
            $this->smsorderlog_m->save_sms_result($sms_result,$id,$smsmessage,$custel,$status,$connecteduser);


            }
            elseif ($status == 8 )
            {

            $smsmessage = "Hi ".$orderdetails->user_name." Unfortunatly your  Order no.".$id. " at  ".$general_setting['gs_company'] ." has been cancelled after 3 failed contact attempts. Please call us on ".$general_setting['gs_orderphone'] ;
            $sms_result = send_sms($id,$smsmessage,$custel);
            $this->smsorderlog_m->save_sms_result($sms_result,$id,$smsmessage,$custel,$status,$connecteduser);


            }


            elseif ($status == 2)
            {
            $smsmessage = "Dear ".$orderdetails->user_name." Your Order No.".$id." has been Pending, on ".$general_setting['gs_company'] ." do send us ur feedback. Thx ";
            $sms_result = send_sms($id,$smsmessage,$custel);
            $this->smsorderlog_m->save_sms_result($sms_result,$id,$smsmessage,$custel,$status,$connecteduser);

            }
            */	

            //	echo "<pre>";
            //	print_r($sms_result);
            //	echo "</pre>";


            if($oid > 0)
            {
                //$ro = $this->orders_m->get($id);
            }
            else
            {
                echo "Error";
            }
        }// end status(id)

        public function change_shipper($id)
        { 

            $tcsresult=0;
            $shipper = $this->input->post('st');
            $oid = $this->orders_m->save(['shipper' => $shipper], $id);
            $orderdetail = $this->orders_m->get_by(array('id'=>$id));
            $orderdetail=$orderdetail[0];
          
            $general_setting = $this->option_m->option_array('gs_');
            $custel= $orderdetail->phone;
            $custel = '92'.ltrim(preg_replace('/\D+/', '', $custel),0);


            $connecteduser = $this->ion_auth->get_user_id();
            $smsmessage='';
            $email = $orderdetail->email;
          




            switch($shipper){
                case 1:
                //Dear[space][customername][space]Your Order No. XXXXX Has been Shipped via TCS CN: XXXXXXXXXXXX Delivery Within 4 Days. Keep Your Phone No. Active/On
             
                if ($orderdetail->ship_ref_no=="")
                {
                    $tcsresult = send_tcs($id);

                }
             
             
                    $smsmessage = "Dear " .$orderdetail->user_name. " Your Order No.".$id." has been Shipped via TCS CN: ". $tcsresult." Delivery Within 4 Days. Keep Your Phone No. Active/On";
                    break;


            }
              if(!empty($smsmessage)){
                //  echo "<pre>";
                // print_r($orderdetail);
                // echo "</pre>";
                $sms_result = send_sms($id,$smsmessage,$custel);
                $this->smsorderlog_m->save_sms_result($sms_result,$id,$smsmessage,$custel,$shipper,$connecteduser);            
            }  
           
          


            echo $tcsresult;


        }//end shipper(id)    

        public function update_tracking($id)
        { 
            $remarks=0;
            $orderdetail = $this->orders_m->get_by(array('id'=>$id));
            $orderdetail=$orderdetail[0];
            if ($orderdetail->shipper == 1) // if the shipper is tcs 
            {
                if (!$orderdetail->ship_ref_no=="")
                {
                    $trackstatus= track_tcs($orderdetail->ship_ref_no);      
                    if ($trackstatus){        
                        foreach ($trackstatus->tblDetails as $track)
                        {                                              
                            if ($track->STATUS =="OK")
                            { 

                                $remarks="Delivered on (".$track->Date." ".$track->Time.")".$track->LOCATION." Received By :".$track->RECEIVED_BY;
                                $oid = $this->orders_m->save(['ship_remarks' => $remarks], $id);
                                $oid = $this->orders_m->save(['order_status' => 5],$id);

                            } 
                        }
                    }
                }


                echo $remarks;


            }//end shipper(id)    

        }



        public function cn_khi()
        {

            $data['all_user_array'] = $this->user_m->user_array();
            $order_single = $this->orders_m->get();
            $data['single_order'] = $order_single;
            $data['cityArray'] = $this->city_m->city_array();
            // $data['get_user_by_id'] = $this->user_array();
            $this->load->database();
            //$date = $this->input->post('oshipicker_export');
            //$data['pastOrders'] = $this->orders_m->get_by(['email'=>$order_single->email]);
            //  $sql = "SELECT order_id, deal_id, deal_title, qty,deal_code, user_name, unit_price, city_id, total_price, city_id, email, phone, ship_address, shipping_charges, order_status, order_type, b.created_at  from dc0_order_item a , dc0_orders b  where b.city_id = 1024 and a.order_id = b.id and '".$date."' =  b.created_at  limit 12  ";
            //  $data['order_items'] = $this->db->query($sql)->result();


            $date = $this->input->post('oshipicker_export');
            //$data['pastOrders'] = $this->orders_m->get_by(['email'=>$order_single->email]);
            $sql = "SELECT order_id, deal_id, deal_title, qty,deal_code, user_name, unit_price, city_id, total_price, city_id, email, phone, ship_address, shipping_charges, order_status, order_type, b.created_at  from dc0_order_item a , dc0_orders b  where b.city_id = 1024 and a.order_id = b.id and date(a.created_at) =  '".$date."' and truncate <> 1  ";
            $data['order_items'] = $this->db->query($sql)->result();


            //echo"<pre>"; print_r($date); echo"</pre>";
            $data['group_id_By_user_id'] = $this->users_groups_m->user_group_id();
            $data['group_name_by_group_id'] = $this->groups_m->Group_name();
            $data['attributes'] = $this->attribute_m->attribute_array();
            //$data['Orders'] = $this->orders_m->get_by(['DATE(`created_at`)' => $date]);

            //echo"<pre>";  print_r($data['Orders']); echo"</pre>";

            if ($this->ion_auth->logged_in())
            {
                $data['mainContent'] = 'admin/order/cn_khi';
                $this->load->view('admin/layout/master', $data);
            }
            else
            {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('admin/auth/login', 'refresh');
            }

        }

        public function cn_4_khi($ids=0)
        {
            $ids = $this->session->flashdata('ids');
            if ($ids=="") {
            $filter=" order by id DESC limit 0,15 ";
            }
            else
            {
            $filter= "where  o.id IN (".$ids.")";            
            }
            $ids = $this->session->flashdata('ids');
            $this->load->database();
            $sql = "SELECT 
            id, 
            user_name, 
            (select city from dc0_city as c where  c.id =o.city_id) as city , 
            total_amount,
            email, 
            phone, 
            ship_address,
            item_summary, 
            shipping_charges,
            remarks,  
            created_at  
            from  dc0_orders o  
            ".$filter;        


            $data['order_cn'] = $this->db->query($sql)->result();
            

            //echo"<pre>";  print_r($data['Orders']); echo"</pre>";

                $data['mainContent'] = 'admin/order/cn_khi';
                $this->load->view('admin/layout/master', $data);

        }    


        
        public function delete($id)
        {
            auth('all_order','delete') ;
            //$this->orders_m->delete($id);
            // it will change its status to 1 it means dealted order will not delete
            $this->orders_m->save(array('truncate' => 1), $id);
            echo 1;

        }

        public function user_array()
        {
            $all_users = $this->ion_auth->users()->result();
            $users = array();
            foreach ($all_users as $key => $user) {
                $users[$user->id] = $user->username;
            }

            return $users;
        }



        public function ExportData()
        {

            $data['cityArray'] = $this->city_m->city_array();
            $data['cities'] = $this->city_m->get_by(array('country_id' => 72));
            $data['get_user_by_id'] = $this->user_array();
            //$data['order_items'] = $this->order_item_m->order_item_array();

            if($this->input->post('oshipicker_export'))
            {
                $date = $this->input->post('oshipicker_export');

                $data['Orders'] = $this->orders_m->get_by(['DATE(`created_at`)' => $date]);
                //print_r($data['Orders']);
                //exit();

                //$sql = "SELECT * FROM dc0_orders WHERE DATE(created_at) =  '$date'"; 

                //$result = $this->db->query($sql, array($date));
                //$data['Orders'] = $result;

                $this->load->view('admin/order/spreadview', $data);
            }

            if($this->input->post('order_status_export'))
            {
                $status = $this->input->post('order_status_export');
                if ($status == '000') {
                    //$Pending = 0;
                    /* echo $Pending;
                    exit();*/
                    $data['Orders'] = $this->orders_m->get_by(['order_status' => '0']);
                    $this->load->view('admin/order/spreadview', $data);

                }
                else
                {
                    $Delivered = $this->input->post('order_status_export');

                    $data['Orders'] = $this->orders_m->get_by(array('order_status' => 1));

                    $this->load->view('admin/order/spreadview', $data);
                }

            }

            if($this->input->post('email_export'))
            {
                $email = $this->input->post('email_export');
                $data['Orders'] = $this->order_m->get_by(['email' => $email]);
                $this->load->view('admin/order/spreadview', $data);

                //print_r($input);
            }

            if($this->input->post('order_city_export'))
            {
                $city = $this->input->post('order_city_export');
                // print_r($city);
                // exit();
                $data['Orders'] = $this->order_m->get_by(['city_id' => $city]);
                $this->load->view('admin/order/spreadview', $data);

                //print_r($input);
            }
        }


        public function create_order()
        {
            auth('all_order','add') ;
            $data['active_deals'] = $this->deal_m->get_by(['deal_status' => '1']);
            $data['get_customers'] = $this->user_m->get_by(['group_id' => '5']);
            $data['get_cities'] = $this->city_m->get_by(['country_id' => '72']);
            $data['order_type'] = $this->order_type_m->get();
            
            $data['title'] = "Create Orders";
            $data['mainContent'] = 'admin/order/create_order';
            $this->load->view('admin/layout/master', $data);
        }

        public function add_order_item($id)
        {
            $getOrder = $this->orders_m->get($id);
            if ($getOrder) {
                $data['active_deals'] = $this->deal_m->get_by(['deal_status' => '1']);
                $data['get_customers'] = $this->user_m->get_by(['group_id' => '5']);
                $data['get_cities'] = $this->city_m->get_by(['country_id' => '72']);
                $data['title'] = "Item Insert Order";
                $data['mainContent'] = 'admin/order/add_item';
                $this->load->view('admin/layout/master', $data);
                # code...
            } else {
                redirect('/admin/order', 'refresh');
            }

        }
        public function store_order()
        {

            $input = $this->input->post();

            date_default_timezone_set('UTC');
            $date = new DateTime('now', new DateTimeZone('Asia/Karachi'));

            // $sess_id = $this->session->userdata('session_id');
            $ip = $this->input->ip_address();
            $uid = $input['user_id'];
            $qty = $input['qty'];
            // $cart = $this->cart_m->get_by(array('session_id' => $sess_id));
            $user = $this->user_m->get_by(array('id' => $uid));

            $item = $this->deal_m->get($input['deal_id'], true);


            /* insert order in order table */

            //$items = json_encode($cart);

            //print_r($items);

            $insertorder = array(
                // 'session_id' 		=> $sess_id,
                'user_id'			=> $user[0]->id,
                'city_id'			=> $input['city_id'],
                'email'				=> $user[0]->email,
                'ship_address'		=> $input['ship_address'],
                'phone'				=> $input['phone'],
                'total_amount'		=> $qty*$item->discounted_price,
                'order_status'		=> 2,
                'comments'			=> 'Admin Order Create',
                'created_at' 		=> $date->format('Y-m-d H:i:sP')
            );

            /*print_r($insertorder);
            exit();*/

            //$this->orders_m->save($insertorder);

            $order_id = $this->orders_m->save($insertorder);

            //$order = $this->orders_m->get_by(array('session_id' => $sess_id));

            /*print_r($order);
            exit();*/

            /* now insert items in to order item */

            if($order_id > 0)
            {


                $plus = $item->real_sold+$input['qty'];

                $ar = array('real_sold' => $plus);

                $this->deal_m->save($ar,$item->id);

                $insertitems = array(
                    'order_id' 			=> $order_id,
                    // 'cart_id'			=> $item->id,
                    'deal_id'			=> $input['deal_id'],
                    'deal_title'		=> $item->title,
                    'deal_code'			=> $item->deal_code,
                    // 'deal_option'		=> $my_option,
                    'qty'				=> $input['qty'],
                    'unit_price'		=> $item->discounted_price,
                    // 'price_diffrence'	=> $item->price_diffrence,
                    // 'price'				=> $item->price,
                    'total_price'		=> $input['qty']*$item->discounted_price,
                    'created_at' 		=> $date->format('Y-m-d H:i:sP')
                );
                $this->order_item_m->save($insertitems);
                $this->session->set_flashdata('message', 'Order Create Successfully');
                redirect('admin/order/', 'refresh');

            }

            //	$order_items = $this->order_item_m->get_by(array('order_id' => $order_id));

        }



        public function user_checkout_order()
        {
            $this->form_validation->set_rules('customer_ship_address', 'Address', 'required');
            $this->form_validation->set_rules('customer_name', 'Name', 'required');
            $this->form_validation->set_rules('customer_contact', 'Contact Number', 'required');
            $this->form_validation->set_rules('customer_city_id', 'City', 'required');
            $this->form_validation->set_rules('payment_id', 'Payment Option', 'required');

            if ($this->form_validation->run() == TRUE) {

                $input = $this->input->post();
                //$item_remark = $this->input->post('remarks');
                date_default_timezone_set('UTC');
                $date = new DateTime('now', new DateTimeZone('Asia/Karachi'));

                $sess_id = $this->session->userdata('session_id');
                $cart_id = $this->input->post('cart_id');
                $coupon_array = coupon_code_cart_ammount();
                $discount_amount = $coupon_array['discount_amount'];


                $getCart = $this->cart->get_by(['id' => $cart_id]);
                $getCartItems = $this->cart_item->get_by(['cart_id' => $getCart[0]->id]);


                $session_refer_code = $this->session->userdata('refer_code');

                if (!empty($session_refer_code)) {

                    $refer_code = $this->session->userdata('refer_code');
                } else {
                    $refer_code = '';
                }

                $total_price_order = $getCart[0]->total_price-$discount_amount;
                $insertorder = array(
                    'cart_id' 			=> $getCart[0]->id,
                    'session_id' 		=> $this->session->userdata('session_id'),
                    'user_id'			=> '0',
                    'payment_id'		=> $input['payment_id'],
                    'user_name'			=> $input['customer_name'],
                    'city_id'			=> $input['customer_city_id'],
                    'email'				=> $input['customer_email'],
                    'ship_address'		=> $input['customer_ship_address'],
                    'phone'				=> $input['customer_contact'],
                    'remarks'			=> $input['remarks'],
                    'total_amount'		=> $total_price_order,
                    'coupon_code'		=> $getCart[0]->coupon_code,
                    'refer_code'		=> $refer_code,
                    'comments'			=> 'created by admin',
                    'order_type'        => $input['order_type'],
                    'created_at' 		=> $date->format('Y-m-d H:i:sP')
                );
                $order_id = $this->orders_m->save($insertorder);
                if($order_id > 0)
                {
                    $itemsummary_text = " ";
                    foreach($getCartItems as $item) {
                        $getDeal = $this->deal_m->get($item->deal_id);
                        if(isset($item->deal_option)){
                            $my_option = $item->deal_option;
                        }else{
                            $my_option = '0';
                        }

                        $plus = $getDeal->real_sold+$item->qty;
                        $ar = array('real_sold' => $plus);
                        $this->deal_m->save($ar,$item->deal_id);

                        $coupon_used = array('order_id' => $order_id);
                        $this->coupon_used_m->save_by_cart_id($coupon_used, $getCart[0]->id);

                        $items_array = array(
                            'order_id' 			=> $order_id,
                            'cart_id'			=> $item->id,
                            'deal_id'			=> $item->deal_id,
                            'deal_title'		=> $getDeal->title,
                            'deal_code'			=> $getDeal->deal_code,
                            'deal_option'		=> $my_option,
                            'qty'				=> $item->qty,
                            'unit_price'		=> $item->unit_price,
                            'price_diffrence'	=> $item->price_diffrence,
                            'price'				=> $item->price,
                            'total_price'		=> $item->item_total_price,
                            'created_at' 		=> $date->format('Y-m-d H:i:sP')
                        );
                        $insert_item = $this->order_item_m->save($items_array);
                        
                        $attribs =explode_attributes($my_option);
                       // print_r($attribs);
                         $itemsummary_text .= $getDeal->title.$attribs."<br />";

                    } if ($insert_item > 0) {

                        $this->cart->save(['coupon_discount' => $discount_amount], $getCart[0]->id);
                        $this->coupon_used_m->save_by_cart_id(['discount' => $discount_amount, 'order_id' => $order_id], $getCart[0]->id);
                        // $this->_regenerate_session_data();	
                        $data['checkout_valid'] = true; 
                        $data['order_id'] = $order_id; 
                        $data['checkout_message'] = 'Checkout Successfully!'; 

                         echo json_encode($data);

                    }
                    
                          $itemsummary=array('item_summary'=>$itemsummary_text);
                          $this->db->where(array('id'=>$order_id));
                          $this->db->update('dc0_orders',$itemsummary);
                      /*------ to enable sms sending on admin order creation remove the comments    
                           //generate sms on creation
                         $general_setting = $this->option_m->option_array('gs_');
                         $custel= $input['customer_contact'];
                         $custel = '92'.ltrim(preg_replace('/\D+/', '', $custel),0);
                         $connecteduser = $this->ion_auth->get_user_id();
                         $smsmessage='';
                         $status = 'SMS by Admin';
                          //"Dear ".$cusname." Your Order No.".$order_id." has been received, Our Team Will Contact You Shortly. For Fasten Up Call Us at 021-32271997";
                        $smsmessage = "Dear ".$input['customer_name']." Your Order No.".$order_id." has been received Our Team Will Contact You Shortly. For Fasten Up Call Us at 021-32271997";
                        $sms_result = send_sms($order_id,$smsmessage,$custel);
                        $this->smsorderlog_m->save_sms_result($sms_result,$order_id,$smsmessage,$custel,$status,$connecteduser);


                    */
                    

                }

            } else {
                $data['checkout_valid'] = false; 
                $data['checkout_message'] = validation_errors(); 
                echo json_encode($data);
            }


        }

        public function updated_cart_total($id)
        {
            echo get_cart_item_sum($id);
        }

        public function delete_all()
        {
            $chkParamId = $this->input->post('chkID');

            foreach ($chkParamId as $id) {
                $this->orders_m->save(array('truncate' => 1), $id);
                echo 1;
            }  
        }

        // all status of order in bulk action

        public function hold()
        {
            $chkParamId = $this->input->post('chkID');

            foreach ($chkParamId as $id) {

                $this->orders_m->save(array('order_status' => 1), $id);
                echo 1;
            }  
        }

                public function update_bulk_status($newstatus)
        {
            $connecteduser = $this->ion_auth->get_user_id();
            $updatedid ="";
            $chkParamId = $this->input->post('chkID');
            if ($newstatus > 0){
            foreach ($chkParamId as $id) {
            
            
            $logdata = array(
              'order_id' => $id ,
              'new_status' => $newstatus,
              'change_by' => $connecteduser
                );

               $this->db->insert('dc0_status_change', $logdata); 
                
                $this->orders_m->save(array('order_status' => $newstatus), $id);
               $updatedid  .=$id." " ;
            } 
            
              echo "Order Id's Updated: ".$updatedid;
            }
        }


        
        public function pending()
        {
            $chkParamId = $this->input->post('chkID');

            foreach ($chkParamId as $id) {

                $this->orders_m->save(array('order_status' => 2), $id);
                echo 1;
            }  
        }

        public function confirmed()
        {
            $chkParamId = $this->input->post('chkID');

            foreach ($chkParamId as $id) {

                $this->orders_m->save(array('order_status' => 3), $id);
                echo 1;
            }  
        }


        public function shipped()
        {
            $chkParamId = $this->input->post('chkID');

            foreach ($chkParamId as $id) {

                $this->orders_m->save(array('order_status' => 10), $id);
                echo 1;
            }  
        }

        public function delivered()
        {
            $chkParamId = $this->input->post('chkID');

            foreach ($chkParamId as $id) {

                $this->orders_m->save(array('order_status' => 5), $id);
                echo 1;
            }  
        }



        public function not_answer()
        {
            $chkParamId = $this->input->post('chkID');

            foreach ($chkParamId as $id) {

                $this->orders_m->save(array('order_status' => 6), $id);
                echo 1;
            }  
        }


        public function reviewed()
        {
            $chkParamId = $this->input->post('chkID');

            foreach ($chkParamId as $id) {

                $this->orders_m->save(array('order_status' => 7), $id);
                echo 1;
            }  
        }


        public function cancel()
        {
            $chkParamId = $this->input->post('chkID');

            foreach ($chkParamId as $id) {

                $this->orders_m->save(array('order_status' => 8), $id);
                echo 1;
            }  
        }


        public function returning()
        {
            $chkParamId = $this->input->post('chkID');

            foreach ($chkParamId as $id) {

                $this->orders_m->save(array('order_status' => 9), $id);
                echo 1;
            }  
            
        }


        public function excel_import()
        {
            $this->load->library('upload');

            print_r($_FILES['excel_order']);


            if(isset($_FILES['excel_order'])){
                if($_FILES['excel_order']['error'] == 0)
                {
                    $config1['upload_path'] = './uploads/excel_data/';
                    $config1['allowed_types'] = 'xl|xls|xlsx|application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
                    //$config1['max_size'] = '30000';
                    $config1['overwrite'] = TRUE;
                    //$extension1 = pathinfo($_FILES['excel_order']['name'], PATHINFO_EXTENSION);
                    //$fileName1 =  "excel_order." . $extension1;

                    $config1['file_name'] = $_FILES['excel_order']['name'];


                    $this->upload->initialize($config1);
                    $this->upload->do_upload('excel_order');
                    print_r($this->upload->display_errors());


                    if ($this->upload->do_upload('excel_order')) {
                        print_r($this->upload->data());
                        //$options['excel_order'] = $fileName1;
                    }
            }}

            /*$config['detect_mime'] = true;
            $config['upload_path'] = './uploads/excel_data/';
            $this->load->library('upload', $config);
            $allowedExts = array("xl","xls","xlsx");
            $temp = explode(".",$_FILES["excel_order"]["name"]);
            $extension = end($temp);

            if(($_FILES["excel_order"]["type"]=="file/xls")&&in_array($extension,$allowedExts)){
            print_r($FILES["excel_order"]["error"]);
            if($FILES["excel_order"]["error"]>0){
            $data['msg'] = $this->upload->display_errors();
            $data['sign'] = 'error_box';
            print_r($data);
            //$this->session->set_userdata($data);
            //redirect('attendance/add_attendance');;
            }
            else{
            echo "Uploaded.";
            }
            }
            else{
            $data['msg'] = "Invalid file type.Try to upload a valid file.";
            $data['sign'] = 'error_box...';
            print_r($data);
            print_r($FILES["excel_order"]["error"]);
            //$this->session->set_userdata($data);
            //redirect('attendance/add_attendance');
            }
            */


            /*$this->load->library('excel');

            $objPHPExcel = PHPExcel_IOFactory::load($file);

            //get only the Cell Collection
            $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

            //extract to a PHP readable array format

            foreach ($cell_collection as $cell) {

            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();

            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();

            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

            //header will/should be in row 1 only. of course this can be modified to suit your need.
            if ($row == 1) {
            $header[$row][$column] = $data_value;
            } else {
            $arr_data[$row][$column] = $data_value;
            }

            }

            //send the data in an array format

            $data['header'] = $header;
            $data['values'] = $arr_data;

            print_r($data['values']);
            exit();*/

        }

        public function update_order_item_quantity()
        {
            $id = $this->input->post('id');
            $dlimit = $this->input->post('dlimit');
            $qty = $this->input->post('qty');
            if ($qty > $dlimit) {
                echo 0;
            } else {

                $get_order_item = $this->order_item_m->get($id);
                $per_item_price = $get_order_item->total_price / $get_order_item->qty; 

                $Price = ($qty*$per_item_price);
                $updated_order_item = array('qty' => $qty,'total_price'	=> $Price);

                $this->order_item_m->save($updated_order_item, $id);

                $order_total_sum = get_order_item_sum($this->input->post('order_id'));

                $updated_order_amount = array('total_amount' => $order_total_sum);
                $this->orders_m->save($updated_order_amount, $this->input->post('order_id'));
                echo $Price;

            }

        }
        public function update_order_total_ajax($id)
        {
            echo update_order_total_admin($id);
        }
        public function order_item_delete_admin($id)
        {
            $order_id = $this->input->post('order_id');
            $GetOrder = $this->orders_m->get($order_id);
            $GetOrder_item = $this->order_item_m->get($id);
            // $cart_total_sum = get_cart_item_sum($Getcart[0]->id);
            $new_total = $GetOrder->total_amount-$GetOrder_item->total_price;
            $updated_order_price = array(
                'total_amount' => $new_total
            );
            $this->orders_m->save($updated_order_price, $order_id);
            $deleted = $this->order_item_m->delete($id);
            echo 1;


        }
        public function apply_coupon()
        {
            echo apply_coupon_code_admin();
        }

        public function apply_discount()
        {
            // print_r($this->input->post());/

            $getOrder = $this->orders_m->get($this->input->post('order_id'));
            if (!empty($getOrder)) {
                $discount = $this->input->post('discount');
                $discount_type = $this->input->post('discount_type');
                if ($discount_type == 'P') {
                    $percent = $getOrder->total_amount/100;
                    $discount_convert = ceil($percent*$discount);
                    $discount_amount = $discount_convert;
                } else if ($discount_type == 'R') {
                    $discount_amount = $discount;
                } else { $discount_amount = '0'; }
                $new_total = $getOrder->total_amount-$discount_amount;
                $updated_order = array('discount' => $discount_amount, 'total_amount' => $new_total);
                $used_coupon_insert = $this->orders_m->save($updated_order, $this->input->post('order_id'));
                echo 1;
            }



        }

        public function add_item_in_admin($order_id)
        {
            date_default_timezone_set('UTC');
            $date = new DateTime('now', new DateTimeZone('Asia/Karachi'));

            // This is Front Option which user enters

            // $order_id = $this->input->post('order_id');
            $deal_limit = $this->input->post('dlimit');
            $deal_id = $this->input->post('id');
            $qty = $this->input->post('qty');
            $deal_options = $this->input->post('pdata');
            $p_diffrence = $this->input->post('diffrence');
            $option_price = $this->input->post('pri');
            $item_comment = $this->input->post('item_comment');

            $getOrder = $this->orders_m->get($order_id);
            // Check user logged in or not
            $user_id = $getOrder->user_id;
            if($user_id == null) $user_id = 0;
            $output = 0;
            if(!empty($getOrder))
            {
                $deal = $this->deal_m->get($deal_id);

                $Doption = $deal_options;

                if(!empty($Doption))
                {
                    $Doption = json_encode($deal_options);

                    $option_total;

                    if($p_diffrence == 'add')
                    {
                        $option_total = $deal->discounted_price + $option_price;
                    }
                    else if($p_diffrence == 'minus')
                    {
                        $option_total = $deal->discounted_price - $option_price;
                    }
                    elseif($p_diffrence == '0')
                    {
                        $option_total = $deal->discounted_price;
                    }

                    $total = ($qty*$option_total);
                }
                else
                {
                    $Doption = '';

                    $total = ($qty*$deal->discounted_price);
                }


                $items_array = array(
                    'order_id' 			=> $order_id,
                    'cart_id'			=> $getOrder->cart_id,
                    'deal_id'			=> $deal_id,
                    'deal_title'		=> $deal->title,
                    'deal_code'			=> $deal->deal_code,
                    'deal_option'		=> $Doption,
                    'qty'				=> $qty,
                    'unit_price'		=> $deal->discounted_price,
                    'price_diffrence'	=> $p_diffrence,
                    'price'				=> $option_price,
                    'total_price'		=> $total,
                    'item_comment' 		=> $item_comment,
                    'created_at' 		=> $date->format('Y-m-d H:i:sP')
                );

                $item_insert = $this->order_item_m->save($items_array);
                if ($item_insert > 0) {
                    $order_total = $getOrder->total_amount + $total;
                    $data = array( 'total_amount' => $order_total);
                    $this->orders_m->save($data, $order_id);
                    echo $item_insert;
                }

            }
        }

        public function update_order_detail_ajax()
        {
            $name = $this->input->post('name');
            $value = $this->input->post('value');
            //print_r($this->input->post());
            $new = array($name => $value);	
            $this->orders_m->save($new, $this->input->post('pk'));      
        }


        public function push_sms($id)
        {

            $data['records'] =0;  

            if(isset($_REQUEST['submit'])){
                $general_setting = $this->option_m->option_array('gs_');
                $orderdetails = $this->orders_m->get_by(array('id'=>$id));
                $orderdetails=$orderdetails[0];
                $custel = '92'.ltrim(preg_replace('/\D+/', '', $orderdetails->phone),0);            

                $message=$_REQUEST['message'];


                $smsmessage = $orderdetails->user_name." ".$message;
                $sms_result = send_sms($id,$smsmessage,$custel);
                $this->smsorderlog_m->save_sms_result($sms_result,$id,$smsmessage,$custel,$status,$connecteduser);            


                $smsresult =$sms_result->QuickSMSResult; 
                $data=array(
                    'result'=> "sms by Admin",
                    'orderid'=>$id,
                    'message'=>$message,
                    'destination'=>$custel,
                    'nature'=>"SMS by Admin",
                    'created_by'=>1
                );
                $this->db->insert("dc0_smsorderlog", $data);
            }

            $sql = "SELECT * FROM dc0_smsorderlog WHERE orderid=$id";
            $query = $this->db->query($sql);
            $data['records'] = $query->result_array();

            $data['mainContent'] = 'admin/order/push_sms';
            $this->load->view('admin/layout/master', $data);

        }  




        public function search_customer()


        {
            //$getDeal = $this->deal_m->get_by(['deal_status' => 1, 'DATE_FORMAT(o.created_at, "%y-%m-%d") >' => CURRENT_DATE()]);
            $search_q = $this->input->post('search_val');
            // $sql = "select * from active_deals a  where a.id like '%".$search_q."%.' or  upper(a.title) like '%".strtoupper($search_q)."%' order by title DESC";
            $sql = "SELECT id, user_name AS customer_name, city_id, email, phone, ship_address AS address, created_at FROM dc0_orders  where user_name  like '%".strtoupper($search_q)."%' or email like '%".strtoupper($search_q)."%' or returnNumericOnly(phone) like '%".strtoupper($search_q)."%'  ORDER BY created_at  " ;


            //$sql = "SELECT * FROM active_deals where id =15 ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0)
            {
                $getCustomers= $query->result_array();

                $data="";
                foreach ($getCustomers as $customers) {
                    //  $data .= '<option value="'.$deals->id.'">'.substr($deals->title, 0, 120).'</option>';
                    $data .= '<option value="'.$customers['id'].'">'.substr($customers['customer_name'], 0, 120).'--'.$customers['phone'].'--'.$customers['email'].'--'.$customers['address'].'</option>';
                }
            }
            else 
            {
                $data = "<option value=''>No Records Found</option>";
            }
            echo $data;
        }


        public function get_customer_details_from_order()
        {

            $id = $this->input->post('user_id');
            // $this->db->order_by('city','ASC');
            $cities = $this->city_m->get_by(array('country_id' => '72'));
            // $this->db->order_by('city','ASC');
            $cities = $this->city_m->city_array();
            //$getUser = $this->user_m->get($id);
            //$order_single = $this->orders_m->get($id);
            $getUser =  $this->orders_m->get($id);


            if ($id){
                $data = '<div class="col-md-4"><div class="form-group"><label for="">Address</label> <textarea name="customer_ship_address" class="form-control" rows="1" required="required">'.$getUser->ship_address.'</textarea></div></div>';                                
                $data .= '<div class="col-md-4"><div class="form-group"><label for="">Name</label><input type="text" name="customer_name" class="form-control" required="required" title="" value="'.$getUser->user_name.'"></div></div>';
                $data .= '<div class="col-md-4"><div class="form-group"><label for="">Other Instructions</label><input type="text" name="remarks" class="form-control" required="required" title="" value="'.$getUser->remarks.'"></div></div>';
                $data .= '<div class="col-md-4"><div class="form-group"><label for="">Contact Number</label><input type="text" name="customer_contact" class="form-control" required="required" title="" value="'.$getUser->phone.'"></div></div><input type="hidden" name="customer_email" class="form-control" required="required" title="" value="'.$getUser->email.'"><input type="hidden" name="customer_city_id" class="form-control" required="required" title="" value="'.$getUser->city_id.'">';
                $data .= '<div class="col-md-4"><div class="form-group"><label for="">City</label><input type="text" name="customers_city_id" class="form-control"  title=""  value="'.$cities[$getUser->city_id].'"> </div></div>';
                echo $data;
            }



        }



    }
    /* End of file Order.php */
    /* Location: ./application/controllers/Order.php */