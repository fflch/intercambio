@extends('laravel-fflch-pdf::main')

@section('content')
    <h2 style="text-align: center;">Relatório de Intercâmbio</h2>
    @if(Gate::allows('admin'))
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; width: 30%; background-color: #d0d0d0;"><strong>Nome do aluno</strong></td>
                <td style="border: 1px solid #000; padding: 5px; width: 70%;">{{ $relatorio->pedido->nome }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; width: 30%; background-color: #d0d0d0;"><strong>Email do aluno</strong></td>
                <td style="border: 1px solid #000; padding: 5px; width: 70%;">{{ $relatorio->pedido->user->email }}</td>
            </tr>
        </tbody>
    </table>
    @elseif($relatorio->autorizacao === 'simnomecontato')
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; width: 30%; background-color: #d0d0d0;"><strong>Nome do aluno</strong></td>
                <td style="border: 1px solid #000; padding: 5px; width: 70%;">{{ $relatorio->pedido->nome }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; width: 30%; background-color: #d0d0d0;"><strong>Email do aluno</strong></td>
                <td style="border: 1px solid #000; padding: 5px; width: 70%;">{{ $relatorio->pedido->user->email }}</td>
            </tr>
        </tbody>
    </table>
    @elseif($relatorio->autorizacao === 'simnome')
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; width: 30%; background-color: #d0d0d0;"><strong>Nome do aluno</strong></td>
                <td style="border: 1px solid #000; padding: 5px; width: 70%;">{{ $relatorio->pedido->nome }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; width: 30%; background-color: #d0d0d0;"><strong>Email do aluno</strong></td>
                <td style="border: 1px solid #000; padding: 5px; width: 70%;">preferiu não informar.</td>
            </tr>
        </tbody>
    </table>
    @else
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; width: 30%; background-color: #d0d0d0;"><strong>Nome do aluno</strong></td>
                <td style="border: 1px solid #000; padding: 5px; width: 70%;">preferiu não informar.</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; width: 30%; background-color: #d0d0d0;"><strong>Email do aluno</strong></td>
                <td style="border: 1px solid #000; padding: 5px; width: 70%;">preferiu não informar.</td>
            </tr>
        </tbody>
    </table>
    @endif
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #d0d0d0;"><strong>País</strong></td>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->pedido->instituicao->country->nome }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #d0d0d0;"><strong>Instituição</strong></td>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->pedido->instituicao->nome_instituicao }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #d0d0d0;"><strong>Curso</strong></td>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->pedido->curso }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #d0d0d0;"><strong>Período do Intercâmbio</strong></td>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->periodo ?? 'Não informado' }}</td>
            </tr>
        </tbody>
    </table>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #ccc; text-transform: uppercase;"><strong>ANTES DE VIAJAR</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Como foi o processo de escolha da instituição de destino? Por que você escolheu ir para essa universidade?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->pescolhadestino ?? 'Não informado' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Como foi o processo de solicitação do visto? Teve que traduzir algum documento? Teve que viajar para outro estado? Qual foi o prazo para emissão?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->pvisto ?? 'Não informado' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Como resolveu as questões bancárias (câmbio, VTM, envio de dinheiro para o exterior)?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->questoesbancarias ?? 'Não informado' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Você contratou seguro-saúde?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->segurosaude ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->segurosaude && !is_null($relatorio->segurosauderec))
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Tem alguma indicação?</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->segurosauderec ?? 'Não informado' }}</td>
                </tr>
            @endif
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Conseguiu comprar passagens mais baratas?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->passagens ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->passagens && !is_null($relatorio->passagensrec ?? 'Não informado' ))
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Como?</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->passagensrec ?? 'Não informado' }}</td>
                </tr>
            @endif
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;">
                    <strong>A Universidade ofereceu moradia estudantil?</strong>
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">
                    {{ $relatorio->oferecimentomoradia ? 'Sim' : 'Não' ?? 'Não informado' }}
                </td>
            </tr>

            @if($relatorio->oferecimentomoradia)
                <!-- Pergunta: Você morou nela? -->
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;">
                        <strong>Você morou nela?</strong>
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">
                        {{ $relatorio->moradia ? 'Sim' : 'Não' ?? 'Não informado' }}
                    </td>
                </tr>

                @if($relatorio->moradia)
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;">
                            <strong>Morou sozinho?</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px;">
                            {{ $relatorio->moradiaqnt ? 'Sim' : 'Não' ?? 'Não informado' }}
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;">
                            <strong>A moradia era próxima à instituição?</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px;">
                            {{ $relatorio->proximidade ? 'Sim' : 'Não' ?? 'Não informado' }}
                        </td>
                    </tr>
                @else
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;">
                            <strong>Morou sozinho?</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px;">
                            {{ $relatorio->moradiaqnt ? 'Sim' : 'Não' ?? 'Não informado' }}
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;">
                            <strong>A moradia era próxima à instituição?</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px;">
                            {{ $relatorio->proximidade ? 'Sim' : 'Não' ?? 'Não informado' }}
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;">
                            <strong>Como foi a escolha do lugar para morar?</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px;">
                            {{ $relatorio->moradiafora ?? 'Não informado' ?? 'Não informado' }}
                        </td>
                    </tr>
                @endif
            @else
                <tr>
                        <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;">
                            <strong>Morou sozinho?</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px;">
                            {{ $relatorio->moradiaqnt ? 'Sim' : 'Não' ?? 'Não informado' }}
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;">
                            <strong>A moradia era próxima à instituição?</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px;">
                            {{ $relatorio->proximidade ? 'Sim' : 'Não' ?? 'Não informado' }}
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;">
                            <strong>Como foi a escolha do lugar para morar?</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px;">
                            {{ $relatorio->moradiafora ?? 'Não informado' }}
                        </td>
                    </tr>
            @endif
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Como foi a preparação da bagagem? O que foi essencial levar?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->prepbagagem ?? 'Não informado' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Teve algo que gostaria de ter feito antes de viajar e não fez, ou algo que gostaria de ter conhecimento antes da viagem?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->conhecimentoprevio ?? 'Não informado' }}</td>
            </tr>
        </tbody>
    </table><br>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #ccc; text-transform: uppercase;"><strong>CHEGANDO NO PAÍS</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Foi necessário fazer algum registro ao chegar no país?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->registro ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->registro && !is_null($relatorio->registroexp))
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Quais?</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->registroexp ?? 'Não informado' }}</td>
                </tr>
            @endif
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Precisou abrir conta bancária?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->contabancaria ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->contabancaria && !is_null($relatorio->contabancariaexp))
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Como foi o processo?</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->contabancariaexp ?? 'Não informado' }}</td>
                </tr>
            @endif
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Adquiriu chip de celular?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->chip ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->chip && !is_null($relatorio->chipexp))
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Como foi o processo?</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->chipexp ?? 'Não informado' }}</td>
                </tr>
            @endif
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Você utilizava transporte público?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->transportepublico ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->transportepublico)
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Você tinha algum desconto por ser estudante?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->descontotransportepublico ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->descontotransportepublico)
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Como era o desconto?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->descontotransportepublicoexp ?? 'Não informado' }}</td>
            </tr>
            @endif
        @endif
        </tbody>
    </table><br>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #ccc; text-transform: uppercase;"><strong>CHEGANDO NA UNIVERSIDADE</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Houve alguma reunião de orientação ao chegar na faculdade estrangeira?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->orientacao ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->orientacao && !is_null($relatorio->orientacaoexp))
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Como foi a orientação?</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->orientacaoexp ?? 'Não informado' }}</td>
                </tr>
            @endif
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>A universidade ofereceu algum curso de idiomas?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->cursoidioma ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->cursoidioma)
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>O curso era gratuito?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->cursoidiomagratuidade ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->cursoidiomagratuidade)
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Qual era o Valor?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->cursoidiomavalor ?? 'Não informado' }}</td>
            </tr>
            @endif
        @endif
        <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Como foi a matrícula nas matérias de interesse?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->matricula ?? 'Não informado' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Você pode assistir as aulas antes de se matricular?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->aulasantes ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>A universidade possuía restaurante universitário?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->restauranteuniversitario ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->restauranteuniversitario)
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Quanto era?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->restauranteuniversitariovalor ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->restauranteuniversitario)
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>O valor era acessível para você?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->restauranteacessivel ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @endif
        @endif
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Você teve que pagar alguma taxa administrativa?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->taxaadm ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->taxaadm && !is_null($relatorio->taxaadmexp))
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Qual/Quais?</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->taxaadmexp ?? 'Não informado' }}</td>
                </tr>
            @endif
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Nos conte como foi sua experiência acadêmica (provas, trabalhos, aulas, relação com os professores, etc) e o grau de exigência na universidade estrangeira.</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->expacademica ?? 'Não informado' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>A universidade possui algum programa como o “USP I-Friend” ou similar?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->programaamizade ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->programaamizade && !is_null($relatorio->programaamizadeexp))
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Como era o programa?</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->programaamizadeexp ?? 'Não informado' }}</td>
                </tr>
            @endif
        </table><br>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #ccc; text-transform: uppercase;"><strong>ADAPTAÇÃO</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Teve alguma dificuldade inicial em acompanhar as aulas?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->dificuldadeacompanhamento ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->dificuldadeacompanhamento && !is_null($relatorio->dificuldadeacompanhamentoexp))
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Quais foram elas?</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->dificuldadeacompanhamentoexp ?? 'Não informado' }}</td>
                </tr>
            @endif
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Teve dificuldade com o Idioma?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->dificuldadeidioma ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->dificuldadeidioma && !is_null($relatorio->dificuldadeidiomaexp))
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Quais foram as dificuldades com o idioma?</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->dificuldadeidiomaexp ?? 'Não informado' }}</td>
                </tr>
            @endif
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Como foi sua adaptação (cultural, social, etc)?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->adaptacao ?? 'Não informado' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Quais foram suas maiores dificuldades durante o intercâmbio?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->dificuldades ?? 'Não informado' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>A universidade realiza atividades para integração dos alunos estrangeiros?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->atvintegracao ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->atvintegracao && !is_null($relatorio->atvintegracaoexp))
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Quais foram as atividades?</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->atvintegracaoexp ?? 'Não informado' }}</td>
                </tr>
            @endif
        </tbody>
    </table><br>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #ccc; text-transform: uppercase;"><strong>CUSTO DE VIDA</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Você recebeu algum tipo de bolsa?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->bolsa ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->bolsa && !is_null($relatorio->bolsasuf))
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Ela foi suficiente para se manter durante o intercâmbio?</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->bolsasuf ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
                </tr>
            @endif
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Você exerceu algum tipo de atividade remunerada durante o intercâmbio?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->atvremunerada ? 'Sim' : 'Não' ?? 'Não informado' }}</td>
            </tr>
            @if($relatorio->atvremunerada && !is_null($relatorio->atvremuneradaexp))
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Qual? Como era?</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->atvremuneradaexp ?? 'Não informado' }}</td>
                </tr>
            @endif
        </tbody>
    </table><br>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tbody>
        <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #ccc; text-transform: uppercase;"><strong>DICAS</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px; background-color: #f0f0f0;"><strong>Quais dicas/sugestões você daria para os alunos da FFLCH interessados em fazer intercâmbio nessa universidade/país? O que fazer? O que não fazer?</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $relatorio->dicas ?? 'Não informado' }}</td>
            </tr>
        </tbody>
    </table><br>
@endsection
