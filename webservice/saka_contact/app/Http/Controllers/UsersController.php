<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Http\Requests;
use App\CompanyDomains;
use App\Users;
use App\Companies;
use App\StatusTypes;
use App\Roles;
use Response;

class UsersController extends Controller
{
/**
 * Handle process request index
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\Response
 */
   public function index(Request $request)
	{
		$users = Users::get();
		return view('users.index')->with(['data'=>$users]);
	}

	public function getAdd(Request $request)
	{
		$data['companies'] = Companies::get();
		$data['roles'] = Roles::get();
		$data['status_types'] = StatusTypes::get();
		return view('users.users_add')->with($data);
	}

	public function postAdd(Request $request)
	{
		$validate = Validator::make($request->all(), [
    		'id'				=> 'required|numeric|unique:users,id',
    		'email'				=> 'required|email|unique:users,email',
    		'first_name'		=> 'required',
    		'last_name'			=> 'required',
    		'profile_picture'	=> 'required',
    		'password'			=> 'required',
    		'phone'				=> 'required|numeric',
    		'twitter'			=> 'required',
    		'facebook'			=> 'required',
    		'linkedin'			=> 'required',
    		'registered'		=> 'required',
    		'roles_id'			=> 'required',
    		'companies_id'		=> 'required',
    		'status_types_id'	=> 'required',
    		'status_description'=> 'required',
    		

    	]);

    	if ($validate->fails())
		{
			//return Response::json($validate->errors()->all());
			return redirect('dashboard/users/add')->withErrors($validate)->withInput($request->all());
		}

		$users = new Users;
		$users->id 				= $request->id;
		$users->email 			= $request->email;
		$users->first_name 		= $request->first_name;
		$users->last_name 		= $request->last_name;
		$users->profile_picture = $request->profile_picture;
		$users->password 		= $request->password;
		$users->phone			= $request->phone;			
		$users->twitter			= $request->twitter;			
		$users->facebook		= $request->facebook;		
		$users->linkedin		= $request->linkedin;		
		$users->registered 		= $request->registered;
		$users->roles_id 		= $request->roles_id;
		$users->companies_id 	= $request->companies_id;
		$users->status_types_id = $request->status_types_id;
		$users->status_description = $request->status_description;		
		$users->save();

		//return Response::json("success insert with id : ".$users->id);
		return redirect('dashboard/users/');
	}
	/**
	 * Handle process request getUpdate
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function getUpdate(Request $request, $id)
	{
		if (is_null($users = Users::find($id))) {
			die('Users does not exists');
		}

		$request->merge($users->toArray());
		$request->flash();
		$data['companies'] = Companies::get();
		$data['roles'] = Roles::get();
		$data['status_types'] = StatusTypes::get();
		return view('users.users_add')->with($data);
		}

	/**
	 * Handle process request postUpdate
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function postUpdate(Request $request, $id)
	{
		if (is_null($users = Users::find($id))) {
			die('Company Domains does not exists');
		}
		$validate = Validator::make($request->all(), [
			'email'				=> 'required|email|unique:users,email,'.$id.',id',
			'first_name'		=> 'required',
    		'last_name'			=> 'required',
    		'profile_picture'	=> 'required',
    		'password'			=> 'required',
    		'phone'				=> 'required',
    		'twitter'			=> 'required',
    		'facebook'			=> 'required',
    		'linkedin'			=> 'required',
    		'registered'		=> 'required',
    		'roles_id'			=> 'required',
    		'companies_id'		=> 'required',
    		'status_types_id'	=> 'required',
    		'status_description'=> 'required',
    	]);

		if ($validate->fails())
		{
			//return Response::json($validate->errors()->all());
			return redirect('dashboard/users/update/'.$id)->withErrors($validate)->withInput($request->all());
		}

		$users->email			= $request->email;
		$users->first_name 		= $request->first_name;
		$users->last_name 		= $request->last_name;
		$users->profile_picture = $request->profile_picture;
		$users->password 		= $request->password;
		$users->phone			= $request->phone;			
		$users->twitter			= $request->twitter;			
		$users->facebook		= $request->facebook;		
		$users->linkedin		= $request->linkedin;		
		$users->registered 		= $request->registered;
		$users->roles_id 		= $request->roles_id;
		$users->companies_id 	= $request->companies_id;
		$users->status_types_id = $request->status_types_id;
		$users->status_description = $request->status_description;	
		$users->save();

		//return Response::json("success Update data with id : ".$users->id);
		return redirect('dashboard/users/');
	}

	/**
	 * Handle process request delete
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function delete(Request $request, $id)
	{
		if (is_null($users = Users::find($id))) {
			die('Users does not exists');
		}

		$users->delete();
	}
}
