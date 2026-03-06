@extends('layout.admin')
@section('active-guide')
    active
@endsection
@section('active-panduan')
    active
@endsection
@section('judul')
    Guide
@endsection
@section('link')
    /app/guide
@endsection
@section('sub-judul')
    Panduan
@endsection
@section('aksi-judul')
    Panduan (Pemeliharaan)
@endsection
@section('panduan')
    <style>
        .iq-card.anak {
            border: 1px solid #007bff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .iq-card.anak:hover {
            transform: translateY(-10px);
        }
    </style>
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Panduan Aplikasi (Pemeliharaan)</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <p>Didalam aplikasi ini pemeliharaan merupakan kunci untuk semua fitur yang ada disini,
                                dikarenakan dipemeliharaan kita diminta untuk membuat: <strong>Relasi/Perusahaan</strong>,
                                <strong>Kategori</strong>, <strong>Kelompok</strong>, <strong>Barang</strong>, dan
                                <strong>Buku Besar (Untuk akun faktur, jurnal, dan laporan).</strong>
                            </p>
                            <div class="iq-card anak">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Relasi/Perusahaan</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <h5>Relasi merupakan entitas atau individu yang terlibat dalam transaksi bisnis dengan
                                        perusahaan. Ini bisa berupa pelanggan, pemasok, atau mitra bisnis lainnya. Dengan
                                        mendefinisikan relasi atau perusahaan dengan jelas, Anda dapat melacak dan mengelola
                                        interaksi dengan mereka lebih efisien.</h5>
                                    <p>Cara membuat relasi yaitu: </p>
                                    <img src="{{ asset('assets/images/relasi.png') }}" alt="" width="65%">
                                    <p>Buat terlebih dahulu relasi dengan mengklik tombol tambah dihalaman relasi.</p>
                                    <ol>
                                        <li> Setelah itu masukkan nama perusahaan.</li>
                                        <li> Masukkan jenis perusahaan, untuk saat ini jenis perusahaan tersedia 2 pilihan
                                            yaitu <strong>Konsumen</strong> dan <strong>Supplier</strong></li>
                                        <li> Masukkan alamat kantor, alamat gudang, nama pimpinan, dan no telepon perusahaan
                                        </li>
                                        <li> Setelah itu tambah, perusahaan/relasi akan tersimpan.</li>
                                    </ol>
                                    <div class="list-group">
                                        <div class="list-group-item list-group-item-primary">
                                            <strong>Catatan:</strong> Konsumen adalah perusahaan yang membeli barang dari
                                            supplier, sementara Supplier adalah perusahaan yang menjual barang kepada
                                            konsumen.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Penjelasan Kategori -->
                            <div class="iq-card anak">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Kategori</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <h5>Kategori digunakan untuk mengelompokkan transaksi atau barang-barang berdasarkan
                                        kriteria tertentu. Misalnya, Anda dapat memiliki kategori untuk produk-produk Anda
                                        berdasarkan jenisnya, seperti elektronik, pakaian, atau makanan. Dengan menggunakan
                                        kategori, Anda dapat mengorganisir informasi dengan lebih baik dan membuat analisis
                                        yang lebih terperinci.</h5>
                                    <p>Cara membuat kategori yaitu: </p>
                                    <img src="{{ asset('assets/images/kategori.png') }}" alt="" width="50%">
                                    <p>Buat terlebih dahulu kategori dengan mengklik tombol tambah dihalaman kategori.</p>
                                    <ol>
                                        <li> Setelah itu masukkan nama kategori.</li>
                                        <li> Setelah itu tambah, kategori akan tersimpan.</li>
                                    </ol>
                                    <div class="list-group">
                                        <div class="list-group-item list-group-item-primary">
                                            <strong>Catatan:</strong> Contoh nama kategori adalah : Barang elektronik,
                                            pakaian, atau makanan.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Penjelasan Kelompok -->
                            <div class="iq-card anak">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Kelompok</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <h5>Kelompok merujuk pada pengelompokkan akun-akun dalam struktur akuntansi perusahaan.
                                        Ini membantu dalam menyusun laporan keuangan yang akurat dan memudahkan analisis
                                        keuangan. Kelompok dapat mencakup aset, kewajiban, modal, pendapatan, dan biaya.
                                        Dengan menetapkan kelompok dengan benar, Anda dapat memastikan bahwa data keuangan
                                        direpresentasikan secara tepat.</h5>
                                    <p>Cara membuat kolompok yaitu: </p>
                                    <img src="{{ asset('assets/images/kelompok.png') }}" alt="" width="55%">
                                    <p>Buat terlebih dahulu kolompok dengan mengklik tombol tambah dihalaman kolompok.</p>
                                    <ol>
                                        <li> Setelah itu masukkan nama perusahaan.</li>
                                        <li> Masukkan jenis perusahaan, untuk saat ini jenis perusahaan tersedia 2 pilihan
                                            yaitu <strong>Konsumen</strong> dan <strong>Supplier</strong></li>
                                        <li> Masukkan alamat kantor, alamat gudang, nama pimpinan, dan no telepon perusahaan
                                        </li>
                                        <li> Setelah itu selesai, kelompok tersimpan.</li>
                                    </ol>
                                    <div class="list-group">
                                        <div class="list-group-item list-group-item-primary">
                                            <strong>Catatan: </strong> Contoh kelompok: Laptop, TV, Handphone.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Penjelasan Barang -->
                            <div class="iq-card anak">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Barang</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <h5>Barang atau produk merujuk pada item yang disediakan oleh perusahaan
                                        Anda atau Barang yang anda akan miliki. Pemeliharaan barang melibatkan penentuan
                                        detail seperti nama, deskripsi,
                                        harga, dan informasi lain yang relevan. Dengan memelihara barang dengan baik, Anda
                                        dapat melacak inventaris, menghitung harga pokok penjualan, dan mengelola persediaan
                                        dengan lebih efisien.</h5>
                                    <p>Cara membuat barang yaitu: </p>
                                    <img src="{{ asset('assets/images/barang.png') }}" alt="" width="55%">
                                    <p>Buat terlebih dahulu barang dengan mengklik tombol tambah dihalaman barang.</p>
                                    <ol>
                                        <li> Setelah itu masukkan nama perusahaan.</li>
                                        <li> Masukkan jenis perusahaan, untuk saat ini jenis perusahaan tersedia 2 pilihan
                                            yaitu <strong>Konsumen</strong> dan <strong>Supplier</strong></li>
                                        <li> Masukkan alamat kantor, alamat gudang, nama pimpinan, dan no telepon perusahaan
                                        </li>
                                        <li> Setelah itu selesai, barang tersimpan.</li>
                                    </ol>
                                    <div class="list-group">
                                        <div class="list-group-item list-group-item-primary">
                                            <strong>Contoh:</strong> Laptop Acer, Laptop ROG, TV LG, TV Philip, Hp iPhone,
                                            Hp Samsung
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Penjelasan Buku Besar -->
                            <div class="iq-card anak">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Buku Besar</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <h5>Buku besar adalah kumpulan akun-akun yang digunakan untuk merekam transaksi keuangan
                                        perusahaan. Ini mencakup akun-akun seperti kas, piutang, hutang, pendapatan, dan
                                        biaya. Dengan memelihara buku besar dengan baik, Anda dapat menghasilkan laporan
                                        keuangan yang akurat dan menyeluruh, yang diperlukan untuk memantau kinerja keuangan
                                        perusahaan Anda.</h5>
                                    <div class="list-group">
                                        <div class="list-group-item list-group-item-primary">
                                            <strong>Berikut ini adalah penjelasan dari masing masing akun: </strong>
                                            <ul>
                                                <li>
                                                    <strong>Kas Operasional (101-1):</strong>
                                                    Kas Operasional merujuk pada uang tunai yang digunakan untuk operasional
                                                    sehari-hari perusahaan. Ini termasuk uang tunai yang tersedia untuk
                                                    membayar biaya operasional seperti pembelian barang, pembayaran tagihan,
                                                    gaji karyawan, dan kebutuhan harian lainnya.
                                                </li>
                                                <li>
                                                    <strong>Kas Kecil Tunai (101-2):</strong>
                                                    Kas Kecil Tunai adalah jumlah uang tunai kecil yang biasanya disediakan
                                                    di kantor atau tempat kerja untuk kebutuhan kecil sehari-hari seperti
                                                    membeli perlengkapan kantor, makanan dan minuman ringan, atau keperluan
                                                    lain yang memerlukan pembayaran tunai.
                                                </li>
                                                <li>
                                                    <strong>Bank BCA (102-1):</strong>
                                                    Ini adalah akun yang merekam saldo yang disimpan di Bank BCA, yang
                                                    merupakan salah satu rekening bank yang digunakan oleh perusahaan untuk
                                                    menyimpan dan mengelola dana.
                                                </li>
                                                <li>
                                                    <strong>Bank BNI (102-2):</strong>
                                                    Sama seperti Bank BCA, ini adalah akun yang merekam saldo yang disimpan
                                                    di Bank BNI, sebuah bank lain yang digunakan oleh perusahaan untuk
                                                    menyimpan dan mengelola dana.
                                                </li>
                                                <li>
                                                    <strong>Persediaan Barang Dagang (103-1):</strong>
                                                    Merupakan akun yang merekam nilai barang-barang yang dimiliki perusahaan
                                                    dan tersedia untuk dijual kepada pelanggan. Ini mencakup biaya pembelian
                                                    barang dagang yang belum terjual.
                                                </li>
                                                <li>
                                                    <strong>Piutang Pelanggan (104-1):</strong>
                                                    Ini mencatat jumlah uang yang belum diterima dari pelanggan karena
                                                    penjualan barang atau jasa kepada mereka dengan janji pembayaran di masa
                                                    mendatang.
                                                </li>
                                                <li>
                                                    <strong>Piutang Warkat Pelanggan (104-2):</strong>
                                                    Merupakan piutang dari pelanggan yang berasal dari transaksi-transaksi
                                                    yang dilakukan melalui warkat, seperti cek atau wesel.
                                                </li>
                                                <li>
                                                    <strong>Piutang Lainnya (105-1):</strong>
                                                    Merupakan piutang dari pihak lain selain pelanggan, seperti piutang dari
                                                    pihak ketiga atau piutang dari karyawan.
                                                </li>
                                                <li>
                                                    <strong>Asuransi Dibayar Dimuka (106-1):</strong>
                                                    Ini mencatat pembayaran premi asuransi dimuka untuk melindungi aset
                                                    perusahaan atau risiko tertentu di masa mendatang.
                                                </li>
                                                <li>
                                                    <strong>Kendaraan (107-1):</strong>
                                                    Merupakan akun yang mencatat nilai kendaraan yang dimiliki oleh
                                                    perusahaan untuk keperluan operasional.
                                                </li>
                                                <li>
                                                    <strong>Inventaris Kantor (107-2):</strong>
                                                    Merupakan akun yang mencatat nilai inventaris kantor seperti perabotan,
                                                    peralatan elektronik, dan perlengkapan lain yang digunakan dalam operasi
                                                    kantor.
                                                </li>
                                                <li>
                                                    <strong>Akumulasi Penyusutan Kendaraan (108-1):</strong>
                                                    Ini mencatat akumulasi penyusutan dari nilai kendaraan perusahaan sejak
                                                    pembelian hingga saat ini.
                                                </li>
                                                <li>
                                                    <strong>Akumulasi Penyusutan Inventaris Kantor (108-2):</strong>
                                                    Merupakan akumulasi penyusutan dari nilai inventaris kantor perusahaan
                                                    sejak pembelian hingga saat ini.
                                                </li>
                                                <li>
                                                    <strong>Utang Supplier (109-1):</strong>
                                                    Ini mencatat jumlah uang yang masih harus dibayar kepada pemasok atas
                                                    pembelian barang atau jasa.
                                                </li>
                                                <li>
                                                    <strong>Titipan Konsumen (110-1):</strong>
                                                    Merupakan uang yang diterima dari konsumen sebagai pembayaran untuk
                                                    barang atau jasa yang belum diserahkan, yang kemudian akan ditransfer ke
                                                    akun lain ketika barang atau jasa tersebut diserahkan.
                                                </li>
                                                <li>
                                                    <strong>Modal Usaha (111-1):</strong>
                                                    Merupakan investasi awal atau modal yang dimasukkan oleh pemilik atau
                                                    pemegang saham perusahaan.
                                                </li>
                                                <li>
                                                    <strong>Laba Ditahan (111-2):</strong>
                                                    Ini mencatat laba yang telah dihasilkan oleh perusahaan dan belum
                                                    dibagikan kepada pemegang saham atau diinvestasikan kembali dalam
                                                    perusahaan.
                                                </li>
                                                <li>
                                                    <strong>Laba Periode Berjalan (111-3):</strong>
                                                    Merupakan laba yang dihasilkan oleh perusahaan selama periode akuntansi
                                                    tertentu, yang belum dibagikan atau diinvestasikan kembali.
                                                </li>
                                                <li>
                                                    <strong>Penjualan (112-1):</strong>
                                                    Ini mencatat total pendapatan yang dihasilkan dari penjualan barang atau
                                                    jasa.
                                                </li>
                                                <li>
                                                    <strong>Harga Pokok Penjualan (113-1):</strong>
                                                    Ini mencatat biaya langsung yang terkait dengan produksi barang atau
                                                    penyediaan jasa yang dijual, termasuk biaya bahan baku, tenaga kerja
                                                    langsung, dan biaya overhead produksi.
                                                </li>
                                                <li>
                                                    <strong>Biaya BBM (114-1):</strong>
                                                    Merupakan biaya yang dikeluarkan perusahaan untuk pembelian bahan bakar
                                                    minyak untuk operasional kendaraan atau mesin.
                                                </li>
                                                <li>
                                                    <strong>Biaya Listrik (114-2):</strong>
                                                    Ini mencatat biaya yang dikeluarkan perusahaan untuk konsumsi listrik
                                                    dalam operasionalnya.
                                                </li>
                                                <li>
                                                    <strong>Biaya Pulsa Telepon (114-3):</strong>
                                                    Merupakan biaya yang dikeluarkan perusahaan untuk penggunaan layanan
                                                    telepon seluler atau tetap.
                                                </li>
                                                <li>
                                                    <strong> Biaya Pengiriman (114-4):</strong>
                                                    Ini mencatat biaya yang dikeluarkan perusahaan untuk pengiriman barang
                                                    kepada pelanggan atau penerima lainnya.
                                                </li>
                                                <li>
                                                    <strong>Biaya Gaji Karyawan (114-5):</strong>
                                                    Ini mencatat biaya yang dikeluarkan perusahaan untuk membayar gaji
                                                    kepada karyawan dalam operasionalnya.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
