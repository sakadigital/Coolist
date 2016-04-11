<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Http\Requests;
use App\StatusTypes;
use Response;

class StatusTypesController extends Controller
{
   /**
    * Handle process request index
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
	{
		$status_types = StatusTypes::get();
		return view('status_types.index')->with(['data'=>$status_types]);
	}
   /**
	 * Handle process request getAdd
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function getAdd(Request $request)
	{
		return view('status_types.status_types_add');
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
			'id'	=> 'required|numeric|unique:status_types,id',
			'name'	=> 'required',
		]);

		if ($validate->fails())
		{
			//return Response::json($validate->errors()->all());
			return redirect('dashboard/status_types/add')->withErrors($validate)->withInput($request->all());

		}

		$status_types = new StatusTypes;
		$status_types->id = $request->id;
		$status_types->name = $request->name;
		$status_types->save();

		//return Response::json("success insert with id : ".$status_types->id);
		return redirect('dashboard/status_types/');
	}
	/**
	 * Handle process request getUpdate
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function getUpdate(Request $request, $id)
	{
		if (is_null($status_types = StatusTypes::find($id))) {
			die('StatusTypes does not exists');
		}

		$request->merge($status_types->toArray());
		$request->flash();
		return view('status_types.status_types_add');
	}

	/**
	 * Handle process request postUpdate
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function postUpdate(Request $request, $id)
	{
		if (is_null($status_types = StatusTypes::find($id))) {
			die('StatusTypes does not exists');
		}

		$validate = Validator::make($request->all(), [
			'name' => 'required',
		]);

		if ($validate->fails())
		{
			//return Response::json($validate->errors()->all());
			return redirect('dashboard/status_types/update/'.$id)->withErrors($validate)->withInput($request->all());
		}

		$status_types->name = $request->name;
		$status_types->save();

		//return Response::json("success update data with id : ".$status_types->id);
		return redirect('dashboard/status_types/');
	}

	/**
	 * Handle process request delete
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function delete(Request $request, $id)
	{
		if (is_null($status_types = StatusTypes::find($id))) {
			die('StatusTypes does not exists');
		}

		$status_types->delete();
	}
}