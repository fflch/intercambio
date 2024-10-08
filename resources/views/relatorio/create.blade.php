@extends('main')
@section('content')

<div class="container">
  <h2>Formulário de Relatório de Intercâmbio</h2>
  <form method="POST" action="{{ route('salvar.relatorio', $pedido->id) }}">
    @csrf
    <br>
    <div class="form-group">
      <label for="autorizacao">Você autoriza a divulgação do seu relatório para outros estudantes da FFLCH (no site da CCInt)?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="autorizacao" id="simnomecontato" value="simnomecontato">
        <label class="form-check-label" for="simnomecontato">Sim, com meu nome e contato</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="autorizacao" id="simnome" value="simnome">
        <label class="form-check-label" for="simnome">Sim, apenas com meu nome</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="autorizacao" id="sim" value="sim">
        <label class="form-check-label" for="sim">Sim, sem meu nome e contato</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="autorizacao" id="nao" value="nao">
        <label class="form-check-label" for="nao">Não</label>
      </div>
      <br><br>
      <label for="periodo">Qual foi o período do intercâmbio:</label>
      <input type="text" id="periodo" name="periodo" class="form-control">
    </div>

    <div class="form-group">
      <label for="pescolhadestino">Como foi o processo de escolha da instituição de destino? Por que você escolheu ir para essa universidade?</label><br>
      <textarea id="pescolhadestino" name="pescolhadestino" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="pvisto">Como foi o processo de solicitação do visto? Teve que traduzir algum documento? Teve que viajar para outro estado? Qual foi o prazo para emissão?</label><br>
      <textarea id="pvisto" name="pvisto" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="questoesbancarias">Como resolveu as questões bancárias (câmbio, VTM, envio de dinheiro para o exterior)?</label><br>
      <textarea id="questoesbancarias" name="questoesbancarias" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="segurosaude">Você contratou seguro-saúde?</label><br>
      <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="segurosaude" id="segurosaude_sim" value="1">
          <label class="form-check-label" for="segurosaude_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="segurosaude" id="segurosaude_nao" value="0">
          <label class="form-check-label" for="segurosaude_nao">Não</label>
      </div>
    </div>

    <div class="form-group segurosauderec" id="div_segurosauderec">
      <label for="segurosauderec">Tem alguma indicação?</label><br>
      <textarea id="segurosauderec" name="segurosauderec" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label>Conseguiu comprar passagens mais baratas?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="passagens" id="passagens_sim" value="1">
        <label class="form-check-label" for="passagens_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="passagens" id="passagens_nao" value="0">
        <label class="form-check-label" for="passagens_nao">Não</label>
      </div>
    </div>

    <div class="form-group passagensrec" id="div_passagensrec">
      <label for="passagensrec">Como?</label><br>
      <textarea id="passagensrec" name="passagensrec" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group oferecimentomoradia" id="div_oferecimentomoradia">
      <label for ="oferecimentomoradia">A universidade ofereceu moradia estudantil?
      </label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="oferecimentomoradia" id="oferecimentomoradia_sim" value="1">
        <label class="form-check-label" for="oferecimentomoradia_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="oferecimentomoradia" id="oferecimentomoradia_nao" value="0">
        <label class="form-check-label" for="oferecimentomoradia_nao">Não</label>
      </div>
    </div>

    <div class="form-group moradia" id="div_moradia">
      <label for="moradia">você morou nela?
      </label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="moradia" id="moradia_sim" value="1">
        <label class="form-check-label" for="moradia_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="moradia" id="moradia_nao" value="0">
        <label class="form-check-label" for="moradia_nao">Não</label>
      </div>
    </div>

    <div class="form-group moradiaexp" id="div_moradiaexp">
      <label for="moradiaexp">Conte detalhes sobre a moradia institucional:</label><br>
      <textarea id="moradiaexp" name="moradiaexp" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group" id="div_moradiaqnt">
      <label for="moradiaqnt">Morou sozinho?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="moradiaqnt" id="moradiaqnt_sim" value="1">
        <label class="form-check-label" for="moradiaqnt_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="moradiaqnt" id="moradiaqnt_nao" value="0">
        <label class="form-check-label" for="moradiaqnt_nao">Não</label>
      </div>
    </div>

    <div class="form-group" id="div_proximidade">
      <label for="proximidade">A moradia era proxima a instituição?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="proximidade" id="proximidade_sim" value="1">
        <label class="form-check-label" for="proximidade_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="proximidade" id="proximidade_nao" value="0">
        <label class="form-check-label" for="proximidade_nao">Não</label>
      </div>
    </div>

    <div class="form-group" id="div_moradiafora">
      <label for="moradiafora">Como foi a escolha do lugar para morar?</label><br>
      <textarea id="moradiafora" name="moradiafora" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="prepbagagem">Como foi a preparação da bagagem? O que foi essencial levar?
      </label><br>
      <textarea id="prepbagagem" name="prepbagagem" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="conhecimentoprevio">Teve algo que gostaria de ter feito antes de viajar e não fez, ou algo que gostaria de ter conhecimento antes da viagem?</label><br>
        <textarea id="conhecimentoprevio" name="conhecimentoprevio" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="registro">Foi necessário fazer algum registro ao chegar no país?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="registro" id="registro_sim" value="1">
        <label class="form-check-label" for="registro_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="registro" id="registro_nao" value="0">
        <label class="form-check-label" for="registro_nao">Não</label>
      </div>
    </div>

    <div class="form-group registroexp" id="div_registroexp">
      <label for="registroexp">Quais?</label><br>
      <textarea id="registroexp" name="registroexp" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="contabancaria">Precisou abrir conta bancária?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="contabancaria" id="contabancaria_sim" value="1">
        <label class="form-check-label" for="contabancaria_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="contabancaria" id="contabancaria_nao" value="0">
        <label class="form-check-label" for="contabancaria_nao">Não</label>
      </div>
    </div>

    <div class="form-group contabancariaexp" id="div_contabancariaexp">
        <label for="contabancariaexp">Como foi o processo?</label><br>
        <textarea id="contabancariaexp" name="contabancariaexp" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group chip">
      <label for="chip">Adquiriu chip de celular?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="chip" id="chip_sim" value="1">
        <label class="form-check-label" for="chip_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="chip" id="chip_nao" value="0">
        <label class="form-check-label" for="chip_nao">Não</label>
      </div>
    </div>

    <div class="form-group chipexp" id="div_chipexp">
      <label for="chipexp">Como foi o processo?</label><br>
      <textarea id="chipexp" name="chipexp" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="transportepublico">Você utilizava transporte Público?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="transportepublico" id="transportepublico_sim" value="1">
        <label class="form-check-label" for="transportepublico_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="transportepublico" id="transportepublico_nao" value="0">
        <label class="form-check-label" for="transportepublico_nao">Não</label>
      </div>
    </div>

    <div class="form-group descontotransportepublico" id="div_descontotransportepublico">
      <label for=descontotransportepublico>Você tinha algum desconto por ser estudante?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="descontotransportepublico" id="descontotransportepublico_sim" value="1">
        <label class="form-check-label" for="descontotransportepublico_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="descontotransportepublico" id="descontotransportepublico_nao" value="0">
        <label class="form-check-label" for="descontotransportepublico_nao">Não</label>
      </div>
    </div>

    <div class="form-group descontotransportepublicoexp" id="div_descontotransportepublicoexp">
      <label for="descontotransportepublicoexp">Como era o desconto?</label><br>
      <textarea id="descontotransportepublicoexp" name="descontotransportepublicoexp" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="orientacao">Houve alguma reunião de orientação ao chegar na faculdade estrangeira?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="orientacao" id="orientacao_sim" value="1">
        <label class="form-check-label" for="orientacao_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="orientacao" id="orientacao_nao" value="0">
        <label class="form-check-label" for="orientacao_nao">Não</label>
      </div>
    </div>

    <div class="form-group orientacaoexp" id="div_orientacaoexp">
      <label for="orientacaoexp">Como foi a orientação?</label><br>
      <textarea id="orientacaoexp" name="orientacaoexp" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group cursoidioma" id="div_cursoidioma">
      <label for="cursoidioma">A universidade ofereceu algum curso de idiomas?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="cursoidioma" id="cursoidioma_sim" value="1">
        <label class="form-check-label" for="cursoidioma_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="cursoidioma" id="cursoidioma_nao" value="0">
        <label class="form-check-label" for="cursoidioma_nao">Não</label>
      </div>
    </div>

    <div class="form-group cursoidiomagratuidade" id="div_cursoidiomagratuidade">
      <label for="cursoidiomagratuidade">O curso era gratuito?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="cursoidiomagratuidade" id="cursoidiomagratuidade_sim" value="1">
        <label class="form-check-label" for="cursoidiomagratuidade_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="cursoidiomagratuidade" id="cursoidiomagratuidade_nao" value="0">
        <label class="form-check-label" for="cursoidiomagratuidade_nao">Não</label>
      </div>
    </div>

    <div class="form-group cursoidiomavalor" id="div_cursoidiomavalor">
      <label for="cursoidiomavalor">Qual era o Valor:</label><br>
      <input type="text" id="cursoidiomavalor" name="cursoidiomavalor" class="form-control">
    </div>

    <div class="form-group">
      <label for="matricula">Como foi a matrícula nas matérias de interesse?</label><br>
      <textarea id="matricula" name="matricula" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="aulasantes">Você pode assistir as aulas antes de se matricular?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="aulasantes" id="aulasantes_sim" value="1">
        <label class="form-check-label" for="aulasantes_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="aulasantes" id="aulasantes_nao" value="0">
        <label class="form-check-label" for="aulasantes_nao">Não</label>
      </div>
    </div>

    <div class="form-group restauranteuniversitario" id="div_restauranteuniversitario">
      <label for="restauranteuniversitario">A universidade possuía restaurante universitário?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="restauranteuniversitario" id="restauranteuniversitario_sim" value="1">
        <label class="form-check-label" for="restauranteuniversitario_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="restauranteuniversitario" id="restauranteuniversitario_nao" value="0">
        <label class="form-check-label" for="restauranteuniversitario_nao">Não</label>
      </div>
    </div>

    <div class="form-group restauranteuniversitariovalor" id="div_restauranteuniversitariovalor">
      <label for="restauranteuniversitariovalor">Quanto era?</label><br>
      <textarea id="restauranteuniversitariovalor" name="restauranteuniversitariovalor" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group restauranteacessivel" id="div_restauranteacessivel">
      <label for="restauranteacessivel">O valor era acessível para você?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="restauranteacessivel" id="restauranteacessivel_sim" value="1">
        <label class="form-check-label" for="restauranteacessivel_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="restauranteacessivel" id="restauranteacessivel_nao" value="0">
        <label class="form-check-label" for="restauranteacessivel_nao">Não</label>
      </div>
    </div>

    <div class="form-group taxaadm" id="div_taxaadm">
      <label for="taxaadm">Você teve que pagar alguma taxa administrativa?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="taxaadm" id="taxaadm_sim" value="1">
        <label class="form-check-label" for="taxaadm_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="taxaadm" id="taxaadm_nao" value="0">
        <label class="form-check-label" for="taxaadm_nao">Não</label>
      </div>
    </div>

    <div class="form-group taxaadmexp" id="div_taxaadmexp">
      <label for="taxaadmexp">Qual/Quais?</label><br>
      <textarea id="taxaadmexp" name="taxaadmexp" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="expacademica">Nos conte como foi sua experiência acadêmica (provas, trabalhos, aulas, relação com os professores, etc) e o grau de exigência na universidade estrangeira.</label><br>
      <textarea id="expacademica" name="expacademica" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group programaamizade" id="div_programaamizade">
      <label for="programaamizade">A universidade possui algum programa como o “USP I-Friend” ou similar?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="programaamizade" id="programaamizade_sim" value="1">
        <label class="form-check-label" for="programaamizade_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="programaamizade" id="programaamizade_nao" value="0">
        <label class="form-check-label" for="programaamizade_nao">Não</label>
      </div>
    </div>

    <div class="form-group programaamizadeexp" id ="div_programaamizadeexp">
      <label for="programaamizadeexp">Como era o programa?</label><br>
      <textarea id="programaamizadeexp" name="programaamizadeexp" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group dificuldadeacompanhamento" id="div_dificuldadeacompanhamento">
      <label for="dificuldadeacompanhamento">Teve alguma dificuldade inicial em acompanhar as aulas?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="dificuldadeacompanhamento" id="dificuldadeacompanhamento_sim" value="1">
        <label class="form-check-label" for="dificuldadeacompanhamento_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="dificuldadeacompanhamento" id="dificuldadeacompanhamento_nao" value="0">
        <label class="form-check-label" for="dificuldadeacompanhamento_nao">Não</label>
      </div>
    </div>

    <div class="form-group dificuldadeacompanhamentoexp" id="div_dificuldadeacompanhamentoexp">
      <label for="dificuldadeacompanhamentoexp">Quais foram elas?</label><br>
      <textarea id="dificuldadeacompanhamentoexp" name="dificuldadeacompanhamentoexp" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group dificuldadeidioma" id="div_dificuldadeidioma">
      <label for="dificuldadeidioma">Teve dificuldade com o Idioma?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="dificuldadeidioma" id="dificuldadeidioma_sim" value="1">
        <label class="form-check-label" for="dificuldadeidioma_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="dificuldadeidioma" id="dificuldadeidioma_nao" value="0">
        <label class="form-check-label" for="dificuldadeidioma_nao">Não</label>
      </div>
    </div>

    <div class="form-group dificuldadeidiomaexp" id="div_dificuldadeidiomaexp">
      <label for="dificuldadeidiomaexp">Quais foram as dificuldades com o idioma?</label><br>
      <textarea id="dificuldadeidiomaexp" name="dificuldadeidiomaexp" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="adaptacao">Como foi sua adaptação (cultural, social, etc)?</label><br>
      <textarea id="adaptacao" name="adaptacao" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="dificuldades">Quais foram suas maiores dificuldades durante o intercâmbio?</label><br>
      <textarea id="dificuldades" name="dificuldades" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group atvintegracao" id="div_atvintegracao">
      <label for="atvintegracao">A universidade realiza atividades para integração dos alunos estrangeiros?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="atvintegracao" id="atvintegracao_sim" value="1">
        <label class="form-check-label" for="atvintegracao_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="atvintegracao" id="atvintegracao_nao" value="0">
        <label class="form-check-label" for="atvintegracao_nao">Não</label>
      </div>
    </div>

    <div class="form-group atvintegracaoexp" id="div_atvintegracaoexp">
      <label for="atvintegracaoexp">Quais eram as atividades?</label><br>
      <textarea id="atvintegracaoexp" name="atvintegracaoexp" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group bolsa" id="div_bolsa">
      <label for="bolsa">Você recebeu algum tipo de bolsa?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="bolsa" id="bolsa_sim" value="1">
        <label class="form-check-label" for="bolsa_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="bolsa" id="bolsa_nao" value="0">
        <label class="form-check-label" for="bolsa_nao">Não</label>
      </div>
    </div>

    <div class="form-group bolsasuf" id="bolsasuf">
      <label for="bolsasuf">Ela foi suficiente para se manter durante o intercâmbio?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="bolsasuf" id="bolsasuf_sim" value="1">
        <label class="form-check-label" for="bolsasuf_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="bolsasuf" id="bolsasuf_nao" value="0">
        <label class="form-check-label" for="bolsasuf_nao">Não</label>
      </div>
    </div>

    <div class="form-group">
      <label for="gastomensal">Qual era o gasto médio mensal (alimentação, transporte, moradia, livros, etc)?</label><br>
      <textarea id="gastomensal" name="gastomensal" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="atvremunerada">Você exerceu algum tipo de atividade remunerada durante o intercâmbio?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="atvremunerada" id="atvremunerada_sim" value="1">
        <label class="form-check-label" for="atvremunerada_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="atvremunerada" id="atvremunerada_nao" value="0">
        <label class="form-check-label" for="atvremunerada_nao">Não</label>
      </div>
    </div>

    <div class="form-group atvremuneradaexp">
      <label for="atvremuneradaexp">Qual? Como era?</label><br>
      <textarea id="atvremuneradaexp" name="atvremuneradaexp" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="dicas">Quais dicas/sugestões você daria para os alunos da FFLCH interessados em fazer intercâmbio nessa universidade/país? O que fazer? O que não fazer?</label><br>
      <textarea id="dicas" name="dicas" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
