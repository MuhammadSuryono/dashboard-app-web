<li class="breadcrumb-item">
    @if(is_null(Request::segment(1)))
    Home
    @else
    <a href="{{ url('/') }}">Home</a>
    @endif
</li>
@foreach(explode('/', url()->getRequest()->getPathInfo()) as $key => $value)
@if(!empty($value))
<?php
$crypt = true;
try {
    $value = Crypt::decryptString($value);
} catch (Illuminate\Contracts\Encryption\DecryptException $e) {
    $value = $value;
    $crypt = false;
}
if ($crypt) {
    if (Request::segment(1) == 'role') {
        $value = Role::find($value)->rol_name;
    }
    else {
        continue;
    }
}
?>
@if($key == count(explode('/', url()->getRequest()->getPathInfo())) - 1)
<li class="breadcrumb-item active">{{ ucwords(str_replace('-', ' ', $value)) }}</li>
@else
<?php $links = []; ?>
@for($i = 0; $i <= $key; $i++)
<?php $links[] = Request::segment($i) ?>
@endfor
<li class="breadcrumb-item"><a href="{{ filter_var(url(implode('/', $links)), FILTER_VALIDATE_URL) ? url(implode('/', $links)) : '#' }}">{{ ucwords(str_replace('-', ' ', $value)) }}</a></li>
@endif
@endif
@endforeach