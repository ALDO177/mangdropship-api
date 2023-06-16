<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuplierStoreControllers extends Controller
{
    public function index()
    {
        return ['name' => 'Hello World'];
    }

    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

    
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
