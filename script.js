    $(document).ready(function(){
        $("#basic-form").validate({
            username: {
                required: true
            },
            email: {
                required: true,
                email: true
            }
        });
    });
    