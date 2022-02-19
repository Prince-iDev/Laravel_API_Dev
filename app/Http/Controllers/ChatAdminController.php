<?php

namespace App\Http\Controllers;

use App\Models\chatAdmin;
use Illuminate\Http\Request;

class ChatAdminController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chatAdmin  $chatAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(chatAdmin $chatAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chatAdmin  $chatAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, chatAdmin $chatAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chatAdmin  $chatAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(chatAdmin $chatAdmin)
    {
        //
    }
}
