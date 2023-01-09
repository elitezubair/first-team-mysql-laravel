<div>

    <div class="input-group" wire:click="mediaModel({{true}})">
        <div class="custom-file">
           <label class="custom-file-label" >{!! count($set_selected)>0?count($set_selected).'&nbsp;&nbsp;'.Lbstranslate('File Selected'):Lbstranslate('Choose File') !!}</label>
        </div>
    </div>

    @if ($preview and $selectMediaCols)
    <br>
    <div class="row">
            @if ($selectMediaCols)
            @foreach ($selectMediaCols as $mKeys => $selectMediaCol)
                <div class="col-sm-1 lbs-media-uploader-preview" wire:key="{{$mKeys}}">
                    <div class="info-box bg-light lbs-image-lib" id="media_{{$selectMediaCol['id']}}">
                        <div class="info-box-content pt-2">
                            @if ($selectMediaCol['media_type'] == 'image')
                                <img src="{{lbsUploadedAsset($selectMediaCol['id'],'thumb')}}" class="img-fluid mb-2"/>
                            @elseif ($selectMediaCol['media_type'] == 'video')
                                <img src="{{lbsAssets('img/default_video.jpg')}}" class="img-fluid mb-2"/>
                            @elseif ($selectMediaCol['media_type'] == 'archive')
                                <img src="{{lbsAssets('img/default_archive.jpg')}}" class="img-fluid mb-2"/>
                                @elseif ($selectMediaCol['media_type'] == 'document')
                                    <img src="{{lbsAssets('img/default_doc.jpg')}}" class="img-fluid mb-2"/>
                                @elseif ($selectMediaCol['media_type'] == 'pdf')
                                    <img src="{{lbsAssets('img/default_pdf.jpg')}}" class="img-fluid mb-2"/>
                                @endif
                            <span class="info-box-text text-center text-muted">{{$selectMediaCol['original_name']}}</span>
                            <span class="info-box-text text-center text-muted" wire:click="remove_file({{$selectMediaCol['id']}})"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    @endif

    @if ($open_media_model)
    <!-- /.modal -->
    <div class="modal fade" data-backdrop="static"  aria-hidden="true" id="modal_{{$name}}" wire:ignore.self>
        <div class="modal-dialog modal-xl media-uploader-modal">
            <div class="modal-content">
            <div class="modal-body">
                <div class="card card-primary card-outline card-outline-tabs media-uploader-card">
                    <div class="card-header p-0 border-bottom-0">
                      <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#lbs_media_uploader_list{{$name}}" role="tab" aria-controls="lbs_media_uploader_list{{$name}}" aria-selected="true">{{ lbsTranslate('Select File') }}</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link"  id="custom-tabs-four-profile-tab" data-toggle="pill" href="#lbs_media_upload{{$name}}" role="tab" aria-controls="lbs_media_upload{{$name}}" aria-selected="false">{{ lbsTranslate('Upload New') }}</a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="lbs_media_uploader_list{{$name}}" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                           @include('LbsViews::livewire.media.partials.livewire-media-upload-partial')
                        </div>
                        <div class="tab-pane fade" id="lbs_media_upload{{$name}}" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                            <div wire:ignore id="drag-drop-area" class="drag-drop-area"></div>
                        </div>
                      </div>

                    </div>
                    <!-- /.card -->
                  </div>
            </div>
            <div class="modal-footer justify-content-between">

                <div class="flex-grow-1 overflow-hidden d-flex">
					<div class="">
						<div class="aiz-uploader-selected">{{count($set_selected)}}&nbsp;&nbsp;{{ lbsTranslate('File selected') }}</div>
						<button type="button" class="btn-link btn btn-sm p-0 aiz-uploader-selected-clear" wire:click="clear_files">{{ lbsTranslate('Clear') }}</button>
					</div>
					<div class="mb-0 ml-3">
                        {{$collections->links('LbsViews::utility.utility-simple-pagination')}}
					</div>
				</div>

                <button type="button" class="btn btn-primary"  data-dismiss="modal" wire:click="add_file">{{ lbsTranslate('Add Files') }}</button>
                <button type="button" class="btn btn-danger"  data-dismiss="modal" wire:click="mediaModel({{false}})">{{ lbsTranslate('Close') }}</button>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @endif

</div>





