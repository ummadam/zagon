<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/7138d484d3.js"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Мясо-рубка</title>
</head>
<body>
    
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Фермечка для овечек</h1>
            </div>
            <div class="card-body">
                <form id="form" method="POST" action="{{ route('sheep.isdead') }}">
                    @csrf()
                    @method('PUT')
                    <fieldset>
                    <div class="row">
                        <div class="col-md-5">
                            <label for="exampleFormControlSelect2">Загон1</label>
                            <select multiple class="form-control" id="ms-1" name="select1">
                                @foreach($zagon1 as $sheep)
                                <option value="{{ $sheep->id }}">{{ $sheep->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <a href="#" onclick="moving('ms-2','ms-1')"><i class="fas fa-arrow-left"></i></a><br>
                        <a href="#" onclick="moving('ms-1','ms-2')"><i class="fas fa-arrow-right"></i></a>
                        <div class="col-md-5">
                            <label for="exampleFormControlSelect2">Загон2</label>
                            <select multiple class="form-control" id="ms-2" name="select2">
                                @foreach($zagon2 as $sheep)
                                <option value="{{ $sheep->id }}">{{ $sheep->name}}</option>
                                @endforeach
                            </select>
                            <a href="#" onclick="moving('ms-2','ms-4')"><i class="fas fa-arrow-down"></i></a>
                            <a href="#" onclick="moving('ms-4','ms-2')"><i class="fas fa-arrow-up"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <a href="#" onclick="moving('ms-1','ms-3')"><i class="fas fa-arrow-down"></i></a>
                            <a href="#" onclick="moving('ms-3','ms-1')"><i class="fas fa-arrow-up"></i></a>
                            <label for="exampleFormControlSelect2">Загон3</label>
                            <select multiple class="form-control" id="ms-3" name="select3">
                                @foreach($zagon3 as $sheep)
                                <option  value="{{ $sheep->id }}">{{ $sheep->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <a href="#" onclick="moving('ms-4','ms-3')"><i class="fas fa-arrow-left"></i></a><br>
                        <a href="#" onclick="moving('ms-3','ms-4')"><i class="fas fa-arrow-right"></i></a>
                        <div class="col-md-5">
                            <label for="exampleFormControlSelect2">Загон4</label>
                            <select multiple class="form-control" id="ms-4" name="select4">
                                @foreach($zagon4 as $sheep)
                                <option  value="{{ $sheep->id }}">{{ $sheep->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-danger float-right">Резать</button>
                            <a href="#" class="save float-right">Обновить</a>
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <p>Жертвы ганибализма</p>
            </div>
            <div class="card-body">
                <div id="app">
                    {!! $chart->container() !!}
                </div>
            </div>
        </div>
    </div>
    {!! $chart->script() !!}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    jQuery(document).ready(function(){
        jQuery('.save').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                  }
            });
            var values = {};
            var form = document.getElementsByTagName('form');
            $('#form').find('select option').each(function(e) {
                if (typeof values[$(this).parent().attr('id')] === 'undefined') {
                    values[$(this).parent().attr('id')] = [];
                }
                values[$(this).parent().attr('id')].push($(this).attr('value'));
            });
            console.log(values); 
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/sheep",
                method: 'put',
                data: {
                    _token: $('meta[name="csrf_token"]').attr('content'),
                    values: values,
                }
            });    
        });
    });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>