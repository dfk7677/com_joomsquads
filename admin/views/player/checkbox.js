jQuery(document).ready(function ($) {

    $('input[type="checkbox"]').change(function () {


        var id = this.id.replace(/[^0-9\.]+/g, "");
        if (this.checked) {

            //do your stuff
            $("#pos" + id).prop('disabled', false);
            $("#ord" + id).prop('disabled', false);
        }
        else {
            $("#pos" + id).prop('disabled', true);
            $("#ord" + id).prop('disabled', true);


        }
    });

});