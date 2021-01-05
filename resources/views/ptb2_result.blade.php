<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<body>
<h1>
    Ket quar
</h1>
@if(count($result)==0)
    <p>Pt vo n: </p>
@elseif(count($result)==1)
    <p>N kep : {{$result[0]}}</p>
@else
    <p>x1 {{$result[0]}}</p>
    <p>x2 {{$result[1]}}</p>
@endif
</body>
</html>
