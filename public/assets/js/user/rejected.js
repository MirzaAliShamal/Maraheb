(function($) {
    var table = $('.server-datatables').DataTable({
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
        ajax: baseUrl+"/admin/user/rejected",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'mobile_no', name: 'mobile_no'},
            {data: 'profile_status', name: 'profile_status', sorting: false, searchable: false},
            {data: 'visibility_status', name: 'visibility_status', sorting: false, searchable: false},
            {
                class: 'td-actions text-end',
                data: 'action',
                name: 'action',
                orderable: true,
                sorting: false,
                searchable: false
            },
        ],
        fnDrawCallback: function (oSettings) {
            var elm = document.querySelectorAll('[data-bs-toggle]');
            $(elm).each(function (index, element) {
                var tooltip = new bootstrap.Tooltip(element)
            });
        },
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }
    });

    $("#search").keyup(function (e) {
        table.search($(this).val()).draw() ;
    });

    $(document).on('change', '.status', function () {
        var id = $(this).data('id');
        var dataUrl = $(this).attr('data-url');
        var status = $(this).val();
        $.ajax({
            url: dataUrl,
            success: function (data) {
                if (data.status == 'success') {
                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    })
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: data.message
                    })
                }
            }
        });
    });
})(jQuery);
