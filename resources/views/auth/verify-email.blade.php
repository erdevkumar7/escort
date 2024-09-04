@extends('user.layout-auth')
@section('auth_content')

<div class="container">
    <h1>Email Verification</h1>
    <p>
        Before proceeding, please check your email for a verification link.
        If you did not receive the email, click the button below to request another.
    </p>

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('verification.send') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Resend Verification Email</button>
    </form>
</div>
@endsection
