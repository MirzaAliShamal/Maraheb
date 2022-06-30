(function($) {

    const baseUrl = $('meta[name="baseUrl"]'). attr("content");
    const csrf_token = $('meta[name="csrfToken"]'). attr("content");

    var table = $('#datatable').DataTable({
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
        ajax: baseUrl+"/recruiter/event/candidates/"+eventId,
        columns: [
            {data: 'user', name: 'user'},
            {data: 'department', name: 'department'},
            {data: 'date', name: 'date'},
            {data: 'timing', name: 'timing'},
            // {data: 'status', name: 'status', sorting: false, searchable: false},
            // {data: 'action', name: 'action', sorting: false, searchable: false},
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }
    });
})(jQuery);
