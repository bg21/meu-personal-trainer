# PTManager

> SaaS de gestão completa para personal trainers — alunos, fichas de treino, evolução e financeiro em um só lugar.

---

## O que é

PTManager é um software como serviço (SaaS) desenvolvido para personal trainers autônomos que precisam organizar sua carteira de alunos, distribuir fichas de treino e controlar pagamentos sem depender de planilhas e anotações avulsas.

Cada personal trainer tem seu próprio painel isolado (multi-tenant). Os alunos acessam um portal simplificado via link, sem precisar criar conta ou instalar aplicativo.

---

## Para quem é

- Personal trainers autônomos com 5 a 50 alunos ativos
- PTs que trabalham em academia ou de forma itinerante
- Profissionais que hoje usam planilha, papel ou WhatsApp para organizar treinos e cobranças

---

## Funcionalidades

### Painel do Personal Trainer

**Gestão de alunos**

- Cadastro com objetivo, dados de saúde e restrições
- Status por aluno: ativo, trial, inativo
- Histórico completo de fichas e evolução

**Fichas de treino**

- Criação de fichas com exercícios, séries, repetições, carga e descanso
- Atribuição de fichas por aluno com data de vigência
- Reutilização e duplicação de fichas

**Acompanhamento de evolução**

- Registro de peso, percentual de gordura e medidas corporais
- Upload de fotos de evolução (frente, lado, costas)
- Gráfico de progresso por aluno

**Financeiro**

- Plano de pagamento por aluno com valor e dia de vencimento
- Controle de mensalidades: pendente, pago, atrasado
- Dashboard financeiro com receita do mês e inadimplências

**Dashboard geral**

- Alunos ativos, receita mensal, vencimentos da semana e treinos registrados
- Alertas de pagamentos próximos do vencimento

### Portal do Aluno

- Acesso por link único enviado pelo PT (sem senha)
- Visualização da ficha de treino ativa
- Registro de treinos realizados
- Histórico de evolução com gráfico de peso

---

## Stack tecnológica

| Camada              | Tecnologia                      |
| ------------------- | ------------------------------- |
| Backend             | PHP 8.2 + Laravel 11            |
| Painel admin        | Filament v3                     |
| Portal do aluno     | Livewire v3                     |
| Banco de dados      | MySQL 8                         |
| Autenticação admin  | Laravel Auth                    |
| Autenticação aluno  | Token de acesso único           |
| Storage de arquivos | Laravel Storage (S3-compatible) |

---

## Arquitetura

O sistema é **multi-tenant por `tenant_id`**: cada personal trainer é um tenant isolado. Todos os dados (alunos, fichas, pagamentos) são sempre filtrados pelo tenant autenticado.

O portal do aluno é uma aplicação Livewire separada, acessível por rota pública com autenticação via `access_token` único por aluno — sem login, sem senha, sem app.

---

## Modelo de negócio

| Plano | Público                        | Preço estimado |
| ----- | ------------------------------ | -------------- |
| Trial | Novos PTs                      | 14 dias grátis |
| Basic | Até 15 alunos                  | R$ 49/mês      |
| Pro   | Alunos ilimitados + relatórios | R$ 89/mês      |

---

## Schema do banco

O banco de dados é composto por 10 tabelas principais:

```
tenants → users
       → students → workout_plans → exercises
                  → student_workout_plans
                  → student_progress → student_progress_photos
                  → workout_logs
                  → financial_plans → payments
```

Versão atual do schema: `v1.0`
Arquivo de referência: `database/schema.sql`

---

## Roadmap

- [ ] Schema do banco de dados
- [ ] Design system e layout das telas
- [ ] Scaffold Filament (Resources e Widgets)
- [ ] Portal do aluno (Livewire)
- [ ] Integração de pagamento recorrente (Pagar.me / Asaas)
- [ ] Notificações de vencimento por e-mail
- [ ] Relatório PDF de evolução do aluno
- [ ] Biblioteca de exercícios reutilizável
- [ ] App mobile (PWA)

---

## Desenvolvido por

Juliana
