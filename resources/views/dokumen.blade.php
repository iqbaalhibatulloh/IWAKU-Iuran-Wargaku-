@extends('layouts.app')

@section('content')

<div class="mt-7 mx-7 col-span-3 text-center">
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
    <h1 class="text-right mr-7">
<a href="detailDoc">
      <button class="rounded bg-[#4C3B2A] p-1 text-xl ">
        Detail
      </button>
    </a>
    </h1>
</div>

@endsection