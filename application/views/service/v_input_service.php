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
    });
    
    $(document).ready(function(){

            $("#id_user").hide();
            $("#status_barang").change(function(){
                if ($(this).val() === "GARANSI"){
                    $("#kode_garansi1").val('');
                    $("#kode_garansi").show();
                }else if ($(this).val() === "NON GARANSI"){
                    $("#kode_garansi1").val('NON GARANSI');
                    $("#kode_garansi").hide();
                }    
            });

            $("#ttr").change(function()
            {
                var ttr = $("#ttr").val();
                //$("#stts").html('Sedang mengcek kode TTR...');
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>index.php/service2/cek_ttr",
                    data: "ttr="+ ttr,
                    success: function(hasil){
                        $("#stts").ajaxComplete(function(event, request){

                            if(hasil === "yes")
                            {
                                $("#stts").html('<font color="blue"><b>Kode TTR Tersedia</b></font>');
                            }
                            else  if(hasil === 'no')
                            {
                                $("#stts").html('<font color="red"><b>Kode TTR tidak Tersedia</b></font>');
                            }
                       });
                    }
                });
                return false;
           });
     });

        
        
 
</script>

<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/service2/insert" method="POST">
    <div class="control-group" id="id_user">
        <label class="control-label" for="id_user">ID User :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="id_user" name="id_user"  value="<?php echo $this->session->userdata('id_user') ?>">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="tgl_masuk">TANGGAL MASUK :</label>
        <div class="controls">
            <div id="datetimepicker4" class="input-append">
                <input data-format="yyyy-MM-dd" type="text" name="tanggal_masuk" id="tanggal_masuk" placeholder="Tanggal Masuk"></input>
                <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                    </i>
                </span>
            </div>
        </div>    
    </div>

    <div class="control-group">
        <label class="control-label" for="ttl">NOMOR TERIMA REPARASI (TTR) :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="ttr" name="ttr" placeholder="NOMOR TERIMA REPARASI">
            <p id="stts" ></p>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="nama_pelanggan">NAMA KONSUMEN :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="nama_konsumen" name="nama_konsumen" placeholder="Nama Konsumen">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="merek">MEREK :</label>
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
            <input type="text" class="input-xlarge" id="model" name="model" placeholder="Model">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="serial_number">SERIAL NUMBER :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="serial_number" name="serial_number" placeholder="Serial Number">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="status_barang">STATUS BARANG :</label>
        <div class="controls">
            <select name="status_barang" size="1" class="input-xlarge" id="status_barang">
                <option values="GARANSI">GARANSI</option>
                <option values="NON GARANSI">NON GARANSI</option>
            </select>
        </div>
    </div>

     <div class="control-group" id="kode_garansi">
        <label class="control-label" for="kode_garansi" >KODE GARANSI :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="kode_garansi1" name="kode_garansi" placeholder="Kode Garansi">
        </div>
    </div>
    
     <div class="control-group">
        <label class="control-label" for="status_perbaikan">STATUS PERBAIKAN :</label>
        <div class="controls">
            <select name="status_perbaikan" size="1" class="input-xlarge" id="status_perbaikan">
                <option values="BARU DITERIMA">BARU DITERIMA</option>
                <option values="DALAM PENGECEKAN">DALAM PENGECEKAN</option>
                <option values="TUNGGU ESTIMASI">TUNGGU ESTIMASI</option>
                <option values="SELESAI">SELESAI</option>
                <option values="CANCEL">CANCEL</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="kelengkapan">KELENGKAPAN :</label>
        <div class="controls">
            <textarea name="kelengkapan" id="kelengkapan" rows=5 cols=40 class="input-xlarge" placeholder="Kelengkapan" ></textarea>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <button class="btn btn-info"><i class="icon-white icon-check"></i> Simpan</button>
            <button class="btn btn-success" type="button"><i class="icon-remove-circle"></i> CANCEL</button>
        </div>
    </div>

</form>