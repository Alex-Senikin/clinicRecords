@csrf
<option>Выберите время записи</option>
@if(!empty($checkTime))
    @foreach($checkTime as $key)
        <option >{{ $key }}</option>
    @endforeach
@endif
