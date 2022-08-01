$(document).ready(function() {
    
    $('form').submit(function(event) {
        
        event.preventDefault();
        
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            Cache: false,
            processData: false,
            success: function(result){
                alert(result);
                
            },
        });
    });
});