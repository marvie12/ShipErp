const getMeta = (url, cb) => {
    const img = new Image();
    img.onload = () => cb(null, img);
    img.onerror = (err) => cb(err);
    img.src = url;
};

$(document).ready(function () {
    $('#tblProvider').DataTable({
        "ordering": false
    });
   
    $('.viewImage').on('click', function(){
        var parentEl = $(this).closest('tr');
        var providerName = $(parentEl).find('td:eq(0)').text();
        var providerURL = $(parentEl).find('td:eq(1)').text();
                
        $.ajax({
            type: "POST",
            url: "/",
            data: {src:providerURL,_token:TOKEN},
            beforeSend: function() {
                Swal.fire({
                    title: "Provider: "+providerName,
                    text: "Please wait while we process your request.",
                    icon: "info",
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            },
            success: function(result){            
                var result = JSON.parse(result);
                
                if(result.status === 'success'){
                    Swal.fire({
                        title: "Provider: "+providerName,
                        html: '<img src="'+result.message+'" >',
                        icon: "",
                        showConfirmButton: false,
                        showCancelButton: true,
						cancelButtonText: 'Close',
                        allowOutsideClick: false
                    });
                    $('.swal2-popup img').width($('.swal2-html-container').width());
                } else {
                    Swal.fire({
                        title: "Provider: "+providerName,
                        html: result.message,
                        icon: "error",
                        showConfirmButton: false,
                        showCancelButton: true,
						cancelButtonText: 'Close',
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: "Provider: "+providerName,
                    html: 'There\'s a problem on the request.<br>Please contact administrator.',
                    icon: "error",
                    showConfirmButton: false,
                    showCancelButton: true,
                    cancelButtonText: 'Close',
                });
            }
        });
    });

});