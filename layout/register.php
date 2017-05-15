<div class="ui stackable middle aligned center aligned grid" id="top-login-regis">
    <div class="column" id="content-login-regis">
        <a href="?p=content-home">
            <img class="ui centered medium image" src="public/images/logo.png">
        </a>

        <p class="ui header">Daftar akun baru sekarang</p>
        </br>

        <form class="ui form">
            <div class="field">
                <input type="text" name="nama" placeholder="Nama Lengkap">
            </div>
            <div class="field">
                <input type="email" name="email" placeholder="E-mail">
            </div>
            <div class="inline fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="laki" check="" tabindex="0" class="hidden">
                        <label>Laki-laki</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="perempuan" check="" tabindex="0" class="hidden">
                        <label>Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="ui labeled input">
                    <div class="ui label">
                        cloth.gravicodev.id/
                    </div>
                    <input type="text" name="username" placeholder="username">
                </div>
            </div>
            <div class="field">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="field">
                <p class="ui left aligned container">Dengan klik daftar, kamu telah menyetujui Aturan Penggunaan dan Kebijakan Privasi dari Gravicloth.</p>
            </div>
            <input class="ui fluid primary button" type="submit" value="Daftar">
        </form>
        </br>
        <div class="ui horizontal divider">Atau</div>
        </br>
        <button class="ui facebook button"><i class="facebook icon"></i>Daftar dengan Facebook</button>
        <button class="ui google plus button"><i class="google icon"></i>Daftar dengan Google</button>
        </br>
        </br>
        <p>Sudah punya akun? <a href="?p=login">Silakan Login</a></p>
    </div>
</div>


<script>
    $('.ui.radio.checkbox').checkbox();
</script>