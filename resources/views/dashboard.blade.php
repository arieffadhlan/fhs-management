<x-app-layout title="Dashboard">
    <x-alert-success></x-alert-success>
    <div class="container">
        <div class="row">
            <x-date-time></x-date-time>
            @if (Auth::user()->username == "admin")
                @php
                    $jumlahStok = count($stocks->toArray());
                    $jumlahPenjualanBarang = count($penjualans->toArray());
                    $jumlahPembelianCustomer = count($pembelians->toArray());
                    $jumlahPenjualanStaff = count($penjualanStaff->toArray());
                    $jumlahStaff = count($staffs->toArray());
                    $jumlahCustomer = count($customers->toArray());
                    $jumlahAbsensi = count($absensis->toArray());
                @endphp
                <div class="col-12">
                    <x-statistic-card>
                        <x-slot name="title">
                            <div class="d-flex justify-content-between align-items-center">
                                Statistik Data FHS-Management
                            </div>
                        </x-slot>
                        <div id="chart"></div>
                        <div id="chart2"></div>
                    </x-statistic-card>
                </div>
                <script>
                    let options = {
                        chart: {
                            width: 600,
                            type: 'pie'
                        },
                        series: [
                            {!! json_encode($jumlahStok); !!}, 
                            {!! json_encode($jumlahPenjualanBarang); !!}, 
                            {!! json_encode($jumlahPembelianCustomer); !!},
                            {!! json_encode($jumlahPenjualanStaff); !!},
                            {!! json_encode($jumlahStaff); !!},
                            {!! json_encode($jumlahCustomer); !!},
                            {!! json_encode($jumlahAbsensi); !!}
                        ],
                        labels: [
                            'Stock', 
                            'Penjualan Barang', 
                            'Pembelian Customer', 
                            'Penjualan Staff', 
                            'Staff', 
                            'Customer', 
                            'Absensi'
                        ],
                        responsive: [
                            {
                                breakpoint: 800,
                                options: {
                                    chart: {
                                        width: 450
                                    },
                                    legend: {
                                        position: 'bottom'
                                    }
                                }
                            },
                            {
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        width: "100%",
                                        height: 380
                                    },
                                    legend: {
                                        position: 'bottom'
                                    }
                                }
                            }
                        ]
                    }
                    
                    let chart = new ApexCharts(document.querySelector("#chart"), options);
                    chart.render();

                    let options2 = {
                        chart: {
                            width: "100%",
                            height: 380,
                            type: "bar"
                        },
                        plotOptions: {
                            bar: {
                            horizontal: true
                            }
                        },
                        series: [{
                            name: 'Jumlah Data',
                            data: [
                                {!! json_encode($jumlahStok); !!}, 
                                {!! json_encode($jumlahPenjualanBarang); !!}, 
                                {!! json_encode($jumlahPembelianCustomer); !!},
                                {!! json_encode($jumlahPenjualanStaff); !!},
                                {!! json_encode($jumlahStaff); !!},
                                {!! json_encode($jumlahCustomer); !!},
                                {!! json_encode($jumlahAbsensi); !!}
                            ]
                        }],
                        xaxis: {
                            categories: [
                                'Stock', 
                                'Penjualan Barang', 
                                'Pembelian Customer', 
                                'Penjualan Staff', 
                                'Staff', 
                                'Customer', 
                                'Absensi'
                            ]
                        },
                        legend: {
                            position: "right",
                            verticalAlign: "top",
                            containerMargin: {
                                left: 35,
                                right: 60
                            }
                        },
                        responsive: [
                            {
                                breakpoint: 1000,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            horizontal: false
                                        }
                                    },
                                    legend: {
                                        position: "bottom"
                                    }
                                }
                            }
                        ]
                    }
                    
                    let chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
                    chart2.render();
                </script>
            @else
            @php
                $filteredStaffs = $staffs->filter(function ($value, $key) {
                    return $value->nama_staff == Auth::user()->fullname;
                });

                $filteredAbsensis = $absensis->filter(function ($value, $key) {
                    return $value->nama == Auth::user()->fullname;
                });

                $jumlahPenjualanStaff = count($filteredStaffs->toArray());
                $jumlahAbsensiStaff = count($filteredAbsensis->toArray());
            @endphp
            <div class="col-12">
                <x-statistic-card>
                    <x-slot name="title">
                        <div class="d-flex justify-content-between align-items-center">
                            Statistik Data Staff {{ Auth::user()->fullname }}
                        </div>
                    </x-slot>
                    <div class="d-flex justify-content-center align-items-center mb-5">
                        <div id="chart3"></div>
                    </div>
                    <div id="chart4"></div>
                </x-statistic-card>
            </div>
            <script>
                let options3 = {
                    chart: {
                        width: 600,
                        type: 'pie'
                    },
                    series: [
                        {!! json_encode($jumlahPenjualanStaff); !!},
                        {!! json_encode($jumlahAbsensiStaff); !!},
                    ],
                    labels: [
                        'Penjualan Staff', 
                        'Absensi'
                    ],
                    responsive: [
                        {
                            breakpoint: 800,
                            options: {
                                chart: {
                                    width: 450
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        },
                        {
                            breakpoint: 600,
                            options: {
                                chart: {
                                    width: "100%",
                                    height: 380
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }
                    ]
                }
                
                let chart3 = new ApexCharts(document.querySelector("#chart3"), options3);
                chart3.render();

                let options4 = {
                    chart: {
                        width: "100%",
                        height: 380,
                        type: "bar"
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true
                        }
                    },
                    series: [{
                        name: 'Jumlah Data',
                        data: [
                            {!! json_encode($jumlahPenjualanStaff); !!},
                            {!! json_encode($jumlahAbsensiStaff); !!},
                        ]
                    }],
                    xaxis: {
                        categories: [
                            'Penjualan Staff', 
                            'Absensi'
                        ]
                    },
                    legend: {
                        position: "right",
                        verticalAlign: "top",
                        containerMargin: {
                        left: 35,
                        right: 60
                        }
                    },
                    responsive: [
                        {
                        breakpoint: 1000,
                            options: {
                            plotOptions: {
                            bar: {
                                horizontal: false
                            }
                            },
                            legend: {
                                position: "bottom"
                            }
                        }
                        }
                    ]
                }
                    
                let chart4 = new ApexCharts(document.querySelector("#chart4"), options4);
                chart4.render();
            </script>
            @endif
        </div>
    </div>
</x-app-layout>
