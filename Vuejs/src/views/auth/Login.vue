<template>
    <div>
        <p v-if="error" class="alert-error position-absolute">{{ error }}</p>
        <div class="login">
            <div class="top d-flex align-items-center justify-content-center">
                <div class="col1">
                    <div class="logo">
                        <img src="https://static.xx.fbcdn.net/rsrc.php/y8/r/dF5SId3UHWd.svg" alt="">
                    </div>
                    <div class="title">
                        <h2>Recent logins</h2>
                        <span>Click your picture or add an account.</span>
                    </div>
                    <div class="option-account mt-4 d-flex">
                        <div class="my-account d-flex align-items-center">
                            <a href="">
                                <img src="https://scontent.fhan3-5.fna.fbcdn.net/v/t1.30497-1/143086968_2856368904622192_1959732218791162458_n.png?stp=dst-png_p160x160&_nc_cat=1&ccb=1-7&_nc_sid=dbb9e7&_nc_ohc=ZKoekN_r_owAX-RQd2b&_nc_ht=scontent.fhan3-5.fna&oh=00_AfDeFZMOOFHp3UYT-d8W-clAm6ldFiZ_kANgXWldZCOZiw&oe=6440E1F8"
                                    alt="">
                                <p>Lợi Superman</p>
                            </a>
                            <i class="remove-account bi bi-x"></i>
                        </div>
                        <div class="create-account">
                            <a href="">
                                <div class="icon-create">
                                    <i class="bi bi-plus-lg"></i>
                                </div>
                                <p>Add Account</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col2">
                    <form @submit.prevent="actionLogin" class="form">
                        <div class="form-group mb-3">
                            <input class="form-control" type="email" placeholder="Email address or phone number"
                                v-model="credentials.email">
                        </div>
                        <div class="form-group mb-3">
                            <input class="form-control" type="password" placeholder="Password"
                                v-model="credentials.password">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-login mb-3">Login</button>
                        </div>
                        <div class="forgot">
                            <a href="">Forgotten password?</a>
                        </div>
                        <div>
                            <button @click="redirectRegister" class="btn btn-success btn-create mt-3">Create new
                                account</button>
                        </div>
                    </form>
                    <!-- <p class="text-foot">Create a Page for a celebrity, brand or business.</p> -->
                </div>
            </div>
        </div>
        <div class="footer">
            <p>English (UK)
                Tiếng Việt
                中文(台灣)
                한국어
                日本語
                Français (France)
                ภาษาไทย
                Español
                Português (Brasil)
                Deutsch
                Italiano
            </p>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { useRouter } from 'vue-router';
import { useAuthStore } from '@/stores/useAuth';
import { ref } from 'vue';

const credentials = ref({});
const router = useRouter();
const error = ref('')

const actionLogin = (() => {
    useAuthStore()
        .login(credentials.value)
        .then(() => router.push({ name: "home-page", params: {} }))
        .catch((e) => {
            error.value = e.response.data.message
        })
})

const redirectRegister = (() => router.push({ name: "register", params: {} }))

</script>

<style scoped>
.login {
    padding-top: 100px;
    background: #f0f2f5;
    width: 100%;
    height: 100%;
    padding-bottom: 150px;
}

.col1,
.col2 {
    margin: 0px 115px;
}

.col2 {
    margin-top: 20px;
}


.logo img {
    width: 200px;
    margin-right: 10px;
}

.title h2 {
    font-size: 30px;
    margin-bottom: 0;
}

.my-account a {
    border-radius: 10px;
    text-decoration: none;
    color: #474646;
    background-color: #ffffff;
    font-size: 16px;
    border: 1px solid #c9ccd1;
}

.my-account img {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.my-account p {
    text-align: center;
    margin: 8px 0;
}

.remove-account {
    position: absolute;
    top: 6px;
    left: 8px;
    font-size: 10px;
    color: #ffffff;
    background-color: #878788;
    padding: 0px 3px;
    border-radius: 100%;
    cursor: pointer;
}

.remove-account:hover {
    top: 0px;
    left: 0px;
    font-size: 16px;
    padding: 0px 4px;
    background-color: #ffffff;
    color: #474646;
    font-weight: bold;
}

.create-account {
    margin-left: 20px;
    width: 162px;
    height: 203.69px;
    border-radius: 10px;
    text-align: center;
    border: 1px solid #c9ccd1;
    background-color: #ffffff;
}

.icon-create {
    padding-top: 70px;
    width: 160px;
    height: 160px;
    background-color: #f5f6f7;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.create-account a {
    font-size: 18px;
    text-decoration: none;
}

.create-account i {
    margin-top: 100px;
    font-weight: bold;
    color: #fff;
    font-size: 25px;
    background-color: rgb(27, 136, 238);
    border-radius: 100%;
    padding: 3px 5px;
}

.create-account p {
    background-color: #ffffff;
    margin-top: 7px;
}

.col2 {
    width: 396px;
    height: 340.86px;
    background-color: #ffffff;
    border-radius: 10px;
}

.form {
    text-align: center;
    padding: 15px;
}

.form input {
    width: 364px;
    height: 52px;
}

.btn-login {
    width: 100%;
    height: 48px;
}

.forgot a {
    text-decoration: none;
}

.forgot a:hover {
    text-decoration: underline;
}

.forgot {
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
    width: 100%;
}

.btn-create {
    padding: 13px 25px;
    background-color: #42b72a;
    outline: none;
    border: none;
    font-weight: bold;
}

.alert-error {
    top: 50px;
    left: 36%;
    z-index: 111;
    padding: 20px;
    width: 450px;
    color: #fff;
    font-size: 16px;
    background-color: rgb(255, 62, 62);
    text-align: center;
    border-radius: 10px;
    opacity: 0.6;
    font-weight: bold;
}

.footer {
    text-align: center;
    padding-top: 20px;
    color: #706d6d;
}
</style>