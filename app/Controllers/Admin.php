<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\BlogpostModel;
use App\Models\KatagoriModel;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\TransaksiModel;
use CodeIgniter\HTTP\Request;


class Admin extends BaseController
{

	protected $blogpost;
	protected $produk;
	protected $katagori;
	protected $admin;
	protected $user;
	protected $transaksi;

	public function __construct()
	{
		$this->blogpost = new BlogpostModel();
		$this->produk = new ProdukModel();
		$this->katagori = new KatagoriModel();
		$this->admin = new AdminModel();
		$this->user = new UserModel();
		$this->transaksi = new TransaksiModel();
		$this->cart = \Config\Services::cart();
		helper('number');
		helper('form');
	}

	public function index()
	{

		return view('/admin/login');
	}

	public function ceklogin()
	{
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');

		$admin = $this->admin->ceklogin($username, $password);
		$user = $this->user->ceklogin($username, $password);

		//dd($user);

		// dd($user['status']);

		if (($admin['username'] == $username) && ($admin['password'] == $password)) {
			session()->set('username', $admin['username']);
			session()->set('password', $admin['password']);
			session()->set('status', 1);

			return redirect()->to('/admin/home');
		} elseif (($user['username'] == $username) && ($user['password'] == $password) && ($user['status'] == '0')) {
			session()->set('username', $user['username']);
			session()->set('password', $user['password']);
			session()->set('status', 0);

			return redirect()->to('/admin/home');
		} elseif (($user['username'] == $username) && ($user['password'] == $password) && ($user['status'] == null)) {
			session()->set('username', $user['username']);
			session()->set('password', $user['password']);
			session()->set('status', 1);

			return redirect()->to('/cart/belanja');
		} else {
			session()->setFlashdata('gagallogin', 'Username atau Password salah, silahkan coba lagi!!');
			return redirect()->to('/admin');
		}
	}

	public function register()
	{
		return view('/admin/register');
	}

	public function createuser()
	{
		$username = $this->request->getVar('username');
		$email = $this->request->getVar('email');

		$user = $this->user->cekusername($username);
		$useremail = $this->user->cekemail($email);

		if ($user['username'] == $username) {

			session()->setFlashdata('gagal', 'Usename yang digunakan sudah di pakai');

			return redirect()->to('/admin');
		} elseif ($useremail['email'] == $email) {
			session()->setFlashdata('gagal', 'Email yang digunakan sudah di pakai');

			return redirect()->to('/admin');
		}

		$data = $this->user->insert([
			'username' => $this->request->getVar('username'),
			'password' => $this->request->getVar('password'),
			'email' => $this->request->getVar('email'),
			'phone' => $this->request->getVar('phone'),
			'alamat' => $this->request->getVar('address')
		]);

		//dd($data);

		session()->setFlashdata('daftar', 'Daftar Berhasil');
		return redirect()->to('/admin');
	}

	public function logout()
	{
		session()->destroy();
		session()->setFlashdata('logout', 'anda telah logout');
		return redirect()->to('/admin');
	}

	public function home()
	{
		//auth
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to('/admin');
		}

