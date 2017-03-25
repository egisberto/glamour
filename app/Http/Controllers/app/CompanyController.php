<?php

namespace App\Http\Controllers\app;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Company;
use App\Profile;
use App\User;

use Validator;

class CompanyController extends Controller
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
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // Validate the user
        Validator::make($request->get('user'), [
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|min:6|confirmed',
        ])->validate();

        // Validate the Company
        Validator::make($request->get('company'), [
            'name'      => 'required|max:255',
            'cnpj'      =>    '99.999.999/9999-99',
            'cnpj'      =>    'required|cnpj|unique:company',
            'phone'     => '(77)9999-3333',
            'phone'     => 'nullable|telefone_com_ddd',
            'celphone'  => '(77)99999-3333',
            'celphone'  => 'nullable|celular_com_ddd',
            
        ])->validate();

        //Create the company
        $company = Company::create( $request->get("company") );

        //Create the user
        
        $userRequest = $request->get("user");

        $originalPassword = $userRequest['password'];

        $userRequest['company_id'] = $company->id;
        $userRequest['profile_id'] = Profile::getProfileOwner();
        $userRequest['password'] = Hash::make($userRequest['password']);
        
        event(new Registered(User::create( $userRequest )));

        if ( Auth::attempt( ['email' => $userRequest['email'], 'password' => $originalPassword] ) ) {
            return redirect("home")->with('status', 'Cadastro efetuado com sucesso! Seja bem-vindo.');
        }
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
        //
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
        //
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
