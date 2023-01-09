<div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
                 src="{{lbsUploadedAsset($avatar,'thumb')}}"
                 alt="User profile picture">
          </div>

          <h3 class="profile-username text-center">{{$name}}</h3>

          <p class="text-muted text-center">{{$designation}}</p>

          <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">{{$education}}</p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">{{$location}}</p>

                <hr>


                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">{{$notes}}</p>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills" wire:ignore>
            <li class="nav-item"><a class="nav-link active" href="#roles_permissions" data-toggle="tab">Role and Permissions</a></li>
            <li class="nav-item"><a class="nav-link" href="#personal_information" data-toggle="tab">Personal Information</a></li>
            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Profile Setting</a></li>
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body" wire:ignore>
          <div class="tab-content">
            <div class="active tab-pane" id="roles_permissions">
              <!-- Post -->
              <div class="post">
                <div class="user-block">

                  <span>
                    <h4>Roles:</h4>
                  </span>
                </div>
                <!-- /.user-block -->
                <p>
                    Name of Roles
                </p>
              </div>

              <div class="post">
                <div class="user-block">

                  <span>
                    <h4>Permissions:</h4>
                  </span>
                </div>
                <!-- /.user-block -->
                <p>
                    Name of Permissions
                </p>
              </div>
              <!-- /.post -->

            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="personal_information">
              <!-- The timeline -->
                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">Education</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEducation" placeholder="Education" wire:model.defer="education">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Location</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputLocation" placeholder="Location" wire:model.defer="location">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Notes</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience" wire:model.defer="notes"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="button" class="btn btn-danger" wire:click="update_personal_info">Submit</button>
                  </div>
                </div>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="settings">
              <form class="form-horizontal">
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" readonly wire:model.defer="email">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name" wire:model.defer="first_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name" wire:model.defer="last_name">
                    </div>
                </div>
                <div class="form-group row">
                  <label for="inputName2" class="col-sm-2 col-form-label">Profile</label>
                  <div class="col-sm-10">
                    @include('LbsViews::utility.utility-media-uploader',['name'=>'avatar','datatype'=>'image','multiple'=>false, 'preview'=>false, 'old_media'=>$avatar])
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Change Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" placeholder="password" wire:model.defer="password" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="button" class="btn btn-danger" wire:click="updateSetting">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->

</div>
