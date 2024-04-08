@extends('layouts.main')


@section('content')
 <!-- Style variation -->
 <h5 class="pb-1 mb-4">Dashboard</h5>


<div class="row">
    <div class="col-lg-8 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">

                <h5 class="card-title text-primary">Selamat Datang Admin! 🎉</h5>
                <p class="mb-4">Selamat menjalankan tugas dan kegiatan anda hari ini, jangn lupa beristirahat</p>
<h1>///</h1>

            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 order-1">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../assets/img/icons/unicons/cc-primary.png" alt="chart success" class="rounded">
                </div>
                <div class="dropdown">
                  <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                    <a class="dropdown-item" href="{{ route('peminjaman.index') }}">View More</a>
                  </div>
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Peminjaman</span>
              <h3 class="card-title mb-2">{{ $trac }}  </h3>
              <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> +{{ $trac }}.00%</small>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class=" card avatar flex-shrink-0 alert-success">
                    <i class='bx bx-sort-alt-2 text-center m-2'></i>
                </div>
                <div class="dropdown">
                  <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                    <a class="dropdown-item" href="{{ route('pengembalian.index') }}">View More</a>
                  </div>
                </div>
              </div>
              <span>Pengembalian</span>
              <h3 class="card-title text-nowrap mb-1">{{ $inc }}</h3>
              <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> +{{ $inc }}.00%</small>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Total Revenue -->
    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
      <div class="card">
        <div class="row row-bordered g-0">
          <div class="col-md-8">
            <h5 class="card-header m-0 me-2 pb-3 text-center">Grafik Peminjaman Buku Perpustakaan </h5>
            {{-- <div id="totalRevenueChart" class="px-4"></div> --}}
            <div id="barChart" class="px-4"></div>
          </div>

        </div>
      </div>
    </div>
    <!--/ Total Revenue -->
    <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
      <div class="row">
        <div class="col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="card avatar flex-shrink-0 alert-warning">

                    <i class='bx bxs-user-account text-center mt-2'></i>

                </div>
                <div class="dropdown">
                  <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                    <a class="dropdown-item" href="{{ route('anggota.index') }}">View More</a>
                  </div>
                </div>
              </div>
              <span class="d-block mb-1">Anggota</span>
              <h3 class="card-title text-nowrap mb-2">{{ $users }}</h3>
              <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> + {{ $users }}.00%</small>
            </div>
          </div>
        </div>

        <div class="col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class=" card avatar flex-shrink-0 alert-info">

                    <i class='bx bx-book text-center mt-2'></i>
                </div>
                <div class="dropdown">
                  <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="cardOpt1">
                    <a class="dropdown-item" href="{{ route('buku.index') }}">View More</a>
                  </div>
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Buku</span>
              <h3 class="card-title mb-2">{{ $books }}</h3>
              <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> +{{ $books }}.00%</small>
            </div>
          </div>
        </div>



    <div class="col-12 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
              <div class="card-title">
                <h5 class="text-nowrap mb-2"> Data Penyumbang Buku</h5>
              </div>
              <div class="mt-sm-auto">
                <small class="text-success text-nowrap fw-semibold"><i class='bx bx-up-arrow-alt'></i>  </small>
                <h3 class="mb-0">{{ $donate }}</h3>
              </div>
            </div>
            <div id="profileReportChart"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // var ctx = document.getElementById('myChart').getContext('2d');
    // var myChart = new Chart(ctx, {
    //     type: 'bar',
    //     data: {
    //         // labels:['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
    //         labels: {!! json_encode($pengunjung->pluck('month')) !!},
    //         datasets: [{
    //             label: 'Jumlah Peminjaman',
    //             data: {!! json_encode($pengunjung->pluck('total')) !!},
    //             backgroundColor: 'rgba(20, 54, 22, 0.2)',
    //             borderColor: 'rgba(255, 99, 132, 1)',
    //             borderWidth: 2
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             yAxes: [{
    //                 ticks: {
    //                     beginAtZero: true
    //                 }
    //             }]
    //         }
    //     }
    // });

    $(document).ready(function() {
        let cardColor, headingColor, axisColor, shadeColor, borderColor;

        cardColor = config.colors.white;
        headingColor = config.colors.headingColor;
        axisColor = config.colors.axisColor;
        borderColor = config.colors.borderColor;

        const barChartEl = document.querySelector('#barChart'),
        barChartOptions = {
            series: [{
                    name: 'Jumlah Peminjaman',
                    data: {!! json_encode($pengunjung->pluck('total')) !!}
                },

            ],
            chart: {
                height: 300,
                width: 850,
                stacked: true,
                type: 'bar',
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '33%',
                    borderRadius: 12,
                    startingShape: 'rounded',
                    endingShape: 'rounded'
                }
            },
            colors: [config.colors.primary, config.colors.info],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 6,
                lineCap: 'round',
                colors: [cardColor]
            },
            legend: {
                show: true,
                horizontalAlign: 'left',
                position: 'top',
                markers: {
                    height: 8,
                    width: 8,
                    radius: 12,
                    offsetX: -3
                },
                labels: {
                    colors: axisColor
                },
                itemMargin: {
                    horizontal: 10
                }
            },
            grid: {
                borderColor: borderColor,
                padding: {
                    top: 0,
                    bottom: -8,
                    left: 20,
                    right: 20
                }
            },
            xaxis: {
                categories: {!! json_encode($pengunjung->pluck('month')) !!},
                labels: {
                    style: {
                        fontSize: '13px',
                        colors: axisColor
                    }
                },
                axisTicks: {
                    show: true
                },
                axisBorder: {
                    show: true
                }
            },
            yaxis: {
                labels: {
                    style: {
                        fontSize: '13px',
                        colors: axisColor
                    }
                }
            },
            responsive: [{
                    breakpoint: 1700,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '32%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 1580,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '35%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 1440,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '42%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 1300,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '48%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 1200,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '40%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 1040,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 11,
                                columnWidth: '48%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 991,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '30%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 840,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '35%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 768,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '28%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 640,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '32%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 576,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '37%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 480,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '45%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 420,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '52%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 380,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '60%'
                            }
                        }
                    }
                }
            ],
            states: {
                hover: {
                    filter: {
                        type: 'none'
                    }
                },
                active: {
                    filter: {
                        type: 'none'
                    }
                }
            }
        };
    if (typeof barChartEl !== undefined && barChartEl !== null) {
        const barChart = new ApexCharts(barChartEl, barChartOptions);
        barChart.render();
    }
    })
</script>
 <!-- Outline -->


 {{-- <script src="https://code.highcharts.com/highcharts.js"></script>
 <script type = "text/javascript" > --}}
{{--


//     // Highcharts.chart('grafik', {
//     //     chart: {
//     //         type: 'column'
//     //     },
//     //     title: {
//     //         text: 'Grafik Peminjaman Buku'
//     //     },
//     //     xAxis: {
//     //         categories: bulan

//     //     },
//     //     yAxis: {
//     //         title: {
//     //             text: 'Total Pemijaman Bulanan'
//     //         }
//     //     },
//     //     plotOptions: {
//     //         series: {
//     //             allowPointSelect: true
//     //         }
//     //     },
//     //     series: {
//     //         {


//     //             name: 'Jumlah Peminjaman',
//     //             data: peminjam
//     //         }
//     //     }
//     // });


//     var chart = Highcharts.chart('container', {
//         chart: {
//             type: 'line',
//             showAxes: true
//         },
//         xAxis: {
//             categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
//         }
//     });

//     // add the button action
//     document.getElementById('button').addEventListener('click', () => {
//         chart.addSeries({
//             data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
//         });
//     }); --}}

   {{-- </script> --}}
@endpush




