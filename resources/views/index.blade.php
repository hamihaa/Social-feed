<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Social feed</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:500" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                color: #080808;
                font-family: 'Raleway', sans-serif;
            }
            .post {
                padding:20px;
            }
            a {
                color: #02223C;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            @foreach($posts as $post)
                <div class="post">
                    @if($post->post_type)
                        @include('partials.twitter')
                    @else
                        @include('partials.instagram')
                    @endif
                </div>
            @endforeach
        </div>
    </body>
</html>
