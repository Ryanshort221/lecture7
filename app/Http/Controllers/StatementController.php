<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\accountsModel;
use Illuminate\Http\Request;
use App\Models\statementsModel;

class StatementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //TODO generate a statement for the user
        $user_id = $request->user_id;
        // create statement from user_id get there account info with user id then generate statement
        $statements = accountsModel::where('user_id', $user_id)->get();
        foreach($statements as $statement){
            statementsModel::create([
                'accountNumber' => $statement->accountNumber,
                'user_id' => $statement->user_id,
                'balance' => $statement->balance,
                'statementID' => rand(10000000, 99999999),
                'accountType' => $statement->accountType,
            ]);
        }
        return redirect()->route('statements', ['id' => $user_id]);
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $statements = StatementsModel::where('user_id', $id)->get();
        return view('statement', ['statements' => $statements]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
