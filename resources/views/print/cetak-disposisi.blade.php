<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembar Disposisi Surat Masuk</title>
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

        .form-group {
            margin-bottom: 15px;
            display: flex;
        }

        .form-group label {
            flex: 0 0 150px;
            font-weight: bold;
        }

        .form-group .colon {
            flex: 0 0 10px;
        }

        .form-group p {
            flex: 1;
            padding: 5px;
            border: 1px solid black;
            box-sizing: border-box;
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
        <div class="form-title">
            LEMBAR DISPOSISI SURAT MASUK
        </div>
        <table>
            <tbody>
                <tr>
                    <td style="font-weight: 500; width: 150px">No Surat</td>
                    <td>:</td>
                    <td>{{ $disposisi->no_sm }}</td>
                </tr>
                <tr>
                    <td style="font-weight: 500; width: 150px">Tanggal Disposisi</td>
                    <td>:</td>
                    <td>{{ $disposisi->tgl_disposisi }}</td>
                </tr>
                <tr>
                    <td style="font-weight: 500; width: 150px">Perihal</td>
                    <td>:</td>
                    <td>{{ $disposisi->perihal }}</td>
                </tr>
                <tr>
                    <td style="font-weight: 500; width: 150px">Asal Surat</td>
                    <td>:</td>
                    <td>{{ $disposisi->asal_surat }}</td>
                </tr>
                <tr>
                    <td style="font-weight: 500; width: 150px">Sifat</td>
                    <td>:</td>
                    <td>{{ $disposisi->asal_surat }}</td>
                </tr>
                <tr>
                    <td style="font-weight: 500; width: 150px">Kepada</td>
                    <td>:</td>
                    <td>{{ $disposisi->penerima_disposisi }}</td>
                </tr>
                <tr>
                    <td style="font-weight: 500; width: 150px">Keterangan</td>
                    <td>:</td>
                    <td>{{ $disposisi->keterangan }}</td>
                </tr>
            </tbody>
        </table>
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
