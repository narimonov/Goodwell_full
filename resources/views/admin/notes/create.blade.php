@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.note.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.notes.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('note_text') ? 'has-error' : '' }}">
                <label for="note_text">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" name="fio" class="form-control " id="note_text" required >
                @if($errors->has('note_text'))
                    <p class="help-block">
                        {{ $errors->first('note_text') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.note.fields.note_text_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('note_text') ? 'has-error' : '' }}">
                <label for="note_text">{{ trans('cruds.user.fields.position') }}*</label>
                <input type="text" name="doljnost" class="form-control " id="note_text" required >
                @if($errors->has('note_text'))
                    <p class="help-block">
                        {{ $errors->first('note_text') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.note.fields.note_text_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('note_text') ? 'has-error' : '' }}">
                <label for="note_text">{{ trans('cruds.user.fields.number') }}*</label>
                <input type="text" name="note_text" class="form-control " id="note_text" value="+998" required >
                @if($errors->has('note_text'))
                    <p class="help-block">
                        {{ $errors->first('note_text') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.note.fields.note_text_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
