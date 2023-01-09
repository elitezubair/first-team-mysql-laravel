<div>
    <div class="card">
        <div class="card-header">
            <br>
            <div class="row yf_display_inline head_space">
                <div class="col-sm-1">
                    <div class="form-group input-group-sm">
                        <select class="form-control staff-dashboard_ " style="width: 100%;" wire:model.defer="number_of_rows" >
                            @foreach($page_range as $rowKey => $pages)
                                <option value="{{$pages}}" > {{ $pages }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group input-group-sm">
                        <input type="text" class="form-control staff-dashboard_ " placeholder="search" wire:model.debounce.500ms="basic_search">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Department En</th>
                    <th>Department Ar</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    {{-- @dd($collections) --}}
                @if($collections)

                    @foreach($collections as $key => $collection)

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $collection->department_en }}</td>
                            <td>{{ $collection->department_ar }}</td>
                            <td>
                                @if(empty($collection->deleted_at) )

                                <span class=" badge badge-danger row-count-badge card-color-green badge-min-width"> {{ $collection->status }}</span>
                                @else
                                <span class=" badge badge-danger row-count-badge">DELETED</span>
                                @endif

                            </td>
                            <td>
                                <div class="input-group-prepend">
                                    <div class="action_list">
                                    @if(empty($collection->deleted_at) )
                                      <a class="dropdown-item" style="cursor: pointer;" wire:click="edit({{$collection->id}})"><img src={{asset('img/Edit.png')}} alt="Edit"></a>
                                      <a class="dropdown-item" style="cursor: pointer;" wire:click="delete({{$collection->id}})"><img src={{asset('img/delete.png')}} alt="delete"></a>
                                      @else

                                      <a class="dropdown-item" style="cursor: pointer;" wire:click="undelete({{$collection->id}})"><img src={{asset('img/trash.png')}} alt="trash"></a>
                                      @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            @if($collections)
            <span class=" badge badge-danger row-count-badge">{{ $collections->total()}}</span>
            @endif
            <ul class="pagination pagination-sm m-0 float-right">

                @if($collections)
                {{$collections->links()}}
                @endif
            </ul>
        </div>
      </div>
      <!-- /.card -->

</div>
