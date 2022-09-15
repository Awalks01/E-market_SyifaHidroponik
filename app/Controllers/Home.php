<?php

namespace App\Controllers;

use App\Models\BlogpostModel;
use App\Models\KatagoriModel;
use App\Models\ProdukModel;
use App\Models\ProdukKatagori;
use App\Models\UserModel;

class Home extends BaseController
{

	protected $blogpost;
	protected $produk;
	protected $user;
	protected $katagori;

	public function __construct()
	{
		$this->blogpost = new BlogpostModel();
		$this->produk = new ProdukModel();
		$this->user = new UserModel();
		$this->katagori = new KatagoriModel();
		$this->cart = \Config\Services::cart();
		helper('number');
		helper('form');
	}
	public function index()
	{
		// $data = [
		// 	'post' => $this->blogpost->getBlogpost3()
		// ];

		return view('/home/landing_page');
	}

	public function about()
	{
		return view('/home/about');
	}

	public function product()
	{
		$data = [
			'produk' => $this->produk->getProduk(),
			'katagori' => $this->katagori->getKatagori(),
			'cart' => $this->cart->contents(),
			'totalitem' => $this->cart->totalItems()
		];

		return view('/home/produk', $data);
	}

	public function producttag($katagori)
	{
		$data = [
			'produk' => $this->produk->getProduktag($katagori),
			'katagori' => $this->katagori->getKatagori(),
			'cart' => $this->cart->contents(),
			'totalitem' => $this->cart->totalItems()
		];

		return view('/home/produk', $data);
	}

	public function detailproduk($namaproduk)
	{
		$data = [
			'produk' => $this->produk->getproduk($namaproduk)
		];

		//jika data tidak ada di tabel
		if (empty($data['produk'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk ' . $namaproduk . ' tidak ditemukan');
		}

		return view('/home/detailproduk', $data);
	}

	public function blog()
	{

		$data = [
			'post' => $this->blogpost->getBlogpost()
		];

		return view('/home/blog', $data);
	}

	public function detailblog($judul)
	{
		$data = [
			'post' => $this->blogpost->getBlogpost($judul)
		];

		//jika tidak ada di tabel
		if (empty($data['post'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Postingan ' . $judul . ' tidak ditemukan');
		}

		return view('/home/detailblog', $data);
	}


	public function profile()
	{
		$username = session()->get('username');

		$data = [
			'user' => $this->user->where('username', $username)->getuser()
		];

		//dd($data);

		return view('/home/profile', $data);
	}

	public function save()
	{
		$data = [
			'username' => $this->request->getVar('username'),
			'password' => $this->request->getVar('password'),
			'nama' => $this->request->getVar('nama'),
			'email' => $this->request->getVar('email'),
			'phone' => $this->request->getVar('phone'),
			'alamat' => $this->request->getVar('alamat')
		];

		//dd($data);
		$this->user->save($data);

		//return redirect()->to('/home/profile');
	}

	public function thankyou()
	{
		return view('/home/thank');
	}
}
