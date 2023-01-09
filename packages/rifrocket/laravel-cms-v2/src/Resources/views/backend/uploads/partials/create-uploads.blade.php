
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Upload New Media</h3>

      <div class="card-tools">
       <a href="{{route('lbs.uploads.index')}}"> <button type="button" class="btn btn-tool">
            <i class="fas fa-angle-double-left"></i> Back to uploaded files </button></a>
      </div>
    </div>
    <div class="card-body">
        <div id="drag-drop-area" class="drag-drop-area"></div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->


@push('scripts')
<script>

    var endpoint="{{route('uploaded-files.upload')}}";
    var csrf="{{csrf_token()}}";
    var uppy = new Uppy.Core({
                    autoProceed: true,
                });
        uppy.use(Uppy.Dashboard, {
            inline: true,
            target: '.drag-drop-area',
            showLinkToFileUploadResult: false,
            showProgressDetails: true,
            hideCancelButton: true,
            hidePauseResumeButton: true,
            hideUploadButton: true,
            proudlyDisplayPoweredByUppy: false,
            locale: {
                strings: {
                    addMoreFiles: Lbs.local.add_more_files,
                    addingMoreFiles: Lbs.local.adding_more_files,
                    dropPaste: Lbs.local.drop_files_here_paste_or+' %{browse}',
                    browse: Lbs.local.browse,
                    uploadComplete: Lbs.local.upload_complete,
                    uploadPaused: Lbs.local.upload_paused,
                    resumeUpload: Lbs.local.resume_upload,
                    pauseUpload: Lbs.local.pause_upload,
                    retryUpload: Lbs.local.retry_upload,
                    cancelUpload: Lbs.local.cancel_upload,
                    xFilesSelected: {
                        0: '%{smart_count} '+Lbs.local.file_selected,
                        1: '%{smart_count} '+Lbs.local.files_selected
                    },
                    uploadingXFiles: {
                        0: Lbs.local.uploading+' %{smart_count} '+Lbs.local.file,
                        1: Lbs.local.uploading+' %{smart_count} '+Lbs.local.files
                    },
                    processingXFiles: {
                        0: Lbs.local.processing+' %{smart_count} '+Lbs.local.file,
                        1: Lbs.local.processing+' %{smart_count} '+Lbs.local.files
                    },
                    uploading: Lbs.local.uploading,
                    complete: Lbs.local.complete,
                }
            }
      })
      uppy.use(Uppy.XHRUpload, {
                    endpoint: endpoint,
                    fieldName: "lbs_file",
                    formData: true,
                    headers: {
                        'X-CSRF-TOKEN':csrf,
                    },
                });

    uppy.on('complete', (result) => {
      console.log('Upload complete! We’ve uploaded these files:', result.successful)
    })
</script>
@endpush

