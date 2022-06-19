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
        'roles_id' => '1',
        'phone' => (string) $data['phone'] ?? null,
        'gender' => $data['gender'],
        'status' => 'actif',
        'birthdate' => $data['birthdate']
    ]);
   }

   public function getCustomer(Request $request)
   {
    
    $id = $request['id'];
    $customer = Customers::where('id', $request['id'])->get();
    return [
        'customer' => $customer
    ];
   }
    

   /* public function login(Request $request) 
   {
    if(!auth()->guard('customers')->attempt([
        'email' => $request->email,
        'password' => $request->password,
    ])) {
        return response([
            'message' => 'Invalid credentials.'
        ], Response::HTTP_UNAUTHORIZED); 
    }
        $user = auth()->guard('customers')->user();
        $token = $user->createToken('token')->plainTextToken; // we will store the token in the cookies
        $cookie = cookie('jwt', $token, 60*24); // token for 1 day
        return response([
            'message' => 'Success.',
            'token' => $token
        ], Response::HTTP_ACCEPTED)->withCookie($cookie);
   } */
}
