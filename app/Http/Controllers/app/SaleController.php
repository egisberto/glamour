<?php

namespace App\Http\Controllers\app;

use Illuminate\Http\Request;
use Validator;
// use Redirect;
use App\Http\Controllers\Controller;
use App\Client;
use App\Sale;
use App\PaymentMethod;
use Barryvdh\DomPDF\Facade as PDF;
// use Illuminate\Support\Facades as Redirect;
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
        $clients = $clients->pluck('name','id');
        
        $editMode = false;

        $conditionDefault = 
        "Armação\t\t\tR$ \n" .
        "Lente\t\t\t\tR$ \n" .
        "Total\t\t\t\tR$ \n" .
        "Total com Desconto\tR$ \n" .
        "Entrada\t\t\t\tR$ \n";

        $descriptionLabDefault = 
        "Lentes: \n" .
        "Armação: \n" .
        "Cor: \n" .
        "Obs: ";

        return view('app.sale.create', compact('method','action','item','editMode', 'clients', 'conditionDefault', 'descriptionLabDefault'));
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
            'value'     => 'required|numeric',
            'description' => 'nullable|string',
            'condition' => 'nullable|string',
            'longe_od_esferico' => 'nullable|numeric',
            'longe_od_cilindrico' => 'nullable|numeric',
            'longe_od_eixo' => 'nullable|numeric',
            'longe_od_dp' => 'nullable|numeric',
            'longe_oe_esferico' => 'nullable|numeric',
            'longe_oe_cilindrico' => 'nullable|numeric',
            'longe_oe_eixo' => 'nullable|numeric',
            'longe_oe_dp' => 'nullable|numeric',
            'perto_od_esferico' => 'nullable|numeric',
            'perto_od_cilindrico' => 'nullable|numeric',
            'perto_od_eixo' => 'nullable|numeric',
            'perto_od_dp' => 'nullable|numeric',
            'perto_oe_esferico' => 'nullable|numeric',
            'perto_oe_cilindrico' => 'nullable|numeric',
            'perto_oe_eixo' => 'nullable|numeric',
            'perto_oe_dp' => 'nullable|numeric'
        ]);

        $sale = Sale::create( request(['client_id','value','description','condition','longe_od_esferico','longe_od_cilindrico','longe_od_eixo','longe_od_dp','longe_oe_esferico','longe_oe_cilindrico','longe_oe_eixo','longe_oe_dp','perto_od_esferico','perto_od_cilindrico','perto_od_eixo','perto_od_dp','perto_oe_esferico','perto_oe_cilindrico','perto_oe_eixo','perto_oe_dp','addition','description_lab']) );

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

        //Borderô PDF file is stored under project/public/download/info.pdf
        $fileBordero = "";
        if ( file_exists( public_path(). "/borderos/bordero_$id.pdf") ) {
            $fileBordero = public_path(). "/borderos/bordero_$id.pdf";    
        }
        
        //OS PDF file is stored under project/public/download/info.pdf
        $fileOS = "";
        if ( file_exists( public_path(). "/OS/OS_$id.pdf") ) {
            $fileOS = public_path(). "/OS/OS_$id.pdf";    
        }
        
        return view('app.sale.edit', compact('method','action','item','editMode', 'clients','payments','fileBordero','fileOS'));
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
            'value'     => 'required|numeric',
            'description' => 'nullable|string',
            'condition' => 'nullable|string',
            'longe_od_esferico' => 'nullable|numeric',
            'longe_od_cilindrico' => 'nullable|numeric',
            'longe_od_eixo' => 'nullable|numeric',
            'longe_od_dp' => 'nullable|numeric',
            'longe_oe_esferico' => 'nullable|numeric',
            'longe_oe_cilindrico' => 'nullable|numeric',
            'longe_oe_eixo' => 'nullable|numeric',
            'longe_oe_dp' => 'nullable|numeric',
            'perto_od_esferico' => 'nullable|numeric',
            'perto_od_cilindrico' => 'nullable|numeric',
            'perto_od_eixo' => 'nullable|numeric',
            'perto_od_dp' => 'nullable|numeric',
            'perto_oe_esferico' => 'nullable|numeric',
            'perto_oe_cilindrico' => 'nullable|numeric',
            'perto_oe_eixo' => 'nullable|numeric',
            'perto_oe_dp' => 'nullable|numeric'
        ]);
        Sale::find($id)->update( request(['client_id','value','description','condition','longe_od_esferico','longe_od_cilindrico','longe_od_eixo','longe_od_dp','longe_oe_esferico','longe_oe_cilindrico','longe_oe_eixo','longe_oe_dp','perto_od_esferico','perto_od_cilindrico','perto_od_eixo','perto_od_dp','perto_oe_esferico','perto_oe_cilindrico','perto_oe_eixo','perto_oe_dp','addition','description_lab']) );


        return redirect()->route('sales.edit', ['id' => $id] );
    }

    /**
     * Generates a OS from the sale
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generateOS(Request $request)
    {
        $item = Sale::find($request['id']);

        // return view('app.sale.os', ['item' => $item, 'client' => $item->client] );

        $path = public_path(). "/OS/OS_{$request['id']}.pdf";

        if ( file_exists( $path ) ) {
            unlink($path);
        }
        
        $pdf = PDF::loadView('app.sale.os', ['item' => $item, 'client' => $item->client] );
        return $pdf->save($path)
                    ->download("OS_{$request['id']}.pdf");

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
