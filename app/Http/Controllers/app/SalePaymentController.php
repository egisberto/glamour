<?php

namespace App\Http\Controllers\app;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sale;
use App\SalePayment;
use App\PaymentMethod;

class SalePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $action = route('sale_payments.store');
        $item = new SalePayment();
        $editMode = false;
        $sale_id = $request['sale_id'];

        $paymentMethods = PaymentMethod::all();

        
        return view('app.sale_payment.create', compact('action','item','editMode', 'clients', 'paymentMethods','sale_id'));
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
            'sale_id'           => 'required|numeric',
            'payment_method_id' => 'required|numeric',
            'value'             => 'required|numeric',
            'bandeira'          => 'nullable|string',
            'description'       => 'nullable|string'
        ]);

        SalePayment::create( request(['sale_id','payment_method_id','value','bandeira','description']) );

        return redirect()->route('sales.edit', ['id' => $request['sale_id']] );
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
        $action = route('sale_payments.update', $id);
        $item = SalePayment::find($id);
        $editMode = true;
        $sale_id = $item['sale_id'];

        $paymentMethods = PaymentMethod::all();

        
        return view('app.sale_payment.create', compact('action','item','editMode', 'paymentMethods','sale_id'));
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
        $this->validate($request, [
            'sale_id'           => 'required|numeric',
            'payment_method_id' => 'required|numeric',
            'value'             => 'required|numeric',
            'bandeira'          => 'nullable|string',
            'description'       => 'nullable|string'
        ]);

        SalePayment::find($id)->update( request(['sale_id','payment_method_id','value','bandeira','description']) );
        return redirect()->route('sales.edit', ['id' => $request['sale_id'] ] );
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

    /**
     * Show the form for creating a new bordero.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createBordero(Request $request)
    {
        $sale = SalePayment::find( $request['sale_id'] );

        $value      = $request['value'];
        $dateInit   = $request['date_init'];
        $qtd        = $request['qtd'];

        dd( $request->all() );

        return view('app.sale_payment.bordero', compact('sale','value','dateInit','qtd'));
    }

    
}
