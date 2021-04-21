
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h6>Selamat Datang di Kelurahan Sulanjana, Kecamatan Jambi Timur, Kota Jambi</h6>
                </div>
                <div class="card-body">

<iframe width="100%" height="500" src="https://www.youtube.com/embed/fYYIwWBFYJI?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
              </div>
            </div>

          </div>

          
          <div class="row">
              
          </div>
        </section>
      </div>
    <?php $this->load->view('modal')?>
    
      <?php if($_SESSION['modal']=="1"){
        echo "<script>
        $('#myModal').show();
        </script>";
      }?>

<script>
    function destroy() {
        $('#myModal').hide();
        <?php $_SESSION['modal']="0";?>
    }
</script>

        
      