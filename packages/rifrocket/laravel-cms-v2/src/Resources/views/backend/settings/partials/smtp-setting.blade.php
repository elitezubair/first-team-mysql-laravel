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
				<label class='lbs-label'>Mail Connection</label>
				<input type="text" class="form-control" name="MAIL_MAILER" placeholder="enter mail connection" value="{{env('MAIL_MAILER')??$settings->MAIL_MAILER}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>Mail Host</label>
				<input type="text" class="form-control" name="MAIL_HOST" placeholder="enter mail host" value="{{env('MAIL_HOST')??$settings->MAIL_HOST}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>Mail Port</label>
				<input type="text" class="form-control" name="MAIL_PORT" placeholder="enter mail port" value="{{env('MAIL_PORT')??$settings->MAIL_PORT}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>Mail Name</label>
				<input type="text" class="form-control" name="MAIL_USERNAME" placeholder="enter mail name" value="{{env('MAIL_USERNAME')??$settings->MAIL_USERNAME}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>Mail Username</label>
				<input type="text" class="form-control" name="MAIL_PASSWORD" placeholder="enter mail username" value="{{env('MAIL_PASSWORD')??$settings->MAIL_PASSWORD}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>Mail Password</label>
				<input type="text" class="form-control" name="MAIL_ENCRYPTION" placeholder="enter mail password" value="{{env('MAIL_ENCRYPTION')??$settings->MAIL_ENCRYPTION}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>Mail Address</label>
				<input type="text" class="form-control" name="MAIL_FROM_ADDRESS" placeholder="enter mail address" value="{{env('MAIL_FROM_ADDRESS')??$settings->MAIL_FROM_ADDRESS}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>Mail From Name</label>
				<input type="text" class="form-control" name="MAIL_FROM_NAME" placeholder="enter mail from name" value="{{env('MAIL_FROM_NAME')??$settings->MAIL_FROM_NAME}}"> </div>
                <button type="submit" class="btn btn-primary" style="float: right;">save</button>
            </form>
		</div>

</div>
