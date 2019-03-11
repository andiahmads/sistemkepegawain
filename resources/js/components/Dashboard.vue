<style>
    @-webkit-keyframes putar {
        from {-webkit-transform: rotateY(0deg);}
        to {-webkit-transform: rotateY(-360deg);}}
    #gua, #gua  {

        -webkit-animation-name: putar;
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-duration: 6s;
    }

    #gua:hover {
        animation-play-state: paused;
        background:#ffff;}


</style>

<template>
    <div class="container">
        <div class="row mt-sm-2 ">
            <div class="col-md-12">

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Dashboard </h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <router-link class="breadcrumb-item active" to="/dashboard">Dashboard v1</router-link>
                                    <router-link class="breadcrumb-item active" to="/dasboard2">Dashboard v2</router-link>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3" >
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Pengguna</span>
                                <span class="info-box-number">{{countuser}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user-tie "></i></span>

                            <div class="info-box-content" >
                                <span class="info-box-text">Jumlah Pegawai</span>
                                <span class="info-box-number">{{countpegawai}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-calendar"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Seluruh Cuti</span>
                                <span class="info-box-number">{{countcuti}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1">
                                <i class="fa fa-newspaper"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Pengajuan Dinas</span>
                                <span class="info-box-number">{{countdinas}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- USERS LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Seluruh Pengguna</h3>

                                <div class="card-tools">
                                    <span class="badge badge-danger"></span>
                                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0 ">
                                <ul class="users-list">
                                    <div class="col-md-12">
                                    <div class="row card-body mt-2">
                                            <div class="col-md-2 " v-for="user in users.data">
                                                <li>
                                                    <div id="gua">
                                                    <img :src="'img/profile/'+ user.photo" class="img-circle" height="100px" width="80px" alt="User Image">
                                                    <a class="users-list-name" href="#">{{user.name}}</a>
                                                    <span class="users-list-date">{{user.type}}</span></div>
                                                </li>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-body">
                                <div class=" float-right">
                                    <pagination  :data="users"
                                                 @pagination-change-page="getResults">
                                    </pagination>
                                </div>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!--/.card -->
                    </div>

                </div>

            </div>

        </div>
    </div>
</template>

<script>
    export default {


        data() {



            return {
                users:{},
                countuser: '',
                countpegawai: '',
                countcuti: '',

            }



        },

        methods: {

            allUser()
            {

                axios.get("api/user").then(({data}) => (this.users = data))
            },



            getResults(page = 1) {
                axios.get('api/user?page=' + page)
                    .then(response => {
                        this.users = response.data;
                    });
            },


            count()
            {
                axios.get('api/countall').then(({data}) =>
                    ([this.countuser = data.countuser,
                        this.countpegawai = data.countpegawai,this.countcuti = data.countcuti,
                        this.countdinas = data.countdinas]))
            },
        },



        created()
        {
            this.allUser();
            this.count();

        }





    }
</script>
