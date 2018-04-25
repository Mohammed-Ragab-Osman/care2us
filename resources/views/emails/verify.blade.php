<h2>Verify Your Email Address</h2>

<div>
    Thanks for creating an account with our application.<br/>
    Please follow the link below to verify your email address <br/>
    {{ URL::to('register/verify/'.$confirmation_code) }}.<br/>
</div>