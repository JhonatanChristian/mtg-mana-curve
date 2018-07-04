/**
 * MTG Mana Curve
 * @copyright 2017 MTG Mana Curve
 * GNU License
 */
$(document).ready(function(){

$('.carousel').carousel();
$(".button-collapse").sideNav();

$(document).on('change', '.count-trigger', function(){
  var lineLevel = $(this).data('lvl');

  //var costNumber = $('#line-' + lineLevel).find('[data-field="1"]').val();
  //var cardsNumber = $('#line-' + lineLevel).find('[data-field="2"]').val();
  //var result = costNumber * cardsNumber;

  //$('#line-' + lineLevel).find('[data-field="3"]').val(result);

  var costNumber = $('#line-' + lineLevel + ' .col input[data-field="1"]').val();
  var cardsNumber = $('#line-' + lineLevel + ' .col input[data-field="2"]').val();
  var result = costNumber * cardsNumber;

  $('#line-' + lineLevel + ' .col input[data-field="3"]').val(result);

  /* Shows total added cards */
  $('#display-total-cards').html(checkTotalAddedCards());

  /* Display calculation result */
  modifyLandsQuantity();

  modifyManaCurveChart();
});

/**
 * Check Total Added Cards
 *
 * Checks the total of cards added in the calculator.
 *
 * @return int
 */
var checkTotalAddedCards = function(){
  var totalAddedCards = 0;

  $('.count-trigger[data-field="2"]').each(function(){
    if($(this).val() == ''){
      totalAddedCards += 0;
    } else {
      totalAddedCards += parseInt($(this).val());
    }
  });

  return totalAddedCards;
}

/**
 * Calculate Lands Quantity
 *
 * Calculate the total number of lands thats are need.
 *
 * @return float
 */
var calculateLandsQuantity = function(){
  var totalCards = 0;
  $('.count-trigger[data-field="2"]').each(function(){
    totalCards += parseInt($(this).val());
  });

  var totalResults = 0;
  $('.count-trigger[data-field="3"]').each(function(){
    totalResults += parseInt($(this).val());
  });

  var landsQuantity = totalResults / totalCards;

  return landsQuantity.toFixed(1);
}

/**
 * Modify Lands Quantity
 *
 * Modify the value of the element with .display-result class.
 *
 * @return null
 */
var modifyLandsQuantity = function(){
  if(!isNaN(calculateLandsQuantity())){
    $('.display-result').html(calculateLandsQuantity());
  } else {
    $('.display-result').html(0);
  }
}

$('.create-new-line').click(function(){
  var lineNumber = $('.values-line').length + 1;

  var content = '<div class="row line values-line" id="line-' + lineNumber + '">';
    content += '<div class="col s4">';
      content += '<input type="number" name="" value="" class="count-trigger" data-lvl="' + lineNumber + '" data-field="1">';
    content += '</div>';
    content += '<div class="col s4">';
      content += '<input type="number" name="" value="" class="count-trigger" data-lvl="' + lineNumber + '" data-field="2">';
    content += '</div>';
    content += '<div class="col s4">';
      content += '<input type="number" name="" value="" class="count-trigger" data-lvl="' + lineNumber + '" data-field="3">';
    content += '</div>';
  content += '</div>';

  $('.calculator-body').append(content);

  modifyLandsQuantity();

  modifyManaCurveChart()
});

$('.delete-last-line').click(function(){
  var numberLines = $('.values-line').length;

  if(numberLines != 1){
    $('#line-' + numberLines + '').remove();
  }

  /* Feedbacks */
  $('#display-total-cards').html(checkTotalAddedCards());

  modifyLandsQuantity();

  modifyManaCurveChart()
});

$(document).on('change', '.distribution-trigger', function(){
  var colorValues = {w:0, u:0, b:0, r:0, g:0};

  var currentColor = '';
  $('.color-distribution-calculator .distribution-trigger').each(function(){
    currentColor = $(this).data('color');

    if($(this).val() != ''){
      colorValues[currentColor] = parseInt($(this).val());
    } else {
      colorValues[currentColor] = 0;
    }
  });

  /* Make percentage */
  var totalOfColors = sumObjectValues(colorValues);
  var colorsPerCent = {w:0, u:0, b:0, r:0, g:0};
  var totalOfLands = $('#total_lands').val();
  var landsPerColor = {w:0, u:0, b:0, r:0, g:0};

  if(totalOfLands == ''){
    totalOfLands = 0;
  } else {
    totalOfLands = parseInt(totalOfLands);
  }

  $.each(colorValues, function(key, value){
    if(totalOfColors == 0){
      return false;
    }

    colorsPerCent[key] = (value / totalOfColors) * 100;

    if(colorsPerCent[key] != 0){
      landsPerColor[key] = (colorsPerCent[key] * totalOfLands) / 100;
    } else {
      landsPerColor[key] = 0;
    }

    $('.distribution-percentage').find('[data-color="' + key + '"]').html(colorsPerCent[key].toFixed(1));
    $('.distribution-percentage').find('[data-lands="' + key + '"]').html(Math.round(landsPerColor[key]));
  });

  /* Modify Color Distribution Chart */
  dataColorDistributionChart.datasets[0].data = [colorValues.w, colorValues.u, colorValues.b, colorValues.r, colorValues.g];

  colorDistributionChart.destroy();

  colorDistributionChart = new Chart(ctx, {
    type: 'pie',
    data: dataColorDistributionChart,
    options: optionsColorDistributionChart
  });
});

/**
 * Sum Object Values
 *
 * Make the sum of all object values.
 *
 * @return int|float
 */
var sumObjectValues = function( object ){
  var result = 0;

  $.each(object, function(key, value){
    result += value;
  });

  return result;
}

/**
 * ----------------------------------------------------------------------------
 * Charts
 * ----------------------------------------------------------------------------
 */
if($('#mana-curve-chart').length){
  Chart.defaults.global.maintainAspectRatio = false;

  var ctx = document.getElementById("mana-curve-chart").getContext('2d');

  var dataManaCurveChart = {
    labels: ["Waiting..."],
    datasets: [{
      label: '# of Cards',
      data: [0],
      backgroundColor: [
        'rgba(54, 162, 235, 0.2)'
      ],
      borderColor: [
        'rgba(54, 162, 235, 1)'
      ],
      borderWidth: 1
    }]
  };

  var optionsManaCurve = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero:true
        }
      }]
    }
  };

  var manaCurveChart = new Chart(ctx, {
      type: 'bar',
      data: dataManaCurveChart,
      options: optionsManaCurve
  });
}

