Livewire.hook('message.sent', (message,component) => {
    console.log('testing for livewire event');
    $('#loading-container').removeClass('loader-hidden');
});

Livewire.hook('message.processed', (message,component) => {
    console.log('testing for livewire event');
    $('#loading-container').addClass('loader-hidden');
});


window.addEventListener('toast-notification-component', event => {
    toastr[event.detail.type](event.detail.message,
        event.detail.type ?? ''), toastr.options = {
        "closeButton": true,
        "progressBar": true,
    }
})

window.addEventListener('open-media-uploader', event => {
    $('#modal_'+event.detail.modeId).modal('show');

   var endpoint=$('#media_upload_base_url').val();;
   var csrf=$('#csrf_token').val();
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
})

window.addEventListener('set-media-uploader', event => {
    $('#media_input_'+event.detail.targetId).val(event.detail.setValue);

})
