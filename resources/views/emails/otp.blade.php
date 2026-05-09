<x-mail::message>
# Verify your email address

Hello,

Thank you for joining WhiteCanvas! To complete your registration, please use the following 6-digit verification code:

<x-mail::panel>
# {{ $otp }}
</x-mail::panel>

This code will expire in 10 minutes. If you did not create an account, no further action is required.

Thanks,<br>
The {{ config('app.name') }} Team
</x-mail::message>
