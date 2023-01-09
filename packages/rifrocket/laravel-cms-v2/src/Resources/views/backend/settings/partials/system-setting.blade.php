<div class="card card-primary collapsed-card">
	<div class="card-header">
		<h3 class="card-title">{{$card_title}}</h3> <br> <small>env settings</small>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-plus"></i> </button>
		</div>
	</div>
	<!-- /.card-header -->
	<!-- form start -->

		<div class="card-body">
            <form action="{{route('lbs.setting.app.env.settings.update')}}"> @csrf
            <div class="form-group">
                <label class='lbs-label'>App Log</label>
                @include('LbsViews::utility.utility-media-uploader',['name'=>'APP_LOGO','datatype'=>'image','multiple'=>false, 'preview'=>true, 'old_media'=>env('APP_LOGO')??$settings->APP_LOGO])
            </div>
            <div class="form-group">
                <label class='lbs-label'>App Icon</label>
                @include('LbsViews::utility.utility-media-uploader',['name'=>'APP_ICON','datatype'=>'image','multiple'=>false, 'preview'=>true, 'old_media'=>env('APP_ICON')??$settings->APP_ICON])
            </div>
			<div class="form-group">
				<label class='lbs-label'>App Name</label>
				<input type="text" class="form-control" name="APP_NAME" placeholder="enter application name" value="{{env('APP_NAME')??$settings->APP_NAME}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>App Domain</label>
				<input type="text" class="form-control" name="APP_DOMAIN" placeholder="enter application domain" value="{{env('APP_DOMAIN')??$settings->APP_DOMAIN}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>App URL</label>
				<input type="text" class="form-control" name="APP_URL" placeholder="enter application url" value="{{env('APP_URL')??$settings->APP_URL}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>App Version</label>
				<input type="text" class="form-control" name="APP_VERSION" placeholder="enter application version" value="{{env('APP_VERSION')??$settings->APP_VERSION}}"> </div>

            <div class="form-group">
                <label>App Loader</label>
                <select class="form-control"   name="APP_LOADER">
                    <option value="loader_multi_spinner" {{env('APP_LOADER')=="loader_multi_spinner"?'selected':''}}>Multi Spinner</option>
                    <option value="loader_single_spinner" {{env('APP_LOADER')=="loader_single_spinner"?'selected':''}}>Single Spinner</option>
                    <option value="loader_flip_square" {{env('APP_LOADER')=="loader_flip_square"?'selected':''}}>Flip Square</option>
                    <option value="mini_loader" {{env('APP_LOADER')=="mini_loader"?'selected':''}}>Mini Spinner</option>
                    <option value="mesh_loader" {{env('APP_LOADER')=="mesh_loader"?'selected':''}}>Mesh Spinner</option>
                </select>
            </div>

                <button type="submit" class="btn btn-primary" style="float: right;">save</button>

            </form>
		</div>
		<!-- /.card-body -->


</div>