@endsection

@section('javascripts_bottom')
<script>
    // Adiciona um evento de escuta para os rádios "Sim" e "Não"
    document.querySelectorAll('input[name="segurosaude"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('segurosaude_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_segurosauderec').style.display = 'block';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_segurosauderec').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="passagens"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('passagens_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_passagensrec').style.display = 'block';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_passagensrec').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="oferecimentomoradia"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('oferecimentomoradia_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_moradia').style.display = 'block';
                document.getElementById('div_moradiaexp').style.display = 'none';
                document.getElementById('div_moradiaqnt').style.display = 'none';
                document.getElementById('div_proximidade').style.display = 'none';
                document.getElementById('div_moradiafora').style.display = 'none';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_moradia').style.display = 'none';
                document.getElementById('div_moradiaexp').style.display = 'none';
                document.getElementById('div_moradiaqnt').style.display = 'block';
                document.getElementById('div_proximidade').style.display = 'block';
                document.getElementById('div_moradiafora').style.display = 'block';
            }
        });
    });

    document.querySelectorAll('input[name="moradia"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('moradia_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_moradiaexp').style.display = 'block';
                document.getElementById('div_moradiaqnt').style.display = 'block';
                document.getElementById('div_proximidade').style.display = 'block';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_moradiaexp').style.display = 'none';
                document.getElementById('div_moradiaqnt').style.display = 'block';
                document.getElementById('div_proximidade').style.display = 'block';
                document.getElementById('div_moradiafora').style.display = 'block';
            }
        });
    });

    document.querySelectorAll('input[name="registro"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('registro_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_registroexp').style.display = 'block';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_registroexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="contabancaria"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('contabancaria_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_contabancariaexp').style.display = 'block';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_contabancariaexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="chip"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('chip_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_chipexp').style.display = 'block';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_chipexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="transportepublico"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('transportepublico_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_descontotransportepublico').style.display = 'block';
                document.getElementById('div_descontotransportepublicoexp').style.display = 'none';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_descontotransportepublico').style.display = 'none';
                document.getElementById('div_descontotransportepublicoexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="descontotransportepublico"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('descontotransportepublico_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_descontotransportepublicoexp').style.display = 'block';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_descontotransportepublicoexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="orientacao"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('orientacao_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_orientacaoexp').style.display = 'block';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_orientacaoexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="cursoidioma"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('cursoidioma_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_cursoidiomagratuidade').style.display = 'block';
                document.getElementById('div_cursoidiomavalor').style.display = 'none';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_cursoidiomagratuidade').style.display = 'none';
                document.getElementById('div_cursoidiomavalor').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="cursoidiomagratuidade"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('cursoidiomagratuidade_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_cursoidiomavalor').style.display = 'none';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_cursoidiomavalor').style.display = 'block';
            }
        });
    });

    document.querySelectorAll('input[name="restauranteuniversitario"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('restauranteuniversitario_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_restauranteuniversitariovalor').style.display = 'block';
                document.getElementById('div_restauranteacessivel').style.display = 'block';
            } else {
                document.getElementById('div_restauranteuniversitariovalor').style.display = 'none';
                document.getElementById('div_restauranteacessivel').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="taxaadm"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('taxaadm_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_taxaadmexp').style.display = 'block';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_taxaadmexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="programaamizade"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('programaamizade_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_programaamizadeexp').style.display = 'block';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_programaamizadeexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="dificuldadeacompanhamento"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('dificuldadeacompanhamento_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_dificuldadeacompanhamentoexp').style.display = 'block';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_dificuldadeacompanhamentoexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="dificuldadeidioma"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('dificuldadeidioma_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_dificuldadeidiomaexp').style.display = 'block';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_dificuldadeidiomaexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="atvintegracao"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('atvintegracao_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_atvintegracaoexp').style.display = 'block';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_atvintegracaoexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="bolsa"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Verifica se o rádio "Sim" está selecionado
            if (document.getElementById('bolsa_sim').checked) {
                // Mostra a div de indicação
                document.getElementById('div_bolsasuf').style.display = 'block';
            } else {
                // Esconde a div de indicação se "Não" estiver selecionado ou nenhum estiver selecionado
                document.getElementById('div_bolsasuf').style.display = 'none';
            }
        });
    });


    // Verifica o estado inicial dos rádios ao carregar a página
    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('segurosaude_sim').checked) {
            document.getElementById('div_segurosauderec').style.display = 'none';
        }

    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('passagens_sim').checked) {
            document.getElementById('div_passagensrec').style.display = 'none';
        }
    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('oferecimentomoradia_sim').checked) {
            document.getElementById('div_moradia').style.display = 'none';
            document.getElementById('div_moradiaexp').style.display = 'none';
            document.getElementById('div_moradiaqnt').style.display = 'none';
            document.getElementById('div_proximidade').style.display = 'none';
            document.getElementById('div_moradiafora').style.display = 'none';

        }
    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('moradia_sim').checked) {
            document.getElementById('div_moradiaexp').style.display = 'none';
            document.getElementById('div_moradiaqnt').style.display = 'none';
            document.getElementById('div_proximidade').style.display = 'none';
            document.getElementById('div_moradiafora').style.display = 'none';

        }
    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('registro_sim').checked) {
            document.getElementById('div_registroexp').style.display = 'none';
        }
    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('contabancaria_sim').checked) {
            document.getElementById('div_contabancariaexp').style.display = 'none';
        }
    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('chip_sim').checked) {
            document.getElementById('div_chipexp').style.display = 'none';
        }
    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('transportepublico_sim').checked) {
            document.getElementById('div_descontotransportepublico').style.display = 'none';
            document.getElementById('div_descontotransportepublicoexp').style.display = 'none';
        }
    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('descontotransportepublico_sim').checked) {
            document.getElementById('div_descontotransportepublicoexp').style.display = 'none';
        }
    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('orientacao_sim').checked) {
            document.getElementById('div_orientacaoexp').style.display = 'none';
        }
    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('cursoidioma_sim').checked) {
            document.getElementById('div_cursoidiomagratuidade').style.display = 'none';
            document.getElementById('div_cursoidiomavalor').style.display = 'none';
        }
    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('cursoidiomagratuidade_sim').checked) {
            document.getElementById('div_cursoidiomavalor').style.display = 'none';
        }
    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('restauranteuniversitario_sim').checked) {
            document.getElementById('div_restauranteuniversitariovalor').style.display = 'none';
            document.getElementById('div_restauranteacessivel').style.display = 'none';
        }
    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('taxaadm_sim').checked) {
            document.getElementById('div_taxaadmexp').style.display = 'none';
        }

    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('programaamizade_sim').checked) {
            document.getElementById('div_programaamizadeexp').style.display = 'none';
        }

    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('dificuldadeacompanhamento_sim').checked) {
            document.getElementById('div_dificuldadeacompanhamentoexp').style.display = 'none';
        }

    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('dificuldadeidioma_sim').checked) {
            document.getElementById('div_dificuldadeidiomaexp').style.display = 'none';
        }

    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('atvintegracao_sim').checked) {
            document.getElementById('div_atvintegracaoexp').style.display = 'none';
        }

    });

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('bolsa_sim').checked) {
            document.getElementById('div_bolsasuf').style.display = 'none';
        }

    });

</script>
@endsection
