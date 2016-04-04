<?php

namespace App\Api\Controllers;

use Illuminate\Http\Request;

use Api;
use Validator;
use Hash;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Companies;
use App\CompanyDomains;
use App\StatusTypes;
use App\Roles;
use App\Users;
use Response;

class ApiUsersController extends Controller
{
	/**
	 * This is all data from table users, click Send for view all data
	 *
	 * @return json
	 */
	public function getList()
	{
		$users=Users::all();
		return Response::json($users,200);
	}

	/**
	 * find users by id number
	 *
	 * @param id | id of Users | required
	 * @return json
	 */
	public function getFind(Request $request)
	{
		$users=Users::find($request->id);
		if(is_null($users))
		{
			return Api::responseFailed('Data not found',404);
		}
	
		return Api::responseSuccess('Data users id: '.$users->id, $users);
	}

	/**
	 * login users by id number
	 *
	 * @param email | email of Users | required
	 * @param password | password of Users | required
	 * @return json
	 */
	public function getLogin(Request $request)
	{
		$validate = Validator::make($request->all(), [
			'email' => 'required|email',
			'password' => 'required',
		]);
		
		if ($validate->fails())
		{		
			return Api::responseFailed($validate->messages()->first());	
		}

		$users=Users::whereEmail($request->email)->wherePassword($request->password)->first();

		if(!is_null($users))
		{
			// if (Hash::check($request->password, $users->password)) 
			{
				return Api::responseSuccess('Success Login:', $users);
			}
		}
		return Api::responseFailed('Email or Password failed',404);
	}

	/**
	 * Handle process request getRegister
	 *
	 * @param email | email of Users | required
	 * @return json
	 */
	public function getRegister(Request $request)
	{
	    $validate = Validator::make($request->all(), [
			'email' => 'required|email',
		]);
		
		if ($validate->fails())
		{		
			return Api::responseFailed($validate->messages()->first());	
		}

		$users=Users::whereEmail($request->email)->first();
		if(!is_null($users))
		{
			return Api::responseSuccess('Success Login:', $users);
		}
		return Api::responseFailed('Email failed',404);
	}

	/**
	 * add new users
	 *
	 * @param email | email of Users | required
	 * @param first_name | first name of Users | required
	 * @param last_name | last name of Users | required
	 * @param profile_picture | url of photo profile  | required
	 * @param password | password for Users | required
	 * @param phone | number phone | required,numeric
	 * @param twitter | twitter account  | required
	 * @param facebook | facebook account | required
	 * @param linkedin | linkendin account | required
	 * @param registered | registered of Users | required
	 * @param roles_id | id of Roles | required
	 * @param companies_id | id of Companies | required
	 * @param status_types_id | id of Statustypes | required
	 * @param status_description | description of status | required
	 * @return json
	 */
	public function postAdd(Request $request)
	{
			$validate = Validator::make($request->all(), [
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
			return Response::json($validate->errors()->all());
		}
	
		$users = new Users;
		$users->email				= $request->input('email');
		$users->first_name 			= $request->input('first_name');
		$users->last_name 			= $request->input('last_name');
		$users->profile_picture 	= $request->input('profile_picture');
		$users->password 			= MD5($request->input('password'));
		$users->phone 				= $request->input('phone');
		$users->twitter 			= $request->input('twitter');
		$users->facebook 			= $request->input('facebook');
		$users->linkedin 			= $request->input('linkedin');
		$users->registered 			= $request->input('registered');
		$users->roles_id 			= $request->input('roles_id');
		$users->companies_id 		= $request->input('companies_id');
		$users->status_types_id 	= $request->input('status_types_id');	
		$users->status_description	= $request->input('status_description');	
		$users->save();

		return Api::responseSuccess("Success insert with id : ".$users->id,200);
	}

	/**
	 * update users by id number
	 *
	 * @param id | id of comoanies | required
	 * @param email | email of Users | required
	 * @param first_name | first name of Users | required
	 * @param last_name | last name of Users | required
	 * @param profile_picture | url of photo profile  | required
	 * @param password | password for Users | required
	 * @param phone | number phone | required,numeric
	 * @param twitter | twitter account  | required
	 * @param facebook | facebook account | required
	 * @param linkedin | linkendin account | required
	 * @param registered | registered of Users | required
	 * @param roles_id | id of Roles | required
	 * @param companies_id | id of Companies | required
	 * @param status_types_id | id of Statustypes | required
	 * @param status_description | description of status | required
	 * @return json
	 */
	public function putUpdate(Request $request)
	{
		$users=Users::find($request->id);
		
		if ( ! is_null($users)) {
			if($request->has('email')) {
				$users->email = $request->input('email');
			}
			
			if($request->has('first_name'))
			{
				$users->first_name = $request->input('first_name');
			}
			if($request->has('last_name')) {
				$users->last_name = $request->input('last_name');
			}
			
			if($request->has('profile_picture'))
			{
				$users->profile_picture = $request->input('profile_picture');
			}
			if($request->has('password')) {
				$users->password = MD5($request->input('password'));
			}
			
			if($request->has('phone'))
			{
				$users->phone = $request->input('phone');
			}
			if($request->has('twitter')) {
				$users->twitter = $request->input('twitter');
			}
			
			if($request->has('facebook'))
			{
				$users->facebook = $request->input('facebook');
			}
			if($request->has('linkedin')) {
				$users->linkedin = $request->input('linkedin');
			}
			
			if($request->has('registered'))
			{
				$users->registered = $request->input('registered');
			}
			if($request->has('roles_id')) {
				$users->roles_id = $request->input('roles_id');
			}
			
			if($request->has('companies_id'))
			{
				$users->companies_id = $request->input('companies_id');
			}
			if($request->has('status_types_id')) {
				$users->status_types_id = $request->input('status_types_id');
			}
			
			if($request->has('status_description'))
			{
				$users->status_description = $request->input('status_description');
			}

			$users->save();
			return Api::responseSuccess("Success Update id: ".$users->id);
		}
	
		return Api::responseFailed("Users not found");
	}

	/**
	 * delete users by id number
	 *
	 * @param id | id of Users | required
	 * @return json
	 */
	public function deleteDelete(Request $request)
	{
		
		$users=Users::find($request->id);
		if(is_null($users))
		{
			return Response::json("id not found",404);
		}
	
		$success=$users->delete();
	
		if(!$success)
		{
			return Api::responseFailed("error deleting",500);
		}
	
		return Api::responseSuccess("Success delete id: ".$users->id,200);
	}
}
