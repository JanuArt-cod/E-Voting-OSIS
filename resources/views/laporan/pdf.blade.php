<!DOCTYPE html>
<html>
<head>
    <title>Laporan Hasil Pemilihan OSIS</title>
    <style>
        body { font-family: 'Helvetica', Arial, sans-serif; font-size: 14px; color: #333; }
        
        /* Kop Surat */
        .kop-surat { text-align: center; border-bottom: 3px solid #000; padding-bottom: 10px; margin-bottom: 20px; }
        .kop-surat h2, .kop-surat h3, .kop-surat p { margin: 0; padding: 2px; }
        .kop-surat h2 { font-size: 20px; font-weight: bold; text-transform: uppercase; }
        .kop-surat p { font-size: 12px; }

        h4 { text-align: center; font-size: 16px; margin-bottom: 20px; text-decoration: underline; }

        /* Tabel Data Pemilih */
        .table-info { width: 50%; margin-bottom: 25px; }
        .table-info td { padding: 4px 0; }

        /* Tabel Utama (Paslon) */
        .table-data { width: 100%; border-collapse: collapse; margin-bottom: 40px; }
        .table-data th, .table-data td { border: 1px solid #000; padding: 10px; text-align: left; }
        .table-data th { background-color: #f2f2f2; text-align: center; }
        .text-center { text-align: center; }

        /* Kolom Tanda Tangan */
        .ttd-container { width: 100%; margin-top: 50px; }
        .ttd-box { width: 33%; float: left; text-align: center; }
        .ttd-space { height: 80px; }
    </style>
</head>
<body>

    <!-- KOP SURAT -->
    <div class="kop-surat">
        <h2>PANITIA PEMILIHAN KETUA OSIS</h2>
        <h3>{{ strtoupper($setting->nama_sekolah ?? 'NAMA SEKOLAH') }}</h3>
        <p>{{ $setting->alamat ?? 'Alamat Sekolah' }}</p>
        <p>{{ $setting->kontak ?? 'Kontak Sekolah' }}</p>
    </div>

    <h4>BERITA ACARA HASIL PEMUNGUTAN SUARA</h4>

    <p>Pada hari ini, <strong>{{ $tanggal }}</strong>, telah dilaksanakan pemungutan suara pemilihan Ketua dan Wakil Ketua OSIS secara digital dengan rincian partisipasi sebagai berikut:</p>

    <!-- Ringkasan Pemilih -->
    <table class="table-info">
        <tr><td>Total Daftar Pemilih Tetap (DPT)</td><td>: <strong>{{ $total_dpt }} Orang</strong></td></tr>
        <tr><td>Suara Sah Masuk</td><td>: <strong>{{ $suara_masuk }} Orang</strong></td></tr>
        <tr><td>Tidak Memilih (Golput)</td><td>: <strong>{{ $golput }} Orang</strong></td></tr>
    </table>

    <p>Adapun rincian perolehan suara masing-masing Pasangan Calon adalah sebagai berikut:</p>

    <!-- Tabel Rincian Suara -->
    <table class="table-data">
        <thead>
            <tr>
                <th width="10%">No. Urut</th>
                <th width="35%">Nama Calon Ketua</th>
                <th width="35%">Nama Calon Wakil</th>
                <th width="20%">Perolehan Suara</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paslons as $p)
            <tr>
                <td class="text-center"><strong>{{ $p->nomor_urut }}</strong></td>
                <td>{{ $p->nama_ketua }}</td>
                <td>{{ $p->nama_wakil }}</td>
                <td class="text-center"><strong>{{ $p->total_suara }}</strong></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>Demikian berita acara ini dibuat dengan sebenar-benarnya dari sistem E-Voting dan tidak dapat diganggu gugat.</p>

    <!-- Area Tanda Tangan -->
    <div class="ttd-container">
        <div class="ttd-box">
            <p>Kepala Sekolah,</p>
            <div class="ttd-space"></div>
            <p><strong>{{ $setting->nama_kepsek ?? '(...................................)' }}</strong><br>
               NIP. {{ $setting->nip_kepsek ?? '.........................' }}</p>
        </div>
        <div class="ttd-box">
            <p>Pembina OSIS,</p>
            <div class="ttd-space"></div>
            <p><strong>{{ $setting->nama_pembina ?? '(...................................)' }}</strong><br>
               NIP. {{ $setting->nip_pembina ?? '.........................' }}</p>
        </div>
        <div class="ttd-box">
            <p>Ketua Panitia,</p>
            <div class="ttd-space"></div>
            <p><strong>{{ $setting->nama_ketua ?? '(...................................)' }}</strong><br>
               NISN. {{ $setting->nisn_ketua ?? '.........................' }}</p>
        </div>
    </div>

</body>
</html>