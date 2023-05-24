$(document).ready(function() {
    $('form')[0].reset();
    $(".form-wrapper").css("transform", "translateY(0)")
    $("form").on("submit", function(e) {
        e.preventDefault();
        const form = $("form input");
        $.each(form, (_, item) => {
            if (!$(this).hasClass("in-valid")) {
                if ($(item).val() == "") {
                    $(this).addClass("in-valid")
                    $(".form-wrapper").css("border", "1px solid red")
                    $(item).css("border", "1px solid red")
                    $(item).parent().append(
                        `<p class="text-danger error-message">${$(item).attr("name")} field is required</p>`
                    )
                    return;
                }
            }
        })
        // form submission here
        if (!$(".error-message").length) {
            $("form")[0].submit();
        }
    })

    $("form input").on("input", function(e) {
        $("form").addClass("in-valid")
        if ($(this).val() != "") {
            $("form").removeClass("in-valid")
            $(this).next().remove()
            $(".form-wrapper").css("border", "unset")
            $(this).css("border", "1px solid")
        } else {
            $(this).parent().append(
                `<p class="text-danger error-message">${$(this).attr("name")} field is required</p>`
            )
        }
    });
});