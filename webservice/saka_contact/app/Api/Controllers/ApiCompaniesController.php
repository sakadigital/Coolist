<?php

namespace App\Api\Controllers;

use Illuminate\Http\Request;

use Api;
use Validator;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Companies;
use Response;

class ApiCompaniesController extends Controller
{
	/**
	 * this is all data from table companies, click Send for view all data
	 *
	 * @return json
	 */
	public function getList()
	{
		$companies=Companies::all();
		return Response::json($companies,200);
	}

	/**
	 * find companies by id number
	 *
	 * @param id | id of Companies | required
	 * @return json
	 */
	public function getFind(Request $request)
	{
		$companies=Companies::find($request->id);
		if(is_null($companies))
		{
			return Api::responseFailed('Data not found');
		}
	
		return Api::responseSuccess('Data Company id: '.$companies->id, $companies);
	}

	/**
	 * add new companies
	 *
	 * @param name | name of Companies| required
	 * @param address | address of Companies | required
	 * @param token | token of Companies | required
	 * @return json
	 */
	public function postAdd(Request $request)
	{
		$validate = Validator::make($request->all(), [
			'name' => 'required',
			'address' => 'required',
			'token' => 'required|unique:companies,token',
		]);
		
		if ($validate->fails())
		{
			return Response::json($validate->errors()->all());
		}

		$companies=new Companies;
		$companies->name=$request->input('name');
		$companies->address=$request->input('address');
		$companies->token=$request->input('token');
		$companies->save();

		return Api::responseSuccess("Success insert with id: ".$companies->id,200);
	}
	
	/**
	 * update companies
	 *
	 * @param id | id of Companies | required
	 * @param name | name of Companies| required
	 * @param address | address of Companies | required
	 * @param token | token of Companies | required
	 * @return json
	 */
	public function putUpdate(Request $request)
	{
		$companies=Companies::find($request->id);
		
		if ( ! is_null($companies)) {
			if($request->has('name')) {
				$companies->name = $request->input('name');
			}
		
			if($request->has('address')) {
				$companies->address = $request->input('address');
			}
		
			if($request->has('token'))
			{
				$companies->token = $request->input('token');
			}

			$companies->save();
			return Api::responseSuccess("Success Update id: ".$companies->id,200);
		}
	
		return Api::responseFailed("Companies not found",404);
	}

	/**
	 * delete companies data by id number
	 *
	 * @param id | id of Companies | required
	 * @return json
	 */
	public function deleteDelete(Request $request)
	{
		
		$companies=Companies::find($request->id);
		if(is_null($companies))
		{
			return Response::json("not found",404);
		}
	
		$success=$companies->delete();
	
		if(!$success)
		{
			return Api::responseFailed("error deleting",500);
		}
	
		return Api::responseSuccess("Success delete id: ".$companies->id,200);
	}
}
