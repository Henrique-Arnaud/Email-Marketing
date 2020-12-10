# Funcionalidades 


Enviar um email marketing podendo 
* Escolher um modelo (cada modelo vai ser uma arte)
* Subir um CSV com contatos e salvar em uma tabela
* Escolher uma TAG ( evento no caso)
* Digitar no envio Assunto
* Digitar no envio copia para outro email


***Se possivel***


* Cadastrar modelos de email
* Editar modelo de email
* Editar configurações de envio



Sistema de envio de emails - marketing

Modelo Abrangente

Sistema que possibilita envio de emails personalizados por cliente, com seus respectivos modelos, onde podemos subir uma lista de contatos.

Features

Tela de Eventos : 

Tela upload de listas de emails(poder escolher evento)

Tela para personalizar o email/modelo
	
Tela de envio de email

Registro de listas, envios, clicados, lidos, recebidos, confirmados

Gravar modelos personalizados	

Criar tabela Configuracoes com os seguintes campos : Host,login/email,porta,senha e o evento

Tela de Listagem de Contatos 



# Detalhamento  


# Telas


Tela de Eventos : Implementar uma tela que exiba os eventos disponíveis (cadastrados no banco de dados) e possibilite a escolha de um para a visualização de todos os contatos de email cadastrados para o evento.

---

Tela upload de listas de emails(poder escolher evento): Implementar uma tela que realize o upload de uma lista de contatos .csv, que conterá nome, email e o evento que irá participar, para então, inserir esses dados no banco de dados. 

---

Tela de configuração de eventos: Implementar um tela de Configuração de Servidor de envio(SMTP) que contenha os seguintes campos: Host,login/email,porta,senha e o evento com a possibilidade de Salvar na tabela de configuracoes no banco de dados, pondendo escolher o evento, e posteriormente editar esse registro. 
		
---

Tela para personalizar o email/modelo: Implementar uma página que realize uploads de documentos .html (modelo de email) e das imagens utilizadas no modelo para o evento selecionado.

---	

Tela de envio de email: desenvolver uma tela que possibilita o teste de envio dos emails a serem enviados para os convidados, tendo também a função de enviar emails de acordo com o evento e suas configurações preestabelecidas.


* Colocar emails testes: Possibilitar a inserção de listas .csv de emails para fins de teste, salvando-os em uma tabela de usuarios_teste no banco de dados. 

* Fazer testes: desenvolver uma tela que envie emails testes a partir de nossa configuração smtp para emails testes inseridos no banco de dados na etapa anterior, utilizando um modelo personalizado de email.

* Enviar o email: Função de enviar o email de acordo com o evento selecionado.


# Banco de dados

Registro de listas, envios, clicados, lidos, recebidos, confirmados


Gravar modelos personalizados

Criar tabela Configuracoes com os seguintes campos : Host,login/
email,porta,senha e o evento

Tela de Listagem de Contatos 
	
