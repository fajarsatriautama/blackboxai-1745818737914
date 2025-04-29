<div class="tab-content" id="myTabContent2">
    <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
        <form id="form-datadiri">
            <table>
                <tr>
                    <td width="35%">Nomor Pendaftaran</td>
                    <td width="5%">:</td>
                    <td width="60%"><?= htmlspecialchars($siswa['no_daftar']) ?></td>
                </tr>
                <tr>
                    <td>Jalur Pendaftaran</td>
                    <td>:</td>
                    <td><b><?= htmlspecialchars($siswa['jurusan']) ?></b></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><b><?= htmlspecialchars($siswa['nama']) ?></b></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= htmlspecialchars($siswa['jenkel']) ?></td>
                </tr>
                <tr>
                    <td>Nama Sekolah Asal</td>
                    <td>:</td>
                    <td><?= htmlspecialchars($siswa['asal_sekolah']) ?></td>
                </tr>
                <tr>
                    <td>NPSN Sekolah Asal</td>
                    <td>:</td>
                    <td><?= htmlspecialchars($siswa['npsn_asal']) ?></td>
                </tr>
                <tr>
                    <td>Lokasi Tes</td>
                    <td>:</td>
                    <td>MTs Negeri 1 Lebak</td>
                </tr>
                <tr>
                    <td>Tanggal Tes</td>
                    <td>:</td>
                    <td><?php
                        if($siswa['jurusan'] == 'Prestasi Akademik' || 
                           $siswa['jurusan'] == 'Prestasi Non Akademik' || 
                           $siswa['jurusan'] == 'Prestasi Tahfizh') {
                            echo '30 April 2025';
                        } elseif($siswa['jurusan'] == 'Reguler') {
                            echo '6 Mei 2025';
                        } else {
                            echo 'Belum Ada Jadwal';
                        }
                    ?></td>
                </tr>
                <tr>
                    <td>Jadwal Tes</td>
                    <td>:</td>
                    <td><?php
                        switch($siswa['jurusan']) {
                            case 'Prestasi Akademik':
                                echo '10.00 - 11.30 WIB';
                                break;
                            case 'Prestasi Non Akademik':
                                echo '13.00 - Selesai WIB';
                                break;
                            case 'Prestasi Tahfizh':
                                echo '08.00 - 09.30 WIB';
                                break;
                            case 'Reguler':
                                echo '08.00 - 15.00 WIB (sesuaikan sesi)';
                                break;
                            default:
                                echo 'Belum Ada Jadwal';
                        }
                    ?></td>
                </tr>
            </table>
        </form>
    </div>
</div>
