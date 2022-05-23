<h3>Halo, {{ $user->username }} !</h3>
<p>{{ env('APP_NAME') }}</p>

<p>Your password reset link is</p>
<p>
    <a href="{{ $url }}">
        {{ $url }}
    </a>
</p>