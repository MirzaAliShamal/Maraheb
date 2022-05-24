const baseUrl = $('meta[name="baseUrl"]'). attr("content");
const csrf_token = $('meta[name="csrfToken"]'). attr("content");

const resturantManagerId = $("#applicationForm").data('id');

Dropzone.autoDiscover = false;

new Dropzone("#upload_avatar", {
    url: baseUrl+"/resturant-manager/upload-attachment",
    maxFiles: 1,
    maxFilesize: 1000,
    acceptedFiles: ".jpeg,.jpg,.png,.svg",
    addRemoveLinks: true,
    timeout: 10000000,
    init:function() {
        var myDropzone = this;
        $.ajax({
            url: baseUrl+"/resturant-manager/get-attachment?type=avatar",
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
                    url: baseUrl+"/resturant-manager/destroy-attachment",
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

new Dropzone("#resturant_logo", {
    url: baseUrl+"/resturant-manager/upload-attachment",
    maxFiles: 1,
    maxFilesize: 1000,
    acceptedFiles: ".jpeg,.jpg,.png,.svg",
    addRemoveLinks: true,
    timeout: 10000000,
    init:function() {
        var myDropzone = this;
        $.ajax({
            url: baseUrl+"/resturant-manager/get-attachment?type=resturant_logo",
            type: 'GET',
            dataType: 'json',
            success: function(data){
                if (!data.error) {
                    $.each(data, function (key, value) {
                        var file = {name: value.name, size: value.size};
                        myDropzone.options.addedfile.call(myDropzone, file);
                        // myDropzone.options.thumbnail.call(myDropzone, file, value.path);
                        myDropzone.emit("complete", file);
                        $(".resturant_logo").val(value.name);
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
                    url: baseUrl+"/resturant-manager/destroy-attachment",
                    data: {filename: name},
                    success: function (response){
                        alert(response.success +" File has been successfully removed!");
                        $(".resturant_logo").val("");
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
        $(".resturant_logo").val(response.success);
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
    let address = $("[name='address']");
    let city = $("[name='city']");
    let zip_code = $("[name='zip_code']");
    let resturant_logo = $("[name='resturant_logo']");
    let resturant_name = $("[name='resturant_name']");
    let resturant_address = $("[name='resturant_address']");
    let resturant_trade_license = $("[name='resturant_trade_license']");

    if (avatar.val().length > 0 && firstName.val().length > 0 && lastName.val().length > 0 && dob.val().length > 0 && gender.val().length > 0 && country.val().length > 0 && address.val().length && city.val().length > 0 && zip_code.val().length > 0 && resturant_logo.val().length > 0 && resturant_name.val().length > 0 && resturant_address.val().length > 0 && resturant_trade_license.val().length > 0) {
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
            address: "required",
            city: "required",
            zip_code: "required",
            resturant_name: "required",
            resturant_address: "required",
            resturant_trade_license: "required",
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
