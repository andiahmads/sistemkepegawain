<template>
    <div class="container">
        <div class="row mt-2 mb-2" v-if="$gate.isAdminOrPimpinan()">
            <div class="col-md-12">

                <h4>Data Pegawai Pengguna Sistem</h4>

                <div class="box-body">
                    <div class="card col-md card-success  card-outline">
                        <div class="row mt-3">
                            <div class="col-md-6">

                                <button class="btn btn-default" @click="tampilPegawai()" >Load Semua Data
                                    <i class="fas fa-sync-alt"></i> </button>
                            </div>

                            <div class="col-md-6">
                                <input class="form-control input-sm" type="search" @keyup="searchit" v-model="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar " @click="searchit">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">

                        <h3 class="card-title">Tabel Pegawai</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>No</th>
                                <th>nip</th>
                                <th>Nama</th>
                                <th>status pegawai</th>
                                <th>Jabatan</th>
                                <th>Npwp</th>
                                <th>Modify</th>
                            </tr>
                            <tr v-for="(p,no) in pegawai">
                                <td>{{no+1}}</td>
                                <td>{{p.nip}}</td>
                                <td>{{p.users[0].name}}</td>
                                <td>{{p.status_pegawai}}</td>
                                <td> {{p.jabatan}} </td>
                                <td>{{p.npwp}}</td>

                                <td>
                                    <button class="btn btn-danger" v-if="$gate.isAdmin()" @click="deletePegawai(p.id)">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                    <button class="btn btn-info" @click="modalPegawai(p,p.users[0].name,p.users[0].email,p.users[0].photo)">
                                        <i class="fa fa-eye"></i>
                                    </button>


                                </td>
                            </tr>
                            </tbody></table>
                    </div>

                    <!-- /.card-body -->

                </div>


                <div class="modal fade" id="detailpegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-top modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Detail Pegawai</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12 mt-4">

                                <div class="card card-success card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" :src="'img/profile/'+ p.photo" alt="User profile picture">
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Nama</label>
                                                    <div class="col-sm-12">
                                                        <input type="" v-model="p.name" class="form-control"  placeholder="Nip"
                                                               :class="{ 'is-invalid': p.errors.has('nip') }">
                                                        <has-error :form="p" field="name"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Nip</label>
                                                    <div class="col-sm-12">
                                                        <input type="" v-model="p.nip" class="form-control" id="inputNip" placeholder="Nip"
                                                               :class="{ 'is-invalid': p.errors.has('nip') }">
                                                        <has-error :form="p" field="name"></has-error>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Status Pegawai</label>
                                                    <div class="col-sm-12">
                                                        <input type="" v-model="p.status_pegawai" class="form-control"
                                                               :class="{ 'is-invalid': p.errors.has('status_pegawai') }">
                                                        <has-error :form="p" field="status_pegawai"></has-error>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Gelap Depan</label>
                                                    <div class="col-sm-12">
                                                        <input type="" v-model="p.gelar_depan" class="form-control"
                                                               :class="{ 'is-invalid': p.errors.has('gelar_depan') }">
                                                        <has-error :form="p" field="status_pegawai"></has-error>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Gelap Belakang</label>
                                                    <div class="col-sm-12">
                                                        <input type="" v-model="p.gelar_belakang" class="form-control"
                                                               :class="{ 'is-invalid': p.errors.has('gelar_belakang') }">
                                                        <has-error :form="p" field="status_pegawai"></has-error>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Jenis Kelamin</label>
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="r1" value="laki_laki" v-model="p.jenis_kelamin"
                                                               :checked="p.jenis_kelamin === 'laki_laki'" class="minimal">
                                                        <label class="form-check-label">Laki-Laki</label>
                                                        <input type="radio" name="r1" value="perempuan" v-model="p.jenis_kelamin"
                                                               :checked="p.jenis_kelamin === 'perempuan'" class="minimal">
                                                        <label class="form-check-label">perempuan</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Tempat lahir</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" v-model="p.tempat_lahir"  class="form-control">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Tanggal Lahir</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" v-model="p.tanggal_lahir "  class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">NPWP</label>
                                                    <div class="col-sm-12">
                                                        <input type="" v-model="p.npwp" class="form-control"
                                                               :class="{ 'is-invalid': p.errors.has('npwp') }">
                                                        <has-error :form="p" field="status_pegawai"></has-error>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class = "col-md-6">
                                                <div class="form-group" >
                                                    <label class="col-sm-12 control-label">PGR</label>
                                                    <div class="col-sm-12">
                                                        <select name="type" id="type"
                                                                placeholder="silakan isi biodata diri anda" v-model="p.p_g_r"
                                                                class="form-control" :class="{ 'is-invalid': p.errors.has('bio') }">
                                                            <option>Pangkat/Gol.Ruangan</option>
                                                            <option :selected="p.p_g_r === 'Pengatur Muda/ II.a'">Pengatur Muda/ II.a</option>
                                                            <option :selected="p.p_g_r === 'Penata Muda/ III.a'">Penata Muda/ III.a</option>
                                                            <option :selected="p.p_g_r === 'Pembina/IV.a'">Pembina/IV.a</option>
                                                            <option :selected="p.p_g_r === 'Penata Muda Tk. I / III.b' ">Penata Muda Tk. I / III.b</option>
                                                            <option :selected="p.p_g_r === 'Pembina Tk. I/ IV.b'">Pembina Tk. I/ IV.b</option>
                                                            <option :selected="p.p_g_r === 'Pengatur/ II.c'">Pengatur/ II.c</option>
                                                            <option :selected="p.p_g_r === 'Penata/ III.c'">Penata/ III.c</option>
                                                            <option :selected="p.p_g_r === 'Juru/ I.c'">Juru/ I.c</option>
                                                            <option :selected="p.p_g_r === 'Pengatur Tk. I/ II.d'">Pengatur Tk. I/ II.d</option>
                                                            <option :selected="p.p_g_r === 'Penata Tk. I/ III.d'">Penata Tk. I/ III.d</option>
                                                        </select>
                                                    </div>
                                                    <has-error :form="p" field="type"></has-error>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Jebatan</label>
                                                    <div class="col-sm-12">
                                                        <input type="" v-model="p.jabatan" class="form-control"
                                                               :class="{ 'is-invalid': p.errors.has('jabatan') }">
                                                        <has-error :form="p" field="jabatan"></has-error>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Mata Pelajaran Spesialis</label>
                                                    <div class="col-sm-12">
                                                        <input type="" v-model="p.m_p_s" class="form-control"
                                                               :class="{ 'is-invalid': p.errors.has('m_p_s') }">
                                                        <has-error :form="p" field="m_p_s"></has-error>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Unit Kerja</label>
                                                    <div class="col-sm-12">
                                                        <input type="" v-model="p.unit_kerja" class="form-control"
                                                               :class="{ 'is-invalid': p.errors.has('unit_kerja') }">
                                                        <has-error :form="p" field="unit_kerja"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Alamat Kantor</label>
                                                    <div class="col-sm-12">
                                                        <input type="" v-model="p.alamat_kantor" class="form-control"
                                                               :class="{ 'is-invalid': p.errors.has('alamat_kantor') }">
                                                        <has-error :form="p" field="alamat_kantor"></has-error>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">provinsi</label>
                                                    <div class="col-sm-12">
                                                        <input type="" v-model="p.provinsi" class="form-control"
                                                               :class="{ 'is-invalid': p.errors.has('provinsi') }">
                                                        <has-error :form="p" field="provinsi"></has-error>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Pendidikan Terakhir</label>
                                                    <div class="col-sm-12">
                                                        <input type="" v-model="p.pendidikan_terakhir" class="form-control"
                                                               :class="{ 'is-invalid': p.errors.has('pendidikan_terakhir') }">
                                                        <has-error :form="p" field="pendidikan_terakhir"></has-error>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Nomor Telpon</label>
                                                    <div class="col-sm-12">
                                                        <input type="" v-model="p.no_hp" class="form-control"
                                                               :class="{ 'is-invalid': p.errors.has('no_hp') }">
                                                        <has-error :form="p" field="no_hp"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Email</label>
                                                    <div class="col-sm-12">
                                                        <input type="" v-model="p.no_hp" class="form-control"
                                                               :class="{ 'is-invalid': p.errors.has('no_hp') }">
                                                        <has-error :form="p" field="no_hp"></has-error>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                </div>
                            </div>
                        </div>


                        </div>

                    </div>




                </div>
        </div>

        <div v-if="!$gate.isAdminOrPimpinan()">
            <not-found></not-found>
        </div>
    </div>

