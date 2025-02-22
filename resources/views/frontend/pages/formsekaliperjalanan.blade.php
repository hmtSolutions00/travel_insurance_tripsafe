<!-- sekali perjalanan tab -->
<div class="tab-pane fade show active" id="sekali-perjalanan-tab" role="tabpanel" aria-labelledby="tab-sekali-perjalanan"
    tabindex="0">
    <form action="#" method="post" id="form-sekali-perjalan">
        <div class="row">
            <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                <input checked type="radio" id="pulang_pergi" name="pulang_pergi" value="Pulang Pergi"
                    class="text-dark form-check-input">
                Pulang Pergi
            </div>
            <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                <small class="form-check-label mb-5 fw-bold" for="jenis_Asuransi">Jenis
                    Asuransi</small>
                <select class="form-control form-control-sm" name="jenis_asuransi" id="jenis_asuransi">
                    <option value="0" selected disabled>Pilih Jenis Asuransi
                    </option>
                    @foreach ($jenis_asuransi_1 as $ja1)
                        <option value="{{ $ja1->id }}">{{ $ja1->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                <small class="form-check-label mb-1 fw-bold" for="wilayah">Wilayah</small>
                <select class="form-control form-control-sm" aria-label="Pilihan" name="wilayah" id="wilayah">
                    <option value="0" selected disabled>Pilih Wilayah</option>
                    @foreach ($wilayahs as $wilayah)
                        <option value="{{ $wilayah->id }}">{{ $wilayah->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-lg-6 mb-3" style="text-align: left">
                <small class="form-check-label mb-1 fw-bold" for="tanggal_keberangkatan">Tanggal
                    Keberangkatan</small>
                <input type="date" class="form-control form-control-sm" id="tanggal_keberangkatan"
                    name="tanggal_keberangkatan" min="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-12 col-lg-6 mb-3" style="text-align: left">
                <small class="form-check-label mb-1 fw-bold" for="tanggal_kepulangan">Tanggal
                    Kepulangan</small>
                <input type="date" class="form-control form-control-sm" id="tanggal_kepulangan"
                    name="tanggal_kepulangan" min="<?php echo date('Y-m-d'); ?>">
            </div>

            <script>
                const tanggalKeberangkatan = document.getElementById('tanggal_keberangkatan');
                const tanggalKepulangan = document.getElementById('tanggal_kepulangan');

                tanggalKeberangkatan.addEventListener('change', hitungJumlahHari);
                tanggalKepulangan.addEventListener('change', hitungJumlahHari);

                function hitungJumlahHari() {
                    const tanggalKeberangkatanValue = new Date(tanggalKeberangkatan.value);
                    const tanggalKepulanganValue = new Date(tanggalKepulangan.value);

                    if (tanggalKeberangkatanValue && tanggalKepulanganValue) {
                        const jumlahHariValue = Math.round((tanggalKepulanganValue - tanggalKeberangkatanValue) / (1000 * 3600 *
                            24)) + 1;

                        if (!document.getElementById('jumlah_hari')) {
                            const jumlahHariElement = document.createElement('div');
                            jumlahHariElement.id = 'jumlah_hari';
                            jumlahHariElement.className = 'col-12 col-lg-12 mb-3 mt-1';
                            jumlahHariElement.style.textAlign = 'left';
                            jumlahHariElement.innerHTML = `
                                                                <i class="fa-solid fa-clock fa-sm"></i>
                                                                <small class="form-check-label mb-1" style="font-style:italic">Total perjalanan 0 hari</small>
                                                                `;

                            tanggalKeberangkatan.parentNode.appendChild(jumlahHariElement);
                        } else {
                            document.getElementById('jumlah_hari').querySelectorAll('small')[0].innerText =
                                `Total perjalanan ${jumlahHariValue} hari`;
                        }
                    }
                }
            </script>

            <div class="col-6 col-lg-4 mb-3 text-center">
                <small class="form-check-label mb-1 fw-bold" for="anak1">Anak</small>
                <div class="input-group justify-content-center">
                    <button class="btn btn-outline-primary minus" type="button" id="anak1-minus">-</button>
                    <input type="text" class="form-control text-center" id="anak1" name="anak1" value="0"
                        readonly style="max-width: 50px;">
                    <button class="btn btn-outline-primary plus" id="anak1-plus" type="button">+</button>
                </div>
                <small class="text-muted">&lt;18 tahun</small>
            </div>

            <div class="col-6 col-lg-4 mb-3 text-center">
                <small class="form-check-label mb-1 fw-bold" for="dewasa1">Dewasa</small>
                <div class="input-group justify-content-center">
                    <button class="btn btn-outline-primary minus" type="button" id="dewasa1-minus">-</button>
                    <input type="text" class="form-control text-center" id="dewasa1" name="dewasa1" value="0"
                        readonly style="max-width: 50px;">
                    <button class="btn btn-outline-primary plus" type="button" id="dewasa1-plus">+</button>
                </div>
                <small class="text-muted">18-69 tahun</small>
            </div>

            <div class="col-6 col-lg-4 mb-3 text-center">
                <small class="form-check-label mb-1 fw-bold" for="lansia1">Lansia</small>
                <div class="input-group justify-content-center">
                    <button class="btn btn-outline-primary minus" type="button" id="lansia1-minus">-</button>
                    <input type="text" class="form-control text-center" id="lansia1" name="lansia1" value="0"
                        readonly style="max-width: 50px;">
                    <button class="btn btn-outline-primary plus" type="button" id="lansia1-plus">+</button>
                </div>
                <small class="text-muted">70-84 tahun</small>
            </div>

            <div class="col-12 col-lg-12 mb-3 text-center" id="mass_jlhPelanggan">
            </div>

            <script>
                const jenisAsuransiSelect = document.getElementById('jenis_asuransi');
                const anakInput = document.getElementById('anak1');
                const dewasaInput = document.getElementById('dewasa1');
                const lansiaInput = document.getElementById('lansia1');
                const massJlhPelangganDiv = document.getElementById('mass_jlhPelanggan');
                const lansia1BtnM = document.getElementById('lansia1-minus');
                const lansia1BtnP = document.getElementById('lansia1-plus');
                const dewasa1BtnM = document.getElementById('dewasa1-minus');
                const dewasa1BtnP = document.getElementById('dewasa1-plus');
                const anak1BtnM = document.getElementById('anak1-minus');
                const anak1BtnP = document.getElementById('anak1-plus');

                function checkValidity() {
                    const jenisAsuransi = jenisAsuransiSelect.value;
                    const anak = parseInt(anakInput.value);
                    const dewasa = parseInt(dewasaInput.value);
                    const lansia = parseInt(lansiaInput.value);
                    const total = anak + dewasa + lansia;
                    const tombol = document.getElementById('btn-penawaran');
                    if (jenisAsuransi === '1') {
                        if (total !== 1) {
                            massJlhPelangganDiv.innerHTML = `
                                                            <div class = "alert alert-warning" >
                                                                <i class = "fas fa-exclamation-triangle" ></i>
                                                                Jumlah pelanggan harus sama dengan 1 untuk jenis asuransi Individual.
                                                            </div>
                                                            `;

                            tombol.disabled = true;

                            return false;
                        } else {
                            massJlhPelangganDiv.innerHTML = '';
                            tombol.disabled = false;
                            return false;
                        }
                    } else if (jenisAsuransi === '2') {
                        console.log("Couple");
                        if (total !== 2) {
                            massJlhPelangganDiv.innerHTML = `
                                                            <div class = "alert alert-warning" >
                                                                <i class = "fas fa-exclamation-triangle" ></i>
                                                                Jumlah pelanggan harus sama dengan 2 untuk jenis asuransi Couple.
                                                            </div>
                                                            `;
                            tombol.disabled = true;
                            return false;
                        } else {
                            massJlhPelangganDiv.innerHTML = '';
                            tombol.disabled = false;
                            return false;
                        }
                    } else if (jenisAsuransi === '3') {
                        console.log("Family");
                        if (total < 3) {
                            massJlhPelangganDiv.innerHTML = `
                                                            <div class = "alert alert-warning" >
                                                                <i class = "fas fa-exclamation-triangle" ></i>
                                                                Jumlah pelanggan minimal 3 untuk jenis asuransi Family.
                                                            </div>
                                                            `;
                            tombol.disabled = true;
                            return false;
                        } else {
                            massJlhPelangganDiv.innerHTML = '';
                            tombol.disabled = false;
                            return false;
                        }
                    }

                    massJlhPelangganDiv.innerHTML = '';
                    return true;
                }
                let timeoutId = null;

                jenisAsuransiSelect.addEventListener('change', checkValidity);
                anakInput.addEventListener('input', checkValidity);
                dewasaInput.addEventListener('input', checkValidity);
                lansiaInput.addEventListener('input', checkValidity);
                lansia1BtnP.addEventListener('click', function() {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(checkValidity, 500);
                });
                lansia1BtnM.addEventListener('click', function() {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(checkValidity, 500);
                });
                dewasa1BtnP.addEventListener('click', function() {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(checkValidity, 500);
                });
                dewasa1BtnM.addEventListener('click', function() {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(checkValidity, 500);
                });
                anak1BtnP.addEventListener('click', function() {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(checkValidity, 500);
                });
                anak1BtnM.addEventListener('click', function() {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(checkValidity, 500);
                });
            </script>


            <div class="col-12 col-lg-12 mb-3 text-center">
                <div class="col-12 d-grid">
                    <button type="button" class="w-100 btn text-white" style="background-color: #0393D2"
                        id="btn-penawaran" disabled>
                        BUAT
                        PENAWARAN</button>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#btn-penawaran').on('click', function() {
                            const jenisAsuransi = document.getElementById('jenis_asuransi').value;
                            const anak = document.getElementById('anak1').value;
                            const dewasa = document.getElementById('dewasa1').value;
                            const lansia = document.getElementById('lansia1').value;
                            const wilayah = document.getElementById('wilayah').value;
                            const tglKeberangkatan = document.getElementById('tanggal_keberangkatan').value;
                            const tglKepulangan = document.getElementById('tanggal_kepulangan').value;
                            const tabelAsuransi = document.getElementById('table-asuransi');
                            const totalHari = Math.round((tglKeberangkatan - tglKeberangkatan) / (1000 * 3600 *
                                24)) + 1;

                            if (wilayah == 0) {
                                massJlhPelangganDiv.innerHTML = `
                                                                    <div class = "alert alert-warning" >
                                                                        <i class = "fas fa-exclamation-triangle" ></i>
                                                                        Wilayah tujuan masih Kosong.
                                                                    </div>
                                                                    `;
                            } else {
                                massJlhPelangganDiv.innerHTML = ``;
                            }

                            if ((tglKeberangkatan || tglKeberangkatan.trim() === '')) {
                                massJlhPelangganDiv.innerHTML = `
                                                                <div class = "alert alert-warning" >
                                                                    <i class = "fas fa-exclamation-triangle" ></i>
                                                                    Tanggal Keberangkatan masih Kosong.
                                                                </div>
                                                                `;
                            } else {
                                massJlhPelangganDiv.innerHTML = ``;
                            }

                            if (tglKepulangan === '') {
                                massJlhPelangganDiv.innerHTML = `
                                                                <div class = "alert alert-warning" >
                                                                    <i class = "fas fa-exclamation-triangle" ></i>
                                                                    Tanggal Kepulangan masih Kosong.
                                                                </div>
                                                                `;
                            } else {
                                massJlhPelangganDiv.innerHTML = ``;
                            }

                            $.ajax({
                                url: '{{ route('getAsuransi') }}?jenisAsuransi=' + jenisAsuransi + '&wilayah=' +
                                    wilayah + '&tglKeberangkatan=' + tglKeberangkatan + '&tglKepulangan=' +
                                    tglKepulangan + '&jlhAnak=' + anak + '&jlhDewasa=' + dewasa +
                                    '&jlhLansia=' + lansia + '&tipePerjalanan=' + 1,
                                type: 'get',
                                success: function(res) {
                                    var table = $('#table-asuransi');
                                    var tbody = table.find('tbody');
                                    tbody.empty();
                                    console.log(res);
                                    $.each(res, function(key, value) {
                                        var row = $('<tr>');
                                        row.append($('<td>').text(value.product_name));
                                        row.append($('<td>').text(value.nama_paket));
                                        row.append($('<td>').text(formatRupiah(value.price)));
                                        row.append($('<td>').text(formatRupiah(value.cetak_polis)));
                                        row.append(`
                                        <td style="place-content: center; color: #0393D2;"><button class="btn"
                                                    data-bs-toggle="modal" data-bs-target="#modal-detail-asuransi"
                                                    style="background: transparent; border-color: transparent;">
                                                    <i class="fa-solid fa-circle-info fa-md text-secondary fs-5"></i>
                                                </button></td>
                                        `);
                                        row.append(
                                            `<td>
                                                <button class="btn text-white fw-bold" onclick="ContinueConfirmation`+ value.id+`(this)"
                                                    style="background-color:#0393D2">
                                                <small>Pilih</small></button>
                                                </td> `
                                        );
                                        row.append(
                                            `
                                            <script>
                                                function ContinueConfirmation`+ value.id+`(button) {
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
                                                    `?berangkat=` + tglKeberangkatan + `&pulang=` +
                                                    tglKepulangan + `&anak=` + anak + `&dewasa=` +
                                                    dewasa + `&lansia=` + lansia + `&paket=` +
                                                    encodeURIComponent(JSON.stringify(value)) + `";
                                                        }
                                                    });
                                                }`
                                        )
                                        tbody.append(row);
                                    });
                                }
                            });
                        });
                    });
                </script>
            </div>
        </div>

    </form>
</div>
