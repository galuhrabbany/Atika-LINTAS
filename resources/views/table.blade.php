@extends('layout.template')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <style>
        .table thead th {
            vertical-align: middle;
            text-align: center;
        }

        .table tbody td {
            vertical-align: middle;
        }

        .dt-buttons .btn {
            margin: 5px 5px 0 0;
        }

        .custom-export-box {
            background-color: #f1f8e9;
            border: 1px solid #c8e6c9;
            padding: 15px;
            border-radius: 12px;
            margin-top: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .btn-green {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .btn-green:hover {
            background-color: #218838;
            color: white;
        }
    </style>
@endsection

@section('content')
<div class="container mt-5">
    <div class="card shadow border-0">
        <div class="card-header bg-success text-white d-flex align-items-center justify-content-between">
            <h5 class="mb-0">
                <i class="fa-solid fa-database me-2"></i>Tabel Laporan Sampah
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex justify-content-end mb-3">
                <div class="input-group" style="max-width: 300px;">
                    <input type="text" id="customSearch" class="form-control form-control-sm" placeholder="Cari laporan...">
                    <span class="input-group-text bg-success text-white"><i class="fa fa-search"></i></span>
                </div>
            </div>
                <table class="table table-bordered table-striped table-hover align-middle text-center" id="pointsTable">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Pelapor</th>
                            <th>Deskripsi</th>
                            <th>Alamat</th>
                            <th>Bukti</th>
                            <th>Dibuat</th>
                            <th>Diperbarui</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($points as $index => $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->description }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>
                                    @if ($p->image)
                                        <img src="{{ asset('storage/images/' . $p->image) }}" alt="Gambar" width="100"
                                            class="img-thumbnail shadow-sm border" title="{{ $p->image }}">
                                    @else
                                        <span class="text-muted">Tidak ada bukti</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($p->created_at)->format('d M Y, H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($p->updated_at)->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Tombol Ekspor di Bawah Tabel -->
            <div class="custom-export-box text-center">
                <h6><i class="fa fa-file-export me-1"></i> Ekspor atau Cetak Data</h6>
                <div id="customButtons" class="d-flex flex-wrap justify-content-center"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <!-- jQuery & DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- DataTables Buttons plugins -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
            var table = $('#pointsTable').DataTable({
                responsive: true,
                dom: 'lrtip', // Remove default buttons
                buttons: [
                    {
                        extend: 'copyHtml5',
                        className: 'btn btn-success btn-sm d-flex align-items-center gap-3',
                        text: '<i class="fa-solid fa-copy"></i><span>Salin</span>'
                    },
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-success btn-sm d-flex align-items-center gap-3',
                        text: '<i class="fa-solid fa-file-excel"></i><span>Excel</span>'
                    },
                    {
                        extend: 'csvHtml5',
                        className: 'btn btn-success btn-sm d-flex align-items-center gap-3',
                        text: '<i class="fa-solid fa-file-csv"></i><span>CSV</span>'
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'btn btn-success btn-sm d-flex align-items-center gap-3',
                        text: '<i class="fa-solid fa-file-pdf"></i><span>PDF</span>',
                        orientation: 'landscape',
                        pageSize: 'A4'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-success btn-sm d-flex align-items-center gap-3',
                        text: '<i class="fa-solid fa-print"></i><span>Cetak</span>'
                    }
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari laporan...",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ entri",
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Berikutnya"
                    }
                }
            });
            // Tempatkan tombol di bawah tabel
            table.buttons().container().appendTo('#customButtons');

            // Custom search bar handler
            $('#customSearch').on('keyup', function () {
                table.search(this.value).draw();
            });
        });
    </script>
@endsection
