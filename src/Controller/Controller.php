<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

class Controller extends BaseController
{
    protected function requestJson($request)
    {
        $data = $request->getContent();

        if ($data) {
            return json_decode($data, true);
        }
    }
}