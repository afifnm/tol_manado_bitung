<?php

	$pdf = new TCPDF('L', 'mm', 'A4');
	$pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);
	$pdf->AddPage();
	$pdf->SetFont('','B',7);
	$pdf->Cell(0 ,4,'LAPORAN HARIAN',0,1,'C');
	$pdf->Cell(0 ,4,'PEKERJAAN PEMBORONGAN DAN PENYUSUNAN DESAIN',0,1,'C');
	$pdf->Cell(0 ,4,'PEMBANGUNAN JALAN TOL MANADO – BITUNG',0,1,'C');
	$pdf->Cell(0 ,4,'STA 14+067 - 39+832',0,1,'C');
	$pdf->Ln();
	$pdf->SetFont('','B',6);
	$pdf->Image('assets/upload/logo1.jpg',15,12,40,0,'JPG');
	$pdf->Image('assets/upload/logo2.jpg',250,12,30,0,'JPG');
	$pdf->Cell(40 ,3,'NO. KONTRAK',0,0,'L'); $pdf->Cell(0 ,3,$site['no_kontrak'],0,1,'L');
	$pdf->Cell(40 ,3,'TANGGAL KONTRAK',0,0,'L'); $pdf->Cell(0 ,3,date_indo($site['tanggal_kontrak']),0,1,'L');
	$pdf->Cell(40 ,3,'WAKTU DESAIN',0,0,'L'); $pdf->Cell(0 ,3,$site['waktu_desain'],0,1,'L');
	$pdf->Cell(40 ,3,'WAKTU PELAKSANAAN',0,0,'L'); $pdf->Cell(0 ,3,$site['waktu_pelaksanaan'],0,1,'L');
	$pdf->Cell(40 ,3,'PENGGUNA JASA',0,0,'L'); $pdf->Cell(0 ,3,$site['pengguna_jasa'],0,1,'L');
	$pdf->Cell(40 ,3,'PENYEDIA JASA',0,0,'L'); $pdf->Cell(0 ,3,$site['penyedia_jasa'],0,1,'L');
	$pdf->Cell(40 ,3,'KONSULTASI PENGAWAS',0,0,'0'); $pdf->Cell(0 ,3,$site['konsultasi_pengawas'],0,1,'L');
	$pdf->Ln();
	$spasi = 3;
	$peralatan = 0;
	foreach ($data2 as $data2) {
		$pdf->Cell(0 ,$spasi,'REKAPITULASI LAPORAN HARIAN',0,1,'L');
		$pdf->Cell(40 ,$spasi,'PERIODE TANGGAL',0,0,'L');
		$pdf->Cell(40 ,$spasi,date_indo($data2['tanggal_start']).' - '.date_indo($data2['tanggal_end']),0,1,'L');
		$pdf->Ln();

		//----------------------------------------------------------------------------------------
		$pdf->Cell(15 ,5,'Tanggal',1,0,'C');
		$pdf->Cell(15 ,5,'No. Item',1,0,'C');
		$pdf->Cell(50 ,5,'Uraian Pekerjaan',1,0,'C');
		$pdf->Cell(30 ,5,'Keterangan',1,0,'C');
		$pdf->Cell(10 ,5,'Volume',1,0,'C');
		$pdf->Cell(10 ,5,'Satuan',1,0,'C');
		$pdf->Cell(20 ,5,'Harsat',1,0,'C');
		$pdf->Cell(25 ,5,'Total',1,0,'C');
		$pdf->Cell(10 ,5,'Cuaca',1,0,'C');
		foreach ($alat as $kolom) {
			$peralatan = $peralatan+4;
		}
		$pdf->Cell($peralatan ,5,'Peralatan',1,1,'C');
		$pdf->Cell(15 ,30,'',1,0,'C');
		$pdf->Cell(15 ,30,'',1,0,'C');
		$pdf->Cell(50 ,30,' ',1,0,'C');
		$pdf->Cell(30 ,30,'',1,0,'C');
		$pdf->Cell(10 ,30,'',1,0,'C');
		$pdf->Cell(10 ,30,'',1,0,'C');
		$pdf->Cell(20 ,30,'',1,0,'C');
		$pdf->Cell(25 ,30,'',1,0,'C');
		$pdf->Cell(10 ,30,'',1,1,'C');		

		$pdf->SetXY(195, 98);
		$pdf->SetFont('','B',5);
		foreach ($alat as $alat1) {
			$pdf->StartTransform();
			$pdf->Rotate(90);
			$pdf->Cell(4,3,$alat1['alat'],0,0,'L',0,'');
			$pdf->StopTransform();
		}
		$pdf->SetXY(195, 68);
		foreach ($alat as $alat3) {
				$pdf->Cell(4,30,'',1,0,'L',0,'');
			}
		$pdf->Ln();
		$pdf->SetXY(10, 98);
		$sum = 0;
		foreach ($data3 as $data3) {
			$pdf->Cell(15 ,5,shortdate_indo($data3['tanggal']),1,0,'C');
			$pdf->Cell(15 ,5,$data3['no_item'],1,0,'C');
			$pdf->Cell(50 ,5,$data3['nama'],1,0,'L');
			$pdf->Cell(30 ,5,$data3['uraian'],1,0,'L');
			$pdf->Cell(10 ,5,$data3['jumlah'],1,0,'C');
			$pdf->Cell(10 ,5,$data3['satuan'],1,0,'C');
			$pdf->Cell(20 ,5,'Rp. '.number_format($data3['harga'],2,",","."),1,0,'R');
			$pdf->Cell(25 ,5,'Rp. '.number_format($data3['jumlah']*$data3['harga'],2,",","."),1,0,'R');
			$pdf->Cell(10 ,5,$data3['cuaca'],1,0,'C');
			foreach ($this->CRUD_model->get_alat($data3['id_detail_laporan_harian']) as $get) {
				$pdf->Cell(4,5,$get['jumlah'],1,0,'L',0,'');
			}
		$pdf->Ln();
		$sum = $sum+$data3['jumlah']*$data3['harga'];
		}
		$pdf->Cell(15 ,5,'',1,0,'C');
		$pdf->Cell(15 ,5,'',1,0,'C');
		$pdf->Cell(50 ,5,'',1,0,'C');
		$pdf->Cell(30 ,5,'',1,0,'C');
		$pdf->Cell(10 ,5,'',1,0,'C');
		$pdf->Cell(10 ,5,'',1,0,'C');
		$pdf->Cell(20 ,5,'',1,0,'C');
		$pdf->Cell(25 ,5,'Rp. '.number_format($sum,2,",","."),1,0,'R');
		$pdf->Cell(10 ,5,'',1,0,'C');
		$pdf->Cell($peralatan ,5,'',1,1,'C');
	}
	$pdf->SetFont('','',7);
	$pdf->Ln();
	$pdf->Cell(50 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,'Diketahui :',0,0,'C');
	$pdf->Cell(40 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,'Diperiksa dan Disetujui Oleh :',0,0,'C');
	$pdf->Cell(40 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,'Dibuat dan Diajukan :',0,0,'C');

	$pdf->Ln();
	$pdf->Cell(50 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,$this->CRUD_model->get_cv('10'),0,0,'C');
	$pdf->Cell(40 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,$this->CRUD_model->get_cv('9'),0,0,'C');
	$pdf->Cell(40 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,$this->CRUD_model->get_cv('1'),0,0,'C');
	$pdf->Ln();
	$pdf->Cell(60 ,4,'',0,0,'L');
	$pdf->Image('assets/upload/ttd/owner.png', '', '', 15, 15, '', '', 'T', false, 0, '', false, false, 1, false, false, false);
	$pdf->Cell(60 ,4,'',0,0,'L');
	$pdf->Image('assets/upload/ttd/ks.png', '', '', 15, 15, '', '', 'T', false, 0, '', false, false, 1, false, false, false);
	$pdf->Cell(60 ,4,'',0,0,'L');
	$pdf->Image('assets/upload/ttd/se.png', '', '', 15, 15, '', '', 'T', false, 0, '', false, false, 1, false, false, false);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(50 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,$this->CRUD_model->get_nama('10'),0,0,'C');
	$pdf->Cell(40 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,$this->CRUD_model->get_nama('9'),0,0,'C');
	$pdf->Cell(40 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,$this->CRUD_model->get_nama('1'),0,0,'C');



	$pdf->Output('laporan  '.$nomor.'.pdf', 'I');
?>