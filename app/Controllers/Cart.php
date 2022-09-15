<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\BlogpostModel;
use App\Models\KatagoriModel;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\TransaksiModel;
use CodeIgniter\HTTP\Request;


class Cart extends BaseController
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

    public function cek()
    {
        $response = $this->cart->contents();
        $data = json_encode($response);
        dd($data);
    }

    public function belanja()
    {
        $data = [
            'belanja' => $this->cart->contents(),
        ];

        return view('/home/cart', $data);
    }

    public function kota($provinsi)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=" . $provinsi,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: fa3a111c3a5b936f4cbbcbc859427b5b"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $kota = json_decode($response, true);

            if ($kota['rajaongkir']['status']['code'] = 200) {
                foreach ($kota['rajaongkir']['results'] as $kt) {
                    echo "<option value='$kt[city_id]'> $kt[city_name]</option>";
                }
            }
        }
    }



    public function detailorder()
    {
        $tujuan = $this->request->getVar('kota');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=278&destination=" . $tujuan . "&weight=500&courier=jne",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: fa3a111c3a5b936f4cbbcbc859427b5b"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $ongkir = json_decode($response, true);
        }

        $user = $this->user->getuser();

        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login !!!');
            return redirect()->to('/admin');
        }
        // elseif (session()->get('username') == $user['username']) {
        //     return redirect()->to('/home/product');
        // }

        $data = [
            'belanja' => $this->cart->contents(),
            'ongkir' => $ongkir,
        ];
        //dd($data);
        return view('/home/detail-order', $data);
    }

    public function add()
    {
        $this->cart->insert(array(
            'id'      => $this->request->getVar('id'),
            'qty'     => 1,
            'price'   => $this->request->getVar('price'),
            'name'    => $this->request->getVar('name'),
            'options' => array(
                'gambar' => $this->request->getVar('gambar'),
            )
        ));
        session()->setFlashdata('pesan', 'Barang berhasil ditambahkan ke keranjang');
        return redirect()->to('/home/product');
    }

    public function update()
    {
        $i = 1;
        // $data = $this->request->getVar('qty1');
        // dd($data);

        foreach ($this->cart->contents() as $item) {
            $this->cart->update(array(
                'rowid' => $item['rowid'],
                'qty' => $this->request->getVar('qty' . $i++)
            ));
        }
        session()->setFlashdata('pesan', 'Belanjaan berhasil diperbaharui');
        return redirect()->to('/cart/belanja');
    }

    public function delete($data)
    {
        $this->cart->remove($data);
        session()->setFlashdata('pesan', 'Barang berhasil dihapus');
        return redirect()->to('/cart/belanja');
    }

    public function clear()
    {
        $this->cart->destroy();
    }

    public function save_transaksi()
    {
        date_default_timezone_set("Asia/Bangkok");
        $belanja = $this->cart->contents();
        $random_id = random_int(0001, 9999);

        $ongkir = $this->request->getVar('ongkir');
        $total = $this->request->getVar('total');
        //dd($total);

        foreach ($belanja as $key) {
            $data = [
                'notransaksi' => $random_id,
                'user' => session()->get('username'),
                'kodeproduk' => $key['id'],
                'qty' => $key['qty'],
                'tanggal' => date('Y-m-d'),
                // 'admin' => ,
                // 'pembayaran' => '',
                'ongkir' => $ongkir,
                // 'no_resi' => '',
                // 'status' => '',
                'total' => $total

            ];
        }
        //dd($data);
        $this->transaksi->save($data);
        $this->clear();

        return redirect()->to('/home/thankyou');
    }


    // ----------- TRANSAKSI --------------------
    public function transaksi()
    {
        //auth
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login !!!');
            return redirect()->to('/admin');
        }

        $user =  session()->get('username');
        $data = [
            'transaksi' => $this->transaksi->where('user', $user)->orderBy('tanggal', 'DESC')->groupBy('notransaksi', 'asd')->getTransaksi(),
            'detailtransaksi' => $this->transaksi->where('user', $user)->getTransaksijoin()
        ];

        return view('/home/transaksi', $data);
    }

    public function detailtransaksi($notransaksi)
    {
        //auth
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login !!!');
            return redirect()->to('/admin');
        }

        $user =  session()->get('username');
        $data = [
            'transaksi' => $this->transaksi->where('user', $user)->groupBy('notransaksi', 'asd')->getTransaksi(),
            'detailtransaksi' => $this->transaksi->where('notransaksi', $notransaksi)->getTransaksijoin()
        ];

        return view('/home/transaksi-detail', $data);
    }

    public function updatepayment($notransaksi)
    {
        $image = \Config\Services::image();
        $db      = \Config\Database::connect();

        $file = $this->request->getFile('payment');
        $newName = $file->getRandomName();
        $image->withFile($file)
            ->save('../public/assets/payment/' . $newName);

        $builder = $db->table('transaksi');
        $data = [
            'pembayaran' => $newName,
            'status' => 1
        ];

        $builder->where('notransaksi', $notransaksi);
        $builder->update($data);

        return redirect()->to('/cart/transaksi/' . $notransaksi);
    }
}
