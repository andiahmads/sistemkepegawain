<template>
    <div class="container">
        <div class="row mt-2 mb-2">
        <div class="col-md-12">

            <div class="card-body bg-white">
                <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn bg-success" @click="ResetKuota();">Load Semua Data
                                    <i class="fas fa-sync-alt"></i> </button>
                            </div>
                            <div class="col-md-6">

                                <input class="form-control input-sm" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar">
                                    </button>
                                </div>
                            </div>
                        </div>
                </div>

                <table class="table table-bordered">
                    <tbody><tr>
                        <th style="width: 10px">No</th>
                        <th>Nama Pegawai</th>
                        <th>Sisa Kuota Cuti</th>
                        <th style="width: 40px">Modif</th>
                    </tr>
                    <tr v-for="(p,no) in pegawai">
                        <td>{{no+1}}</td>
                        <td>{{p.users[0].name}}</td>
                        <td><span class="badge bg-info-gradient">{{p.k_c_tahunan}} hari</span></td>
                        <td>
                            <button class="btn btn-success btn-sm" @click="modalReset(p,p.users[0].name)"  title="terima permohonan"
                                   data-toggle="modal" data-target="#reset">
                            <i class="fa fa-edit"></i>
                        </button>
                        </td>
                    </tr>

                    </tbody></table>
            </div>

            <div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Reset Kuota Cuti</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>

                            <div class="modal-body">

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Name:</label>
                                    <div class="col-md-9">
                                        <input id="create-client-name" v-model="p.name" type="text" class="form-control" disabled>
                                        <span class="form-text text-muted ">
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Reset Kuota:</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="p.k_c_tahunan" class="form-control"
                                               :class="{ 'is-invalid': p.errors.has('k_c_tahunan') }">
                                        <has-error :form="p" field="k_c_tahunan"></has-error>

                                        silakan update kuota terbaru
                                        <span class="form-text text-muted">
                                    </span>
                                    </div>
                                </div>


                                <div class="modal-footer">

                                    <button @click.prevent="updateKuota" type="submit" class="btn btn-success">Kirim</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>

                                </div>


                            </div>
                        </form>
                    </div>


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
                pegawai: {},



                p: new Form({
                    id: '',
                    k_c_tahunan: '',
                    name: ''

                })


            }
        },

        methods: {

            modalReset(data,name)
            {
                $('#reset').modal('show');

                this.p.fill(data)
                this.p.name = name



            },

            ResetKuota()
            {
                axios.get("api/pegawai").then(({data}) => (this.pegawai = data.showall));


            },
            updateKuota()
            {
                this.p.put('api/reset/'+this.p.id).then(()=>{
                    swal(
                        'update!',
                        'data berhasil diubah',
                        'success'

                    )
                    Fire.$emit('AfterCreate');
                    $('#reset').modal('hide')
                })
                    .catch(()=>{
                        this.$progress.fail()

                    });
            },

            searchit: _.debounce(() => {
                Fire.$emit('searching');
            },1000),
        },

        created()
        {

            Fire.$on('searching',() => {
                let query = this.search;
                axios.get('api/findPegawai?q=' + query)
                    .then((data) => {
                        this.detailpegawai = data.data
                    })
                    .catch(() => {


                    })
            })



            Fire.$on('AfterCreate',() =>{
                this.ResetKuota();
            })


        }


    }
</script>
