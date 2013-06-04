		<?php
			$level = $this->session->userdata('level');
        	
        	if(!isset($level) || $level == 1)
        	{            
            	$hidden = 'false';
        	} else {
        		$hidden = 'true';
        	}
		?>
			<script type="text/javascript">
			$(document).ready(function(){
				var grid = $("#list2");
				grid.jqGrid({
					url: '<?php echo base_url() ?>index.php/service2/json_service', //URL Tujuan Yg Mengenerate data Json nya
					datatype: "json", //Datatype yg di gunakan
					height: "auto", //Mengset Tinggi table jadi Auto menyesuaikan dengan isi table
					width:"1100",
					mtype: "POST",
					colNames: ['TTR','Nama User','Nama Konsumen','Merek','Model','Serial Number','Tanggal Masuk','Tanggal Estimasi','Tanggal Setuju','Tanggal Selesai','Tanggal Ambil','Kode Garansi','Status Perbaikan','Teknisi','Kelengkapan'],
					colModel: [
						{name:'ttr', key:true, index:'ttr', width:'300', hidden:false,editable:false,editrules:{required:true}},
						{name:'nama_user',index:'nama_user',align:'center' , width:'300', editable:true,editrules:{required:true}},
						{name:'nama_konsumen',index:'nama_konsumen',align:'center', width:'300',editable:true,editrules:{required:true}},
						{name:'merek',index:'merek_produk',align:'center', width:'300',editable:true,editrules:{required:true}},
                        {name:'model',index:'model',align:'center',editable:true, width:'300',editrules:{required:true}},
                        {name:'serial_number',index:'serial_number',editable:true, width:'300',editrules:{required:true}},
						{name:'tanggal_masuk',index:'tanggal_masuk',editable:true, width:'300',editrules:{required:true}},
						{name:'tanggal_estimasi',index:'tanggal_estimasi',editable:true, width:'300',editrules:{required:true}},
						{name:'tanggal_setuju',index:'tanggal_setuju',editable:true, width:'300',editrules:{required:true}},
						{name:'tanggal_selesai',index:'tanggal_selesai',editable:true, width:'300',editrules:{required:true}},
						{name:'tanggal_ambil',index:'tanggal_ambil',editable:true, width:'300',editrules:{required:true}},
                        {name:'status_barang',index:'status_barang',align:'center', width:'300',editable:true,editrules:{required:true}},
						{name:'status_perbaikan',index:'status_perbaikan', width:'300',editable:true,editrules:{required:true}},
						{name:'teknisi',index:'teknisi',editable:true, width:'300',editrules:{required:true}},
						{name:'kelengkapan',index:'kelengkapan',align:'center', width:'300',editable:true,editrules:{required:true}},
					],
					rownumbers:true,
					rowNum: 10,
					rowList: [10,20,30],
					pager: '#pager2',
					sortname: 'ttr',
					viewrecords: true,
					sortorder: "desc",
					editurl: '', //URL Proses CRUD Nya
					multiselect: false, 
					caption: "Data List Service", //Caption List					
				});
				grid.jqGrid('navGrid','#pager2',{view:true,edit:false,add:false,del:false},{},{},{},{closeOnEscape:true,closeAfterSearch:false,multipleSearch:false, multipleGroup:false, showQuery:false,drag:true,showOnLoad:false,sopt:['cn'],resize:false,caption:'Cari Record', Find:'Cari', Reset:'Batalkan Pencarian'});				
			});
		</script>
		</br>
		</br>
		</br>
		<table id="list2" class="scroll" cellpadding="0" cellspacing="0" ></table>
		<div id="pager2" class="scroll" style="text-align:center;"></div>
		</br>
	