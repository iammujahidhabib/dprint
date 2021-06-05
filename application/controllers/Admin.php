<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Admin';

        $data['admindata'] = $this->Admin_model->getAdmin();

        $data['countKonsumen'] = $this->Admin_model->getJmlKonsum();
        $data['countVendor'] = $this->Admin_model->getJmlVendor();
        $data['countBarang'] = $this->Admin_model->getJmlBarang();

        $data['grafik_penjualan'] = $this->Admin_model->grafik_penjualanTahunan();
        $data['grafik_konsumen'] = $this->Admin_model->grafik_konsumenTahunan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function daftarPesanan()
    {
        $data['title'] = 'Daftar Pesanan';

        $data['admindata'] = $this->Admin_model->getAdmin();

        $data['pesanan'] = $this->Admin_model->getAllPesanan();

        // echo "<pre>";
        // print_r($data['pesanan']);
        // echo "</pre>";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/daftarPesanan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function toltervendor($status, $id, $total_harga = null)
    {
        if ($status == 1) {
            $status = 'sedang diproses';
            $data = [
                'status_pesanan' => $status,
            ];

            $data_upd = [
                'total_bayar' => $total_harga,
            ];

            $this->Admin_model->tolakatauterima($data, $id);
            $cek = $this->db->query("SELECT * FROM pembayaran WHERE id_bayar =$id")->row_array();
            if ($cek['jenis_bayar'] == 0 && $cek['bukti_bayar'] != "" && $cek['bukti_dp'] != "") {
                $this->db->update('pembayaran', $data_upd, ['id_bayar' => $id]); // jenis bayar DP berarti pelunasan
            } elseif ($cek['jenis_bayar'] == 1) {
                $this->db->update('pembayaran', $data_upd, ['id_bayar' => $id]); // jenis bayar lunas
            }

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Pesanan Berhasil Diterima!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/daftarPesanan');
        } elseif ($status == 0) {
            $status = 'pesanan ditolak';
            $data = [
                'status_pesanan' => $status,
            ];

            $this->Admin_model->tolakatauterima($data, $id);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Pesanan Berhasil Ditolak!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>'
            );
            redirect('admin/daftarPesanan');
        } elseif ($status == 3) {
            $status = 'pesanan dikirim';
            $data = [
                'status_pesanan' => $status,
            ];

            $this->Admin_model->tolakatauterima($data, $id);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Pesanan Berhasil Dikirimkan!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
      </div>'
            );
            redirect('admin/daftarPesanan');
        } elseif ($status == 4) {
            $status = 'pesanan selesai';
            $data = [
                'status_pesanan' => $status,
            ];

            $this->Admin_model->tolakatauterima($data, $id);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Pesanan Berhasil Diterima!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
      </div>'
            );
            redirect('admin/daftarPesanan');
        } else {
            $status = 'Pembayaran kurang (sedang diproses)';
            $data = [
                'status_pesanan' => $status,
            ];

            $this->Admin_model->tolakatauterima($data, $id);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Pesan sudah dikirim ke pemesan!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
      </div>'
            );
            redirect('admin/daftarPesanan');
        }
    }

    public function detailPesanan($id)
    {
        $data['title'] = 'Detail Pesanan';

        $data['admindata'] = $this->Admin_model->getAdmin();

        $data['pesanan'] = $this->Admin_model->getDetailPesanan($id);
        // print_r($data['pesanan']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/detailPesanan', $data);
        $this->load->view('templates/footer', $data);
    }

    // public function allKonsumen()
    // {
    //     $data['title'] = 'Data Konsumen';

    //     $data['admindata'] = $this->Admin_model->getAdmin();
    //     $data['konsum'] = $this->Admin_model->getAllKonsum();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('admin/dataKonsumen', $data);
    //     $this->load->view('templates/footer', $data);
    // }

    // public function allVendor()
    // {
    //     $data['title'] = 'Data Vendor';

    //     $data['admindata'] = $this->Admin_model->getAdmin();
    //     $data['vendor'] = $this->Admin_model->getAllVendor();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('admin/dataVendor', $data);
    //     $this->load->view('templates/footer', $data);
    // }

    public function barang()
    {
        $data['title'] = 'Barang-Barang';

        $data['admindata'] = $this->Admin_model->getAdmin();

        $data['countKonsumen'] = $this->Admin_model->getJmlKonsum();
        $data['countVendor'] = $this->Admin_model->getJmlVendor();
        $data['countBarang'] = $this->Admin_model->getJmlBarang();
        $data['allBarang'] = $this->Admin_model->getAllBarang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/barang', $data);
        $this->load->view('templates/footer', $data);
    }

    public function dataBarang($idkategori)
    {
        $data['title'] = 'Data Barang';

        $data['admindata'] = $this->Admin_model->getAdmin();

        $data['allDataBarang'] = $this->Admin_model->getAllDataBarang($idkategori);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates/footer', $data);
    }

    public function TambahBarang()
    {
        $data['title'] = 'Tambah Barang';

        $data['admindata'] = $this->Admin_model->getAdmin();

        $data['namaKategori'] = $this->Admin_model->getAllkategori();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/tambahBarang', $data);
        $this->load->view('templates/footer', $data);
    }

    public function addBarang()
    {
        $refresh = $this->input->post('kategori');
        $data = [
            'id_kategori' => $this->input->post('kategori'),
            'paket' => htmlspecialchars($this->input->post('paket')),
            'kelas' => $this->input->post('kelas'),
            'jenis_bahan' => htmlspecialchars($this->input->post('jenisBahan')),
            'jenis_bordir' => htmlspecialchars($this->input->post('jenisBordir')),
            'kategori_jersey' => htmlspecialchars($this->input->post('kategoriJersey')),
            'jenis_sablon' => htmlspecialchars($this->input->post('jenisSablon')),
            'ketebalan' => htmlspecialchars($this->input->post('ketebalan')),
            'harga' => htmlspecialchars($this->input->post('harga')),
            'keterangan' => htmlspecialchars($this->input->post('keterangan')),
        ];
        $this->Admin_model->add_Barang($data);
        redirect('admin/dataBarang/' . $refresh);
    }

    public function editBarang($id)
    {
        $data['title'] = 'Edit Barang';

        $data['admindata'] = $this->Admin_model->getAdmin();

        $data['barang'] = $this->Admin_model->getBarang($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/editBarang', $data);
        $this->load->view('templates/footer', $data);
    }

    public function updateBarang()
    {
        $id = $this->input->post('idbarang');
        $refresh = $this->input->post('idkategori');
        $data = [
            'paket' => htmlspecialchars($this->input->post('paket')),
            'kelas' => $this->input->post('kelas'),
            'jenis_bahan' => htmlspecialchars($this->input->post('jenisBahan')),
            'jenis_bordir' => htmlspecialchars($this->input->post('jenisBordir')),
            'kategori_jersey' => htmlspecialchars($this->input->post('kategoriJersey')),
            'jenis_sablon' => htmlspecialchars($this->input->post('jenisSablon')),
            'ketebalan' => htmlspecialchars($this->input->post('ketebalan')),
            'harga' => htmlspecialchars($this->input->post('harga')),
            'keterangan' => htmlspecialchars($this->input->post('keterangan')),
        ];
        $this->Admin_model->update_Barang($id, $data);
        redirect('admin/dataBarang/' . $refresh);
    }

    public function deleteBarang($id)
    {
        $refresh = $this->input->post('refresh');
        $this->Admin_model->delete_barang($id);
        redirect('admin/dataBarang/' . $refresh);
    }

    public function tambahKategori()
    {
        $data['title'] = 'Tambah Kategori Barang';

        $data['admindata'] = $this->Admin_model->getAdmin();

        $data['countKonsumen'] = $this->Admin_model->getJmlKonsum();
        $data['countVendor'] = $this->Admin_model->getJmlVendor();
        $data['countBarang'] = $this->Admin_model->getJmlBarang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/tambahKategori', $data);
        $this->load->view('templates/footer', $data);
    }
    public function editKategori($id)
    {
        $data['title'] = 'Edit Kategori Barang';

        $data['admindata'] = $this->Admin_model->getAdmin();

        $data['countKonsumen'] = $this->Admin_model->getJmlKonsum();
        $data['countVendor'] = $this->Admin_model->getJmlVendor();
        $data['countBarang'] = $this->Admin_model->getJmlBarang();

        $data['detail'] = $this->db->where(['id_kategori' => $id])->get('kategori')->row();
        // print_r($data['detail']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/editKategori', $data);
        $this->load->view('templates/footer', $data);
    }

    public function addKategori()
    {
        $namaKategori = $this->Admin_model->getAllNamaKategori();
        $inputNamaKategori = $this->input->post('namaKategori');

        foreach ($namaKategori as $kategori) {
            if ($kategori['nama_kategori'] == $inputNamaKategori) {
                $this->session->set_flashdata(
                    'pesan',
                    '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Nama Kategori Sudah Ada!!!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>'
                );
                redirect('admin/tambahKategori');
            } else {
                $config = array(
                    'upload_path' => './assetsKonsumen/img_kategori/',
                    'overwrite' => false,
                    'remove_spaces' => true,
                    'allowed_types' => 'png|jpg|gif|jpeg',
                    'max_size' => 10000,
                    'xss_clean' => true,
                );
                $this->load->library('upload');
                $this->upload->initialize($config);
                // if ($_FILES['file']['name'] != "") {
                if ($this->upload->do_upload('gambar')) {
                    $file_data = $this->upload->data();
                } else {
                    $file_data = "";
                }
                $config2 = array(
                    'upload_path' => './assetsKonsumen/paket/',
                    'overwrite' => false,
                    'remove_spaces' => true,
                    'allowed_types' => 'png|jpg|gif|jpeg',
                    'max_size' => 10000,
                    'xss_clean' => true,
                );
                $this->load->library('upload');
                $this->upload->initialize($config2);
                // if ($_FILES['file']['name'] != "") {
                if ($this->upload->do_upload('paket')) {
                    $file_data2 = $this->upload->data();
                } else {
                    $file_data2 = "";
                }
                $data = [
                    'nama_kategori' => $this->input->post('namaKategori'),
                    'mulai_harga' => $this->input->post('mulai') . " - " . $this->input->post('sampai'),
                    'deskripsi' => $this->input->post('deskripsiKategori'),
                    'gambar_kategori' => $file_data['file_name'],
                    'list_paket' => $file_data2['file_name'],
                ];
                $this->Admin_model->addKategori($data);
                // $namatable = str_replace(' ', '', $inputNamaKategori);
                // $this->Admin_model->addTable($namatable);
                redirect('admin/barang');
            }
        }
    }
    public function updateKategori($id)
    {
        // $namaKategori = $this->Admin_model->getAllNamaKategori();
        $inputNamaKategori = $this->input->post('namaKategori');

        // foreach ($namaKategori as $kategori) {
        // if ($kategori['nama_kategori'] == $inputNamaKategori) {
        //     $this->session->set_flashdata(
        //         'pesan',
        //         '
        // 	<div class="alert alert-danger alert-dismissible fade show" role="alert">
        // 	Nama Kategori Sudah Ada!!!
        // 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        // 	<span aria-hidden="true">&times;</span>
        // 	</button>
        // 	</div>'
        //     );
        //     redirect('admin/tambahKategori');
        // } else {
        $data = [
            'nama_kategori' => $this->input->post('namaKategori'),
            'deskripsi' => $this->input->post('deskripsiKategori'),
            'mulai_harga' => $this->input->post('mulai') . " - " . $this->input->post('sampai'),

        ];
        if ($_FILES['gambar']['name'] != "") {
            $config = array(
                'upload_path' => './assetsKonsumen/img_kategori/',
                'overwrite' => false,
                'remove_spaces' => true,
                'allowed_types' => 'png|jpg|gif|jpeg',
                'max_size' => 10000,
                'xss_clean' => true,
            );
            $this->load->library('upload');
            $this->upload->initialize($config);
            // if ($_FILES['file']['name'] != "") {
            if ($this->upload->do_upload('gambar')) {
                $file_data = $this->upload->data();
                $data['gambar_kategori'] = $file_data['file_name'];
            }
        }
        if ($_FILES['paket']['name'] != "") {
            $config2 = array(
                'upload_path' => './assetsKonsumen/paket/',
                'overwrite' => false,
                'remove_spaces' => true,
                'allowed_types' => 'png|jpg|gif|jpeg',
                'max_size' => 10000,
                'xss_clean' => true,
            );
            $this->load->library('upload');
            $this->upload->initialize($config2);
            // if ($_FILES['file']['name'] != "") {
            if ($this->upload->do_upload('paket')) {
                $file_data2 = $this->upload->data();
                $data['list_paket'] = $file_data2['file_name'];
                // 'list_paket' => $file_data2['file_name'],
            }
        }
        $this->Admin_model->update('kategori', ['id_kategori' => $id], $data);
        redirect('admin/barang');
        // }
        // }
    }

    public function HistoriPesanan()
    {
        $data['title'] = 'Riwayat Pesanan';

        $data['admindata'] = $this->Admin_model->getAdmin();
        $data['pesanan'] = $this->Admin_model->getAllPesananHistory();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/historiPesanan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function postingan()
    {
        $data['title'] = 'Postingan';

        $data['admindata'] = $this->Admin_model->getAdmin();
        $data['postingan'] = $this->Admin_model->allPostingan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/postingan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahPostingan()
    {
        $data['title'] = 'Tambah Postingan';

        $data['admindata'] = $this->Admin_model->getAdmin();
        $data['postingan'] = $this->Admin_model->allPostingan();
        $data['namaKategori'] = $this->Admin_model->getAllkategori();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/tambahPostingan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function addPostingan()
    {
        $data = [
            'id_kategori' => $this->input->post('kategori'),
            'jenis' => htmlspecialchars($this->input->post('jenis')),
            'caption' => htmlspecialchars($this->input->post('caption')),
            'gambar' => $this->_uploadFile(),
        ];
        $this->Admin_model->add_Postingan($data);
        redirect('admin/postingan/');
    }

    public function ubahPostingan($id)
    {
        $data['title'] = 'Postingan';

        $data['admindata'] = $this->Admin_model->getAdmin();
        $data['postingan'] = $this->Admin_model->detailPostingan($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/editPostingan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function updatePostingan()
    {
        $id = $this->input->post('idposting');

        $data = [
            'id_kategori' => $this->input->post('kategori'),
            'jenis' => htmlspecialchars($this->input->post('jenis')),
            'caption' => htmlspecialchars($this->input->post('caption')),
            'id_kategori' => htmlspecialchars($this->input->post('idkategori')),
            'gambar' => $this->_uploadFile(),
        ];
        $this->Admin_model->update_postingan($id, $data);
        redirect('admin/postingan/');
    }

    public function uploadGambarLain()
    {
        $id = $this->input->post('idposting');
        $data = [
            'gambar2' => $this->_uploadFile(),
        ];
        $this->Admin_model->upload_GambarLain($id, $data);
        redirect('admin/postingan/');
    }

    public function hapusPostingan($id)
    {
        $this->Admin_model->delete_postingan($id);
        redirect('admin/postingan/');
    }

    private function _uploadFile()
    {

        $namaFiles = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $type = $_FILES['gambar']['type'];
        $eror = $_FILES['gambar']['error'];

        // $nama_file = str_replace(" ", "_", $namaFiles);
        $tmpName = $_FILES['gambar']['tmp_name'];

        // $nama_folder = "assets_user/file_upload/";
        // $file_baru = $nama_folder . basename($nama_file);

        // if ((($type == "video/mp4") || ($type == "video/3gpp")) && ($ukuranFile < 8000000)) {

        //   move_uploaded_file($tmpName, $file_baru);
        //   return $file_baru;
        // }

        if ($eror === 4) {
            $this->session->set_flashdata(
                'mm',
                '<div class="alert alert-danger alert-dismissible show" role="alert">
      Chose an image or video first!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>'
            );

            redirect('admin/postingan/');

            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFiles);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $this->session->set_flashdata(
                'mm',
                '<div class="alert alert-danger alert-dismissible show" role="alert">
      Your uploaded file is not image/video
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>'
            );

            redirect('admin/postingan/');
            return false;
        }

        $namaFilesBaru = uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file(
            $tmpName,
            'assetsKonsumen/images/product/' . $namaFilesBaru
        );

        return $namaFilesBaru;
    }
    public function email()
    {
        $this->load->model('Konsumen_model');
        if ($this->input->post()) {
            $data = $this->Konsumen_model->update("email_conf", ['id' => 1], ['email' => $this->input->post('email'), 'password' => $this->input->post('password')]);
            redirect('admin/email');
        } else {
            $data['title'] = 'Detail Pesanan';

            $data['admindata'] = $this->Admin_model->getAdmin();
            $data['email'] = $this->Konsumen_model->view_where("email_conf", ['id' => 1])->row();
            // $data = $this->
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/email', $data);
            $this->load->view('templates/footer', $data);
        }
    }
}
