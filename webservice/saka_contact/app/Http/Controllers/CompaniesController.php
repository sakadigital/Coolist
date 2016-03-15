<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Companies;
use Response;

class CompaniesController extends Controller
{
	public function index(Request $request)
	{
		$companies = Companies::get();
		return view('company.index')->with(['data'=>$companies]);
	}

	public function getAdd(Request $request)
	{
		return view('company.company_add');
	}

	public function postAdd(Request $request)
	{
		$validate = Validator::make($request->all(), [
    		'id' => 'required|numeric|unique:companies,id',
    		'name' => 'required',
    		'address' => 'required',
    		'token' => 'required',
    	]);

    	if ($validate->fails())
		{
			return Response::json($validate->errors()->all());
		}

		$companies = new Companies;
		$companies->id = $request->id;
		$companies->name = $request->name;
		$companies->address = $request->address;
		$companies->token = $request->token;
		$companies->save();

		return Response::json("success insert with id : ".$companies->id);
	}
}
