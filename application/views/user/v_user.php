			<script type="text/javascript">
			$(document).ready(function(){
				var grid = $("#list2");
				grid.jqGrid({
					url: '<?php echo base_url() ?>index.php/user/json', //URL Tujuan Yg Mengenerate data Json nya
					datatype: "json", //Datatype yg di gunakan
					height: "auto", //Mengset Tinggi table jadi Auto menyesuaikan dengan isi table
					width:"990",
					mtype: "POST",
					colNames: ['id','User Name','Nama User','Alamat User','Telepon User','action'],
					colModel: [
						{name:'id_service', key:true, index:'id_service', hidden:true,editable:false,editrules:{required:true}},
						{name:'nama_user',index:'nama_user',editable:true,editrules:{required:true}},
						{name:'telepon_user',index:'telepon_user',align:'center',editable:true,editrules:{required:true}},
						{name:'alamat_user',index:'alamat_user',editable:true,editrules:{required:true}},
						{name:'merek_produk',index:'merek_produk',align:'center',editable:true,editrules:{required:true}},
                        {name:'actions',index:'actions',align:'center',editable:false,editrules:{required:true}}
					],
					rownumbers:true,
					rowNum: 10,
					rowList: [10,20,30],
					pager: '#pager2',
					sortname: 'id',
					viewrecords: true,
					sortorder: "desc",
					editurl: '<?php echo base_url() ?>index.php/welcome/crud', //URL Proses CRUD Nya
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
	