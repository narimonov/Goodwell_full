@extends('layouts.admin')
@section('content')
@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.users.create") }}">
                {{ trans('procreate.add_user') }}
            </a>
            <a class="btn btn-success" href="{{ route("admin.user.create") }}">
                {{ trans('procreate.add_user2') }}
            </a>
        </div>
    </div>
@endcan
                      @if(auth()->user()->can('Admin'))
                      <div class="card">
                          <div class="card-header">
                              {{ trans('procreate.user_table') }}
                          </div>

                          <div class="card-body">
                              <div class="table-responsive">
                                  <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                                      <thead>
                                          <tr>
                                              <th width="10">

                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.id') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.roles') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.name') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.transaction.fields.transaction_type') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.inn') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.mfo') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.email') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.number') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.description') }}
                                              </th>

                                              <th>
                                                  &nbsp;
                                              </th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach($users as $key => $user)
                                            <?php if ($user->type == 2): ?>
                                              <tr data-entry-id="{{ $user->id }}">
                                                  <td>

                                                  </td>
                                                  <td>
                                                      {{ $user->id ?? '' }}
                                                  </td>
                                                  <td>
                                                      @foreach($user->roles as $key => $item)
                                                          <span class="badge badge-info">{{ $item->title }}</span>
                                                      @endforeach
                                                  </td>
                                                  <td>
                                                      {{ $user->name ?? '' }}
                                                  </td>
                                                  <td>
                                                      {{ $user->transaction_type->name}}
                                                  </td>
                                                  <td>
                                                      {{ $user->inn ?? '' }}
                                                  </td>
                                                  <td>
                                                      {{ $user->mfo ?? '' }}
                                                  </td>
                                                  <td>
                                                      {{ $user->email ?? '' }}
                                                  </td>
                                                  <td>
                                                      {{ $user->number ?? '' }}
                                                  </td>
                                                  <td>
                                                      {{ $user->desc ?? '' }}
                                                  </td>
                                                  <td>
                                                      @can('user_show')
                                                          <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                                              {{ trans('global.view') }}
                                                          </a>
                                                      @endcan

                                                      @can('user_edit')
                                                          <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                                              {{ trans('global.edit') }}
                                                          </a>
                                                      @endcan

                                                      @can('user_delete')
                                                          <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                              <input type="hidden" name="_method" value="DELETE">
                                                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                              <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                          </form>
                                                      @endcan

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
                              {{ trans('procreate.user_table2') }}
                          </div>

                          <div class="card-body">
                              <div class="table-responsive">
                                  <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                                      <thead>
                                          <tr>
                                              <th width="10">

                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.id') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.roles') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.name') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.familiya') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.otchestvo') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.transaction.fields.transaction_type') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.inn') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.num_licensy') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.email') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.number') }}
                                              </th>
                                              <th>
                                                  {{ trans('cruds.user.fields.description') }}
                                              </th>

                                              <th>
                                                  &nbsp;
                                              </th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach($users as $key => $user)
                                            <?php if ($user->type == 1): ?>
                                              <tr data-entry-id="{{ $user->id }}">
                                                  <td>

                                                  </td>
                                                  <td>
                                                      {{ $user->id ?? '' }}
                                                  </td>
                                                  <td>
                                                      @foreach($user->roles as $key => $item)
                                                          <span class="badge badge-info">{{ $item->title }}</span>
                                                      @endforeach
                                                  </td>
                                                  <td>
                                                      {{ $user->name ?? '' }}
                                                  </td>
                                                  <td>
                                                      {{ $user->familiya ?? '' }}
                                                  </td>
                                                  <td>
                                                      {{ $user->otchestvo ?? '' }}
                                                  </td>
                                                  <td>
                                                      {{ $user->transaction_type->name}}
                                                  </td>
                                                  <td>
                                                      {{ $user->inn ?? '' }}
                                                  </td>
                                                  <td>
                                                      {{ $user->num_licensy ?? '' }}
                                                  </td>
                                                  <td>
                                                      {{ $user->email ?? '' }}
                                                  </td>
                                                  <td>
                                                      {{ $user->number ?? '' }}
                                                  </td>
                                                  <td>
                                                      {{ $user->desc ?? '' }}
                                                  </td>
                                                  <td>
                                                      @can('user_show')
                                                          <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                                              {{ trans('global.view') }}
                                                          </a>
                                                      @endcan

                                                      @can('user_edit')
                                                          <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                                              {{ trans('global.edit') }}
                                                          </a>
                                                      @endcan

                                                      @can('user_delete')
                                                          <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                              <input type="hidden" name="_method" value="DELETE">
                                                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                              <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                          </form>
                                                      @endcan

                                                  </td>

                                              </tr>
                                              <?php endif; ?>
                                          @endforeach
                                      </tbody>
                                  </table>
                              </div>
                          </div>

                          <?php else: ?>

                            <div class="card">
                                <div class="card-header">
                                    {{ trans('procreate.user_table') }}
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                                            <thead>
                                                <tr>
                                                    <th width="10">

                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.id') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.roles') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.name') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.transaction.fields.transaction_type') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.inn') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.mfo') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.email') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.number') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.description') }}
                                                    </th>

                                                    <th>
                                                        &nbsp;
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $key => $user)
                                                <?php if (Auth::user()->id == $user->created_by): ?>
                                                  <?php if ($user->type == 2): ?>
                                                    <tr data-entry-id="{{ $user->id }}">
                                                        <td>

                                                        </td>
                                                        <td>
                                                            {{ $user->id ?? '' }}
                                                        </td>
                                                        <td>
                                                            @foreach($user->roles as $key => $item)
                                                                <span class="badge badge-info">{{ $item->title }}</span>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            {{ $user->name ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $user->transaction_type->name}}
                                                        </td>
                                                        <td>
                                                            {{ $user->inn ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $user->mfo ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $user->email ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $user->number ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $user->desc ?? '' }}
                                                        </td>
                                                        <td>
                                                            @can('user_show')
                                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                                                    {{ trans('global.view') }}
                                                                </a>
                                                            @endcan

                                                            @can('user_edit')
                                                                <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                                                    {{ trans('global.edit') }}
                                                                </a>
                                                            @endcan

                                                            @can('user_delete')
                                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                                </form>
                                                            @endcan

                                                        </td>

                                                    </tr>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                            <div class="card">
                                <div class="card-header">
                                    {{ trans('procreate.user_table2') }}
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                                            <thead>
                                                <tr>
                                                    <th width="10">

                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.id') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.roles') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.name') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.familiya') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.otchestvo') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.transaction.fields.transaction_type') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.inn') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.num_licensy') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.email') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.number') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.user.fields.description') }}
                                                    </th>

                                                    <th>
                                                        &nbsp;
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $key => $user)
                                                <?php if (Auth::user()->id == $user->created_by): ?>
                                                  <?php if ($user->type == 1): ?>
                                                    <tr data-entry-id="{{ $user->id }}">
                                                        <td>

                                                        </td>
                                                        <td>
                                                            {{ $user->id ?? '' }}
                                                        </td>
                                                        <td>
                                                            @foreach($user->roles as $key => $item)
                                                                <span class="badge badge-info">{{ $item->title }}</span>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            {{ $user->name ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $user->familiya ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $user->otchestvo ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $user->transaction_type->name}}
                                                        </td>
                                                        <td>
                                                            {{ $user->inn ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $user->num_licensy ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $user->email ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $user->number ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $user->desc ?? '' }}
                                                        </td>
                                                        <td>
                                                            @can('user_show')
                                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                                                    {{ trans('global.view') }}
                                                                </a>
                                                            @endcan

                                                            @can('user_edit')
                                                                <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                                                    {{ trans('global.edit') }}
                                                                </a>
                                                            @endcan

                                                            @can('user_delete')
                                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                                </form>
                                                            @endcan

                                                        </td>

                                                    </tr>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                          @endif


@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
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
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
