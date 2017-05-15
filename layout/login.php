<div class="ui stackable middle aligned center aligned grid" id="top-login-regis">
    <div class="column" id="content-login-regis">
        <a href="?p=content-home">
            <img class="ui centered medium image" src="public/images/logo.png">
        </a>

        <p class="ui header">Silahkan masuk ke dalam akun kamu</p>
        </br>

        <form class="ui form">
            <div class="field">
                <input type="text" name="user" placeholder="E-mail/Username">
            </div>
            <div class="field">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="inline fields">
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" tabindex="0" class="hidden">
                        <label>Ingat saya</label>
                    </div>
                </div>
            </div>
            <input class="ui fluid primary button" type="submit" value="Masuk">
            </br>
            <a>Lupa Password?</a>
        </form>

        </br>
        <div class="ui horizontal divider">Atau</div>
        </br>
        <button class="ui facebook button"><i class="facebook icon"></i>Masuk dengan Facebook</button>
        <button class="ui google plus button"><i class="google icon"></i>Masuk dengan Google</button>
        </br>
        </br>
        <p>Belum punya akun? <a href="?p=register">Daftar Sekarang</a></p>
    </div>
</div>

<script>
$('.ui.checkbox').checkbox();
</script>