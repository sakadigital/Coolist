<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Http\Requests;
use App\CompanyDomains;
use App\Companies;
use Response;


class CompanyDomainsController extends Controller
{

/**
 * Handle process request index
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\Response
 */
   public function index(Request $request)
	{
		$company_domains = CompanyDomains::get();
		return view('company_domains.index')->with(['data'=>$company_domains]);
	}

	public function getAdd(Request $request)
	{
		$data['companies'] = Companies::get();
		return view('company_domains.company_domains_add')->with($data);
	}

	public function postAdd(Request $request)
	{
		
		$validate = Validator::make($request->all(), [
    		'id'			=> 'required|numeric|unique:company_domains,id',
    		'companies_id'	=> 'required',
    		'domain'		=> 'required',
    	]);

    	if ($validate->fails())
		{
			//return Response::json($validate->errors()->all());
			return redirect('dashboard/company_domains/add')->withErrors($validate)->withInput($request->all());

		}

		$company_domains = new CompanyDomains;
		$company_domains->id = $request->id;
		$company_domains->companies_id = $request->companies_id;
		$company_domains->domain = $request->domain;	
		$company_domains->save();

		//return Response::json("success insert with id : ".$company_domains->id);
		return redirect('dashboard/company_domains/');
	}
	/**
	 * Handle process request getUpdate
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function getUpdate(Request $request, $id)
	{
		if (is_null($company_domains = CompanyDomains::find($id))) {
			die('Company Domains does not exists');
		}

		$request->merge($company_domains->toArray());
		$request->flash();
		$data['companies'] = Companies::get();
		return view('company_domains.company_domains_add')->with($data);
		}

	/**
	 * Handle process request postUpdate
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function postUpdate(Request $request, $id)
	{
		if (is_null($company_domains = CompanyDomains::find($id))) {
			die('Company Domains does not exists');
		}

		$validate = Validator::make($request->all(), [
			'companies_id'	=> 'required',
    		'domain'		=> 'required',
		]);

		if ($validate->fails())
		{
			//return Response::json($validate->errors()->all());
			return redirect('dashboard/company_domains/update/'.$id)->withErrors($validate)->withInput($request->all());
		}

		$company_domains->companies_id = $request->companies_id;
		$company_domains->domain = $request->domain;
		$company_domains->save();

		//return Response::json("success Update data with id : ".$company_domains->id);
		return redirect('dashboard/company_domains/');
	}

	/**
	 * Handle process request delete
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function delete(Request $request, $id)
	{
		if (is_null($company_domains = CompanyDomains::find($id))) {
			die('Companies does not exists');
		}

		$company_domains->delete();
	}
}
