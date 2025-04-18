Gerenciamento de Usuários

Desenvolvi essa api utilizando Laravel 12 e MySql.
Optei por estruturar o projeto com uma arquitetura voltada a Módulos, de forma que seja o código fique bem separado, facilitando novas implementações de funcionalidades e Módulos, aplicando as melhores práticas do framework. 

A autenticação e permissionamento foram feitos com o Sanctum, deixando a api segura e adáptavel ao nível de permissionamento de cada usuário.

Instruções: Após instalar o projeto ou inicializar o Laravel Sail, rodar o comando php artisan migrate:fresh --seed para criar e popular o banco de dados. Será criado um usuário com email: adminemail@admin.com.br e senha: 123 que poderá ser usado para testar as funcionalidades da api.