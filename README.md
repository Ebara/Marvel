# Marvel
 Teste feito para validar conhecimentos em PHP utilizando Laravel e conexões API com Guzzle.
 
## O que foi utilizado
  - PHP 7.3
  - Laravel 8

## Como o projeto foi desenvolvido
 Foram criadas duas rotas:
  - Uma para listagem de quadrinhos (/projects/comics)
  - Outra para detalhes dos quadrinhos (/projects/comics/{ID})
 
 Foi criada uma controller com um método separado para fazer a conexão com a API, visando centralizar está conexão.
 E este método devolve um objeto que é retornado para as views com as informações solicitadas.
