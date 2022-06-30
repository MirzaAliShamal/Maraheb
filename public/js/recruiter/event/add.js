(function($) {
    $("#from_time, #end_time").change(function (e) {
        let dateRange = $('#date').val().split(' - ');

        var timeStart = new Date(dateRange[0] + " " + $("#from_time").val());
        var timeEnd = new Date(dateRange[1] + " " + $("#end_time").val());

        var hourDiff = (timeEnd - timeStart) / 36e5;
        if (hourDiff <= 0) {
            dateRange[1] = moment(dateRange[1], "MM/DD/YYYY").add('days', 1).format('MM/DD/YYYY');

            $("#date").val(dateRange.join(' - '));
        }
    });

    $("#addForm").validate({
        rules: {
            title: "required",
            date: "required",
            from_time: "required",
            end_time: "required",
            description: "required",
        },
        messages: {
            title: "Please enter the event title",
            date: "Please select the event start & end date",
            from_time: "Please select the event timing",
            end_time: "Please select the event timing",
            description: "Please tell us something about the event",
        },
    });

})(jQuery);
