<style>
    .widget-user-header{
        background-position: center center;
        background-size: cover;
        height: 250px !important;
    }
    .widget-user .card-footer{
        padding: 1;
    }
</style>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black" style="background-image:url('./img/hijau.jpg')">
                        <h3 class="widget-user-username">{{this.form.name}}</h3>
                        <h5 class="widget-user-desc">{{this.form.type}}</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" :src="getProfilePhoto()" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                        <div class="row">

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
                        <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Data Pegawai</a></li>
                        <li class="nav-item"><a class="nav-link active show" href="#settings" data-toggle="tab">Profile Akun</a></li>
                    </ul>
                </div> <!--end div card-header -->
                <div class="body">
                    <div class="tab-content">
                            <div class="tab-pane" id="activity">
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Nip</label>
                                        <div class="col-sm-12">
                                            <input type="" v-model="p.nip" class="form-control" id="inputNip" placeholder="Nip"
                                                   :class="{ 'is-invalid': p.errors.has('nip') }">
                                            <has-error :form="p" field="nip"></has-error>
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
                                            <has-error :form="p" field="gelar_depan"></has-error>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Gelap Belakang</label>
                                        <div class="col-sm-12">
                                            <input type="" v-model="p.gelar_belakang" class="form-control"
                                                   :class="{ 'is-invalid': p.errors.has('gelar_belakang') }">
                                            <has-error :form="p" field="gelar_belakang"></has-error>
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
                                            <input type="text" v-model="p.tempat_lahir"  class="form-control"
                                                   :class="{ 'is-invalid': p.errors.has('tempat_lahir') }">
                                            <has-error :form="p" field="tempat_lahir"></has-error>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Tanggal Lahir</label>
                                        <div class="col-sm-12">
                                            <input type="date" v-model="p.tanggal_lahir "  class="form-control"
                                                   :class="{ 'is-invalid': p.errors.has('tanggal_lahir') }">
                                            <has-error :form="p" field="tanggal_lahir"></has-error>

                                        </div>
                                    </div>

                                    <div class="form-group" >
                                        <label class="col-sm-12 control-label">Pangkat/Golongan & Ruangan</label>
                                        <div class="col-sm-12">
                                        <select name="type" id="type"
                                                placeholder="silakan isi biodata diri anda" v-model="p.p_g_r"
                                                class="form-control" :class="{ 'is-invalid': p.errors.has('bio') }">
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
                                        <label class="col-sm-12 control-label">NPWP</label>
                                        <div class="col-sm-12">
                                            <input type="" v-model="p.npwp" class="form-control"
                                                   :class="{ 'is-invalid': p.errors.has('npwp') }">
                                            <has-error :form="p" field="npwp"></has-error>
                                        </div>
                                    </div>

                                </div>
                                <div class = "col-md-6">

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
                                        <div class="col-sm-offset-2 col-sm-12">
                                            <button @click.prevent="updatePegawai" type="submit" v-show="cekdata" class="btn btn-warning">Update</button>
                                            <button @click.prevent="tambahPegawai" type="submit" v-show="!cekdata" class="btn btn-success">simpan</button>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!--seting tab -->
                        <div class="tab-pane active show" id="settings">
                            <form @submit.prevent="editmode ? updateUser() : createUser()">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Nama</label>

                                    <div class="col-sm-12">
                                        <input type="" v-model="form.name" class="form-control" id="inputName" placeholder="Name"
                                               :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-12">
                                        <input type="" v-model="form.email" class="form-control" id="inputEmail" placeholder="Email"
                                               :class="{ 'is-invalid': form.errors.has('email') }">
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Pengalaman</label>

                                    <div class="col-sm-8">
                                        <textarea type="text" v-model="form.bio" class="form-control" id="1" placeholder="Name"></textarea>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Profile Photo</label>
                                    <div class="col-sm-12">
                                        <input type="file" @change="updateProfile" name="photo" class="form-input">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword" class="col-sm-2 control-label">Password</label>

                                    <div class="col-sm-12">
                                        <input type="password" v-model="form.password" class="form-control" id="inputPassword" placeholder="Password"
                                               :class="{ 'is-invalid': form.errors.has('password') }">
                                        <has-error :form="form" field="password"></has-error>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-12">
                                        <button @click.prevent="updateInfo" type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>




                            </form>
                        </div> <!--end tab settng -->


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
                cekdata: '',
                pegawai:{},
                form: new Form({
                    id : '',
                    name : '',
                    email : '',
                    password : '',
                    type : '',
                    bio : '',
                    photo : ''
                }),

                p: new Form({
                    id: '',
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

            getProfilePhoto(){

                let photo = (this.form.photo.length > 200) ? this.form.photo : "img/profile/"+ this.form.photo;

                return photo;
            },

            cekData()
            {
              axios.get('api/pegawai').then(({ data }) => (this.cekdata = data.hitung))


            },



            updateInfo(){
                this.$Progress.start();
              this.form.put('api/profile/')
                  .then(()=>{
                      Fire.$emit('AfterCreate');
                      this.$Progress.finish();
                      toast({
                          type: 'success',
                          title: 'berhasil merubah data'

                      });

                  })
                  .catch(() =>{
                      swal({
                          type:     'error',
                          title:   'oppssss hacker detected',
                          text:   'file harus dengan format PNG,JPG jadi pliss deh jangan main-main'
                      })

                  });
            },


            tambahPegawai()
            {
                this.p.post('api/pegawai')
                    .then(()=>{
                    Fire.$emit('AfterCreate');
                toast({
                    type: 'success',
                    title: 'Data berhasil dirubah'

                })

            })
                    .catch(()=>{

                        toast({
                            type: 'error',
                            title: 'Data anda tidak berhasil dirubah'

                        })

                    })

            },


            updatePegawai()
            {
              this.p.put('api/pegawai/'+this.p.id).then(()=>{

                  Fire.$emit('AfterCreate');

                  toast({
                      type: 'success',
                      title: 'Data Berhasil DiUpdate'
                  })
              })
                  .catch(()=>{

                  })
            },

             //validasi foto
            updateProfile(e){
            let file = e.target.files[0];

            let reader = new FileReader();

            if(file['size'] < 2111775){

                reader.onloadend =  (file) => {

                    this.form.photo = reader.result;
                }
                reader.readAsDataURL(file);

            }else {
                swal({
                    type:     'error',
                    title:   'oppssss',
                    text:   'file yang anda upload terlalu besar'
                })

            }


            }

        },

        //untuk create api antara vue dan laravel
        created() {
            


            this.$Progress.start();
            axios.get("api/profile")
                .then(({ data }) => (this.form.fill(data)));

            axios.get("api/pegawai")
                .then(({ data }) => (this.p.fill(data.show)));

            this.cekData();

        }
    }
</script>
