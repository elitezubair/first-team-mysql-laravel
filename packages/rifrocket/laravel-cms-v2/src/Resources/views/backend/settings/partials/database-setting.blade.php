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
				<label class='lbs-label'>DB Connection</label>
				<input type="text" class="form-control" name="DB_CONNECTION" placeholder="enter database connection" value="{{env('DB_CONNECTION')??$settings->DB_CONNECTION}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>DB Host</label>
				<input type="text" class="form-control" name="DB_HOST" placeholder="enter database host" value="{{env('DB_HOST')??$settings->DB_HOST}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>DB Port</label>
				<input type="text" class="form-control" name="DB_PORT" placeholder="enter database port" value="{{env('DB_PORT')??$settings->DB_PORT}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>DB Database</label>
				<input type="text" class="form-control" name="DB_DATABASE" placeholder="enter database name" value="{{env('DB_DATABASE')??$settings->DB_DATABASE}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>DB Username</label>
				<input type="text" class="form-control" name="DB_USERNAME" placeholder="enter database username" value="{{env('DB_USERNAME')??$settings->DB_USERNAME}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>DB Password</label>
				<input type="text" class="form-control" name="DB_PASSWORD" placeholder="enter database password" value="{{env('DB_PASSWORD')??$settings->DB_PASSWORD}}"> </div>
                <button type="submit" class="btn btn-primary" style="float: right;">save</button>
            </form>
		</div>

</div>
