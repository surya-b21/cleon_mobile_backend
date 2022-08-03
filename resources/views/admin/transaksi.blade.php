<x-app-layout>
    @include('layouts.navbar', ['header' => 'List Transaksi', 'route' => route('transaksi.index')])
    <x-slot name="style">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    </x-slot>
    <div class="relative bg-primary md:pt-32 pb-32 pt-12">
        <div class="px-4 md:px-10 mx-auto w-full">
            <div>
                <!-- Card stats -->
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="uppercase font-bold text-xs">
                                            Cetak Tabel Transaksi
                                        </h5>
                                        <span class="font-semibold text-m text-blueGray-700">
                                            Seluruh Data
                                        </span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <a href="{{ route('transaksi.export') }}"
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                                            <i class="fas fa-file-invoice"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="uppercase font-bold text-xs">
                                            Cetak Berdasarkan Bulan
                                        </h5>
                                        <select id="bybulan" class="px-3 py-3 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10">
                                            <option value="#">--Pilih Bulan--</option>
                                            @foreach ($month as $data)
                                                <option value="{{ $data->bulan_value }}">{{ $data->bulan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <a href="#" id="linkbulan"
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                                            <i class="fas fa-file-invoice"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="uppercase font-bold text-xs">
                                            Cetak Berdasarkan Paket
                                        </h5>
                                        <select id="bypaket" class="px-3 py-3 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10">
                                            <option value="#">--Pilih Paket--</option>
                                            @foreach ($paket as $data)
                                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <a href="#" id="linkpaket"
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                                            <i class="fas fa-file-invoice"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <div class="flex flex-wrap mt-3">
            <div class="w-full px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-base text-blueGray-700">
                                    List Transaksi
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <!-- Projects table -->
                        <table class="items-center w-full bg-transparent border-collapse" id="transaksi">
                            <thead class="thead-light">
                                <tr>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Nama
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Paket
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Tanggal Transaksi
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            $('#transaksi').DataTable({
                "processing": true,
                "serverSide": false,
                "ajax": "{{ route('transaksi.gettransaksi') }}",
                "columns": [{
                        data: "id_user",
                        name: "id_user",
                        // class: "border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs font-bold whitespace-nowrap p-4"
                    },
                    {
                        data: "id_paket",
                        name: "id_paket",
                        // class: "border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                    },
                    {
                        data: "created_at",
                        name: "created_at",
                        // class: "border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                    }
                ],
                "searching": true,
                "paging": true,
                // dom: 'Bfrtip',
                // buttons: [
                //     'excel'
                // ]
                // "pagingType": "full",
            });

            $('#bybulan').change(function (){
                var bulan = $(this).val();
                $('#linkbulan').attr('href',`{{ route("transaksi.export") }}-bulan/${bulan}`)
            })

            $('#bypaket').change(function() {
                var paket = $(this).val()
                $('#linkpaket').attr('href', `{{ route("transaksi.export") }}-paket/${paket}`)
            })
        })
    </script>
</x-app-layout>
