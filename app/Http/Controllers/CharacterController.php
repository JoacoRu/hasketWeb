<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Character;

class CharacterController extends Controller
{
    public function listCharacters()
    {
        $username = Auth::user()->memb___id;
        $characters = Character::select('AccountID', 'Name', 'cLevel', 'LevelUpPoint', 'Class', 'Experience', 'Strength', 'Dexterity', 'Vitality', 'Energy', 'Money', 'PkCount', 'PkLevel', 'PkTime', 'RESETS', 'Married', 'MarryName', 'WinDuels', 'LoseDuels', 'Grand_Resets', 'm_Grand_Resets', 'Active_char')->where('AccountID', $username)->get();
        return view('userPanel', compact('characters'));
    }
    
    public function updatePoints(Request $request)
    {
        $username = $request->usernamePoints;
        $points = [
            'puntosRestantes' => $request->pointsAvaiable,
            'str' => $request->fuerza,
            'agi' => $request->agilidad,
            'sta' => $request->stamina,
            'enr' => $request->energia
        ];
        $characters = Character::select('Name', 'LevelUpPoint', 'Strength', 'Dexterity', 'Vitality', 'Energy')
                                ->where('Name', $username)
                                ->get();

    }

    public function validatePoints($character, $payload)
    {
        $errors = [];
        foreach ($character as $fields) {
            // Hay que seguir...
        }
    }
}
