@extends('main')
@section('content')

<div class="container">
  <h2>Formulário de Relatório de Intercâmbio</h2>
  <form method="POST" action="{{ route('salvar.relatorio', $pedido->id) }}">
    @csrf
    <br>
    <div class="form-group">
      <label for="autorizacao">Você autoriza a divulgação do seu relatório para outros estudantes da FFLCH (no site da CCInt)?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="autorizacao" id="simnomecontato" value="simnomecontato" @if(old('autorizacao') == 'simnomecontato') checked @endif> 
        <label class="form-check-label" for="simnomecontato">Sim, com meu nome e contato</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="autorizacao" id="simnome" value="simnome" @if(old('autorizacao') == 'simnome') checked @endif>
        <label class="form-check-label" for="simnome">Sim, apenas com meu nome</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="autorizacao" id="sim" value="sim" @if(old('autorizacao') == 'sim') checked @endif>
        <label class="form-check-label" for="sim">Sim, sem meu nome e contato</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="autorizacao" id="nao" value="nao" @if(old('autorizacao') == 'nao') checked @endif>
        <label class="form-check-label" for="nao">Não</label>
      </div>
      <br><br>
      <label for="periodo">Qual foi o período do intercâmbio:<span style="color: red"> *</label>
      <input type="text" id="periodo" name="periodo" class="form-control" value="{{old('periodo')}}">
    </div>

    <div class="form-group">
      <label for="pescolhadestino">Como foi o processo de escolha da instituição de destino? Por que você escolheu ir para essa universidade?<span style="color: red"> *</label><br>
      <textarea id="pescolhadestino" name="pescolhadestino" class="form-control" rows="3">{{old('pescolhadestino')}}</textarea>
    </div>

    <div class="form-group">
      <label for="pvisto">Como foi o processo de solicitação do visto? Teve que traduzir algum documento? Teve que viajar para outro estado? Qual foi o prazo para emissão?<span style="color: red"> *</label><br>
      <textarea id="pvisto" name="pvisto" class="form-control" rows="3">{{old('pvisto')}}</textarea>
    </div>

    <div class="form-group">
      <label for="questoesbancarias">Como resolveu as questões bancárias (câmbio, VTM, envio de dinheiro para o exterior)?<span style="color: red"> *</label><br>
      <textarea id="questoesbancarias" name="questoesbancarias" class="form-control" rows="3">{{old('questoesbancarias')}}</textarea>
    </div>

    <div class="form-group">
      <label for="segurosaude">Você contratou seguro-saúde?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="segurosaude" id="segurosaude_sim" value="1" @if(old('segurosaude') == '1') checked @endif>
          <label class="form-check-label" for="segurosaude_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="segurosaude" id="segurosaude_nao" value="0" @if(old('segurosaude') == '0') checked @endif>
          <label class="form-check-label" for="segurosaude_nao">Não</label>
      </div>
    </div>

    <div class="form-group segurosauderec" id="div_segurosauderec">
      <label for="segurosauderec">Tem alguma indicação?</label><br>
      <textarea id="segurosauderec" name="segurosauderec" class="form-control" rows="3">{{old('segurosauderec')}}</textarea>
    </div>

    <div class="form-group">
      <label>Conseguiu comprar passagens mais baratas?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="passagens" id="passagens_sim" value="1" @if(old('passagens') == '1') checked @endif>
        <label class="form-check-label" for="passagens_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="passagens" id="passagens_nao" value="0" @if(old('passagens') == '0') checked @endif>
        <label class="form-check-label" for="passagens_nao">Não</label>
      </div>
    </div>

    <div class="form-group passagensrec" id="div_passagensrec">
      <label for="passagensrec">Como?</label><br>
      <textarea id="passagensrec" name="passagensrec" class="form-control" rows="3">{{old('passagensrec')}}</textarea>
    </div>

    <div class="form-group oferecimentomoradia" id="div_oferecimentomoradia">
      <label for ="oferecimentomoradia">A universidade ofereceu moradia estudantil?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="oferecimentomoradia" id="oferecimentomoradia_sim" value="1" @if(old('oferecimentomoradia') == '1') checked @endif>
        <label class="form-check-label" for="oferecimentomoradia_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="oferecimentomoradia" id="oferecimentomoradia_nao" value="0" @if(old('oferecimentomoradia') == '0') checked @endif>
        <label class="form-check-label" for="oferecimentomoradia_nao">Não</label>
      </div>
    </div>

    <div class="form-group moradia" id="div_moradia">
      <label for="moradia">você morou nela?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="moradia" id="moradia_sim" value="1" @if(old('moradia') == '1') checked @endif>
        <label class="form-check-label" for="moradia_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="moradia" id="moradia_nao" value="0" @if(old('moradia') == '0') checked @endif>
        <label class="form-check-label" for="moradia_nao">Não</label>
      </div>
    </div>

    <div class="form-group moradiaexp" id="div_moradiaexp">
      <label for="moradiaexp">Conte detalhes sobre a moradia institucional:</label><br>
      <textarea id="moradiaexp" name="moradiaexp" class="form-control" rows="3">{{old('moradiaexp')}}</textarea>
    </div>

    <div class="form-group" id="div_moradiaqnt">
      <label for="moradiaqnt">Morou sozinho?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="moradiaqnt" id="moradiaqnt_sim" value="1" @if(old('moradiaqnt') == '1') checked @endif>
        <label class="form-check-label" for="moradiaqnt_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="moradiaqnt" id="moradiaqnt_nao" value="0" @if(old('moradiaqnt') == '0') checked @endif>
        <label class="form-check-label" for="moradiaqnt_nao">Não</label>
      </div>
    </div>

    <div class="form-group" id="div_proximidade">
      <label for="proximidade">A moradia era proxima a instituição?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="proximidade" id="proximidade_sim" value="1" @if(old('proximidade') == '1') checked @endif>
        <label class="form-check-label" for="proximidade_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="proximidade" id="proximidade_nao" value="0" @if(old('proximidade') == '0') checked @endif>
        <label class="form-check-label" for="proximidade_nao">Não</label>
      </div>
    </div>

    <div class="form-group" id="div_moradiafora">
      <label for="moradiafora">Como foi a escolha do lugar para morar?</label><br>
      <textarea id="moradiafora" name="moradiafora" class="form-control" rows="3">{{old('moradiafora')}}</textarea>
    </div>

    <div class="form-group">
      <label for="prepbagagem">Como foi a preparação da bagagem? O que foi essencial levar?<span style="color: red"> *</label><br>
      <textarea id="prepbagagem" name="prepbagagem" class="form-control" rows="3">{{old('prepbagagem')}}</textarea>
    </div>

    <div class="form-group">
        <label for="conhecimentoprevio">Teve algo que gostaria de ter feito antes de viajar e não fez, ou algo que gostaria de ter conhecimento antes da viagem?<span style="color: red"> *</label><br>
        <textarea id="conhecimentoprevio" name="conhecimentoprevio" class="form-control" rows="3">{{old('conhecimentoprevio')}}</textarea>
    </div>

    <div class="form-group">
      <label for="registro">Foi necessário fazer algum registro ao chegar no país?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="registro" id="registro_sim" value="1" @if(old('registro') == '1') checked @endif>
        <label class="form-check-label" for="registro_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="registro" id="registro_nao" value="0" @if(old('registro') == '0') checked @endif>
        <label class="form-check-label" for="registro_nao">Não</label>
      </div>
    </div>

    <div class="form-group registroexp" id="div_registroexp">
      <label for="registroexp">Quais?</label><br>
      <textarea id="registroexp" name="registroexp" class="form-control" rows="3">{{old('registroexp')}}</textarea>
    </div>

    <div class="form-group">
      <label for="contabancaria">Precisou abrir conta bancária?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="contabancaria" id="contabancaria_sim" value="1" @if(old('contabancaria') == '1') checked @endif>
        <label class="form-check-label" for="contabancaria_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="contabancaria" id="contabancaria_nao" value="0" @if(old('contabancaria') == '0') checked @endif>
        <label class="form-check-label" for="contabancaria_nao">Não</label>
      </div>
    </div>

    <div class="form-group contabancariaexp" id="div_contabancariaexp">
        <label for="contabancariaexp">Como foi o processo?</label><br>
        <textarea id="contabancariaexp" name="contabancariaexp" class="form-control" rows="3">{{old('contabancariaexp')}}</textarea>
    </div>

    <div class="form-group chip">
      <label for="chip">Adquiriu chip de celular?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="chip" id="chip_sim" value="1" @if(old('chip') == '1') checked @endif>
        <label class="form-check-label" for="chip_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="chip" id="chip_nao" value="0" @if(old('chip') == '0') checked @endif>
        <label class="form-check-label" for="chip_nao">Não</label>
      </div>
    </div>

    <div class="form-group chipexp" id="div_chipexp">
      <label for="chipexp">Como foi o processo?</label><br>
      <textarea id="chipexp" name="chipexp" class="form-control" rows="3">{{old('chipexp')}}</textarea>
    </div>

    <div class="form-group">
      <label for="transportepublico">Você utilizava transporte Público?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="transportepublico" id="transportepublico_sim" value="1" @if(old('transportepublico') == '1') checked @endif>
        <label class="form-check-label" for="transportepublico_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="transportepublico" id="transportepublico_nao" value="0" @if(old('transportepublico') == '0') checked @endif>
        <label class="form-check-label" for="transportepublico_nao">Não</label>
      </div>
    </div>

    <div class="form-group descontotransportepublico" id="div_descontotransportepublico">
      <label for=descontotransportepublico>Você tinha algum desconto por ser estudante?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="descontotransportepublico" id="descontotransportepublico_sim" value="1" @if(old('descontotransportepublico') == '1') checked @endif>
        <label class="form-check-label" for="descontotransportepublico_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="descontotransportepublico" id="descontotransportepublico_nao" value="0" @if(old('descontotransportepublico') == '0') checked @endif>
        <label class="form-check-label" for="descontotransportepublico_nao">Não</label>
      </div>
    </div>

    <div class="form-group descontotransportepublicoexp" id="div_descontotransportepublicoexp">
      <label for="descontotransportepublicoexp">Como era o desconto?</label><br>
      <textarea id="descontotransportepublicoexp" name="descontotransportepublicoexp" class="form-control" rows="3">{{old('descontotransportepublicoexp')}}</textarea>
    </div>

    <div class="form-group">
      <label for="orientacao">Houve alguma reunião de orientação ao chegar na faculdade estrangeira?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="orientacao" id="orientacao_sim" value="1" @if(old('orientacao') == '1') checked @endif>
        <label class="form-check-label" for="orientacao_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="orientacao" id="orientacao_nao" value="0" @if(old('orientacao') == '0') checked @endif>
        <label class="form-check-label" for="orientacao_nao">Não</label>
      </div>
    </div>

    <div class="form-group orientacaoexp" id="div_orientacaoexp">
      <label for="orientacaoexp">Como foi a orientação?</label><br>
      <textarea id="orientacaoexp" name="orientacaoexp" class="form-control" rows="3">{{old('orientacaoexp')}}</textarea>
    </div>

    <div class="form-group cursoidioma" id="div_cursoidioma">
      <label for="cursoidioma">A universidade ofereceu algum curso de idiomas?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="cursoidioma" id="cursoidioma_sim" value="1" @if(old('cursoidioma') == '1') checked @endif>
        <label class="form-check-label" for="cursoidioma_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="cursoidioma" id="cursoidioma_nao" value="0" @if(old('cursoidioma') == '0') checked @endif>
        <label class="form-check-label" for="cursoidioma_nao">Não</label>
      </div>
    </div>

    <div class="form-group cursoidiomagratuidade" id="div_cursoidiomagratuidade">
      <label for="cursoidiomagratuidade">O curso era gratuito?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="cursoidiomagratuidade" id="cursoidiomagratuidade_sim" value="1" @if(old('cursoidiomagratuidade') == '1') checked @endif>
        <label class="form-check-label" for="cursoidiomagratuidade_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="cursoidiomagratuidade" id="cursoidiomagratuidade_nao" value="0" @if(old('cursoidiomagratuidade') == '0') checked @endif>
        <label class="form-check-label" for="cursoidiomagratuidade_nao">Não</label>
      </div>
    </div>

    <div class="form-group cursoidiomavalor" id="div_cursoidiomavalor">
      <label for="cursoidiomavalor">Qual era o Valor:</label><br>
      <input type="text" id="cursoidiomavalor" name="cursoidiomavalor" class="form-control">
    </div>

    <div class="form-group">
      <label for="matricula">Como foi a matrícula nas matérias de interesse?<span style="color: red"> *</label><br>
      <textarea id="matricula" name="matricula" class="form-control" rows="3">{{old('matricula')}}</textarea>
    </div>

    <div class="form-group">
      <label for="aulasantes">Você pode assistir as aulas antes de se matricular?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="aulasantes" id="aulasantes_sim" value="1" @if(old('aulasantes') == '1') checked @endif>
        <label class="form-check-label" for="aulasantes_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="aulasantes" id="aulasantes_nao" value="0" @if(old('aulasantes') == '0') checked @endif>
        <label class="form-check-label" for="aulasantes_nao">Não</label>
      </div>
    </div>

    <div class="form-group restauranteuniversitario" id="div_restauranteuniversitario">
      <label for="restauranteuniversitario">A universidade possuía restaurante universitário?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="restauranteuniversitario" id="restauranteuniversitario_sim" value="1" @if(old('restauranteuniversitario') == '1') checked @endif>
        <label class="form-check-label" for="restauranteuniversitario_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="restauranteuniversitario" id="restauranteuniversitario_nao" value="0" @if(old('restauranteuniversitario') == '0') checked @endif>
        <label class="form-check-label" for="restauranteuniversitario_nao">Não</label>
      </div>
    </div>

    <div class="form-group restauranteuniversitariovalor" id="div_restauranteuniversitariovalor">
      <label for="restauranteuniversitariovalor">Quanto era?</label><br>
      <textarea id="restauranteuniversitariovalor" name="restauranteuniversitariovalor" class="form-control" rows="3">{{old('restauranteuniversitariovalor')}}</textarea>
    </div>

    <div class="form-group restauranteacessivel" id="div_restauranteacessivel">
      <label for="restauranteacessivel">O valor era acessível para você?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="restauranteacessivel" id="restauranteacessivel_sim" value="1" @if(old('restauranteacessivel') == '1') checked @endif>
        <label class="form-check-label" for="restauranteacessivel_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="restauranteacessivel" id="restauranteacessivel_nao" value="0" @if(old('restauranteacessivel') == '0') checked @endif>
        <label class="form-check-label" for="restauranteacessivel_nao">Não</label>
      </div>
    </div>

    <div class="form-group taxaadm" id="div_taxaadm">
      <label for="taxaadm">Você teve que pagar alguma taxa administrativa?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="taxaadm" id="taxaadm_sim" value="1" @if(old('taxaadm') == '1') checked @endif>
        <label class="form-check-label" for="taxaadm_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="taxaadm" id="taxaadm_nao" value="0" @if(old('taxaadm') == '0') checked @endif>
        <label class="form-check-label" for="taxaadm_nao">Não</label>
      </div>
    </div>

    <div class="form-group taxaadmexp" id="div_taxaadmexp">
      <label for="taxaadmexp">Qual/Quais?</label><br>
      <textarea id="taxaadmexp" name="taxaadmexp" class="form-control" rows="3">{{old('taxaadmexp')}}</textarea>
    </div>

    <div class="form-group">
      <label for="expacademica">Nos conte como foi sua experiência acadêmica (provas, trabalhos, aulas, relação com os professores, etc) e o grau de exigência na universidade estrangeira.<span style="color: red"> *</label><br>
      <textarea id="expacademica" name="expacademica" class="form-control" rows="3">{{old('expacademica')}}</textarea>
    </div>

    <div class="form-group programaamizade" id="div_programaamizade">
      <label for="programaamizade">A universidade possui algum programa como o “USP I-Friend” ou similar?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="programaamizade" id="programaamizade_sim" value="1" @if(old('programaamizade') == '1') checked @endif>
        <label class="form-check-label" for="programaamizade_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="programaamizade" id="programaamizade_nao" value="0" @if(old('programaamizade') == '0') checked @endif>
        <label class="form-check-label" for="programaamizade_nao">Não</label>
      </div>
    </div>

    <div class="form-group programaamizadeexp" id ="div_programaamizadeexp">
      <label for="programaamizadeexp">Como era o programa?</label><br>
      <textarea id="programaamizadeexp" name="programaamizadeexp" class="form-control" rows="3">{{old('programaamizadeexp')}}</textarea>
    </div>

    <div class="form-group dificuldadeacompanhamento" id="div_dificuldadeacompanhamento">
      <label for="dificuldadeacompanhamento">Teve alguma dificuldade inicial em acompanhar as aulas?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="dificuldadeacompanhamento" id="dificuldadeacompanhamento_sim" value="1" @if(old('dificuldadeacompanhamento') == '1') checked @endif>
        <label class="form-check-label" for="dificuldadeacompanhamento_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="dificuldadeacompanhamento" id="dificuldadeacompanhamento_nao" value="0" @if(old('dificuldadeacompanhamento') == '0') checked @endif>
        <label class="form-check-label" for="dificuldadeacompanhamento_nao">Não</label>
      </div>
    </div>

    <div class="form-group dificuldadeacompanhamentoexp" id="div_dificuldadeacompanhamentoexp">
      <label for="dificuldadeacompanhamentoexp">Quais foram elas?</label><br>
      <textarea id="dificuldadeacompanhamentoexp" name="dificuldadeacompanhamentoexp" class="form-control" rows="3">{{old('dificuldadeacompanhamentoexp')}}</textarea>
    </div>

    <div class="form-group dificuldadeidioma" id="div_dificuldadeidioma">
      <label for="dificuldadeidioma">Teve dificuldade com o Idioma?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="dificuldadeidioma" id="dificuldadeidioma_sim" value="1" @if(old('dificuldadeidioma') == '1') checked @endif>
        <label class="form-check-label" for="dificuldadeidioma_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="dificuldadeidioma" id="dificuldadeidioma_nao" value="0" @if(old('dificuldadeidioma') == '0') checked @endif>
        <label class="form-check-label" for="dificuldadeidioma_nao">Não</label>
      </div>
    </div>

    <div class="form-group dificuldadeidiomaexp" id="div_dificuldadeidiomaexp">
      <label for="dificuldadeidiomaexp">Quais foram as dificuldades com o idioma?</label><br>
      <textarea id="dificuldadeidiomaexp" name="dificuldadeidiomaexp" class="form-control" rows="3">{{old('dificuldadeidiomaexp')}}</textarea>
    </div>

    <div class="form-group">
      <label for="adaptacao">Como foi sua adaptação (cultural, social, etc)?<span style="color: red"> *</label><br>
      <textarea id="adaptacao" name="adaptacao" class="form-control" rows="3">{{old('adaptacao')}}</textarea>
    </div>

    <div class="form-group">
      <label for="dificuldades">Quais foram suas maiores dificuldades durante o intercâmbio?<span style="color: red"> *</label><br>
      <textarea id="dificuldades" name="dificuldades" class="form-control" rows="3">{{old('dificuldades')}}</textarea>
    </div>

    <div class="form-group atvintegracao" id="div_atvintegracao">
      <label for="atvintegracao">A universidade realiza atividades para integração dos alunos estrangeiros?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="atvintegracao" id="atvintegracao_sim" value="1" @if(old('atvintegracao') == '1') checked @endif>
        <label class="form-check-label" for="atvintegracao_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="atvintegracao" id="atvintegracao_nao" value="0" @if(old('atvintegracao') == '0') checked @endif>
        <label class="form-check-label" for="atvintegracao_nao">Não</label>
      </div>
    </div>

    <div class="form-group atvintegracaoexp" id="div_atvintegracaoexp">
      <label for="atvintegracaoexp">Quais eram as atividades?</label><br>
      <textarea id="atvintegracaoexp" name="atvintegracaoexp" class="form-control" rows="3">{{old('atvintegracaoexp')}}</textarea>
    </div>

    <div class="form-group bolsa" id="div_bolsa">
      <label for="bolsa">Você recebeu algum tipo de bolsa?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="bolsa" id="bolsa_sim" value="1" @if(old('bolsa') == '1') checked @endif>
        <label class="form-check-label" for="bolsa_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="bolsa" id="bolsa_nao" value="0" @if(old('bolsa') == '0') checked @endif>
        <label class="form-check-label" for="bolsa_nao">Não</label>
      </div>
    </div>

    <div class="form-group bolsasuf" id="div_bolsasuf">
      <label for="bolsasuf">Ela foi suficiente para se manter durante o intercâmbio?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="bolsasuf" id="bolsasuf_sim" value="1" @if(old('bolsasuf') == '1') checked @endif>
        <label class="form-check-label" for="bolsasuf_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="bolsasuf" id="bolsasuf_nao" value="0" @if(old('bolsasuf') == '0') checked @endif>
        <label class="form-check-label" for="bolsasuf_nao">Não</label>
      </div>
    </div>

    <div class="form-group">
      <label for="gastomensal">Qual era o gasto médio mensal (alimentação, transporte, moradia, livros, etc)?<span style="color: red"> *</label><br>
      <textarea id="gastomensal" name="gastomensal" class="form-control" rows="3">{{old('gastomensal')}}</textarea>
    </div>

    <div class="form-group atvremunerada" id="div_atvremunerada">
      <label for="atvremunerada">Você exerceu algum tipo de atividade remunerada durante o intercâmbio?<span style="color: red"> *</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="atvremunerada" id="atvremunerada_sim" value="1" @if(old('atvremunerada') == '1') checked @endif>
        <label class="form-check-label" for="atvremunerada_sim">Sim</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="atvremunerada" id="atvremunerada_nao" value="0" @if(old('atvremunerada') == '0') checked @endif>
        <label class="form-check-label" for="atvremunerada_nao">Não</label>
      </div>
    </div>

    <div class="form-group atvremuneradaexp" id="div_atvremuneradaexp">
      <label for="atvremuneradaexp">Qual? Como era?</label><br>
      <textarea id="atvremuneradaexp" name="atvremuneradaexp" class="form-control" rows="3">{{old('atvremuneradaexp')}}</textarea>
    </div>

    <div class="form-group">
      <label for="dicas">Quais dicas/sugestões você daria para os alunos da FFLCH interessados em fazer intercâmbio nessa universidade/país? O que fazer? O que não fazer?<span style="color: red"> *</label><br>
      <textarea id="dicas" name="dicas" class="form-control" rows="3">{{old('dicas')}}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
