<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #3a7bd5, #00d2ff);
            --secondary-gradient: linear-gradient(135deg, #FF6B6B, #556270);
            --surface-light: rgba(255, 255, 255, 0.98);
            --surface-dark: rgba(0, 0, 0, 0.9);
            --text-light: #f8f9fa;
            --text-dark: #2d3436;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.12);
            --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            min-height: 100vh;
            background-attachment: fixed;
            overflow-x: hidden;
            color: var(--text-dark);
        }

        .admin-layout {
            background: linear-gradient(135deg, #1a2a6c, #2a3d66);
            color: var(--text-light);
        }

        .user-layout {
            background: linear-gradient(135deg, #2193b0, #3498db);
            color: var(--text-light);
        }

        .dashboard-container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 1.5rem;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            padding: 1.5rem;
        }

        .card {
            background: var(--surface-light);
            border-radius: 16px;
            border: none;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            height: 100%;
            overflow: hidden;
            color: var(--text-dark);
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .card-body {
            padding: 1.75rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-shadow: none;
        }

        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            opacity: 0.95;
        }

        .form-control {
            padding: 0.875rem 1.125rem;
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.9);
            color: var(--text-dark);
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(58, 123, 213, 0.15);
            border-color: #3a7bd5;
        }

        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem;
            }

            .grid-container {
                gap: 1rem;
                padding: 0.75rem;
            }

            .card-body {
                padding: 1.25rem;
            }
        }

        .loader {
            width: 24px;
            height: 24px;
            border: 2.5px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.8s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.08);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.25);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(0, 0, 0, 0.35);
        }
    </style>
</head>
<body class="@if(Auth::check() && Auth::user()->is_admin) admin-layout @else user-layout @endif">
    <div class="dashboard-container">
        <div class="grid-container" data-aos="fade-up" data-aos-duration="800">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });

        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', (e) => {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<div class="loader"></div>';
                    submitBtn.disabled = true;

                    setTimeout(() => {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }, 2000);
                }
            });
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: '#fff',
            color: '#2d3436'
        });

        @if(session('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });
        @endif

        @if(session('error'))
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}'
            });
        @endif
    </script>
</body>
</html>