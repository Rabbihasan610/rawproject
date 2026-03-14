

<style>
body{
    background:#f5f6fa;
}

.sidebar{
    height:100vh;
    background:#343a40;
}

.sidebar a{
    color:white;
    text-decoration:none;
    display:block;
    padding:12px 20px;
}

.sidebar a:hover{
    background:#495057;
}

.card{
    border:none;
    border-radius:10px;
}

</style>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-0">
            <h4 class="text-white text-center py-3">Admin</h4>

            <a href="#">Dashboard</a>
            <a href="#">Users</a>
            <a href="#">Orders</a>
            <a href="#">Reports</a>
            <a href="#">Settings</a>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">

            <!-- Top Navbar -->
            <nav class="navbar navbar-light bg-white shadow-sm mb-4">
                <div class="container-fluid">
                <span class="navbar-brand mb-0 h5">Dashboard</span>
                <a href="/logout" class="btn btn-outline-danger btn-sm">Logout</a>
                </div>
            </nav>


            <?php 

             print_r($user);
            
            ?>

        </div>
    </div>
</div>
