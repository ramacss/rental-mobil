<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Rental Mobil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @include('layouts.header')

    @include('layouts.sidebar')

    <main class="dashboard-content">

        <!-- PAGE HEADING -->
        <div class="page-heading">
            <div>
                <h1>Dashboard</h1>
                <p>Selamat datang di Sistem Informasi Rental Mobil.</p>
            </div>

            <span class="current-date">
                {{ now()->translatedFormat('l, d F Y') }}
            </span>
        </div>

        <!-- SUMMARY CARDS -->
        <section class="summary-cards">

            <div class="summary-card">
                <div class="card-icon">🚗</div>
                <div>
                    <p>Total Armada</p>
                    <h2>{{ $totalArmada }}</h2>
                    <span>Seluruh kendaraan</span>
                </div>
            </div>

            <div class="summary-card">
                <div class="card-icon">✓</div>
                <div>
                    <p>Armada Tersedia</p>
                    <h2>{{ $armadaTersedia }}</h2>
                    <span>Siap disewakan</span>
                </div>
            </div>

            <div class="summary-card">
                <div class="card-icon">🔑</div>
                <div>
                    <p>Sedang Disewa</p>
                    <h2>{{ $armadaDisewa }}</h2>
                    <span>Kendaraan dalam penyewaan</span>
                </div>
            </div>

            <div class="summary-card">
                <div class="card-icon">🔧</div>
                <div>
                    <p>Dalam Perawatan</p>
                    <h2>{{ $armadaPerawatan }}</h2>
                    <span>Kendaraan maintenance</span>
                </div>
            </div>

        </section>

        <!-- STATISTIK ARMADA -->
        <section class="dashboard-section">

            <div class="section-heading">
                <h2>Statistik Armada</h2>

                <a href="{{ route('armada.index') }}">
                    Lihat Semua
                </a>
            </div>

            <div class="fleet-statistics">

                <div class="fleet-item">
                    <div class="fleet-info">
                        <span>Tersedia</span>
                        <strong>{{ $armadaTersedia }}</strong>
                    </div>

                    <div class="progress-track">
                        <div class="progress-bar available"
                            style="width: {{ $totalArmada > 0 ? ($armadaTersedia / $totalArmada) * 100 : 0 }}%">
                        </div>
                    </div>
                </div>

                <div class="fleet-item">
                    <div class="fleet-info">
                        <span>Disewa</span>
                        <strong>{{ $armadaDisewa }}</strong>
                    </div>

                    <div class="progress-track">
                        <div class="progress-bar rented"
                            style="width: {{ $totalArmada > 0 ? ($armadaDisewa / $totalArmada) * 100 : 0 }}%">
                        </div>
                    </div>
                </div>

                <div class="fleet-item">
                    <div class="fleet-info">
                        <span>Perawatan</span>
                        <strong>{{ $armadaPerawatan }}</strong>
                    </div>

                    <div class="progress-track">
                        <div class="progress-bar maintenance"
                            style="width: {{ $totalArmada > 0 ? ($armadaPerawatan / $totalArmada) * 100 : 0 }}%">
                        </div>
                    </div>
                </div>

            </div>

        </section>

        <!-- ARMADA TERBARU -->
        <section class="dashboard-section">

            <div class="section-heading">
                <h2>Armada Terbaru</h2>

                <a href="{{ route('armada.index') }}">
                    Lihat Semua
                </a>
            </div>

            <div class="table-container">

                <table class="dashboard-table">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Plat</th>
                            <th>Merk</th>
                            <th>Tahun Pembuatan</th>
                            <th>Transmisi</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($armadaTerbaru as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nomor_plat }}</td>
                                <td>{{ $item->merk }}</td>
                                <td>{{ $item->tahun_pembuatan }}</td>
                                <td>{{ $item->transmisi }}</td>

                                <td>
                                    <span
                                        class="status-badge
                                        {{ strtolower($item->status) }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="empty-data">
                                    Belum ada data armada.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>

    </main>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
