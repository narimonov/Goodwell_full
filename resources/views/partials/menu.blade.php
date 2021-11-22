<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <a href="/admin" class="brand-link">
        <span class="brand-text font-weight-light">
          <img src="{{asset('./img/logo.jpg')}}" alt="" style="width:8em;padding-left:3em">
        </span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @can('document_access')
                <li class="nav-item has-treeview {{ request()->is('admin/currencies*') ? '' : '' }} {{ request()->is('admin/transaction-types*') ? '' : '' }} {{ request()->is('admin/income-sources*') ? '' : '' }} {{ request()->is('admin/client-statuses*') ? '' : '' }} {{ request()->is('admin/project-statuses*') ? '' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                      <i class="fa-fw fas fa-file-alt">

                      </i>
                        <p>
                            <span>{{ trans('cruds.document.title') }}</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                      @can('document_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.documents.index") }}" class="nav-link {{ request()->is('admin/documents') || request()->is('admin/documents/*') ? 'active' : '' }}">

                            <p>
                                <span>{{ trans('cruds.document.fields.document1') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('document_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.doc.index") }}" class="nav-link {{ request()->is('admin/documents2') || request()->is('admin/documents2/*') ? 'active' : '' }}">

                            <p>
                                <span>{{ trans('cruds.document.fields.document2') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
              </ul>
          </li>
      @endcan
      @can('document_access')
        <li class="nav-item">
            <a href="{{ route("admin.test.index") }}" class="nav-link {{ request()->is('admin/documents2') || request()->is('admin/documents2/*') ? 'active' : '' }}">
               <i class="fa-fw fas fa-file-alt">

               </i>
                <p>
                   <span>Санкции ФАТФ</span>
                </p>
            </a>
        </li>
      @endcan
      @can('transaction_type_access')
          <li class="nav-item">
              <a href="{{ route("admin.transaction-types.index") }}" class="nav-link {{ request()->is('admin/transaction-types') || request()->is('admin/transaction-types/*') ? 'active' : '' }}">
                  <i class="fa-fw fas fa-money-check">

                  </i>
                  <p>
                      <span>{{ trans('cruds.transactionType.title') }}</span>
                  </p>
              </a>
          </li>
      @endcan
                @can('client_management_setting_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/currencies*') ? '' : '' }} {{ request()->is('admin/transaction-types*') ? '' : '' }} {{ request()->is('admin/income-sources*') ? '' : '' }} {{ request()->is('admin/client-statuses*') ? '' : '' }} {{ request()->is('admin/project-statuses*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                          <i class="left fa-fw fas fa-cog "></i>
                            <p>
                                <span>{{ trans('cruds.clientManagementSetting.title') }}</span>
              								<br>
              								<span>{{ trans('cruds.clientManagementSetting.title2')}}</span>
                            </p>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('note_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.notes.index") }}" class="nav-link {{ request()->is('admin/notes') || request()->is('admin/notes/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-sticky-note">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.note.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('income_source_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.income-sources.index") }}" class="nav-link {{ request()->is('admin/income-sources') || request()->is('admin/income-sources/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-database">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.incomeSource.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                      <i class="fas fa-fw fa-sign-out-alt"></i>
                        <p>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
