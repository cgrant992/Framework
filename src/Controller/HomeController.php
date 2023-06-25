<?php

namespace App\Controller;

use Caden\Framework\Http\Response;

class HomeController {
    public function index(): Response {
        return new Response('<h1>Hello World</h1>');
    }
}