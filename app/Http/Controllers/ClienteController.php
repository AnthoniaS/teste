<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelCliente;
use App\User;


class ClienteController extends Controller
{
    private $objUser;
    private $objCliente;

    public function __construct()
    {
        $this->objUser=new User();
        $this->objCliente= new ModelCliente();
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return $this->objCliente->all();  

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=$this->objUser->all();
        return view('create',compact('users'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objCliente->create([
            'nomeCliente'=>$request->nomeCliente,
            'cpf'=>$request->cpf,
            'endereco'=>$request->endereco,
            'telefone'=>$request->telefone
         ]);
         if($cad){
             return redirect('clientes');
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
        $cliente=$this->objCliente->find($id);
        return view('show',compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente=$this->objCliente->find($id);
        $users=$this->objUser->all();
        return view ('create',compact('cliente', 'users'));
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
        $this->objCliente->where(['id=>$id'])->update([
            'nomeCliente'=>$request->nomeCliente,
            'cpf'=>$request->cpf,
            'endereco'=>$request->endereco,
            'telefone'=>$request->telefone
        
        ]);
        return redirect('clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objCliente->destroy($id);
        return($del)?"sim":"não";
    }
}
