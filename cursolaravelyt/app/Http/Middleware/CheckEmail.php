<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check()) {
            return redirect(route('login.form'));
        } //Se o usuário não estiver logado, ele é redirecionado para o form de login.

        $email = auth()->user()->email;
        $data = explode('@', $email); //O explode funciona como o trim() em Java. O primeiro parâmetro é o delimitador da string passada. Ele vai separar o que vem antes e o que vem depois de @ e armazenar ambos os valores em uma posição dentro do array $data. Esse array fica dessa maneira caso o e-mail seja, por exemplo, contato@gmail.com:
        //Array ([0] => contato [1] => gmail.com)

        $servidorEmail = $data[1];

        if($servidorEmail != 'gmail.com') {
            return redirect(route('login.form'));
        }
        return $next($request);
    }
}
