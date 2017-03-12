<?php

namespace App\Http\Controllers\app;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PaymentMethod;
use Illuminate\Validation\Rule;

class PaymentMethodController extends Controller
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
        $items = PaymentMethod::all();

        return view('app.payment_method.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('payment_methods.store');
        $item = new PaymentMethod();
        $editMode = false;

        return view('app.payment_method.create', compact('item','action','editMode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        Validator::make($request->all(), [
            'name' => ['required',
                Rule::unique('payment_method'),
            ]
        ])->validate();

        PaymentMethod::create( request(['name']) );

        return redirect('payment_methods');
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
        $action = route('payment_methods.update', $id );
        $item = PaymentMethod::find($id);
        $editMode = true;
        
        return view('app.payment_method.create', compact('method','action','item','editMode'));
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
        Validator::make($request->all(), [
            'name' => ['required',
                Rule::unique('payment_method')->ignore($id),
            ]
        ])->validate();

        PaymentMethod::find($id)->update( request(['name']) );
        
        return redirect('payment_methods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PaymentMethod::destroy($id);
        return redirect('payment_methods');
    }
}