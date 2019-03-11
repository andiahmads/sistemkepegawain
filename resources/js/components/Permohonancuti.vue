<template>
    <div class="container">
        <div class="row mt-2 mb-2">
            <div class="col-md-12">
                <h4><l>Daftar Permohonan Cuti Pegawai</l></h4>

                <div class="body">
                    <div class="card col-md card-success  card-outline">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item bg-success active"><a class="nav-link" href="#permohonan1" data-toggle="tab">Permohonan</a></li>&nbsp;
                                        <li class="nav-item bg-success"><a class="nav-link" href="#permohonan2" data-toggle="tab">Permohonan Diterima</a></li>&nbsp;
                                        <li class="nav-item bg-success"><a class="nav-link" href="#permohonan3" data-toggle="tab">Permohonan Ditolak</a></li>&nbsp;
                                    </ul>

                                </div>

                            </div>
                            <div class="tab-content col-md-12 mt-3">
                                <div class="tab-pane active" id="permohonan1">
                                    <div class="card" id="demo">

                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover">
                                                <tbody><tr>
                                                    <th>No</th>
                                                    <th>Nip</th>
                                                    <th>Nama</th>
                                                    <th>status pegawai</th>
                                                    <th>Jenis Cuti</th>
                                                    <th>Alasan</th>
                                                    <th>Tanggal Pengajuan</th>
                                                    <th>Lama Cuti</th>
                                                    <th>Status</th>
                                                    <th v-if="$gate.isPimpinan()">Modify</th>
                                                </tr>
                                                <tr v-for="(d,no) in proses">
                                                    <td>{{no+1}}</td>
                                                    <td>{{d.pegawai.nip}}</td>
                                                    <td>{{d.users.name}}</td>
                                                    <td>{{d.pegawai.status_pegawai}}</td>
                                                    <td>{{d.jenis_cuti}}</td>
                                                    <td>{{d.alasan_cuti}}</td>
                                                    <td>{{d.created_at | myDateLahir}}</td>
                                                    <td>{{d.tanggal_cuti | myDateLahir}} - {{d.tanggal_selesai | myDateLahir}}</td>

                                                    <td><span class="badge bg-primary"> {{d.status}}</span>

                                                    </td>


                                                    <td v-if="$gate.isPimpinan()">
                                                        <button class="btn btn-success btn-sm" @click="Terima(d)" title="terima permohonan">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                        <button type="button" data-toggle="modal" @click="showModal(d,d.users.id)" data-target="#komentar" class="btn btn-danger btn-sm" title="tolak permohonan">
                                                            <i class="fa fa-times-circle "></i>
                                                        </button>
                                                        <button type="button"  class="btn btn-warning btn-sm" @click="modalFoto(d.foto_cuti)" v-show="d.jenis_cuti == 'cuti sakit'" data-toggle="modal" data-target="#foto">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                </tbody></table>
                                        </div>

                                        <!-- /.card-body -->

                                        <div class="modal fade" id="komentar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"  id="exampleModalLongTitle">TambahKan Alasan Penolakan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form @submit.prevent="tolakCuti()">

                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Alasan Penolakan</label>
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control" v-model="c.keterangan"
                                                                :class="{ 'is-invalid': c.errors.has('keterangan') }"
                                                                    placeholder="Tuliskan Alasan Anda"></textarea>
                                                                <has-error :form="c" field="keterangan"></has-error>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="submit" class="btn btn-success">Kirim</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>

                                                        </div>


                                                    </div>
                                                    </form>
                                                    </div>


                                            </div>
                                        </div>


                                        <div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"  id="exampleModalLongTitle">Foto Surat Keterangan Sakit</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                        <div class="modal-body">

                                                            <div class="form-group "align="center">
                                                                <img class="img-fluid img-square img-bordered"  width="400" height="400"  :src="'img/bukticuti/'+ c.foto_cuti " alt="User profile picture">

                                                            </div>

                                                        </div>
                                                </div>


                                            </div>
                                        </div>




                                    </div>

                                </div>
                                <div class="tab-pane" id="permohonan2">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <tbody><tr>
                                                <th>No</th>
                                                <th>Nip</th>
                                                <th>Nama</th>
                                                <th>status pegawai</th>
                                                <th>Jenis Cuti</th>
                                                <th>Alasan</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Lama Cuti</th>
                                                <th>Status</th>
                                            </tr>
                                            <tr v-for="(d,no) in terima" v>
                                                <td>{{no+1}}</td>
                                                <td>{{d.pegawai.nip}}</td>
                                                <td>{{d.users.name}}</td>
                                                <td>{{d.pegawai.status_pegawai}}</td>
                                                <td>{{d.jenis_cuti}}</td>
                                                <td>{{d.alasan_cuti}}</td>
                                                <td>{{d.created_at | myDateLahir}}</td>
                                                <td>{{d.tanggal_cuti | myDateLahir}} - {{d.tanggal_selesai | myDateLahir}}</td>
                                                <td><span class="badge bg-success"> {{d.status}}</span></td>
                                            </tr>
                                            </tbody></table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="permohonan3">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <tbody><tr>
                                                <th>No</th>
                                                <th>Nip</th>
                                                <th>Nama</th>
                                                <th>status pegawai</th>
                                                <th>Jenis Cuti</th>
                                                <th>Alasan</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Lama Cuti</th>
                                                <th>Status</th>
                                            </tr>
                                            <tr v-for="(d,no) in tolak" v>
                                                <td>{{no+1}}</td>
                                                <td>{{d.pegawai.nip}}</td>
                                                <td>{{d.users.name}}</td>
                                                <td>{{d.pegawai.status_pegawai}}</td>
                                                <td>{{d.jenis_cuti}}</td>
                                                <td>{{d.alasan_cuti}}</td>
                                                <td>{{d.created_at | myDateLahir}}</td>
                                                <td>{{d.tanggal_cuti | myDateLahir}} - {{d.tanggal_selesai | myDateLahir}}</td>
                                                <td><span class="badge bg-danger"> {{d.status}}</span></td>
                                            </tr>
                                            </tbody></table>
                                    </div>
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
       data(){
           return {
               proses:{},
               tolak:{},
               terima:{},

               c: new Form({
                   id:'',
                   iduser:'',
                   status:'',
                   jml: '',
                   jenis_cuti: '',
                   tanggal_cuti: '',
                   tanggal_selesai: '',
                   keterangan: '',
                   foto_cuti: '',

               })
           }
       },

        methods:{

            modalFoto(data)
            {
              this.c.foto_cuti = data;

            },

           showModal(data,userid)
           {
               $('#komentar').modal('show');
               this.c.fill(data);
               this.c.iduser = userid;
           },




           Terima(id)
           {
               this.c.fill(id);
               this.c.status = 'diterima';

               swal({
                   title: 'Apa anda yakin ingin menyetujui?',

                   type: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Ya! Terima'
               }).then((result) =>{
                   if (result.value)
                   {
                        this.c.put('api/terima').then(() => {
                           swal(
                               'Disetujui!',
                               '.',
                               'success'
                           )
                           Fire.$emit('AfterCreate');


                       }).catch(() => {
                           swal("failed!", "Permohonan sudah Anda terima", "warning");
                           Fire.$emit('AfterCreate');

                       });
                   }
               })


           },

            tolakCuti()
            {
                let hari = 24*60*60*1000;
                let tanggal1= new Date (this.c.tanggal_cuti);
                let tanggal2 = new Date (this.c.tanggal_selesai);
                let total = Math.round(Math.abs((tanggal2.getTime() - tanggal1.getTime())/(hari)));
                this.c.jml = total;
                this.c.status = 'ditolak';

                    console.log(this.c.jml)

                this.c.put('api/terima').then(()=>{
                    toast({
                        type: 'success',
                        title: 'Permohonan ditolak'

                    })
                    Fire.$emit('AfterCreate');

                    $('#komentar').modal('hide');
                }).catch(()=>{

                })

            },


           tampilPegawai()

           {

               axios.get('api/datailcuti').then(({data}) => ([this.proses = data.proses,this.terima = data.terima,this.tolak = data.tolak]))

           },

        },

        created() {
           this.tampilPegawai();
           Fire.$on('AfterCreate',() => {
               this.tampilPegawai();


           });
            


        }


    }
</script>
