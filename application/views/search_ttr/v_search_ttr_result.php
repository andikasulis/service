        <style type="text/css">
            

            .result {
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
            
        </style>
            </br>
            </br>
            <?php foreach ($result as $rsl): ?>
                <div class="result">
                    <h2 class="form-signin-heading">Hasil pencarian</h2></br>
                    <table class="table table-bordered">
                        <tr class="success">
                            <td>Kode Tanda Terima Servis (TTR)</td>
                            <td>Status Perbaikan</td>
                        </tr>
                        <tr>
                            <td><?php echo $rsl->ttr; ?></td>
                            <td><?php echo $rsl->status_perbaikan; ?></td>
                        </tr>
                    </table>   
                    <p class="text-info">Terima kasih telah menggunakan web servis Golden Camera</p>
                    <p class="text-info">Apabila terjadi kesalahan data mohon konfirmasi ulang ke Golden Camera</p>
                    <p class="text-info"><a href="<?php echo base_url()?>">Kembali ke halaman utama </a></p>    
                </div>
            <?php endforeach; ?>
