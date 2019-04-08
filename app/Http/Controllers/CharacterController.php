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
        $puntosRestantes = intval($request->pointsAvaiable) - intval($request->fuerza) - intval($request->agilidad) - intval($request->stamina) - intval($request->energia);
        $character = Character::select('Name', 'LevelUpPoint', 'Strength', 'Dexterity', 'Vitality', 'Energy')
                                ->where('Name', $username)
                                ->get();
        $validate = $this->validatePoints($character,  $points);
        $characters = $this->listCharacters();
        foreach ($character as $fields ) {
            $totalStr = intval($fields['Strength']) + intval($points['str']); 
            $totalAgi = intval($fields['Dexterity']) + intval($points['agi']); 
            $totalSta = intval($fields['Vitality']) + intval($points['sta']); 
            $totalEnr = intval($fields['Energy']) + intval($points['enr']); 
        }
        if(count($validate) == 0) {
            Character::where('Name', $username)
                ->update([
                    'LevelUpPoint' => $puntosRestantes,
                    'Strength' => $totalStr,
                    'Dexterity' => $totalAgi,
                    'Vitality' => $totalSta,
                    'Energy' => $totalEnr
                ]);
            return $characters;
        } else {
            return view('userPanel', compact('validate'));
        }
    }

    public function validatePoints($character, $payload)
    {   
        $errors = [];
        $totalPoints = intval($payload['str']) + intval($payload['agi']) + intval($payload['sta']) +  intval($payload['enr']);
        foreach ($character as $fields) {
            $pointsRem = intval($totalPoints) - intval($fields['LevelUpPoint']);
            if(intval($fields['Strength']) + intval($payload['str']) > 65537) {
                $errors['str'] = 'No puedes superar los 65535';
            }elseif(intval($fields['Dexterity']) + intval($payload['agi']) > 65537) {
                $errors['agi'] = 'No puedes superar los 65535';
            }elseif(intval($fields['Vitality']) + intval($payload['sta']) > 65537) {
                $errors['sta'] = 'No puedes superar los 65535';
            }elseif(intval($fields['Energy']) + intval($payload['enr']) > 65537) {
                $errors['enr'] = 'No puedes superar los 65535';
            }elseif($totalPoints > intval($fields['LevelUpPoint'])) {
                $errors['points'] = 'Te faltan'.' '.$pointsRem;
            }

            return $errors;
        }
    }
}
