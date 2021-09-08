</div>
<footer>
  <section class="footers">
    <div class="container">
      <div class="row ">
        <div class="col-md-4 justify-content-center py-2 first">
          <h4>Survey Sehat</h4>
          <div class="set2">&nbsp;</div>
          <ul style="list-style-type: none;margin: 0;padding: 0;">
            <li>
              <a href="<?= base_url('publics') ?>">Halaman Muka</a>
            </li>
            <li>
              <a href="<?= base_url('publics/perkenalan') ?>">Perkenalan</a>
            </li>
            <li>
              <a href="<?= base_url('publics/pointhadiah') ?>">Point & Hadiah</a>
            </li>
            <li>
              <a href="<?= base_url('publics/laporan_penelitian') ?>">Laporan Penelitian</a>
            </li>
            <li>
              <a href="<?= base_url('publics/faq') ?>">FAQ</a>
            </li>
            <li>
              <a href="<?= base_url('publics/contact') ?>">Hubungi Kami</a>
            </li>
          </ul>
        </div>
        <div class="col-md-4 justify-content-center py-2 first" id="tentangKami">
          <h4>Tentang Kami</h4>
          <div class="set2">&nbsp;</div>
          <div>
            <p v-html="tentang"></p>
          </div>
          <div>
            <i class="fa fa-map-marker"></i> Alamat
            <p v-html="alamat"></p>
          </div>
          <div>
            <i class="fa fa-phone"></i> Telp
            <p>{{telp}}</p>
          </div>
          <div>
            <i class="fa fa-whatsapp"></i> WhatsApp (WA Only)
            <p>{{wa}}</p>
          </div>
          <div>
            <i class="fa fa-envelope"></i> Email
            <p>{{email}}</p>
          </div>
        </div>
        <div class="col-md-4 justify-content-center py-2 first2">
          <h4>Ikuti Kami</h4>
          <div class="set2">&nbsp;</div>
          <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FArduino-459717717810121%2F&tabs=timeline&width=340&height=187&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=162345061140476" width="340" height="187" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-5 mb-5 footer-link">
          Copyright &copy; 2021 <a href="">Survey Sehat</a>. All Right reserved
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mb-5 footer-link text-right" style="font-size: 8pt;">
          Developed&copy;2021 by <a href="https://gocodings.web.app" target="_blank" style="font-size: 8pt;color:yellow">Gocodings.web.app</a>. All Right reserved
        </div>
      </div>
    </div>
  </section>
</footer>

<script>
  $(document).ready(function() {
    // load select2
    $('.select2').select2({
      width: 'resolve',
      placeholder: "Select an option",
    });

  });

  function success_send() {
    Swal.fire({
      title: 'Terima kasih, Pesan berhasil dikirimkan',
      width: 600,
      padding: '3em',
      background: '#fff url(https://sweetalert2.github.io/images/trees.png)',
      backdrop: `
    rgba(0,0,123,0.4)
    url("https://sweetalert2.github.io/images/nyan-cat.gif")
    left top
    no-repeat
  `
    })
  }

  function gagal_send() {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Something went wrong!',
      footer: '<a href="">Why do I have this issue?</a>'
    })
  }

  function validationError() {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Silahkan isi data dengan lengkap !',
      footer: '<a href="">Why do I have this issue?</a>'
    })
  }
</script>

<script>
  <?php $tentangKami = $this->db->get('profil_perusahaan')->row() ?>
  var tentangKami = new Vue({
    el: '#tentangKami',
    data: {
      tentang: <?php echo json_encode($tentangKami->tentang_perusahaan) ?>,
      telp: <?php echo json_encode($tentangKami->telp) ?>,
      alamat: <?php echo json_encode($tentangKami->alamat) ?>,
      wa: <?php echo json_encode($tentangKami->whatsapp) ?>,
      email: <?php echo json_encode($tentangKami->email) ?>,
    }
  });
</script>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>


<!-- load script chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<!-- Template JS File -->


<!-- Page Specific JS File -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script src=" https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src=" https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
<script type="text/javascript" src="<?= base_url() ?>assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
  tinymce.init({
    selector: ".textarea_editor",
    branding: false,
    plugins: [
      "advlist autolink link image lists charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
      "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
    ],
    toolbar1: "undo redo | bold italic underline",
    image_advtab: true,
  });
</script>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>

</body>

</html>