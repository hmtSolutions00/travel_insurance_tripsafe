<!-- sekali perjalanan tab -->
<div class="tab-pane fade" id="tahunan-tab" role="tabpanel" aria-labelledby="tab-tahunan" tabindex="0">
    <form action="#" method="post" id="form-tahunan">
        <div class="row">
            <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                <input checked type="radio" id="pulang_pergi_t" name="pulang_pergi_t" value="Pulang Pergi"
                    class="text-dark form-check-input">
                Pulang Pergi
            </div>
            <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                <small class="form-check-label mb-5 fw-bold" for="jenis_asuransi_t">Jenis
                    Asuransi</small>
                <select class="form-control form-control-sm" name="jenis_asuransi_t" id="jenis_asuransi_t">
                    <option value="0" selected disabled>Pilih Jenis Asuransi
                    </option>
                    @foreach ($jenis_asuransi_2 as $ja2)
                        <option value="{{ $ja2->id }}">{{ $ja2->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                <small class="form-check-label mb-1 fw-bold" for="wilayah_t">Wilayah</small>
                <select class="form-control form-control-sm" aria-label="Pilihan" name="wilayah_t" id="wilayah_t">
                    <option value="0" selected disabled>Pilih Wilayah</option>
                    @foreach ($wilayahs as $wilayah)
                        <option value="{{ $wilayah->id }}">{{ $wilayah->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-lg-6 mb-3" style="text-align: left">
                <small class="form-check-label mb-1 fw-bold" for="tanggal_keberangkatan_t">Keberangkatan</small>
                <input type="date" class="form-control form-control-sm" id="tanggal_keberangkatan_t"
                    name="tanggal_keberangkatan_t" min="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-12 col-lg-6 mb-3" style="text-align: left">
                <small class="form-check-label mb-1 fw-bold" for="tanggal_kepulangan_t">Kepulangan</small>
                <input type="date" class="form-control form-control-sm" id="tanggal_kepulangan_t"
                    name="tanggal_kepulangan_t" min="<?php echo date('Y-m-d'); ?>" readonly>
            </div>

            <div class="col-12 col-lg-12" id="totalTanggal_t">

            </div>

            <script>
                const tanggalKeberangkatan_t = document.getElementById('tanggal_keberangkatan_t');
                const tanggalKepulangan_t = document.getElementById('tanggal_kepulangan_t');
                const totalTanggal_t = document.getElementById('totalTanggal_t');
                tanggalKeberangkatan_t.addEventListener('change', hitungJumlahHari_t);

                function hitungJumlahHari_t() {
                    checkValidity_t()
                    var tanggalKeberangkatanValue = new Date(tanggalKeberangkatan_t.value);
                    var tanggalKepulanganValue = new Date(tanggalKeberangkatanValue);
                    tanggalKepulanganValue.setFullYear(tanggalKepulanganValue.getFullYear() + 1);


                    tanggalKepulangan_t.value = tanggalKepulanganValue.toISOString().split('T')[0];
                }
            </script>

            <div class="col-6 col-lg-6 mb-3 text-center">
                <small class="form-check-label mb-1 fw-bold" for="anak1_t">Anak</small>
                <div class="input-group justify-content-center">
                    <button class="btn btn-outline-primary minus" type="button" id="anak1-minus_t">-</button>
                    <input type="text" class="form-control text-center" id="anak1_t" name="anak1_t" value="0"
                        readonly style="max-width: 50px;">
                    <button class="btn btn-outline-primary plus" id="anak1-plus_t" type="button">+</button>
                </div>
                <small class="text-muted">&lt;18 tahun</small>
            </div>

            <div class="col-6 col-lg-6 mb-3 text-center">
                <small class="form-check-label mb-1 fw-bold" for="dewasa1_t">Dewasa</small>
                <div class="input-group justify-content-center">
                    <button class="btn btn-outline-primary minus" type="button" id="dewasa1-minus_t">-</button>
                    <input type="text" class="form-control text-center" id="dewasa1_t" name="dewasa1_t"
                        value="0" readonly style="max-width: 50px;">
                    <button class="btn btn-outline-primary plus" type="button" id="dewasa1-plus_t">+</button>
                </div>
                <small class="text-muted">18-65 tahun</small>
            </div>

            <!--<div class="col-6 col-lg-6 mb-3 text-center">-->
            <!--    <small class="form-check-label mb-1 fw-bold" for="lansia1_t">Lansia</small>-->
            <!--    <div class="input-group justify-content-center">-->
            <!--        <button class="btn btn-outline-primary minus" type="button" id="lansia1-minus_t">-</button>-->
            <!--        <input type="text" class="form-control text-center" id="lansia1_t" name="lansia1_t"-->
            <!--            value="0" readonly style="max-width: 50px;">-->
            <!--        <button class="btn btn-outline-primary plus" type="button" id="lansia1-plus_t">+</button>-->
            <!--    </div>-->
            <!--    <small class="text-muted">70-84 tahun</small>-->
            <!--</div>-->

            <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                <small class="form-check-label mb-1 fw-bold" for="kode_promo">Kode Promo (Opsional)</small>
                <div class="input-group">
                    <div class="col-8 col-lg-6">
                        <input type="text" class="form-control form-control-sm" id="kode_promo_t"
                            name="kode_promo_t" style="border:solid 1px; border-color: #0393D2;border-bottom-right-radius: 0;border-top-right-radius: 0">
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                <small class="form-check-label mb-1 fw-bold" for="kode_promo">Kode Promo (Opsional)</small>
                <div class="input-group">
                    <div class="col-8 col-lg-6">
                        <input type="text" class="form-control form-control-sm" id="kode_promo_t"
                            name="kode_promo_t" style="border:solid 1px; border-color: #0393D2;border-bottom-right-radius: 0;border-top-right-radius: 0">
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-12 mb-3 text-center" id="mass_jlhPelanggan_t">
            </div>

            <script>
                const jenisAsuransiSelect_t = document.getElementById('jenis_asuransi_t');
                const anakInput_t = document.getElementById('anak1_t');
                const dewasaInput_t = document.getElementById('dewasa1_t');
                const lansiaInput_t = document.getElementById('lansia1_t');
                const massJlhPelangganDiv_t = document.getElementById('mass_jlhPelanggan_t');
                const lansia1BtnM_t = document.getElementById('lansia1-minus_t');
                const lansia1BtnP_t = document.getElementById('lansia1-plus_t');
                const dewasa1BtnM_t = document.getElementById('dewasa1-minus_t');
                const dewasa1BtnP_t = document.getElementById('dewasa1-plus_t');
                const anak1BtnM_t = document.getElementById('anak1-minus_t');
                const anak1BtnP_t = document.getElementById('anak1-plus_t');
                const wilayahSelect_t = document.getElementById('wilayah_t');
                const promoInput_t = document.getElementById('kode_promo_t');

                function checkValidity_t() {
                    $('#btn-penawaran_t').click();
                    var valBerangkat_t = tanggalKeberangkatan_t.value;
                    var valPulang_t = tanggalKepulangan_t.value
                    if (valBerangkat_t.trim() === '' || valPulang_t.trim() === '') {
                        dataValid = false;
                    } else {
                        dataValid = true;
                    }
                    var jenisAsuransi = jenisAsuransiSelect_t.value;
                    var anak_t = parseInt(anakInput_t.value);
                    var dewasa_t = parseInt(dewasaInput_t.value);
                    var lansia_t = parseInt(lansiaInput_t.value);
                    var total = anak_t + dewasa_t + lansia_t;
                    var tombol = document.getElementById('btn-penawaran_t');
                    console.log(anak_t);
                    if (jenisAsuransi === '1') {
                        if (total !== 1) {
                            console.log('Individual')
                            massJlhPelangganDiv_t.innerHTML = `
                        <div class = "alert alert-warning" >
                            <i class = "fas fa-exclamation-triangle" ></i>
                            Jumlah pelanggan harus sama dengan 1 untuk jenis asuransi Individual.
                        </div>
                        `;

                            tombol.disabled = true;
                            dataValid = false;
                            return false;
                        } else {
                            massJlhPelangganDiv_t.innerHTML = '';
                            tombol.disabled = false;
                            dataValid = false;
                            return false;
                        }
                    } else if (jenisAsuransi === '2') {
                        console.log("Couple");
                        if (total !== 2) {
                            massJlhPelangganDiv_t.innerHTML = `
                        <div class = "alert alert-warning" >
                            <i class = "fas fa-exclamation-triangle" ></i>
                            Jumlah pelanggan harus sama dengan 2 untuk jenis asuransi Couple.
                        </div>
                        `;
                            tombol.disabled = true;
                            dataValid = false;
                            return false;
                        } else {
                            massJlhPelangganDiv_t.innerHTML = '';
                            tombol.disabled = false;
                            dataValid = false;
                            return false;
                        }
                    } else if (jenisAsuransi === '3') {
                        console.log("Family");
                        if (total < 3) {
                            massJlhPelangganDiv_t.innerHTML = `
                        <div class = "alert alert-warning" >
                            <i class = "fas fa-exclamation-triangle" ></i>
                            Jumlah pelanggan minimal 3 untuk jenis asuransi Family.
                        </div>
                        `;
                            tombol.disabled = true;
                            dataValid = false;
                            return false;
                        } else {
                            massJlhPelangganDiv_t.innerHTML = '';
                            tombol.disabled = false;
                            dataValid = false;
                            return false;
                        }
                    }
                    massJlhPelangganDiv_t.innerHTML = '';
                    dataValid = false;
                    return true;
                }
                let timeoutId_t = null;
                promoInput_t.addEventListener('keydown',  function() {
                    clearTimeout(timeoutId_t);
                    timeoutId_t = setTimeout(checkValidity_t, 500);
                });
                jenisAsuransiSelect_t.addEventListener('change', checkValidity_t);
                wilayahSelect_t.addEventListener('change', checkValidity_t);
                anakInput_t.addEventListener('input', checkValidity_t);
                dewasaInput_t.addEventListener('input', checkValidity_t);
                lansiaInput_t.addEventListener('input', checkValidity_t);

                lansia1BtnP_t.addEventListener('click', function() {
                    clearTimeout(timeoutId_t);
                    timeoutId_t = setTimeout(checkValidity_t, 500);
                });
                lansia1BtnM_t.addEventListener('click', function() {
                    clearTimeout(timeoutId_t);
                    timeoutId_t = setTimeout(checkValidity_t, 500);
                });
                dewasa1BtnP_t.addEventListener('click', function() {
                    clearTimeout(timeoutId_t);
                    timeoutId_t = setTimeout(checkValidity_t, 500);
                });
                dewasa1BtnM_t.addEventListener('click', function() {
                    clearTimeout(timeoutId_t);
                    timeoutId_t = setTimeout(checkValidity_t, 500);
                });
                anak1BtnP_t.addEventListener('click', function() {
                    clearTimeout(timeoutId_t);
                    timeoutId_t = setTimeout(checkValidity_t, 500);
                });
                anak1BtnM_t.addEventListener('click', function() {
                    clearTimeout(timeoutId_t);
                    timeoutId_t = setTimeout(checkValidity_t, 500);
                });
            </script>


            <div class="col-12 col-lg-12 mb-3 text-center">
                <div class="col-12 d-grid">
                    <button type="button" class="w-100 btn text-white" style="background-color: #0393D2"
                        id="btn-penawaran_t" disabled>
                        BUAT
                        PENAWARAN</button>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#btn-penawaran_t').on('click', function() {
                            const jenisAsuransi_t = document.getElementById('jenis_asuransi_t').value;
                            const anak_t = document.getElementById('anak1_t').value;
                            const dewasa_t = document.getElementById('dewasa1_t').value;
                            const lansia_t = document.getElementById('lansia1_t').value;
                            const wilayah_t = document.getElementById('wilayah_t').value;
                            const tglKeberangkatan_t = document.getElementById('tanggal_keberangkatan_t').value;
                            const tglKepulangan_t = document.getElementById('tanggal_kepulangan_t').value;
                            const tabelAsuransi_t = document.getElementById('table-asuransi_t');
                            const promoVal_t = document.getElementById('kode_promo_t').value;
                            const totalHari_t = Math.round((tglKeberangkatan_t - tglKeberangkatan_t) / (1000 * 3600 *
                                24)) + 1;
                            if (anak_t == 0 && dewasa_t == 0 && lansia_t == 0) {
                                dataValid = false;
                            } else {
                                dataValid = true;
                            }
                            if (wilayah_t == 0) {
                                massJlhPelangganDiv_t.innerHTML = `
                                <div class = "alert alert-warning" >
                                    <i class = "fas fa-exclamation-triangle" ></i>
                                    Wilayah tujuan masih Kosong.
                                </div>
                                `;
                            } else {
                                massJlhPelangganDiv_t.innerHTML = ``;
                            }

                            if ((tglKeberangkatan_t || tglKeberangkatan_t.trim() === '')) {
                                massJlhPelangganDiv_t.innerHTML = `
                            <div class = "alert alert-warning" >
                                <i class = "fas fa-exclamation-triangle" ></i>
                                Tanggal Keberangkatan masih Kosong.
                            </div>
                            `;
                            } else {
                                massJlhPelangganDiv_t.innerHTML = ``;
                            }

                            if (tglKepulangan_t === '') {
                                massJlhPelangganDiv_t.innerHTML = `
                            <div class = "alert alert-warning" >
                                <i class = "fas fa-exclamation-triangle" ></i>
                                Tanggal Kepulangan masih Kosong.
                            </div>
                            `;
                            } else {
                                massJlhPelangganDiv_t.innerHTML = ``;
                            }

                            $.ajax({
                                url: '{{ route('getAsuransi') }}?jenisAsuransi=' + jenisAsuransi_t +
                                    '&wilayah=' +
                                    wilayah_t + '&tglKeberangkatan=' + tglKeberangkatan_t + '&tglKepulangan=' +
                                    tglKepulangan_t + '&jlhAnak=' + anak_t + '&jlhDewasa=' + dewasa_t +
                                    '&jlhLansia=' + lansia_t + '&tipePerjalanan=' + 2 + '&kodePromo=' + promoVal_t,
                                type: 'get',
                                success: function(res) {
                                    if (dataValid == true && res['promoExist'] == true) {
                                        var table = $('#table-asuransi');
                                        var tbody = table.find('tbody');
                                        var thead = table.find('thead');
                                        var modal = $('#benefit-modal');
                                        var jlhAdl_t = anak_t + dewasa_t + lansia_t;

                                        tbody.empty();
                                        thead.empty();
                                        var row3 = $('<tr>');
                                            row3.append($('<th>').text("Produk"));
                                            row3.append($('<th>').text("Paket"));
                                            row3.append($('<th>').text("Premi"));
                                            row3.append($('<th>').text("Materai"));
                                            row3.append($('<th>').text("Detail"));
                                            row3.append($('<th>').text(""));
                                            thead.append(row3);
                                        var arrLength_t = res['paket_asuransi'].length;

                                        if (arrLength_t == 0) {
                                            var row2 = $('<tr>');
                                            row2.append(`
                                        <td colspan="6" style="place-content: center; font-style: italic">Data Tidak Ada</td>
                                        `);
                                            tbody.append(row2);
                                        }
                                        $.each(res['paket_asuransi'], function(key, value) {
                                            
                                            var row = $('<tr>');
                                            row.append($('<td>').text(value.product_name));
                                            row.append($('<td>').text(value.nama_paket));
                                            if(res['promoValue'] == false){
                                                row.append($('<td>').text(formatRupiah(value.price)));
                                            }else{
                                                row.append(`
                                                <td style="align-content:center"><del><small>` + formatRupiah(value.price) + `</small></del></br>` +   formatRupiah(res['arrDiscPremi'][key]) +`</td>
                                                `);
                                            }
                                            row.append($('<td>').text(formatRupiah(value
                                                .cetak_polis)));
                                            row.append(`
                                        <td style="place-content: center; color: #0393D2;"><button class="btn"
                                                    data-bs-toggle="modal" data-bs-target="#modal-detail-asuransi-` +
                                                key + `"
                                                    style="background: transparent; border-color: transparent;">
                                                    <i class="fa-solid fa-circle-info fa-md text-secondary fs-5"></i>
                                                </button></td>
                                        `);
                                            if (jlhAdl_t == 0 || tglKeberangkatan_t == null ||
                                                tglKepulangan_t == null || $('#btn-penawaran_t')
                                                .prop(
                                                    'disabled') === true) {
                                                row.append(
                                                    `<td>
                                                <button class="btn text-white fw-bold btnPilih" disabled
                                                    style="background-color:#0393D2">
                                                <small>Pilih</small></button>
                                                </td> `
                                                );
                                            } else {
                                                row.append(
                                                    `<td>
                                                <button class="btn text-white fw-bold btnPilih" onclick="ContinueConfirmation` +
                                                    value.id + `(this)"
                                                    style="background-color:#0393D2">
                                                <small>Pilih</small></button>
                                                </td> `
                                                );
                                            }
                                            row.append(
                                                `
                                            <script>
                                                function ContinueConfirmation` + value.id + `(button) {
                                                    // var kode = $(button).closest(.action).find(#id_car).val();
                                                    Swal.fire({
                                                        title: "Konfirmasi",
                                                        text: "Apakah Anda yakin ingin memilih paket asuransi ini?",
                                                        icon: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonText: "Ya",
                                                        cancelButtonText: "Batal",
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            window.location.href = "/data/penumpang/` +
                                                `?paket=` + encodeURIComponent(JSON.stringify(
                                                    value)) + `&pulang=` +
                                                tglKepulangan_t + `&anak=` + anak_t +
                                                `&dewasa=` +
                                                dewasa_t + `&lansia=` + lansia_t +
                                                `&berangkat=` +
                                                tglKeberangkatan_t + `&kodePromo=` + promoVal_t +`";
                                                        }
                                                    });
                                                }`
                                            )
                                            tbody.append(row);
                                            modal.append(`
                                                <div class="modal fade modal-xl" id="modal-detail-asuransi-` + key +
                                                `" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content p-3">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Asuransi</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body" style="text-align: left">
                                                                <small>Berikut adalah detail benefit dari paket asuransi :</small>
                                                                <table class="table table-bordered m-1" id="table-benefit-` +
                                                key + `">
                                                                    <tbody>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        `);

                                            var table2 = $('#table-benefit-' + key);
                                            var tbody2 = table2.find('tbody');

                                            tbody2.empty();
                                            $.each(res['manfaat'], function(key2, value2) {
                                                tbody2.append(`
                                            <tr><td colspan="2" class="fw-bold"><small>` + value2.name + `</small></td></tr>
                                            `);
                                                $.each(res['detail_manfaat'], function(key3,
                                                    value3) {
                                                    if (value3.insurance_type_id ==
                                                        value.paket_asuransi_id &&
                                                        value2.id == value3
                                                        .benefits_id
                                                    ) {
                                                        tbody2.append(`
                                                            <tr>
                                                                <td><small>` + value3.opsi_manfaat + `</small></td>
                                                                <td class="text-center"><small>` + value3.price + `</small></td>
                                                            </tr>
                                                        `);
                                                    }
                                                });
                                            });
                                        });
                                    } else {
                                        if(res['promoExist'] == false){
                                            massJlhPelangganDiv_t.innerHTML = `<div class = "alert alert-warning" >
                                                                    <i class = "fas fa-exclamation-triangle" ></i>
                                                                    `+ res['pesanPromo']+`
                                                                </div>`;
                                        }
                                        var table = $('#table-asuransi');
                                        var thead = table.find('thead');
                                        var tbody = table.find('tbody');
                                        var modal = $('#benefit-modal');
                                        thead.html('');
                                        tbody.html('');
                                        const trBenefit = document.getElementById('tr-benefit');
                                        if (trBenefit) {
                                            trBenefit.remove();
                                        }

                                        var row3 = $('<tr>');
                                        row3.append($('<th>').text("Produk"));
                                        row3.append($('<th>').text("Paket"));
                                        row3.append($('<th>').text("Premi"));
                                        row3.append($('<th>').text("Materai"));
                                        row3.append($('<th>').text("Detail"));
                                        row3.append($('<th>').text(""));
                                        thead.append(row3);

                                        var row2 = $('<tr>');
                                        row2.append(`
                                        <td colspan="6" style="place-content: center; font-style: italic">Data Tidak Ada</td>
                                        `);
                                        tbody.append(row2);

                                    }
                                }
                            });
                        });
                    });
                </script>
            </div>
        </div>

    </form>
</div>
