@extends('layout.app')

@section('container')
    <h1>Cek Ongkir</h1>

    <div class="card mb-3">
        <div class="card-body">
            <form action="/admin/ongkir" method="POST" id="cekCost">
                @csrf

                {{-- Origin/Asal --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="province-origin" class="form-label">Provinsi Asal</label>
                        <select name="province-origin" class="form-control select2" id="province-origin" required>
                            {{-- Options akan diisi melalui AJAX --}}
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="origin" class="form-label">Kota Asal</label>
                        <select name="origin" class="form-control select2" id="origin" required disabled>
                            {{-- Options akan diisi melalui AJAX --}}
                        </select>
                    </div>
                </div>

                {{-- Destination/Tujuan --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="province-destination" class="form-label">Provinsi Tujuan</label>
                        <select name="province-destination" class="form-control select2" id="province-destination" required>
                            {{-- Options akan diisi melalui AJAX --}}
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="destination" class="form-label">Kota Tujuan</label>
                        <select name="destination" class="form-control select2" id="destination" required disabled>
                            {{-- Options akan diisi melalui AJAX --}}
                        </select>
                    </div>
                </div>

                {{-- Berat & Kurir --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="weight" class="form-label">Berat (gram)</label>
                        <input type="number" class="form-control" placeholder="Berat barang" name="weight" id="weight" required>
                    </div>
                    <div class="col-md-6">
                        <label for="courier" class="form-label">Pilih Jasa Pengiriman</label>
                        <select name="courier" class="form-control" id="courier" required>
                            <option value="jne">JNE</option>
                            <option value="pos">Pos Indonesia</option>
                            <option value="tiki">TIKI</option>
                        </select>
                    </div>
                </div>

                {{-- Button --}}
                <button class="btn btn-primary">Cek Ongkir</button>
            </form>
        </div>
    </div>

    {{-- Result --}}
    <div class="card" id='shippingCostContainer' style="display: none">
        <div class="card-body">
            <div class="card mb-3 w-100" style="width: 18rem;">
                <div class="card-header">
                  Informasi Pengiriman
                </div>
                <div class='card-body' id='dlvInfo'>
                    {{-- Diisi menggunakan AJAX --}}
                </div>
              </div>
            <table class="table table-border">
                <thead>
                  <tr>
                    <th scope="col">Kode</th>
                    <th scope="col">Agen</th>
                    <th scope="col">Jenis Layanan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Estimasi Waktu (Hari)</th>
                  </tr>
                </thead>
                <tbody id="services">
                    {{-- Diisi menggunakan AJAX --}}
                </tbody>
              </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Inisialisasi Select2
            $('.select2').select2({
                placeholder: "Pilih salah satu", 
                allowClear: true 
            });

            // Memuat data provinsi asal dengan AJAX
            $.ajax({
                type: 'GET',
                url: 'http://127.0.0.1:8000/api/province',
                success: function(data) {
                    let options = `<option value=""></option>`;
                    $.each(data, function(key, value) {
                        options += `<option value="${value.province_id}">${value.province}</option>`;
                    });

                    $('#province-origin').html(options);
                    $('#province-destination').html(options);
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching provinces:", error);
                }
            });

            // Event untuk Provinsi Asal
            $('#province-origin').on('change', function() {
                let selectedProvinceId = $(this).val(); 

                $.ajax({
                    type: 'GET',
                    url: `http://127.0.0.1:8000/api/city/${selectedProvinceId}`,
                    success: function(data) {
                        let options = `<option value="">Pilih Kota</option>`;
                        $.each(data, function(index, city) {
                            options += `<option value="${city.city_id}">${city.city_name}</option>`;
                        });
                        
                        $('#origin').html(options).removeAttr('disabled');
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching cities:", error);
                    }
                });
            });

            // Event untuk Provinsi Tujuan
            $('#province-destination').on('change', function() {
                let selectedProvinceId = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: `http://127.0.0.1:8000/api/city/${selectedProvinceId}`,
                    success: function(data) {
                        let options = `<option value="">Pilih Kota</option>`;
                        $.each(data, function(index, city) {
                            options += `<option value="${city.city_id}">${city.city_name}</option>`;
                        });
                        
                        $('#destination').html(options).removeAttr('disabled');
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching cities:", error);
                    }
                });
            });
        });


        $('#cekCost').on('submit', function(e){
            e.preventDefault();
            let origin = $('#origin').val();
            let destination = $('#destination').val();
            let weight = $('#weight').val();
            let courier = $('#courier').val();

            $.ajax({
                type: 'POST',
                url: 'http://127.0.0.1:8000/api/ongkir',
                data: {
                    origin: origin,
                    destination: destination,
                    weight: weight,
                    courier: courier
                    },
                success: function(data) {
                    const services = data.results[0];

                    // console.log(services.costs);

                    let originName = data.origin_details.city_name;
                    let destinationName = data.destination_details.city_name;


                    let dlvInfo = `
                                <p>Kota Asal: ${originName}</p>
                                <p>Kota Tujuan: ${destinationName}</p>
                                <p>Bobot Barang: ${weight} gram</p>`;

                    $('#dlvInfo').append(dlvInfo);
                        
                    $.each(services.costs, function(i, serviceData) {
                        let kode = services.code;
                        let kurir = services.name;
                        let service = serviceData.service;
                        let serviceDesc = serviceData.description;
                        let cost = serviceData.cost[0].value;
                        let etd = serviceData.cost[0].etd;

                        let serviceHTML = `
                                        <tr>
                                            <td>${kode}</td>
                                            <td>${kurir}</td>
                                            <td>${serviceDesc} (${service})</td>
                                            <td>Rp. ${cost}</td>
                                            <td>${etd} Hari</td>
                                        </tr>`;
                        
                        $('#services').append(serviceHTML);
                    });

                    $('#shippingCostContainer').css('display', 'block');
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
            });
        });
    </script>
@endsection
