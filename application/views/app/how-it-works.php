<?php $this->load->view('app/header'); ?>

<div class="container">
  <div class="row">
    <div class="col s12 l8">
      <article>
        <h1 id="how-it-works"><strong>Como o Cálculo Funciona?</strong></h1>

        <p>Em Magic: The Gathering, o cálculo de curva de mana serve para você descobrir a quantidade
        ideal de terrenos para o seu deck e, no caso de decks multicoloridos, a distribuição
        adequada de cores entre seus terrenos.</p>

        <p>Para que você entenda como este cálculo funciona, é necessário entender primeiro o que
        define o <em>peso</em> de uma carta.</p>

        <p>O peso de uma carta está alinhado a dois fatores muito importantes:</p>

        <p><strong>1</strong> - a quantidade de mana necessário para conjurar a mágica;<br>
        <strong>2</strong> - o modo como essa mágica funciona.</p>

        <p>Esses conceitos podem parecer bem simples, mas, por via das dúvidas, vamos fazer um
        teste para termos certeza de que você os entendeu. Peguemos como exemplo a seguinte
        carta:</p>

        <br>

        <div class="row no-margin-bottom">
          <div class="col s12 center-align">
            <img src="<?php echo base_url() . 'assets/img/giant-growth.jpg'; ?>" alt="" title="">
          </div>
        </div>

        <br>

        <p>Qual seria a curva de mana da carta <em>Crescimento Desenfreado (Giant Growth)</em>?
        Se você pensou que a resposta para essa pergunta é "um", se enganou. Iremos entender o
        porquê.</p>

        <p>Em primeiro lugar, <em>Crescimento Desenfreado</em> é uma carta que
        possui um efeito que depende de, pelo menos, mais uma outra carta para funcionar. Ou seja,
        é necessário que haja uma criatura no campo de batalha que possa ser alvo da mágica
        em questão. Salvo algumas exceções, você não terá mana suficiente para conjurar uma criatura
        e a mágica <em>Crescimento Desenfreado</em> no turno um.</p>

        <p>Além disso, o fato de <em>Crescimento Desenfreado</em> possuir um mana colorido ( <i class="ms ms-cost ms-g"></i> )
        em seu custo, também deve ser levado em consideração na hora de calcular o seu peso,
        caso o seu deck possua mais de uma cor.</p>

        <p>Este exemplo mostra que o valor do custo não é o único parâmetro que utilizamos
        para calcular a curva de mana de uma carta.</p>

        <h2 id="lands-quantity"><strong>Descobrindo a Quantidade de Terrenos</strong></h2>

        <p>Agora que entendemos como mensurar o peso de uma carta, iremos entender melhor
        como descobrimos a quantidade ideal de terrenos para o nosso deck.</p>

        <p>Primeiro, separamos todas as nossas cartas de acordo com o custo (ignore
        as cores, neste momento). Pegue todas as suas cartas de custo 1 e agrupe-as
        num monte, todas as de custo 2, as de custo 3 e daí por diante. Agora, faça a
        conta e descubra quantas cartas o seu deck possui, de acordo com o custo. Vejamos
        um exemplo simples:<p>

        <p><strong>Custo 1:</strong> 8<br>
        <strong>Custo 2:</strong> 22<br>
        <strong>Custo 3:</strong> 10</p>

        <p>Agora, multiplique o valor do custo pela quantidade de cartas equivalente.
        Neste caso, obteremos:</p>

        <p>1 x 8 = 8<br>
        2 x 22 = 44<br>
        3 x 10 = 30</p>

        <p>Com todos os valores já anotados, some todos os resultados das multiplicações,
        deste modo:</p>

        <p>8 + 44 + 30 = 82</p>

        <p>Por fim, pegue este valor e divida pela quantidade de cartas que o seu deck possui:</p>

        <p>82 &divide; 40 = 2,05</p>

        <p>Abreviando, chegamos ao valor de 2,0. Ou seja, isso significa que
        este deck precisa de <strong>20</strong> terrenos para funcionar.</p>

        <p>A quantidade pode variar um pouco, de caso para caso. Devemos considerar que algumas
        mágicas fazem uso de mana além do seu custo e que outras também funcionam como fonte
        de mana. Porém, a margem de erro costuma variar entre 1 ou 2 terrenos, de acordo com
        o resultado.</p>

        <p>É importante ficar atento ao conceito de fonte de mana. Cuidado para não
        confundir fonte de mana com adição de mana. Cartas como <em>Ritual Sombrio (Dark Ritual)</em>,
        por exemplo, apenas adicionam mana quando são conjuradas e depois vão para o cemitério.
        Uma fonte de mana pode ser utilizada durante o decorrer da partida, até que algo a impeça
        (como um destruição, por exemplo). Uma carta que podemos usar como exemplo de fonte de
        mana é a <em>Hierarca Nobre (Noble Hierarch)</em>.</p>

        <br>

        <div class="row">
          <div class="col s12 l6 center-align">
            <img src="<?php echo base_url() . 'assets/img/noble-hierarch.png'; ?>" alt="" title="">
            <p>É fonte de mana.</p>
          </div>
          <div class="col s12 l6 center-align">
            <img src="<?php echo base_url() . 'assets/img/dark-ritual.jpg'; ?>" alt="" title="">
            <p>Não é fonte de mana.</p>
          </div>
        </div>

        <h2 id="color-distribution"><strong>Distribuindo as Cores</strong></h2>

        <p>Caso o seu deck seja monocolorido, este tópico não lhe será de grande
        utilidade. Porém, sinta-se livre para continuar com a leitura, pois o conhecimento
        adquirido nesta parte poderá ser aplicado em qualquer combinação de cores</p>

        <p>Apesar de o cálculo da distribuição de cores parecer mais simples do que o
        que utilizamos para descobrir a quantidade de terrenos, deve-se tomar cuidado, pois,
        quanto mais cores o seu deck tiver, mais difícil será de distribuir. Tenha em mente que
        isso se trata de probabilidade. Logo, além da devida distribuição de cores, provavelmente
        será necessário fazer uso de outros artifícios (como terrenos que geram mais de uma
        cor, outras fontes de mana, etc.) para que você possua todas as cores de mana
        necessárias.</p>

        <p>Antes de irmos para o cálculo, separe todas as cartas do seu deck, de acordo
        com as cores de seu custo. Desconsidere a quantidade de mana incolor que a
        carta possui, mas leve em consideração todos os manas coloridos. Deste modo, se
        uma carta custa 1 incolor e 2 coloridas ( <i class="ms ms-cost ms-c"></i> <i class="ms ms-cost ms-w"></i> <i class="ms ms-cost ms-w"></i> ),
        iremos contabilizar como 2 brancas. Você também deverá contar com qualquer
        custo colorido que apareça no restante da carta. Por exemplo:</p>

        <br>

        <div class="row no-margin-bottom">
          <div class="col s12 center-align">
            <img src="<?php echo base_url() . 'assets/img/stoneforge-mystic.jpg'; ?>" alt="" title="">
          </div>
        </div>

        <br>

        <p>A carta acima conta como 2 manas brancos.</p>

        <p>Com todas as suas cores devidamente contabilizadas, basta fazer um cálculo
        simples de porcentagem. Ou seja, a soma total de uma cor, dividida pelo
        total de cores, multiplicado por 100. Digamos, então, que temos os seguintes
        valores:</p>

        <p><strong>Branco:</strong> 22<br>
        <strong>Azul:</strong> 18</p>

        <p>A quantidade acima somará o total de <strong>40</strong> manas, que utilizaremos para
        calcular as porcentagens:</p>

        <p><strong>Branco:</strong> 22 &divide; 40 x 100 = 55.0%<br>
        <strong>Azul:</strong> 18 &divide; 40 x 100 = 45.0%</p>

        <p>Com as devidas porcentagens, basta distribuir as cores de acordo com
        a quantidade de terrenos resultantes do cálculo da curva de mana. Se
        nosso deck tiver <strong>20</strong> terrenos, ficará assim:</p>

        <p>20 x 0,55 = 11<br>
        20 x 0,45 = 9</p>

        <p>Totalizando <strong>11</strong> terrenos brancos e <strong>9</strong>
        terrenos azúis.</p>

        <p>Com relação aos terrenos que geram mais de uma cor, você poderá
        calcular a distribuição como se este terreno valesse dois. Deste jeito,
        caso o seu deck precise de uma distribuição de mana que forneça mais
        azul do que os nove terrenos azúis, poderá, por exemplo, substituir
        dois terrenos brancos por dois terrenos que gerem branco e azul.</p>

        <p>Essa regra de distribuição irá variar bastante, de modo que não
        há uma explicação exata do que fazer. Agora que a sua curva de mana está devidamente
        calculada, a melhor coisa a se dedicar é jogar, avaliar o comportamento
        de seu deck e realizar as devidas correções (caso sejam necessárias).</p>
      </article>
    </div>

    <div class="col s12 l4 hide-on-med-and-down">
      <div class="field radius index-menu-container">
        <ul class="index-menu">
          <li><a href="#how-it-works">Como o Cálculo Funciona?</a></li>
          <li><a href="#lands-quantity">Descobrindo a Quantidade de Terrenos</a></li>
          <li><a href="#color-distribution">Distribuindo as Cores</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('app/footer'); ?>
