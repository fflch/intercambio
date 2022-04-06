### Models:

- <b>Country</b>
- <b>Instituição</b>
- <b>Pedido</b>
- <b>File</b>
- <b>Disciplina</b>
<br>

## Country
<p>Para dar início ao projeto, na aba ‘Países’ (Somente aberta para os usuários registrados como Admin), devemos cadastrar todos países que poderão ser utilizados para realizamentos de pedidos, nesta página você poderá clicar no país e nele incluir novas <b>Instituições</b>, além de alterar e excluir os países listados.</p><br>

## Instituição
<p>Como antes apresentado, a Instituição deverá ser cadastrada dentro de um <b>Country(País)</b>, para futuramente ser vinculada no <b>Pedido</b>. Estas universidades, também poderão ser deletadas ou atualizadas pela CCINT.</p><br>
  
## Pedido
<p>O pedido é a base de todo WorkFlow do sistema, começando na aba “Nova Solicitação”, onde deve ser selecionado a <b>Instituição</b> e em sequência um index de um <b>File</b> que comprove o estudo do aluno no local. Além de salvar o ID do usuário que servirá para guardar o codpes, nome e curso do mesmo. Por fim temos também o campo ‘Status’ que ditará a funcionalidade das <b>Disciplinas</b>.</p><br>
<p>Sobre os status, logo após um pedido ser cadastrado ele estará no estado de “Em elaboração”, assim sendo o momento que o aluno poderá ver o formulário de cadastro de <b>Disciplinas</b> e a opção de poder alterar seu <b>Pedido</b>, caso enviado algum documento errado.</p><br>
<p>O status “Em análise" é quando o aluno não consegue mais interagir com o pedido e somente ver as alterações feitas, já os admins poderão checar as <b>Disciplinas</b> colocadas pelo aluno para poder conferir a compatibilidade do que foi enviado.</p><br>
<p>O último status é  “Finalizado”, ele será alterado quando todas as <b>Disciplinas</b> tiverem sido avaliadas independente do sucesso ou não da avaliação. Caso, ocorra algum indeferimento no pedido, o aluno poderá novamente alterá-lo para algum tipo de correção.</p><br>
<p>Ainda nos pedidos, podemos notar que possuímos duas abas de index, a “Pedidos” que aparecerá somente para os admins, listando todos os pedidos do sistema que poderão ser pesquisados por status e codpes do aluno. Também a aba “Meus Pedidos”, que somente aparecerá caso a pessoa seja um aluno e listará os pedidos daquele que logou no sistema.</p><br>

## File
<p>Este model serve somente para salvar e vincular os arquivos à um pedido, sua alteração é feita junta dos updates do <b>Pedido</b> e excluído em cascata se o mesmo for apagado. </p><br>

## Disciplinas
<p>A segunda parte mais importante de todo o workflow são as disciplinas, estas que estarão sempre vinculadas a um <b>Pedido</b>. Seu formulário de cadastro só aparecerá no momento em que o Pedido estiver com status “Em elaboração”, neste mesmo form poderá ser guardada informações como nome da matéria no exterior, nota, carga horária, tipo da disciplina (Obrigatória, Optativa Eletiva, Optativa Livre), onde dependente da escolha poderá alterar o cadastro de informações, pois as Disciplinas Obrigatórias necessitam de uma ementa que comprove as informações passadas, enquanto o anexo desta ementa seria optativa para os outros tipos, além do campo Codigo USP que é único para Obrigatórias, já que o aluno deverá corresponder a matéria do exterior para alguma da USP.</p><br>
<p>Por fim ainda temos mais o campo do Comentário e os Status que estão atrelados a biblioteca <b>Statuses</b>, eles serão a forma de prosseguir e corrigir qualquer erro futuro na disciplina.</p><br>
<p>Para exemplificar vemos que as disciplinas começam todas em status de “Em elaboração” onde poderão somente ser excluídas de um pedido pelo aluno.</p><br>
<p>Quando o aluno enviar o <b>Pedido</b> as disciplinas irão receber o mesmo status que será “Análise”, onde poderão ser alteradas somente pelos admins. Assim caso ocorra alguma incongruência, a CCINT poderá alterar o status para “Indeferido”, tendo que obrigatoriamente atualizar o campo comentário, explicando o motivo. Esse comentário que poderá ser visualizado pelo aluno e respondido pelo mesmo para a possibilidade de correção do problema.</p><br>
<p>Agora, caso esteja tudo correto o status poderá ser alterado para "Deferido", será obrigatório uma conversão de valores pela CCINT em disciplinas marcadas onde o campo "tipo" seja Optativas (ambas), essa conversão se baseia em passar os valores da nota estrangeira para os da USP.</p><br>
<p>Quando todas disciplinas forem atualizadas, o <b>Pedido</b> será “Finalizado” e dará fim ao momento atual da etapa virtual para a CCINT.</p>


## Notas para desenvolvedores
</br>

### Alteração nas mensagens padrões de e-mail
<p>As mensagens enviadas por e-mail do sistema podem ser editadas na página de configurações, entretanto há as mensagens padrões salvas em .txt na pasta 'database/settings/defaults'. Essas mensagens são gerenciadas através da biblioteca [Spatie/Laravel-Settings] (https://github.com/spatie/laravel-settings).
Para adicionar novas mensagens é preciso criar um atributo na classe 'app/Service/GeneralSettings.php', e atribuir um valor para ele através do arquivo .txt dentro da pasta indicada acima, para relacionar o conteúdo do arquivo ao atributo crie uma migration em 'database/settings' 'php artisan make:settings-migration MigrationName' e por fim rodar o comando 
```
php artisan vendor:publish --provider="Spatie\LaravelSettings\LaravelSettingsServiceProvider" --tag="migrations"
php artisan migrate
```
</p><br>
