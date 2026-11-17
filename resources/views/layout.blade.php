<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Aplikasi Akademik</title>
    <style>
        :root{
            --merah:#c8102e; --merah-tua:#9d0c24; --teks:#1f2937;
            --abu:#6b7280; --garis:#e5e7eb; --latar:#f3f4f6;
        }
        *{box-sizing:border-box}
        body{
            margin:0; min-height:100vh; background:var(--latar); color:var(--teks);
            font-family:"Segoe UI",system-ui,Arial,sans-serif; line-height:1.55;
        }
        .topbar{
            background:var(--merah); color:#fff; padding:14px 24px;
            font-weight:600; letter-spacing:.3px; box-shadow:0 2px 6px rgba(0,0,0,.15);
        }
        .topbar small{font-weight:400; opacity:.85; margin-left:8px}
        main{
            max-width:560px; margin:40px auto; padding:32px;
            background:#fff; border:1px solid var(--garis); border-radius:14px;
            box-shadow:0 8px 24px rgba(0,0,0,.06);
        }
        h2{margin:0 0 16px; font-size:24px; color:var(--merah-tua)}
        p{margin:0 0 16px}
        b{color:var(--merah-tua)}

        /* menu */
        nav{display:flex; flex-wrap:wrap; gap:10px; margin:8px 0 24px}
        nav a{
            padding:9px 16px; border-radius:999px; text-decoration:none;
            background:#fdecef; color:var(--merah-tua); font-weight:600; font-size:14px;
            border:1px solid #f6c4cc; transition:.15s;
        }
        nav a:hover{background:var(--merah); color:#fff; border-color:var(--merah)}

        /* form */
        label{display:block; font-weight:600; font-size:14px; margin-bottom:4px}
        input{
            width:100%; padding:11px 12px; margin:0 0 16px;
            border:1px solid #d1d5db; border-radius:8px; font-size:15px;
        }
        input:focus{outline:none; border-color:var(--merah); box-shadow:0 0 0 3px #fbd5db}
        button{
            padding:10px 20px; border:0; border-radius:8px; cursor:pointer;
            background:var(--merah); color:#fff; font-weight:600; font-size:15px; transition:.15s;
        }
        button:hover{background:var(--merah-tua)}
        form[action$="/login"] button{width:100%}
        .err{color:#b00020; background:#fdecea; padding:10px 12px; border-radius:8px; font-size:14px}

        /* tautan kembali */
        main > a{color:var(--merah-tua); text-decoration:none; font-weight:600}
        main > a:hover{text-decoration:underline}
    </style>
</head>
<body>
    <div class="topbar">Aplikasi Akademik <small>Telkom University</small></div>
    <main>@yield('content')</main>
</body>
</html>