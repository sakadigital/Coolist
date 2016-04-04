<?php

namespace App\Api\Controllers;

use Illuminate\Http\Request;

use Api;
use Validator;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\StatusTypes;
use Response;

class ApiStatusTypesController extends Controller
{

	/**
	 * This is all data from table status_types, click Send for view all data
	 *
	 * @return json
	 */
	
	public function getList()
	{
		$status_types=StatusTypes::all();
		return Response::json($status_types,200);
	}
	
	/**
	 * find statustypes by id number
	 *
	 * @param id | id of Statustypes | required
	 * @return json
	 */
	public function getFind(Request $request)
	{
		$status_types=StatusTypes::find($request->id);
		if(is_null($status_types))
		{
			return Api::responseFailed('Data not found',404);
		}
	
		return Api::responseSuccess('Data StatusTypes id :'.$status_types->id, $status_types);
	} 


	/**
	 * add new statustypes
	 *
	 * @param name | name of Statustypes | required
	 * @return json
	 */
	public function postAdd(Request $request)
	{
			$validate = Validator::make($request->all(), [
    		'name'		=> 'required',
    	]);
		
		if ($validate->fails())
		{
			return Response::json($validate->errors()->all());
		}
	
		$status_types = new StatusTypes;
		$status_types->name = $request->input('name');	
		$status_types->save();

		return Api::responseSuccess("Success insert with id : ".$status_types->id,200);
	}
 
 	/**
	 * update statustypes by id number
	 *
	 * @param id | id of Statustypes | required
	 * @param name | name of Statustypes | required
	 * @return json
	 */
	public function putUpdate(Request $request)
	{
		$status_types=StatusTypes::find($request->id);
		
		if ( ! is_null($status_types)) {
						
			if($request->has('name'))
			{
				$status_types->name = $request->input('name');
			}

			$status_types->save();
			return Api::responseSuccess("Success Update id: ".$status_types->id,200);
		}
	
		return Api::responseFailed("Status Types not found",404);
	}

	/**
	 * delete statustype by id number
	 *
	 * @param id | id of Statustypes | required
	 * @return json
	 */
	public function deleteDelete(Request $request)
	{
		
		$status_types=StatusTypes::find($request->id);
		if(is_null($status_types))
		{
			return Response::json("id not found",404);
		}
	
		$success=$status_types->delete();
	
		if(!$success)
		{
			return Api::responseFailed("error deleting",500);
		}
	
		return Api::responseSuccess("Success delete id: ".$status_types->id,200);
	}
 
}