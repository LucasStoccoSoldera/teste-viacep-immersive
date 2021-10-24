<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


<img src="public\img\projeto_viacep.png" alt="API ViaCEP">

> Aplicação simples para consumir o Web Service ViaCEP e funcionar também como uma API.

## **Projeto**
As funcionalidades do projeto desenvolvidas são:

- [x] Utilização de Boostrap para design do layout.
- [x] Utilização de migrations para criação do banco de dados.
- [x] Cadastro de CEP manualmente.
- [x] Cadastro de CEP utilizando o Web Service ViaCEP, preenchendo apenas o CEP.
- [x] Possibilidade de alterar entre as duas opções através de radio button.
- [x] Validações de obrigatoriedade, CEP único no banco, e validação de exitência do CEP no ViaCEP. Retornando a mensagem em resumo e individualmente nos campos.
- [x] Inserção de DataTable capaz de cumprir com o modelo de tabela, paginação por itens, e ordenação das colunas.
- [x] Deleção dos registros clicando em botão na tabela, inserido como complementar a confirmação da exclusão.
- [x] Tarefas adicionais cumpridas.
- [x] Direcionamento por endpoint GET /cep/{cep}, validando as regras e retornando os Jsons corretamente.
