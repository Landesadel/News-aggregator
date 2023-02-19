<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateRequest;
use App\Http\Requests\Users\EditRequest;
use App\Models\User;
use App\QueryBuilders\UsersQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  UsersQueryBuilder  $usersBuilder
     * @return View
     */
    public function index(UsersQueryBuilder $usersBuilder): View
    {
        return \view('admin.users.index', [
            'usersList' => $usersBuilder->getUsersWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());

        if ($user) {
            $user->fill([
                $request->validated(),
                'password' => Hash::make($request->getPassword()),
            ])->save();
            return redirect()->route('admin.users.index')->with('success', 'User added');
        }

        return \back()->with('error', 'Something wrong... Try again later');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return View
     */
    public function edit(User $user): View
    {
        return \view('admin.users.edit', ['user' => $user]);
    }


    /**
     * @param  EditRequest  $request
     * @param  User         $user
     * @return RedirectResponse
     */
    public function update(EditRequest $request, User $user): RedirectResponse
    {
        $user = $user->fill($request->validated());


        if ($user) {
            if (Hash::needsRehash($request->getPassword())) {
                $user->fill([
                    $request->validated(),
                    'password' => Hash::make($request->getPassword()),
                ])->save();
            }

            return redirect()->route('admin.users.index')->with('success', 'User changed');
        }

        return \back()->with('error', 'Something wrong... try again');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        try{
            $user->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
