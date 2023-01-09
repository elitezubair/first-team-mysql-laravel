@push('styles')
  <!-- CodeMirror -->
  <link rel="stylesheet" href="{{lbsAssets('plugins/css/codemirror.css')}}">
  <link rel="stylesheet" href="{{lbsAssets('plugins/css/monokai.css')}}">
@endpush

<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">backend {{$card_title}}</h3>
			<br> <small>backend-custom.css</small>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
			</div>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<div class="card-body">
			<form action="{{route('lbs.setting.app.css.settings.update')}}"> @csrf
				<div class="form-group">
					<textarea id="backend-css-editor" name="backend_css_editor" class="p-3">{{$backendCss}}</textarea>
				</div>
				<button type="submit" class="btn btn-primary" style="float: right;">save</button>
			</form>
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">frontend {{$card_title}}</h3>
			<br> <small>frontend-custom.css</small>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
			</div>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<div class="card-body">
			<form action="{{route('lbs.setting.app.css.settings.update')}}"> @csrf
				<div class="form-group">
					<textarea id="frontend-css-editor" name="frontend_css_editor" class="p-3">{{$frontendCss}}</textarea>
				</div>
				<button type="submit" class="btn btn-primary" style="float: right;">save</button>
			</form>
		</div>
	</div>
</div>
@push('scripts')
<!-- CodeMirror -->
<script src="{{lbsAssets('plugins/js/codemirror.js')}}"></script>
<script src="{{lbsAssets('plugins/mirror_modes/css/css.js')}}"></script>

<script>
    $(function () {

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("frontend-css-editor"), {
        mode: "css",
        theme: "monokai",
      });

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("backend-css-editor"), {
        mode: "css",
        theme: "monokai",
      });
    })
  </script>

@endpush
