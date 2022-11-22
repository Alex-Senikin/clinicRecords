@extends('layout')

@section('record_active') active @endsection
@csrf
@section('main_content')
    <h1>Запись на прием</h1>
        <p>Введите ФИО (полностью)</p>
        <input type="text" placeholder="Введите ФИО (полностью)" id="patientFIO">
        <p>Ваша дата рождения</p>
        <input type="date" id="patientBirthdate">
        <p>Ваш номер телефона</p>
        <input type="text" placeholder="Ваш номер телефона" id="patientPhone">
        <p>Выберите специальность врача</p>
        <select id="specialities">
            <option>выберите специальность</option>
            @foreach($specialities as $speciality)
                <option value="{{$speciality->id}}">{{$speciality->speciality}}</option>
            @endforeach
        </select>

        <p id="doctorsLabel" class="d-none">Выберите врача</p>
        <select id="doctors" class="d-none">

        </select>
        <p id="dateLabel" class="d-none">выберите дату приема</p>
        <input type="date" id="checkDate" class="d-none">
        <p id="checkLabel" class="d-none">свободные номерки</p>
        <select id="check" class="d-none">

        </select><br>
        <button id="submit" class="d-none">Записаться</button>





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
                    $("#doctorsLabel").removeClass('d-none');
                    $("#doctors").removeClass('d-none');
                    $("#doctors").html('');
                    $("#doctors").html(data.options);
                }
            });
        });

        $("#doctors").change(function(){
           $("#dateLabel").removeClass('d-none');
           $("#checkDate").removeClass('d-none');
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
                  $("#checkLabel").removeClass('d-none');
                  $("#check").removeClass('d-none');
                  $("#check").html('');
                  $("#check").html(data.options);
              }
           });

        });

        $("#check").change(function(){
           $("#submit").removeClass('d-none');
        });

        $("#submit").click(function(){
            var id_doctor = $("#doctors").val();
            var date=$("#checkDate").val();
            var check=$("#check").val();
            var patientFIO=$("#patientFIO").val();
            var patientBirthdate=$("#patientBirthdate").val();
            var patientPhone=$("#patientPhone").val();
            var token = $("input[name='_token']").val();
            console.log(check);
            $.ajax({
                url:"{{ route('recordPatient') }}",
                method:'POST',
                data:{id_doctor:id_doctor, checkDate:date, patientFIO:patientFIO, check:check,
                    patientBirthdate:patientBirthdate, patientPhone:patientPhone, _token:token},
                success:function(){
                    alert("Вы успешно записались!")
                    $("#patientFIO").val('');
                    $("#patientBirthdate").val('');
                    $("#patientPhone").val('');
                    $("#specialities").val('выберите специальность')
                    $("#checkLabel").addClass('d-none');
                    $("#check").addClass('d-none');
                    $("#submit").addClass('d-none');
                    $("#dateLabel").addClass('d-none');
                    $("#checkDate").addClass('d-none');
                    $("#doctorsLabel").addClass('d-none');
                    $("#doctors").addClass('d-none');
                }
            })

        });

    </script>
@endsection
