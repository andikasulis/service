<br/>
    <br/>
        <br/>

   

<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap-datetimepicker.min.css'); ?>"/>
<script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap-datetimepicker.min.js');?>"></script>
<script type="text/javascript">
    
    $(function() {
        $('#awal').datetimepicker({
            pickTime: false
        });

        $('#akhir').datetimepicker({
            pickTime: false
        });    
    });   
   
 
</script>

<form target="_blank" class="form-horizontal" action="<?php echo base_url(); ?>index.php/service2/resultreport" method="POST">
    
    <div class="control-group" id="awal">
        <label class="control-label" for="tgl_awal">TANGGAL AWAL :</label>
        <div class="controls">
            <div id="awal" class="input-append">
                <input data-format="yyyy-MM-dd" type="text" name="tgl_awal" id="tgl_awal" placeholder="Tanggal Awal" required></input>
                <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                    </i>
                </span>
            </div>
        </div>    
    </div>

    <div class="control-group" id="akhir">
        <label class="control-label" for="tgl_akhir">TANGGAL AKHIR :</label>
        <div class="controls">
            <div id="akhir" class="input-append">
                <input data-format="yyyy-MM-dd" type="text" name="tgl_akhir" id="tgl_akhir" placeholder="Tanggal Akhir" required></input>
                <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                    </i>
                </span>
            </div>
        </div>    
    </div>

    <div class="control-group" id="user">
        <label class="control-label" for="user">USER :</label>
        <div class="controls" id="user">
            <select name="user" size="1" class="input-xlarge" id="user1">
                    <option values="ALL" selected >ALL</option>
                <?php foreach ($user as $usr): ?>     
                    <option values="<?=$usr['id_user']?>"><?=$usr['nama_user']?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <button class="btn btn-info"><i class="icon-white icon-check" type="submit"></i> GENERATE</button>
            <button class="btn btn-success" type="button"><i class="icon-remove-circle"></i> CANCEL</button>
        </div>
    </div>

</form>