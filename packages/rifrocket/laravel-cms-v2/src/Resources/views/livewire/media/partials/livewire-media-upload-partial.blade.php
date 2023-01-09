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
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 media-scroll ">
        <div class="row ">

            @if (!$collections->isEmpty())
                @foreach ($collections as $collection)
                    <div class="col-sm-1">
                        <div class="info-box bg-light lbs-image-lib {{array_key_exists($collection->id,$set_selected)?'active':''}}" id="media_{{$collection->id}}" wire:click="onSelectMedia({{$collection->id}})">
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
    </div>
</div>
