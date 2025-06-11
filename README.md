# Teste Simers - Sistema de Gestão de Funcionários

Este é um sistema web desenvolvido em PHP puro, criado como parte de um teste técnico para o SIMERS. Ele permite o gerenciamento de funcionários, com funcionalidades como cadastro, edição, listagem, exclusão e aumento de salário.

## ✅ Funcionalidades

- Cadastro de funcionário
- Validação de dados (e-mail, salário, data)
- Edição de informações
- Aumento de salário com validação
- Exclusão de funcionário
- Interface web simples com cabeçalho e rodapé reutilizáveis

## 🛠 Tecnologias Utilizadas

- PHP (sem framework)
- HTML/CSS
- MySQL (configurável no `config/database.php`)
- Arquitetura MVC simples (Models, Views, Controllers/Ações)
- Helpers utilitários para validações

## ⚙️ Como instalar e rodar o projeto localmente

### Pré-requisitos

- PHP 7.4 ou superior
- Servidor web local (ex: Apache com XAMPP, Laragon ou PHP embutido)
- MySQL/MariaDB

### Passo a passo

1. Clone ou extraia este repositório:
   ```bash
   git clone https://github.com/seu-usuario/testesimers.git
   cd testesimers
   ```

2. Configure o banco de dados:

   - Crie um banco de dados no MySQL (ex: `simers_test`)
   - Edite o arquivo `config/database.php` com as credenciais corretas

3. Importe a estrutura inicial do banco (caso exista um arquivo `.sql`, não encontrado neste pacote, você pode criá-lo com base nas tabelas utilizadas)

4. Inicie o servidor local apontando para a pasta pública:

   - Se estiver usando o PHP embutido:
     ```bash
     php -S localhost:8000 -t testesimers/public
     ```

5. Acesse em seu navegador:
   ```
   http://localhost:8000
   ```

## 📁 Estrutura de Diretórios

```
testesimers/
├── index.php
├── Models/                # Lógica dos dados (ex: Employee.php)
├── public/                # Arquivos acessíveis pelo navegador
│   ├── layout/            # Cabeçalho e rodapé reutilizáveis
│   ├── add_employee.php
│   ├── list_employees.php
│   └── ...
├── config/                # Configurações de banco de dados
├── Helpers/               # Funções auxiliares de validação
├── actions/               # Ações de CRUD
└── access_log             # Log de acessos
```

## 🔐 Segurança

- Validação de entrada com `InputValidator`
- Validação de e-mail e salário
- Separação entre lógica e visual

## 📄 Licença

Este projeto foi desenvolvido para fins de avaliação técnica. Sinta-se livre para reutilizar e adaptar conforme necessário.
