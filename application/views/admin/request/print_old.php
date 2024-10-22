<?php
foreach ($data2 as $u) {  
	class MYPDF extends TCPDF {
	    public function Header() {
	    }
	    public function Footer() {
	        $this->SetY(-15);
	        $this->SetFont('helvetica', 'I', 8);
	        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	    }
	}
	$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	$pdf->AddPage();
	        $logo1 = 'assets/upload/logo1.jpg';
			$logo3 = 'assets/upload/logo3.jpg';
			$logo2 = 'assets/upload/logo2.jpg';
	        $pdf->Image($logo1, 17, 10, 45, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
	        $pdf->Image($logo3, 22, 23, 35, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
	        $pdf->Image($logo2, 85, 10, 35, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
	        $pdf->SetFont('helvetica', '', 9);
	        // Title
	        $pdf->Cell(0, 0, $form, 1, false, 'C', 0, '', 0, false, 'M', 'M');
	        $pdf->Ln();
	        $pdf->SetLineStyle(array('width' => 1.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(50, 0, 0)));
	        $pdf->Cell(180, 20, '', 'B', 0, '', 0);
	        $pdf->SetLineStyle(array('width' => 0, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(50, 0, 0)));
	$spasi = 5;
	$pdf->Cell(40 ,$spasi,'',0,1,'L');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('','B',12); $pdf->Cell(0 ,$spasi,'PERMOHONAN IJIN PEKERJAAN',0,1,'C');
	$pdf->SetFont('','I',10); $pdf->Cell(0 ,$spasi,'(Request For Work)',0,1,'C');
	$pdf->Ln();
	$pdf->SetFont('','',9);
	$pdf->Cell(40 ,$spasi,'Nama Proyek',0,0,'L');			$pdf->SetFont('','B',9); $pdf->Cell(0 ,$spasi,' : '.$site['nama_proyek'],0,1,'L');
	$pdf->SetFont('','',9);
	$pdf->Cell(40 ,$spasi,'Kontraktor Pelaksana',0,0,'L');	$pdf->SetFont('','B',9);	$pdf->Cell(0 ,$spasi,' : '.$site['kontraktor_pelaksana'],0,1,'L');
	$pdf->SetFont('','',9);
	$pdf->Cell(40 ,$spasi,'Nomor Kontrak',0,0,'L');			$pdf->SetFont('','B',9);$pdf->Cell(0 ,$spasi,' : '.$site['no_kontrak'],0,1,'L');
	$pdf->SetFont('','',9);
	$pdf->Cell(40 ,$spasi,'Tanggal Kontrak',0,0,'L');		$pdf->SetFont('','B',9);$pdf->Cell(0 ,$spasi,' : '.date_indo($site['tanggal_kontrak']),0,1,'L');

	//ITEM PEKERJAAN
	$pdf->SetFont('','',9); 
	$pdf->Cell(0 ,$spasi,'Dengan ini mengajukan ijin pelaksanaan pekerjaan sebagai berikut :',0,1,'L');
	$no = 0;
$html='
	<table border="1" cellpadding="3">
		<tr align="center">
			<th width="5%"><b>No.</b></th>
			<th><b>Mata Pembayaran</b></th>
			<th width="40%"><b>Pekerjaan</b></th>
			<th width="10%"><b>Estimasi Volume</b></th>
			<th width="10%"><b>Satuan</b></th>
			<th width="15%"><b>STA</b></th>
		</tr>';
	foreach ($data3 as $data3) { $no++; 
$html.='	
		<tr align="center">
			<td>'.$no.'</td>
			<td>'.$data3['mata_pembayaran'].'</td>
			<td align="left">'.$data3['nama'].'</td>
			<td>'.$data3['volume'].'</td>
			<td>'.$data3['satuan'].'</td>
			<td>Sta. Terlampir</td>
		</tr>';
		}
$html.='
		<tr align="center">
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
		</tr>
	</table>';
	$pdf->writeHTML($html, false, false, true, false, '');

	//LAMPIRAN
	if ($u['id_gambar_kerja']=='-'){ $gambar = 'Tidak Ada'; } else { $gambar = 'Ada'; }
	if ($u['id_metode']=='-'){ $metode = 'Tidak Ada'; } else { $metode = 'Ada'; }
	if ($u['id_data_quality']=='-'){ $data = 'Tidak Ada'; } else { $data = 'Ada'; }

	if ($this->CRUD_model->jumlah('detail_tenaga',$u['id_request'])==0){ $tenagaC = 'Tidak Ada'; } else { $tenagaC = 'Ada'; }
	if ($this->CRUD_model->jumlah('detail_material',$u['id_request'])==0){ $materialC = 'Tidak Ada'; } else { $materialC = 'Ada'; }
	if ($this->CRUD_model->jumlah('detail_peralatan',$u['id_request'])==0){ $peralatanC = 'Tidak Ada'; } else { $peralatanC = 'Ada'; }

	$pdf->Cell(0 ,$spasi,'Sebagai kelengkapan ijin pelaksanaan dilampirkan :',0,1,'L');
$html='
	<table border="1" cellpadding="3">
		<tr align="center">
			<td width="5%"><b> No. </b></td>
			<td width="41%"><b> Uraian </b></td>
			<td width="25%"><b> Keterangan </b></td>
		</tr>
		<tr>
			<td align="center">1</td>
			<td>Gambar Kerja (Shop Drawing)</td>
			<td align="center">'.$gambar.'</td>
		</tr>
		<tr>
			<td align="center">2</td>
			<td>Metode Pelaksanaan</td>
			<td align="center">'.$metode.'</td>
		</tr>
		<tr>
			<td align="center">3</td>
			<td>Data Hasil Uji Laboratorium</td>
			<td align="center">'.$data.'</td>
		</tr>
		<tr>
			<td align="center">4</td>
			<td>Tenaga Kerja</td>
			<td align="center">'.$tenagaC.'</td>
		</tr>
		<tr>
			<td align="center">5</td>
			<td>Material</td>
			<td align="center">'.$materialC.'</td>
		</tr>
		<tr>
			<td align="center">6</td>
			<td>Peralatan</td>
			<td align="center">'.$peralatanC.'</td>
		</tr>
	</table>';
	$pdf->writeHTML($html, false, false, true, false, '');
	$pdf->Ln();
	$pdf->Cell(110 ,$spasi,'Pengajuan Tanggal : '.date_indo($u['tanggal_pengajuan']),0,0,'L');
	$pdf->Cell(80 ,$spasi,'Pelaksanaan Tanggal : '.date_indo($u['tanggal_pelaksanaan']),0,1,'L');
$html='
	<table border="1" cellpadding="3">
		<tr align="left">
			<td>
				<b><i><u>Catatan Teknis dan Administrasi : </u></i></b> <br> ';
	for ($i=0; $i < 70; $i++) { 
$html.='..........';	
	}
$html.='		
			</td>
		</tr>
	</table>';
	$pdf->writeHTML($html, false, false, true, false, '');
	//TANDA TANGAN
	$pdf->Ln();$pdf->Ln();
	$pdf->Cell(10 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,'Diketahui Oleh,',0,0,'C');
	$pdf->Cell(25 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,'Diperiksa dan Disetujui Oleh,',0,0,'C');
	$pdf->Cell(25 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,'Diajukan Oleh,',0,0,'C');

	$pdf->Ln();
	$pdf->Cell(10 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,$this->CRUD_model->get_cv('10'),0,0,'C');
	$pdf->Cell(25 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,$this->CRUD_model->get_cv('7'),0,0,'C');
	$pdf->Cell(25 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,$this->CRUD_model->get_cv('2'),0,0,'C');
	$pdf->Ln();
	$pdf->Cell(20 ,4,'',0,0,'L');
	$pdf->Image('assets/upload/ttd/owner.png', '', '', 15, 15, '', '', 'T', false, 0, '', false, false, 1, false, false, false);
	$pdf->Cell(45,4,'',0,0,'L');
	$pdf->Image('assets/upload/ttd/re.png', '', '', 15, 15, '', '', 'T', false, 0, '', false, false, 1, false, false, false);
	$pdf->Cell(45 ,4,'',0,0,'L');
	$pdf->Image('assets/upload/ttd/pm.png', '', '', 15, 15, '', '', 'T', false, 0, '', false, false, 1, false, false, false);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('','B',9); 
	$pdf->Cell(10 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,$this->CRUD_model->get_nama('10'),0,0,'C');
	$pdf->Cell(25 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,$this->CRUD_model->get_nama('7'),0,0,'C');
	$pdf->Cell(25 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,$this->CRUD_model->get_nama('2'),0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('','',9); 
	$pdf->Cell(10 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,$this->CRUD_model->get_level('10'),0,0,'C');
	$pdf->Cell(25 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,$this->CRUD_model->get_level('7'),0,0,'C');
	$pdf->Cell(25 ,4,'',0,0,'L');
	$pdf->Cell(35 ,4,$this->CRUD_model->get_level('2'),0,0,'C');


	//HALAMAN KEDUA
	$pdf->AddPage();
	        $logo1 = 'assets/upload/logo1.jpg';
			$logo3 = 'assets/upload/logo3.jpg';
			$logo2 = 'assets/upload/logo2.jpg';
	        $pdf->Image($logo1, 17, 10, 45, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
	        $pdf->Image($logo3, 22, 23, 35, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
	        $pdf->Image($logo2, 85, 10, 35, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
	        $pdf->SetFont('helvetica', '', 9);
	        // Title

	        $pdf->Cell(0, 0, $form, 1, false, 'C', 0, '', 0, false, 'M', 'M');
	        $pdf->Ln();
	        $pdf->SetLineStyle(array('width' => 1.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(50, 0, 0)));
	        $pdf->Cell(180, 20, '', 'B', 0, '', 0);
	$spasi = 5;
	$pdf->Cell(40 ,$spasi,'',0,1,'L');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('','B',12); $pdf->Cell(0 ,$spasi,'LEMBAR INSTRUKSI TEKNIS DAN ADMINISTRASI',0,1,'C');
	$pdf->Ln();
	$pdf->SetFont('','',9);
	$pdf->Cell(40 ,$spasi,'Nama Proyek',0,0,'L');			$pdf->SetFont('','B',9); $pdf->Cell(0 ,$spasi,' : '.$site['nama_proyek'],0,1,'L');
	$pdf->SetFont('','',9);
	$pdf->Cell(40 ,$spasi,'Kontraktor Pelaksana',0,0,'L');	$pdf->SetFont('','B',9);	$pdf->Cell(0 ,$spasi,' : '.$site['kontraktor_pelaksana'],0,1,'L');
	$pdf->SetFont('','',9);
	$pdf->Cell(40 ,$spasi,'Nomor Kontrak',0,0,'L');			$pdf->SetFont('','B',9);$pdf->Cell(0 ,$spasi,' : '.$site['no_kontrak'],0,1,'L');
	$pdf->SetFont('','',9);
	$pdf->Cell(40 ,$spasi,'Tanggal Kontrak',0,0,'L');		$pdf->SetFont('','B',9);$pdf->Cell(0 ,$spasi,' : '.date_indo($site['tanggal_kontrak']),0,1,'L');

	//TENAGA PERALATAN MATERIAL
	$pdf->SetFont('','',9);
	$pdf->Cell(0 ,$spasi,'Berikut Rencana Jumlah Tenaga Kerja, Peralatan, dan Material yang akan digunakan :',0,1,'L');
	$no1 = 0;$no2 = 0;$no3 = 0;
$html='
	<table border="1" cellpadding="3">
		<tr align="left">
			<td>
				<b>Tenaga Kerja : </b> <br>';
	foreach ($tenaga as $tenaga) { 
	if ($tenaga['jumlah']>0) { $no1++; 
$html.= $no1.'. '.$tenaga['tenaga'].' Jumlah '.$tenaga['jumlah'].' orang <br>';	
	}}
$html.='		
			</td>
			<td>
				<b>Peralatan : </b> <br>';
	foreach ($peralatan as $peralatan) { 
	if ($peralatan['jumlah']>0) { $no2++; 
$html.= $no2.'. '.$peralatan['peralatan'].' Jumlah '.$peralatan['jumlah'].' Unit <br>';	
	}}
$html.='		
			</td>
			<td>
				<b>Material : </b> <br>';
	foreach ($material as $material) { 
	if ($material['jumlah']>0) { $no3++; 
$html.= $no3.'. '.$material['material'].' Jumlah '.$material['jumlah'].' pc <br>';	
	}}
$html.='		
			</td>
		</tr>
	</table>';
	$pdf->writeHTML($html, false, false, true, false, '');	

	//TANDA TANGAN ACC
	$pdf->Cell(0 ,$spasi,'Catatan Instruksi Teknis dan Administrasi :',0,1,'L');
$html='
	<table border="1" cellpadding="3">
		<tr align="center">
			<th width="10%" rowspan="2"><b>No.</b></th>
			<th colspan="3"><b>Professional Staff (Prostaff)</b></th>
			<th width="25%" rowspan="2"><b>Instruksi Teknis dan Administrasi</b></th>
		</tr>
		<tr align="center">
			<td><b>Nama</b></td>
			<td><b>Jabatan</b></td>
			<td><b>Tanda Tangan</b></td>
		</tr>
		<tr align="center">
			<td>1</td>
			<td>'.$this->CRUD_model->get_nama('2').'</td>
			<td>'.$this->CRUD_model->get_level('2').'</td>
			<td><img width="70px" src="assets/upload/ttd/pm.png"></td>
			<td></td>
		</tr>
		<tr align="center">
			<td>2</td>
			<td>'.$this->CRUD_model->get_nama('3').'</td>
			<td>'.$this->CRUD_model->get_level('3').'</td>
			<td><img width="70px" src="assets/upload/ttd/ci.png"></td>
			<td></td>
		</tr>
		<tr align="center">
			<td>3</td>
			<td>'.$this->CRUD_model->get_nama('4').'</td>
			<td>'.$this->CRUD_model->get_level('4').'</td>
			<td><img width="70px" src="assets/upload/ttd/struk.png"></td>
			<td></td>
		</tr>
		<tr align="center">
			<td>4</td>
			<td>'.$this->CRUD_model->get_nama('5').'</td>
			<td>'.$this->CRUD_model->get_level('5').'</td>
			<td><img width="70px" src="assets/upload/ttd/pme.png"></td>
			<td></td>
		</tr>
		<tr align="center">
			<td>5</td>
			<td>'.$this->CRUD_model->get_nama('6').'</td>
			<td>'.$this->CRUD_model->get_level('6').'</td>
			<td><img width="70px" src="assets/upload/ttd/qe.png"></td>
			<td></td>
		</tr>
		<tr align="center">
			<td>6</td>
			<td>'.$this->CRUD_model->get_nama('7').'</td>
			<td>'.$this->CRUD_model->get_level('7').'</td>
			<td><img width="70px" src="assets/upload/ttd/re.png"></td>
			<td></td>
		</tr>
		<tr align="center">
			<td>7</td>
			<td>'.$this->CRUD_model->get_nama('10').'</td>
			<td>'.$this->CRUD_model->get_level('10').'</td>
			<td><img width="70px" src="assets/upload/ttd/owner.png"></td>
			<td></td>
		</tr>
	</table>';
	$pdf->writeHTML($html, false, false, true, false, '');	
	$pdf->Output('laporan  '.$nomor.'.pdf', 'I');
}
?>