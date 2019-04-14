<?php

namespace Project\Http\Controllers\Api\V1;

use Project\Company;
use Illuminate\Http\Request;
use Project\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    public function index()
    {
        return Company::all();
    }
    public function create()
    {
        return view('admin/companies/index');
    }
    public function edit($id)
    {
        //
    }

    public function show($id)
    {
        return Company::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->update($request->all());

        return $company;
    }

    public function store(Request $request)
    {
        $company = Company::create($request->all());
        return $company;
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return '';
    }
}
