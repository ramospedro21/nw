# Teste desenvolvedor pleno New Way

<h3>Este projeto foi desenvolvido em Laravel (9) juntamente com o sail (docker) e mysql, as escola da tecnologia do banco de dados foi feita por conta de ter uma facil instalação e atender os requisitos de um projeto que futuramente possa ter um banco de dados relacional maior</h3>
<br>

<h2>Configurações do projeto:</h2>
<ol>
    <li>Clonar o projeto</li>
    <li>Entrar dentro da pasta do proejto clonado e executar <b>./vendor/bin/sail up -d</b> </li>
    <li>Configurar o .env (exemplo no .env.example, apenas copiar e colar)</li>
    <li>Rodar <b>./vendor/bin/sail artisan key:generate e  ./vendor/bin/sail artisan migrate </b></li>
</ol>

<h2>Instruções para primeiro uso</h2>

<p>Assim que o projeto estiver com seu container rodando, a primeira coisa a se fazer é criar um usuário pelo metodo <b>POST</b> na rota <b>/register</b> informando <b>nome, email, senha e confirmação de senha</b> </p>
