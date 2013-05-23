<br/>
    <br/>
        <br/>

   

<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap-datetimepicker.min.css'); ?>"/>
<script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap-datetimepicker.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript">
    
    $(document).ready(function(){
            $("#frm-usr").validate({
                rules: {
                    pass2: {
                        equalTo: "#pass1"
                    }
                },
                messages: {
                    pass2: {
                        equalTo: "Password tidak sama"
                    }
                }
            });

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

<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/user/insert" method="POST" id="frm-usr">
    
    <div class="control-group">
        <label class="control-label" for="ttl">USER NAME :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="user_name" name="user_name" placeholder="USER NAME" required>
            <span id="stts"></span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="namauser">NAMA USER :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="namauser" name="namauser" placeholder="NAMA USER" required>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="pass1">PASSWORD :</label>
        <div class="controls">
            <input type="password" class="input-xlarge" id="pass1" name="pass1" placeholder="PASSWORD" required>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="pass2">COMFIRM PASSWORD :</label>
        <div class="controls">
            <input type="password" class="input-xlarge" id="pass2" name="pass2" placeholder="COMFIRM PASSWORD" required>
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
            <textarea name="alamat" id="alamat" rows=5 cols=40 class="input-xlarge" placeholder="ALAMAT" ></textarea>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="model">NOMER TELEPON :</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="telepon" name="telepon" placeholder="NOMER TELEPON">
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <button class="btn btn-info"><i class="icon-white icon-check"></i> Simpan</button>
            <button class="btn btn-success" type="button"><i class="icon-remove-circle"></i> CANCEL</button>
        </div>
    </div>

</form>