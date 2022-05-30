<?php 
/*
	=================
	  AJAX FUNCTION
	=================
*/

/* +++++ Front-End +++++ */

//pengguna pendaftaran akaun form
add_action('wp_ajax_nopriv_stk_save_pengguna_akaun_form', 'stk_save_pengguna');  	//for every user
add_action('wp_ajax_stk_save_pengguna_akaun_form', 'stk_save_pengguna');			//for log-in user only




//user contact form
function stk_save_pengguna(){
	
	$panggilan_select = wp_strip_all_tags(get_option('panggilan_select'));
	$nama_sendiri_text = wp_strip_all_tags($_POST["nama_sendiri_text"]);
	$email_text = wp_strip_all_tags($_POST["email_text"]);
    $phone_text = wp_strip_all_tags($_POST["phone_text"]);	
	$pass_text = wp_strip_all_tags($_POST["pass_text"]);
	$repassword_text = wp_strip_all_tags($_POST["repassword_text"]);
	//$radio_admin = wp_strip_all_tags(get_option('yes_admin')); 
	
	$args = array (
		'post_title'	=>	$Fname,
		//'post_content'  =>	$message,
		'post_author'	=>	1,
		'post_status'	=>	'publish',
		'post_type'	    =>	'daftar-stk',
		'meta_input'	=>	array(
							'panggilan_select'   => $panggilan_select,
							'nama_sendiri_text'  => $nama_sendiri_text,
							'email_text'         => $email_text,
                            'phone_text'         => $phone_text,
                            'pass_text'          => $pass_text,
							'repassword_text'    => $repassword_text,
                            //'yes_admin'    	=> $radio_admin,
                            )
	);
	
	$postID = wp_insert_post($args);
	
	// if($postID !== 0){
	
	// 	$to = $emailAdd;
	// 	$subject = $companyName.' Contact Form -'.$name;
	// 	$message = $autoMsg.'<br><hr><p>'.$message.'</p>';
		
	// 	$headers[] = 'From:'.$companyName.'<'.$to.'>';
	// 	$headers[] = 'Reply-To:'.$name.'<'.$email.'>';
	// 	$headers[] = 'Content-Type: text/html: charset=UTF-8';
	
	// 	wp_mail($to, $subject, $message, $headers);
		
	// 	echo $postID;
		
	// }else{
	// 	echo 0;
	// }
	
	die();
}