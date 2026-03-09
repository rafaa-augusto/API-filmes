# API Filmes – Projeto Acadêmico

Este é um **projeto acadêmico de API para um site de filmes**, inspirado em plataformas como a Netflix.  
O projeto foi originalmente desenvolvido para a disciplina de **Desenvolvimento Web**, mas está sendo **refatorado e melhorado**, com mudanças na arquitetura, separação em camadas e melhores práticas de desenvolvimento.

A API permite:

- Cadastro e login de usuários
- Visualização de filmes e categorias
- Cadastro e gerenciamento de filmes pelo administrador
- Organização do código em **Arquitetura em Camadas** (Model → Repository → Service → Controller → Routes)
- Preparação para autenticação JWT (em desenvolvimento)

---

## Tecnologias utilizadas

- PHP 8
- MySQL
- PDO para conexão com banco de dados
- VS Code (com extensão SQLTools para gerenciar o banco)
- Postman ou Insomnia para testar a API
- Composer (para futuras dependências)

---

## Estrutura do projeto
```
api-filmes/
│
├── config/
│ └── Database.php 
│
├── models/ 
│ ├── User.php
│ ├── Movie.php
│ └── Category.php
│
├── repositories/ 
│ ├── UserRepository.php
│ ├── MovieRepository.php
│ └── CategoryRepository.php
│
├── services/ 
│ ├── AuthService.php
│ └── MovieService.php
│
├── controllers/ 
│ └── AuthController.php
│
├── routes/
│ └── api.php
│
├── public/
│ └── index.php
│
└── database/
└── schema.sql # Script para criar banco e tabelas
```
## Endpoints disponíveis (até agora)
1.Usuários

- POST /api/register → Cadastro de usuário
- POST /api/login → Login

2.Filmes

- GET /api/movies → Lista todos os filmes

- GET /api/movies/{id} → Detalhes de um filme

3.Categorias

- GET /api/categories → Lista todas as categorias

Administrador (em desenvolvimento)

- POST /api/admin/movies → Adicionar filme

- PUT /api/admin/movies/{id} → Atualizar filme

- DELETE /api/admin/movies/{id} → Deletar filme


# Observações

Este projeto é acadêmico e em constante refatoração. O objetivo é aprender boas práticas de desenvolvimento web, arquitetura em camadas,
uso de PHP com PDO e organização de código para APIs RESTful.
