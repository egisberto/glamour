<?php

namespace App\Http\Controllers\app;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Validator;

use App\Http\Controllers\Controller;
use App\Client;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Client::all();

        return view('app.client.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = 'POST';
        $action = route('clients.store');
        $item = new Client();
        $editMode = false;

        return view('app.client.create', compact('method','action','item','editMode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        
        // if($request->ajax()){
        //     $this->validate($request, [
        //         'name' =>   'required|unique:client|max:255',
        //         'email' =>  'nullable|email',
        //         'cpf' =>    'nullable|cpf',
        //     ]);

        //     return response()->json(['response' => 'This is a AJAX request']); 
        // }
        
        Validator::make($request->all(), [
            'name' =>   'required|unique:client|max:255',
            'email' =>  'nullable|email',
            'cpf' =>    'nullable|cpf',
        ])->validate();

        Client::create( request(['name','email','rg','cpf','address','phone','celphone']) );

        if($request->ajax()){
            return response()->json(['response' => 'Cliente Cadastrado com sucesso!']); 
        }

        return redirect('clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $method = 'POST';
        $action = route('clients.update', $id );
        $item = Client::find($id);
        $editMode = true;
        
        return view('app.client.create', compact('method','action','item','editMode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                Rule::unique('client')->ignore($id),
            ],
            'email' =>  'nullable|email',
            // 'cpf' =>    '999.999.999-99',
            'cpf' =>    'nullable|cpf',
            'phone' => '(77)99999-3333',
            'phone' => 'nullable|telefone_com_ddd',
            'celphone' => '(77)99999-3333',
            'celphone' => 'nullable|telefone_com_ddd',
        ])->validate();

        Client::find($id)->update( request(['name','email','rg','cpf','address','phone','celphone']) );
        
        return redirect('clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Client::destroy($id);
        return redirect('clients');
    }
}
