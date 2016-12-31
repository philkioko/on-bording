<h1>Hello user</h1>
<p>
	Please follow this link to activate your account,

	<a href="{{env('APP_URL') }}/activate/{{ $user->email }}/{{ $code }} ">Activate Account</a>
</p>