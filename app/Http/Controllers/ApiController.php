<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\Country;
use App\User;
use App\Character;

class ApiController extends Controller
{
    public function bringCountries()
    {
        $countries = Country::get();

        return response()->json($countries);
    }

    public function validUsername(Request $request)
    {
        $answer;
        $user = User::select('memb___id')
                    ->where('memb___id', $request->username)
                    ->get();

        if(count($user) == 0) {
            $answer = 1;
        } else {
            $answer = 0;
        }

        return response()->json($answer);
    }

    public function validEmail(Request $request)
    {
        $answer;
        $user = User::select('mail_addr')
                    ->where('mail_addr', $request->email)
                    ->get();
                    
        if(count($user) == 0) {
            $answer = 1;
        } else {
            $answer = 0;
        }

        return response()->json($answer);
    }

    public function reset(Request $request)
    {
        $username = $request->username;
        $characters = Character::select('AccountID', 'Name', 'cLevel', 'LevelUpPoint', 'Class', 'Experience', 'Strength', 'Dexterity', 'Vitality', 'Energy', 'Money', 'PkCount', 'PkLevel', 'PkTime', 'RESETS', 'Married', 'MarryName', 'WinDuels', 'LoseDuels', 'Grand_Resets', 'm_Grand_Resets', 'Active_char')->where('Name', $username)
        ->get();
        $toArray = $characters->toArray();
        foreach($toArray as $fields) {
            if(count($fields) != 0) {
                $validatorReset = $this->validAReset($fields['Money'], $fields['cLevel']);
                if(count($validatorReset) == 0) {
                    $newMoney = $fields['Money'] - 50000000;
                    $newReset = $fields['RESETS'] + 1;
                    $fields['RESETS'] = (string) $newReset; 
                    $fields['Money'] = (string) $newMoney;
                    $fields['cLevel'] = (string) 1;
                    $doReset = $this->doAReset($fields);
                    return response()->json([
                            'status' => 250,
                            'message' => 'Reset Sucess'
                        ]);
                } else {
                   return response()->json([
                            'status' => 200,
                            'message' => $validatorReset
                       ]);
                }
            } else {
                dd('no entro');
            }
        }
    }

    //Valida si el usuario puede hacer un reset
    public function validAReset($zen, $level)
    {
        $errors = [];
        if($zen < 50000000 && $level != 400){
            array_push($errors, 'No eres nivel 400 y no posees suficiente zen para hacer un reset');
        }elseif($zen < 50000000) {
            array_push($errors, 'No tienes suficiente zen para realizar un reset');
        }elseif($level != 400) {
            array_push($errors, 'No tienes suficiente nivel para hacer un reset');
        }

        return $errors;
    }

    //Hace un reset
    public function doAReset($character)
    {
        
        $update = Character::where('AccountID', $character['AccountID'])
                   ->update([
                       'Experience' => 0,
                       'cLevel' => 1,
                       'Money' => $character['Money'],
                       'RESETS' => $character['RESETS']
                   ]);
    }

    public function bringPointsOfACharacter($username) 
    {
        $character = Character::select('Name', 'LevelUpPoint', 'Strength', 'Dexterity', 'Vitality', 'Energy')
                            ->where('Name', $username)
                            ->get();
        $toArray = $character->toArray();
        if(count($toArray) == 0) {
            return response()->json([
                'status' => 404,
                'message' => 'No se encontro ningun usuario'
            ]);
        } else {
            return response()->json([
                'status' => 200,
                'character' => $character
            ]);
        }
    }
}
