<?php
	class No_otomatis 
	{
		function no_transaksi()
	    {

	    	$today = date("Ymd");
	    	$hasil = $this->m_service->get_no_transaksi($today)->result_array();
	    	$lastNoTransaksi = $hasil['0']['last'];
	    	//print_r($hasil['0']['last']);
	    	//echo $today;
	    	// baca nomor urut transaksi dari id transaksi terakhir
			$lastNoUrut = substr($lastNoTransaksi, 8, 4); 

			// nomor urut ditambah 1
			$nextNoUrut = $lastNoUrut + 1;

			// membuat format nomor transaksi berikutnya
			$nextNoTransaksi = $today.sprintf('%04s', $nextNoUrut);

			return $nextNoTransaksi;

	    }

	}
?>