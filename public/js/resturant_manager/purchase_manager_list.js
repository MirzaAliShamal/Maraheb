(function($) {

    const baseUrl = $('meta[name="baseUrl"]'). attr("content");
    const csrf_token = $('meta[name="csrfToken"]'). attr("content");

    var table = $('#datatable').DataTable({
        "order": [[ 0, "desc" ]],
        "sort": true,
        "ordering": true,
        "pagingType": "full_numbers",
        "processing": true,
        "serverSide": true,
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        ajax: baseUrl+"/resturant-manager/purchase-manager/list",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'mobile_no', name: 'mobile_no'},
            {data: 'visibility_status', name: 'visibility_status', sorting: false, searchable: false},
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }
    });

    $(document).on('change', '.status', function () {
        var id = $(this).data('id');
        var dataUrl = $(this).attr('data-url');
        var status = $(this).val();
        $.ajax({
            url: dataUrl,
            success: function (data) {
                if (data.status == 200) {
                    toastr.success(data.message, 'Maraheb Says')
                } else {
                    toastr.error(data.message, 'Maraheb Says')
                }
            }
        });
    });
})(jQuery);
