<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todoList = Todo::get();

    return response()->json($todoList);
        
   }

   public function create(Request $request)
   {
        Todo::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'price' => $request['price'],
            'amount' => $request['amount'],
            'is_checked' => 0
        ]);
        $todoList = Todo::get();
        return response()->json([
                'status' => 200,
                'message' => 'Created',
                'todoList' => $todoList
        ]);
    }

    public function update(Request $request)
    {
        $todo = Todo::find($request['id']);
        $todo->title = $request['title'];
        $todo->description= $request['description'];
        $todo->price= $request['price'];
        $todo->amount = $request['amount'];
        $todo->save();
        $todoList = Todo::get();

        return response()->json([
            'status' => 200,
            'message' => 'Updated',
            'todoList' => $todoList
        ]);

    }
    public function delete(Request $request)
    {
        $todo = Todo::find($request['id']);     
        $todo->title = $request['title'];
        $todo->description= $request['description'];
        $todo->price= $request['price'];
        $todo->amount = $request['amount'];
        $todo->delete();
        $todoList = Todo::get();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted',
            'todoList' => $todoList
        ]);

    }
   }
