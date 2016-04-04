<?php

namespace App\Api\Controllers;

use Illuminate\Http\Request;

use Api;
use Validator;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Roles;
use Response;

class ApiRolesController extends Controller
{
   /**
	 * This is all data from table roles, click Send for view all data
	 *
	 * @return json
	 */
	
	public function getList()
	{
		$roles=Roles::all();
		return Response::json($roles,200);
	}
	
	/**
	 * find roles by id number
	 *
	 * @param id | id of Roles | required
	 * @return json
	 */
	public function getFind(Request $request)
	{
		$roles=Roles::find($request->id);
		if(is_null($roles))
		{
			return Api::responseFailed('Data not found',404);
		}
	
		return Api::responseSuccess('Data Roles id :'.$roles->id, $roles);
	} 


	/**
	 * add new roles
	 *
	 * @param name | name of Roles | required
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
	
		$roles = new Roles;
		$roles->name = $request->input('name');	
		$roles->save();

		return Api::responseSuccess("Success insert with id : ".$roles->id,200);
	}
 
 	/**
	 * update roles by id number
	 *
	 * @param id | id of Roles | required
	 * @param name | name of Roles | required
	 * @return json
	 */
	public function putUpdate(Request $request)
	{
		$roles=Roles::find($request->id);
		
		if ( ! is_null($roles)) {
						
			if($request->has('name'))
			{
				$roles->name = $request->input('name');
			}

			$roles->save();
			return Api::responseSuccess("Success Update id: ".$roles->id,200);
		}
	
		return Api::responseFailed("Roles not found",404);
	}

	/**
	 * delete roles by id number
	 *
	 * @param id | id of Roles | required
	 * @return json
	 */
	public function deleteDelete(Request $request)
	{
		
		$roles=Roles::find($request->id);
		if(is_null($roles))
		{
			return Response::json("id not found",404);
		}
	
		$success=$roles->delete();
	
		if(!$success)
		{
			return Api::responseFailed("error deleting",500);
		}
	
		return Api::responseSuccess("Success delete id: ".$roles->id,200);
	}
}
