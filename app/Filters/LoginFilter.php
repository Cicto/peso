<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        var_dump(logged_in());
        // if(!logged_in())
        // {
        //     var_dump('asdasd');
        //     // return redirect()->to(site_url().'/login');
        // }
        // else{
        //     echo 'asdas';
        // }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}