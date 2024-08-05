@extends('layouts.app')

@section('title', 'Dashboard - Laravel Admin Panel With Login and Registration')

@section('contents')
  <div class="container mt-5">
    <div class="row">
      <!-- Card 1 -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Overview</h5>
            <p class="card-text">Quick summary of your recent activity.</p>
            <a href="#" class="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Projects</h5>
            <p class="card-text">Manage your projects.</p>
            <p class="card-text"><strong>{{ $projects_count }}</strong> projects</p>
            <a href="{{ route('projects') }}" class="btn btn-primary">Go to Projects</a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tasks</h5>
            <p class="card-text">Track your tasks.</p>
            <p class="card-text"><strong>{{ $tasks_count }}</strong> tasks</p>
            <a href="{{ route('projects.tasks.index', ['projectId' => 1]) }}" class="btn btn-primary">View Tasks</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <!-- Card 4 -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Users</h5>
            <p class="card-text">Manage user accounts.</p>
            <p class="card-text"><strong>{{ $users_count }}</strong> users</p>
            <a href="{{ route('users.index') }}" class="btn btn-primary">Manage Users</a>
          </div>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Comments</h5>
            <p class="card-text">View and respond to comments.</p>
            <a href="#" class="btn btn-primary">Check Comments</a>
          </div>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Reports</h5>
            <p class="card-text">Generate and view reports.</p>
            <a href="#" class="btn btn-primary">Generate Reports</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Project Distribution</h5>
            <canvas id="projectsChart"></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Task Distribution</h5>
            <canvas id="tasksChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">User Distribution</h5>
            <canvas id="usersChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Projects Chart
      var ctxProjects = document.getElementById('projectsChart').getContext('2d');
      var projectsChart = new Chart(ctxProjects, {
        type: 'pie',
        data: {
          labels: ['Completed', 'In Progress', 'Pending'],
          datasets: [{
            data: [{{ $projects_completed }}, {{ $projects_in_progress }}, {{ $projects_pending }}],
            backgroundColor: ['#28a745', '#ffc107', '#dc3545']
          }]
        }
      });

      // Tasks Chart
      var ctxTasks = document.getElementById('tasksChart').getContext('2d');
      var tasksChart = new Chart(ctxTasks, {
        type: 'pie',
        data: {
          labels: ['Completed', 'In Progress', 'Pending'],
          datasets: [{
            data: [{{ $tasks_completed }}, {{ $tasks_in_progress }}, {{ $tasks_pending }}],
            backgroundColor: ['#28a745', '#ffc107', '#dc3545']
          }]
        }
      });

      // Users Chart
      var ctxUsers = document.getElementById('usersChart').getContext('2d');
      var usersChart = new Chart(ctxUsers, {
        type: 'pie',
        data: {
          labels: ['Admins', 'Users'],
          datasets: [{
            data: [{{ $admins_count }}, {{ $users_count }}],
            backgroundColor: ['#007bff', '#ffc107']
          }]
        }
      });
    });
  </script>
@endsection