@endsection

@section('javascripts_bottom')
<script>
    document.querySelectorAll('input[name="segurosaude"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (document.getElementById('segurosaude_sim').checked) {
                document.getElementById('div_segurosauderec').style.display = 'block';
            } else {
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
            if (document.getElementById('oferecimentomoradia_sim').checked) {
                document.getElementById('div_moradia').style.display = 'block';
                document.getElementById('div_moradiaexp').style.display = 'none';
                document.getElementById('div_moradiaqnt').style.display = 'none';
                document.getElementById('div_proximidade').style.display = 'none';
                document.getElementById('div_moradiafora').style.display = 'none';
            } else {
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
            if (document.getElementById('moradia_sim').checked) {
                document.getElementById('div_moradiaexp').style.display = 'block';
                document.getElementById('div_moradiaqnt').style.display = 'block';
                document.getElementById('div_proximidade').style.display = 'block';
            } else {
                document.getElementById('div_moradiaexp').style.display = 'none';
                document.getElementById('div_moradiaqnt').style.display = 'block';
                document.getElementById('div_proximidade').style.display = 'block';
                document.getElementById('div_moradiafora').style.display = 'block';
            }
        });
    });

    document.querySelectorAll('input[name="registro"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (document.getElementById('registro_sim').checked) {
                document.getElementById('div_registroexp').style.display = 'block';
            } else {
                document.getElementById('div_registroexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="contabancaria"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (document.getElementById('contabancaria_sim').checked) {
                document.getElementById('div_contabancariaexp').style.display = 'block';
            } else {
                document.getElementById('div_contabancariaexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="chip"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (document.getElementById('chip_sim').checked) {
                document.getElementById('div_chipexp').style.display = 'block';
            } else {
                document.getElementById('div_chipexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="transportepublico"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (document.getElementById('transportepublico_sim').checked) {
                document.getElementById('div_descontotransportepublico').style.display = 'block';
                document.getElementById('div_descontotransportepublicoexp').style.display = 'none';
            } else {
                document.getElementById('div_descontotransportepublico').style.display = 'none';
                document.getElementById('div_descontotransportepublicoexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="descontotransportepublico"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (document.getElementById('descontotransportepublico_sim').checked) {
                document.getElementById('div_descontotransportepublicoexp').style.display = 'block';
            } else {
                document.getElementById('div_descontotransportepublicoexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="orientacao"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (document.getElementById('orientacao_sim').checked) {
                document.getElementById('div_orientacaoexp').style.display = 'block';
            } else {
                document.getElementById('div_orientacaoexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="cursoidioma"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (document.getElementById('cursoidioma_sim').checked) {
                document.getElementById('div_cursoidiomagratuidade').style.display = 'block';
                document.getElementById('div_cursoidiomavalor').style.display = 'none';
            } else {
                document.getElementById('div_cursoidiomagratuidade').style.display = 'none';
                document.getElementById('div_cursoidiomavalor').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="cursoidiomagratuidade"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (document.getElementById('cursoidiomagratuidade_sim').checked) {
                document.getElementById('div_cursoidiomavalor').style.display = 'none';
            } else {
                document.getElementById('div_cursoidiomavalor').style.display = 'block';
            }
        });
    });

    document.querySelectorAll('input[name="restauranteuniversitario"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (document.getElementById('restauranteuniversitario_sim').checked) {
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
            if (document.getElementById('taxaadm_sim').checked) {
                document.getElementById('div_taxaadmexp').style.display = 'block';
            } else {
                document.getElementById('div_taxaadmexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="programaamizade"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (document.getElementById('programaamizade_sim').checked) {
                document.getElementById('div_programaamizadeexp').style.display = 'block';
            } else {
                document.getElementById('div_programaamizadeexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="dificuldadeacompanhamento"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (document.getElementById('dificuldadeacompanhamento_sim').checked) {
                document.getElementById('div_dificuldadeacompanhamentoexp').style.display = 'block';
            } else {
                document.getElementById('div_dificuldadeacompanhamentoexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="dificuldadeidioma"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (document.getElementById('dificuldadeidioma_sim').checked) {
                document.getElementById('div_dificuldadeidiomaexp').style.display = 'block';
            } else {
                document.getElementById('div_dificuldadeidiomaexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="atvintegracao"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (document.getElementById('atvintegracao_sim').checked) {
                document.getElementById('div_atvintegracaoexp').style.display = 'block';
            } else {
                document.getElementById('div_atvintegracaoexp').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="bolsa"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (document.getElementById('bolsa_sim').checked) {
                document.getElementById('div_bolsasuf').style.display = 'block';
            } else {
                document.getElementById('div_bolsasuf').style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="atvremunerada"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (document.getElementById('atvremunerada_sim').checked) {
                document.getElementById('div_atvremuneradaexp').style.display = 'block';
            } else {
                document.getElementById('div_atvremuneradaexp').style.display = 'none';
            }
        });
    });

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

    window.addEventListener('DOMContentLoaded', function() {
        if (!document.getElementById('atvremunerada_sim').checked) {
            document.getElementById('div_atvremuneradaexp').style.display = 'none';
        }

    });
</script>
@endsection
