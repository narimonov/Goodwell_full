@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.note.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.note.fields.name') }}
                        </th>
                        <td>
                            {{ $note->fio ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.note.fields.position') }}
                        </th>
                        <td>
                            {!! $note->doljnost !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.note.fields.number') }}
                        </th>
                        <td>
                            {!! $note->note_text !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection
