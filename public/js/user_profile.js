const baseUrl = $('meta[name="baseUrl"]'). attr("content");
const csrf_token = $('meta[name="csrfToken"]'). attr("content");

const userId = $("#applicationForm").data('id');

Dropzone.autoDiscover = false;

new Dropzone("#upload_avatar", {
    url: baseUrl+"/user/upload-attachment",
    maxFiles: 1,
    maxFilesize: 1000,
    acceptedFiles: ".jpeg,.jpg,.png,.svg",
    addRemoveLinks: true,
    timeout: 10000000,
    init:function() {
        var myDropzone = this;
        $.ajax({
            url: baseUrl+"/user/get-attachment?type=avatar",
            type: 'GET',
            dataType: 'json',
            success: function(data){
                if (!data.error) {
                    $.each(data, function (key, value) {
                        var file = {name: value.name, size: value.size};
                        myDropzone.options.addedfile.call(myDropzone, file);
                        // myDropzone.options.thumbnail.call(myDropzone, file, value.path);
                        myDropzone.emit("complete", file);
                        $(".upload_avatar").val(value.name);
                    });
                }

                validateBtn();
            }
        });
    },
    removedfile: function(file) {
        if (this.options.dictRemoveFile) {
            return Dropzone.confirm("Are You Sure to "+this.options.dictRemoveFile, function() {
                if (file.previewElement.id != ""){
                    var name = file.previewElement.id;
                } else {
                    var name = file.name;
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': csrf_token
                    },
                    type: 'POST',
                    url: baseUrl+"/user/destroy-attachment",
                    data: {filename: name},
                    success: function (response){
                        alert(response.success +" File has been successfully removed!");
                        $(".upload_avatar").val("");
                        validateBtn();
                    },
                    error: function(e) {
                        console.log(e);
                        validateBtn();
                    }
                });
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        });
        }
    },
    success: function(file, response) {
        file.previewElement.id = response.success;
        // set new images names in dropzone’s preview box.
        var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
        file.previewElement.querySelector("img").alt = response.success;
        olddatadzname.innerHTML = response.success;
        $(".upload_avatar").val(response.success);
        validateBtn();
    },
    error: function(file, response) {
        if($.type(response) === "string")
            var message = response; //dropzone sends it's own error messages in string
        else
            var message = response.message;
        file.previewElement.classList.add("dz-error");
        _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            _results.push(node.textContent = message);
        }
        validateBtn();
        return _results;
    }
});

new Dropzone("#intro_video", {
    url: baseUrl+"/user/upload-attachment",
    maxFiles: 1,
    maxFilesize: 1000,
    acceptedFiles: ".flv,.mp4,.m3u8,.ts,.3gp,.mov,.avi,.wmv",
    addRemoveLinks: true,
    timeout: 10000000,
    init:function() {
        var myDropzone = this;
        $.ajax({
            url: baseUrl+"/user/get-attachment?type=intro_video",
            type: 'GET',
            dataType: 'json',
            success: function(data){
                if (!data.error) {
                    $.each(data, function (key, value) {
                        var file = {name: value.name, size: value.size};
                        myDropzone.options.addedfile.call(myDropzone, file);
                        // myDropzone.options.thumbnail.call(myDropzone, file, value.path);
                        myDropzone.emit("complete", file);
                        $(".intro_video").val(value.name);
                    });
                }

                validateBtn();
            }
        });
    },
    removedfile: function(file) {
        if (this.options.dictRemoveFile) {
            return Dropzone.confirm("Are You Sure to "+this.options.dictRemoveFile, function() {
                if (file.previewElement.id != ""){
                    var name = file.previewElement.id;
                } else {
                    var name = file.name;
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': csrf_token
                    },
                    type: 'POST',
                    url: baseUrl+"/user/destroy-attachment",
                    data: {filename: name},
                    success: function (response){
                        alert(response.success +" File has been successfully removed!");
                        $(".intro_video").val("");
                        validateBtn();
                    },
                    error: function(e) {
                        console.log(e);
                        validateBtn();
                    }
                });
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        });
        }
    },
    success: function(file, response) {
        file.previewElement.id = response.success;
        // set new images names in dropzone’s preview box.
        var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
        file.previewElement.querySelector("img").alt = response.success;
        olddatadzname.innerHTML = response.success;
        $(".intro_video").val(response.success);
        validateBtn();
    },
    error: function(file, response) {
        if($.type(response) === "string")
            var message = response; //dropzone sends it's own error messages in string
        else
            var message = response.message;
        file.previewElement.classList.add("dz-error");
        _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            _results.push(node.textContent = message);
        }
        validateBtn();
        return _results;
    }
});

new Dropzone("#upload_cv", {
    url: baseUrl+"/user/upload-attachment",
    maxFiles: 1,
    maxFilesize: 1000,
    acceptedFiles: ".docs,.pdf",
    addRemoveLinks: true,
    timeout: 10000000,
    init:function() {
        var myDropzone = this;
        $.ajax({
            url: baseUrl+"/user/get-attachment?type=cv",
            type: 'GET',
            dataType: 'json',
            success: function(data){
                if (!data.error) {
                    $.each(data, function (key, value) {
                        var file = {name: value.name, size: value.size};
                        myDropzone.options.addedfile.call(myDropzone, file);
                        // myDropzone.options.thumbnail.call(myDropzone, file, value.path);
                        myDropzone.emit("complete", file);
                        $(".upload_cv").val(value.name);
                    });
                }

                validateBtn();
            }
        });
    },
    removedfile: function(file) {
        if (this.options.dictRemoveFile) {
            return Dropzone.confirm("Are You Sure to "+this.options.dictRemoveFile, function() {
                if (file.previewElement.id != ""){
                    var name = file.previewElement.id;
                } else {
                    var name = file.name;
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': csrf_token
                    },
                    type: 'POST',
                    url: baseUrl+"/user/destroy-attachment",
                    data: {filename: name},
                    success: function (response){
                        alert(response.success +" File has been successfully removed!");
                        $(".upload_cv").val("");
                        validateBtn();
                    },
                    error: function(e) {
                        console.log(e);
                        validateBtn();
                    }
                });
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        });
        }
    },
    success: function(file, response) {
        file.previewElement.id = response.success;
        //console.log(file);
        // set new images names in dropzone’s preview box.
        var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
        file.previewElement.querySelector("img").alt = response.success;
        olddatadzname.innerHTML = response.success;
        $(".upload_cv").val(response.success);
        validateBtn();
    },
    error: function(file, response) {
        if($.type(response) === "string")
            var message = response; //dropzone sends it's own error messages in string
        else
            var message = response.message;
        file.previewElement.classList.add("dz-error");
        _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            _results.push(node.textContent = message);
        }
        validateBtn();
        return _results;
    }
});

function validateBtn() {
    let avatar = $("[name='upload_avatar']");
    let firstName = $("[name='first_name']");
    let lastName = $("[name='last_name']");
    let dob = $("[name='dob']");
    let gender = $("[name='gender'] option:selected");
    let country = $("[name='country'] option:selected");
    let specalise = $("[name='specalise[]'] option:selected");
    let address = $("[name='address']");
    let city = $("[name='city']");
    let zip_code = $("[name='zip_code']");
    let intro_video = $("[name='intro_video']");
    let upload_cv = $("[name='upload_cv']");

    if (avatar.val().length > 0 && firstName.val().length > 0 && lastName.val().length > 0 && dob.val().length > 0 && gender.val().length > 0 && country.val().length > 0 && specalise.length > 0 && address.val().length && city.val().length > 0 && zip_code.val().length > 0 && intro_video.val().length > 0 && upload_cv.val().length > 0) {
        $("#submitBtn").prop('disabled', false);
    } else {
        $("#submitBtn").prop('disabled', true);
    }
}

(function($) {
    $("#applicationForm").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            dob: "required",
            gender: "required",
            country: "required",
            specalise: "required",
            address: "required",
            city: "required",
            zip_code: "required",
            experience: "required",
        },
    });

    $("#submitBtn").click(function (e) {
        let elm = $(this);
        let text = elm.html();
        if ($("#applicationForm").valid()) {
            elm.prop('disabled', true);
            elm.html('Submitting Profile... <div class="spinner-border spinner-border-sm text-light" role="status"></div>');
            $("#applicationForm").submit();
        } else {
            elm.prop('disabled', false);
            elm.html(text);
        }
    });
})(jQuery);
