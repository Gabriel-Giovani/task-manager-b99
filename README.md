<div align="center"><img src="https://github.com/Gabriel-Giovani/task-manager-b99/blob/master/views/img/img-readme/tela_login.png"></div>

<h1 align="center">Gerenciador de Tarefas - Atua 99</h1>
<p align="center">Os personagens de Brooklyn 99 foram demitidos do posto policial de Nova York. Portanto, agora estão trabalhando na Atua 99.</p>

<br>
<br>

<h2 align="center">:octocat: Desenvolvedor</h2>

<figure>
    <div align="center">
        <img src="https://github.com/Gabriel-Giovani/task-manager-b99/blob/master/views/img/img-readme/perfil.jpg" width="200px">
    </div>
    <div align="center">
    <figcaption">Gabriel Giovani</figcaption>
    </div>
</figure>

<br>
<br>

<div align="center"><b>Status do projeto:</b> Aguardando aprovação :clock2:</div>

<br>
<br>

<h2 align="center">Tópicos</h2>

<br>

<ul>
    <a href="#desc-pjt"><li>Descrição do projeto</li></a>
    <a href="#func"><li>Funcionalidades</li></a>
    <a href="#demo"><li>Demonstração</li></a>
    <a href="#pre"><li>Pré-requisitos</li></a>
    <a href="#init"><li>Executando o projeto</li></a>
    <a href="#log"><li>Login</li></a>
    <a href="page"><li>Páginas</li></a>
    <a href="resp"><li>Responsividade</li></a>
    <a href="ling"><li>Linguagens e Libs utilizadas</li></a>
</ul>

<br>
<br>

<h2 align="center" id="desc-pjt">:memo: Descrição do projeto</h2>

<br>

<p>É um sistema web que possibilita gerenciar tarefas pessoais e/ou de uma equipe.</p>
<div align="center"><img src="https://github.com/Gabriel-Giovani/task-manager-b99/blob/master/views/img/img-readme/dash-admin.gif" width="900px"></div>

<br>
<br>

<h2 align="center" id="func">:wrench: Funcionalidades</h2>

<br>

<ul>
    <li>:heavy_check_mark: Cadastro de usuários;</li>
    <li>:heavy_check_mark: Gerenciamento de todos os usuários através de administradores;</li>
    <li>:heavy_check_mark: Cadastro de tarefas;</li>
    <li>:heavy_check_mark: Gerenciamento das tarefas (criação, visualização, edição e exclusão);</li>
    <li>:heavy_check_mark: Gerenciamento de todas as tarefas de todos os usuários através de administradores.</li>
</ul>

<br>
<br>

<h2 align="center" id="demo">:mag_right: Demonstração</h2>

<br>

<p>Caso queira visualizar uma demonstração do projeto, acesso o link: <a href="">LINK</a></p>

<br>
<br>

<h2 align="center" id="pre">:warning: Pré-requisitos</h2>

<br>

<p>Caso queira executar o projeto em sua máquina, fique atento aos pré-requisitos:</p>

<br>

<ul>
    <li>Navegador web (<b>Google Chrome</b>, Firefox etc...);</li>
    <li>Pacote de servidores web (<b>XAMPP</b>, WampServer, etc...).</li>
</ul>

<br>
<br>

<h2 align="center" id="init">:checkered_flag: Executando o projeto</h2>

<br>

