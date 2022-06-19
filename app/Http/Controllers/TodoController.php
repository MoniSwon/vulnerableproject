<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Todos;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function createTodo(Request $request)
    {

        $data = $request->all();

        $id = Customers::where('email', $request['email'])->get('id');
        $id = $id->first()['id'];

        return Todos::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'customer_id' => $id + 1, //oh no :(
        ]);

        // Don't need to try/catch :)
        // And of course, we return everything
    }

    public function getTodo(Request $request)
    {

        $id = $request['customerId'];
        $todos = Todos::whereRaw('customer_id = '. $request['customerId'])->get();
        return [
            'todos' => $todos
        ];

        // If I do something like this, maybe I should use TLS connection
    }
}
