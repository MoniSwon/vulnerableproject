<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthentificationController extends Controller
{
    public function createCustomer(Request $request)
    {

        $data = $request->all();

        return Customers::create([
            'last_name' => $data['lastName'],
            'first_name' => $data['firstName'],
            'email' => $data['email'],
            'password' => $data['password'], // the password is not hashed :)
            'phone' => (string) $data['phone'] ?? null,
            'gender' => $data['gender'],
            'status' => 'actif',
            'birthdate' => $data['birthdate']
        ]);

        // I think we don't need to catch error and return a message in case of issue
    }

    public function getCustomer(Request $request)
    {

        $id = $request['id'];
        $customer = Customers::where('id', $request['id'])->get();
        return [
            'customer' => $customer
        ];
    }


    public function login(Request $request)
    {
        $resultEmail = Customers::where('email', $request['email'])->value('password'); // I think it's the best way to check the password :)
        if ($resultEmail == []) {
            return "L'email n'est pas dans la base de données";
        } else {
            if ($resultEmail == $request['password']) {
                // return Customers::where('email', $request['email'])->get(); --> Instead of returning a token, why can't we just return everything ? I think it will save the number of request, really...
                return Customers::where('email', $request['email'])->get('id');
            } else {
                return 'Ce n\'est pas le bon mot de passe, mais l\'email existe.';
            }
        }
    }
}
