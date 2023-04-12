<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Contact</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>                </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <?= $this->session->flashdata('pesan'); ?>
                    </div>
 
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Contact</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('admin/contact/edit_data_aksi') ?>" method="post"
                                    >
                                    <div class="form-row mb-3">
                                        <div class="col">
                                            <label>Provinsi</label>
                                            <select name="provinsi" id="provinsi" class="form-select" required></select>
                                        </div>
                                        <div class="col">
                                            <label>Kota/Kabupaten</label>
                                            <select name="kota" id="kota" class="form-select" required>
                                                <option value="<?= $contact['kota_contact'] ?>"><?= $contact['kota_contact'] ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="alamat_contact" value="<?= $contact['alamat_contact'] ?>" required>
                                        <?= form_error('alamat_contact', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="hidden" name="id_contact" value="<?= $contact['id_contact'] ?>">
                                        <input type="text" class="form-control" name="email_contact" value="<?= $contact['email_contact'] ?>" required>
                                        <?= form_error('email_contact', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>No. Telepon</label>
                                        <input type="number" class="form-control" name="no_telp_contact" value="<?= $contact['no_telp_contact'] ?>" required>
                                        <?= form_error('no_telp_contact', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>
                                    

                                </div>
                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-block btn-info my-1"><i class="fa fa-edit"></i> Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- ROW-1 CLOSED -->

            </div>
            <!-- CONTAINER END -->
        </div>
    </div>
    <!--app-content close-->

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $.ajax({
            type: "POST",
            url: "<?= base_url('home/checkout/provinsi') ?>",
            success: function(hasil_provinsi){
                    // console.log(hasil_provinsi);
                    $("select[name=provinsi]").html(hasil_provinsi);
                }
            });
        $("select[name=provinsi]").on("change",function(){
            var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");

            $.ajax({
                type: "POST",
                url: "<?= base_url('home/checkout/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota){
                    // console.log(hasil_kota);
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });

    });
</script>