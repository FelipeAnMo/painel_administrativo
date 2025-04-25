<h1>Projeto Painel Administrativo</h1>

<h2>Passo a passo</h2>

<ol>
  <li>
    <strong>Clone o repositório:</strong>
    <pre><code>git clone https://github.com/FelipeAnMo/painel_administrativo</code></pre>
  </li>

  <li>
    <strong>Com o Docker já instalado, execute o comando abaixo na pasta raiz do projeto:</strong>
    <pre><code>docker-compose up --build</code></pre>
  </li>

  <li>
    <strong>Depois que os containers estiverem funcionando, execute as migrações do banco:</strong>
    <pre><code>docker-compose exec app php vendor/bin/phinx migrate</code></pre>
  </li>
</ol>

<h2>Pronto!</h2>

<p>O ambiente estará configurado e o banco de dados migrado com sucesso.</p>

<h2>Acesso ao painel administrativo</h2>

<p>Para acessar o painel administrativo, utilize o seguinte login padrão:</p>

<ul>
  <li><strong>E-mail:</strong> admin@admin.com</li>
  <li><strong>Senha:</strong> admin</li>
</ul>