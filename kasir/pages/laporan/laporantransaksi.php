<div class="row">
   <div class="col-lg-4">
      <div class="card shadow b-20 mb-4">
         <div class="card-header b-h-20 py-3">
            <div class="m-0 font-weight-bold text-primary">
               <i class="fas fa-file-invoice-dollar"></i>
               Data Laporan
            </div>
         </div>
         <div class="card-body">
            <form action="" method="POST" onsubmit="return popUp(850, 500);">
               <div class="form-group">
                  <label class="lblInput">Awal</label>
                  <input type="date" class="form-control b-20" name="awal" id="awal"  required>
               </div>
               <div class="form-group">
                  <label class="lblInput">Akhir</label>
                  <input type="date" class="form-control b-20" name="akhir" id="akhir" required>
               </div>
               <button type="submit" name="submit" id="submit" class="btn mt-4 mb-3 btnMyPro box-shadow-none btn-block">Cetak</button>
            </form>
         </div>
      </div>
   </div>
</div>

<script>
   function popUp(w, h){
      const left   = (screen.width/2)-(w/2);
      const top    = (screen.height/2)-(h/2);
      const awal   = document.getElementById('awal').value;
      const akhir  = document.getElementById('akhir').value;
      const newWin = window.open ('pages/laporan/cetaklaporan.php?awal=' + awal + '&akhir=' + akhir, 'Laporan', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
   }
</script>