<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Http\Requests;
use App\Roles;
use Response;

class RolesController extends Controller
{
   /**
    * Handle process request index
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
	{
		$roles = Roles::get();
		return view('roles.index')->with(['data'=>$roles]);
	}
   /**
	 * Handle process request getAdd
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function getAdd(Request $request)
	{
		return view('roles.roles_add');
	}

	/**
	 * Handle process request postAdd
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function postAdd(Request $request)
	{
		$validate = Validator::make($request->all(), [
			'id' => 'required|numeric|unique:roles,id',
			'name' => 'required',
		]);

		if ($validate->fails())
		{
			//return Response::json($validate->errors()->all());
			return redirect('roles/add')->withErrors($validate)->withInput($request->all());

		}

		$roles = new Roles;
		$roles->id = $request->id;
		$roles->name = $request->name;
		$roles->save();

		//return Response::json("success insert with id : ".$roles->id);
		return redirect('roles/');
	}
	/**
	 * Handle process request getUpdate
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function getUpdate(Request $request, $id)
	{
		if (is_null($roles = Roles::find($id))) {
			die('Roles does not exists');
		}

		$request->merge($roles->toArray());
		$request->flash();
		return view('roles.roles_add');
	}

	/**
	 * Handle process request postUpdate
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function postUpdate(Request $request, $id)
	{
		if (is_null($roles = Roles::find($id))) {
			die('Roles does not exists');
		}

		$validate = Validator::make($request->all(), [
			'name' => 'required',
		]);

		if ($validate->fails())
		{
			//return Response::json($validate->errors()->all());
			return redirect('roles/update/'.$id)->withErrors($validate)->withInput($request->all());
		}

		$roles->name = $request->name;
		$roles->save();

		//return Response::json("success update data with id : ".$roles->id);
		return redirect('roles/');

	}

	/**
	 * Handle process request delete
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function delete(Request $request, $id)
	{
		if (is_null($roles = Roles::find($id))) {
			die('Roles does not exists');
		}

		$roles->delete();
	}
}
