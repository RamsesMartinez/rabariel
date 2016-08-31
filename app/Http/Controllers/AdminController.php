<?php

namespace App\Http\Controllers;

use App\User;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

use Session;
class AdminController extends MainController
{
    function __construct(){
        parent::__construct();
        $this->middleware('adminSigned');
    }

    public function index()
    {
        self::$data['users'] = User::all()->toArray();
        return view('cms.users', self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cms.add_user', self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        User::createUser($request);
        return redirect('cms/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        self::$data['user_id'] = $id;
        return view('cms.delete_user', self::$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        self::$data['user'] = User::find($id)->toArray();
        return view('cms.edit_user', self::$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
        User::updateUser($request, $id);
        return redirect('cms/users');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('sm', 'El usuario fue eliminado');
        return redirect('cms/users');
    }
}
