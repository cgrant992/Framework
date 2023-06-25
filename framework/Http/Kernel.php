<?php

namespace Caden\Framework\Http;

class Kernel {
    public function handle(Request $request): Response {
        $content = '<h1>Hello World</h1>';

        return new Response($content);
    }
}