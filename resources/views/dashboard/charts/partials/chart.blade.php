        {{-- Grafik 1 --}}

        <!-- Include ECharts from CDN -->
        <script src="https://cdn.jsdelivr.net/npm/echarts@5.3.3/dist/echarts.min.js"></script>

        <script>
            // Ambil elemen untuk grafik
            var chartDom = document.getElementById('refererPieChart');
            var myChart = echarts.init(chartDom);
            var option;

            // Ambil data dari variabel PHP dan konversi menjadi format JavaScript
            var clusterCounts = {!! json_encode($clusterCounts) !!};

            option = {
                title: {
                    text: 'Grafik Clustering per-Jurusan',
                    left: 'center'
                },
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    orient: 'horizontal',
                    top: 'bottom',
                    left: 'center',

                    textStyle: {
                        fontSize: 9, // Ukuran font untuk judul legenda

                    },
                },

                series: [{
                    name: 'Cluster',
                    type: 'pie',
                    radius: '70%',
                    top: '30px', // Menambahkan margin top untuk pie chart
                    bottom: '60px', // Menambahkan margin top untuk pie chart
                    data: clusterCounts, // Data untuk pie chart
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: '#333'
                        }
                    }
                }]
            };

            option && myChart.setOption(option);
        </script>



        {{-- Grafik 2 --}}
        <!-- Include ECharts from CDN -->
        <script src="https://cdn.jsdelivr.net/npm/echarts@5.3.3/dist/echarts.min.js"></script>

        <script>
            // Ambil elemen untuk grafik
            var chartDom = document.getElementById('rumpunPieChart');
            var myChart = echarts.init(chartDom);
            var option;

            // Ambil data dari variabel PHP dan konversi menjadi format JavaScript
            var rumpunData = {!! json_encode($rumpunData) !!};

            option = {
                title: {
                    text: 'Grafik Clustering per-Rumpun',
                    left: 'center'
                },
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    orient: 'horizontal',
                    top: 'bottom',
                    // padding: [0, 0, 10, 0]
                    left: 'center'
                },
                series: [{
                    name: 'Rumpun',
                    type: 'pie',
                    radius: '70%',
                    top: '20px', // Menambahkan margin top untuk pie chart
                    bottom: '20px', // Menambahkan margin top untuk pie chart
                    data: rumpunData, // Data untuk pie chart
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: '#333'
                        }
                    }
                }]
            };

            option && myChart.setOption(option);
        </script>

        {{-- Grafik 3 --}}
        <!-- Include ECharts from CDN -->
        <script src="https://cdn.jsdelivr.net/npm/echarts@5.3.3/dist/echarts.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var chartDom = document.getElementById('barChart');
                var myChart = echarts.init(chartDom);
                var option;

                // Ambil data dari variabel PHP dan konversi menjadi format JavaScript
                var chartData = @json($chartData);

                option = {
                    title: {
                        text: 'Data Clustering per-Tahun',
                        left: 'center'
                    },
                    tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'shadow'
                        }
                    },
                    legend: {
                        data: chartData.series.map(function(item) {
                            return item.name;
                        }),
                        top: 'bottom',
                        left: 'center', // Align legenda ke tengah
                        padding: [10, 0] // Padding antara legenda dan area grafik
                    },
                    grid: {
                        top: 100, // Jarak dari bagian atas ke grafik
                        bottom: 120 // Jarak dari bagian bawah ke grafik, menyesuaikan dengan legenda
                    },
                    xAxis: {
                        type: 'category',
                        data: chartData.years,
                        name: 'Tahun',
                        axisTick: {
                            alignWithLabel: true
                        }
                    },
                    yAxis: {
                        type: 'value',
                        name: 'Jumlah Siswa'
                    },
                    series: chartData.series.map(function(item) {
                        return {
                            name: item.name,
                            type: 'bar',
                            data: Object.values(item.data),
                            markPoint: {
                                data: item.data.map(function(value, index) {
                                    return {
                                        name: item.name,
                                        value: value,
                                        xAxis: chartData.years[index],
                                        yAxis: value,
                                        label: {
                                            show: true,
                                            formatter: '{c}', // Menampilkan nilai jumlah siswa
                                            color: '#000', // Warna teks label
                                            padding: [10, 0] // Padding di sekitar label
                                        }
                                    };
                                })
                            }
                        };
                    })
                };


                option && myChart.setOption(option);
            });
        </script>
