<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('users.index')
		->with('users', User::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::user())
		{
			return Redirect::to('/');
		}
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator=Validator::make(Input::all(), User::$rules);

		if($validator->passes()){
			$user=new User;
			$user->name=Input::get('name');
			$user->email=Input::get('email');
			$user->password=Hash::make(Input::get('password'));
			$user->save();
		
			return Redirect::to('/u')->with('message', 'Thanks for signing up.. :)');
		}
        return Redirect::to('/u/create')->with('message', 'Something went wrong')->withErrors($validator)->withInput();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if(!Auth::user())
			return Redirect::to('/');
		elseif(Auth::user()->id==$id)
		$posts= User::find($id)->postFor;
	else
		$posts= User::find($id)->postFor()->where('post_by','=', Auth::user()->id)->get();
		return View::make('users.show')
		->with('user', User::find($id))
		->with('posts', $posts);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function search(){
		$keyword=Input::get('Search');
		return View::make('users.search')
		->with('users', User::where('name', 'LIKE', '%'.$keyword.'%')->get())
		->with('keyword', $keyword);
	}

	public function signin(){
		if(Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password'))))
		{
			return Redirect::to('/')->with('message', 'Thanks for signing in');
		}

		return Redirect::to('/')->with('message', 'Your Email/Password is Incorrect');	}

	public function signout(){
		Auth::logout();
		return Redirect::to('/')->with('message', 'Your are Signed out');
	}

}