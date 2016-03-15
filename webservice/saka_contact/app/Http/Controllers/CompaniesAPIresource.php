<?php

namespace App\Http\Controllers;

use Api;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Companies;
use Response;

class CompaniesController extends Controller
{
	//Method ini digunakan untuk mengambil semua data yang ada (GET)
	public function index()
	{
		$companies=Companies::all();
		return Response::json($companies,200);
	}

	//Store digunakan untuk menyimpan data ke database server (POST)
	public function store(Request $request)
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

		return Response::json("success insert with id : ".$companies->id);
	}

	//digunakan untuk mengambil data dengan id tertentu (GET)
	public function show($id)
	{
		$companies=Companies::find($id);
		if(is_null($companies))
		{
			return Api::responseFailed('Data not found');
		}
	
		return Api::responseSuccess('Data Company', $companies);
	}

	//Method ini untuk mengupdate data di database server (PUT)
	public function update(Request $request, $id)
	{
		$companies=Companies::find($id);
		
		if(!is_null($request->input('id')))
		{
			$companies->id=$request->input('id');
		}
	 
		if(!is_null($request->input('name')))
		{
			$companies->name=$request->input('name');
		}
	
		if(!is_null($request->input('address')))
		{
			$companies->address=$request->input('address');
		}
	
		if(!is_null($request->input('token')))
		{
			$companies->token=$request->input('token');
		}

		$success=$companies->save();
	
		if(!$success)
		{
			return Response::json("error updating",500);
		}
	
		return Response::json("success",201);
	}

	//menghapus data dengan id tertentu(DELETE)
	public function destroy($id)
	{
		
		$companies=Companies::find($id);
		if(is_null($companies))
		{
			return Response::json("not found",404);
		}
	
		$success=$companies->delete();
	
		if(!$success)
		{
			return Response::json("error deleting",500);
		}
	
		return Response::json("success",200);
	}
}
