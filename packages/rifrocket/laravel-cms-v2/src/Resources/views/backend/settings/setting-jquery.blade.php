@push('scripts')

<script>

var csrff_token = "{{csrf_token()}}";

$(document).ready(function() {
    $('form').submit(function(e) {

        e.preventDefault();
        var formData = $(this).serialize();
        var url = $(this).attr('action');

        $.confirm({
            icon: 'fa fa-warning',
            title: 'Confirm!',
            content: 'are you sure to make these changes!',
            buttons: {
                confirm: function() {
                    $('.loading').show();
                    $.ajax({
                        url: url,
                        dataType: 'json',
                        type: 'post',
                        data: formData,
                        success: function(response, textStatus, jQxhr) {
                            toastr[response[0]](response[1],
                            response[0] ?? ''), toastr.options = {
                                "closeButton": true,
                                "progressBar": true,
                            }
                            $('.loading').hide();
                        },
                        error: function(jqXhr, textStatus, errorThrown) {
                            console.log(errorThrown);
                            $('.loading').hide();
                        }
                    });
                },
                cancel: function() {
                    $('.loading').hide();
                    $.alert('Last acction was Canceled!');
                }
            }
        });
    });
});

</script>
@endpush
