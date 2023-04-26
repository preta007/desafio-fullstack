<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')->get();
        return response()->json($customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->nome = $request->nome;
        $customer->email = $request->email;
        $customer->telefone = $request->telefone;
        $customer->cep = $request->cep;
        $customer->rua = $request->rua;
        $customer->complemento = $request->complemento;
        $customer->bairro = $request->bairro;
        $customer->cidade = $request->cidade;
        $customer->save();
        return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
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
        $customer = Customer::findOrFail($id);
        $customer->nome = $request->nome;
        $customer->email = $request->email;
        $customer->telefone = $request->telefone;
        $customer->cep = $request->cep;
        $customer->rua = $request->rua;
        $customer->complemento = $request->complemento;
        $customer->bairro = $request->bairro;
        $customer->cidade = $request->cidade;
        $customer->save();
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return response()->json($customer);
    }
}
