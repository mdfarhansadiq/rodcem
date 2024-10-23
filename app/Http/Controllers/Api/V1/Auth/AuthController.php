<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Company;
use App\Models\Expert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $r)
    {
        try {
            switch ($r->user_type) {
                case 'company':
                        $guard = 'company_api';
                        $scope = 'companies';
                    break;
                case 'expert':
                        $guard = 'expert_api';
                        $scope = 'experts';
                    break;
                case 'agent':
                        $guard = 'agent_api';
                        $scope = 'agents';
                    break;
                default:
                        $guard = 'user_api';
                        $scope = 'users';
                    break;
            }
            
            # Validation rules | unique validations are not added for `email` & `phone_number`
            if(!isset($r->name)){
                $name_errors = [
                    'name' => ['Name field is required.']
                ];
                return API_VALIDATION_ERROR((object) $name_errors);
            }else{
                if ((strlen($r->name) < 3) || (strlen($r->name) > 50)) {
                    $name_errors = [
                        'name' => ['Name can contain 1 to 191 character.']
                    ];
                    return API_VALIDATION_ERROR((object) $name_errors);
                }
            }

            if(!isset($r->email)){
                $email_errors = [
                    'email' => ['Email field is required.']
                ];
                return API_VALIDATION_ERROR((object) $email_errors);
            }else{
                if (strlen($r->email) > 199) {
                    $email_errors = [
                        'email' => ['Email can contain maximum 191 character.']
                    ];
                    return API_VALIDATION_ERROR((object) $email_errors);
                }
            }

            if(!isset($r->password)){
                $password_errors = [
                    'password' => ['Password field is required.']
                ];
                return API_VALIDATION_ERROR((object) $password_errors);
            }else{
                if ((strlen($r->password) < 8) || (strlen($r->password) > 32)) {
                    $password_errors = [
                        'password' => ['Password can contain 8 to 32 character.']
                    ];
                    return API_VALIDATION_ERROR((object) $password_errors);
                }
            }

            if(!isset($r->phone_number)){
                $phone_number_errors = [
                    'phone_number' => ['Phone number field is required.']
                ];
                return API_VALIDATION_ERROR((object) $phone_number_errors);
            }else{
                if (strlen($r->phone_number) != 11) {
                    $phone_number_errors = [
                        'phone_number' => ['Phone number can contain 11 digits.']
                    ];
                    return API_VALIDATION_ERROR((object) $phone_number_errors);
                }
            }

            if($scope == 'users'){
                if(!isset($r->gender)){
                    $gender_errors = [
                        'gender' => ['Gender field is required.']
                    ];
                    return API_VALIDATION_ERROR((object) $gender_errors);
                }
                
                if(!isset($r->city)){
                    $city_errors = [
                        'city' => ['City field is required.']
                    ];
                    return API_VALIDATION_ERROR((object) $city_errors);
                }
    
                if(!isset($r->dob)){
                    $dob_errors = [
                        'dob' => ['Date of birth field is required.']
                    ];
                    return API_VALIDATION_ERROR((object) $dob_errors);
                }
            }

            # Serialize user data
            $user = [
                'name'         => $r->name,
                'email'        => $r->email,
                'password'     => bcrypt($r->password),
                'phone_number' => $r->phone_number
            ];

            if($scope == 'users'){
                $user['gender'] = $r->gender ?? null;
                $user['city'] = $r->city ?? null;
                $user['dob'] = $r->dob ?? null;
            }

            # Upload document & create user
            if ($scope == 'companies') {
                $user['logo'] = upload_file('company/documents', $r->document);
                $user = Company::create($user);
            } elseif ($scope == 'experts') {
                $user['image'] = upload_file('expert/documents', $r->document);
                $user = Expert::create($user);
            } elseif ($scope == 'agents') {
                $user['image'] = upload_file('agent/documents', $r->document);
                $user = Agent::create($user);
            } elseif ($scope == 'users') $user = User::create($user);

            # Revoke tokens
            // $user->tokens()->delete(); This will remove all bcoz of relational field `user_id`

            # Trying to login with auth
            Auth::guard($guard)->setUser($user);

            # Generate token
            $token = Auth::guard($guard)->user()->createToken('Construction app', [$scope])->accessToken;
            
            # Login success
            return API(['message' => 'Registered successfully.', 'token' => $token]);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }
    
    public function login(Request $r)
    {
        try {
            $request = (object) $r->json()->all();
            # Validation rules
            $validator = Validator::make((array) $request, [
                'email'    => 'required|string|min:10|max:150',
                'password' => 'required|string|min:8|max:32'
            ]);
            
            # Return validation errors
            if($validator->fails()) return API_VALIDATION_ERROR($validator->errors());

            # Find user
            switch ($r->user_type) {
                case 'company':
                        $guard = 'company_api';
                        $scope = 'companies';
                        $user = Company::whereEmail($request->email)->first();
                    break;
                case 'expert':
                        $guard = 'expert_api';
                        $scope = 'experts';
                        $user = Expert::whereEmail($request->email)->first();
                    break;
                case 'agent':
                        $guard = 'agent_api';
                        $scope = 'agents';
                        $user = Agent::whereEmail($request->email)->first();
                    break;
                default:
                        $guard = 'user_api';
                        $scope = 'users';
                        $user = User::whereEmail($request->email)->first();
                    break;
            }
            
            if(!empty($user)){
                if(password_verify($request->password, $user->password)){
                    # Revoke tokens
                    // $user->tokens()->delete(); This will remove all bcoz of relational field `user_id`

                    # Trying to login with auth
                    Auth::guard($guard)->setUser($user);

                    # Generate token
                    $token = Auth::guard($guard)->user()->createToken('Construction app', [$scope])->accessToken;
                    
                    # Login success
                    return API(['message' => 'Login successfully.', 'token' => $token]);
                }
                # Password mismatch
                return API(['message' => 'Password does not match !']);
            }
            # User not found
            return API(['message' => 'Email does not exist.'], 404);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    public function update_password(Request $r)
    {
        try {
            $request = (object) $r->json()->all();
            # Validation rules
            $validator = Validator::make((array) $request, [
                'old_password' => 'required|string|min:8|max:32',
                'new_password' => 'required|string|min:8|max:32'
            ]);
            
            # Return validation errors
            if($validator->fails()) return API_VALIDATION_ERROR($validator->errors());
            
            # Find user
            $user = User::find(auth()->id());
            if(!empty($user)){
                if(password_verify($request->old_password, $user->password)){
                    # Update with new_password
                    $user->update([
                        'password' => bcrypt($request->new_password)
                    ]);

                    switch ($r->segments()[2]) {
                        case 'company':
                                $guard = 'company_api';
                                $scope = 'companies';
                            break;
                        case 'agent':
                                $guard = 'agent_api';
                                $scope = 'agents';
                            break;
                        default:
                                $guard = 'user_api';
                                $scope = 'users';
                            break;
                    }

                    # Revoke tokens
                    // $user->tokens()->delete(); This will remove all bcoz of relational field `user_id`

                    # Trying to login with auth
                    Auth::guard($guard)->setUser($user);
                    
                    # Generate token
                    $token = Auth::guard($guard)->user()->createToken('Construction app', [$scope])->accessToken;
                    
                    # Login success
                    return API(['message' => 'Password updated successfully.', 'token' => $token]);
                }
                # API response
                return API(['message' => 'Old password does not match !'], 403);
            }
            # API response on invalid token
            return API(['message' => 'Invalid token !'], 498);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }
}
