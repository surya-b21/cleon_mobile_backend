<x-app-layout>
    @include('layouts.navbar', ['header' => 'List Pengguna', 'route' => route('pengguna.index')])
    <style>
        form .error {
            color: #ff0000;
        }
    </style>
    <div class="relative bg-primary md:pt-32 pb-32 pt-12">
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap mt-20">
                <div class="w-full px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-base text-blueGray-700">
                                        List Pengguna
                                    </h3>
                                </div>
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                    <button
                                        class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        type="button" onclick="toggleModal('modal-id')" id="addButton">
                                        <i class="fas fa-user-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="block w-full overflow-x-auto">
                            <!-- Projects table -->
                            <table class="items-center w-full bg-transparent border-collapse" id="user">
                                <thead class="thead-light">
                                    <tr>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Nama
                                        </th>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Email
                                        </th>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Verifikasi
                                        </th>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Action
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
    </div>
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
        id="modal-id">
        <div class="relative w-2/5 my-6 mx-auto max-w-3xl">
            <!--content-->
            <div
                class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                    <h3 class="text-3xl font-semibold" id="headerModal">
                        Tambah User
                    </h3>
                </div>
                <!--body-->
                <div class="relative p-6 flex-auto">
                    <form action="{{ route('pengguna.store') }}" method="POST" id="formTambah">
                        @csrf
                        <label for="nama">Nama</label>
                        <div class="relative flex w-full flex-wrap items-stretch mb-3">
                            <input type="text" placeholder="Nama" name="name" id="name"
                                class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10" />
                            <span
                                class="z-10 h-full leading-snug font-normal absolute text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        <label for="email">Email</label>
                        <div class="relative flex w-full flex-wrap items-stretch mb-3">
                            <input type="text" placeholder="Email" name="email" id="email"
                                class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10" />
                            <span
                                class="z-10 h-full leading-snug font-normal absolute text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        <label for="password">Password</label>
                        <div class="relative flex w-full flex-wrap items-stretch mb-3">
                            <input type="password" placeholder="Password" name="password" id="password"
                                class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10" />
                            <span
                                class="z-10 h-full leading-snug font-normal absolute text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                </div>
                <!--footer-->
                <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                    <button
                        class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" onclick="toggleModal('modal-id')">
                        Close
                    </button>
                    <button
                        class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="submit" id="submitForm">
                        Tambah
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>

    <x-slot name="script">
        <script type="text/javascript">
            $(document).ready(function() {
                $('#user').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('pengguna.getuser') }}",
                    "columns": [{
                            data: "name",
                            name: "name",
                            class: "border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs font-bold whitespace-nowrap p-4"
                        },
                        {
                            data: "email",
                            name: "email",
                            class: "border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        },
                        {
                            data: "email_verified_at",
                            name: "email_verified_at",
                            class: "px-6 align-middle whitespace-nowrap p-4"
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

                $("form[id=formTambah]").validate({
                    rules: {
                        name: 'required',
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 8
                        }
                    },

                    messages: {
                        name: "Silahkan mengisi nama terlebih dahulu",
                        email: "Silahkan menggunakan format email",
                        password: {
                            required: "Silahkan mengisi password terlebih dahulu",
                            minlength: jQuery.validator.format("Password minimal {0} karakter")
                        }
                    },

                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            })

            edit('#editUser');
            function edit(data) {
                $(document).on('click', data, function() {
                    var url = $(this).data('url')
                    $('#headerModal').html("Edit User")
                    $('#submitForm').html("Update")
                    $('form').attr('action', url)
                    // $('form').attr('id', 'formEdit')

                    const id = $(this).data('id')
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '{{ route('pengguna.getupdate') }}',
                        data: {
                            id: id
                        },
                        method: 'post',
                        dataType: 'json',
                        success: function(data) {
                            $('#name').val(data.name)
                            $('#email').val(data.email)
                        }
                    })
                })
            }

            hapus('#hapusUser')
            function hapus(data) {
                $(document).on('click', data, function(){
                    var url = $(this).data('url')

                    Swal.fire({
                        icon: 'warning',
                        title: 'Apakah anda yakin ingin menghapus user ?',
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
                        if(result.isConfirmed) {
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

                $('#headerModal').html("Tambah User")
                $('#submitForm').html("Submit")
                $('form').attr('action', '{{route("pengguna.store")}}')
                $('#name').val('')
                $('#email').val('')
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
