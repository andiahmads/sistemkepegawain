<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 mt-4">

                <div class="card card-success card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" :src="'img/profile/'+ photo" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{name}}</h3>

                        <p class="text-muted text-center">{{type}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>NIP:</b> <a class="float-right">{{p.nip}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Status Pegawai</b> <a class="float-right">{{p.status_pegawai}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Kuota Cuti Tahunan</b> <a class="float-right">{{p.k_c_tahunan}}</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModalLong"><b>Peraturan Cuti</b></a>
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Peraturan Cuti pada Sistem Ini</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="todo-list ui-sortable">
                                            <li>

                                                <p class="text">Setiap Pegawai wajib melengkapi data diri pada menu profil</p>
                                                <div class="tools">
                                                    <i class="fa fa-edit"></i>
                                                    <i class="fa fa-trash-o"></i>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="text">setiap pegawai memiliki kuota cuti tahunan sebanyak</span>
                                                <small class="badge badge-info"><i class="fa fa-clock-o"></i> 15 hari</small>
                                                <div class="tools">
                                                    <i class="fa fa-edit"></i>
                                                    <i class="fa fa-trash-o"></i>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="text">wajib mengisi setiap form yang disediakan</span>
                                                <div class="tools">
                                                    <i class="fa fa-edit"></i>
                                                    <i class="fa fa-trash-o"></i>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="text">jika memilih cuti sakit, waji serta kan foto surat keterangan dari dokter</span>
                                                <div class="tools">
                                                    <i class="fa fa-edit"></i>
                                                    <i class="fa fa-trash-o"></i>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="text">Batas waktu cuti melahirkan minimal 3 minggu atau lebih</span>
                                                <div class="tools">
                                                    <i class="fa fa-edit"></i>
                                                    <i class="fa fa-trash-o"></i>
                                                </div>
                                            </li>
                                            <li>


                                                <span class="text">batas cuti alasan penting tergantung dari alasan pegawai dan tidak lebih dari</span>
                                                <small class="badge badge-secondary"><i class="fa fa-clock-o"></i>2 minggu</small>
                                                <div class="tools">
                                                    <i class="fa fa-edit"></i>
                                                    <i class="fa fa-trash-o"></i>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.card-body -->
                </div>

            </div>

            <div class="col-sm-9 mt-4">
                <div class="card-header bg-white p-2 ">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active show" @click="reset" href="#pengajuancuti" data-toggle="tab">Pengajuan Cuti</a></li>
                        <li class="nav-item"><a class="nav-link" @click="tampilCuti" href="#riwayatpengajuan" data-toggle="tab">Riwayat Pengajuan</a></li>

                    </ul>

                    <div class="body mt-2 ">
                        <div class="tab-content">
                        <div class="tab-pane active" id="pengajuancuti">
                            <form class="form-horizontal bg-white">

                                <div class="form-group" >
                                    <label class="col-sm-2 control-label">Jenis Cuti</label>
                                    <div class="col-sm-12">
                                    <select name="type" class="form-control "v-model="jeniscuti"
                                            :class="{ 'is-invalid': c.errors.has('jenis_cuti') }">
                                        <option value="">Pilih jenis Cuti</option>
                                        <option value="cuti tahunan">Cuti Tahunan</option>
                                        <option value="cuti sakit">Cuti Sakit</option>
                                        <option value="cuti melahirkan">Cuti Melahirkan</option>
                                        <option value="alasan_penting">Cuti Alasan Penting</option>
                                    </select>
                                        <has-error :form="c" field="jenis_cuti"></has-error>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">ALasan Cuti</label>
                                    <div class="col-sm-12">
                                        <textarea type="" v-model="c.alasan_cuti" class="form-control"
                                               :class="{ 'is-invalid': c.errors.has('alasan_cuti') }"></textarea>
                                        <has-error :form="c" field="alasan_cuti"></has-error>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Masa Kerja</label>
                                    <div class="col-sm-12">
                                        <input type="" v-model="c.masa_kerja" class="form-control"
                                               :class="{ 'is-invalid': c.errors.has('masa_kerja') }">
                                        <has-error :form="c" field="masa_kerja"></has-error>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label class="col-sm-12 control-label">Tanggal Mulai Cuti</label>
                                            <div class="col-sm-12" >

                                                <input type="date" v-model="tgl" class="form-control"
                                                       :class="{ 'is-invalid': c.errors.has('tanggal_cuti') }">
                                                <has-error :form="c" field="tanggal_cuti"></has-error>
                                            </div>


                                        </div>
                                        <div class="row mt-3">
                                            <label class="control-label"></label>

                                            <div class="row col-sm-12">
                                                <label class="control-label mt-3"> - </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <label class="col-sm-12 control-label">Tanggal selesai</label>
                                            <div class="col-sm-12">
                                                <input type="date" v-model="tanggal_selesai"  class="form-control"
                                                       :class="{ 'is-invalid': c.errors.has('tanggal_selesai') }">
                                                <has-error :form="c" field="tanggal_selesai"></has-error>
                                            </div>

                                        </div>

                                        <div class="row col-sm-2" v-show="c.jml">
                                            <label class="col-sm-12 control-label">hari</label>
                                            <div class="col-sm-12">
                                                <input type="text" disabled v-model="c.jml" class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                    <label class="form-label red col-sm-12" v-show="error">{{ error }}</label>
                                </div>




                                <div class="form-group" v-show="c.jenis_cuti == 'cuti sakit'">
                                    <label class="col-sm-12 control-label">Foto Bukti Dari Dokter</label>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" @change="base64" class="custom-file-input" id="exampleInputFile"
                                                   :class="{ 'is-invalid': c.errors.has('foto_cuti') }">
                                            <label class="custom-file-label" for="exampleInputFile">upload file{{filegitu}} </label>
                                            <has-error :form="c" field="foto_cuti"></has-error>


                                        </div>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button @click.prevent="tambahCuti" v-show="cekdata" :disabled="this.error != '' | this.errorfoto !='' "   type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>


                            <div class="tab-pane" id="riwayatpengajuan">
                                <div class="card">
                                    <div class="card-header bg-info">

                                        <h3 class="card-title">Riwayaat Pengajajuan Cuti</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <tbody><tr>
                                                <th>No</th>
                                                <th>Jenis Cuti</th>
                                                <th>Alasan</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Status</th>
                                                <th>Modify</th>
                                            </tr>
                                            <tr v-for="(c,no) in cuti" :key="c.id">
                                                <td>{{no+1}}</td>
                                                <td>{{c.jenis_cuti}}</td>
                                                <td>{{c.alasan_cuti}}</td>
                                                <td>{{c.created_at | myDateLahir}}</td>
                                                <td><span class="badge bg-danger" v-show="c.status === 'ditolak'">{{c.status}}</span>
                                                    <span class="badge bg-success" v-show="c.status === 'diterima'">{{c.status}}</span>
                                                    <span class="badge bg-info" v-show="c.status === 'sedang proses'">{{c.status}}</span>
                                                    <span class="badge bg-dark-gradient" v-show="c.status === 'batal'">{{c.status}}</span>

                                                </td>
                                                <td>
                                                    <button type="button" v-show="c.status ==='sedang proses'" @click="editModal(c,c.tanggal_cuti)"
                                                            class="btn btn-success btn-sm"
                                                                data-toggle="modal" data-target="#editCuti">
                                                        edit
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" v-show="c.status === 'sedang proses'" @click="Batalcuti(c,c.tanggal_cuti,c.tanggal_selesai)" title="terima permohonan">
                                                        <i class="fa fa-warning"></i>
                                                        batal
                                                    </button>
                                                    <button type="button" v-show="c.status ==='ditolak'" @click="komentarModal(c.keterangan)"
                                                            class="btn btn-warning btn-sm"
                                                            data-toggle="modal" data-target="#komentar">
                                                        Komentar
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody></table>
                                    </div>
                                    <!-- /.card-body -->

                                </div>


                            </div>


                        </div>

                    </div>

                </div>

            </div>

            <div  class="modal fade" id="komentar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal- dialog-centered " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Alasan Penolakan Cuti Anda</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <textarea class="form-control"
                                              v-model="c.keterangan" :class="{ 'is-invalid': c.errors.has('keterangan') }"
                                              placeholder="Tuliskan Alasan Anda"></textarea>
                                    <has-error :form="c" field="keterangan"></has-error>
                                </div>
                            </div>

                        </div>




                        </div>

                    </div>
            </div>


            <div class="modal fade" id="editCuti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal- dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Pengajuan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <div class="form-group" >
                                    <label class="col-sm-2 control-label">Jenis Cuti</label>
                                    <div class="col-sm-8">
                                        <select name="type" class="form-control "v-model="jeniscuti"
                                                :class="{ 'is-invalid': c.errors.has('jenis_cuti') }">
                                            <option value="">Pilih jenis Cuti</option>
                                            <option value="cuti tahunan">Cuti Tahunan</option>
                                            <option value="cuti sakit">Cuti Sakit</option>
                                            <option value="cuti melahirkan">Cuti Melahirkan</option>
                                            <option value="cuti alasan_penting">Cuti Alasan Penting</option>
                                        </select>
                                        <has-error :form="c" field="jenis_cuti"></has-error>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Alasan Cuti</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" v-model="c.alasan_cuti"
                                                  :class="{ 'is-invalid': c.errors.has('alasan_Cuti') }"
                                                  placeholder="Tuliskan Alasan Anda"></textarea>
                                        <has-error :form="c" field="alasan_Cuti"></has-error>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-8 control-label">Masa Kerja</label>
                                        <div class="col-sm-8">
                                            <input type="" v-model="c.masa_kerja" class="form-control"
                                                   :class="{ 'is-invalid': c.errors.has('masa_kerja') }">
                                            <has-error :form="c" field="masa_kerja"></has-error>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <label class="col-sm-12 control-label">Tanggal Mulai Cuti</label>
                                                <div class="col-sm-8" >

                                                    <input type="date" v-model="tgl" class="form-control"
                                                           :class="{ 'is-invalid': c.errors.has('tanggal_cuti') }">
                                                    <has-error :form="c" field="tanggal_cuti"></has-error>
                                                </div>


                                            </div>
                                            <div class="row mt-3">
                                                <label class="control-label"></label>

                                                <div class="row col-sm-12">
                                                    <label class="control-label mt-3"> - </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <label class="col-sm-12 control-label">Tanggal selesai</label>
                                                <div class="col-sm-8">
                                                    <input type="date" v-model="tanggal_selesai"  class="form-control"
                                                           :class="{ 'is-invalid': c.errors.has('tanggal_selesai') }">
                                                    <has-error :form="c" field="tanggal_selesai"></has-error>
                                                </div>

                                            </div>

                                            <div class="row col-sm-2" v-show="c.jml">
                                                <label class="col-sm-12 control-label">hari</label>
                                                <div class="col-sm-12">
                                                    <input type="text" disabled v-model="c.jml" class="form-control">
                                                </div>

                                            </div>
                                        </div>
                                        <label class="form-label red col-sm-8" v-show="error">{{ error }}</label>
                                    </div>

                                    <div class="form-group" v-show="c.jenis_cuti == 'cuti sakit'">
                                        <label class="col-sm-12 control-label">Foto Bukti Dari Dokter</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" @change="base64" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">upload file {{filegitu}}</label>
                                            </div>
                                            <label class="form-label red col-sm-12" v-show="errorfoto">{{ errorfoto }}</label>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-8">
                                            <button @click.prevent="editCuti" :disabled="this.error != '' " type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>


                </div>








            </div>
    </div>
</template>

<script>
    export default {

        data() {
          return{


              cuti: {},
              tanggal_selesai:'',
              jeniscuti:'',
              filegitu:'',
              photo: '',
              name: '',
              type: '',
              error:'',
              cekdata: '',
              tgl: '',
              errorfoto: '',
              c: new Form({
                  id: '',
                  iduser:'',
                  masa_kerja:'',
                  jenis_cuti:'',
                  alasan_cuti:'',
                  status:'',
                  tanggal_cuti:'',
                  tanggal_selesai:'',
                  keterangan:'',
                  foto_cuti:'',
                  jml_awal:'',
                  jml:''

              }),
              p: new Form({
                  nip: '',
                  k_c_tahunan: '',
                  status_pegawai: ''

              })




          }

        },

        methods:
        {

            komentarModal(data)
            {
                $('#addNew').modal('show');
                this.c.keterangan = data;

            },

            base64(e)
            {
                let file = e.target.files[0];
                this.filegitu = file['name'];

                let reader = new FileReader();

                if(file['size'] < 2111775){

                    reader.onloadend =  (file) => {

                        this.c.foto_cuti = reader.result;
                    }
                    reader.readAsDataURL(file);
                    this.errorfoto = ''

                }else {
                    swal({
                        type:     'error',
                        title:   'oppssss',
                        text:   'file yang anda upload terlalu besar'
                    })



                }



            },

            cekData()
            {
                axios.get('api/pegawai').then(({ data }) => (this.cekdata = data.hitung))


            },

            editCuti()
            {
              this.c.put('api/cuti/'+this.c.id).then(()=>{

                  toast({
                      type: 'success',
                      title: 'berhasil merubah data'
                  })
                  Fire.$emit('AfterCreate');
                  $('#editcuti').modal('hide');



              })
                  .catch(()=>{



                  })
            },

            Batalcuti(id,tanggal_cuti,tanggal_selesai)
            {
                let hari = 24*60*60*1000;
                let tanggal1= new Date (tanggal_cuti);
                let tanggal2 = new Date (tanggal_selesai);
                let total = Math.round(Math.abs((tanggal2.getTime() - tanggal1.getTime())/(hari)));
                this.c.fill(id);
                this.c.jml = total;

                this.c.status = 'batal';
                console.log(total)
                swal({
                    title: 'Apa anda yakin ingin membatalkan cuti anda?',

                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya! Batalkan'
                }).then((result) =>{
                    if (result.value)
                    {
                        this.c.put('api/batal').then(() => {
                            swal(
                                'DiBatalkan!',
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

            editModal(cuti,tgl_cuti){

                $('#editcuti').modal('show');
                this.c.fill(cuti);
                this.tgl = tgl_cuti;
                this.tanggal_selesai = cuti.tanggal_selesai;
                if (this.c.jenis_cuti == 'cuti tahunan'){
                    let hari = 24*60*60*1000;
                    let total = Math.round(Math.abs((new Date(this.tanggal_selesai).getTime() - new Date(tgl_cuti).getTime())/(hari)));
                    this.c.jml_awal = total;
                } else {
                    this.hitungCuti(this.tanggal_selesai);
                }


            },


            tambahCuti()
            {
                this.c.post('api/cuti')
                    .then(()=>{
                        //dekelarasi
                        Fire.$emit('AfterCreate');

                        //sweet alert
                        toast({
                            type: 'success',
                            title: 'cuti berhasil diajukan'

                        })
                        this.c.reset()
                        this.tanggal_selesai.reset()
                        this.tgl.reset()

                        this.$Progress.finish();

                    })
                    .catch(()=>{

                    })

            },




            reset(){
              this.c.reset();
              this.tanggal_selesai ='';
            },

            hitungCuti(tgl)
            {
                if( this.c.tanggal_selesai != null){
                    let hari = 24*60*60*1000;
                    let tanggal1= new Date (this.c.tanggal_cuti);
                    let tanggal2 = new Date (tgl);
                    let totalhari = Math.round((tanggal2.getTime() - tanggal1.getTime()));
                    if (totalhari < 1 ){

                        this.error = 'input tanggal dengan benar';

                    } else {

                        let total = Math.round(Math.abs((tanggal2.getTime() - tanggal1.getTime())/(hari)));
                        this.c.tanggal_selesai = tgl;
                        this.c.jml = total;
                        this.error = '';

                        if (this.c.jenis_cuti === 'cuti tahunan') {
                            if (this.c.jml_awal === null){
                                if (jmltahunan < 0) {
                                    this.error = 'cuti tahunan tidak cukup';
                                } else {
                                    this.error = '';
                                }
                            } else {
                                let jmltahunan = Math.round((this.p.k_c_tahunan + this.c.jml_awal) - this.c.jml );
                                if (jmltahunan < 0) {
                                    this.error = 'cuti tahunan tidak cukup';
                                } else {
                                    this.error = '';
                                }
                            }

                        } else {
                            this.error = '';
                        }

                    }

                }
                console.log(this.p.k_c_tahunan)


            },

            tampilCuti()
            {
                axios.get("api/cuti").then(({data}) => (this.cuti = data));
            },



        },



        created()
        {
            this.cekData()


            axios.get("api/pegawai")
                .then(({ data }) => (this.p.fill(data.show)));

            Fire.$on('AfterCreate',() => {
                axios.get("api/pegawai")
                    .then(({ data }) => (this.p.fill(data.show)));

                this.tampilCuti()

            })

           this.photo = user.photo;
            this.name = user.name;
            this.type = user.type;



        },

        watch:{
            tgl(tgl){
                    this.c.tanggal_cuti = tgl;
                    this.hitungCuti(this.c.tanggal_selesai)
            },


            tanggal_selesai(tgl){
                this.hitungCuti(tgl)
            },
            jeniscuti(value){
                this.c.jenis_cuti = value;
                    this.hitungCuti(this.c.tanggal_selesai);

                    if(value === 'cuti tahunan'){
                        this.c.jenis_cuti = value;
                        this.hitungCuti(this.c.tanggal_selesai);
                    }
                    else if(value === 'cuti sakit'){
                        this.errorfoto ="foto surat keterangan dokter"
                    }
            }


        }





    }
</script>
