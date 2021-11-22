<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\User;
use App\Document;
use App\Download;
use Auth;
use Gate;
use App\TransactionType;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();

        $documents = Document::orderBy('id', 'desc')->take(1)->get();

        return view('admin.users.index', compact('users','documents'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction_types = TransactionType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $roles2=Role::all();

        return view('admin.users.create', compact('roles2','transaction_types'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());

        $user->type = 1;

        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user, Document $document)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles2=Role::all();

        $user->load('roles');

        $document->load('project');

        return view('admin.users.edit', compact('roles2', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        $user->update(['doc_id' => $request->button]);

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function downloadStatus(Request $request){
      $document_id = $request->get('document_id');
      $currentUserId = Auth::user()->id;
      $downloadModel = Download::where('user_id', $currentUserId)->where('document_id', $document_id)->first();
      if($downloadModel){
        $downloadModel->download_count = $downloadModel->download_count + 1;
        $downloadModel->save();
      } else {
        $downloadModel = new Download();
        $downloadModel->user_id = $currentUserId;
        $downloadModel->document_id = $document_id;
        $downloadModel->download_count = 1;
        $downloadModel->save();
      }
      return true;
    }
}
