<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor 
		$this->prosespasien = new ProsesPasien();
	}

	function tampil($post)
	{ 
		if (isset($post['add'])) {
			$this->prosespasien->createDataPasien($post);
			header("location:index.php");
		}

		if (isset($post['id_hapus'])) {
			$this->prosespasien->deleteDataPasien($post['id_hapus']);
			header("location:index.php");
		}

		if (isset($post['id'])) {
			$this->prosespasien->updateDataPasien($post);
			header("location:index.php");
		}
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td>
			<a href='updateForm.php?id_edit=" . $this->prosespasien->getId($i) .  "' class='btn btn-warning''>Edit</a>
            <a href='index.php?id_hapus=" . $this->prosespasien->getId($i) . "' class='btn btn-danger''>Hapus</a>
			</td>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}
}
