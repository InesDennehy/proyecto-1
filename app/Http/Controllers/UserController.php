<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Auth;

class UserController extends Controller
{
    public function index($username){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
		return view('profile.show', compact('user'));
	}

	public function edit($username){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
		if($user->id == Auth::user()->id){
			return view('profile.edit', compact('user'));
		}
		else{
			abort('403', 'Unauthorized access');
		}
	}

	public function update($username){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
		$user->nickname = request('nickname') != null ? request('nickname') : '';
		$user->bio = request('bio') != null ? request('bio') : '';
		$user->save();
		return redirect('/profile/'.$username);
	}
}
