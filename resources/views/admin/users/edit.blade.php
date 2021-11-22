@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control">
                @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">{{ trans('cruds.user.fields.roles') }}*</label>
                  <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                      @foreach($roles2 as $roles)
                      @if(auth()->user()->can('Admin'))
                        @if($roles->id > 1 && $roles->id < 7)
                          <option value="{{ $roles->id }}" >{{ $roles->title }}</option>
                      @endif
                      @endif
                      @if(auth()->user()->can('Надзорное ведомство'))
                        @if($roles->id > 3 && $roles->id < 7)
                          <option value="{{ $roles->id }}" >{{ $roles->title }}</option>
                      @endif
                      @endif
                      @if(auth()->user()->can('Республика'))
                        @if($roles->id > 4 && $roles->id < 7)
                          <option value="{{ $roles->id }}" >{{ $roles->title }}</option>
                      @endif
                      @endif
                      @if(auth()->user()->can('Область'))
                        @if($roles->id > 5 && $roles->id < 7)
                          <option value="{{ $roles->id }}" >{{ $roles->title }}</option>
                      @endif
                      @endif
                      @if(auth()->user()->can('Район'))
                        @if($roles->id > 6)
                          <option value="{{ $roles->id }}" >{{ $roles->title }}</option>
                      @endif
                      @endif


                  @endforeach
                  </select>

                @if($errors->has('roles'))
                    <p class="help-block">
                        {{ $errors->first('roles') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.roles_helper') }}
                </p>
            </d
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
