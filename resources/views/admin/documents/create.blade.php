@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('procreate.add_document') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.documents.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('project_id') ? 'has-error' : '' }}">
                <label for="project">{{ trans('cruds.document.fields.project') }}*</label>
                <select name="project_id" id="project" class="form-control select2" required>
                    @foreach($projects as $id => $project)
                    @if($id < 3)
                        <option value="{{ $id }}" {{ (isset($document) && $document->project ? $document->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endif
                    @endforeach
                </select>
                @if($errors->has('project_id'))
                    <p class="help-block">
                        {{ $errors->first('project_id') }}
                    </p>
                @endif
            </div>
            @if(Session::has('success'))
                    <div class="alert-box success">
                        <h2>{!! Session::get('success') !!}</h2>
                    </div>
            @endif
            <div class="custom-file">
                <input type="file" name="document_file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Excel</label>
            </div>
            <div class="custom-file">
                <input type="file" name="document_file_pdf" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">PDF</label>
            </div>
            <div class="custom-file">
                <input type="file" name="document_file_json" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">JSON</label>
            </div>
            <div class="custom-file">
                <input type="file" name="document_file_txt" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">txt</label>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.document.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($document) ? $document->description : '') }}</textarea>
                @if($errors->has('description'))
                    <p class="help-block">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.document.fields.description_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.documentFileDropzone = {
    url: '{{ route('admin.documents.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="document_file"]').remove()
      $('form').append('<input type="hidden" name="document_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="document_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($document) && $document->document_file)
      var file = {!! json_encode($document->document_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="document_file" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@stop
