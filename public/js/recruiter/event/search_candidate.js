(function($) {

    const baseUrl = $('meta[name="baseUrl"]'). attr("content");
    const csrf_token = $('meta[name="csrfToken"]'). attr("content");

    const filterForm = $("#filterForm");

    var page = 1;
    loadMore(page);

    $(document).on("click", ".create-event, .save-event", function(e) {
        e.preventDefault();

        let elm = $(this);
        location.href = elm.data('url');
    });

    $(document).on("click", ".load-more-button", function(e) {
        page++;
        window.history.pushState(document.location.href, $(document).attr('title'), "?page="+page+"&"+filterForm.serialize());
        loadMore(page);
    });

    $(document).on("click", ".filter-button", function(e) {
        window.history.pushState(document.location.href, $(document).attr('title'), "?page=1&"+filterForm.serialize());
        filter()
    });

    $(document).on("click", ".select-candidate", function(e) {
        e.preventDefault();
        let elm = $(this);
        let parent = elm.closest('.candidate-block-three');

        parent.find('.inner-box').addClass('open-inner-box');
        parent.find('.selection-box').show();
    });

    $(document).on("click", ".cancel-selection", function(e) {
        e.preventDefault();
        let elm = $(this);
        let parent = elm.closest('.candidate-block-three');

        parent.find('.inner-box').removeClass('open-inner-box');
        parent.find('.selection-box').hide();
    });

    $(document).on("click", ".confirm-selection", function(e) {
        let elm = $(this);
        let url = elm.data('url');
        let parent = elm.closest('.candidate-block-three');
        let candidateId = parent.data('id');

        let department = parent.find("[name='department'] option:selected").val();
        let date = parent.find("[name='date']").val();
        let from_time = parent.find("[name='from_time']").val();
        let end_time = parent.find("[name='end_time']").val();

        if (department == "" || department == null || department == undefined) {
            toastr.error('Please select Department');
            return;
        }

        if (date == "" || date == null || date == undefined) {
            toastr.error('Please select From & To Date');
            return;
        }

        if (from_time == "" || from_time == null || from_time == undefined) {
            toastr.error('Please select Timing');
            return;
        }

        if (end_time == "" || end_time == null || end_time == undefined) {
            toastr.error('Please select Timing');
            return;
        }

        elm.prop('disabled', true);
        elm.html('Please Wait... <div class="spinner-border spinner-border-sm text-light" role="status"></div>');

        $.ajax({
            type: "POST",
            url: url,
            data: {
                _token: csrf_token,
                user_id: candidateId,
                department_id: department,
                date: date,
                from_time: from_time,
                end_time: end_time,
            },
            cache: !1,
            async: true,
            headers: {
              "cache-control": "no-cache"
            },
            success: function (response) {
                if (response.status == 200) {
                    $(".selected-count").html(response.count);
                    toastr.success('Candidate Selected');
                    $(".selected-candidates-wrapper").prepend(response.candidate);
                    $("#rightModal").modal('show');
                    parent.fadeOut();
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (xhr, status, error) {
                elm.prop('disabled', false);
                elm.html('Confirm');
                toastr.error('Something went wrong, Please try again');
            }
        });
    });

    $(document).on("click", ".remove-selected", function() {
        let elm = $(this);
        let parent = elm.closest('.candidates-selected');
        let url = parent.data('url');
        let eventCandidateId = parent.data('id');

        $.ajax({
            type: "POST",
            url: url,
            data: {
                _token: csrf_token,
                event_candidate_id: eventCandidateId,
            },
            cache: !1,
            async: true,
            headers: {
              "cache-control": "no-cache"
            },
            success: function (response) {
                if (response.status == 200) {
                    toastr.success(response.message);
                    parent.remove();
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (xhr, status, error) {
                toastr.error('Something went wrong, Please try again');
            }
        });
    });

    function loadMore(page) {
        let url = document.location.href+"?page="+page+"&"+filterForm.serialize();
        $.ajax({
            type: "GET",
            url: url,
            beforeSend: function () {
                $(".loader-button").hide();
                $('.auto-load').show();
            }
        }).done(function (response) {
            if (response.length == 0) {
                $('.auto-load').html("You're All Caught Up");
                return;
            }
            $('.auto-load').hide();
            $(".data-wrapper").append(response);
            $(".chosen-select").chosen({
                disable_search_threshold: 10,
                width:'100%',
            });
            $('.eventDate').daterangepicker({
                minDate: moment(),
                locale: {
                    format: 'MM/DD/YYYY',
                }
            });
            $('.eventTime').timepicker({
                minuteStep: 1,
                icons: {
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down'
                }
            });
            $(".loader-button").show();
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occured');
            $(".loader-button").show();
        });
    }

    function filter() {
        let url = document.location.href+"?page="+page+"&"+filterForm.serialize();
        $.ajax({
            type: "GET",
            url: url,
            beforeSend: function () {
                $(".data-wrapper").html('');
                $(".loader-button").hide();
                $('.auto-load').show();
            }
        }).done(function (response) {
            if (response.length == 0) {
                $('.auto-load').hide();
                $(".data-wrapper").html('\
                    <div class="col-lg-12">\
                        <div class="no-results text-center my-5">\
                            <h2 class="fw-bold mb-2">We\'re Sorry!</h2>\
                            <img src="'+baseUrl+'/images/no-result.png" width="240px" class="img-fluid" alt="No results">\
                            <h2 class="fw-bold mt-2">No Results Found</h2>\
                        </div>\
                    </div>\
                ');
                return;
            }
            $('.auto-load').hide();
            $(".data-wrapper").html(response);
            $(".chosen-select").chosen({
                disable_search_threshold: 10,
                width:'100%',
            });
            $(".loader-button").show();
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occured');
        });
    }

})(jQuery);
