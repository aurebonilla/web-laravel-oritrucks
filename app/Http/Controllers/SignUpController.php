<?php

namespace App\Http\Controllers;

use Exception;

use Illuminate\Http\Request;

use App\Models\Cliente;

class SignUpController extends Controller
{

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {

        $name = $request->name;
        $email = $request->email;
        $uphone = $request->phone;

        $cliente = new Cliente();
        $cliente->name = $name;
        $cliente->email = $email;
        $cliente->password = 'xxx.yyy';
        $cliente->save();


        $phone = new Phone();

        $phone->country = '34';
        $phone->number = $uphone;

        $phone->cliente()->associate($cliente);
        $phone->save();

        return view('user.profile', ['user' => $cliente]);
    }

}
