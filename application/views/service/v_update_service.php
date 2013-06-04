<br/>
    <br/>
        <br/>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap-datetimepicker.min.css'); ?>"/>
<script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap-datetimepicker.min.js');?>"></script>
<script type="text/javascript">
    
    $(function() {
        $('#datetimepicker4').datetimepicker({
            pickTime: false
        });

        $('#datetimepicker1').datetimepicker({
            pickTime: false
        });

        $('#datetimepicker2').datetimepicker({
            pickTime: false
        });

        $('#datetimepicker3').datetimepicker({
            pickTime: false
        });

        $('#datetimepicker5').datetimepicker({
            pickTime: false
        });
    });
       
</script>

<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/service2/update" method="POST">
    <?php foreach ($service as $src): ?>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $("#kode_garansi1").val('<?php echo $src->status_barang ?>');
            $("#status_perbaikan1").val('<?php echo $src->status_perbaikan; ?>');
            $("#status_barang").val('<?php echo $src->status_barang; ?>');
            $("#merek").val('<?php echo $src->merek; ?>');
            $("#id_user").hide();
            $("#status_barang").change(function(){
                if ($(this).val() === "GARANSI"){
                    $("#kode_garansi1").val('<?php echo $src->status_barang ?>');
                    $("#kode_garansi").show();
                }else if ($(this).val() === "NON GARANSI"){
                    $("#kode_garansi1").val('NON GARANSI');
                    $("#kode_garansi").hide();
                }    
            });

            if ($("#status_barang").val() === "GARANSI"){
                    $("#kode_garansi1").val('<?php echo $src->status_barang ?>');
                    $("#kode_garansi").show();
                }else if ($("#status_barang").val() === "NON GARANSI"){
                    $("#kode_garansi1").val('NON GARANSI');
                    $("#kode_garansi").hide();
                }   
        });
    
    </script>
    
    <div class="control-group" id="id_user">
        <label class="control-label" for="id_user">ID User :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="id_user" name="id_user"  value="<?php echo $src->id_user; ?>">
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="ttl">NOMOR TERIMA REPARASI (TTR) :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="ttr" name="ttr" placeholder="NOMOR TERIMA REPARASI" value="<?php echo $src->ttr; ?>" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="tanggal_masuk">TANGGAL MASUK :</label>
        <div class="controls">
            <div id="datetimepicker4" class="input-append">
                <input data-format="yyyy-MM-dd" type="text" name="tanggal_masuk" id="tanggal_masuk" value="<?php echo $src->tanggal_masuk; ?>"></input>
                <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                    </i>
                </span>
            </div>
        </div>    
    </div>

    <div class="control-group">
        <label class="control-label" for="nama_konsumen">NAMA KONSUMEN :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="nama_konsumen" name="nama_konsumen" value="<?php echo $src->nama_konsumen; ?>">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="merek">MEREK PRODUK :</label>
        <div class="controls">
            <select name="merek" size="1" class="input-xlarge" id="merek">
                <option values="SONY">SONY</option>
                <option values="SAMSUNG">SAMSUNG</option>
                <option values="NIKON">NIKON</option>
                <option values="CONON">CANON</option>
            </select>

        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="model">MODEL :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="model" name="model" value="<?php echo $src->model; ?>">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="serial_number">SERIAL NUMBER :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="serial_number" name="serial_number" value="<?php echo $src->serial_number; ?>">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="status_barang">STATUS BARANG :</label>
        <div class="controls">
            <select name="status_barang" size="1" class="input-xlarge" id="status_barang">
                <?php 
                    //if ($src->status_barang == "NON GARANSI"){
                      //  $selected = "selected";
                    //}else{
                      // $selected = ""; 
                   // }
                    
                ?>
                <option values="garansi" <?php //echo $selected; ?>>GARANSI</option>
                <option values="non garansi" <?php //echo $selected; ?>>NON GARANSI</option>
            </select>
        </div>
    </div>

     <div class="control-group" id="kode_garansi">
        <label class="control-label" for="kode_garansi" >KODE GARANSI :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="kode_garansi1" name="kode_garansi" value="<?php echo $src->status_barang ?>">
        </div>
    </div>
    
     <div class="control-group">
        <label class="control-label" for="status_perbaikan">STATUS PERBAIKAN :</label>
        <div class="controls">
            <select name="status_perbaikan" size="1" class="input-xlarge" id="status_perbaikan1">
               <option values="BARU DITERIMA">BARU DITERIMA</option>
                <option values="DALAM PENGECEKAN">DALAM PENGECEKAN</option>
                <option values="TUNGGU ESTIMASI">TUNGGU ESTIMASI</option>
                <option values="SELESAI">SELESAI</option>
                <option values="CANCEL">CANCEL</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="tgl_masuk">TANGGAL ESTIMASI :</label>
        <div class="controls">
            <div id="datetimepicker5" class="input-append">
                <input data-format="yyyy-MM-dd" type="text" name="tanggal_estimasi" id="tanggal_estimasi" placeholder="Tanggal Estimasi" value="<?php echo $src->tanggal_estimasi; ?>"></input>
                <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                    </i>
                </span>
            </div>
        </div>    
    </div>

    <div class="control-group">
        <label class="control-label" for="tgl_masuk">TANGGAL SETUJU :</label>
        <div class="controls">
            <div id="datetimepicker1" class="input-append">
                <input data-format="yyyy-MM-dd" type="text" name="tanggal_setuju" id="tanggal_setuju" placeholder="Tanggal Setuju" value="<?php echo $src->tanggal_setuju; ?>"></input>
                <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                    </i>
                </span>
            </div>
        </div>    
    </div>

    <div class="control-group">
        <label class="control-label" for="tgl_masuk">TANGGAL SELESAI :</label>
        <div class="controls">
            <div id="datetimepicker2" class="input-append">
                <input data-format="yyyy-MM-dd" type="text" name="tanggal_selesai" id="tanggal_selesai" placeholder="Tanggal Selesai" value="<?php echo $src->tanggal_selesai; ?>"></input>
                <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                    </i>
                </span>
            </div>
        </div>    
    </div>

    <div class="control-group">
        <label class="control-label" for="tgl_masuk">TANGGAL AMBIL :</label>
        <div class="controls">
            <div id="datetimepicker3" class="input-append">
                <input data-format="yyyy-MM-dd" type="text" name="tanggal_ambil" id="tanggal_ambil" placeholder="Tanggal Ambil" value="<?php echo $src->tanggal_ambil; ?>"></input>
                <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                    </i>
                </span>
            </div>
        </div>    
    </div>

    <div class="control-group">
        <label class="control-label" for="teknisi">TEKNISI :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="teknisi" name="teknisi" placeholder="Teknisi" value="<?php echo $src->teknisi; ?>">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="kelengkapan">KELENGKAPAN :</label>
        <div class="controls">
            <textarea name="kelengkapan" id="kelengkapan" rows=5 cols=40 class="input-xlarge"><?php echo $src->kelengkapan; ?></textarea>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <button class="btn btn-info"><i class="icon-white icon-check"></i> Simpan</button>
            <button class="btn btn-success" type="button"><i class="icon-remove-circle"></i> CANCEL</button>
        </div>
    </div>
</form>

<?php endforeach; ?>