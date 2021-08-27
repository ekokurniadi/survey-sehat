<section class="contact_us">
    <div class="modal fade" id="modalGantiPassword" tabindex="-1" aria-labelledby="modalGantiPassword" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="<?php echo base_url('image/survey-sehat.jpeg') ?>" width="10%" alt="">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password Login Anda</h5>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table style="vertical-align: top;" width="100%">
                        <form method="POST" id="form_ganti" class="needs-validation" novalidate="" enctype="multipart/form-data">
                            <form accept-charset="UTF-8" role="form" class="form-signin">
                                <tr>
                                    <td><input type="text" required class="tanya" readonly name="username" id="username" placeholder="Email" value="<?php echo $_SESSION['email'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="password" required class="tanya" name="oldpassword" id="oldpassword" placeholder="Password baru anda">
                                        <button type="button" style="background-color:transparent;border:none;margin-left:-50px;">
                                            <i class="fa fa-eye" onclick="TogglePass()"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="password" onkeyup="cekKecocokanPassword()" required class="tanya" name="confirm" id="confirm" placeholder="Confirm Password">
                                        <button type="button" style="background-color:transparent;border:none;margin-left:-50px;">
                                            <i class="fa fa-eye" onclick="TogglePassConfirm()"></i>
                                        </button>
                                        <p id="error"></p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <button type="submit" id="submitGantiPassword" class="btn btn-flat btn-primary mt-2"><span class="fa fa-save"></span> Simpan</button>
                                    </td>
                                </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // Change the type of input to password or text
    function TogglePass() {
        var temp = document.getElementById("oldpassword");
        if (temp.type === "password") {
            temp.type = "text";
        } else {
            temp.type = "password";
        }
    }

    function TogglePassConfirm() {
        var temp = document.getElementById("confirm");
        if (temp.type === "password") {
            temp.type = "text";
        } else {
            temp.type = "password";
        }
    }

    function cekKecocokanPassword() {
        var confirmPassword = $('#confirm').val();
        var error = document.getElementById('error');
        var oldPassword = $('#oldpassword').val();
        if (oldPassword == "") {
            $('#submitGantiPassword').attr('disabled', true);
        }

        if (confirmPassword !== oldPassword) {
            error.innerHTML = "Password tidak cocok";
            $('#submitGantiPassword').attr('disabled', true);
        } else {
            error.innerHTML = "Password cocok";
            $('#submitGantiPassword').attr('disabled', false);
        }
    }

    $(document).ready(function() {
        var oldPassword = $('#oldpassword').val();
        if (oldPassword == "") {
            $('#submitGantiPassword').attr('disabled', true);
        }
    });
</script>