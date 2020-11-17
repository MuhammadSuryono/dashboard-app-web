/* eslint-disable object-curly-newline */

/* global Chart */

/**
 * --------------------------------------------------------------------------
 * CoreUI Boostrap Admin Template (v3.0.0): main.js
 * Licensed under MIT (https://coreui.io/license)
 * --------------------------------------------------------------------------
 */

/* eslint-disable no-magic-numbers */
// random Numbers
var random = function random() {
  return Math.round(Math.random() * 100);
}; // eslint-disable-next-line no-unused-vars

var url = window.location.href;
var arr = url.split("/");
var base_url = arr[0] + "//" + arr[2];
var result_chart;

// var linechart = new Chart(document.getElementById('canvas-1');

$(document).on('click', '#chart_search', function(){

  var result;
  $.ajax({
    method: "GET",
    url: base_url+'/report/penjualan-today',
    data: {
      month: $('#month').val(),
      year: $('#year').val(),
    },
    async: false,
  })
  .done(function(res){
    console.log(res);
    result = JSON.parse(res);
  })
  .fail(function(res){
    console.log(res);
  })

  var config = {
    type: 'line',
    data: {
      labels: result['labels'],
      datasets: [{
        label: result['label'],
        backgroundColor: 'rgba(151, 187, 205, 0.2)',
        borderColor: 'rgba(0,85,122,1)',
        pointBackgroundColor: 'rgba(224,7,7,1.00)',
        pointBorderColor: '#fff',
        data: result['data']
      }]
    },
    options: {
      responsive: true,
      scales: {
        yAxes: [{
            id:'main-axis',
            ticks: {
                 stepSize: 20000 // this worked as expected
                    }
               }]
    }
    }
  };

  chart(config);
})

$.ajax({
  method: "GET",
  url: base_url+'/report/penjualan-today',
  data: {},
  async: false,
})
.done(function(res){
  result_chart = JSON.parse(res);
})
.fail(function(res){
  console.log(res);
})

var config = {
  type: 'line',
  data: {
    labels: result_chart['labels'],
    datasets: [{
      label: result_chart['label'],
      backgroundColor: 'rgba(151, 187, 205, 0.2)',
      borderColor: 'rgba(0,85,122,1)',
      pointBackgroundColor: 'rgba(224,7,7,1.00)',
      pointBorderColor: '#fff',
      data: result_chart['data']
    }]
  },
  options: {
    responsive: true,
    scales: {
      yAxes: [{
          id:'main-axis',
          ticks: {
               stepSize: 20000 // this worked as expected
                  }
             }]
  }
  }
};

chart(config);

function chart(config) {
  let chrt = new Chart(document.getElementById('canvas-1'), config); 
  chrt.update();
  // new Chart(document.getElementById('canvas-1'), config); 
}


var barChart = new Chart(document.getElementById('canvas-2'), {
  type: 'bar',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [{
      backgroundColor: 'rgba(220, 220, 220, 0.5)',
      borderColor: 'rgba(220, 220, 220, 0.8)',
      highlightFill: 'rgba(220, 220, 220, 0.75)',
      highlightStroke: 'rgba(220, 220, 220, 1)',
      data: [random(), random(), random(), random(), random(), random(), random()]
    }, {
      backgroundColor: 'rgba(151, 187, 205, 0.5)',
      borderColor: 'rgba(151, 187, 205, 0.8)',
      highlightFill: 'rgba(151, 187, 205, 0.75)',
      highlightStroke: 'rgba(151, 187, 205, 1)',
      data: [random(), random(), random(), random(), random(), random(), random()]
    }]
  },
  options: {
    responsive: true
  }
}); // eslint-disable-next-line no-unused-vars

var doughnutChart = new Chart(document.getElementById('canvas-3'), {
  type: 'doughnut',
  data: {
    labels: ['Red', 'Green', 'Yellow'],
    datasets: [{
      data: [300, 50, 100],
      backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
      hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
    }]
  },
  options: {
    responsive: true
  }
}); // eslint-disable-next-line no-unused-vars

var radarChart = new Chart(document.getElementById('canvas-4'), {
  type: 'radar',
  data: {
    labels: ['Eating', 'Drinking', 'Sleeping', 'Designing', 'Coding', 'Cycling', 'Running'],
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgba(220, 220, 220, 0.2)',
      borderColor: 'rgba(220, 220, 220, 1)',
      pointBackgroundColor: 'rgba(220, 220, 220, 1)',
      pointBorderColor: '#fff',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(220, 220, 220, 1)',
      data: [65, 59, 90, 81, 56, 55, 40]
    }, {
      label: 'My Second dataset',
      backgroundColor: 'rgba(151, 187, 205, 0.2)',
      borderColor: 'rgba(151, 187, 205, 1)',
      pointBackgroundColor: 'rgba(151, 187, 205, 1)',
      pointBorderColor: '#fff',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(151, 187, 205, 1)',
      data: [28, 48, 40, 19, 96, 27, 100]
    }]
  },
  options: {
    responsive: true
  }
}); // eslint-disable-next-line no-unused-vars

var pieChart = new Chart(document.getElementById('canvas-5'), {
  type: 'pie',
  data: {
    labels: ['Red', 'Green', 'Yellow'],
    datasets: [{
      data: [300, 50, 100],
      backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
      hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
    }]
  },
  options: {
    responsive: true
  }
}); // eslint-disable-next-line no-unused-vars

var polarAreaChart = new Chart(document.getElementById('canvas-6'), {
  type: 'polarArea',
  data: {
    labels: ['Red', 'Green', 'Yellow', 'Grey', 'Blue'],
    datasets: [{
      data: [11, 16, 7, 3, 14],
      backgroundColor: ['#FF6384', '#4BC0C0', '#FFCE56', '#E7E9ED', '#36A2EB']
    }]
  },
  options: {
    responsive: true
  }
});
//# sourceMappingURL=charts.js.map