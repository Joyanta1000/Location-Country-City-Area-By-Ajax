<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div id="message" class=""></div>
    <div style="padding: 20px;">
        <select class="select-country form-control" id="countryid" name="countryid" aria-label="Select country">
            <option selected>Open this select menu</option>
            @foreach ($countries as $country)
            <option value="{{$country->id}}">{{$country->CountryName}}</option>
            @endforeach
        </select>
    </div>

    <div style="padding: 20px;" id="city">
        <select class="select-city form-control" id="cityid" name="cityid" aria-label="Select city">

        </select>
    </div>

    <div style="padding: 20px;" id="area">
        <select class="select-area form-control" id="areaid" name="area" aria-label="Select area">

        </select>
    </div>
    <div style="padding: 20px;">
        <button type="submit" class="btn btn-primary" name="submit" value="Submit" > Submit </button>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            citySelect = '<option selected>Open this select menu</option>';
            areaSelect = '<option selected>Open this select menu</option>';
            $('.select-country').change(function() {
                var countryid = $(this).val();
                $('.select-city').html('');
                $('.select-area').html('');
                $.ajax({
                    url: "{{route('city.fetch')}}",
                    method: "get",
                    data: {
                        countryid: countryid
                    },
                    success: function(result) {
                        $('.select-city').append('<option selected>Open this select menu</option>');
                        $.each(result, function(key, value) {
                            $('.select-city').append('<option value="' + value.id + '">' + value.CityName + '</option>');
                        });

                    }
                });
            });
            $('.select-city').change(function() {
                var cityid = $(this).val();
                $('.select-area').html('');
                $.ajax({
                    url: "{{route('area.fetch')}}",
                    method: "get",
                    data: {
                        cityid: cityid
                    },
                    success: function(result) {
                        $('.select-area').append('<option selected>Open this select menu</option>');
                        $.each(result, function(key, value) {
                            $('.select-area').append('<option value="' + value.id + '">' + value.AreaName + '</option>');
                        });

                    }
                });
            });

            const btn = document.querySelector("button");
            btn.addEventListener("click", submitData);

            function submitData() {
                var countryid = $('#countryid').val();
                var cityid = $('#cityid').val();
                var areaid = $('#areaid').val();

                console.log(countryid, cityid, areaid);

                $.ajax({
                    url: "{{route('add.location')}}",
                    method: "post",
                    data: {
                        countryid: countryid,
                        cityid: cityid,
                        areaid: areaid
                    },
                    success: function(result) {
                        $('#message').append('<div class="alert alert-success">Successfully Submitted</div>');

                    }
                });
            }

        });
    </script>
</body>

</html>