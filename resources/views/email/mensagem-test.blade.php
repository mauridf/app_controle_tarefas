@component('mail::message')
# INTRODUÇÃO

O Corpo da Mensagem, aqui vem a mensagem que será enviada.

@component('mail::button', ['url' => ''])
Texto do Botão
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
