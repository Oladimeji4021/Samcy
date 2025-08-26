<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StudentRequest;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request,  StudentRequest $studentRequest)
    {

        $userData = $request->validated();
        $studentData = $studentRequest->validated();


        // Create the user
        $user = User::create([
            'first_name' =>  $userData['first_name'],
            'last_name'  =>  $userData['last_name'],
            'email'      =>  $userData['email'],
            'phone'      =>  $userData['phone'],
            'password'   => Hash::make($userData['password']),
            'role'       => 'student',
        ]);

        // student profile
        Student::create([
            'user_id'        => $user->id,
            'gender'         => $studentData['gender'],
            'marital_status' => $studentData['marital_status'],
            'dob'            => $studentData['dob'],
            'state'          => $studentData['state'],
            'local_govt'     => $studentData['local_govt'],
            'address'        => $studentData['address'],
            'nationality'    => $studentData['nationality'],
            'nin'            => $studentData['nin'],
            'department'     => $studentData['department'],
        ]);

        return response()->json(['message' => 'Student registered successfully'], 201);
    }
}
