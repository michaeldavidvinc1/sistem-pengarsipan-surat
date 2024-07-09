<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembar Disposisi Surat Masuk</title>
    <link rel="shortcut icon" href="{{ asset('assets/logo-web.ico') }}" />
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
        }

        .header-img {
            position: absolute;
            top: 15;
            left: 130;
        }

        .header h1,
        .header h2,
        .header h3,
        .header p {
            margin: 0;
            font-size: 12px;
        }

        .header h1 {
            font-size: 16px;
        }

        .form-title {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 20px;
        }


        .no-border {
            border: none;
            padding: 0;
        }

        .full-width {
            width: 100%;
        }

        .footer {
            margin-top: 50px;
            float: right;
        }

        .footer .signature {
            text-align: center;
        }

        .footer .signature p {
            margin: 50px 0 0 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            padding: 15px;
        }

        td {
            padding: 8px;
        }

        .border-right {
            border-right: 2px solid black;
        }

        .border-bottom {
            border-bottom: 2px solid black;
        }

        .border-top {
            border-top: 2px solid black;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img class="header-img" src="assets/logo.png" width="50" height="50" alt="Logo">
            <h1>SYEKH ABDUL WAHAB ROKAN FOUNDATION</h1>
            <h2>Babussalam Islamic Boarding School – Muslim Orphanage – Darussalam Mosque</h2>
            <h3>YAYASAN SYEKH ABDUL WAHAB ROKAN</h3>
            <h3>PONDOK PESANTREN BABUSSALAM – PANTI ASUHAN MUSLIMIN – MASJID DARUSSALAM</h3>
            <h3>PEKANBARU – RIAU – INDONESIA</h3>
            <p>JL. H.R. Soebrantas No. 62 Telp. (0761)6700-642, Pekanbaru 28294 Email : pesantrenbabussalampku@gmail.com
                Website : http://www.pesantrenbabussalam.com</p>
        </div>
        <hr />
        {{-- asdasd --}}
        <div class="form-title">LEMBAR DISPOSISI SURAT MASUK</div>
        
        <table style="border: 2px solid black">
            <tbody>
                <tr>
                    <td class="border top border-right ">
                        <label>No. Surat :</label>
                        <label>{{ $disposisi->no_sm }}</label>
                    </td>
                    <td class="border-left">
                        <label>Sifat :</label>
                        <label>{{ $disposisi->sifat }}</label>
                    </td>
                </tr>
                <tr>
                    <td class="border-right ">
                        <label>Asal Surat :</label>
                        <label>{{ $disposisi->asal_surat }}</label>
                    </td>
                    <td class="border-left">
                        <label>Kepada :</label>
                        <label>{{ $disposisi->penerima_disposisi }}</label>
                    </td>
                </tr>
                <tr>
                    <td class="border-right ">
                        <label>Tanggal Disposisi :</label>
                        <label>{{ $disposisi->tgl_disposisi }}</label>
                    </td>
                    <td class="border-bottom"></td>
                </tr>
                <tr>
                    <td colspan="2" class="border-top border-bottom">
                        <label>Perihal :</label>
                        <label>{{ $disposisi->perihal }}</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="border-top">
                        <label>Keterangan :</label>
                        <label>{{ $disposisi->keterangan }}</label>
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- asdasd --}}
        <div class="footer">
            <div class="signature">
                <p>Pekanbaru, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                <p style="margin-top: -4px">Mengetahui</p>
                <p>Pimpinan</p>
            </div>
        </div>
    </div>
</body>

</html>
