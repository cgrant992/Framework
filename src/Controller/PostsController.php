<?php

namespace App\Controller;

use Caden\Framework\Http\Response;

class PostsController {
    public function show(int $id): Response {
        return new Response($id);
    }
}