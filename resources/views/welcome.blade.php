<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Styles -->
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
       <form action="{{ route('sheep.update') }}" method="POST">
        <fieldset >
        <legend>Формочка для овечек</legend>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <label for="exampleFormControlSelect2">Загон1</label>
                        <select multiple class="form-control" id="exampleFormControlSelect2" name="select1">
                        @foreach($zagon1 as $zagon)
                        <option>{{ $zagon->name}}</option>
                        @endforeach
                        </select>
                </div>
                <div class="col-md-6">
                <label for="exampleFormControlSelect2">Загон2</label>
                        <select multiple class="form-control" id="exampleFormControlSelect2" name="select2">
                        @foreach($zagon2 as $zagon)
                        <option>{{ $zagon->name}}</option>
                        @endforeach
                        </select>
                </div>
                <div class="w-100"></div>
                <div class="col-md-6">
                <label for="exampleFormControlSelect2">Загон3</label>
                        <select multiple class="form-control" id="exampleFormControlSelect2" name="select3">
                        @foreach($zagon3 as $sheep)
                        <option>{{ $sheep->name}}</option>
                        @endforeach
                        </select>
                </div>
                <div class="col-md-6">
                <label for="exampleFormControlSelect2">Загон4</label>
                        <select multiple class="form-control" id="exampleFormControlSelect2" name="select4">
                        @foreach($zagon4 as $sheep)
                        <option>{{ $sheep->name}}</option>
                        @endforeach
                        </select>
                </div>
            </div>
                <div class="col-md-12">
                    <button class="btn btn-primary mt-2 float-right" type="submit">Резать</button>
                </div>

            </div>
        </fieldset>
       </form> 
                      
    </body>
</html>
