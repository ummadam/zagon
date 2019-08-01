
function moving(from, to)
{
    console.log([from, to]);
    var values = $('#'+from).val();
    for(value of values) {
        option = $("#"+from +" option[value='"+value+"']");
        $("#"+to).append('<option value="'+value+'">'+option.text()+'</option>');
        option.remove();
    }
}

var timerId = setInterval(function() {
    var values = [];
    $('#form').find('select option').each(function(e) {
        if (typeof values[$(this).parent().attr('id')] === 'undefined') {
            values[$(this).parent().attr('id')] = [];
        }
        values[$(this).parent().attr('id')].push($(this).attr('value'));
    });
    // console.log(values);
    var random = [];
    for(value in values) {
        if(values[value].length > 1) {
            random.push(value);
        }
    }
    var item = random[Math.floor(Math.random()*random.length)];
    console.log(item);
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/save",
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            _token: $('meta[name="csrf_token"]').attr('content'),
            item: item,
        }
    });
  }, 10000);