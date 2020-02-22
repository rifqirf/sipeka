
<div id="sample-modal" class="modal">
  <div class="modal-background jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Confirm action</p>
      <button class="delete jb-modal-close" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <p>This will permanently delete <b>Some Object</b></p>
      <p>This is sample modal</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button jb-modal-close">Cancel</button>
      <button class="button is-danger jb-modal-close">Delete</button>
    </footer>
  </div>
  <button class="modal-close is-large jb-modal-close" aria-label="close"></button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
<script>
  var ctx = document.getElementById("big-line-chart");
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: [<?php if($this->raport != null){foreach ($this->raport->get($raport["no_induk"]) as $key => $val) { echo '"' . $val['indikator'] . '",';}} ?>],
          datasets: [{
                  label: '# of Votes',
                  data: [<?php if($this->raport != null){foreach ($this->raport->get($raport["no_induk"]) as $key => $val) { echo '"' . (($val['rata2'] != null) ? $val['rata2'] : "0") . '",';}}?>],
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                      'rgba(255,99,132,1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 1
              }]
      },
      options: {
          scales: {
              yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
          }
      },
      responsive:true,
      maintainAspectRatio: false
  });
</script>

<!-- Stuff below is for demo-only -->
<script type="text/javascript" src="<?= base_url(); ?>assets/bulma/lib/main.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php //echo base_url(); ?>assets/bulma/lib/chart.sample.js"></script> -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css">

<!-- <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script> -->
<!-- <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script> -->

<script>
// Exit Modal
document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    $notification = $delete.parentNode;
    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });
});

//

// window.onload = function() {
 
//  var dataPoints = [];
  
//  var chart = new CanvasJS.Chart("chartContainer", {
//    animationEnabled: true,
//    theme: "light2",
//    zoomEnabled: true,
//    title: {
//      text: "Bitcoin Price - 2017"
//    },
//    axisY: {
//      title: "Price in USD",
//      titleFontSize: 24,
//      prefix: "$"
//    },
//    data: [{
//      type: "line",
//      yValueFormatString: "$#,##0.00",
//      dataPoints: dataPoints
//    }]
//  });
  
//  function addData(data) {
//    var dps = data.price_usd;
//    for (var i = 0; i < dps.length; i++) {
//      dataPoints.push({
//        x: new Date(dps[i][0]),
//        y: dps[i][1]
//      });
//    }
//    chart.render();
//  }

//  $.getJSON("https://canvasjs.com/data/gallery/php/bitcoin-price.json", addData);
  
//  }


// var id_kelompok = document.getElementById("raport_id_kelompok");
// var siswa = document.getElementById("no_induk");
// var ctx = document.getElementById('big-line-chart').getContext('2d');
// var xhr = new XMLHttpRequest();
// var res = null;
// var url = "<?php //echo base_url()."raport/getgrafikvalue/".$data['no_induk'] ?>";
// var grafik = [], datas = []; 
// xhr.onreadystatechange = function(){
//     if(this.readyState == 4 && this.status == 200){
//         // console.log(this.responseText);
//         var res = JSON.parse(this.responseText);
//         console.log(res);
//         for(let i=0; i < res.length; i++) {
//           if(res[i].rata2 != Numbe) {
//             grafik.push(parseInt(res[i].rata2));
//           } else {
//             grafik.push(0);
//           }
//         }
//         console.log(grafik);
//     }
// };
// xhr.open("GET", url, true);
// xhr.send();
// var chart = new Chart(ctx, {
//     // The type of chart we want to create
//     type: 'bar',

//     // The data for our dataset
//     data: {
//         labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
//         datasets: [{
//             label: 'My Good',
//             backgroundColor: 'rgb(255, 99, 132)',
//             borderColor: 'rgb(255, 99, 132)',
//             data: grafik
//         }]
//     },

//     // Configuration options go here
//     options: {}
// });
// var getDataGrafik = function getGrafik(no_induk) {
//     var data = [];
//     var xhr = new XMLHttpRequest();
//     var res = null;
//     var url = "<?php //echo base_url()."raport/getgrafikvalue/".$data['no_induk'] ?>";
//     xhr.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status == 200){
//             // console.log(this.responseText);
//             var res = JSON.parse(this.responseText);
//             for(let j = 0; j < res.length; j++) {
//               if(res[j].rata2 != null) {
//                 data.push(parseInt(res[j].rata2));
//               } else {
//                 data.push(0);
//               }
//             }
//             // console.log(data);
//         }
//     };
//     xhr.open("GET", url, true);
//     xhr.send();
//     console.log(data);
//     return [...data];
// };

