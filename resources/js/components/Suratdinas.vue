<template>
    <div class="container">
        <div class="row mt-2 mb-12"id="printMe">
            <div class="card col-sm-12">
                <div class="card-body " >
                    <div class="row justify-content-center invoice-col" align="center">
                        <address class = "mt-3">
                            <h6><b>SURAT PERJALANAN DINAS(SPD)</b></h6>
                        </address>
                    </div>
                    <div class="row col-sm-12">
                            <table class="table table-bordered" align="center">
                                <tbody>
                            <tr>
                            <th>1.Pejabat Yang Membuat Komitmen</th>

                            <th>
                                {{dinas[0].users.name}}
                            </th>
                            <div class="row"></div>
                        <tr>
                            <th>2.Nama Nip Pegawai Yang Diperintahkan</th>
                            <th>
                                {{dinas[0].pegawai.nip}}
                            </th>
                        </tr>
                            </tr>

                        <tr>
                            <th>3.a. Pangkat Dan Golongan</th>
                            <th>
                                {{dinas[0].pegawai.p_g_r}}
                            </th>
                        </tr>
                        <tr>
                            <th>   b.Jabatan</th>
                            <th>
                                {{dinas[0].pegawai.jabatan}}
                            </th>
                        </tr>
                        <tr>
                            <th>c. Tingkat Menurut Peraturan Perjalanan Dinas</th>
                            <th>
                                {{dinas[0].t_m_p_dinas}}
                            </th>
                        </tr>
                        <tr>
                            <th>4. Maksud Dinas</th>
                            <th>
                                {{dinas[0].maksud_perjalanan}}
                            </th>
                        </tr>
                        <tr>
                            <th>5. Alat Transportasi</th>
                            <th>
                                {{dinas[0].alat_transportasi}}
                            </th>
                        </tr>
                        <tr>
                            <th>6. a. Tempat Berangkat</th>
                            <th>
                                {{dinas[0].tempat_berangkat }}
                            </th>

                        </tr>
                        <tr>
                            <th>b. Tempat Tujuan</th>
                            <th>
                                {{dinas[0].tempat_tujuan}}
                            </th>

                        </tr>
                        <tr>
                            <th>7. a. Lama Perjalanan Dinas</th>
                            <th>
                                {{dinas[0].l_p_dinas }} hari
                            </th>

                        </tr>
                        <tr>
                            <th>b. Tanggal berangkat</th>
                            <th>
                                {{dinas[0].tanggal_berangkat | myDateLahir}}
                            </th>
                        </tr>
                        <tr>
                            <th>c. Tanggal Kembali</th>
                            <th>
                                {{dinas[0].tanggal_kembali | myDateLahir}}
                            </th>
                        </tr>

                        <tr>
                            <th>9.Pembeban Anggaran</th>
                        </tr>
                        <tr>
                            <th>a.instansi</th>
                        </tr>
                        <tr>
                            <th>b.kegiatan</th>

                                <th>Kantor Kemenag Agama Kab.Kampar</th>
                        </tr>
                        <tr>
                            <th>c.akun belanja</th>
                        </tr>
                        <tr>
                            <th>10.Keterangan</th>
                        </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-7"></div>

                            <div class="float-right bg-white col-5">
                                <br class="col-sm-6 invoice-col">
                                <b>Dikerluarkan Di: </b>{{dinas[0].d_d}}<br>
                                <b>Pada Tanggal:</b> {{dinas[0].created_at | myDateLahir}}<br>
                                _____________________________________
                                <br>
                                <b>Pejabat Pembuat Komitmen</b><br>

                                <b>Kantor Kementrian Agama Kab.Kampar</b><br>
                                <br>
                                <br>
                                </br>
                                <br>
                                <b>{{dinas[0].users.name}}</b><br>
                                ______________________________<br>
                                <b>NIP {{dinas[0].pegawai.nip}}</b>
                            </div>

                        </div>

                </div><!-- /.card-header -->

                <div class="card-footer">
                    <button v-print="'#printMe'">Print local range</button>
                </div>


                </div>

            </div>


        </div>

</template>

<script>
    export default {
       data(){
           return {
               dinas: {},
           }

       },


        methods: {

        },


        created(){
            console.log(this.$route.params.id);
            axios.get("api/dinas/"+ this.$route.params.id)
            .then(({ data }) => (this.dinas = data));
        }



    }
</script>
