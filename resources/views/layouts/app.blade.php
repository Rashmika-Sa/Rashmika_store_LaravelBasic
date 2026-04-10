<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store - Product Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #1f2937;
            --muted: #5b6473;
            --panel: #ffffff;
            --accent: #0f766e;
            --accent-dark: #0c5f58;
            --accent-soft: #d8eeeb;
            --line: #d8dde6;
            --shadow: 0 4px 16px rgba(17, 24, 39, 0.07);
            --radius-lg: 14px;
            --radius-md: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: "Plus Jakarta Sans", "Segoe UI", sans-serif;
            color: var(--ink);
            background: #f5f7fa;
            padding: 28px 18px 34px;
        }

        .page-shell {
            width: min(1080px, 100%);
            margin: 0 auto;
        }

        .navbar {
            background: #ffffff;
            border: 1px solid #e7ebf1;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand h1 {
            font-family: "Space Grotesk", "Segoe UI", sans-serif;
            font-size: clamp(1rem, 1.2vw + .8rem, 1.32rem);
            letter-spacing: 0.01em;
        }

        .brand-badge {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: #edf1f6;
            display: grid;
            place-items: center;
            border: 1px solid #d9e0ea;
        }

        .nav-links {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .nav-link {
            text-decoration: none;
            color: var(--ink);
            padding: 10px 14px;
            border-radius: 999px;
            font-size: 0.95rem;
            font-weight: 600;
            transition: background-color .2s ease, color .2s ease, transform .2s ease;
        }

        .nav-link:hover {
            background: #e9eef5;
        }

        .nav-link-primary {
            background: var(--accent);
            color: #fff;
        }

        .nav-link-primary:hover {
            background: var(--accent-dark);
            color: #fff;
        }

        .container {
            margin-top: 22px;
            background: var(--panel);
            border-radius: var(--radius-lg);
            padding: clamp(18px, 2.4vw, 32px);
            border: 1px solid #edf0f5;
            box-shadow: 0 2px 10px rgba(17, 24, 39, 0.04);
        }

        .page-title {
            font-family: "Space Grotesk", "Segoe UI", sans-serif;
            font-size: clamp(1.35rem, 2vw, 1.8rem);
            margin-bottom: 14px;
        }

        .helper-text {
            color: var(--muted);
            margin-bottom: 20px;
        }

        .alert-success,
        .alert-error {
            border-radius: var(--radius-md);
            padding: 12px 14px;
            margin-bottom: 16px;
            border: 1px solid transparent;
            font-size: 0.95rem;
        }

        .alert-success {
            background: #e9f8f0;
            color: #125939;
            border-color: #b9eacb;
        }

        .alert-error {
            background: #fff0f0;
            color: #8a1e24;
            border-color: #ffc8cc;
        }

        .table-wrap {
            overflow: auto;
            border: 1px solid var(--line);
            border-radius: 14px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 640px;
        }

        .data-table th {
            text-align: left;
            font-size: 0.82rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: #334155;
            background: #eaf4f3;
            padding: 12px 14px;
            border-bottom: 1px solid var(--line);
        }

        .data-table td {
            padding: 13px 14px;
            border-bottom: 1px solid #eef2f7;
        }

        .data-table tbody tr:hover {
            background: #f8fafc;
        }

        .data-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-top: 8px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .field-full {
            grid-column: 1 / -1;
        }

        .field label {
            font-size: 0.9rem;
            font-weight: 600;
            color: #233044;
        }

        .field input {
            width: 100%;
            border: 1px solid var(--line);
            border-radius: 10px;
            padding: 11px 12px;
            font-size: 0.95rem;
            background: #fff;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .field input:focus {
            border-color: #5bb8ae;
            box-shadow: 0 0 0 3px var(--accent-soft);
            outline: none;
        }

        .actions {
            margin-top: 18px;
            display: flex;
            justify-content: flex-end;
        }

        .btn {
            border: 0;
            border-radius: 10px;
            background: var(--accent);
            color: #fff;
            font-weight: 600;
            padding: 10px 18px;
            cursor: pointer;
            transition: background-color .2s ease;
        }

        .btn:hover {
            background: var(--accent-dark);
        }

        .btn-secondary {
            display: inline-block;
            text-decoration: none;
            border: 1px solid var(--line);
            border-radius: 10px;
            color: var(--ink);
            font-weight: 600;
            padding: 10px 18px;
            background: #fff;
            transition: background-color .2s ease;
        }

        .btn-secondary:hover {
            background: #f2f5f9;
        }

        .inline-link {
            color: var(--accent-dark);
            font-weight: 600;
        }

        .empty-state {
            background: #fbfbfd;
            border: 1px dashed var(--line);
            border-radius: 12px;
            padding: 18px;
            color: var(--muted);
        }

        .error-list {
            list-style: none;
            display: grid;
            gap: 6px;
            margin: 0;
        }

        .home-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 8px;
            justify-content: center;
        }

        .home-center {
            min-height: clamp(360px, calc(100vh - 220px), 640px);
            display: grid;
            place-items: center;
        }

        .home-card {
            width: min(640px, 100%);
            text-align: center;
        }

        .home-card .helper-text {
            max-width: 520px;
            margin-left: auto;
            margin-right: auto;
        }

        @media (max-width: 740px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .actions {
                justify-content: stretch;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="page-shell">
        <div class="navbar">
            <div class="brand">
                <div class="brand-badge">🛒</div>
                <h1>Store Management</h1>
            </div>
            <div class="nav-links">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('products.index') }}">Product List</a>
                <a class="nav-link nav-link-primary" href="{{ route('products.create') }}">Add Product</a>
            </div>
        </div>
        <div class="container">
            @yield('content')
        </div>
    </div>
</body>
</html>