/**
 * Modify Mana Curve Chart
 *
 * Modify the values of Mana Curve Chart.
 *
 * @return null
 */
var modifyManaCurveChart = function(){
  var cardsQuantity = [];
  var costs = [];
  var backgroundColor = [];
  var borderColor = [];

  var columnsCount = 0;
  $('.values-line').each(function(){
    costs[columnsCount] = 'Cost ' + $(this).find('[data-field="1"]').val();
    cardsQuantity[columnsCount] = $(this).find('[data-field="2"]').val();

    /* Set Colors. */
    backgroundColor[columnsCount] = 'rgba(54, 162, 235, 0.2)';
    borderColor[columnsCount] = 'rgba(54, 162, 235, 1)';

    /* Plus plus! */
    columnsCount++;
  });

  /* Modify Chart */
  dataManaCurveChart.labels = costs;
  dataManaCurveChart.datasets[0].data = cardsQuantity;
  dataManaCurveChart.datasets[0].backgroundColor = backgroundColor;
  dataManaCurveChart.datasets[0].borderColor = borderColor;

  manaCurveChart.destroy();

  manaCurveChart = new Chart(ctx, {
    type: 'bar',
    data: dataManaCurveChart,
    options: optionsManaCurve
  });
}

/* Color Distribution */
if($('#color-distribution-chart').length){
  Chart.defaults.global.maintainAspectRatio = false;

  var ctx = document.getElementById("color-distribution-chart").getContext('2d');

  var dataColorDistributionChart = {
    labels: ["White", "Blue", "Black", "Red", "Green"],
    datasets: [{
      label: '# of Color',
      data: [10, 10, 10, 10, 10],
      backgroundColor: [
        'rgba(249, 253, 192, 0.6)',
        'rgba(181, 205, 227, 0.6)',
        'rgba(172, 162, 154, 0.6)',
        'rgba(219, 134, 100, 0.6)',
        'rgba(147, 180, 131, 0.6)'
      ],
      borderColor: [
        'rgba(240, 242, 192, 1)',
        'rgba(181, 205, 227, 1)',
        'rgba(172, 162, 154, 1)',
        'rgba(219, 134, 100, 1)',
        'rgba(147, 180, 131, 1)'
      ],
      borderWidth: 1
    }]
  };

  var optionsColorDistributionChart = {
    responsive: true,
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero:true
        }
      }],
      xAxes: []
    }
  };

  var colorDistributionChart = new Chart(ctx, {
      type: 'pie',
      data: dataColorDistributionChart,
      options: optionsColorDistributionChart
  });
}

/**
 * Change Language
 */
$('.change-language').click(function(){
  var lang = $(this).data('lang');

  if(lang != ''){
    Cookies.remove('lang')
    Cookies.set('lang', lang);
  }

  window.location.reload();
});

});
