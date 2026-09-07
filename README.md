# Projeto Laravel — Controle de Acesso

## Sobre o projeto

Este projeto foi desenvolvido como uma atividade prática utilizando o **Framework Laravel**.

A proposta da atividade é demonstrar o funcionamento de alguns recursos básicos do Laravel, principalmente:

* Rotas;
* Middleware;
* Controller;
* View;
* Passagem de informações entre as partes da aplicação;
* Controle de acesso a uma página.

O projeto simula um sistema simples onde existe uma área que possui acesso restrito. Quando o usuário tenta entrar nessa área, o sistema apresenta uma mensagem informando que ele não possui permissão.

---

## Objetivo

O principal objetivo é mostrar na prática como uma requisição passa pelas diferentes partes de uma aplicação Laravel.

Neste projeto, o usuário acessa a rota `/acesso`. Essa rota possui um Middleware chamado `VerificarPermissao`.

O Middleware é responsável por preparar as informações relacionadas ao bloqueio de acesso e encaminhar a requisição para o Controller.

O Controller recebe essas informações e envia os dados para a View, que apresenta a mensagem na tela.

A mensagem utilizada é:

> Você não tem permissão para acessar este site.

E também:

> Favor entrar em contato com o administrador.

---

# Tecnologias utilizadas

* PHP
* Laravel
* Blade
* HTML
* CSS
* MySQL
* XAMPP
* Visual Studio Code

---

# Estrutura principal

As principais partes desenvolvidas no projeto são:

```text
app/
└── Http/
    ├── Controllers/
    │   └── AcessoController.php
    │
    └── Middleware/
        └── VerificarPermissao.php

bootstrap/
└── app.php

resources/
└── views/
    ├── home.blade.php
    └── acesso.blade.php

routes/
└── web.php
```

Cada arquivo possui uma função diferente dentro da aplicação.

---

# Página inicial

A página inicial está localizada em:

```text
resources/views/home.blade.php
```

Ela é acessada através da rota:

```text
/
```

A Home foi criada para apresentar o sistema e possui um botão que leva o usuário para a área restrita.

A ideia foi fazer uma interface simples, mostrando que o projeto possui uma página inicial e uma área que necessita de controle de acesso.

---

# Rotas

As rotas do projeto estão no arquivo:

```text
routes/web.php
```

Foi criada uma rota para a página inicial:

```php
Route::get('/', function () {
    return view('home');
});
```

Essa rota simplesmente retorna a View `home`.

Também foi criada a rota da área restrita:

```php
Route::get('/acesso', [AcessoController::class, 'index'])
    ->middleware('verificar.permissao');
```

Essa é uma das partes principais do projeto.

A rota `/acesso` chama o método `index()` do `AcessoController` e utiliza o Middleware `verificar.permissao`.

Dessa forma, o Middleware participa do processo antes que a resposta final seja apresentada ao usuário.

---

# Middleware

O Middleware utilizado no projeto se chama:

```text
VerificarPermissao
```

Ele está localizado em:

```text
app/Http/Middleware/VerificarPermissao.php
```

O Middleware foi criado para trabalhar com o controle de acesso da aplicação.

Seu código é:

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarPermissao
{
    public function handle(Request $request, Closure $next): Response
    {
        $request->merge([
            'mensagem' => 'Você não tem permissão para acessar este site.',
            'contato' => 'Favor entrar em contato com o administrador.'
        ]);

        return $next($request);
    }
}
```

Nesse caso, o Middleware adiciona duas informações à requisição:

```text
mensagem
contato
```

Depois disso, utiliza:

```php
return $next($request);
```

para continuar o processamento da requisição.

---

# Registro do Middleware

Para que o Laravel reconheça o Middleware através do nome:

```text
verificar.permissao
```

foi feita a configuração no arquivo:

```text
bootstrap/app.php
```

Foi utilizado:

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'verificar.permissao' => \App\Http\Middleware\VerificarPermissao::class,
    ]);
})
```

Isso cria um apelido para o Middleware.

Assim, na rota podemos utilizar:

```php
->middleware('verificar.permissao')
```

em vez de escrever o caminho completo da classe.

---

# Controller

O Controller utilizado é:

```text
AcessoController
```

Ele está localizado em:

```text
app/Http/Controllers/AcessoController.php
```

Seu código é:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcessoController extends Controller
{
    public function index(Request $request)
    {
        return response()->view('acesso', [
            'mensagem' => $request->mensagem,
            'contato' => $request->contato
        ], 403);
    }
}
```

O Controller recebe a requisição através do parâmetro:

```php
Request $request
```

As informações adicionadas pelo Middleware são acessadas através de:

```php
$request->mensagem
```

e:

```php
$request->contato
```

Depois disso, o Controller envia essas informações para a View `acesso`.

O código também utiliza o status HTTP:

```text
403
```

Esse código representa **Forbidden**, ou seja, acesso proibido.

---

# View de acesso negado

A página apresentada ao usuário está em:

```text
resources/views/acesso.blade.php
```

Ela utiliza Blade, que é o sistema de templates utilizado pelo Laravel.

As informações recebidas do Controller são mostradas através de:

```php
{{ $mensagem }}
```

e:

```php
{{ $contato }}
```

Dessa forma, o conteúdo da mensagem não precisa ficar diretamente escrito no HTML da página.

A View também possui um botão para voltar para a página inicial.

---

# Funcionamento completo

O funcionamento da aplicação pode ser resumido da seguinte forma:

```text
Usuário
   │
   ▼
