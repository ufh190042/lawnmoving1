<form id="stkdaftarakauan" action="#" method="post" class="form" data-url="<?php echo admin_url('admin-ajax.php') ?>">
<div class="container">
        <div class="title">Pendaftaran Pelanggan</div>
 
        <div class="user-details">
            <div>
                <label class="select">Panggilan</label>
                <select name="panggilan_select" id="panggilan_select">
                    <option selected disabled>Nyatakan Panggilan</option>
                    <option value="tuan">Tuan</option>
                    <option value="puan">Puan</option>
                    <option value="cik">Cik</option>
                </select>
            </div>
            <div class="input-box">
                <span class="details">Nama</span>
                <input type="text" required placeholder="Nama Penuh" id="nama_sendiri_text">
            </div>
            <div class="input-box">
                <span class="details">Email</span>
                <input type="email" placeholder="Email" required id="email_text">
            </div>
            <div class="input-box">
                <span class="details">Nombor Handphone (Log In ID)</span>
                <input type="text" required placeholder="0121234567"id="phone_text">
            </div>
            <div class="input-box">
                <span class="details">Kata Laluan</span>
                <input type="password" placeholder="Masukkan Kata Laluan" required id="pass_text">
            </div>
            <div class="input-box">
                <span class="details">Adakah Anda Pasti?</span>
                <input type="password" placeholder="Ulang Kata Laluan" required id="repassword_text">
            </div>
        </div>
        <div >
            <!--Key in data pendaftar dan kembali ke login.html-->
            <input id="stk_pengguna_akaun_form" type="submit" value="Daftar" class="btn">
            
        </div>
        </form>
    </div>