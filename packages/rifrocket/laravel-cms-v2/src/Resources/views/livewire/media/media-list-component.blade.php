<div>
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Media Files</h3>

        <div class="card-tools"> <a  href="{{route('uploaded-files.create')}}" class="btn btn-warning btn-sm  " >Upload Media </a> </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class=" col-md-12 mb-4 col-12">
                    <div>

                        <input type="text" class="form-control custom-media-search" placeholder="search by title" wire:model.debounce.500ms="search_title">
                        <select class="custom-select" style="width: 15%;" data-sortOrder  wire:model="search_timeline">
                            <option value="">chose timeline..</option>
                            <option value="newest">Newest</option>
                            <option value="oldest">Oldest</option>
                            <option value="smallest">Smallest</option>
                            <option value="largest">Largest</option>
                        </select>
                        <select class="custom-select" style="width: 15%;" data-sortOrder  wire:model="search_file_type">
                            <option value="">chose type..</option>
                            <option value="image">image</option>
                            <option value="pdf">pdf</option>
                            <option value="video">video</option>
                            <option value="document">document</option>
                            <option value="archive">archive</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="{{$mediaCollect? 'col-md-9':'col-md-12'}} order-2 order-md-1 media-scroll ">
                    <div class="row ">

                        @if (!$collections->isEmpty())
                            @foreach ($collections as $collection)
                                <div class="col-12 col-md-2">
                                    <div class="info-box bg-light lbs-image-lib" id="media_{{$collection->id}}" wire:click="onSelectMedia({{$collection->id}})">
                                        <div class="info-box-content pt-2">
                                            @if ($collection->file_type == 'image')
                                                <img src="{{lbsUploadedAsset($collection,'thumb')}}" class="img-fluid mb-2"
                                                alt="{{$collection->alternate_name??$collection->original_name}}"/>
                                            @elseif ($collection->file_type == 'video')
                                                <img src="{{lbsAssets('img/default_video.jpg')}}" class="img-fluid mb-2"
                                                alt="{{$collection->alternate_name??$collection->original_name}}"/>
                                            @elseif ($collection->file_type == 'archive')
                                                <img src="{{lbsAssets('img/default_archive.jpg')}}" class="img-fluid mb-2"
                                                alt="{{$collection->alternate_name??$collection->original_name}}"/>
                                                @elseif ($collection->file_type == 'document')
                                                    <img src="{{lbsAssets('img/default_doc.jpg')}}" class="img-fluid mb-2"
                                                    alt="{{$collection->alternate_name??$collection->original_name}}"/>
                                                @elseif ($collection->file_type == 'pdf')
                                                    <img src="{{lbsAssets('img/default_pdf.jpg')}}" class="img-fluid mb-2"
                                                    alt="{{$collection->alternate_name??$collection->original_name}}"/>
                                                @endif
                                            <span class="info-box-text text-center text-muted">{{$collection->original_name}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>

                    <div class="card-footer clearfix">
                        @if($TotalCount)
                        <span class=" badge badge-danger row-count-badge">{{$TotalCount}}</span>
                        @endif
                        <ul class="pagination pagination-sm m-0 float-right">

                            @if($collections)
                                @include('LbsViews::utility.utility-pagination',['total_pages'=>$TotalCount, 'num_results_on_page'=>$number_of_rows,'page'=>$collections->currentPage()])
                            @endif
                        </ul>
                    </div>

                </div>
                @if ($mediaCollect)
                <div class="col-12 col-md-12 col-lg-3 order-1 order-md-2 border-left">

                    <div class="loading" wire:loading>
                        @include('LbsViews::utility.utility-default-loader',['mini_loader'=>true])
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            @if ($mediaCollect)
                                @if ($mediaCollect->file_type == 'image')
                                    <img src="{{lbsUploadedAsset($mediaCollect,'thumb')}}" class="img-fluid mb-2"
                                    alt="{{$mediaCollect->alternate_name??$mediaCollect->original_name}}"/>
                                @elseif ($mediaCollect->file_type == 'video')
                                    <img src="{{lbsAssets('img/default_video.jpg')}}" class="img-fluid mb-2"
                                    alt="{{$mediaCollect->alternate_name??$mediaCollect->original_name}}"/>
                                @elseif ($mediaCollect->file_type == 'archive')
                                    <img src="{{lbsAssets('img/default_archive.jpg')}}" class="img-fluid mb-2"
                                    alt="{{$mediaCollect->alternate_name??$mediaCollect->original_name}}"/>
                                @elseif ($mediaCollect->file_type == 'document')
                                    <img src="{{lbsAssets('img/default_doc.jpg')}}" class="img-fluid mb-2"
                                    alt="{{$mediaCollect->alternate_name??$mediaCollect->original_name}}"/>
                                @elseif ($mediaCollect->file_type == 'pdf')
                                    <img src="{{lbsAssets('img/default_pdf.jpg')}}" class="img-fluid mb-2"
                                    alt="{{$mediaCollect->alternate_name??$mediaCollect->original_name}}"/>
                                @endif
                            @endif
                        </div>
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="email" class="form-control" id="name"
                                    placeholder="name" wire:model.lazy="original_name">
                            </div>
                            <div class="form-group">
                                <label for="altername_text">Alternate Text</label>
                                <input type="email" class="form-control" id="altername_text"
                                    placeholder="alternate text" wire:model.lazy="alternate_name">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" placeholder="description ..." wire:model.lazy="description"></textarea>
                            </div>


                            <div class="form-group"  x-data="{ open: @entangle('is_private') }">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" wire:model="is_private">
                                    <label class="custom-control-label" for="customSwitch1">Media Visibility
                                        <span  x-show="!open"  class="badge bg-info">Public</span>
                                        <span  x-show="open"  class="badge bg-info">storage</span>
                                    </label>
                                </div>
                            </div>




                            <div class="form-group mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="media url"  wire:model="media_link" readonly>
                                    <div class="input-group-prepend">
                                        <button class="input-group-text btn bg-maroon" @click="window.navigator.clipboard.writeText('{{$media_link}}'); $wire.call('emitNotifications', 'copied to clipboard', 'success');" wire:loading.attr="disabled">copy media url</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-2">
                            <h5 class=" text-muted">Media Properties</h5>
                            <ul class="list-unstyled">
                                <li class="text-secondary">
                                    <i class="fas fa-fw  fa-database"></i> Media Size: {{lbsFormatBytes($mediaCollect->file_size)}}
                                </li>
                                <li class="text-secondary">
                                    <i class="fas fa-fw  fa-photo-video"></i> Media Type: {{$mediaCollect->file_type}}
                                </li>
                                <li class="text-secondary">
                                    <i class="fas fa-puzzle-piece"></i> Media Extention: {{$mediaCollect->file_extension}}
                                </li>
                               @if ($mediaCollect->file_type =="image")
                                <li class="text-secondary">
                                    <i class="far fa-fw fa-image "></i> Dimension: {{$mediaCollect->file_width}}x{{$mediaCollect->file_hight}}
                                </li>
                               @endif
                            </ul>
                        </div>
                    </div>


                    <div class="text-center mt-5 mb-3">
                        <a href="#" class="btn btn-sm btn-danger" wire:click.prevent="delete">Delete</a>
                    </div>
                </div>
                @endif
            </div>


        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</div>


