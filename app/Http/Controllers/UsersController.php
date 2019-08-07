<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    
    public function __construct()
    {
        $this->middleware( 'hasPerm', [ 'except' => [ 'index', 'show' ] ] );
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index( Request $request )
    {
        $title = "Member List";
        $users = new User();
        
        if ( $request->s ) {
            if ( $request->u ) {
                $users = $users->where( 'user_id', $request->u );
            }
            if ( $request->from ) {
                $from  = Carbon::parse( $request->from )->toDateString();
                $users = $users->where( 'date', '>=', $from );
            }
            if ( $request->to ) {
                $to    = Carbon::parse( $request->to )->toDateString();
                $users = $users->where( 'date', '<=', $to );
            }
        }
        $users = $users->latest();
        $users = $users->paginate( 15 )->appends( $request->all() );
        
        return view( 'user.index', compact( 'title', 'users' ) );
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
//    public function create()
//    {
//        $title = "Add User";
//        $users = User::getDropdown();
//        return view( 'user.create', compact( 'title', 'users' ) );
//    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
//    public function store( Request $request )
//    {
//        $response = [ 'success' => FALSE, 'msg' => '', 'redirect' => FALSE ];
//        $request->validate( [
//            'user_id' => 'required',
//            'date'    => 'required',
//            'purpose' => 'required',
//            'type'    => 'required',
//            'amount'  => 'required|numeric',
//        ] );
//
//        try {
//            $user             = new User();
//            $user->date       = Carbon::parse( $request->date )->toDateTimeString();
//            $user->user_id    = $request->user_id;
//            $user->purpose    = $request->purpose;
//            $user->amount     = $request->amount;
//            $user->type       = $request->type;
//            $user->remarks    = $request->remarks;
//            $user->status     = $request->status;
//            $user->created_by = Auth::user()->id;
//            $user->created_at = Carbon::now()->toDateTimeString();
//            $user->save();
//
//            $response['success']  = TRUE;
//            $response['redirect'] = $request->previous;
//            $response['msg']      = "User Saved Successfully!";
//        } catch ( Exception $exception ) {
//            $response['msg'] = $exception->getMessage();
//        }
//
//        return response()->json( $response );
//    }
    
    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show( User $user )
    {
        $title = "Show Details ";
        return view( 'user.show', compact( 'title', 'user' ) );
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
//    public function edit( User $user )
//    {
//        $title = "Edit User";
//        $users = User::getDropdown();
//        return view( 'user.edit', compact( 'title', 'user', 'users' ) );
//    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User    $user
     * @return Response
     */
//    public function update( Request $request, User $user )
//    {
//        $response = [ 'success' => FALSE, 'msg' => '', 'redirect' => FALSE ];
//
//        $request->validate( [
//            'user_id' => 'required',
//            'date'    => 'required',
//            'purpose' => 'required',
//            'type'    => 'required',
//            'amount'  => 'required|numeric',
//        ] );
//
//        try {
//            $user->date       = Carbon::parse( $request->date )->toDateTimeString();
//            $user->user_id    = $request->user_id;
//            $user->purpose    = $request->purpose;
//            $user->amount     = $request->amount;
//            $user->type       = $request->type;
//            $user->remarks    = $request->remarks;
//            $user->status     = $request->status;
//            $user->updated_by = Auth::user()->id;
//            $user->updated_at = Carbon::now()->toDateTimeString();
//            $user->save();
//
//            $response['success']  = TRUE;
//            $response['redirect'] = $request->previous;
//            $response['msg']      = "User Updated Successfully!";
//        } catch ( Exception $exception ) {
//            $response['msg'] = $exception->getMessage();
//        }
//        return response()->json( $response );
//    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function permission( User $user )
    {
        $title = "User Permission";
        $users = User::getDropdown();
        return view( 'user.permission', compact( 'title', 'user', 'users' ) );
    }
    
    public function update_permission( Request $request, User $user )
    {
        $response = [ 'success' => FALSE, 'msg' => '', 'redirect' => FALSE ];
        
        $request->validate( [
            'date_from' => 'required|date',
            'date_to'   => 'required|date',
        ] );
        
        try {
            $user->perm_from = Carbon::parse( $request->date_from )->toDateString();
            $user->perm_to   = Carbon::parse( $request->date_to )->toDateString();
            $user->save();
            
            $response['success']  = TRUE;
            $response['redirect'] = $request->previous;
            $response['msg']      = "User Permission Changed Successfully!";
        } catch ( Exception $exception ) {
            $response['msg'] = $exception->getMessage();
        }
        return response()->json( $response );
    }
    
    public function change_password( User $user )
    {
        $title = "User :: Change Password";
        return view( 'user.change-password', compact( 'title', 'user' ) );
    }
    
    public function update_password( Request $request, User $user )
    {
        $response = [ 'success' => FALSE, 'msg' => '', 'redirect' => FALSE ];
        if ( Auth::id() == $user->id ) {
            $request->validate( [
                'password' => 'required|min:6|confirmed',
            ] );
            
            try {
                $user->password   = bcrypt( $request->password );
                $user->updated_at = Carbon::now()->toDateString();
                $user->save();
                
                $response['success']  = TRUE;
                $response['redirect'] = $request->previous;
                $response['msg']      = "User Password Changed Successfully!";
            } catch ( Exception $exception ) {
                $response['msg'] = $exception->getMessage();
            }
        } else {
            $response['msg'] = 'Permission Denied!';
        }
        return response()->json( $response );
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy( User $user )
    {
        $response = [ 'success' => FALSE, 'msg' => '', 'redirect' => FALSE ];
        
        try {
            $user->delete();
            $response['success']  = TRUE;
            $response['redirect'] = route( 'user.index' );
            $response['msg']      = "User Deleted Successfully!";
        } catch ( Exception $exception ) {
            $response['msg'] = $exception->getMessage();
        }
        
        return response()->json( $response );
    }
}
