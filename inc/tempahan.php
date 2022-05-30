<?php

/************************/
/* CPT BORANG TEMPAHAN */
/**********************/

function tempahan_borang_custom_post_type() {
	add_theme_support( 'post-thumbnails', array( 'post', 'borang-stk' ) );

	$labels = array(
		'name'                  => _x( 'Tempahan', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Tempahan', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Tempahan', 'text_domain' ),
		'name_admin_bar'        => __( 'Tempahan', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Senarai Tempahan', 'text_domain' ),
		'add_new_item'          => __( 'Tambah Tempahan', 'text_domain' ),
		'add_new'               => __( 'Tambah Tempahan', 'text_domain' ),
		'new_item'              => __( 'Tempahan Baharu', 'text_domain' ),
		'edit_item'             => __( 'Ubah Tempahan', 'text_domain' ),
		'update_item'           => __( 'Kemaskini Tempahan', 'text_domain' ),
		'view_item'             => __( 'Lihat Tempahan', 'text_domain' ),
		'view_items'            => __( 'Lihat Tempahan', 'text_domain' ),
		'search_items'          => __( 'Cari Tempahan', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),

	);
	$args = array(
		'label'                 => __( 'Tempahan', 'text_domain' ),
		'description'           => __( 'Senarai Tempahan ', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		//'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
    'menu_icon'             => 'dashicons-forms',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'borang-stk', $args );

}
add_action( 'init', 'tempahan_borang_custom_post_type', 0 );


/********************/
/* 		META BOXES 		*/
/*******************/

add_action( 'add_meta_boxes', 'stk_meta_box_add' );
function stk_meta_box_add()
{
		//Section A - Maklumat Pelanggan//
    add_meta_box( 'section_a', 'Maklumat Pelanggan', 'stk_metabox_sa', 'borang-stk', 'normal', 'default' );

		//Section B - Maklumat Kawasan Pembersihan//
    add_meta_box( 'section_b', 'Maklumat Kawasan Pembersihan', 'stk_metabox_sb', 'borang-stk', 'normal', 'default' );

		//Section C - Pengiraan Kos (Anggaran)//
    add_meta_box( 'section_c', 'Anggaran Pengiraan Kos', 'stk_metabox_sc', 'borang-stk', 'normal', 'default' );

		//Section D - Keputusan Tempahan//
	add_meta_box( 'section_e', 'Keputusan Tempahan', 'stk_metabox_se', 'borang-stk', 'normal', 'default' );
}


///////////////////////////////////
// Section A - Maklumat Pelanggan  //
//////////////////////////////////
function section_a($post) {
	echo 'Section A';
}

function stk_metabox_sa($post)
{
	// We'll use this nonce field later on when saving.
	wp_nonce_field( 'stk_metabox_nonce', 'stk_nonce' );
	
	$panggilan= get_post_meta( $post->ID, 'panggilan_select', true );
	$namapelanggan = get_post_meta( $post->ID, 'nama_pelanggan_text', true );
	$alamat_rumah = get_post_meta( $post->ID, 'alamat_rumah_text', true );
	$postcode = get_post_meta( $post->ID, 'postcode_text', true );
	$phone = get_post_meta( $post->ID, 'phone_text', true );
	$email = get_post_meta( $post->ID, 'email_text', true );
	?>
	<p>
		<label for="panggilan_select">Panggilan</label>
		<select name="panggilan_select" id="panggilan_select">
			<option value="none" selected disabled hidden>Nyatakan Panggilan</option>
            <option value="tuan" <?php selected( $bahagian, 'tuan' ); ?>>Tuan</option>
            <option value="puan" <?php selected( $bahagian, 'puan' ); ?>>Puan</option>
			<option value="cik" <?php selected( $bahagian, 'cik' ); ?>>Cik</option>
        </select>
	</p>
	<p>
			<label for="nama_text">Nama Penuh</label>
			<input type="text" name="nama_pelanggan_text" id="nama_pelanggan_text" value="<?php echo esc_attr($namapelanggan); ?>" placeholder="Nama Pelanggan" />
	</p>
	<p>
			<label for="alamat_rumah_text">Alamat Rumah</label>
			<br>
			<textarea id="alamat_rumah_text" name="alamat_rumah_text" rows="10" cols="70"><?php echo esc_attr($alamat_rumah); ?></textarea>
	</p>
	<p>
			<label for="postcode_text">Postcode</label>
			<input type="text" name="postcode_text" id="postcode_text" value="<?php echo esc_attr($postcode); ?>" />
	</p>
	<p>
			<label for="phone_text">No. Telefon</label>
			<input type="text" name="phone_text" id="phone_text" value="<?php echo esc_attr($phone); ?>" />
			<label for="email_text">Emel</label>
			<input type="email" name="email_text" id="email_text" value="<?php echo esc_attr($email); ?>" placeholder="Emel Rasmi" />
	</p>
<?php        
}


//////////////////////////////////////////////////////
//Section B - Maklumat Kawasan Pembersihan  //
////////////////////////////////////////////////////
function section_b($post) {
	echo 'Section B';
}

function stk_metabox_sb($post)
{

	// We'll use this nonce field later on when saving.
	wp_nonce_field( 'stk_metabox_nonce', 'stk_nonce' );

	$namapenumpang1 = get_post_meta( $post->ID, 'nama_penumpang1_text', true );
	$namapenumpang2 = get_post_meta( $post->ID, 'nama_penumpang2_text', true );
	$namapenumpang3 = get_post_meta( $post->ID, 'nama_penumpang3_text', true );
	$namapenumpang4 = get_post_meta( $post->ID, 'nama_penumpang4_text', true );

	?>
	<p>
			<label for="nama_text">Senarai Nama Pegawai yang menaiki kenderaan bersama semasa membuat permohonan:</label>
			<br>
			<input type="text" name="nama_penumpang1_text" id="nama_penumpang1_text" value="<?php echo esc_attr($namapenumpang1); ?>" placeholder="Penumpang Pertama"/>

			<input type="text" name="nama_penumpang2_text" id="nama_penumpang2_text" value="<?php echo esc_attr($namapenumpang2); ?>" placeholder="Penumpang Kedua"/>
			<br>
			<input type="text" name="nama_penumpang3_text" id="nama_penumpang3_text" value="<?php echo esc_attr($namapenumpang3); ?>" placeholder="Penumpang Ketiga"/>

			<input type="text" name="nama_penumpang4_text" id="nama_penumpang4_text" value="<?php echo esc_attr($namapenumpang4); ?>" placeholder="Penumpang Keempat"/>
	</p>
<?php        
}


/////////////////////////////////////
//Section C - Pengiraan Kos (Anggaran)  //
///////////////////////////////////
function section_d($post) {
	echo 'Section D';
} 

function stk_metabox_sd($post)
{
	// We'll use this nonce field later on when saving.
	wp_nonce_field( 'stk_metabox_nonce', 'stk_nonce' );

	$ambil = get_post_meta( $post->ID, 'ambil_radio', true );
	$alamat_rumah = get_post_meta( $post->ID, 'alamat_rumah_text', true );
	$tarikh_ambil = get_post_meta( $post->ID, 'tarikh_ambil_text', true );
	$masa_ambil = get_post_meta( $post->ID, 'masa_ambil_text', true );
	$hantar = get_post_meta( $post->ID, 'hantar_radio', true );
	$tarikh_hantar = get_post_meta( $post->ID, 'tarikh_hantar_text', true );
	$masa_hantar = get_post_meta( $post->ID, 'masa_hantar_text', true );

?>
	<p>
			<label for="ambil_radio">Alamat Tempat Mengambil :</label>
			<input type="radio" name="ambil_radio" value="Pejabat" <?php echo ($ambil == 'Pejabat')? 'checked="checked"':''; ?>/>Pejabat
			<input type="radio" name="ambil_radio" value="Rumah" <?php echo ($ambil == 'Rumah')? 'checked="checked"':''; ?>/>Rumah
	</p>
	<p>
			<label for="alamat_rumah_text">Alamat Rumah</label>
			<br>
			<textarea id="alamat_rumah_text" name="alamat_rumah_text" rows="10" cols="70"><?php echo esc_attr($alamat_rumah); ?></textarea>
	</p>
	<p>
			<label for="tarikh_ambil_text">Tarikh</label>
			<input type="date" name="tarikh_ambil_text" id="tarikh_ambil_text" value="<?php echo esc_attr($tarikh_ambil); ?>" />
			<label for="masa_ambil_text">Masa</label>
			<input type="text" name="masa_ambil_text" id="masa_ambil_text" value="<?php echo esc_attr($masa_ambil); ?>" />
	</p>
	<p>
			<label for="hantar_radio">Alamat Tempat Menghantar setelah selesai aktiviti / tugas :</label>
			<input type="radio" name="hantar_radio" value="Pejabat" <?php echo ($hantar == 'Pejabat')? 'checked="checked"':''; ?>/>Pejabat
			<input type="radio" name="hantar_radio" value="Rumah" <?php echo ($hantar == 'Rumah')? 'checked="checked"':''; ?>/>Rumah
	</p>
	<p>
			<label for="tarikh_hantar_text">Tarikh</label>
			<input type="date" name="tarikh_hantar_text" id="tarikh_hantar_text" value="<?php echo esc_attr($tarikh_hantar); ?>" />
			<label for="masa_hantar_text">Masa</label>
			<input type="text" name="masa_hantar_text" id="masa_hantar_text" value="<?php echo esc_attr($masa_hantar); ?>" />
	</p>
<?php        
}

/////////////////////////////////////
//Section D - Keputusan Tempahan  //
///////////////////////////////////
function section_e($post) {
	echo 'Section E';
}

function stk_metabox_se($post)
{
	// We'll use this nonce field later on when saving.
	wp_nonce_field( 'stk_metabox_nonce', 'stk_nonce' );

	$keputusan = get_post_meta( $post->ID, 'keputusan_radio', true );
	$ulasan = get_post_meta( $post->ID, 'ulasan_text', true );
	$tarikh_keputusan = get_post_meta( $post->ID, 'tarikh_keputusan', true );
?>
	<p>
			<label for="keputusan_radio">Keputusan Permohonan :</label>
			<input type="radio" name="keputusan_radio" value="Lulus" <?php echo ($keputusan == 'Lulus')? 'checked="checked"':''; ?>/>Lulus
			<input type="radio" name="keputusan_radio" value="Tidak Lulus" <?php echo ($keputusan == 'Tidak Lulus')? 'checked="checked"':''; ?>/>Tidak Lulus
	</p>
	<p>
			<label for="ulasan_text">Ulasan</label>
			<br>
			<textarea id="ulasan_text" name="ulasan_text" rows="10" cols="70"><?php echo esc_attr($ulasan); ?></textarea>
	</p>
	<p>
			<label for="tarikh_keputusan">Tarikh Keputusan</label>
			<input type="date" name="tarikh_keputusan" id="tarikh_keputusan" value="<?php echo esc_attr($tarikh_keputusan); ?>" />
	</p>
<?php        
}


/********************/
/* 		SAVING DATA		*/
/*******************/

add_action( 'save_post', 'stk_metabox_save' );
function stk_metabox_save( $post_id )
{

	  // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
		if( !isset( $_POST['stk_nonce'] ) || !wp_verify_nonce( $_POST['stk_nonce'], 'stk_metabox_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
         

		///////////////////////
		// Saving Section A //
		/////////////////////

    // Make sure your data is set before trying to save it
    if( isset( $_POST['nama_sendiri_text'] ) ){
        update_post_meta( $post_id, 'nama_sendiri_text', $_POST['nama_sendiri_text'] );
		}
		if( isset( $_POST['nama_keluarga_text'] ) ){
			update_post_meta( $post_id, 'nama_keluarga_text', $_POST['nama_keluarga_text'] );
		}
		if( isset( $_POST['jawatan_text'] ) ){
			update_post_meta( $post_id, 'jawatan_text', $_POST['jawatan_text'] );
		}
		if( isset( $_POST['bahagian_select'] ) ){
			update_post_meta( $post_id, 'bahagian_select', $_POST['bahagian_select'] );
		}
		if( isset( $_POST['phone_text'] ) ){
			update_post_meta( $post_id, 'phone_text', $_POST['phone_text'] );
		}
		if( isset( $_POST['email_text'] ) ){
			update_post_meta( $post_id, 'email_text', $_POST['email_text'] );
		}

		///////////////////////
		// Saving Section B //
		/////////////////////

		if( isset( $_POST['nama_penumpang1_text'] ) ){
			update_post_meta( $post_id, 'nama_penumpang1_text', $_POST['nama_penumpang1_text'] );
		}
		if( isset( $_POST['nama_penumpang2_text'] ) ){
			update_post_meta( $post_id, 'nama_penumpang2_text', $_POST['nama_penumpang2_text'] );
		}
		if( isset( $_POST['nama_penumpang3_text'] ) ){
			update_post_meta( $post_id, 'nama_penumpang3_text', $_POST['nama_penumpang3_text'] );
		}
		if( isset( $_POST['nama_penumpang4_text'] ) ){
			update_post_meta( $post_id, 'nama_penumpang4_text', $_POST['nama_penumpang4_text'] );
		}

		///////////////////////
		// Saving Section C //
		/////////////////////

		if( isset( $_POST['tujuan_text'] ) ){
			update_post_meta( $post_id, 'tujuan_text', $_POST['tujuan_text'] );
		}
		if( isset( $_POST['destinasi_text'] ) ){
			update_post_meta( $post_id, 'destinasi_text', $_POST['destinasi_text'] );
		}

		///////////////////////
		// Saving Section D //
		/////////////////////

		if( isset( $_POST['ambil_radio'] ) ){
			update_post_meta( $post_id, 'ambil_radio', $_POST['ambil_radio'] );
		}
		if( isset( $_POST['alamat_rumah_text'] ) ){
			update_post_meta( $post_id, 'alamat_rumah_text', $_POST['alamat_rumah_text'] );
		}
		if( isset( $_POST['tarikh_ambil_text'] ) ){
			update_post_meta( $post_id, 'tarikh_ambil_text', $_POST['tarikh_ambil_text'] );
		}
		if( isset( $_POST['masa_ambil_text'] ) ){
			update_post_meta( $post_id, 'masa_ambil_text', $_POST['masa_ambil_text'] );
		}
		if( isset( $_POST['hantar_radio'] ) ){
			update_post_meta( $post_id, 'hantar_radio', $_POST['hantar_radio'] );
		}
		if( isset( $_POST['tarikh_hantar_text'] ) ){
			update_post_meta( $post_id, 'tarikh_hantar_text', $_POST['tarikh_hantar_text'] );
		}
		if( isset( $_POST['masa_hantar_text'] ) ){
			update_post_meta( $post_id, 'masa_hantar_text', $_POST['masa_hantar_text'] );
		}

		///////////////////////
		// Saving Section E //
		/////////////////////

		if( isset( $_POST['keputusan_radio'] ) ){
			update_post_meta( $post_id, 'keputusan_radio', $_POST['keputusan_radio'] );
		}
		if( isset( $_POST['ulasan_text'] ) ){
			update_post_meta( $post_id, 'ulasan_text', $_POST['ulasan_text'] );
		}
		if( isset( $_POST['tarikh_keputusan'] ) ){
			update_post_meta( $post_id, 'tarikh_keputusan', $_POST['tarikh_keputusan'] );
		}

		// This is purely my personal preference for saving check-boxes
    // $chk = isset( $_POST['my_meta_box_check'] ) && $_POST['my_meta_box_select'] ? 'on' : 'off';
    // update_post_meta( $post_id, 'my_meta_box_check', $chk );
}


/********************/
/* DISPLAY COLUMNS	*/
/*******************/

// Add the custom columns to the borang-stk post type:
add_filter( 'manage_borang-stk_posts_columns', 'set_custom_edit_borang_columns' );
function set_custom_edit_borang_columns($columns) {
    unset( $columns['author'] );
    unset( $columns['date'] );
    $columns['nama_sendiri_text'] = __( 'Nama', 'your_text_domain' );
    $columns['phone_text'] = __( 'No.Telefon', 'your_text_domain' );
	$columns['tarikh_ambil_text'] = __( 'Tarikh Guna Kenderaan', 'your_text_domain' );

    return $columns;
}

// Add the data to the custom columns for the borang-stk post type:
add_action( 'manage_borang-stk_posts_custom_column' , 'custom_borang_column', 10, 2 );
function custom_borang_column( $column, $post_id ) {
    switch ( $column ) {

        case 'nama_sendiri_text' :
            echo get_post_meta( $post_id , 'nama_sendiri_text' , true );
            break;

        case 'phone_text' :
            echo get_post_meta( $post_id , 'phone_text' , true ); 
            break;

		case 'tarikh_ambil_text' :
			echo get_post_meta( $post_id , 'tarikh_ambil_text' , true ); 
			break;

    }
}
