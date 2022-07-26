<x-app-layout>
    @include('layouts.navbar', ['header' => 'List Paket', 'route' => route('paket.index')])
    <style>
        form .error {
            color: #ff0000;
        }
    </style>
    <div class="relative bg-primary md:pt-32 pb-32 pt-12">
        <div class="px-4 md:px-10 mx-auto w-full">
        </div>
    </div>
    <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <div class="flex flex-wrap mt-3">
            <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-base text-blueGray-700">
                                    List Paket
                                </h3>
                            </div>
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                <button
                                    class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    id="tambahPaket" onclick="toggleModal('modal-paket')">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <!-- Projects table -->
                        <table class="items-center w-full bg-transparent border-collapse" id="paket">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Nama
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Harga
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Speed
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Aktif
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Jenis Paket
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Keterangan
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="w-full xl:w-4/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-base text-blueGray-700">
                                    List Jenis Paket
                                </h3>
                            </div>
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                <button
                                    class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    id="tambahJenisPaket" onclick="toggleModal('modal-jenis-paket')">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <!-- Projects table -->
                        <table class="items-center w-full bg-transparent border-collapse" id="jenisPaket">
                            <thead class="thead-light">
                                <tr>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        #
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Nama
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                                        aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
        id="modal-paket">
        <div class="relative w-2/5 my-6 mx-auto max-w-3xl">
            <!--content-->
            <div
                class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                    <h3 class="text-3xl font-semibold" id="headerModalPaket">
                        Tambah Paket
                    </h3>
                </div>
                <!--body-->
                <div class="relative p-6 flex-auto">
                    <form action="{{ route('paket.store') }}" method="POST" id="paketTambah">
                        @csrf
                        <label for="nama">Nama</label>
                        <div class="relative flex w-full flex-wrap items-stretch mb-3">
                            <input type="text" placeholder="Nama Paket" name="nama" id="namaPaket"
                                class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10" />
                        </div>
                        <label for="harga">Harga</label>
                        <div class="relative flex w-full flex-wrap items-stretch mb-3">
                            <input type="number" placeholder="Harga Paket" name="harga" id="hargaPaket"
                                class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10" />
                        </div>
                        <label for="speed">Speed</label>
                        <div class="relative flex w-full flex-wrap items-stretch mb-3">
                            <input type="number" placeholder="Kecepatan Paket" name="speed" id="speedPaket"
                                class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10" />
                        </div>
                        <label for="kuota">Aktif</label>
                        <div class="relative flex w-full flex-wrap items-stretch mb-3">
                            <input type="number" placeholder="Masa Aktif Paket" name="aktif" id="aktifPaket"
                                class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10" />
                        </div>
                        <label for="jenis_paket">Jenis Paket</label>
                        <div class="relative flex w-full flex-wrap items-stretch mb-3">
                            <select name="id_jenis" id="jenisPaket"
                                class="px-3 py-3 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10">
                                @foreach ($jenispaket as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="keterangan">Keterangan</label>
                        <div class="relative flex w-full flex-wrap items-stretch mb-3">
                            <textarea placeholder="Keterangan paket" name="keterangan" id="keteranganPaket"
                                class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10"></textarea>
                        </div>
                </div>
                <!--footer-->
                <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                    <button
                        class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" onclick="toggleModal('modal-paket')">
                        Close
                    </button>
                    <button
                        class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="submit" id="submitFormPaket">
                        Tambah
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-paket-backdrop"></div>

    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
        id="modal-jenis-paket">
        <div class="relative w-2/5 my-6 mx-auto max-w-3xl">
            <!--content-->
            <div
                class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                    <h3 class="text-3xl font-semibold" id="headerModalJenisPaket">
                        Tambah Jenis Paket
                    </h3>
                </div>
                <!--body-->
                <div class="relative p-6 flex-auto">
                    <form action="{{ route('paket.jenis-paket.store') }}" method="POST" id="jenisPaketTambah">
                        @csrf
                        <label for="nama">Nama</label>
                        <div class="relative flex w-full flex-wrap items-stretch mb-3">
                            <input type="text" placeholder="Nama Jenis Paket" name="nama" id="namaJenisPaket"
                                class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10" />
                        </div>
                </div>
                <!--footer-->
                <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                    <button
                        class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" onclick="toggleModal('modal-jenis-paket')">
                        Close
                    </button>
                    <button
                        class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="submit" id="submitFormJenisPaket">
                        Tambah
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-jenis-paket-backdrop"></div>

    <x-slot name="script">
        <script>
            $(function() {
                $('#paket').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('paket.getpaket') }}",
                    "columns": [{
                            data: "nama",
                            name: "nama",
                            class: "border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs font-bold whitespace-nowrap p-4"
                        },
                        {
                            data: "harga",
                            name: "harga",
                            class: "border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4",
                            render: $.fn.dataTable.render.number('.', ',', 2, 'Rp. ')
                        },
                        {
                            data: "speed",
                            name: "speed",
                            class: "border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4",
                            render: function (data,type,row) {
                                return data+" Mbps";
                            }
                        },
                        {
                            data: "aktif",
                            name: "aktif",
                            class: "border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4",
                            render: function (data,type,row) {
                                return data+" hari";
                            }
                        },
                        {
                            data: "id_jenis",
                            name: "id_jenis",
                            class: "border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        },
                        {
                            data: "keterangan",
                            name: "keterangan",
                            class: "border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        },
                        {
                            data: "aksi",
                            class: "px-6 align-middle whitespace-nowrap p-4"
                        }
                    ],
                    "searching": false,
                    "paging": false,
                    // "pagingType": "full",
                });
                $('#jenisPaket').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('paket.getjenispaket') }}",
                    "columns": [{
                            data: "DT_RowIndex",
                            name: "DT_RowIndex",
                            orderable: false,
                            class: "border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        },
                        {
                            data: "nama",
                            name: "nama",
                            class: "border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs font-bold whitespace-nowrap p-4"
                        },
                        {
                            data: "aksi",
                            orderable: false,
                            class: "px-6 align-middle whitespace-nowrap p-4 text-center"
                        }
                    ],
                    "searching": false,
                    "paging": false,
                    // "pagingType": "full",
                });

                $('#jenisPaketTambah').validate({
                    rules: {
                        nama: 'required'
                    },
                    messages: {
                        nama: "Silahkan mengisi nama terlebih dahulu"
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });

                $('#paketTambah').validate({
                    rules: {
                        nama: 'required',
                        harga: 'required',
                        speed: 'required',
                        kuota: 'required',
                        keterangan: 'required'
                    },
                    messages: {
                        nama: 'Silahkan mengisi nama terlebih dahulu',
                        harga: 'Silahkan mengisi harga terlebih dahulu',
                        speed: 'Silahkan mengisi speed terlebih dahulu',
                        kuota: 'Silahkan mengisi kuota terlebih dahulu',
                        keterangan: 'Silahkan mengisi keterangan terlebih dahulu'
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                })
            });

            editPaket('#editPaket');

            function editPaket(data) {
                $(document).on('click', data, function() {
                    var url = $(this).data('url')
                    $('#headerModalPaket').html("Edit Paket")
                    $('#submitFormPaket').html("Update")
                    $('form[id=paketTambah]').attr('action', url)

                    const id = $(this).data('id')
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '{{ route('paket.getupdate') }}',
                        data: {
                            id: id
                        },
                        method: 'post',
                        dataType: 'json',
                        success: function(data) {
                            $('#namaPaket').val(data.nama)
                            $('#hargaPaket').val(data.harga)
                            $('#speedPaket').val(data.speed)
                            $('#aktifPaket').val(data.aktif)
                            $('#keteranganPaket').val(data.keterangan)
                            $('select[id="jenisPaket"] option[value="' + data.id_jenis + '"]').attr(
                                "selected", "selected")
                        }
                    })
                })
            }

            hapusPaket('#hapusPaket')

            function hapusPaket(data) {
                $(document).on('click', data, function() {
                    var url = $(this).data('url')

                    Swal.fire({
                        icon: 'warning',
                        title: 'Apakah anda yakin ingin menghapus paket ?',
                        showCancelButton: true,
                        confirmButtonText: 'Ya',
                        confirmButtonColor: '#5CB85C',
                        cancelButtonText: 'Batal',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.replace(url)
                        }
                    })
                })
            }

            edit('#editJenisPaket');

            function edit(data) {
                $(document).on('click', data, function() {
                    var url = $(this).data('url')
                    $('#headerModalJenisPaket').html("Edit Jenis Paket")
                    $('#submitFormJenisPaket').html("Update")
                    $('form[id=jenisPaketTambah]').attr('action', url)
                    $('form[id=paketTambah]').append('@method('put')')

                    const id = $(this).data('id')
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '{{ route('paket.jenis-paket.getupdate') }}',
                        data: {
                            id: id
                        },
                        method: 'post',
                        dataType: 'json',
                        success: function(data) {
                            $('#namaJenisPaket').val(data.nama)
                        }
                    })
                })
            }

            hapus('#hapusJenisPaket')

            function hapus(data) {
                $(document).on('click', data, function() {
                    var url = $(this).data('url')

                    Swal.fire({
                        icon: 'warning',
                        title: 'Apakah anda yakin ingin menghapus jenis paket ?',
                        showCancelButton: true,
                        confirmButtonText: 'Ya',
                        confirmButtonColor: '#5CB85C',
                        cancelButtonText: 'Batal',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.replace(url)
                        }
                    })
                })
            }

            function toggleModal(modalID) {
                document.getElementById(modalID).classList.toggle("hidden");
                document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
                document.getElementById(modalID).classList.toggle("flex");
                document.getElementById(modalID + "-backdrop").classList.toggle("flex");

                if (modalID = 'modal-jenis-paket') {
                    $('#headerModalJenisPaket').html("Tambah User")
                    $('#submitForm').html("Submit")
                    $('form[id=jenisPaketTambah]').attr('action', '{{ route('paket.jenis-paket.store') }}')
                    $('#namaJenisPaket').val('')
                    $('input[value=put]').remove();
                }

                if (modalID = 'modal-paket') {
                    $('#headerModalPaket').html("Tambah Paket")
                    $('#submitFormPaket').html("Submit")
                    $('form[id=paketTambah]').attr('action', '{{ route('paket.store') }}')
                    $('#namaPaket').val('')
                    $('#hargaPaket').val('')
                    $('#speedPaket').val('')
                    $('#kuotaPaket').val('')
                    $('#keteranganPaket').val('')
                    $("select[id='jenisPaket'] option").each(function() {
                            $(this).removeAttr('selected');
                    });
                }
            }

            @if ($pesan = Session::get('sukses'))
                Swal.fire({
                    icon: 'success',
                    title: '{{ $pesan }}'
                })
            @endif

            @if ($pesan = Session::get('gagal'))
                Swal.fire({
                    icon: 'error',
                    title: '{{ $pesan }}'
                })
            @endif
        </script>
    </x-slot>
</x-app-layout>
