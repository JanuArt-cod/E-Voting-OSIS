<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <!-- REFRESH OTOMATIS SETIAP 10 DETIK UNTUK PROYEKTOR -->
    <meta http-equiv="refresh" content="10"> 
    <title>Live Quick Count - E-Voting</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .glass-card { background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
    </style>
</head>
<body class="pt-4">
    <div class="container-fluid px-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold text-primary display-4">LIVE QUICK COUNT PUSAT</h1>
            <h4 class="text-muted">Pemilihan Ketua OSIS <span class="badge bg-success ms-2 blink">REAL-TIME</span></h4>
        </div>

        <div class="row mb-4 text-center">
            <div class="col-md-4">
                <div class="glass-card p-4">
                    <h3 class="text-muted">Total DPT</h3>
                    <h1 class="fw-bold" style="font-size: 4rem;">{{ $total_dpt }}</h1>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-card p-4">
                    <h3 class="text-muted">Suara Masuk</h3>
                    <h1 class="fw-bold text-success" style="font-size: 4rem;">{{ $suara_masuk }}</h1>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-card p-4">
                    <h3 class="text-muted">Partisipasi</h3>
                    <h1 class="fw-bold text-warning" style="font-size: 4rem;">{{ $total_dpt > 0 ? round(($suara_masuk/$total_dpt)*100, 1) : 0 }}%</h1>
                </div>
            </div>
        </div>

        <div class="glass-card p-4 mb-5">
            <div style="height: 50vh;">
                <canvas id="quickCountChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('quickCountChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($chartLabels) !!},
                datasets: [{
                    label: 'Suara', data: {!! json_encode($chartData) !!},
                    backgroundColor: {!! json_encode($chartColors) !!},
                    borderRadius: 10, barPercentage: 0.5
                }]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false }, datalabels: { display: true, font: {size: 24, weight: 'bold'} } },
                scales: { y: { beginAtZero: true, ticks: { stepSize: 1, font: {size: 16} } }, x: { ticks: {font: {size: 18, weight: 'bold'}} } }
            }
        });
    </script>
</body>
</html>