<div class="container">
  <div class="row">
    <div class="col-lg-6 m-auto">
      <div class="contact-form">
        <?php
        $Msg = "";
        if (isset($_GET['error'])) {
          $Msg = "Lūdzu, aizpildiet visus nepieciešamos laukus, kas atzīmēti ar *!";
          echo '<div class="alert alert-danger">' . $Msg . '</div>';
        }

        if (isset($_GET['success'])) {
          $Msg = "Paldies, Jūsu ziņa ir saņemta! Mēs ar Jums drīz sazināsimies.";
          echo '<div class="alert alert-success">' . $Msg . '</div>';
        }
        ?>
        <div class="contact-form-body hide">
          <form method="post" action="core/mail.php">
            <label for="UName" class="required">Vārds</label>
            <input type="text" id="UName" name="UName" placeholder="Jānis Ozoliņš" class="form-control mb-2">
            <label for="Email" class="required">E-pasts</label>
            <input type="email" id="Email" name="Email" placeholder="janis@example.lv" class="form-control mb-2">
            <label for="Phone">Tel. numurs</label>
            <input type="number" id="Phone" name="Phone" placeholder="+371 25 255 255" class="form-control mb-2">
            <label for="Subject" class="required">Tēma</label>
            <input type="text" id="Subject" name="Subject" placeholder="Būvdarbu pieprasījums" class="form-control mb-2">
            <label for="Message" class="required">Jūsu ziņa</label>
            <textarea id="Message" name="msg" class="form-control mb-2"></textarea>
            <button type="submit" class="btn btn-secondary mt-5" name="btn-send" style="display: block; margin: 0 auto;">Aizsūtīt</button>
          </form>
        </div>
      </div>
    </div>
  </div>