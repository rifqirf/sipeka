
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

<!-- Stuff below is for demo-only -->
<script type="text/javascript" src="assets/lib/main.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="assets/lib/chart.sample.js"></script>
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css">
<script>
var id_kelompok = document.getElementById("raport_id_kelompok");
var siswa = document.getElementById("no_induk");

function loadSiswa(){
    var xhr = new XMLHttpRequest();
    var url = "<?= base_url() ?>siswa/data/?id=" + id_kelompok.value;
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

// function isiRaport() {
//   let id_kelompok = document.getElementById("id_kelompok");
//   let no_induk = document.getElementById("no_induk");
//   let semester = document.getElementById("semester");
//   let tahun_ajaran = document.getElementById("tahun_ajaran");

//   let nilai_raport = document.getElementById("raport");
//   var xhr = new XMLHttpRequest();
//     var url = "<?= base_url() ?>raport/nilai/?id_kelompok=" + id_kelompok + "&no_induk=" + no_induk + "&semester=" + semester + "&tahun_ajaran=" + tahun_ajaran;
    
//     xhr.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status == 200){
//             // console.log(this.responseText);
//             // var res = JSON.parse(this.responseText);
//             // console.log(res);
//             nilai_raport.innerHTML = this.responseText;
//         }
//     };
//     xhr.open("GET", url, true);
//     xhr.send();
// }

</script>
</body>
</html>