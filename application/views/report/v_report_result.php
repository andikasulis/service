        <link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap-responsive.css'); ?>"/>
        <script type="text/javascript" src="<?php echo base_url('bootstrap/js/jquery.js');?>"></script>
        
        <!-- Mengincludekan JQueryUI CSS. Rename nama sunny dan sesuaikan Folder yg ada di dalam Folder CSS -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>css/sunny/jquery-ui-1.8.16.custom.css" />
        <!-- Mengincludekan CSS Jqgrid -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>css/ui.jqgrid.css" />
        <script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.js') ?>"></script>
        <!--<style>
        html, body {
            margin: 0;
            padding: 0;
            font-size: 75%;
        }
        </style>-->
        
        <!-- Mengincludekan Library Jquery -->
        <script src="<?php echo base_url() ?>js/jquery-1.8.3.js" type="text/javascript"></script>
        <!-- Mengincludekan Locale untuk JQGrid -->
        <script src="<?php echo base_url() ?>js/i18n/grid.locale-en.js" type="text/javascript"></script>
        <!-- Mengincludekan Library untuk JQGrid -->
        <script src="<?php echo base_url() ?>js/jquery.jqGrid.min.js" type="text/javascript"></script>
        <style type="text/css">
            

            .result {
                max-width: 1400px;
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
                <div class="result">
                    <h1 algin="center">Golden Service</h1>
                    <h2 class="form-signin-heading">Hasil Report</h2></br>
                    <table class="table table-bordered" border="0">
                        <tr class="success">
                            <td>Kode Tanda Terima Servis (TTR)</td>
                            <td>Nama User</td>
                            <td>Nama Konsumen</td>
                            <td>Merek</td>
                            <td>Model</td>
                            <td>Serial Number</td>
                            <td>Tanggal Masuk</td>
                            <td>Status Barang</td>
                            <td>Status Perbaikan</td>
                            <td>Tanggal Estimasi Selesai</td>
                            <td>Teknisi</td>
                            <td>Kelengkapan</td>
                        </tr>
                        <?php foreach ($result as $rsl): ?>
                            <tr>
                                <td><?php echo $rsl->ttr; ?></td>
                                <td><?php echo $rsl->nama_user; ?></td>
                                <td><?php echo $rsl->nama_konsumen; ?></td>
                                <td><?php echo $rsl->merek; ?></td>
                                <td><?php echo $rsl->model; ?></td>
                                <td><?php echo $rsl->serial_number; ?></td>
                                <td><?php echo $rsl->tanggal_masuk; ?></td>
                                <td><?php echo $rsl->status_barang; ?></td>
                                <td><?php echo $rsl->status_perbaikan; ?></td>
                                <td><?php echo $rsl->tgl_estimasi_selesai; ?></td>
                                <td><?php echo $rsl->teknisi; ?></td>
                                <td><?php echo $rsl->kelengkapan; ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </table> 
                    <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $date = strftime( "%A, %d %B %Y %H:%M", time());
                    ?>  
                    <p class="text-info">Digenerate pada  <?php echo $date ?></p>
                </br>
                    <a href="javascript:window.print()" class="btn btn-success" type="button"><i class="icon-remove-circle" ></i> Print </a>   
                </div>