</template>

<script>
export default {

    data() {
        return {

            photo: '',

            pegawai: {},
            search: '',
            p: new Form({
                id: '',
                name: '',
                email:'',
                photo:'',
                nip:'',
                status_pegawai: '',
                gelar_depan: '',
                gelar_belakang: '',
                jenis_kelamin: '',
                tempat_lahir:'',
                tanggal_lahir:'',
                p_g_r:'',
                npwp:'',
                jabatan:'',
                m_p_s:'',
                unit_kerja:'',
                alamat_kantor:'',
                provinsi:'',
                pendidikan_terakhir:'',
                no_hp:''


            })


        }
    },


    methods: {

        tampilPegawai() {
            axios.get("api/pegawai").then(({data}) => (this.pegawai = data.showall));
        },

        modalPegawai(data,name,email,photo)
        {
            $('#detailpegawai').modal('show');
            this.p.fill(data);
            this.p.name = name
            this.p.email = email
            this.p.photo = photo




        },


        deletePegawai(id)
        {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                // Send request to the server
                if (result.value) {
                    this.p.delete('api/pegawai/'+id).then(()=>{
                        swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        Fire.$emit('AfterCreate');
                    }).catch(()=> {
                        swal("Failed!", "There was something wronge.", "warning");
                    });
                }
            })

        },



        searchit: _.debounce(() => {
            Fire.$emit('searching');
        }, 1000),
    },


        created() {
            Fire.$on('searching', () => {
                let query = this.search;
                axios.get('api/findPegawai?q=' + query)
                    .then((data) => {
                        this.pegawai = data.data
                    })
                    .catch(() => {


                    })
            })

            Fire.$on('AfterCreate', () => {
                this.tampilPegawai();
            })

            this.photo = user.photo


        }

}




</script>
