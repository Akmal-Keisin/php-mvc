<?php

namespace PhpMvc\App\Controller;

use PhpMvc\App\System\View;

class HomeController 
{
    public function index()
    {
        $model = [
            'title' => 'Home',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita aperiam deserunt soluta veniam, id voluptas deleniti et consequuntur eligendi officiis, quis eum adipisci, quidem culpa!'
        ];

        View::render('home/index.php', $model);
    }

    public function home()
    {
        echo "HomeController.home";
        return;
    }

    public function detail($id, $productId)
    {
        echo "detail " . $id . ' productId : ' . $productId;
        return;
    }
}