@csrf
<option>Выберите врача</option>
@if(!empty($doctors))
    @foreach($doctors as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
@endif
