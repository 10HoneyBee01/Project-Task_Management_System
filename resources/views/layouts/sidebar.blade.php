<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Projects -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('projects') }}">
            <i class="fas fa-fw fa-project-diagram"></i>
            <span>Projects</span>
        </a>
    </li>

    <!-- Nav Item - Users -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
    </li>

    <!-- Nav Item - Profile -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true" aria-controls="collapseProfile">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span>
        </a>
        <div id="collapseProfile" class="collapse" aria-labelledby="headingProfile" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Profile Options:</h6>
                <a class="collapse-item" href="{{ route('profile.show') }}">View Profile</a>
                <a class="collapse-item" href="{{ route('profile.edit') }}">Edit Profile</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Tasks for Projects -->
    @if(isset($projects) && $projects->count())
        <div class="sidebar-heading">
            Tasks
        </div>

        @foreach($projects as $project)
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTasks{{ $project->id }}" aria-expanded="true" aria-controls="collapseTasks{{ $project->id }}">
                    <i class="fas fa-fw fa-tasks"></i>
                    <span>{{ $project->title }}</span>
                </a>
                <div id="collapseTasks{{ $project->id }}" class="collapse" aria-labelledby="headingTasks{{ $project->id }}" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">{{ $project->title }} Task Management:</h6>
                        <a class="collapse-item" href="{{ route('projects.tasks.index', $project->id) }}">All Tasks</a>
                        <a class="collapse-item" href="{{ route('projects.tasks.create', $project->id) }}">Create Task</a>
                    </div>
                </div>
            </li>
        @endforeach
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
