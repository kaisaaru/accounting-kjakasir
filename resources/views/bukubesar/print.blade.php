<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="content-type" content="text/html" />
    <title>Print Buku Besar {{ $bukubesar->ket }}</title>
</head>
<style>
    #absensi-table {
        border-collapse: collapse;
        width: 100%;
    }

    #absensi-table th,
    #absensi-table td {
        border-top: none;
        border-bottom: none;
        border-right: none;
        border-left: none;
        text-align: left;
        padding: 8px;
    }

    #absensi-table th {
        border-top: 1px solid #000000;
        border-bottom: 1px solid #000000;
        border-right: none;
        border-left: none;
    }

    #absensi-table td {
        border-top: none;
        border-bottom: none;
    }
</style>
<style>
    .corner-text {
        font-weight: bold;
        float: left;
        /* Menggunakan float untuk memposisikan di pojok kiri */
    }

    th {
        text-align: left;
    }

    th.debit,
    th.credit,
    th.saldo-kumulatif {
        text-align: right;
    }
</style>

<body style="background: white">
    <button href="#" onclick="printAbsensi('printableArea');" class="btn btn-success btn-sm"><span
            class="glyphicon glyphicon-print" bgcolor="blue">Print</span></button>
    <?php
    // Set the time zone to your desired location
    date_default_timezone_set('Asia/Jakarta');
    
    // Array nama bulan dalam Bahasa Indonesia
    $namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    
    // Mendapatkan tanggal saat ini
    $tanggal = date('d');
    // Mendapatkan bulan saat ini
    $bulan = $namaBulan[date('n') - 1];
    // Mendapatkan tahun saat ini
    $tahun = date('Y');
    
    // Gabungkan ke dalam format yang diinginkan
    $currentDate = $tanggal . ' ' . $bulan . ' ' . $tahun;
    ?>
    <p></p>
    <form action="/laporan/bukubesar/{{ $no_subbukubesar }}" method="POST">
        @csrf
        <label for="">Awal
            <input type="date" name="awal" id="awal" value="{{ old('awal') }}" required>
        </label>
        <label for="">Akhir
            <input type="date" name="akhir" id="akhir" value="{{ old('akhir') }}" required>
        </label>
        <button type="submit">Refresh</button>
    </form>
    <p></p>
    <form action="/laporan/bukubesar/{{ $no_subbukubesar }}" method="POST" hidden>
        @csrf
        <button type="submit">Semua Data</button>
    </form>
    <div id="printableArea">
        <div style="display: flex; flex-direction: column; align-items: center;">
            <h6 class="card-title" align="center"
                style="font-weight: bold; font-size: 25px; margin-bottom: 5px; margin-top: -5px;">
                PT. {{ Auth::user()->perusahaan->nama_perusahaan ?? 'Kururing' }}
            </h6>
            <h4 class="card-title" align="center" style="font-weight: bold; font-size: 20px; margin-top: 5px;">
                Buku Besar
            </h4>
            <h4 class="card-title" align="center" style="font-weight: bold; font-size: 20px; margin-top: -20px;">
                Semua Data
            </h4>

            <!-- <hr style="border-top: 2px solid black; width: 100%; margin-top: -18px; margin-bottom: 15px;"> -->
        </div>

        <div class="corner-text">
            No. Akun: {{ $no_subbukubesar }} - {{ $bukubesar->ket }}
        </div>
        <p></p>
        <p></p>
        <table id="absensi-table" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Dok</th>
                    <th scope="col">No. Referensi</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col" class="debit">Debet</th>
                    <th scope="col" class="credit">Kredit</th>
                    <th scope="col" align="right">Saldo Kumulatif</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Saldo Awal</td>
                    <td></td>
                    <td></td>
                    <td>{{ $saldoawal }}</td>
                </tr>
            </tbody>
            <tbody>
                @php
                    $no = 1;
                    $totaldebet = 0;
                    $totalkredit = 0;
                @endphp

                @foreach ($data as $item)
                    <tr>
                        <td>
                            {{ $no++ }}
                        </td>
                        <td>
                            {{ $item->tanggal }}
                        </td>
                        <td>
                            {{ $item->dok }}
                        </td>
                        <td>
                            {{ $item->no_referensi }}
                        </td>
                        <td>
                            {{ $item->ket }}
                        </td>
                        <td>
                            {{ number_format($item->debet, 0, ',', '.') }}
                        </td>
                        <td>
                            {{ number_format($item->kredit, 0, ',', '.') }}
                        </td>
                        <td>
                            @if ($item->saldo_kumulatif < 0)
                                ({{ number_format(abs($item->saldo_kumulatif), 0, ',', '.') }})
                            @else
                                {{ number_format($item->saldo_kumulatif, 0, ',', '.') }}
                            @endif
                        </td>
                    </tr>
                    @php
                        $totaldebet += $item->debet;
                        $totalkredit += $item->kredit;
                        $perubahan = $totaldebet - $totalkredit;
                    @endphp
                @endforeach
            </tbody>
            <tbody>
                <tr style="border-top: 2px solid black;">
                    <td><strong>Saldo Awal</strong></td>
                    <td>{{ number_format($saldoawal, 0, ',', '.') }}</td>
                    <td></td>
                    <td></td>
                    <td><strong>Total Debet/Kredit</strong></td>
                    <td>{{ number_format($totaldebet, 0, ',', '.') }}</td>
                    <td>{{ number_format($totalkredit, 0, ',', '.') }}</td>
                    <td hidden>12345</td>
                </tr>

                <tr>
                    <td><strong>Saldo Akhir</strong></td>
                    <td>
                        @if ($saldoakhir < 0)
                            ({{ number_format(abs($saldoakhir), 0, ',', '.') }})
                        @else
                            {{ number_format($saldoakhir, 0, ',', '.') }}
                        @endif
                    </td>
                    <td></td>
                    <td></td>
                    <td><strong>Perubahan</strong></td>
                    <td>
                        {{-- @if ($perubahan != null)
                            @if ($perubahan < 0)
                                ({{ number_format(abs($perubahan), 0, ',', '.') }})
                            @else
                                {{ number_format($perubahan, 0, ',', '.') }}
                            @endif
                        @endif --}}
                    </td>
                    <td hidden>12345</td>
                </tr>
            </tbody>
        </table>
        <p></p>
        <p></p>
        <hr style="border-top: 2px solid black; width: 100%; margin-top: -18px; margin-bottom: 5px;">
    </div>

    <script type="text/javascript">
        function printAbsensi(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</body>

</html>
