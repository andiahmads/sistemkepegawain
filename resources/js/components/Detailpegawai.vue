<style>
    .widget-user-header{
        background-position: center center;
        background-size: cover;
        height: 250px !important;
    }
    .widget-user .card-footer{
        padding: 0;
    }
</style>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black" style="background-image:url('./img/user-cover.jpg')">
                        <h3 class="widget-user-username">{{this.form.name}}</h3>
                        <h5 class="widget-user-desc">{{this.form.type}}</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" :src="getProfilePhoto()" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header"></h5>
                                    <span class="description-text"></span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header"></h5>
                                    <span class="description-text"></span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header"></h5>
                                    <span class="description-text"></span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active show" href="#data1" data-toggle="tab">Data 1</a></li>
                        <li class="nav-item"><a class="nav-link" href="#data2" data-toggle="tab">Data 2</a></li>
                        <li class="nav-item"><a class="nav-link" href="#data3" data-toggle="tab">Data 3</a></li>

                    </ul>
                </div> <!--end div card-header -->
                <div class="body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="data1">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nip</label>
                                    <div class="col-sm-6">
                                        <input type="" v-model="pegawai[0].nip" class="form-control" id="inputNip" placeholder="Nip"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-12">
                                        <input type="" v-model="pegawai[0].users[0].name"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Status Pegawai</label>
                                    <div class="col-sm-12">
                                        <input type="" v-model="pegawai[0].status_pegawai" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Gelap Depan</label>
                                    <div class="col-sm-12">
                                        <input type="" v-model="pegawai[0].gelar_depan" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Gelap Belakang</label>
                                    <div class="col-sm-12">
                                        <input type="" v-model="pegawai[0].gelar_belakang" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-12">
                                        <input type="radio" name="r1" value="laki_laki" :checked="pegawai[0].jenis_kelamin === 'laki_laki'"   class="minimal">
                                        <label class="form-check-label">Laki-Laki</label>
                                        <input type="radio" name="r1" value="perempuan" :checked="pegawai[0].jenis_kelamin === 'perempuan'" class="minimal">
                                        <label class="form-check-label">perempuan</label>
                                    </div>
                                </div>

                        </div>
                        <!--seting tab -->
                        <div class="tab-pane" id="data2">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                <div class="col-sm-12">
                                    <input type="text" :value="pegawai[0].tanggal_lahir | myDateLahir"  class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 control-label">Pangkat Golongan & Ruangan</label>
                                <div class="col-sm-12">
                                    <input type="" v-model="pegawai[0].p_g_r" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">NPWP</label>
                                <div class="col-sm-12">
                                    <input type="" v-model="pegawai[0].npwp" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jebatab</label>
                                <div class="col-sm-12">
                                    <input type="" v-model="pegawai[0].jabatan" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 control-label">Mata Pelajaran Spesialis</label>
                                <div class="col-sm-12">
                                    <input type="" v-model="pegawai[0].m_p_s" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Unit Kerja</label>
                                <div class="col-sm-12">
                                    <input type="" v-model="pegawai[0].unit_kerja" class="form-control">
                                </div>
                            </div>


                        </div> <!--end tab settng -->


                        <div class="tab-pane" id="data3">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Alamat Kantor</label>
                                <div class="col-sm-12">
                                    <input type="" v-model="pegawai[0].provinsi" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 control-label">Pendidikan Terakhir</label>
                                <div class="col-sm-12">
                                    <input type="" v-model="pegawai[0].pendidikan_terakhir" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nomor Telpon</label>
                                <div class="col-sm-12">
                                    <input type="" v-model="pegawai[0].no_hp" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="" v-model="pegawai[0].users[0].email" class="form-control">
                                </div>
                            </div>

                        </div>



                    </div> <!--tab content -->
                </div>


            </div>
        </div> <!--end div col-md-12 -->


    </div> <!--end div container -->






</template>

<script>
    export default {

        data(){
            return {
                pegawai: {},


                form: new Form({
                    id : '',
                    id_user : '',
                    name : '',
                    nip : '',
                    email : '',
                    password : '',
                    type : '',
                    bio : '',
                    photo : ''
                })
            }
        },

        methods: {

            getProfilePhoto(){

                let photo = (this.form.photo.length > 200) ? this.form.photo : "img/profile/"+ this.pegawai[0].users[0].photo;

                return photo;
            },



        },


        //untuk create api antara vue dan laravel
        created() {

            axios.get("api/pegawai/"+ this.$route.params.id)
                .then(({ data }) => (this.pegawai = data));


        }
    }
</script>
