<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Form Pengajuan Dinas </h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard v2</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <div class="col-md-12">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item bg-success active"><a class="nav-link" @click="reset" href="#permohonan1" data-toggle="tab">Permohonan Dinas</a></li>&nbsp;
                            <li class="nav-item bg-success"><a class="nav-link" href="#permohonan2" data-toggle="tab">Detail</a></li>&nbsp;
                        </ul>

                    </div>

                </div>
                <div class="body-inner">
                <div class="tab-content col-md-12 mt-3">
                    <div class="tab-pane " id="permohonan1">
                        <div class="row mt-3 bg-white" >
                            <div class="col-sm-10">
                                <div class ="form group">
                                    <label class="col-sm-12 control-label">Tingkat Menurut Peraturan Dinas</label>
                                    <div class="col-sm-12">
                                        <input type="text" v-model="d.t_m_p_dinas"  class="form-control"
                                               :class="{ 'is-invalid': d.errors.has('t_m_p_dinas') }">
                                        <has-error :form="d" field="t_m_p_dinas"></has-error>
                                    </div>


                                </div>
                                <div class ="form group">
                                    <label class="col-sm-12 control-label">Maksud Perjalanan</label>
                                    <div class="col-sm-12">
                                        <input type="" v-model="d.maksud_perjalanan" class="form-control"
                                               :class="{ 'is-invalid': d.errors.has('maksud_perjalanan') }">
                                        <has-error :form="d" field="maksud_perjalanan"></has-error>
                                    </div>


                                </div>
                                <div class ="form group">
                                    <label class="col-sm-12 control-label">Alat Transportasi</label>
                                    <div class="col-sm-12">
                                        <input type="" v-model="d.alat_transportasi" class="form-control"
                                               :class="{ 'is-invalid': d.errors.has('alat_transportasi') }">
                                        <has-error :form="d" field="alat_transportasi"></has-error>
                                    </div>


                                </div>
                                <div class ="form group">
                                    <label class="col-sm-12 control-label">Tempat Berangkat</label>
                                    <div class="col-sm-12">
                                        <input type="" v-model="d.tempat_berangkat" class="form-control"
                                               :class="{ 'is-invalid': d.errors.has('tempat_berangkat') }">
                                        <has-error :form="d" field="tempat_berangkat"></has-error>
                                    </div>


                                </div>
                                <div class ="form group">
                                    <label class="col-sm-12 control-label">Tempat Tujuan</label>
                                    <div class="col-sm-12">
                                        <input type="" v-model="d.tempat_tujuan" class="form-control"
                                               :class="{ 'is-invalid': d.errors.has('tempat_tujuan') }">
                                        <has-error :form="d" field="tempat_tujuan"></has-error>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label class="col-sm-12 control-label">Tanggal Berangkat</label>
                                            <div class="col-sm-12" >

                                                <input type="date" v-model="d.tanggal_berangkat" class="form-control"
                                                       :class="{ 'is-invalid': d.errors.has('tanggal_berangkat') }">
                                                <has-error :form="d" field="tanggal_berangkat"></has-error>
                                            </div>


                                        </div>
                                        <div class="row mt-3">
                                            <label class="control-label"></label>

                                            <div class="row col-sm-12">
                                                <label class="control-label mt-3"> - </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <label class="col-sm-12 control-label">Tanggal kembali</label>
                                            <div class="col-sm-12">
                                                <input type="date" v-model="tanggal_kembali"  class="form-control"
                                                       :class="{ 'is-invalid': d.errors.has('tanggal_kembali') }">
                                                <has-error :form="d" field="tanggal_kembali"></has-error>
                                            </div>

                                        </div>

                                        <div class="row col-sm-2">
                                            <label class="col-sm-12 control-label">hari</label>
                                            <div class="col-sm-12">
                                                <input type="text" disabled v-model="d.jml" class="form-control">
                                            </div>

                                        </div>
                                        <label class="form-label red col-sm-12" v-show="error">{{ error }}</label>

                                    </div>

                                </div>
                                <div class ="form group">
                                    <label class="col-sm-12 control-label">Dikeluarkan Di</label>
                                    <div class="col-sm-12">
                                        <input type="" v-model="d.d_d" class="form-control"
                                               :class="{ 'is-invalid': d.errors.has('d_d') }">
                                        <has-error :form="d" field="d_d"></has-error>
                                    </div>
                                </div></br>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button @click.prevent="tambahDinas" type="submit"  class="btn btn-success">Submit</button>
                                    </div>
                                </div>





                            </div>

                        </div>






                        </div>
                    <div class="tab-pane active" id="permohonan2">
                        <div class="card-body bg-white">
                            <table class="table table-bordered" id="table">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Tempat Pengajuan</th>
                                    <th>Tujuan</th>
                                    <th>Transportasi</th>
                                    <th>Tempat Tujuan</th>
                                    <th style="width: 40px">Hari</th>
                                    <th>Tanggal Berangkat & Kembali</th>
                                    <th style="width: 40px">Aksi</th>
                                </tr>
                                <tr v-for="(d,no) in dinas ">
                                    <td>{{no+1}}</td>
                                    <td>{{d.t_m_p_dinas}}</td>
                                    <td>{{d.maksud_perjalanan}}</td>
                                    <td>{{d.alat_transportasi}}</td>
                                    <td>{{d.tempat_tujuan}}</td>
                                    <td>{{d.l_p_dinas}} hari</td>
                                    <td>{{d.tanggal_berangkat}} </td>
                                    <td>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editdinas" @click="modalDinas(d)"  title="edit">
                                            <i class="fa fa-edit"></i>
                                        </button>

                                        <router-link class="btn btn-warning btn-sm" :to="'/'+d.id" title="edit">
                                            <i class="fa fa-info-circle "></i>
                                        </router-link>


                                    </td>

                                </tr>
                                </tbody></table>
                        </div>

                    </div>


                    </div>

                </div>


                <div class="modal fade" id="editdinas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal- dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Pengajuan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <div class ="form group">
                                    <label class="col-sm-12 control-label">Tingkat Menurut Peraturan Dinas</label>
                                    <div class="col-sm-12">
                                        <input type="" v-model="d.t_m_p_dinas" class="form-control"
                                               :class="{ 'is-invalid': d.errors.has('t_m_p_dinas') }">
                                        <has-error :form="d" field="t_m_p_dinas"></has-error>
                                    </div>


                                </div>
                                <div class ="form group">
                                    <label class="col-sm-12 control-label">Maksud Perjalanan</label>
                                    <div class="col-sm-12">
                                        <input type="" v-model="d.maksud_perjalanan" class="form-control"
                                               :class="{ 'is-invalid': d.errors.has('maksud_perjalanan') }">
                                        <has-error :form="d" field="maksud_perjalanan"></has-error>
                                    </div>


                                </div>
                                <div class ="form group">
                                    <label class="col-sm-12 control-label">Alat Transportasi</label>
                                    <div class="col-sm-12">
                                        <input type="" v-model="d.alat_transportasi" class="form-control"
                                               :class="{ 'is-invalid': d.errors.has('alat_transportasi') }">
                                        <has-error :form="d" field="alat_transportasi"></has-error>
                                    </div>


                                </div>
                                <div class ="form group">
                                    <label class="col-sm-12 control-label">Tempat Berangkat</label>
                                    <div class="col-sm-12">
                                        <input type="" v-model="d.tempat_berangkat" class="form-control"
                                               :class="{ 'is-invalid': d.errors.has('tempat_berangkat') }">
                                        <has-error :form="d" field="tempat_berangkat"></has-error>
                                    </div>


                                </div>
                                <div class ="form group">
                                    <label class="col-sm-12 control-label">Tempat Tujuan</label>
                                    <div class="col-sm-12">
                                        <input type="" v-model="d.tempat_tujuan" class="form-control"
                                               :class="{ 'is-invalid': d.errors.has('tempat_tujuan') }">
                                        <has-error :form="d" field="tempat_tujuan"></has-error>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label class="col-sm-12 control-label">Tanggal Berangkat</label>
                                            <div class="col-sm-12" >

                                                <input type="date" v-model="d.tanggal_berangkat" class="form-control"
                                                       :class="{ 'is-invalid': d.errors.has('tanggal_berangkat') }">
                                                <has-error :form="d" field="tanggal_berangkat"></has-error>
                                            </div>


                                        </div>
                                        <div class="row mt-3">
                                            <label class="control-label"></label>

                                            <div class="row col-sm-12">
                                                <label class="control-label mt-3"> - </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <label class="col-sm-12 control-label">Tanggal kembali</label>
                                            <div class="col-sm-12">
                                                <input type="date" v-model="tanggal_kembali"  class="form-control"
                                                       :class="{ 'is-invalid': d.errors.has('tanggal_kembali') }">
                                                <has-error :form="d" field="tanggal_kembali"></has-error>
                                            </div>

                                        </div>

                                        <div class="row col-sm-2">
                                            <label class="col-sm-12 control-label">hari</label>
                                            <div class="col-sm-12">
                                                <input type="text" disabled v-model="d.jml" class="form-control">
                                            </div>

                                        </div>
                                        <label class="form-label red col-sm-12" v-show="error">{{ error }}</label>

                                    </div>

                                </div>
                                <div class ="form group">
                                    <label class="col-sm-12 control-label">Dikeluarkan Di</label>
                                    <div class="col-sm-12">
                                        <input type="" v-model="d.d_d" class="form-control"
                                               :class="{ 'is-invalid': d.errors.has('d_d') }">
                                        <has-error :form="d" field="d_d"></has-error>
                                    </div>
                                </div><br>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button @click.prevent="editDinas" type="submit"  class="btn btn-success">Edit</button>
                                    </div>
                                </div>



                            </div>

                        </div>


                    </div>
                </div>


                </div>
        </div>
    </div>

