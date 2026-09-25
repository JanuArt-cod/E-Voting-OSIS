<!DOCTYPE html>
<html>
<head>
    <title>Tiket Akses E-Voting</title>
    <style>
        /* Margin kertas A4 dibuat pas agar area cetak maksimal */
        @page { margin: 1cm; }
        body { font-family: 'Helvetica', Arial, sans-serif; font-size: 11px; margin: 0; padding: 0; }
        
        /* 1 Kertas A4 muat pas 10 Tiket (2 kolom x 5 baris) */
        .ticket {
            width: 45%;
            height: 4cm; /* Tinggi pasti agar muat 5 baris di kertas A4 */
            float: left;
            margin: 0.15cm 1%;
            border: 2px dashed #000;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 8px;
            page-break-inside: avoid; /* Mencegah tiket terbelah beda halaman */
        }
        
        .ticket-header { text-align: center; border-bottom: 2px solid #000; margin-bottom: 5px; padding-bottom: 5px; }
        .ticket-header h4 { margin: 0; font-size: 13px; text-transform: uppercase; }
        .ticket-header p { margin: 2px 0 0 0; font-size: 9px; color: #555; }
        
        .info-table { width: 100%; margin-top: 5px; }
        .info-table td { padding: 2px 0; }
        
        .token-box {
            text-align: center;
            border: 1px solid #000;
            background-color: #f2f2f2;
            padding: 8px;
            margin-top: 8px;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 5px;
        }

        .clear { clear: both; }
        .page-break { page-break-after: always; }
    </style>
</head>
<body>

    @foreach($dpts as $index => $dpt)
        <div class="ticket">
            <div class="ticket-header">
                <h4>KARTU AKSES E-VOTING</h4>
                <p>Jaga Kerahasiaan Token Anda!</p>
            </div>
            
            <table class="info-table">
                <tr><td width="30%">Nama</td><td width="5%">:</td><td><strong>{{ \Illuminate\Support\Str::limit($dpt->nama, 22) }}</strong></td></tr>
                <tr><td>NISN/NIP</td><td>:</td><td>{{ $dpt->nisn }}</td></tr>
                <tr><td>Role</td><td>:</td><td>{{ $dpt->kelas }}</td></tr>
                <tr><td>Username</td><td>:</td><td><strong>{{ $dpt->username }}</strong></td></tr>
            </table>
            
            <div class="token-box">
                {{ $dpt->token }}
            </div>
        </div>

        <!-- Tiap 2 tiket, clear float agar sejajar -->
        @if(($index + 1) % 2 == 0)
            <div class="clear"></div>
        @endif

        <!-- Tiap 10 tiket, paksa ganti halaman baru agar tidak acak-acakan -->
        @if(($index + 1) % 10 == 0)
            <div class="page-break"></div>
        @endif
    @endforeach

</body>
</html>