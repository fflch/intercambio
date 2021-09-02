### Models:

- <b>[Country]</b>
- <b>[Instituição]</b>
- <b>[Pedido]</b>
- <b>[File]</b>
- <b>[Disciplina]</b>
<br>

## Country
Para dar início ao projeto na aba ‘Países’ (Somente aberta para os usuários registrados como Admin), devemos cadastrar todos países que poderão ser utilizados para cadastros de pedidos, nesta página você poderá clicar no país e nele incluir novas <b>Instituições</b>, além de alterar e excluir os países listados.<br>

## Instituição
Como antes apresentado, a Instituição deverá ser cadastrada dentro de um <b>Country(País)</b>, para futuramente ser vinculada no <b>Pedido</b>. Estas universidades, também poderão ser deletadas ou atualizadas pela CCINT.<br>
  
## Pedido
O pedido é o início de todo WorkFlow do sistema, na aba “Nova Solicitação” deve ser selecionado a <b>Instituição</b> e em sequência um index de um <b>File</b> que comprove o estudo do aluno no local. Além de salvar o ID do usuário que servirá para guardar o codpes, nome e curso do mesmo. Por fim temos também o campo ‘Status’ que ditará a funcionalidade das <b>Disciplinas</b><br>.
Sobre os status, logo após um pedido ser cadastrado ele estará no estado de “Em elaboração”, assim sendo o momento que o aluno poderá ver o formulário de cadastro de <b>Disciplinas</b> e a opção de poder alterar seu <b>Pedido</b>, caso enviado algum documento errado<br>.
O status “Em análise" é quando o aluno não consegue mais interagir com o pedido e somente ver as alterações feitas, já os admins poderão checar as <b>Disciplinas</b> colocadas pelo aluno para poder conferir a compatibilidade do que foi enviado.<br>
O último status é  “Finalizado”, ele será alterado quando todas as <b>Disciplinas</b> tiverem sido avaliadas independente do sucesso ou não da avaliação. Caso, ocorra algum indeferimento e finalize o pedido o aluno poderá novamente alterá-lo para algum tipo de correção.<br>
Ainda nos pedidos, podemos notar que possuímos duas abas de index, a “Pedidos” que aparecerá somente para os admins, listando todos os pedidos do sistema que poderão ser pesquisados por status e codpes do aluno. A aba “Meus Pedidos” somente aparecerá caso a pessoa seja um aluno e somente listará os pedidos daquele que logou no sistema.<br>

## File
Este model serve somente para salvar e vincular os arquivos à um pedido.<br>

## Disciplinas
A segunda parte mais importante de todo o workflow são as disciplinas, estas que estarão sempre vinculadas a um <b>Pedido</b>. Seu formulário de cadastro só aparecerá no momento em que o Pedido estiver com status “Em elaboração”, neste mesmo form poderá ser guardada informações como nome da matéria no exterior, nota, carga horária, tipo da disciplina (Obrigatória, Optativa Eletiva, Optativa Livre), que dependente da escolha poderá alterar o cadastro de informações, pois as Disciplinas Obrigatórias necessitam de uma ementa que comprove as informações passadas, enquanto o anexo desta ementa seria optativa para os outros tipos, além do campo Codigo USP que é único para Obrigatórias, já que o aluno deverá corresponder a matéria do exterior para alguma da USP.<br>
Por fim ainda temos mais o campo do Comentário e os Status que estão atrelados a biblioteca <b>Statuses</b>, eles serão a forma de prosseguir e corrigir qualquer erro futuro na disciplina.<br>
Para exemplificar vemos que as disciplinas começam todas em status de “Em elaboração” onde poderão somente ser excluídas de um pedido pelo aluno.<br>
Quando o aluno enviar o <b>.Pedido</b> as disciplinas irão receber o mesmo status que será “Análise”, onde poderão ser alteradas somente pelos admins, assim caso ocorra de alguma incongruência a CCINT poderá alterar o status para “Indeferido”, tendo que obrigatoriamente atualizar o campo comentário, explicando o motivo, esse comentário que poderá ser visualizado pelo aluno e respondido pelo mesmo para a possibilidade de correção do problema.<br>
Agora, caso esteja tudo correto o status poderá ser alterado para "Deferido", será obrigatório uma conversão de valores pela CCINT em disciplinas marcadas como Optativas(ambas), essa conversão se baseia em passar os valores da nota estrangeira para os da USP.<br>
Quando todas disciplinas forem atualizadas, o <b>Pedido</b> será “Finalizado” e dará fim ao momento atual da etapa virtual para a CCINT.
