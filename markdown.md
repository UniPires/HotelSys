## Endpoints de Hotel

### 1. Criar Hotel
- **Método:** `POST`
- **Endpoint:** `/api/hotel`
- **Parâmetros:**
  - `nome` (string, obrigatório): Nome do hotel.
  - `endereco` (string, obrigatório): Endereço do hotel.
  - `avaliacao` (float, obrigatório): Avaliação do hotel.
  - `preco_por_noite` (float, obrigatório): Preço por noite.
  - `cidade` (string, obrigatório): Cidade onde o hotel está localizado.
  - `estado` (string, obrigatório): Estado onde o hotel está localizado.
- **Resposta:**
  - `201 Created`: Hotel inserido com sucesso.
  - `400 Bad Request`: Erro nos dados enviados.

### 2. Obter Todos os Hotéis
- **Método:** `GET`
- **Endpoint:** `/api/hotel`
- **Resposta:**
  - `200 OK`: Retorna uma lista de todos os hotéis.
  - `204 No Content`: Nenhum hotel encontrado.

### 3. Obter Hotel por ID
- **Método:** `GET`
- **Endpoint:** `/api/hotel?id={id}`
- **Parâmetros:**
  - `id` (int, obrigatório): ID do hotel.
- **Resposta:**
  - `200 OK`: Retorna os dados do hotel.
  - `404 Not Found`: Hotel não encontrado.

### 4. Atualizar Hotel
- **Método:** `PUT`
- **Endpoint:** `/api/hotel?id={id}`
- **Parâmetros:**
  - `id` (int, obrigatório): ID do hotel.
  - `nome` (string, opcional): Nome do hotel.
  - `endereco` (string, opcional): Endereço do hotel.
  - `avaliacao` (float, opcional): Avaliação do hotel.
  - `preco_por_noite` (float, opcional): Preço por noite.
  - `cidade` (string, opcional): Cidade.
  - `estado` (string, opcional): Estado.
- **Resposta:**
  - `200 OK`: Hotel atualizado com sucesso.
  - `404 Not Found`: Hotel não encontrado.

### 5. Deletar Hotel
- **Método:** `DELETE`
- **Endpoint:** `/api/hotel?id={id}`
- **Parâmetros:**
  - `id` (int, obrigatório): ID do hotel.
- **Resposta:**
  - `200 OK`: Hotel excluído com sucesso.
  - `404 Not Found`: Hotel não encontrado.

---

## Endpoints de Quarto

### 1. Criar Quarto
- **Método:** `POST`
- **Endpoint:** `/api/quarto`
- **Parâmetros:**
  - `hotel_id` (int, obrigatório): ID do hotel ao qual o quarto pertence.
  - `tipo_quarto` (string, obrigatório): Tipo do quarto.
  - `capacidade` (int, obrigatório): Capacidade do quarto.
  - `preco` (float, obrigatório): Preço do quarto.
- **Resposta:**
  - `201 Created`: Quarto inserido com sucesso.
  - `400 Bad Request`: Erro nos dados enviados.

### 2. Obter Todos os Quartos
- **Método:** `GET`
- **Endpoint:** `/api/quarto`
- **Resposta:**
  - `200 OK`: Retorna uma lista de todos os quartos.
  - `204 No Content`: Nenhum quarto encontrado.

### 3. Obter Quarto por ID
- **Método:** `GET`
- **Endpoint:** `/api/quarto?id={id}`
- **Parâmetros:**
  - `id` (int, obrigatório): ID do quarto.
- **Resposta:**
  - `200 OK`: Retorna os dados do quarto.
  - `404 Not Found`: Quarto não encontrado.

### 4. Obter Quartos por ID do Hotel
- **Método:** `GET`
- **Endpoint:** `/api/quarto?hotel_id={hotel_id}`
- **Parâmetros:**
  - `hotel_id` (int, obrigatório): ID do hotel.
- **Resposta:**
  - `200 OK`: Retorna uma lista de quartos do hotel.
  - `204 No Content`: Nenhum quarto encontrado para o hotel.

### 5. Atualizar Quarto
- **Método:** `PUT`
- **Endpoint:** `/api/quarto?id={id}`
- **Parâmetros:**
  - `id` (int, obrigatório): ID do quarto.
  - `hotel_id` (int, opcional): ID do hotel.
  - `tipo_quarto` (string, opcional): Tipo do quarto.
  - `capacidade` (int, opcional): Capacidade do quarto.
  - `preco` (float, opcional): Preço do quarto.
- **Resposta:**
  - `200 OK`: Quarto atualizado com sucesso.
  - `404 Not Found`: Quarto não encontrado.

### 6. Deletar Quarto
- **Método:** `DELETE`
- **Endpoint:** `/api/quarto?id={id}`
- **Parâmetros:**
  - `id` (int, obrigatório): ID do quarto.
- **Resposta:**
  - `200 OK`: Quarto excluído com sucesso.
  - `404 Not Found`: Quarto não encontrado.

---

## Exemplos de Requisições

### Criar um Novo Hotel
```bash
curl -X POST http://localhost/api/hotel -H "Content-Type: application/json" -d '{
  "nome": "Hotel Exemplo",
  "endereco": "Rua Exemplo, 123",
  "avaliacao": 4.5,
  "preco_por_noite": 150.00,
  "cidade": "São Paulo",
  "estado": "SP"
}'
