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
				<label class='lbs-label'>Google API</label>
				<input type="text" class="form-control" name="GOOGLE_API" placeholder="enter mail connection" value="{{env('GOOGLE_API')??$settings->GOOGLE_API}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>YouTube API</label>
				<input type="text" class="form-control" name="YOUTUBE_API" placeholder="enter mail host" value="{{env('YOUTUBE_API')??$settings->YOUTUBE_API}}"> </div>
			<div class="form-group">
				<label class='lbs-label'>YouTube API Quota</label>
				<input type="text" class="form-control" name="YOUTUBE_API_QOUTA" placeholder="enter mail port" value="{{env('YOUTUBE_API_QOUTA')??$settings->YOUTUBE_API_QOUTA}}"> </div>

                <button type="submit" class="btn btn-primary" style="float: right;">save</button>
            </form>
		</div>
</div>
