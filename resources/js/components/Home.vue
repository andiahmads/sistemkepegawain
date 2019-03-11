<template>
<div class="container">
    <div class="row mt-3 mb-2">
        <div class="lockscreen-wrapper">
            <div class="lockscreen-logo">
                <h4>Selamat Datang Di Sistem Informasi Kepegawain Kemenag Kab.Kampar</h4>
                <h5><b>{{name}}</b></h5>
            </div>
            <!-- User name -->

            <!-- START LOCK SCREEN ITEM -->
            <div class="lockscreen-item">
                <!-- lockscreen image -->
                <div class="lockscreen-image">
                    <img :src="'img/profile/'+ photo"  alt="User Image">
                </div>
                <!-- /.lockscreen-image -->

                <!-- lockscreen credentials (contains the form) -->
                <form class="lockscreen-credentials">
                    <div class="input-group">
                        <h6>{{type}}</h6>

                        <div class="input-group-append">

                        </div>
                    </div>
                </form>
                <!-- /.lockscreen credentials -->

            </div>
            <!-- /.lockscreen-item -->
            <div class="help-block text-center">
                Jika Anda login Baru Pertama Kali Login anda harus melengkapi data anda pada link -><router-link to="/profile">Profil</router-link>
            </div><br>
            <div class="text-center">
                <a>Juga Anda Sudah Mengisi Data Maka Tidak Perlu lagi Melakukan Registrasi</a>
            </div>
            <div class="lockscreen-footer text-center">
                Copyright © 2019-2021 <b><a href="http://adminlte.io" class="text-black">AhasoftwareHouse</a></b><br>
                All rights reserved
            </div>
        </div>

    </div>


</div>
</template>


<script>
export default {

    data() {

        return {

            photo: '',
            name: '',
            type: '',

            form: new Form({
                id : '',
                name : '',
                email : '',
                password : '',
                type : '',
                bio : '',
                photo : ''
            })
        }
    },

    methods: {

        loadUsers(){
            axios.get("api/user").then(({data}) => (this.users = data));

        },


    },


    created()
    {
        this.photo = user.photo;
        this.name = user.name;
        this.type = user.type;
        this.loadUsers()
    }



}
</script>