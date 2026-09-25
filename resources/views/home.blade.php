@extends('layouts.app')

@section('content')
<div class="container py-2">
    
    <!-- Header Dashboard -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-8">
            <h2 class="fw-bold text-dark mb-1">Live Quick Count</h2>
            <p class="text-muted fs-5">Pantau perolehan suara secara real-time.</p>
        </div>
        <div class="col-md-4 text-md-end text-start">
            <a href="{{ route('home') }}" class="btn btn-white px-4 py-2 rounded-pill shadow-sm border border-light fw-bold text-dark text-decoration-none">
                <i class="bi bi-arrow-clockwise text-primary me-2"></i> Segarkan Data
            </a>
        </div>
    </div>

    <!-- Kotak Ringkasan -->
    <div class="row mb-4 g-4">
        
        <!-- Widget 1: Total Paslon -->
        <div class="col-xl-4 col-md-6">
            <div class="glass-card p-4 h-100 d-flex flex-column justify-content-between">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-box" style="background: linear-gradient(135deg, #007aff, #00c6ff);">
                        <i class="bi bi-person-badge"></i>
                    </div>
                </div>
                <div>
                    <h1 class="fw-bold text-dark mb-0" style="font-size: 3rem;">{{ $total_paslon }}</h1>
                    <p class="text-muted fw-semibold mb-0">Total Kandidat</p>
                </div>
            </div>
        </div>

        <!-- Widget 2: Total DPT -->
        <div class="col-xl-4 col-md-6">
            <div class="glass-card p-4 h-100 d-flex flex-column justify-content-between">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-box" style="background: linear-gradient(135deg, #34c759, #93dfa5);">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
                <div>
                    <h1 class="fw-bold text-dark mb-0" style="font-size: 3rem;">{{ $total_dpt }}</h1>
                    <p class="text-muted fw-semibold mb-0">Total Pemilih (DPT)</p>
                </div>
            </div>
        </div>

        <!-- Widget 3: Suara Masuk -->
        <div class="col-xl-4 col-md-12">
            <div class="glass-card p-4 h-100 d-flex flex-column justify-content-between">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-box" style="background: linear-gradient(135deg, #ff9500, #ffcc00);">
                        <i class="bi bi-envelope-paper-fill"></i>
                    </div>
                </div>
                <div>
                    <h1 class="fw-bold text-dark mb-0" style="font-size: 3rem;">{{ $suara_masuk }}</h1>
                    <!-- Progress Bar partisipasi pemilih -->
                    <div class="progress mt-2 mb-1 bg-light" style="height: 6px;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $total_dpt > 0 ? ($suara_masuk / $total_dpt) * 100 : 0 }}%; background: #ff9500;"></div>
                    </div>
                    <p class="text-muted fw-semibold mb-0 small">{{ $total_dpt > 0 ? round(($suara_masuk / $total_dpt) * 100, 1) : 0 }}% Partisipasi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Area Grafik Live Quick Count -->
    <div class="row">
        <div class="col-md-12">
            <div class="glass-card p-4">
                <h5 class="fw-bold text-dark mb-4"><i class="bi bi-bar-chart-line-fill text-primary me-2"></i>Statistik Perolehan Suara</h5>
                <div style="height: 350px;">
                    <canvas id="quickCountChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('quickCountChart').getContext('2d');
        
        // Memasukkan array PHP ke Javascript
        const labels = {!! json_encode($chartLabels) !!};
        const data = {!! json_encode($chartData) !!};
        const bgColors = {!! json_encode($chartColors) !!};

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Perolehan Suara',
                    data: data,
                    backgroundColor: bgColors,
                    borderRadius: 8, // Ujung batang melengkung ala Apple
                    barPercentage: 0.6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.parsed.y + ' Suara';
                            }
                        }
                    }
                },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        ticks: { stepSize: 1 }, // Angka Y tidak desimal
                        grid: { borderDash: [5, 5], color: 'rgba(0,0,0,0.05)' } 
                    },
                    x: { 
                        grid: { display: false } 
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeOutQuart'
                }
            }
        });
    });
</script>
@endsection