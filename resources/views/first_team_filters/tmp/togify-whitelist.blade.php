var inputElm = document.querySelector('input[name=tags]'), whitelist = {!!$whitelist!!};


function livewireEventListnerForTag(value){

}

var tagify = new Tagify(inputElm, {
    enforceWhitelist: true,
    delimiters: null,
    keepInvalidTags: true,
    whitelist: whitelist,
    originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(','),
});

document.querySelector('#removeAllTags').addEventListener('click', tagify.removeAllTags.bind(tagify));

inputElm.addEventListener('change', onChange)

function onChange(e){
    livewireEventListnerForTag(e.target.value)
}


{{-- ===========================MLS ID======================= --}}

var inputMls = document.querySelector('input[name=mlstags]'), mlsWhitelist = {!!$szMLS_no_!!};


function livewireEventListnerForMlsTag(value){

}

var mlstagify = new Tagify(inputMls, {
    enforceWhitelist: true,
    delimiters: null,
    keepInvalidTags: true,
    whitelist: mlsWhitelist,
    originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(','),
});

document.querySelector('#removeAllTagsmlstagify').addEventListener('click',function () {
    mlstagify.removeAllTags();
});

inputMls.addEventListener('change', onChangesml)

function onChangesml(e){
    livewireEventListnerForMlsTag(e.target.value)
}

