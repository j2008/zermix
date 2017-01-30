@extends('voyager::master')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-news"></i> {{ $dataType->display_name_plural }}
        <a href="{{ route('voyager.'.$dataType->slug.'.create') }}" class="btn btn-success">
            <i class="voyager-plus"></i> Add New
        </a>
    </h1>
@stop

@section('page_header_actions')

@stop

@section('css')
  <style>
    .category-nav{
      margin: 20px 0px;
      background-color: white !important;
    }
    .category-nav li a:hover{
      background-color: #64c8dc !important;
      color: white;
    }
  </style>
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">

                      <ul class="nav nav-tabs category-nav">
                        <li class="active"><a href="#all" onclick="showTab('all');">All</a></li>
                        @foreach ($top_categories as $category)
                          <li><a href="#{{$category->name}}" onclick="showTab('{{$category->name}}');">{{$category->name}}</a></li>
                        @endforeach
                      </ul>

                      <table id="dataTable-all" class="table table-hover">
                          <thead>
                              <tr>
                                  @foreach($dataType->browseRows as $row)
                                  <th>{{ $row->display_name }}</th>
                                  @endforeach
                                  <th class="actions">Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($dataTypeContent as $data)
                                  <tr>
                                      @foreach($dataType->browseRows as $row)
                                      <td>
                                          @if($row->type == 'image')
                                              <img src="@if( strpos($data->{$row->field}, 'http://') === false && strpos($data->{$row->field}, 'https://') === false){{ Voyager::image( $data->{$row->field} ) }}@else{{ $data->{$row->field} }}@endif" style="width:100px">
                                          @else
                                              {{ $data->{$row->field} }}
                                          @endif
                                      </td>
                                      @endforeach
                                      <td class="no-sort no-click">
                                          <div class="btn-sm btn-danger pull-right delete" data-id="{{ $data->id }}">
                                              <i class="voyager-trash"></i> Delete
                                          </div>
                                          <a href="{{ route('voyager.'.$dataType->slug.'.edit', $data->id) }}" class="btn-sm btn-primary pull-right edit">
                                              <i class="voyager-edit"></i> Edit
                                          </a>
                                          <a href="{{ route('voyager.'.$dataType->slug.'.show', $data->id) }}" class="btn-sm btn-warning pull-right">
                                              <i class="voyager-eye"></i> View
                                          </a>
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>

                      @foreach ($top_categories as $category)
                        <table id="dataTable-{{$category->name}}" class="table table-hover">
                            <thead>
                                <tr>
                                    @foreach($dataType->browseRows as $row)
                                    <th>{{ $row->display_name }}</th>
                                    @endforeach
                                    <th class="actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataTypeContent as $data)
                                  @if($data->category['parent_id'] == $category->id)
                                    <tr>
                                        @foreach($dataType->browseRows as $row)
                                        <td>
                                            @if($row->type == 'image')
                                                <img src="@if( strpos($data->{$row->field}, 'http://') === false && strpos($data->{$row->field}, 'https://') === false){{ Voyager::image( $data->{$row->field} ) }}@else{{ $data->{$row->field} }}@endif" style="width:100px">
                                            @else
                                                {{ $data->{$row->field} }}
                                            @endif
                                        </td>
                                        @endforeach
                                        <td class="no-sort no-click">
                                            <div class="btn-sm btn-danger pull-right delete" data-id="{{ $data->id }}">
                                                <i class="voyager-trash"></i> Delete
                                            </div>
                                            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $data->id) }}" class="btn-sm btn-primary pull-right edit">
                                                <i class="voyager-edit"></i> Edit
                                            </a>
                                            <a href="{{ route('voyager.'.$dataType->slug.'.show', $data->id) }}" class="btn-sm btn-warning pull-right">
                                                <i class="voyager-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                  @endif
                                @endforeach
                            </tbody>
                        </table>
                      @endforeach

                        @if (isset($dataType->server_side) && $dataType->server_side)
                            <div class="pull-left">
                                <div role="status" class="show-res" aria-live="polite">Showing {{ $dataTypeContent->firstItem() }} to {{ $dataTypeContent->lastItem() }} of {{ $dataTypeContent->total() }} entries</div>
                            </div>
                            <div class="pull-right">
                                {{ $dataTypeContent->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        <i class="voyager-trash"></i> Are you sure you want to delete this {{ $dataType->display_name_singular }}?
                    </h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.'.$dataType->slug.'.destroy', ['id' => '__id']) }}" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Yes, Delete This {{ $dataType->display_name_singular }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    {{-- DataTables --}}
    <script>
        function showTab(name){
          $('.dataTables_wrapper').fadeOut('slow');
          $('#dataTable-'+name+'_wrapper').fadeIn('slow');
        }
        @if (!$dataType->server_side)
            $(document).ready(function () {
              $('#dataTable-all').DataTable({ "order": [] });
              @foreach ($top_categories as $category)
                $('#dataTable-{{$category->name}}').DataTable({ "order": [] });
              @endforeach
              $('.dataTables_wrapper').fadeOut('fast');
              $('#dataTable-all_wrapper').fadeIn('fast');
            });
        @endif

        $('td').on('click', '.delete', function(e) {
            $('#delete_form')[0].action = $('#delete_form')[0].action.replace('__id', $(e.target).data('id'));
            $('#delete_modal').modal('show');
        });
    </script>
@stop
