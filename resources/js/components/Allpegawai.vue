<template>
    <div class="container"v-if="$gate.isAdminOrPimpinan()">
        <div class="row mt-sm-2 ">
            <div class="col-md-12">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h4 class="m-0 text-success">Mengelola Seluruh Data Pegawai</h4>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <ul class="nav nav-pills">
                                        <li class="breadcrumb-item"><a class="nav-link " href="#activity" @click="formReset" data-toggle="tab" v-if="$gate.isAdmin()">Input Pegawai</a></li>
                                        <li class="nav-item"><a class="nav-link active show " href="#settings" data-toggle="tab">Data Pegawai</a></li>
                                    </ul>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="tab-content">
                                <div class="tab-pane " id="activity">
                                    <div class="row mt-3">
                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Nama Lengkap</label>
                                                <div class="col-sm-12">
                                                    <input type="" v-model="pegawai.nama_lengkap" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('nama_lengkap') }">
                                                    <has-error :form="pegawai" field="nama_lengkap"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Status Pegawai</label>
                                                <div class="col-sm-12">
                                                    <input type="" v-model="pegawai.status_pegawai" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('status_pegawai') }">
                                                    <has-error :form="pegawai" field="status_pegawai"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">gelar Depan</label>
                                                <div class="col-sm-12">
                                                    <input type="" v-model="pegawai.gelar_depan" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('gelar_depan') }">
                                                    <has-error :form="pegawai" field="gelar_depan"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Gelar Belakang</label>
                                                <div class="col-sm-12">
                                                    <input type="" v-model="pegawai.gelar_belakang" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('gelar_belakang') }">
                                                    <has-error :form="pegawai" field="gelar_belakang"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Nip</label>
                                                <div class="col-sm-12">
                                                    <input type="" v-model="pegawai.nip" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('nip') }">
                                                    <has-error :form="pegawai" field="nip"></has-error>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Jenis Kelamin</label>
                                                <div class="col-sm-12">
                                                    <input type="radio" name="r1" value="laki_laki" v-model="pegawai.jenis_kelamin"
                                                           :checked="pegawai.jenis_kelamin === 'laki_laki'" class="minimal">
                                                    <label class="form-check-label">Laki-Laki</label>
                                                    <input type="radio" name="r1" value="perempuan" v-model="pegawai.jenis_kelamin"
                                                           :checked="pegawai.jenis_kelamin === 'perempuan'" class="minimal">
                                                    <label class="form-check-label">perempuan</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Tempat Lahir</label>
                                                <div class="col-sm-12">
                                                    <input type="" v-model="pegawai.tempat_lahir" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('tempat_lahir') }">
                                                    <has-error :form="pegawai" field="tempat_lahir"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Tanggal Lahir</label>
                                                <div class="col-sm-12">
                                                    <input type="date" v-model="pegawai.tanggal_lahir" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('tanggal_lahir') }">
                                                    <has-error :form="pegawai" field="tanggal_lahir"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group" >
                                                <label class="col-sm-12 control-label">Pangkat/Golongan & Ruangan</label>
                                                <div class="col-sm-12">
                                                    <select name="type" id="type"
                                                            placeholder="silakan isi biodata diri anda" v-model="pegawai.p_g_r"
                                                            class="form-control" :class="{ 'is-invalid': pegawai.errors.has('bio') }">
                                                        <option :selected="pegawai.p_g_r === 'Pengatur Muda/ II.a'">Pengatur Muda/ II.a</option>
                                                        <option :selected="pegawai.p_g_r === 'Penata Muda/ III.a'">Penata Muda/ III.a</option>
                                                        <option :selected="pegawai.p_g_r === 'Pembina/IV.a'">Pembina/IV.a</option>
                                                        <option :selected="pegawai.p_g_r === 'Penata Muda Tk. I / III.b' ">Penata Muda Tk. I / III.b</option>
                                                        <option :selected="pegawai.p_g_r === 'Pembina Tk. I/ IV.b'">Pembina Tk. I/ IV.b</option>
                                                        <option :selected="pegawai.p_g_r === 'Pengatur/ II.c'">Pengatur/ II.c</option>
                                                        <option :selected="pegawai.p_g_r === 'Penata/ III.c'">Penata/ III.c</option>
                                                        <option :selected="pegawai.p_g_r === 'Juru/ I.c'">Juru/ I.c</option>
                                                        <option :selected="pegawai.p_g_r === 'Pengatur Tk. I/ II.d'">Pengatur Tk. I/ II.d</option>
                                                        <option :selected="pegawai.p_g_r === 'Penata Tk. I/ III.d'">Penata Tk. I/ III.d</option>
                                                    </select>
                                                </div>
                                                <has-error :form="pegawai" field="type"></has-error>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Npwp</label>
                                                <div class="col-sm-12">
                                                    <input type="" v-model="pegawai.npwp" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('npwp') }">
                                                    <has-error :form="pegawai" field="npwp"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "col-md-6">

                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Jabatan</label>
                                                <div class="col-sm-12">
                                                    <input type="" v-model="pegawai.jabatan" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('jabatan') }">
                                                    <has-error :form="pegawai" field="jabatan"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Mata Pelajaran Spesialis</label>
                                                <div class="col-sm-12">
                                                    <input type="" v-model="pegawai.m_p_s" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('mps') }">
                                                    <has-error :form="pegawai" field="mps"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Tempat Tugas</label>
                                                <div class="col-sm-12">
                                                    <input type="" v-model="pegawai.tempat_tugas" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('tempat_tugas') }">
                                                    <has-error :form="pegawai" field="tempat_tugas"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Unit Kerja</label>
                                                <div class="col-sm-12">
                                                    <input type="" v-model="pegawai.unit_kerja" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('unit_kerja') }">
                                                    <has-error :form="pegawai" field="unit_kerja"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Alamat Kantor</label>
                                                <div class="col-sm-12">
                                                    <input type="" v-model="pegawai.alamat_kantor" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('alamat_kantor') }">
                                                    <has-error :form="pegawai" field="alamat_kantor"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Provinsi</label>
                                                <div class="col-sm-12">
                                                    <input type="" v-model="pegawai.provinsi" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('provinsi') }">
                                                    <has-error :form="pegawai" field="provinsi"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Pendidikan Terakhir</label>
                                                <div class="col-sm-12">
                                                    <input type="" v-model="pegawai.pendidikan_terakhir" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('pendidikan_terakhir') }">
                                                    <has-error :form="pegawai" field="pendidikan_terakhir"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">No Telepeon</label>
                                                <div class="col-sm-12">
                                                    <input type="" v-model="pegawai.no_hp" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('no_hp') }">
                                                    <has-error :form="pegawai" field="no_hp"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">E-mail</label>
                                                <div class="col-sm-12">
                                                    <input type="" v-model="pegawai.email" class="form-control"
                                                           :class="{ 'is-invalid': pegawai.errors.has('email') }">
                                                    <has-error :form="pegawai" field="email"></has-error>
                                                </div>
                                            </div>

                                             <div class="card-footer">
                                            <button @click.prevent="insertPegawai" class="btn btn-block btn-success">Simpan Data</button>
                                             </div>

                                        </div>


                                        </div>

                                    </div>
                                <div class="tab-pane active" id="settings">
                                    <div class="box-body">
                                        <div class="card col-md card-success  card-outline">
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <button class="btn bg-info" @click="viewPegawai()" >Load Semua Data
                                                        <i class="fas fa-sync-alt"></i> </button>
                                                </div>

                                                <div class="col-md-6">
                                                    <input class="form-control input-sm"type="search" @keyup="searchit" v-model="search"  placeholder="Search" aria-label="Search">
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
                                                <tbody>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Nip</th>
                                                    <th>Status Pegawai</th>
                                                    <th>Email</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                <tr v-for="(v,no) in detailpegawai.data">
                                                    <td>{{no+1}}</td>
                                                    <td>{{v.nama_lengkap}}</td>
                                                    <td>{{v.nip}}</td>
                                                    <td>{{v.status_pegawai}}</td>
                                                    <td>{{v.email}}</td>
                                                    <td>{{v.tanggal_lahir | myDateLahir}}</td>
                                                    <td>
                                                        <button class="btn btn-primary" @click="editModal(v)" v-if="$gate.isAdmin()">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-warning" @click="viewModal(v)">
                                                            <i class="fa fa-info-circle "></i>
                                                        </button>

                                                        <button class="btn btn-danger" @click="destroyPegawai(v.id)"v-if="$gate.isAdmin()">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                            <div class="card-footer">
                                                <pagination :data="detailpegawai"
                                                            @pagination-change-page="getResults">
                                                </pagination>
                                            </div>




                                        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-top modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" v-show="editmode">Edit Data Pegawai</h5>
                                                        <h5 class="modal-title" v-show="!editmode">Detail Data Pegawai</h5>


                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12">
                                                            <div class="card card-success card-outline">
                                                                <div class="card-body box-profile">
                                                                    <div class="text-center">
                                                                    </div>

                                                                    <div class="row mt-3">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Nama Lengkap</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="" v-model="pegawai.nama_lengkap" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('nama_lengkap') }">
                                                                                    <has-error :form="pegawai" field="nama_lengkap"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Status Pegawai</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="" v-model="pegawai.status_pegawai" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('status_pegawai') }">
                                                                                    <has-error :form="pegawai" field="status_pegawai"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Gelar Depan</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="" v-model="pegawai.gelar_depan" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('gelar_depan') }">
                                                                                    <has-error :form="pegawai" field="gelar_depan"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Gelar Belakang</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="" v-model="pegawai.gelar_belakang" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('gelar_belakang') }">
                                                                                    <has-error :form="pegawai" field="gelar_belakang"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Nip</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="" v-model="pegawai.nip" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('nip') }">
                                                                                    <has-error :form="pegawai" field="nip"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Jenis Kelamin</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="radio" name="r1" value="laki_laki" v-model="pegawai.jenis_kelamin"
                                                                                           :checked="pegawai.jenis_kelamin === 'laki_laki'" class="minimal">
                                                                                    <label class="form-check-label">Laki-Laki</label>
                                                                                    <input type="radio" name="r1" value="perempuan" v-model="pegawai.jenis_kelamin"
                                                                                           :checked="pegawai.jenis_kelamin === 'perempuan'" class="minimal">
                                                                                    <label class="form-check-label">perempuan</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Tempat Lahir</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="" v-model="pegawai.tempat_lahir" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('tempat_lahir') }">
                                                                                    <has-error :form="pegawai" field="tempat_lahir"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Tanggal Lahir</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="date" v-model="pegawai.tanggal_lahir" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('tanggal_lahir') }">
                                                                                    <has-error :form="pegawai" field="tanggal_lahir"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group" >
                                                                                <label class="col-sm-12 control-label">PGR</label>
                                                                                <div class="col-sm-12">
                                                                                    <select name="type" id="type"
                                                                                            placeholder="silakan isi biodata diri anda" v-model="pegawai.p_g_r"
                                                                                            class="form-control" :class="{ 'is-invalid': pegawai.errors.has('bio') }">
                                                                                        <option>Pangkat/Gol.Ruangan</option>
                                                                                        <option :selected="pegawai.p_g_r === 'Pengatur Muda/ II.a'">Pengatur Muda/ II.a</option>
                                                                                        <option :selected="pegawai.p_g_r === 'Penata Muda/ III.a'">Penata Muda/ III.a</option>
                                                                                        <option :selected="pegawai.p_g_r === 'Pembina/IV.a'">Pembina/IV.a</option>
                                                                                        <option :selected="pegawai.p_g_r === 'Penata Muda Tk. I / III.b' ">Penata Muda Tk. I / III.b</option>
                                                                                        <option :selected="pegawai.p_g_r === 'Pembina Tk. I/ IV.b'">Pembina Tk. I/ IV.b</option>
                                                                                        <option :selected="pegawai.p_g_r === 'Pengatur/ II.c'">Pengatur/ II.c</option>
                                                                                        <option :selected="pegawai.p_g_r === 'Penata/ III.c'">Penata/ III.c</option>
                                                                                        <option :selected="pegawai.p_g_r === 'Juru/ I.c'">Juru/ I.c</option>
                                                                                        <option :selected="pegawai.p_g_r === 'Pengatur Tk. I/ II.d'">Pengatur Tk. I/ II.d</option>
                                                                                        <option :selected="pegawai.p_g_r === 'Penata Tk. I/ III.d'">Penata Tk. I/ III.d</option>
                                                                                    </select>
                                                                                </div>
                                                                                <has-error :form="pegawai" field="type"></has-error>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Npwp</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="" v-model="pegawai.npwp" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('npwp') }">
                                                                                    <has-error :form="pegawai" field="npwp"></has-error>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class = "col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Jabatan</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="" v-model="pegawai.jabatan" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('jabatan') }">
                                                                                    <has-error :form="pegawai" field="jabatan"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Mata Pelajaran Spesialis</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="" v-model="pegawai.m_p_s" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('m_p_s') }">
                                                                                    <has-error :form="pegawai" field="m_p_s"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Tempat Tugas</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="" v-model="pegawai.tempat_tugas" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('tempat_tugas') }">
                                                                                    <has-error :form="pegawai" field="tempat_tugas"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Unit Kerja</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="" v-model="pegawai.unit_kerja" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('unit_kerja') }">
                                                                                    <has-error :form="pegawai" field="unit_kerja"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Alamat Kantor</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="" v-model="pegawai.alamat_kantor" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('alamat_kantor') }">
                                                                                    <has-error :form="pegawai" field="alamat_kantor"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Provinsi</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="" v-model="pegawai.provinsi" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('provinsi') }">
                                                                                    <has-error :form="pegawai" field="provinsi"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Pendidikan Terakhir</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="" v-model="pegawai.pendidikan_terakhir" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('pendidikan_terakhir') }">
                                                                                    <has-error :form="pegawai" field="pendidikan_terakhir"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Nomor Hp</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="" v-model="pegawai.no_hp" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('no_hp') }">
                                                                                    <has-error :form="pegawai" field="no_hp"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-12 control-label">Email</label>
                                                                                <div class="col-sm-12">
                                                                                    <input type="email" v-model="pegawai.email" class="form-control"  pegawailaceholder="Nipegawai"
                                                                                           :class="{ 'is-invalid': pegawai.errors.has('email') }">
                                                                                    <has-error :form="pegawai" field="email"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-footer">
                                                                                <button @click.prevent="editPegawai" v-show="editmode" class="btn btn-block btn-primary">Edit Data</button>
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

                            </div>
                        </div>

                        <div v-if="!$gate.isAdminOrPimpinan()">
                            <not-found></not-found>
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
            return{
                editmode: false,
                filegitu: {},
                search: '',

                detailpegawai:{},

               pegawai: new Form({
                   id:'',
                   nama_lengkap:'',
                   status_pegawai:'',
                   gelar_depan:'',
                   gelar_belakang:'',
                   nip:'',
                   jenis_kelamin:'',
                   tempat_lahir:'',
                   tanggal_lahir:'',
                   p_g_r:'',
                   npwp:'',
                   jabatan:'',
                   m_p_s:'',
                   tempat_tugas:'',
                   unit_kerja:'',
                   alamat_kantor:'',
                   provinsi:'',
                   pendidikan_terakhir:'',
                   no_hp:'',
                   email:'',

               })
            }
        },
        methods: {


            editModal(v)
            {
                this.pegawai.reset();
                this.editmode = true;
                $('#addNew').modal('show');
                this.pegawai.fill(v);

            },
            viewModal(data){
                this.editmode = false;
                this.pegawai.fill(data);
                $('#addNew').modal('show');
            },
            formReset()
            {
              this.pegawai.reset();
            },


            insertPegawai()
            {
                this.pegawai.post('api/detail').then(()=>{
                    swal(
                        'simpan!',
                        'data berhasil disimpan',
                        'success'

                    )
                    this.pegawai.reset();
                    this.$Progress.fail();
                })
                    .catch(()=>{
                        toast({
                            type: 'error',
                            title: 'harap lengkapi form yang disediakan'

                        })
                    })

            },
            viewPegawai()
            {
                axios.get('api/detail').then(({data}) => (this.detailpegawai = data))


            },
            destroyPegawai(id)
            {
                swal({
                    title: 'anda yakin?',
                    text: "Anda Yakin Ingin Menghapus Data ini?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'delete'
                }).then((result) => {
                    // Send request to the server
                    if (result.value) {
                        this.pegawai.delete('api/detail/'+id).then(()=>{
                            swal(
                                'Deleted!',
                                'Data Berhasil Dihapus',
                                'success'
                            )
                            Fire.$emit('AfterCreate');
                            $('#addNew').modal('hide');
                        }).catch(()=> {
                            swal("Failed!", "There was something wronge.", "warning");
                        });
                    }
                })

            },
            editPegawai()
            {
                swal({
                    title: 'anda yakin ingin merubah data?',
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Update'
                }).then((result) => {
                    // Send request to the server
                    if (result.value) {
                        this.pegawai.put('api/detail/'+this.pegawai.id).then(()=>{
                            swal(
                                'Update!',
                                'Data Berhasil Diupdate',
                                'success'
                            )
                            Fire.$emit('AfterCreate');
                            $('#addNew').modal('hide');

                        }).catch(()=> {
                            swal("Failed!", "There was something wronge.", "warning");
                        });
                    }
                })



            },
            getResults(page = 1) {
                axios.get('api/detail?page=' + page)
                    .then(response => {
                        this.detailpegawai = response.data;
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



            Fire.$on('AfterCreate',()=>{
                this.viewPegawai();
            })

        }
    }

</script>
