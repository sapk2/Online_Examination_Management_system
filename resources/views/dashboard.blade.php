@extends('layouts.app')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="grid-layout drop-shadow-md bg-gray-100 p-3 min-h-min">
<h1 class="font-bold text-3xl px-2 py-2">Dashboard</h1>
    <div class="container">
        <div class="grid grid-cols-3 gap-10 mt-5">
            <div class="px-2 py-4 flex justify-between bg-blue-600 text-white rounded-lg shadow">
                <p>Total Users</p>
                <p class="text-5xl font-bold">{{$totaluser}}</p>
            </div>


            <div class="px-2 py-4 flex justify-between bg-red-600 text-white rounded-lg shadow">
                <p>Total Subject</p>
                <p class="text-5xl font-bold">{{$totalsubject}}</p>
            </div>


            <div class="px-2 py-4 flex justify-between bg-green-600 text-white rounded-lg shadow">
                <p>Total Questions</p>
                <p class="text-5xl font-bold">{{$totalquestion}}</p>
            </div>

            <div style="width: 220%;" class="px-2 py-4 flex justify-start text-white rounded-lg shadow">
                <canvas id="barChart"></canvas>
            </div>


        </div>
    </div>
    <script>
        var ctx = document.getElementById('barChart').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($data['labels']); ?>,
                datasets: [{
                    label: 'Questionsx',
                    data: <?php echo json_encode($data['data']); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'green',
                    borderWidth: 3
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

    @endsection