<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sertifikat</title>
    <style type='text/css'>
        body,
        html {
            margin: 0;
            padding: 0;
        }

        body {
            color: black;
            /* DumpPDF Terkendala di display, maka gausah dipake */
            /* display: table; */
            font-family: Georgia, serif;
            font-size: 24px;
            text-align: center;
        }

        .container {
            border: 20px solid tan;
            width: 750px;
            height: 563px;
            /* display: table-cell; */
            vertical-align: middle;
        }

        .logo {
            color: tan;
        }

        .marquee {
            color: tan;
            font-size: 48px;
            margin: 20px;
        }

        .assignment {
            margin: 20px;
        }

        .person {
            border-bottom: 2px solid black;
            font-size: 32px;
            font-style: italic;
            margin: 20px auto;
            width: 400px;
        }

        .reason {
            margin: 20px;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            An Organization
        </div>

        <div class="marquee">
            Certificate of Competent
        </div>

        <div class="assignment">
            This certificate is presented to
        </div>

        <div class="person">
            <label>
                {{ Auth::user()->fname ?? 'None' }} {{ Auth::user()->lname }}
            </label>
        </div>
        <div class="reason">
            Keep Learn, Until Die
        </div>
    </div>
</body>

</html>
