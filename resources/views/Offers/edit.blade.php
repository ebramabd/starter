<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>


        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <!-- font css -->
        <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
        <!-- Tweaks for older IEs-->
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Add a new offer
                </div>
{{--start form--}}
                <ul>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <form method="POST" action="{{route('offer.update', $offer->id)}}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">chose photo</label>
                        <input type="file" class="form-control"  name="photo" aria-describedby="emailHelp">
                        @error('photo')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" value="{{$offer->name_ar}}" name="name_ar" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"></div>
                        @error('name_ar')
                           <small class="form-text text-danger">{{$message}}</small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" value="{{$offer->name_en}}" name="name_en" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"></div>
                        @error('name_en')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">price</label>
                        <input type="text" value="{{$offer->price}}" name="price" class="form-control" >
                        @error('price')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">details</label>
                        <input type="text" value="{{$offer->details_ar}}" name="details_ar" class="form-control" >
                        @error('details_ar')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">details</label>
                        <input type="text" value="{{$offer->details_en}}" name="details_en" class="form-control" >
                        @error('details_en')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
           <br>
           <br>
           <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
{{--end form--}}


            </div>
        </div>
    </body>
</html>