//   var chartColors = {
//     default: {
//       primary: '#00D1B2',
//       info: '#209CEE',
//       danger: '#FF3860'
//     }
//   };

//   var ctx = document.getElementById('big-line-chart').getContext('2d');

//   var barChart = new Chart(ctx, {
//     type: 'bar',
//     data: {
//       datasets: [{
//         fill: false,
//         borderColor: chartColors.default.primary,
//         borderWidth: 2,
//         borderDash: [],
//         borderDashOffset: 0.0,
//         pointBackgroundColor: chartColors.default.primary,
//         pointBorderColor: 'rgba(255,255,255,0)',
//         pointHoverBackgroundColor: chartColors.default.primary,
//         pointBorderWidth: 16,
//         pointHoverRadius: 4,
//         pointHoverBorderWidth: 15,
//         pointRadius: 4,
//         lineTension: false,
//         data: getDataGrafik("<?php //echo $data['no_induk'] ?>")
//       }, {
//         fill: false,
//         borderColor: chartColors.default.info,
//         borderWidth: 2,
//         borderDash: [],
//         borderDashOffset: 0.0,
//         pointBackgroundColor: chartColors.default.info,
//         pointBorderColor: 'rgba(255,255,255,0)',
//         pointHoverBackgroundColor: chartColors.default.info,
//         pointBorderWidth: 20,
//         pointHoverRadius: 4,
//         pointHoverBorderWidth: 15,
//         pointRadius: 4,
//         lineTension: false,
//         data: getDataGrafik("<?php //echo $data['no_induk'] ?>")
//       }, {
//         fill: false,
//         borderColor: chartColors.default.danger,
//         borderWidth: 2,
//         borderDash: [],
//         borderDashOffset: 0.0,
//         pointBackgroundColor: chartColors.default.danger,
//         pointBorderColor: 'rgba(255,255,255,0)',
//         pointHoverBackgroundColor: chartColors.default.danger,
//         pointBorderWidth: 20,
//         pointHoverRadius: 4,
//         pointHoverBorderWidth: 15,
//         pointRadius: 4,
//         lineTension: false,
//         data: getDataGrafik("<?php //echo $data['no_induk'] ?>")
//       }
//     ],
//       labels: ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4']
//     },
//     options: {
//       maintainAspectRatio: false,
//       legend: {
//         display: false
//       },
//       responsive: true,
//       tooltips: {
//         backgroundColor: '#f5f5f5',
//         titleFontColor: '#333',
//         bodyFontColor: '#666',
//         bodySpacing: 4,
//         xPadding: 12,
//         mode: 'nearest',
//         intersect: 0,
//         position: 'nearest'
//       },
//       scales: {
//         yAxes: [{
//           barPercentage: 1,
//           gridLines: {
//             drawBorder: false,
//             color: 'rgba(29,140,248,0.0)',
//             zeroLineColor: 'transparent'
//           },
//           ticks: {
//             padding: 20,
//             fontColor: '#9a9a9a'
//           }
//         }],

//         xAxes: [{
//           barPercentage: 1,
//           gridLines: {
//             drawBorder: false,
//             color: 'rgba(225,78,202,0.1)',
//             zeroLineColor: 'transparent'
//           },
//           ticks: {
//             padding: 20,
//             fontColor: '#9a9a9a'
//           }
//         }]
//       }
//     }
//   });

function loadSiswa(){
    var xhr = new XMLHttpRequest();
    var url = "<?php //echo base_url() ?>siswa/data/?id=" + id_kelompok.value;
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            // console.log(this.responseText);
            var res = JSON.parse(this.responseText);
            // console.log(res);
            siswa.innerHTML = "";
            for(let i = 0; i < res.length; i++) {
              var data = document.createElement("option");
              data.text = res[i].nama_lengkap;
              data.value = res[i].no_induk;
              siswa.add(data);
            }
        }
    };
    xhr.open("GET", url, true);
    xhr.send();
}

function isiRaport() {
  let id_kelompok = document.getElementById("id_kelompok");
  let no_induk = document.getElementById("no_induk");
  let semester = document.getElementById("semester");
  let tahun_ajaran = document.getElementById("tahun_ajaran");

  let nilai_raport = document.getElementById("raport");
  var xhr = new XMLHttpRequest();
    var url = "<?php //echo base_url() ?>raport/nilai/?id_kelompok=" + id_kelompok + "&no_induk=" + no_induk + "&semester=" + semester + "&tahun_ajaran=" + tahun_ajaran;
    
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            // console.log(this.responseText);
            // var res = JSON.parse(this.responseText);
            // console.log(res);
            nilai_raport.innerHTML = this.responseText;
        }
    };
    xhr.open("GET", url, true);
    xhr.send();
}

</script>
</body>
</html>