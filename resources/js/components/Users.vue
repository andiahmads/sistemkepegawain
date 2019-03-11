<template>
    <div class="container">
        <div class="row mt-2 mb-2" v-if="$gate.isAdmin()">
            <div class="col-md-12">
                <!--form search -->
                    <h4>Mengelola Data Pengguna</h4>
                <div class="box-body">
                        <div class="card col-md card-success  card-outline">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <button class="btn btn-success " @click="newModal">Tambah Pengguna
                                        <i class="fas fa-user-plus" style="margin-right: 5px"></i> </button>
                                    <button class="btn bg-gray-dark" @click="loadUsers()">Load Semua Data
                                        <i class="fas fa-sync-alt"></i> </button>
                                </div>

                                    <div class="col-md-6">
                                        <input class="form-control input-sm" type="search" @keyup="searchit" v-model="search" placeholder="Search" aria-label="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-navbar" @click="searchit">
                                            </button>
                                        </div>
                                    </div>
                            </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">

                        <h3 class="card-title">Tabel Pengguna</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>E-mail</th>
                                <th>Jabatan</th>
                                <th>Create at</th>
                                <th>Modify</th>
                            </tr>
                            <tr v-for="(user,no) in users.data">
                                <td>{{no+1}}</td>
                                <td>{{user.name | upText}}</td>
                                <td>{{user.email}}</td>
                                <td>{{user.type  | upText }}</td>
                                <td>{{user.created_at | myDate}}</td>
                                <td>
                                    <button class="btn btn-info" :disabled="(user.type === 'admin') === true" @click="editModal(user)">
                                    <i class="fa fa-edit"></i>
                                    </button>

                                    <button class="btn btn-danger" @click="deleteUser(user.id,user.type)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody></table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <pagination :data="users"
                            @pagination-change-page="getResults">
                        </pagination>
                    </div>
                </div>
                <!-- /.card -->


            </div>
        </div>
        <div v-if="!$gate.isAdmin()">
            <not-found></not-found>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="exampleModalLongTitle">Tambah Pengguna</h5>
                        <h5 class="modal-title" v-show="editmode" id="exampleModalLongTitle">Edit Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateUser() : createUser()">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input v-model="form.name" type="text" name="name"
                                   placeholder="silakan isi nama anda"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>


                        <div class="form-group">
                            <label>Email</label>
                            <input v-model="form.email" type="email" name="email"
                                   placeholder="silakan isi email anda"
                                   class="form-control"
                                   :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Tipe Pengguna</label>
                            <select name="type" id="type"
                                      placeholder="silakan isi biodata diri anda" v-model="form.type"
                                      class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }">
                                <option value="">Tipe Pengguna</option>
                                <option value="pimpinan">pimpinan</option>
                                <option value="pegawai">pegawai</option>
                            </select>
                            <has-error :form="form" field="type"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                                <input type="password" v-model="form.password" class="form-control" id="inputPassword" placeholder="Password"
                                       :class="{ 'is-invalid': form.errors.has('password') }">
                                <has-error :form="form" field="password"></has-error>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">tutup</button>
                        <button v-show="editmode"  type="submit" class="btn btn-success">update</button>
                        <button v-show="!editmode" type="submit" class="btn btn-primary">Tambah</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>



    </div>
</template>





<script>
    export default {

        data() {

            return {
                //ini method untuk switch modal
                editmode: false,
                search: '',
                users : {},
                id: '',
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
            //method untuk pagination
            getResults(page = 1) {
                axios.get('api/user?page=' + page)
                    .then(response => {
                        this.users = response.data;
                    });
            },


            //method untuk update user
            updateUser(){
                this.$Progress.start();

                this.form.put('api/user/'+this.form.id)
                    .then((data) => {
                        console.log(data.message);
                        swal(
                            'update!',
                                'data berhasil diubah',
                            'success'

                        )
                        Fire.$emit('AfterCreate');
                        $('#addNew').modal('hide')
                    })
                    .catch((data) => {
                        console.log(data.pass);

                        this.$Progress.fail();
                    });

            },


            editModal(user){
                this.editmode = true;
                this.form.reset();

                $('#addNew').modal('show');
                this.form.fill(user);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },




            //ini method untuk delete user
            deleteUser(id,type){

                swal({
                    title: 'kamu yakin?',
                    text: "Anda tidak akan dapat mengembalikan data ini!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    // send request to server
                    if (result.value) {
                        if ('admin' != type) {

                            return this.form.delete(' api/user/' + id).then(() => {
                                swal(
                                    'Deleted!',
                                    'data berhasil dihapus',
                                    'success'
                                )
                                Fire.$emit('AfterCreate');


                            }).catch(() => {
                                swal("failed!", "There was wrong something wronge.", "warning");
                                Fire.$emit('AfterCreate');

                            });

                        } else {
                            swal("failed!", "Sama2 Admin tidak boleh menyaktit.", "warning");
                            Fire.$emit('AfterCreate');
                        }
                    }

                })
            },


            //untuk menampilkan user bersadasarkan hak akses
            loadUsers(){

                if(this.$gate.isAdminOrPimpinan()) {
                    axios.get("api/user").then(({data}) => (this.users = data));

                }

            },

            //fungsi create data
            createUser(){
                //api dari post user
                    this.form.post('api/user')
                        .then(()=>{
                            //dekelarasi
                            Fire.$emit('AfterCreate');

                            //hide modal ufter clicked
                            $('#addNew').modal('hide')

                            //sweet alert
                            toast({
                                type: 'success',
                                title: 'berhasil menambahkan pengguna baru'

                            })
                            this.$Progress.finish();

                        })
                        .catch(()=>{


                        })
            },

            //method untuk seacrh data
            searchit: _.debounce(() => {
                Fire.$emit('searching');
            },1000),
        },



        created() {
            Fire.$on('searching',() => {
                let query = this.search;
                axios.get('api/findUser?q=' + query)
                    .then((data) => {
                        this.users = data.data
                    })
                    .catch(() => {


                    })
            })


            //eksekusi method
            Fire.$on('AfterCreate',() => {
                this.loadUsers();
            })
            //yang dibawah ini merequest per 3 detik.
           /* setInterval(() => this.loadUsers(), 3000);*/
        }
    }
</script>
