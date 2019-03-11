<style>
    .widget-user-header{
        background-position: center center;
        background-size: cover;
        height: 250% !important;
    }
    .widget-user .card-footer{
        padding: 1;
    }
</style>
<template>
    <div class="container">
        <div class="row mt-sm-2 ">


            <div class="col-md-12">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2" v-if="$gate.isAdmin()">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark" >Dashboard </h1>
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
                    <div class="col-lg-3 col-6">

                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3 v-if="$gate.isAdminOrPegawai()">{{prosesme}}<sup style="font-size: 20px"></sup></h3>

                                <h3 v-if="$gate.isPimpinan()">{{proses}}<sup style="font-size: 20px"></sup></h3>


                                <p>Permohonan Cuti</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3 v-if="$gate.isAdminOrPegawai()">{{terimame}}<sup style="font-size: 20px"></sup></h3>
                                <h3 v-if="$gate.isPimpinan()">{{terima}}<sup style="font-size: 20px"></sup></h3>

                                <p>Permohonan Yang Diterima</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3 v-if="$gate.isAdminOrPegawai()">{{tolakme}}<sup style="font-size: 20px"></sup></h3>
                                <h3 v-if="$gate.isPimpinan()">{{tolak}}<sup style="font-size: 20px"></sup></h3>


                                <p>Permohonan Yang Ditolak</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3 v-if="$gate.isAdminOrPegawai()">{{dinasme}}<sup style="font-size: 20px"></sup></h3>
                                <h3 v-if="$gate.isPimpinan()">{{countdinas}}<sup style="font-size: 20px"></sup></h3>


                                <p>Pengajuan Dinas</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="card card-success card-outline">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>

                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="img/1.png" style="height:300px;" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/2.jpg" style="height:300px;" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/3.jpg" style="height:300px;" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/4.jpg" style="height:300px;" alt="Four slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
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
                proses: '',
                terima: '',
                tolak: '',
                countdinas: '',
                terimame: '',
                prosesme: '',
                tolakme: '',
                dinasme: '',


            }


        },

        methods: {
            count()
            {
                axios.get('api/countall').then(({data}) =>
                    ([this.proses = data.proses,
                        this.terima = data.terima,this.tolak = data.tolak,
                        this.countdinas = data.countdinas,this.terimame = data.terimame,this.prosesme = data.prosesme,
                    this.tolakme = data.tolakme,this.dinasme = data.dinasme]))
            },
        },
        created()
        {
            this.count();

        }



    }
</script>