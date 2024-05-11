<?php

namespace PhpMvc\App\Controller;

class HomeController 
{
    public function index()
    {
        require_once __DIR__ . "/../view/index.php";
    }

    public function home()
    {
        echo "home";
        return;
    }

    public function detail($id, $productId)
    {
        echo "detail " . $id . ' productId : ' . $productId;
        return;
    }
}