/acesso
   │
   ▼
Rota
   │
   ▼
Middleware
VerificarPermissao
   │
   │ adiciona as mensagens
   ▼
Controller
AcessoController
   │
   │ envia os dados
   ▼
View
acesso.blade.php
   │
   ▼
Mensagem de acesso negado
```

---

# O que acontece ao acessar /acesso?

Quando o usuário acessa:

```text
http://127.0.0.1:8000/acesso
```

a aplicação identifica a rota `/acesso`.

Como essa rota possui o Middleware:

```text
verificar.permissao
```

o Laravel executa o Middleware.

O Middleware adiciona as mensagens na requisição e permite que o processamento continue.

Depois disso, o Controller `AcessoController` recebe a requisição.

O Controller pega as mensagens e envia para a View.

Por fim, a View apresenta a página informando que o acesso não foi autorizado.

---

# Status HTTP 403

A página de acesso negado retorna o status:

```text
403 Forbidden
```

Isso foi utilizado porque o usuário está tentando acessar uma área que não está disponível para ele.

Apesar da página ser exibida normalmente no navegador, a resposta HTTP informa que o acesso foi proibido.

---

# Rota Fallback

Também foi criada uma rota `fallback`:

```php
Route::fallback(function () {
    return response()->view('home', [], 404);
});
```

Ela é executada quando o usuário tenta acessar uma URL que não existe no sistema.

Por exemplo:

```text
/teste
```

Como essa rota não foi criada, o Laravel utiliza o `fallback`.

Nesse projeto, ele apresenta novamente a página inicial, mas mantém o código HTTP:

```text
404
```

Isso significa que a página solicitada não foi encontrada.

---

# Como executar o projeto

Primeiramente, é necessário ter o PHP, Composer e Laravel instalados.

Com o projeto aberto no terminal, execute:

```bash
php artisan serve
```

O Laravel iniciará o servidor local.

Normalmente, a aplicação poderá ser acessada em:

```text
http://127.0.0.1:8000
```

---

# Testando as páginas

## Página inicial

Acesse:

```text
http://127.0.0.1:8000/
```

Deve aparecer a página inicial do sistema.

---

## Área restrita

Acesse:

```text
http://127.0.0.1:8000/acesso
```

A aplicação deve apresentar a tela de acesso não autorizado.

A mensagem será:

> Você não tem permissão para acessar este site.

E:

> Favor entrar em contato com o administrador.

---

# Verificando as rotas

Para visualizar as rotas cadastradas no Laravel, pode ser utilizado:

```bash
php artisan route:list
```

Esse comando mostra as rotas disponíveis e permite verificar que `/acesso` está utilizando o Middleware:

```text
verificar.permissao
```

---

# Evidências da atividade

Para demonstrar a execução da atividade, foram consideradas as seguintes evidências:

### 1. Página inicial

Mostra a aplicação funcionando e o acesso à área restrita.

### 2. Arquivo de rotas

Mostra a configuração das rotas e a utilização do Middleware.

### 3. Middleware

Mostra o código da classe `VerificarPermissao`.

### 4. Controller

Mostra o `AcessoController` responsável por receber os dados e retornar a View.

### 5. Página de acesso negado

Mostra o resultado final da execução no navegador.

### 6. Terminal

O comando:

```bash
php artisan route:list
```

pode ser utilizado como uma evidência adicional da configuração das rotas.

---

# Relação entre os componentes

O projeto foi desenvolvido para demonstrar que cada parte possui uma responsabilidade.

**Route**

Define qual endereço será acessado e qual Controller será utilizado.

**Middleware**

Interfere no processamento da requisição e adiciona as informações relacionadas ao controle de acesso.

**Controller**

Recebe a requisição e organiza os dados que serão enviados para a View.

**View**

É responsável pela parte visual que o usuário vê no navegador.

Essa separação facilita a organização do projeto e mostra como os principais componentes do Laravel podem trabalhar juntos.

---

# Conclusão

Com este projeto foi possível colocar em prática o funcionamento de **Routes, Middleware, Controller e Views** dentro do Laravel.

A aplicação possui uma página inicial, uma rota protegida e uma tela de acesso negado.

O Middleware `VerificarPermissao` adiciona as mensagens à requisição, o `AcessoController` recebe essas informações e a View `acesso.blade.php` apresenta o resultado para o usuário.

O projeto atende à proposta da atividade ao demonstrar, de forma prática, como o Laravel pode controlar o fluxo de uma requisição utilizando Middleware, Controller e View.

---

# Autor

**Higor Mota de Oliveira**
