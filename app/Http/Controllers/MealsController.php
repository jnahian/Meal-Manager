<?php

namespace App\Http\Controllers;

use App\Meal;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MealsController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPerm', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $title = "Meal List";
        $meals = new Meal();

        if ($request->s) {
            if ($request->u) {
                $meals = $meals->where('user_id', $request->u);
            }
            if ($request->from) {
                $from  = Carbon::parse($request->from)->toDateString();
                $meals = $meals->where('date', '>=', $from);
            }
            if ($request->to) {
                $to    = Carbon::parse($request->to)->toDateString();
                $meals = $meals->where('date', '<=', $to);
            }
        }
        $meals = $meals->orderByDesc("date");
        $meals = $meals->paginate(15)->appends($request->all());

//        dd($meals->items());

        $users = User::getDropdown();

        return view('meal.index', compact('title', 'meals', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Add Meal";
        $users = User::getDropdown();
        return view('meal.create', compact('title', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $response = ['success' => false, 'msg' => '', 'redirect' => false];
        $cp       = Auth::user()->currentPermission();
        $request->validate([
                               'date'      => ['required', "after_or_equal:{$cp->from}", "before_or_equal:{$cp->to}"],
                               'user_id.*' => 'required',
                               'meal.*'    => 'nullable|numeric',
                           ]);

        DB::beginTransaction();
        try {


            $date   = Carbon::parse($request->date)->toDateTimeString();
            $authId = Auth::id();

            foreach ($request->user_id as $id => $user) {
                $meal  = $request->meal[$id] ?? 0;
                $guest = $request->guest[$id] ?? 0;
                Meal::updateOrCreate(
                    ['date' => $date, 'user_id' => $user, 'created_by' => $authId],
                    ['meal' => $meal, 'guest' => $guest, 'total' => $meal + $guest, 'updated_by' => $authId]
                );
            }

            $response['success']  = true;
            $response['redirect'] = $request->previous;
            $response['msg']      = "Meal Saved Successfully!";
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            $response['msg'] = $exception->getMessage();
        }

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param Meal $meal
     * @return Response
     */
    public function show(Meal $meal)
    {
        $title = "Show Details ";
        return view('meal.show', compact('title', 'meal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Meal $meal
     * @return Response
     */
    public function edit(Meal $meal)
    {
        $title = "Edit Meal";
        $users = User::getDropdown();
        return view('meal.edit', compact('title', 'meal', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Meal $meal
     * @return Response
     */
    public function update(Request $request, Meal $meal)
    {
        $response = ['success' => false, 'msg' => '', 'redirect' => false];
        $cp       = Auth::user()->currentPermission();
        $request->validate([
                               'date'    => ['required', "after_or_equal:{$cp->from}", "before_or_equal:{$cp->to}"],
                               'user_id' => 'required',
                               'meal'    => 'required',
                           ]);

        try {
            $meal->date       = Carbon::parse($request->date)->toDateTimeString();
            $meal->meal       = $request->meal;
            $meal->guest      = $request->guest;
            $meal->total      = $request->meal + $request->guest;
            $meal->updated_by = Auth::id();
            $meal->save();

            $response['success']  = true;
            $response['redirect'] = $request->previous;
            $response['msg']      = "Meal Updated Successfully!";
        } catch (Exception $exception) {
            $response['msg'] = $exception->getMessage();
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Meal $meal
     * @return Response
     */
    public function destroy(Meal $meal)
    {
        $response = ['success' => false, 'msg' => '', 'redirect' => false];

        try {
            $meal->delete();
            $response['success']  = true;
            $response['redirect'] = route('meal.index');
            $response['msg']      = "Meal Deleted Successfully!";
        } catch (Exception $exception) {
            $response['msg'] = $exception->getMessage();
        }

        return response()->json($response);
    }
}
