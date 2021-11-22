@extends('layouts.admin')
@section('content')
@can('document_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.documents.create") }}">
              {{ trans('procreate.add_document') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('procreate.legal_entity') }}

    </div>

    <div class="card-body">
        <div class="table">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>

                        <th>
                            {{ trans('cruds.document.fields.created_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.document.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.document.fields.description') }}
                        </th>
                    </tr>
                </thead>

                <tbody>
                  @foreach($documents2 as  $document)
                  <?php if ($document->project_id == 1): ?>
                        <tr data-entry-id="{{ $document->id }}">

                            <td>
                                {{ $document->created_at }}
                            </td>
                            <td>
                              <a href="{{ $document->xlsx }}" download target="_blank" class="downloadButton" document_id="{{$document->id}}">
                                  <button type="button" class="btn btn-success" name="button">XLSX</button>
                              </a>
                            </td>
                            <td>
                                {{ $document->description }}
                            </td>

                        </tr>
                        <tr data-entry-id="{{ $document->id }}">

                            <td>
                                {{ $document->created_at }}
                            </td>
                            <td>
                              <a href="{{ $document->pdf }}" download target="_blank" class="downloadButton" document_id="{{$document->id}}">
                                  <button type="button" class="btn btn-primary" name="button">PDF</button>
                              </a>
                            </td>
                            <td>
                                {{ $document->description }}
                            </td>

                        </tr>
                        <tr data-entry-id="{{ $document->id }}">

                            <td>
                                {{ $document->created_at }}
                            </td>
                            <td>
                              <a href="{{ $document->json }}" download target="_blank" class="downloadButton" document_id="{{$document->id}}">
                                  <button type="button" class="btn btn-warning" name="button">JSON</button>
                              </a>
                            </td>
                            <td>
                                {{ $document->description }}
                            </td>

                        </tr>
                        <tr data-entry-id="{{ $document->id }}">

                            <td>
                                {{ $document->created_at }}
                            </td>
                            <td>
                              <a href="{{ $document->txt }}" download target="_blank" class="downloadButton" document_id="{{$document->id}}">
                                  <button type="button" class="btn btn-info" name="button">txt</button>
                              </a>
                            </td>
                            <td>
                                {{ $document->description }}
                            </td>

                        </tr>
                      <?php endif; ?>
                      @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="card">
          <div class="card-header">
            {{ trans('procreate.individual') }}
          </div>

          <div class="card-body">
              <div class="table">
                  <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>

                            <th>
                                {{ trans('cruds.document.fields.created_at') }}
                            </th>
                            <th>
                                {{ trans('cruds.document.fields.project') }}
                            </th>
                            <th>
                                {{ trans('cruds.document.fields.description') }}
                            </th>
                        </tr>
                    </thead>

                      <tbody>
                        @foreach($documents ?? '' as  $document)
                        <?php if ($document->project_id == 2): ?>
                              <tr data-entry-id="{{ $document->id }}">

                                  <td>
                                      {{ $document->created_at }}
                                  </td>
                                  <td>
                                    <a href="{{ $document->xlsx }}" download target="_blank" class="downloadButton" document_id="{{$document->id}}">
                                        <button type="button" class="btn btn-success" name="button">XLSX</button>
                                    </a>
                                  </td>
                                  <td>
                                      {{ $document->description }}
                                  </td>


                              </tr>
                              <tr data-entry-id="{{ $document->id }}">
                                  <td>
                                      {{ $document->created_at }}
                                  </td>
                                  <td>
                                    <a href="{{ $document->pdf }}" download target="_blank" class="downloadButton" document_id="{{$document->id}}">
                                        <button type="button" class="btn btn-primary" name="button">PDF</button>
                                    </a>
                                  </td>
                                  <td>
                                      {{ $document->description }}
                                  </td>


                              </tr>
                              <tr data-entry-id="{{ $document->id }}">
                                  <td>
                                      {{ $document->created_at }}
                                  </td>
                                  <td>
                                    <a href="{{ $document->json }}" download target="_blank" class="downloadButton" document_id="{{$document->id}}">
                                        <button type="button" class="btn btn-warning" name="button">JSON</button>
                                    </a>
                                  </td>
                                  <td>
                                      {{ $document->description }}
                                  </td>


                              </tr>
                              <tr data-entry-id="{{ $document->id }}">
                                  <td>
                                      {{ $document->created_at }}
                                  </td>
                                  <td>
                                    <a href="{{ $document->txt }}" download target="_blank" class="downloadButton" document_id="{{$document->id}}">
                                        <button type="button" class="btn btn-info" name="button">TXT</button>
                                    </a>
                                  </td>
                                  <td>
                                      {{ $document->description }}
                                  </td>


                              </tr>
                            <?php endif; ?>
                            @endforeach
                      </tbody>
                  </table>
                </div>
              </div>
            </div>


@endsection
@section('scripts')
@parent
<script>
    $(function () {

      $('.downloadButton').click(function(){
  let document_id = $(this).attr('document_id');

$.ajax({
   url: '/admin/users/download',
   data: {document_id: document_id},
   done: function(response){
     console.log('im done');
   }
});

})

  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('document_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.documents.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Document:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
