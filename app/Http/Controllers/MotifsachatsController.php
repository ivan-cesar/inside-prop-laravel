<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Motifsachat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MotifsachatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        View::share( 'section_title', 'Module utilisateur' );


        View::share('users',User::all());
        View::share('achats',Achat::all());
        View::share('motifAchats',Motifsachat::all());


    }
    public function index()
    {
        $data['page_title'] = "Liste des motifs d'absences - ";
        $data['page_description'] = "";
        $data['motifAchats'] = Motifsachat::orderBy("id","DESC")->get();
        
        return view('achats.create',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
