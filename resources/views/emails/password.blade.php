@component('mail::message')
Hello!
Anda menerima email ini karena kami menerima permintaan pengaturan ulang kata sandi untuk akun Anda.

@component('mail::button', ['url' => route('password.reset', $token) ])
Reset Kata Sandi
@endcomponent

Tautan pengaturan ulang kata sandi ini akan kedaluwarsa dalam 60 menit.

Jika Anda tidak meminta pengaturan ulang kata sandi, tidak diperlukan tindakan lebih lanjut.

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent