<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Franchise;
use Alert;
use Illuminate\Validation\Rule;
use App\User;
use DB;
use Carbon\Carbon;

class FranchiseController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @param  \App\Franchise  $model
     * @return \Illuminate\View\View
     */
    public function index(Franchise $model)
    {
        if (session('status'))
        {
            Alert::success('Success', session('status'));
        }

        $users = User::get();
        $linkUsers = DB::table('franchise_user')
                            ->join('users','franchise_user.user_id','=','users.id')
                            ->select('franchise_user.franchise_id','users.*')
                            ->get();

        return view('admin.franchises.index', ['franchises' => $model->paginate(10)], compact('users','linkUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.franchises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Franchise  $model
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'franchise_name' => 'required|unique:franchises',
            'address' => 'required'
        ]);

        $franchise = new Franchise([
            'franchise_name' => $request->post('franchise_name'),
            'address' => $request->post('address')
        ]);
        
        $franchise->save();

        return redirect()->route('franchises.index')->withStatus(__('Franchise successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $franchise = Franchise::findOrFail($id);

        return view('admin.franchises.edit', compact('franchise','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'franchise_name' => [
                'required',
                Rule::unique('franchises')->ignore($request->id),
            ],
            'address' => 'required',
        ]);

        $franchise = Franchise::findOrFail($id);
        $franchise->franchise_name = $request->get('franchise_name');
        $franchise->address = $request->get('address');

        $franchise->save();

        return redirect()->route('franchises.index')->withStatus(__('Franchise successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->delete();
        
        return redirect()->route('franchises.index')->withStatus(__('Franchise successfully deleted.'));
    }

    // Search
    public function search(Request $request)
    {
        $search = $request->get('search');
        
        $franchises = Franchise::whereRaw('LOWER(`franchise_name`) LIKE ?', '%'.trim(strtolower($search)).'%')
                    ->orWhereRaw('LOWER(`address`) LIKE ?','%'.trim(strtolower($search)).'%')
                    ->orWhereRaw('LOWER(`id`) LIKE ?','%'.trim(strtolower($search)).'%')
                    ->paginate(10);
        
        return view('admin.franchises.index',['franchises'=> $franchises]);
    }

    // Link Franchise with a Franchise User Account
    public function linkAccount(Request $request)
    {
        $userID = $request->post('user_id');
        $franchiseID = $request->post('franchise_id');
        $time = Carbon::now();

        DB::table('franchise_user')->insertOrIgnore([
            'franchise_id'  => $franchiseID,
            'user_id'       => $userID,
            'created_at'    => $time,
        ]);

        return redirect()->route('franchises.index')->withStatus(__('Franchise and Account successfully linked.'));
    }

    // Get link accounts to display when unlinking from a franchise
    public function getLinkAccount()
    {
        if(isset($_GET['fid']))
        {
            $fid = $_GET['fid'];
        }

        $data = DB::table('franchise_user')
                    ->join('users','franchise_user.user_id','=','users.id')
                    ->select('users.id','users.name','users.email')
                    ->where('franchise_user.franchise_id','=', $fid)
                    ->get();
        return json_encode($data);
    }

    // Unlink Franchise from a Franchise User Account
    public function unlinkAccount(Request $request)
    {
        // dd($request);
        $user_id = $request->get('user_id');
        $franchise_id = $request->get('franchise_id');

        DB::table('franchise_user')->where([
            ['franchise_id','=',$franchise_id],
            ['user_id','=',$user_id],
        ])->delete();

        return redirect()->route('franchises.index')->withStatus(__('Franchise and Account successfully unlinked.'));
    }

}
