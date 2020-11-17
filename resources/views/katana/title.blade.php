@foreach(array_reverse(request()->segments()) as $key => $value)
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
{{ str_replace('-', ' ', strtoupper($value)) }} | 
@endforeach
{{ config('app.name', 'ETICKET') }}