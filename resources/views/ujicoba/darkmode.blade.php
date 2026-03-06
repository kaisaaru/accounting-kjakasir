<!DOCTYPE html>
<html lang="en">

<head>
    <title>Webleb</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet">
    <style>
        body {
            background: #f9f9f9;
            color: #202225;
            align-items: center;
            display: flex;
            justify-content: center;
            height: 100vh;
        }

        body div.darkmode {
            display: inline-block;
            font-size: 2rem;
            padding: 1rem 1rem 0.75rem 1rem;
            cursor: pointer;
        }

        body.dark .darkmode .light,
        body:not(.dark) .darkmode .dark {
            display: none;
        }

        .fa {
            cursor: pointer;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="darkmode">
        <div class="light fa fa-sun"></div>
        <div class="dark fa fa-moon"></div>
    </div>
    <p href="">Join our discord <a href="https://discord.com/invite/SnM3Z8VJEA"
            style="text-decoration: none;">here</a></p>
    <script>
        $(".darkmode").click(function() {
            $("body").toggleClass("dark")
                .css( //3
                    $("body").hasClass("dark") ? {
                        background: "#000000",
                        color: "#f9f9f9"
                    } : {
                        background: "#f9f9f9",
                        color: "#202225"
                    }
                );
        });
    </script>
</body>

</html>
