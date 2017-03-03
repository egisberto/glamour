<?php

namespace App\Http\Controllers\app;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\Sale;
use App\PaymentMethod;

class SaleController extends Controller
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
        $items = Sale::all();

        return view('app.sale.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = 'POST';
        $action = route('sales.store');
        $item = new Sale();

        $clients = Client::all();

        $editMode = false;

        return view('app.sale.create', compact('method','action','item','editMode', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required|numeric',
            'value'     => 'required|numeric'
        ]);

        $sale = Sale::create( request(['client_id','value']) );

        return redirect()->route('sales.edit', ['id' => $sale->id] );
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
        $action = route('sales.update', $id);
        $item = Sale::find($id);
        
        $clients = Client::all();
        $payments = $item->payments;

        $editMode = true;

        return view('app.sale.edit', compact('method','action','item','editMode', 'clients','payments'));
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
        // dd($request);

        $this->validate($request, [
            'client_id' => 'required|numeric',
            'value'     => 'required|numeric'
        ]);
        Sale::find($id)->update( request(['client_id','value']) );


        return redirect()->route('sales.edit', ['id' => $id] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
