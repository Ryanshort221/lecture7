<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\phone_number_model1s;
use App\Models\accountsModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\statementsModel;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'socialSecurityNumber' => 'required',
                'address' => 'required',
                'phoneNumber' => 'required',
                'accountType' => 'required|in:checking,savings',
            ]);
            
            $user = User::create([
                'name' => $validatedData['name'],
                'socialSecurityNumber' => $validatedData['socialSecurityNumber'],
                'address' => $validatedData['address'],
            ]);
    
            phone_number_model1s::create([
                'phoneNumber' => $validatedData['phoneNumber'],
                'user_id' => $user->id,
            ]);
    
            $account = accountsModel::create([
                'accountNumber' => rand(10000000, 99999999),
                'user_id' => $user->id,
                'balance' => 0,
                'accountType' => $validatedData['accountType'],
            ]);

            // generate a statement for the user
            statementsModel::create([
                'accountNumber' => $account->accountNumber,
                'user_id' => $user->id,
                'balance' => $account->balance,
                'accountType' => $account->accountType,
                'statementID' => rand(10000000, 99999999),
            ]);
            
            $viewData = [
                'name'=> $validatedData['name'],
                'address'=> $validatedData['address'],
                'phoneNumber' => $validatedData['phoneNumber'],
                'accountNumber' => $account->accountNumber,
                'accountType' => $validatedData['accountType'],
            ];

            // $request->session()->put('user', $viewData);

            return view('/home', $viewData);
            // return redirect()->route('home', $viewData);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return view('signup');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //TODO return view userHome with the customer information
        $user = User::findOrFail($id);
        $phoneNumbers = phone_number_model1s::where('user_id', $id)->get();
        $accounts = accountsModel::where('user_id', $id)->get();
        $viewData = [
            'user_id' => $id,
            'name'=> $user->name,
            'address'=> $user->address,
            'phoneNumbers' => $phoneNumbers,
            'accounts' => $accounts,
        ];
        return view('userHome', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if($request->address == null || $request->address == '') {
            return redirect()->back()->withErrors(['Please enter an address']);
        }
            $user = User::findOrFail($id);
            $user->address = $request->address;
            $user->save();
            // Redirect to the userHome route
            return redirect()->route('userHome', ['id' => $user->id]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
