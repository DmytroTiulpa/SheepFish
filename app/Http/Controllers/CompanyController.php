<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.companies', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        // Валидация данных
        /*$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'nullable|url',
        ]);*/

        if ($request->file('logo')) {
            $file = $request->file('logo');

            // Загрузка файла
            //$fileName = time() . '_' . $file->getClientOriginalName();
            //$filePath = $file->storeAs('logo', $fileName, 'public');
            $fileName = Str::uuid().'.'.$file->getClientOriginalExtension();
            $filePath = $file->move(public_path('logo'), $fileName); // Перемещение файла в папку "public/uploads"
        }

        $company = Company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'logo' => $fileName ?? '', // Сохранение нового имени файла
            'website' => $request->input('website'),
        ]);

        return redirect()->route('companies')->with('success', 'Company <b>'.$company->name.'</b> created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->get('id');
        $company = Company::find($id);
        return view('company.create', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, $id)
    {
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $fileName = Str::uuid().'.'.$file->getClientOriginalExtension();
            $filePath = $file->move(public_path('logo'), $fileName); // Перемещение файла в папку "public/uploads"
        }

        $company = Company::findOrFail($id);
        $company->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'logo' => isset($fileName) ? $fileName : $company->logo,
            'website' => $request->input('website'),
        ]);
        return redirect()->route('companies')->with('success', 'Company <b>'.$company->name.'</b> updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('companies')->with('success', 'Company <b>'.$company->name.'</b> deleted successfully.');
    }

    public function delete_logo($id)
    {
        $company = Company::findOrFail($id);

        //unlink(public_path('logo/'.$company->logo));
        //Storage::delete('logo/'.$company->logo);
        if ($company->logo) {
            $logoPath = public_path('logo/'.$company->logo);
            // Преобразование обратных слэшей в прямые для корректной работы в Windows
            $logoPath = str_replace('\\', '/', $logoPath);
            if (File::exists($logoPath)) {
                File::delete($logoPath);
            }
        }

        $company->logo = null;
        $company->save();
        return redirect()->route('companies.edit', compact('id'));
    }

}
