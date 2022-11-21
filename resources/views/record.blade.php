@extends('layout')

@section('record_active') active @endsection
@csrf
@section('main_content')
    <h1>Запись на прием</h1>
    <p>Выберите специальность врача</p>
    <select id="specialities">
        <option>выберите специальность</option>
        @foreach($specialities as $speciality)
            <option value="{{$speciality->id}}">{{$speciality->speciality}}</option>
        @endforeach
    </select>
    <p>Выберите врача</p>
    <select id="doctors">

    </select>
    <p>выберите дату приема</p>
    <input type="date" id="checkDate">
    <p>свободные номерки</p>
    <select id="check">

    </select><br>
    <button id="submit">Записаться</button>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script type="text/javascript">
        //выгрузка врачей в select при изменении специализации
        $("#specialities").change(function(){
            var id_speciality = $(this).val();
            var token = $("input[name='_token']").val();
            //console.log(id_speciality);

            $.ajax({
                url: "{{ route('doctorSelect') }}",
                method: 'POST',
                data: {id_speciality:id_speciality, _token:token},
                success: function(data) {
                    $("#doctors").html('');
                    $("#doctors").html(data.options);
                }
            });
        });

        //выгрузка номер в select при изменении даты
        $("#checkDate").change(function(){
           var id_doctor = $("#doctors").val();
           var date=$(this).val();
            var token = $("input[name='_token']").val();
           //console.log(id_doctor);console.log(date);

           $.ajax({
              url:"{{ route('checkSelect') }}",
              method:'POST',
              data:{id_doctor:id_doctor, date:date, _token:token},
              success:function(data){
                  $("#check").html('');
                  $("#check").html(data.options);
              }
           });

        });

        $("#submit").click(function(){
            var id_doctor = $("#doctors").val;
            var date=$("#checkDate").val;
            var check=$("#check").val;
            var token = $("input[name='_token']").val();
            console.log(id_doctor);
            console.log(date);
            console.log(check);

        });
    </script>
@endsection
