<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterMitra implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    // Do something here
    if (session()->get('level') == "") {
      session()->setFlashdata('pesan', 'Anda Belum Login! , Silahkan Login!');
      return redirect()->to(base_url('auth/login'));
    }
  }

  //--------------------------------------------------------------------

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
    if (session()->get('level') == 3) {
      return redirect()->to(base_url('home'));
    }
  }
}
