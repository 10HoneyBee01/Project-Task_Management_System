<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project & Task Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .hero-section {
            background: linear-gradient(135deg, #6e45e2, #88d3ce);
            color: #fff;
            text-align: center;
            padding: 100px 0;
            position: relative;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://via.placeholder.com/1500x800') no-repeat center center;
            background-size: cover;
            opacity: 0.3;
            z-index: -1;
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.25rem;
            margin-bottom: 40px;
        }
        .btn-primary {
            background-color: #6e45e2;
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #5a33d4;
        }
        .feature-box {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .feature-box i {
            font-size: 3rem;
            color: #6e45e2;
            margin-bottom: 10px;
        }
        .feature-box h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .feature-box p {
            font-size: 1rem;
        }
        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>

    <header class="hero-section">
        <div class="container">
            <h1>Welcome to Project & Task Management</h1>
            <p>Your ultimate tool to manage projects and tasks efficiently.</p>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Get Started</a>
        </div>
    </header>

    <section class="container my-5">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fas fa-project-diagram"></i>
                    <h3>Project Management</h3>
                    <p>Organize and oversee your projects from start to finish.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fas fa-tasks"></i>
                    <h3>Task Tracking</h3>
                    <p>Keep track of tasks and deadlines with ease.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fas fa-users"></i>
                    <h3>Team Collaboration</h3>
                    <p>Work together with your team and achieve your goals.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Project & Task Management. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
