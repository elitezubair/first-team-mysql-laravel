@livewire('livewire.media.media-uploader-list-component',['name'=>$name,'datatype'=>$datatype,'multiple'=>$multiple, 'preview'=>$preview,'old_media'=>$old_media])
<input type="hidden" wire:model="{{$name}}" name="{{$name}}" id="media_input_{{$name}}" oninput="onChangeMediaIndden(this.id)" value="{{$old_media}}">

