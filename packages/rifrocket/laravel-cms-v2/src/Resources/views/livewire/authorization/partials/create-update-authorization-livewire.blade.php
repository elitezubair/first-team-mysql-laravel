@push('styles')
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{lbsAssets('plugins/css/bootstrap-duallistbox.min.css')}}">
@endpush

<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">{{$card_title}}</h3>
      <div class="card-tools">
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="exampleInputBorder">Role <code>*</code> </label>
                <input type="text" class="form-control" id="exampleInputBorder" placeholder="role Name" wire:model="role">
            </div>
        </div>
        <div class="col-12">
          <div class="form-group" wire:ignore>
            <select class="duallistbox permissions_duallistbox" multiple="multiple" wire:model='permissions'>
                @if ($permissionList)
                    @foreach($permissionList as $prList)

                    <option value="{{$prList->name}}">{{$prList->display_name}}</option>
                    @endforeach
                @endif
            </select>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        @if ($role_id)
        <button type="submit" class="btn btn-primary float-right" wire:click="update_role">{{$card_title}}</button>
        @else
        <button type="submit" class="btn btn-primary float-right" wire:click="create_role">{{$card_title}}</button>
        @endif
    </div>

  </div>
  <!-- /.card -->

@push('scripts')
        <!-- Bootstrap4 Duallistbox -->
<script src="{{lbsAssets('plugins/js/jquery.bootstrap-duallistbox.min.js')}}"></script>

<script>
  $(function () {
      var permissionBox = $('.permissions_duallistbox').bootstrapDualListbox({
          nonSelectedListLabel: 'Permissions',
          selectedListLabel: 'Selected Permissions',
          preserveSelectionOnMove: 'moved',
          moveOnSelect: false,
          filterPlaceHolder:'search permission',
          selectorMinimalHeight:300
      }).on('change', function(){
          @this.set('permissions', $(this).val());
      });

    window.addEventListener('refresh-dual-select-box', event => {
        setTimeout(permissionBox.bootstrapDualListbox('refresh', true), 1000);
    });



    window.addEventListener('toggle-modal', event => {
        $('#'+event.detail.model_id).modal('toggle');
    });

  });
</script>
@endpush
