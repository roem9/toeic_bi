<?php $this->load->view("_partials/header")?>
    
    <div class="wrapper" id="elementtoScrollToID">
        <!-- <div class="sticky-top">
            <?php $this->load->view("_partials/navbar-header")?>
        </div> -->
        <div class="page-wrapper" id="">
            <div class="page-body">
                <div class="container-xl">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6">
                                <?php if(isset($nama)) :?>
                                    <div class="card shadow mb-4">
                                        <div class="card-body text-gray-900">
                                            <center>
                                                <img src="<?= $link_foto[0]['value']?>/assets/img/logo.png?t=<?= time()?>" width=150 class="img-fluid mb-3" alt="">
                                            </center>
                                        <!-- </div>
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"> -->
                                            <h5 class="m-0 mb-3 font-weight-bold text-dark">No. Sertifikat : </i><?= $no_doc?></h5>
                                        <!-- </div> -->
                                        <!-- <div class="card-body text-gray-900"> -->
                                            <p>Nama : <?= ucwords(strtolower($nama))?></p>
                                            <p>TTL : <?= $t4_lahir?>, <?= tgl_indo($tgl_lahir)?></p>
                                            <p>Alamat : <?= ucwords(strtolower($alamat))?></p>
                                            <p>Nilai Listening : <?= $listening?></p>
                                            <p>Nilai Reading : <?= $reading?></p>
                                            <p>Skor TOEIC : <?= round($skor)?></p>
                                            <p>Tgl Tes : <?= tgl_indo($tgl_tes)?></p>
                                            <p>Berlaku Sampai : <?= tgl_indo($tgl_berakhir)?></p>
                                            <p><small class="text-danger"><i>Catatan : Data diatas adalah data tes TOEIC peserta yang sebenar-benarnya. Dan tidak ada pengurangan dan penambahan nilai sedikitpun</i></small></p>
                                            <!-- <p><b>Masih belum puas dengan skor TOEIC yang Anda dapatkan hari ini? Yuk Belajar TOEIC Online di</b> <a href="https://bahasainggris.net/" target="_blank"><b>bahasainggris.net</b></a></p>
                                            <p><b>Bahasa Inggris jadi mudah hanya di</b> <a href="https://bahasainggris.net/" target="_blank"><b>bahasainggris.net</b></a></p> -->
                                        </div>
                                    </div>
                                <?php else :?>
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-dark">Sertifikat Tidak Tersedia</i></h6>
                                        </div>
                                        <div class="card-body text-gray-900">
                                            <div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning mr-3"></i>Maaf Sertifikat Anda Tidak Ditemukan</div>
                                        </div>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view("_partials/footer")?>