</template>

<script>
    export default {
        data()
        {
            return{

                dinas:{},
                error: '',
                tanggal_kembali:'',

                d: new Form({
                    id:'',
                    t_m_p_dinas:'',
                    maksud_perjalanan:'',
                    alat_transportasi:'',
                    tempat_berangkat:'',
                    tempat_tujuan:'',
                    l_p_dinas:'',
                    tanggal_berangkat:'',
                    tanggal_kembali:'',
                    d_d:'',
                    jml:''

                })




            }
        },
        methods: {



            tambahDinas()
            {
                this.d.post('api/dinas').then(()=>{
                    Fire.$emit('AfterCreate')
                    toast({
                        type: 'success',
                        title: 'SURAT dinas berhasil diajukan'

                    })
                })
                    .catch(()=>{
                        toast({
                            type: 'error',
                            title: 'haraf isi form terlebih dahulu'
                        })

                    })
            },

            tanggalDinas(tgl)
            {
                let hari = 24*60*60*1000;
                let tanggal1= new Date (this.d.tanggal_berangkat);
                let tanggal2= new Date (this.tanggal_kembali);
                let totalhari = Math.round((tanggal2.getTime() - tanggal1.getTime()));
                if (totalhari < 1){
                    this.error = 'input tanggal dengan benar'
                }
                else {

                    let total = Math.round(Math.abs((tanggal2.getTime() - tanggal1.getTime())/(hari)));
                    this.d.tanggal_kembali = tgl;
                    this.d.jml = total;
                    this.error = '';

                }

            },

            tampilDinas()
            {
                axios.get('api/dinas').then(({data}) => (this.dinas = data))

            },

            editDinas()
            {
                this.d.put('api/dinas/'+this.d.id).then(()=>{
                    Fire.$emit('AfterCreate');
                    swal(
                        'update!',
                        'data berhasil diubah',
                        'success'

                    )
                    Fire.$emit('AfterCreate')
                    $('#editdinas').modal('hide');

                })
                    .catch(()=>{



                    })
            },
            reset()
            {
                this.d.reset()
                this.tanggal_kembali =''
            },

            modalDinas(dinas)
            {
                $('#editdinas').modal('show');
                this.d.fill(dinas)
                this.tanggal_kembali = dinas.tanggal_kembali

            }



            },






        created()
        {
            this.tampilDinas()

            Fire.$on('AfterCreate',() =>{
                this.tampilDinas();
            })

        },

        watch :{
            tanggal_kembali(value){
                this.tanggalDinas(value)
            }


        },
        mounted(){
            console.log('berhasil')
        }

    }
</script>
