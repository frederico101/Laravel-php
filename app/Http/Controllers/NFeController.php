<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\NFeService;

class NFeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "201";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //gerarNFe();

      //  return 2019;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nfe_service = new NFeService([
                "atualizacao" => "2015-10-02 06:01:21",
                "tpAmb" => 2,
                "razaosocial" => "Fake Materiais de construção Ltda",
                "siglaUF" => "SP",
                "cnpj" => "00716345000119",
                "schemes" => "PL_008i2",
                "versao" => "3.10",
                "tokenIBPT" => "AAAAAAA",
                "CSC" => "GPB0JBWLUR6HWFTVEAS6RJ69GPCROFPBBB8G",
                "CSCid" => "000002"
                ]);
       return $nfe_service->gerarNFe();
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
