<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests\RegisterAuthRequest;
use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
 
class ApiController extends Controller
{
    public $loginAfterSignUp = true;
 
    public function register(RegisterAuthRequest $request)
    {
        $user = new User();
        $user->nombre = $request->nombre;
        $user->documento = $request->documento;
        $user->telefono = $request->telefono;
        $user->fk_id_tipo_documento = $request->fk_id_tipo_documento;
        $user->fk_id_rol = $request->fk_id_rol;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
 
        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }
 
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    public function inicio_external()
    {
        
        return view('external_layout.welcome_external');

    }

    public function inicio(Request $request)
    {
        $token = $request->header('Authorization');
        
        $user = JWTAuth::getUser($token);
        return view('internal_layout.welcome',compact('user'));

    }

    public function inicio_sesion()
    {
        return view('login');

    }
 
    public function login(Request $request)
    {
        
        $input = $request->only('email', 'password');
        $jwt_token = null;
        if (!$jwt_token = JWTAuth::attempt($input)) {
            
             
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }
 
        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);
    }
 
    public function logout(Request $request)
    {

        $this->validate($request, [
            'token' => 'required'
        ]);
 
        try {
            JWTAuth::invalidate($request->token);
 
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }
 
    public function getAuthUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
        $user = JWTAuth::getUser($request->token);
 
        return response()->json(['user' => $user]);
    }
}