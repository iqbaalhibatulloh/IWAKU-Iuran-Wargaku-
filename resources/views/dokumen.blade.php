@extends('layouts.app')

@section('content')

<div class="col-span-3 text-center text-5xl my-7">
    Dokumen
    <div class=" col-span-3 shadow-2xl rounded-xl mx-7 my-7 bg-[#4C3B2A] mt-10 ">
        <div>
            <canvas id="myChart"></canvas>
          </div>
          
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          
          <script>
            const ctx = document.getElementById('myChart');
          
            new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ['Iuran bulanan', 'Iuran Sampah', 'Iuran Ronda', 'Iuran THR'],
                datasets: [{
                  label: '# of Votes',
                  data: [12, 19, 3, 5],
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>                  
    </div>
</div>

@endsection