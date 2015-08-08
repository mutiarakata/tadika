<?php

namespace App\Http\Controllers;

class ApiController extends Controller
{
    public function index() {

        return $this->response->array(['Everything will be 200 ok!']);
    }
}
