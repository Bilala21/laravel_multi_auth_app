    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Multi Auth System</title>
    @yield('style')
    <style>
        body {
            background: #ededed;
        }

        .navbar {
            position: relative;
            z-index: 999;
        }
    </style>
    </head>
    @include("user.layout.nav-bar")
    <main>
        @yield('content')
    </main>
    @yield('custom-script')
    <script>
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
    </script>
    </body>

    </html>
