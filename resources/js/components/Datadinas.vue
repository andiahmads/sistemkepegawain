<template>
    <div class="container">
        <div class="row mt-2 mb-2" v-if="$gate.isAdminOrPimpinan()">
            <div class="col-md-12">
                <!--form search -->
                <h4>Riwayat Data Dinas</h4>
                <div class="box-body">
                    <div class="card col-md card-success  card-outline">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <button class="btn bg-gray-dark" @click="tampilDinas()">Load Semua Data
                                    <i class="fas fa-sync-alt"></i> </button>
                            </div>

                            <div class="col-md-6">
                                <input class="form-control input-sm" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg-white">
                            <table class="table table-bordered">
                                <tbody><tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama </th>
                                    <th>Nip</th>
                                    <th>Tujuan</th>
                                    <th>Transportasi</th>
                                    <th>Tujuan Dinas</th>
                                    <th>Lama</th>
                                    <th>Tgl Berangkat & Kembali</th>


                                    <th style="width: 40px">Modif</th>
                                </tr>
                                <tr v-for="(p,no) in all">
                                    <td>{{no+1}}</td>
                                    <td>{{p.users.name}}</td>
                                    <td>{{p.pegawai.nip}}</td>
                                    <td>{{p.tempat_tujuan}}</td>
                                    <td>{{p.alat_transportasi}}</td>
                                    <td>{{p.maksud_perjalanan}}</td>
                                    <td>{{p.l_p_dinas}} hari</td>
                                    <td>{{p.tanggal_berangkat | myDateLahir}}| {{p.tanggal_kembali | myDateLahir}}</td>

                                    <td>
                                        <button class="btn btn-danger btn-sm"title="terima permohonan"
                                                data-toggle="modal" data-target="#reset" @click="deleteDinas(p.id)">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>

                                </tbody></table>
                        </div>
                    </div>

                </div>




                    <!-- /.card-header -->

                    <!-- /.card-body -->


                <!-- /.card -->


            </div>
        </div>
        <div v-if="!$gate.isAdminOrPimpinan()">
            <not-found></not-found>
        </div>



        <!-- Modal -->



    </div>
</template>
<script>

export default {

    data() {
        return{
          all: {},

            p: new Form({
               id:''
            })

        }

    },



    methods: {

        tampilDinas() {
            axios.get("api/view").then(({data}) => (this.all = data.all));
        },
        deleteDinas(id){

            swal({
                title: 'Are you sure?',
                text: "Anda Yakin Ingin Menghapus Data ini?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'delete'
            }).then((result) => {
                // Send request to the server
                if (result.value) {
                    this.p.delete('api/dinas/'+id).then(()=>{
                        swal(
                            'Deleted!',
                            'Data Berhasil Dihapus',
                            'success'
                        )
                        Fire.$emit('AfterCreate');
                    }).catch(()=> {
                        swal("Failed!", "There was something wronge.", "warning");
                    });
                }
            })

        }

    },


   created()
   {

       Fire.$on('AfterCreate',() => {
           this.tampilDinas()
       })
   }


}

</script>

