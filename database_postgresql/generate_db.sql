-- Tabelas de Dados

CREATE TABLE "pessoas" (
  "id" uuid PRIMARY KEY,
  "nome" varchar(70) NOT NULL,
  "cpf" char(11) DEFAULT NULL,
  "url_linkedin" varchar(255) DEFAULT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "clientes" (
  "id" uuid PRIMARY KEY,
  "pessoa_id" uuid NOT NULL,
  "empresa_id" uuid NOT NULL,
  "tipo_cargo_id" serial NOT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "funcionarios" (
  "id" uuid PRIMARY KEY,
  "pessoa_id" uuid NOT NULL,
  "tipo_cargo_id" serial NOT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "empreendimentos" (
  "id" uuid PRIMARY KEY,
  "nome" varchar(100) NOT NULL,
  "empresa_id" uuid NOT NULL,
  "tipo_empreendimento_id" serial NOT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "empresas" (
  "id" uuid PRIMARY KEY,
  "nome" varchar(70) NOT NULL,
  "cnpj" char(18) DEFAULT NULL,
  "tipo_area_id" serial NOT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "contratos" (
  "id" uuid PRIMARY KEY,
  "numero_ctt" varchar(9) NOT NULL,
  "empresa_id" uuid NOT NULL,
  "responsavel_id" uuid NOT NULL,
  "gestor_id" uuid NOT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "projetos" (
  "id" uuid PRIMARY KEY,
  "nome" varchar(70) NOT NULL,
  "descricao" varchar(200) NOT NULL,
  "numero_projeto" smallint NOT NULL,
  "contrato_id" uuid NOT NULL,
  "gestor_id" uuid NOT NULL,
  "responsavel_id" uuid NOT NULL,
  "tipo_recorrencia_id" serial NOT NULL,
  "tipo_entrega_id" serial NOT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "ativos" (
  "id" uuid PRIMARY KEY,
  "ativo" varchar(200) NOT NULL,
  "centro_custo" char(5) NOT NULL,
  "pedido_venda" smallint NOT NULL,
  "contrato_id" uuid NOT NULL,
  "tipo_venda_id" serial NOT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "etapas" (
  "id" uuid PRIMARY KEY,
  "descricao" varchar(100) DEFAULT NULL,
  "projeto_id" uuid NOT NULL,
  "empreendimento_id" uuid NOT NULL,
  "tipo_recorrencia_id" serial NOT NULL,
  "tipo_entrega_id" serial NOT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "subetapas" (
  "id" uuid PRIMARY KEY,
  "descricao" varchar(100) DEFAULT NULL,
  "etapa_id" uuid NOT NULL,
  "empreendimento_id" uuid NOT NULL,
  "tipo_recorrencia_id" serial NOT NULL,
  "tipo_entrega_id" serial NOT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);

-- Tabelas Não Relacionais (e suas coadjuvantes)

CREATE TABLE "prazos" (
  "id" uuid PRIMARY KEY,
  "id_objeto" uuid NOT NULL,
  "id_responsavel" uuid NOT NULL,
  "id_executor" uuid NOT NULL,
  "inicio_previsto" date NOT NULL,
  "fim_previsto" date NOT NULL,
  "inicio_efetivo" date NOT NULL,
  "fim_efetivo" date NOT NULL,
  "tipo_status_id" serial NOT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "prorrogados" (
  "id" uuid PRIMARY KEY,
  "id_objeto" uuid NOT NULL,
  "prazo_id" uuid NOT NULL,
  "descricao" uuid NOT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "geolocs" (
  "id" uuid PRIMARY KEY,
  "id_objeto" uuid NOT NULL,
  "cep" char(8) DEFAULT null,
  "endereco" varchar(70) DEFAULT null,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "telefones" (
  "id" uuid PRIMARY KEY,
  "id_objeto" uuid NOT NULL,
  "telefone" char(11) NOT NULL,
  "descricao" varchar(70) NOT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "emails" (
  "id" uuid PRIMARY KEY,
  "id_objeto" uuid NOT NULL,
  "email" varchar(50) NOT NULL,
  "descricao" varchar(70) NOT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);

-- Tabelas de Tipologia

CREATE TABLE "tipo_recorrencias" (
  "id" serial PRIMARY KEY,
  "nome" varchar(70) NOT NULL,
  "descricao" varchar(200) DEFAULT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "tipo_status" (
  "id" serial PRIMARY KEY,
  "nome" varchar(70) NOT NULL,
  "descricao" varchar(200) DEFAULT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "tipo_entregas" (
  "id" serial PRIMARY KEY,
  "nome" varchar(70) NOT NULL,
  "descricao" varchar(200) DEFAULT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "tipo_empreendimentos" (
  "id" serial PRIMARY KEY,
  "nome" varchar(70) NOT NULL,
  "descricao" varchar(200) DEFAULT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "tipo_cargos" (
  "id" serial PRIMARY KEY,
  "nome" varchar(70) NOT NULL,
  "descricao" varchar(200) DEFAULT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "tipo_areas" (
  "id" serial PRIMARY KEY,
  "nome" varchar(70) NOT NULL,
  "descricao" varchar(200) DEFAULT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE "tipo_vendas" (
  "id" serial PRIMARY KEY,
  "nome" varchar(70) NOT NULL,
  "descricao" varchar(200) DEFAULT NULL,
  "created_at" timestamp DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp DEFAULT CURRENT_TIMESTAMP
);

-- Relações entre Tabelas

ALTER TABLE "projetos" ADD FOREIGN KEY ("gestor_id") REFERENCES "clientes" ("id");
ALTER TABLE "projetos" ADD FOREIGN KEY ("contrato_id") REFERENCES "contratos" ("id");
ALTER TABLE "projetos" ADD FOREIGN KEY ("responsavel_id") REFERENCES "funcionarios" ("id");
--
ALTER TABLE "funcionarios" ADD FOREIGN KEY ("pessoa_id") REFERENCES "pessoas" ("id");
--
ALTER TABLE "clientes" ADD FOREIGN KEY ("empresa_id") REFERENCES "empresas" ("id");
ALTER TABLE "clientes" ADD FOREIGN KEY ("pessoa_id") REFERENCES "pessoas" ("id");
--
ALTER TABLE "contratos" ADD FOREIGN KEY ("empresa_id") REFERENCES "empresas" ("id");
ALTER TABLE "contratos" ADD FOREIGN KEY ("gestor_id") REFERENCES "clientes" ("id");
ALTER TABLE "contratos" ADD FOREIGN KEY ("responsavel_id") REFERENCES "clientes" ("id");
--
ALTER TABLE "ativos" ADD FOREIGN KEY ("contrato_id") REFERENCES "contratos" ("id");
ALTER TABLE "etapas" ADD FOREIGN KEY ("projeto_id") REFERENCES "projetos" ("id");
ALTER TABLE "etapas" ADD FOREIGN KEY ("empreendimento_id") REFERENCES "empreendimentos" ("id");
--
ALTER TABLE "subetapas" ADD FOREIGN KEY ("etapa_id") REFERENCES "etapas" ("id");
--
ALTER TABLE "empreendimentos" ADD FOREIGN KEY ("empresa_id") REFERENCES "empresas" ("id");
--
ALTER TABLE "prorrogados" ADD FOREIGN KEY ("prazo_id") REFERENCES "prazos" ("id");

-- Relações de Tipologia

ALTER TABLE "projetos" ADD FOREIGN KEY ("tipo_entrega_id") REFERENCES "tipo_entregas" ("id");
ALTER TABLE "projetos" ADD FOREIGN KEY ("tipo_recorrencia_id") REFERENCES "tipo_recorrencias" ("id");
--
ALTER TABLE "empresas" ADD FOREIGN KEY ("tipo_area_id") REFERENCES "tipo_areas" ("id");
--
ALTER TABLE "empreendimentos" ADD FOREIGN KEY ("tipo_empreendimento_id") REFERENCES "tipo_empreendimentos" ("id");
--
ALTER TABLE "etapas" ADD FOREIGN KEY ("tipo_recorrencia_id") REFERENCES "tipo_recorrencias" ("id");
ALTER TABLE "etapas" ADD FOREIGN KEY ("tipo_entrega_id") REFERENCES "tipo_entregas" ("id");
--
ALTER TABLE "ativos" ADD FOREIGN KEY ("tipo_venda_id") REFERENCES "tipo_vendas" ("id");
--
ALTER TABLE "prazos" ADD FOREIGN KEY ("tipo_status_id") REFERENCES "tipo_status" ("id");
--
ALTER TABLE "clientes" ADD FOREIGN KEY ("tipo_cargo_id") REFERENCES "tipo_cargos" ("id");
--
ALTER TABLE "funcionarios" ADD FOREIGN KEY ("tipo_cargo_id") REFERENCES "tipo_cargos" ("id");