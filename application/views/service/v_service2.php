			<script type="text/javascript">
			$(document).ready(function(){
				var grid = $("#list2");
				grid.jqGrid({
					url: '<?php echo base_url() ?>index.php/service2/json', //URL Tujuan Yg Mengenerate data Json nya
					datatype: "json", //Datatype yg di gunakan
					height: "auto", //Mengset Tinggi table jadi Auto menyesuaikan dengan isi table
					width:"990",
					mtype: "POST",
					colNames: ['TTR','Nama User','Nama Konsumen','Merek','Model','Serial Number','Tanggal Masuk','Kode Garansi','Status Perbaikan','Kelengkapan','Actions'],
					colModel: [
						{name:'ttr', key:true, index:'ttr', hidden:false,editable:false,editrules:{required:true}},
						{name:'nama_user',index:'nama_user',align:'center', editable:true,editrules:{required:true}},
						{name:'nama_konsumen',index:'nama_konsumen',align:'center',editable:true,editrules:{required:true}},
						{name:'merek',index:'merek_produk',align:'center',editable:true,editrules:{required:true}},
                        {name:'model',index:'model',align:'center',editable:true,editrules:{required:true}},
                        {name:'serial_number',index:'serial_number',editable:true,editrules:{required:true}},
						{name:'tanggal_masuk',index:'tanggal_masuk',editable:true,editrules:{required:true}},
                        {name:'status_barang',index:'status_barang',align:'center',editable:true,editrules:{required:true}},
						{name:'status_perbaikan',index:'status_perbaikan',editable:true,editrules:{required:true}},
						{name:'kelengkapan',index:'kelengkapan',align:'center',editable:true,editrules:{required:true}},
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
	