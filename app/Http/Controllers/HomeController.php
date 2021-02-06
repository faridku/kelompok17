<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;

// sweet alert
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/home');
    }
    public function edit($id)
    {
        $list = User::all();
        $user = $list->find($id);
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // $this->validate(request(), [
        //     'name'    => 'required',
        //     'fname'    => 'required',
        //     'lname'    => 'required',
        //     'email'    => 'required',
        //     'alamat'    => 'required',
        //     'nohp'    => 'required',
        //     'foto'    => 'required',
        // ]);
        $user = User::find($id);

        $user->name = $request['name'];
        $user->fname = $request['fname'];
        $user->lname = $request['lname'];
        $user->email = $request['email'];
        $user->alamat = $request['alamat'];
        $user->nohp = $request['nohp'];
        $user->foto = $request['foto'];

        $user->save();
        Alert::success('Success', 'Profil has been updated');
        return redirect('home');
    }
    public function sertif($id)
    {
        $list = User::all();
        $user = $list->find($id);
        $pdf = PDF::loadView('profile.sertif', compact('user'));
        return $pdf->download('sertif.pdf');
        // return view('profile.sertif', compact('user'));
    }
}
