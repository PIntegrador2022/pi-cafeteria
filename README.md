
# pi-cafeteria

Fiz os testes utilizando XAMPP, com Apache e MySQL, (apachefriends.org/pt_br/index.html)

usando o "phpMyAdmin" incluso no XAMPP para banco de dados, por enquanto tudo funciona normal.

  

A página inicial "index.php" é acessível a qualquer um, ao clicar em "Admin Dashboard"

O usuário é redirecionado para a página de login, logando com o "adminteste", senha "123" (definidos manualmente no banco de dados)

Se logado corretamente, vai para a página de administração.

(Se tentar acessar admin/admin.php pela URL, é redirecionado para o login)

  

Em caso de erro:

- verificar se "extension=pdo_mysql" está comentado no arquivo "php.ini",
abra o XAMPP, clique nas configurações do Apache, php.ini, e remova o ponto e vírgula do começo de "extension=pdo_mysql".

  

- verificar se o phpMyAdmin foi instalado junto com o XAMPP durante a instalação do XAMPP

  

------------------------------------

  

PARA IMPORTAR O BANCO DE DADOS:

Acesse o phpMyAdmin na URL (localhost/phpmyadmin) com o servidor e o MySQL ligados no XAMPP.

Crie um novo banco de dados na esquerda em "Novo"

Coloque como nome "marchiatto_db"

Ainda no phpMyAdmin, Selecione "Importar" no topo do menu, adicione o arquivo do repositório,

importe o arquivo "marchiatto_db.sql"

Mantenha todas as opções padrão, clique em "Importar" no fim da página.

Agora sua máquina tem o banco de dados atualizado com o usuário admin.

> O.B.S: Se alguém souber um uso melhor de banco de dados além do PhpMyAdmin avise no grupo, pois não tenho certeza de como implantar o phpMyAdmin em um servidor real, sem usar o XAMPP.  - Arthur

  

------------------------------------

-Melhorada segurança para evitar exclusão de registros com chaves relacionadas, remover admins únicos, etc.

-Adicionado possibilidade de manipular admins do sistema e melhorada resposta visual para pedidos ativos/não atendidos e atendidos com cores chamativas

-Melhorado CSS e Design da página inicial, conforme feedback do dono da cafeteria, com imagens reais (obtidas no Instagram do café) e removidas seções desnecessárias.

-Adicionado pedidos e manipulação de pedidos, cardápio e manipulação de itens do cardápio. Novas tabelas no banco de dados.
  
-Adicionado possibilidade de Registrar, Excluir, Atualizar e Consultar clientes na database "clientes" (importe o arquivo 'marchiatto_db.sql')

-Adicionado "atualizar_cliente.php"; "cadastrar_cliente.php"; "deletar_cliente";


-Adicionado funções em PHP: connect.php; logar.php; logout.php; user.class.php; verifica.php.

  

-Adicionado página de admin com requisição de login: admin/admin.php

  

-Adicionado banco de dados MySQL "marchiatto_db" com tabela "usuarios"

	Com campos: idUsuario, nome e senha (md5)

	Adicionado usuário; 1, adminteste, 123

  

-Adicionado "login.php"; "login.css"; "admin.css" e logo do café "logo.jpg"

  

-Atualizado "index.php" com botão para "ADMIN DASHBOARD", levando até a página de admin

  

-Arquivos organizados: páginas web no diretório raiz; funções em php na pasta "php"; páginas de admin na pasta "admin"

  

Atualizações necessárias:

- Adicionar cardápio editável dentro da aplicação, para fazer pedidos nos nomes de clientes já registrados.
- Adicionar tela de pedidos ativos
