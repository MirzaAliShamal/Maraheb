(function($) {
    var table = $('.server-datatables').DataTable({
        // "order": [[ 0, "desc" ]],
        "sort": true,
        "ordering": true,
        "pagingType": "full_numbers",
        "processing": true,
        "serverSide": true,
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        ajax: baseUrl+"/admin/specialisation/list",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'status', name: 'status', sorting: false, searchable: false},
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

    $(document).on('change', '[name="status"]', function () {
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