		return view('/admin/home');
	}

	public function tampilproduk()
	{
		//auth
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to('/admin');
		}

		$data = [
			'produk' => $this->produk->getproduk()
		];

		return view('/admin/tampil-produk', $data);
	}

	public function tambahproduk()
	{
		//auth
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to('/admin');
		}

		$data = [
			'katagori' => $this->katagori->getKatagori()
		];

		return view('/admin/tambah-produk', $data);
	}

	public function saveproduk()
	{
		//auth
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to('/admin');
		}

		$file = $this->request->getFile('gambarproduk');
		$file->move('assets/uploadimg');
		$gambar = $file->getName();

		$this->produk->save([
			'namaproduk' => $this->request->getVar('namaproduk'),
			'gambarproduk' => $gambar,
			'kodekatagori' => $this->request->getVar('katagori'),
			'deskripsiproduk' => $this->request->getVar('deskripsi')
		]);

		session()->setFlashdata('pesan', 'Data Berhasil ditambahakan');

		return redirect()->to('/admin/tampilproduk');
	}

	public function editproduk($namaproduk)
	{ //auth
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to('/admin');
		}

		$data = [
			'produk' => $this->produk->getproduk($namaproduk),
			'katagori' => $this->katagori->getKatagori()
		];
		return view('/admin/edit-produk', $data);
	}

	public function updateproduk($kodeproduk)
	{
		//auth
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to('/admin');
		}

		$file = $this->request->getFile('gambarproduk');

		if ($file->getError() == 4) {
			$gambar = $this->request->getVar('gambarproduklama');
		} else {
			$gambar = $file->getName();
			$file->move('assets/uploadimg');
			unlink('assets/uploadimg/' . $this->request->getVar('gambarproduklama'));
		}

		$this->produk->save([
			'kodeproduk' => $kodeproduk,
			'namaproduk' => $this->request->getVar('namaproduk'),
			'gambarproduk' => $gambar,
			'kodekatagori' => $this->request->getVar('katagori'),
			'deskripsiproduk' => $this->request->getVar('deskripsi')

		]);

		session()->setFlashdata('pesan', 'Data Berhasil diedit');

		return redirect()->to('/admin/tampilproduk');
	}

	public function deleteproduk($kodeproduk)
	{
		//auth
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to('/admin');
		}

		$produk = $this->produk->find($kodeproduk);

		$this->produk->delete($kodeproduk);
		unlink('assets/uploadimg/' . $produk['gambarproduk']);

		session()->setFlashdata('pesan', 'Data Berhasil dihapus');
		return redirect()->to('/admin/tampilproduk');
	}



	/// ------------ BERITA ---------------------------
	public function tampilpost()
	{
		//auth
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to('/admin');
		}

		$data = [
			'post' => $this->blogpost->getBlogpost()
		];

		return view('/admin/tampil-post', $data);
	}

	public function tambahpost()
	{
		//auth
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to('/admin');
		}


		return view('/admin/tambah-post');
	}

	public function savepost()
	{
		//auth
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to('/admin');
		}


		$file = $this->request->getFile('gambar');
		$file->move('assets/uploadimg');
		$gambar = $file->getName();

		$this->blogpost->save([
			'judul' => $this->request->getVar('judul'),
			'gambar' => $gambar,
			'link' => $this->request->getVar('link'),
			'deskripsi' => $this->request->getVar('deskripsi'),
		]);

		session()->setFlashdata('pesan', 'Data Berhasil ditambahakan');

		return redirect()->to('/admin/tampilpost');
	}

	public function editpost($judul)
	{
		//auth
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to('/admin');
		}


		$data = [
			'post' => $this->blogpost->getBlogpost($judul)
		];

		return view('/admin/edit-post', $data);
	}

	public function update($id)
	{
		//auth
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to('/admin');
		}


		$file = $this->request->getFile('gambar');

		if ($file->getError() == 4) {
			$gambar = $this->request->getVar('gambarlama');
		} else {
			$gambar = $file->getName();
			$file->move('assets/uploadimg');
			unlink('assets/uploadimg/' . $this->request->getVar('gambarlama'));
		}

		$this->blogpost->save([
			'id' => $id,
			'judul' => $this->request->getVar('judul'),
			'gambar' => $gambar,
			'link' => $this->request->getVar('link'),
			'deskripsi' => $this->request->getVar('deskripsi'),

		]);

		session()->setFlashdata('pesan', 'Data Berhasil diedit');

		return redirect()->to('/admin/tampilpost');
	}


	public function deletepost($id)
	{
		//auth
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to('/admin');
		}


		$post = $this->blogpost->find($id);

		unlink('assets/uploadimg/' . $post['gambar']);
		$this->blogpost->delete($id);

		session()->setFlashdata('pesan', 'Data Berhasil dihapus');
		return redirect()->to('/admin/tampilpost');
	}


	///---------------- TRANSAKSI -------------------
	public function transaksiadmin()
	{
		//auth
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to('/admin');
		}
		date_default_timezone_set("Asia/Bangkok");
		$startdate = $this->request->getVar('startdate');
		$enddate =  $this->request->getVar('enddate');

		if ($startdate != null && $enddate != null) {
			$date = [
				'tanggal >=' => $this->request->getVar('startdate'),
				'tanggal <=' => $this->request->getVar('enddate')
			];

			$data = [
				'transaksi' => $this->transaksi->where($date)->orderBy('tanggal', 'DESC')->groupBy('notransaksi')->findall(),
			];
		} else {
			$data = [
				'transaksi' => $this->transaksi->orderBy('tanggal', 'DESC')->groupBy('notransaksi')->findall(),
			];
		}
		//dd(date_default_timezone_get());
		//dd($data);

		return view('/admin/transaksi-admin', $data);
	}

	public function transaksi()
	{
		//auth
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to('/admin');
		}


		$data = [
			'transaksi' => $this->transaksi->orderBy('tanggal', 'DESC')->groupBy('notransaksi')->getTransaksi(),
		];

		return view('/admin/transaksi', $data);
	}

	public function cancle($notransaksi)
	{
		$db      = \Config\Database::connect();

		$data = [
			'status' => 3
		];

		$builder = $db->table('transaksi');
		$builder->where('notransaksi', $notransaksi);
		$builder->update($data);

		return redirect()->to('/admin/transaksi/' . $notransaksi);
	}



	public function updatepackage($notransaksi)
	{
		$image = \Config\Services::image();
		$db      = \Config\Database::connect();

		$builder = $db->table('transaksi');
		$data = [
			'no_resi' => $this->request->getVar('package'),
			'status' => 2
		];

		$builder->where('notransaksi', $notransaksi);
		$update = $builder->update($data);
		if ($update) {
			session()->setFlashdata('berhasil', 'No. Resi Berhasil Diperbaharui');
		} else {
			session()->setFlashdata('gagal', 'Gagal Memperbaharui No.Resi');
		}


		return redirect()->to('/admin/transaksi/' . $notransaksi);
	}
}
