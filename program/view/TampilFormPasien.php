<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");  

class TampilFormPasien implements KontrakView
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
        if (isset($post['id_edit'])) {            
            $result = $this->prosespasien->prosesDataPasienById($post['id_edit']); 
        }
        $data = null;
        $data .= '<div class="card-header text-center">
        <h3 class="my-0">' . (isset($post['id_edit']) ? "Update" : "Create") . ' data pasien</h3>
        </div>
        <div class="card-body">
            <form method="post" action="index.php">

                <input type="hidden" class="form-control" id="id" name="id" value="' . (isset($post['id_edit']) ? $post['id_edit'] : null) . '" required>

                <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" value="' . (isset($post['id_edit']) ? $result['nik'] : null) . '" required>
                </div>
                <br>

                <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="' . (isset($post['id_edit']) ? $result['nama'] : null) . '" required>
                </div>
                <br>

                <div class="form-group">
                <label for="tempat">Tempat</label>
                <input type="text" class="form-control" id="tempat" name="tempat" value="' . (isset($post['id_edit']) ? $result['tempat'] : null) . '" required>
                </div>
                <br>
                
                <div class="form-group">
                <label for="tl">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tl" name="tl" value="' . (isset($post['id_edit']) ? $result['tl'] : null) . '" required>
                </div>
                <br>
                
                <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-select" name="gender">
                <option selected>' . (isset($post['id_edit']) ? $result['gender'] : null) . '</option>
                <option value="Perempuan">Perempuan</option>
                <option value="Laki-laki">Laki-laki</option>
                </select>
                </div>
                <br> 
                
                <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="' . (isset($post['id_edit']) ? $result['email'] : null) . '" required>
                </div>
                <br>

                <div class="form-group">
                <label for="telp">No. Telp</label>
                <input type="text" class="form-control" id="telp" name="telp" value="' . (isset($post['id_edit']) ? $result['telp'] : null) . '" required>
                </div>
                <br>

                <div class="card-footer text-end">
                    <a href="index.php' . (isset($post['id_edit']) ? "?id_edit=" . $post['id_edit'] : null) . '"><button type="submit" name="' . (isset($post['id_edit']) ? "edit" : "add") . '" class="btn btn-success text-white">Submit Data</button></a>
                </div>
            </form>
            <div>';
		// Membaca template skin.html
		$this->tpl = new Template("templates/skinform.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_FORM", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}
}
