<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Companies;

class TestController extends Controller
{
    public function getIndex()
    {
    	$companis = Companies::get();
    	return view('company')->withCompanies($companis);
    }

    public function getAdd(Request $request)
    {
    	return view('company_add');
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
    		return redirect('add')->withErrors($validate)->withInput($request->all());
    	}

    	$company = new Companies;
    	$company->id = $request->id;
    	$company->name = $request->name;
    	$company->address = $request->address;
    	$company->token = $request->token;
    	$company->save();
    }
}
