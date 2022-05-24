const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

function initTagify(target) {
    var input = document.querySelector(target);
    new Tagify(input);
}

function initDatePicker(target) {
    $(target).daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format("YYYY"),10)
    });
}

function initTinymice(target) {
    tinymce.init({
        selector: target,
        // menubar: false,
        toolbar: ["styleselect fontselect fontsizeselect",
            "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
            "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code"],
        plugins : "advlist autolink link image lists charmap print preview code"
    });
}


(function($) {
    $(".dropify").dropify();

    $(document).on("click", ".delete-item", function(e) {
        e.preventDefault();
        let url = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, do it!',
            customClass: {
                confirmButton:"btn fw-bold btn-danger",
                cancelButton:"btn fw-bold btn-active-light-primary"
            }
        }).then((result) => {
            if (result.value) {
                location.href = url;
            }
        });
    });
})(jQuery);