<p>Para executar o projeto em sua máquina verifique se a mesma atende aos pré requisitos citados acima. Para execução deste projeto foi utilizado o pacote <b>XAMPP</b>, então o passo a passo será explicado utilizando ele. Mas lembrando que pode ser utilizado qualquer pacote de sua preferência.</p>
<br>
<p><b>1.</b> Baixe o projeto ou execute um <i>git clone</i> em alguma pasta de sua máquina.</p>
<p><b>2.</b> Extraia os arquivos baixados e os cole na pasta padrão do servidor de sua máquina. No caso do XAMPP o diretório é: <i>C:\xampp\htdocs</i></p>
<p><b>3.</b> Execute o XAMPP e habilite os serviços do <b>APACHE</b> e do <b>MySQL</b>.</p>
<p><b>4.</b> Em seu navegador, na barra de busca, digite: <i>http://localhost/phpmyadmin/</i>.</p>
<p><b>5.</b> Após isso, crie um novo banco com o nome <i>crud</i>.</p>
<p><b>6.</b> Dentro deste banco, importe o arquivo <i>crud.sql</i> que está na pasta do projeto.</p>
<p><b>7.</b> Após importar as tabelas do banco, abra uma nova aba do navegador e digite na barra de pesquisa: <i>localhost</i>.</p>
<p><b>8.</b> Selecione a pasta do projeto e logo em seguida, será redirecionado para a página de login da aplicação.</p>

<br>
<br>

<h2 align="center" id="log">:closed_lock_with_key: Login</h2>

<br>

<p>O login e senha de cada usuário pode ser visualizado na estrutura do banco de dados (por essa razão que os dados não foram criptografados). Mas, este é o acesso do usuário administrador: </p>

<br>

<div align="center">
    <p><b>LOGIN:</b> ray.holt</p>
    <p><b>SENHA:</b> kevin2020</p>
</div>

<br>
<br>

<h2 align="center" id="page">:page_facing_up: Páginas</h2>

<br>

<h3 align="center">Tela de login</h2>
<div align="center"><img src="https://github.com/Gabriel-Giovani/task-manager-b99/blob/master/views/img/img-readme/login.gif"></div>

<br>

<h3 align="center">Dashboard (usuário comum)</h2>
<div align="center"><img src="https://github.com/Gabriel-Giovani/task-manager-b99/blob/master/views/img/img-readme/dash-comum.gif"></div>

<br>

<h3 align="center">Dashboard (administrador)</h2>
<p><b>*</b> Os usuários administradores têm funcionalidades a mais, como:</p>
<ul>
    <li>Gerenciar todas as tarefas de todos os usuários;</li>
    <li>Gerenciar contas de usuário.</li>
</ul>
<div align="center"><img src="https://github.com/Gabriel-Giovani/task-manager-b99/blob/master/views/img/img-readme/dash-admin.gif"></div>

<h3 align="center">Nova tarefa</h2>
<div align="center"><img src="https://github.com/Gabriel-Giovani/task-manager-b99/blob/master/views/img/img-readme/new_task.gif"></div>

<br>

<h3 align="center">Edição da tarefa</h2>
<div align="center"><img src="https://github.com/Gabriel-Giovani/task-manager-b99/blob/master/views/img/img-readme/edit_task.gif"></div>

<br>

<h3 align="center">Novo usuário</h2>
<div align="center"><img src="https://github.com/Gabriel-Giovani/task-manager-b99/blob/master/views/img/img-readme/new_user.gif"></div>

<br>

<h3 align="center">Edição do usuário</h2>
<div align="center"><img src="https://github.com/Gabriel-Giovani/task-manager-b99/blob/master/views/img/img-readme/edit_user.gif"></div>

<br>
<br>

<h2 align="center" id="resp">:calling: Responsividade</h2>

<br>

<p>Usando a lib <b>Bootstrap</b> e <i>media queries</i>, o projeto ganha responsividade com qualquer tela e dispositivo.</p>

<br>

<div align="center"><img src="https://github.com/Gabriel-Giovani/task-manager-b99/blob/master/views/img/img-readme/responsive.gif"></div>

<br>
<br>

<h2 align="center" id="ling">:books: Linguagens e libs utilizadas</h2>

<br>

<h3 align="center">Linguagens</h3>

<ul>
    <li>HTML 5</li>
    <li>CSS 3</li>
    <li>Javascript</li>
    <li>PHP</li>
    <li>SQL</li>
</ul>

<br>

<h3 align="center">Libs</h3>

<ul>
    <li>Bootstrap 4</li>
    <li>jQuery</li>
</ul>
