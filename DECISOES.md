# Escolha do tema

Escolhi fazer um sistema de agendamento onlie para petshops por 3 motivos: o primeiro é que ele consegue cobrir bem os requisitos solictados no teste; o segundo é que eu amo animais, então achei que seria interessante fazer algo nesse campo; e por fim, eu acredito que seria um sistema realmente útil para aplicação na vida real, não só por cumprir bem o seu papel, mas também por oferecer um design moderno, limpo e organizado, algo que muitas vezes falta nos sites de petshops menores.

# Escolha da stack

Eu decidi trabalhar com o Laravel e Bootstrap principalmente por serem frameworks que eu trabalho há bastante tempo, desde o meu primeiro estágio em 2020. E por mais que eu só tenha trabalhado com projetos mais básicos, formulários, sistema de autenticação, validação de dados e listagem de dados sempre firzeram parte dos projetos no qual eu participei, então faz sentido utilizar eles de novo para o teste.

A vantagem de utilizar tanto o Laravel quanto o Bootstrap é que eles aceleram muito o processo de desenvolvimento. Tanto pelo Laravel possuir várias funções essenciais já prontas e uma arquitetura sólida, quanto pelo Bootstrap fornecer um conjunto gigantesco de classes que não só me ajudam a fazer um projeto padronizado, como agiliza bastante na questão da responsividade do site.

A única desvantagem que eu vejo em utilizá-los, é que como o projeto possui um escopo inicial mais simples e esses frameworks são abarrotados de recursos, talvez o sistema possa ter ficado mais pesado sem muita necessidade.

# Implementações, Limitações e Possibilidades

## Implementações

Atualmente o sistema consta com landing page dashboard responsivos, com: um formulário para o visitante com validação dos dados no frontend e backend, uma tabela com todos os agendamentos ordenada pela data de criação, paginação dos registros, atualização do status do agendamento.

Uma das coisas que inicialmente eu não havia colocado no formulário, era a opção de observações. A princípio eu nem havia pensado na ideia, mas depois lembrei de como o meu cachorro fica agitado quando vai tomar banho, e quantas outras particularidades os outros animais também podem ter, sejam em questões de saúde ou comportamento.

## Limitações

O sistema de agendamento é bastante simples, não possui seleção de horário e nem bloqueia o usuário de selecionar uma data anterior ao dia atual. Algo que poderia ser implementado, mas por questão de tempo eu acabei não conseguindo.

Além disso, não possui um sistema de pesquisa para o administrador, nem ordenação de registros com base em outras colunas, também em função do tempo.

## Possibilidades

Apesar do sistema inicialmente ser simples, vejo que ele possui uma grande margem para evolução, das coisas que poderiam ser implementadas, eu pensei em:

- Cadastro de espécies de animais (caso o petshop trabalhe com algo mais que cães e gatos);
- Gestão de serviços;
- Cadastro de funcionários com os dias e horários onde cada um trabalha;
- Filtragem de dados;
- Formulário de agendamento mais detalhado onde: o cliente seleciona apenas datas disponíveis a partir do dia atual (algo que seria mostrado para ele com base nas agendas dos funcionários), ao selecionar a data o cliente se depara com todos os profissionais disponíveis naquele dia com base no serviço desejado e seleciona um dos horários disponíveis;
- Envio de e-mails automáticos para o cliente, avisando-o sobre a confirmação ou cancelamento do seu agendamento;
- Possibilidade de pagamento online caso o agendamento seja confirmado.

# Inteligência Artificial

Na maioria das vezes, eu utilizei a IA para tirar dúvidas sobre a sintaxe de uma coisa ou outra que eu não me lembrava exatamente como era, visto que tem um certo tempo que eu não programo. Fora isso, eu solicitei ao Claude que me ajudasse com a questão do design e responsividade, para poder agilizar o processo. Agora os formulários, a lógica para fazer a persistência de dados, recuperação de registros no banco de dados, edição de registros e validação de formulários eu fiz à mão, principalmente por serem coisas que já estão bem amadurecidas na minha cabeça, eu meio que consigo fazer relativamente rápido sem ajuda externa. A verdade é que eu tenho uma certa resistência à utilizar IA para fazer coisas que eu já sei, prefiro utilizá-la para coisas que eu não tenho muita afinidade, porque assim eu também vou aprendendo mais coisas novas.

Particularmente não tive problemas com o conteúdo fornecido pela IA, o que tiveram mesmo foram questões de como ela sugeriu para apresentar e alterar os dados, utilizando bastante JavaScript. Mas como eram coisas que eu já sabia fazer utilizando os próprios recursos do Laravel, eu apenas adaptei os códigos.
