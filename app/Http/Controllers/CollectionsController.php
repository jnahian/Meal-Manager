<?php

namespace App\Http\Controllers;

use App\Collection;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index( Request $request )
    {
        $title       = "Collections";
        $users       = User::getDropdown();
        $collections = new Collection();
        
        if ( $request->s ) {
            if ( $request->u ) {
                $collections = $collections->where( 'user_id', $request->u );
            }
            if ( $request->from ) {
                $from        = Carbon::parse( $request->from )->toDateString();
                $collections = $collections->where( 'date', '>=', $from );
            }
            if ( $request->to ) {
                $to          = Carbon::parse( $request->to )->toDateString();
                $collections = $collections->where( 'date', '<=', $to );
            }
        }
        $collections = $collections->orderByDesc( "date" );
        $collections = $collections->paginate( 15 )->appends( $request->all() );
        
        return view( 'collection.index', compact( 'title', 'collections', 'users' ) );
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = "New Collection";
        $users = User::getDropdown();
        return view( 'collection.create', compact( 'title', 'users' ) );
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store( Request $request )
    {
        $response = [ 'success' => FALSE, 'msg' => '', 'redirect' => FALSE ];
        $request->validate( [
            'date'    => 'required',
            'user_id' => 'required',
            'amount'  => 'required|numeric',
        ] );
        
        try {
            $collection             = new Collection();
            $collection->date       = Carbon::parse( $request->date )->toDateTimeString();
            $collection->user_id    = $request->user_id;
            $collection->amount     = $request->amount;
            $collection->remarks    = $request->remarks;
            $collection->status     = $request->status;
            $collection->created_by = Auth::user()->id;
            $collection->created_at = Carbon::now()->toDateTimeString();
            $collection->save();
            
            $response['success']  = TRUE;
            $response['redirect'] = $request->previous;
            $response['msg']      = "Collection Save Successfully!";
        } catch ( Exception $exception ) {
            $response['msg'] = $exception->getMessage();
        }
        
        return response()->json( $response );
    }
    
    /**
     * Display the specified resource.
     *
     * @param Collection $collection
     * @return Response
     */
    public function show( Collection $collection )
    {
        $title = "Show Details ";
        return view( 'collection.show', compact( 'title', 'collection' ) );
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param Collection $collection
     * @return Response
     */
    public function edit( Collection $collection )
    {
        $title = "Edit Collection";
        $users = User::getDropdown();
        return view( 'collection.edit', compact( 'title', 'collection', 'users' ) );
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param Request    $request
     * @param Collection $collection
     * @return Response
     */
    public function update( Request $request, Collection $collection )
    {
        $response = [ 'success' => FALSE, 'msg' => '', 'redirect' => FALSE ];
        $request->validate( [
            'date'    => 'required',
            'user_id' => 'required',
            'amount'  => 'required|numeric',
        ] );
        try {
            $collection->date       = Carbon::parse( $request->date )->toDateTimeString();
            $collection->user_id    = $request->user_id;
            $collection->amount     = $request->amount;
            $collection->remarks    = $request->remarks;
            $collection->status     = $request->status;
            $collection->updated_by = Auth::user()->id;
            $collection->updated_at = Carbon::now()->toDateTimeString();
            $collection->save();
            
            $response['success']  = TRUE;
            $response['redirect'] = $request->previous;
            $response['msg']      = "Collection Updated Successfully!";
        } catch ( Exception $exception ) {
            $response['msg'] = $exception->getMessage();
        }
        return response()->json( $response );
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param Collection $collection
     * @return Response
     */
    public function destroy( Collection $collection )
    {
        $response = [ 'success' => FALSE, 'msg' => '', 'redirect' => FALSE ];
        
        try {
            $collection->delete();
            $response['success']  = TRUE;
            $response['redirect'] = route( 'collection.index' );
            $response['msg']      = "Collection Deleted Successfully!";
        } catch ( Exception $exception ) {
            $response['msg'] = $exception->getMessage();
        }
        
        return response()->json( $response );
    }
}
