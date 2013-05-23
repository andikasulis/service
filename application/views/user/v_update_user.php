<br/>
    <br/>
        <br/>

   
<?php

    foreach ($user as $usr):
    $level = $usr->level; 
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap-datetimepicker.min.css'); ?>"/>
<script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap-datetimepicker.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<?php //foreach ($user2 as $usr): ?>
<script type="text/javascript">
    
    $(document).ready(function(){
    
        $("#id_user").hide();
        if(<?=$level?>=='1'){
            $("#level").val('ADMIN');    
        } else {
            $("#level").val('USER');
        }
        
        $("#user_name").change(function()
        {
            var username = $("#user_name").val();
            var hasil;
            $("#stts").html('Sedang mengcek User Name...');
            $.ajax({
                type: "POST",
                url: "<?=base_url()?>index.php/user/cek_username",
                data: "username="+ username,
                success: function(data){
                    $("#stts").ajaxComplete(function(event, request){
                        //document.write(data);
                        if(data==1)
                        {
                            $("#stts").html('<font color="blue"><b>Username Tersedia</b></font>');
                        }
                        else 
                        {
                            $("#stts").html('<font color="red"><b>Username Tidak Tersedia</b></font>');
                        }
                    });
               }

              });
            
          });
    });

    
        
 
</script>

<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/user/update" method="POST" id="frm-usr">

    <div class="control-group" id="id_user">
        <label class="control-label" for="id_user">ID USER :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="id_user" name="id_user" placeholder="ID USER"  value="<?php echo $usr->id_user; ?>">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="ttl">USER NAME :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="user_name" name="user_name" placeholder="USER NAME" required value="<?php echo $usr->user_name; ?>">
            <span id="stts"></span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="namauser">NAMA USER :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="namauser" name="namauser" placeholder="NAMA USER" required value="<?php echo $usr->nama_user; ?>">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="level">LEVEL :</label>
        <div class="controls">
            <select name="level" size="1" class="input-xlarge" id="level">
                <option values="1">ADMIN</option>
                <option values="2">USER</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="alamat">ALAMAT :</label>
        <div class="controls">
            <textarea name="alamat" id="alamat" rows=5 cols=40 class="input-xlarge" placeholder="ALAMAT"><?php echo $usr->alamat_user; ?></textarea>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="model">NOMER TELEPON :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="telepon" name="telepon" placeholder="NOMER TELEPON" value="<?php echo $usr->telepon_user; ?>">
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