        <style type="text/css">
            

            .form-signin {
                max-width: 600px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                   -moz-border-radius: 5px;
                        border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                   -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                        box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin input[type="text"],
            .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }
        </style>
            </br>
            </br>
            <form class="form-signin" action="<?php echo base_url(); ?>index.php/search_ttr/result" method="POST">
                <p class="text-info">Selamat datang di Halaman Informasi Servis Golden Camera</p>
                <p class="text-info">Silahkan masukkan Kode Tanda Terima Servis (TTR) untuk mencari barang servisan anda.</p>
                <input type="text" class="input-block-level" placeholder="Kode Tanda Terima Service (TTR)" name="kode_ttr">
                <button class="btn btn-large btn-primary" type="submit">Search</button>
            </form>
