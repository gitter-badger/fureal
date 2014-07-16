{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.forgot_password') }}} ::
@parent
@stop

<div class="page-header">
	<h1>Forgot Password</h1>
</div>
{{ Confide::makeResetPasswordForm($token)->render() }}
